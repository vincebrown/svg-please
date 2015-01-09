<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");

include(ROOT_PATH . "includes/header.php");
// fetch all resources by type.
$article_resources = get_resource_by_type('article');
?>
<section class="resource-section articles">
  <h2 class="section__header">Articles</h2>
  <p class="section__summary">Articles that have been written about SVG.</p>
  <ul class="resources">
    <?php 
    foreach($article_resources as $resource) {
        include('partial-articles.php');
    }
    ?>
  </ul>
</section>
<?php 
include(ROOT_PATH . "includes/footer.php");
?>