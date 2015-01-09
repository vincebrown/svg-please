<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");
include(ROOT_PATH . "includes/new_resource_parser.php"); 

// fetch all resources by type.
$talk_resources = get_resource_by_type('talk');
include(ROOT_PATH . "includes/header.php");
?>
<section class="resource-section talks">
  <h2 class="section__header">Talks</h2>
  <p class="section__summary">Talks that have been given on SVG.</p>
  <ul class="resources">
    <?php 
    foreach($talk_resources as $resource) {
        include('partial-talks.php');
    }
    ?>
    <li class="resource--add">
        <div class="resource__main-info"> 
          <h2 class="resource__title">Add Talk</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="link">Link to Talk</label>
            <input type="text" name="link" id="link">
            <label for="title">Title of Talk</label>
            <input type="text" name="title" id="title">
            <label for="summary">Brief Summary of Talk</label>
            <input type="textarea" name="summary" id="summary">
            <label for="author">Presenter</label>       
            <input type="text" name="author" id="author">
            <label for="location">Conference</label>       
            <input type="text" name="location" id="location">
            <label for="gh_username">Github Username or Nickname</label>
            <input type="text" name="gh_username" id="gh_username">
            <input type="submit" value="Add Talk">
            <input type="hidden" name="type" value="talk">
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