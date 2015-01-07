<?php require_once("config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");

// fetch all resources by type.
$tutorial_resources = get_resource_by_type('tutorial');
include(ROOT_PATH . "includes/header.php");
?>
<section class="resource-section tutorials">
  <h2 class="section__header">Tutorials</h2>
  <p class="section__summary">Tutorials that have been written about SVG.</p>
  <ul class="resources">
    <?php 
    foreach($tutorial_resources as $resource) {
        include(ROOT_PATH . 'includes/partial-resource-tutorial.html.php');
    }
    ?>
  </ul>
</section>
<?php 
include(ROOT_PATH . "includes/footer.php");
 ?>