<?php require_once("config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");

// fetch all resources by type.
$book_resources = get_resource_by_type('book');
?>
<section class="resource-section books">
  <h2 class="section__header">Books</h2>
  <p class="section__summary">Books that have been written about SVG.</p>
  <ul class="resources">
    <?php 
    foreach($book_resources as $resource) {
        include(ROOT_PATH . 'includes/partial-resource-book.html.php');
    }
    ?>
  </ul>
</section>