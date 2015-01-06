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




/**
 * This function must take parsed new resource array and insert into $db
 * @param Array - $parsed_data comes from an added resource that
 * has already been parsed.
 * @return Array - updated resources by type w/ newest added resource
 */

function add_resource_by_type($parsed_data){
  require(ROOT_PATH . "includes/database.php");

  try {
    // check if contributor already exists in contributor table
    // if exists retrieve id
    $check_contributor = $db -> prepare(
      "SELECT *
      FROM contributors
      WHERE gh_username = :gh_username");

      // bind parameter
    $check_contributor -> bindParam(':gh_username',$parsed_data['gh_username']);
     // run query 
    $check_contributor -> execute();

    // check to see if any rows comeback matching gh_username
    $contrib_row_count = $check_contributor -> rowCount();


    if ($contrib_row_count > 0) {
      // if user already exists fetch data
      $contributor = $check_contributor -> fetch(PDO::FETCH_ASSOC);

      // Set existing users contributor_id to $contributor_id
      $contributor_id = $contributor['contributor_id'];

      
      // prepare insert statement
        $new_resource = $db -> prepare(
         "INSERT INTO resources(type, link, title, summary, author, publisher, location, tech, contributor_id )
         VALUES(:type, :link, :title, :summary, :author, :publisher, :location, :tech, :contributor_id) ");

      // bind params
        $new_resource -> bindParam(':type', $parsed_data['type']);
        $new_resource -> bindParam(':link',$parsed_data['link']);
        $new_resource -> bindParam(':title',$parsed_data['title']);
        $new_resource -> bindParam(':summary', $parsed_data['summary']);
        $new_resource -> bindParam(':author',$parsed_data['author']);
        $new_resource -> bindParam(':publisher',$parsed_data['publisher']);
        $new_resource -> bindParam(':location',$parsed_data['location']);
        $new_resource -> bindParam(':tech',$parsed_data['tech']);
        // $contributor_id comes from query above
        $new_resource -> bindParam(':contributor_id', $contributor_id);

      // run insert
        $new_resource -> execute();

      // fetch updated resources by type
        $updated_resources = get_resource_by_type($parsed_data['type']);

      //return new updated resources
        return $updated_resources;

      } else {

        // prepare new contributor insert
        $contributor_insert = $db -> prepare(
          "INSERT INTO contributors(gh_username)
          VALUES(:gh_username)");

        // Bind Parameters for contributor_insert
        $contributor_insert -> bindParam(':gh_username',$parsed_data['gh_username']);

        //run insert
        $contributor_insert -> execute();

        // fetch new contributors user_id

        // prepare query
        $new_contributor_id = $db -> prepare(
          "SELECT contributor_id
           FROM contributors
           WHERE contributor_id = :gh_username");

        // bind params
        $new_contributor_id -> bindParam(':gh_username', $parsed_data['gh_username']);

        // run query
        $new_contributor_id -> execute();

        // fetch newly added contributors , contributor_id

        $get_contributors_id = $db -> fetch(PDO::FETCH_ASSOC);

        $new_id = $get_contributors_id['contributor_id'];

        // prepare resource insert
        $new_resource = $db -> prepare(
         "INSERT INTO resources(type, link, title, summary, author, publisher, location, tech, contributor_id )
         VALUES(:type, :link, :title, :summary, :author, :publisher, :location, :tech, :contributor_id) ");

        // Bind Parameters for new resource
        $new_resource -> bindParam(':type', $parsed_data['type']);
        $new_resource -> bindParam(':link',$parsed_data['link']);
        $new_resource -> bindParam(':title',$parsed_data['title']);
        $new_resource -> bindParam(':summary', $parsed_data['summary']);
        $new_resource -> bindParam(':author',$parsed_data['author']);
        $new_resource -> bindParam(':publisher',$parsed_data['publisher']);
        $new_resource -> bindParam(':location',$parsed_data['location']);
        $new_resource -> bindParam(':tech',$parsed_data['tech']);
        $new_resource -> bindParam(':contributor_id', $new_id);

        // run insert
        $new_resource -> execute();
    

    } // end else

  } catch (Exception $e) {
    echo "Data could not be added to the database.";
    exit;
} // end try catch block

  // fetch updated resources by type
$updated_resources = get_resource_by_type($parsed_data['type']);

  //return new updated resources
return $updated_resources;

} // end function