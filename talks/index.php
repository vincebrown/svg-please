<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");

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
  </ul>
</section>
<?php 
include(ROOT_PATH . "includes/footer.php");
 ?>