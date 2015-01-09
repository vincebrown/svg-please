<?php
require_once('config.php');

//connect to $db
require_once('database.php');

// Fetch posted id sent from click
$resource_id = $_POST['id'];
$safe_id = filter_var($resource_id,FILTER_VALIDATE_INT);

// if resource is not recommended -> recommend
// else if it is recommended -> remove recommendation

try {

  $check_recommended = $db -> prepare(
    "SELECT recommended
    FROM resources
    WHERE resource_id = :safe_id");
        // Bind 
  $check_recommended->bindParam(':safe_id', $safe_id);
        // run query
  $check_recommended->execute();

  $is_recommended = $check_recommended -> fetch(PDO::FETCH_ASSOC);

  if ($is_recommended['recommended'] == '0') {

    $update = $db->prepare(
      "UPDATE resources
      SET recommended = 1
      WHERE resource_id = :safe_id"
      );
  } else {
    $update = $db->prepare(
      "UPDATE resources
      SET recommended = 0
      WHERE resource_id = :safe_id"
      );
  }

  $update->bindParam(':safe_id', $safe_id);
        // run query
  $update->execute();

} catch (Exception $e) {
  echo "Data could not be updated";
  exit;
}

