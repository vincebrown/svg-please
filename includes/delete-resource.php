<?php
require_once('config.php');

//connect to $db
require_once('database.php');

// Fetch posted id sent from click
$resource_id = $_POST['id'];
$safe_id = filter_var($resource_id,FILTER_VALIDATE_INT);

  try {
      // prepare Statement
    $remove = $db->prepare(
      "DELETE FROM resources
       WHERE resource_id = :safe_id"
       );
        // Bind 
    $remove->bindParam(':safe_id', $safe_id);
        // run query
    $remove->execute();
  } catch (Exception $e) {
    echo "Data could not be removed";
    exit;
  }
