<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");

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
  </ul>
</section>
<?php 
include(ROOT_PATH . "includes/footer.php");
 ?>