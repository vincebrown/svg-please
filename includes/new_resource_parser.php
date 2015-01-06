<?php 
// parse the form
if ($_POST['did_post']) {
  // sanitize
  $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
  $link = filter_var($_POST['link'], FILTER_VALIDATE_URL);
  $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  $summary = filter_var($_POST['summary'], FILTER_SANITIZE_STRING);
  $author = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
  $publisher = filter_var($_POST['publisher'], FILTER_SANITIZE_STRING);
  $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
  $tech = filter_var($_POST['tech'], FILTER_SANITIZE_STRING);
  $gh_username = filter_var($_POST['gh_username'], FILTER_SANITIZE_STRING);
  $recommended = $_POST['recommended'];
  

  

  // validate
  $valid = true;
  if ( strlen($type) == 0 OR strlen($link) == 0 OR strlen($title) == 0 OR strlen($summary) == 0) {
    $valid = false;
    $message = 'Please Make sure you have filled in all fields.';
  }

  // if valid add to database
  if($valid) {

    // Create array of parsed data.
    $parsed_resource = array(
      "type"=> $type,
      "link"=> $link,
      "title"=> $title,
      "summary"=> $summary,
      "author"=> $author,
      "publisher"=> $publisher,
      "location"=> $location,
      "tech"=> $tech,
      "gh_username"=> $gh_username);

    // run function to add resource to db (from resources.php)
    add_resource_by_type($parsed_resource);
  }

}