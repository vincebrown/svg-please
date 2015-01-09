<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");
include(ROOT_PATH . "includes/new_resource_parser.php"); 

// fetch all resources by type.
$podcast_resources = get_resource_by_type('podcast');
include(ROOT_PATH . "includes/header.php");
?>
<section class="resource-section podcasts">
  <h2 class="section__header">Podcasts</h2>
  <p class="section__summary">Podcasts that have been written about SVG.</p>
  <ul class="resources">
    <?php 
    foreach($podcast_resources as $resource) {
        include('partial-podcasts.php');
    }
    ?>
    <li class="resource--add">
        <div class="resource__main-info"> 
          <h2 class="resource__title">Add Podcast</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="link">Link to Podcast</label>
            <input type="text" name="link" id="link">
            <label for="title">Title of Podcast Episode</label>
            <input type="text" name="title" id="title">
            <label for="summary">Brief Summary of Podcast Episode</label>
            <input type="textarea" name="summary" id="summary">
            <label for="author">Hosts & Guests on Podcast</label>       
            <input type="text" name="author" id="author">
            <label for="location">Name of Podcast</label>       
            <input type="text" name="location" id="location">
            <label for="gh_username">Github Username or Nickname</label>
            <input type="text" name="gh_username" id="gh_username">
            <input type="submit" value="Add Podcast">
            <input type="hidden" name="type" value="podcast">
            <input type="hidden" name="did_post" value="1">
          </form>
          <p class="resource__summ">C'mon and contribute. You know you want to.</p>
        </div>
      </li>
  </ul>
</section>
<?php 
include(ROOT_PATH . "includes/footer.php");
 ?>