<?php 
/**
 * @param String - Resource type(article,book,tutorial,podcast,talk,tool)
 * @return Array - with all db entries that fall in that type.
 */
function get_resource_by_type($type){
// Include Database Connection
  require(ROOT_PATH . "includes/database.php");
  try{
    // Prepare query
   $results = $db -> prepare(
    "SELECT *
    FROM resources
    WHERE type = :type
    ORDER BY recommended DESC"
    );
   // bind parameter
   $results -> bindParam(':type', $type);
   // Run query
   $results -> execute();
 } catch (Exception $e) {
  echo "Data could not be retrieved from the database.";
  exit;
}

$resources = $results->fetchAll(PDO::FETCH_ASSOC);
return $resources;
}


/**
 * @param String - $phrase the phrase that was searched
 * @return Array - A list of resources matching phrase
 */
function get_resources_search($phrase) {
    require(ROOT_PATH . "includes/database.php");
    try {
      // prepare Statement
        $results = $db->prepare(
          "SELECT DISTINCT *
           FROM resources
           WHERE title LIKE :phrase
           OR author LIKE :phrase
           OR location LIKE :phrase
           OR tech LIKE :phrase
           ORDER BY recommended DESC");
        // Bind User input value($phrase)
        $results->bindValue(":phrase","%" . $phrase . "%");
        // run query
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }
    // fetch All matches
    $matches = $results->fetchAll(PDO::FETCH_ASSOC);
    // return matches
    return $matches;
}