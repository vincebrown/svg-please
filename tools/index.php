<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");

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
  </ul>
</section>
<?php 
include(ROOT_PATH . "includes/footer.php");
 ?>
