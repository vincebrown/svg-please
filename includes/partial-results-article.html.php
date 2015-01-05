<?php require_once("config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");

// fetch all resources by type.
$article_resources = get_resource_by_type('article');
?>
<section class="resource-section articles">
  <h2 class="section__header">Articles</h2>
  <p class="section__summary">Articles that have been written about SVG.</p>
  <ul class="resources">
    <?php 
    foreach($article_resources as $resource) {
        include(ROOT_PATH . 'includes/partial-resource-article.html.php');
    }
    ?>
  </ul>
</section>