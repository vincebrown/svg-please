<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");
include(ROOT_PATH . "includes/new_resource_parser.php"); 

// fetch all resources by type.
$tool_resources = get_resource_by_type('tool');
include(ROOT_PATH . "includes/header.php");
?>
<section class="resource-section tools">
  <h2 class="section__header">Tools</h2>
  <p class="section__summary">Tools that have been created for SVG.</p>
  <ul class="resources">
    <?php 
    foreach($tool_resources as $resource) {
        include('partial-tools.php');
    }
    ?>
    <li class="resource--add">
        <div class="resource__main-info"> 
          <h2 class="resource__title">Add Tool</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="link">Link to Tool</label>
            <input type="text" name="link" id="link">
            <label for="title">Name of Tool</label>
            <input type="text" name="title" id="title">
            <label for="summary">Brief Summary of Tool</label>
            <input type="textarea" name="summary" id="summary">
            <label for="author">Author of Tool</label>       
            <input type="text" name="author" id="author">
            <label for="tech">Platform / Language</label>       
            <input type="text" name="tech" id="tech">
            <label for="gh_username">Github Username or Nickname</label>
            <input type="text" name="gh_username" id="gh_username">
            <input type="submit" value="Add Tool">
            <input type="hidden" name="type" value="tool">
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
