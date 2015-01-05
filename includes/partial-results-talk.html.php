<?php require_once("config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");

// fetch all resources by type.
$talk_resources = get_resource_by_type('talk');
?>
<section class="resource-section talks">
  <h2 class="section__header">Talks</h2>
  <p class="section__summary">Talks that have been given on SVG.</p>
  <ul class="resources">
    <?php 
    foreach($talk_resources as $resource) {
        include(ROOT_PATH . 'includes/partial-resource-talk.html.php');
    }
    ?>
  </ul>
</section>