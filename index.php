<?php require_once("includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");

// fetch all resources by type.
$article_resources = get_resource_by_type('article');
$book_resources = get_resource_by_type('book');
$tutorial_resources = get_resource_by_type('tutorial');
$podcast_resources = get_resource_by_type('podcast');
$talk_resources = get_resource_by_type('talk');
$tool_resources = get_resource_by_type('tool');

include(ROOT_PATH . 'includes/header.php');?>

<div class="inner-wrap">
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

<section class="resource-section podcasts">
  <h2 class="section__header">Podcasts</h2>
  <p class="section__summary">Podcasts that have been written about SVG.</p>
  <ul class="resources">
    <?php 
    foreach($podcast_resources as $resource) {
        include(ROOT_PATH . 'includes/partial-resource-podcast.html.php');
    }
    ?>
  </ul>
</section>

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

<section class="resource-section tools">
  <h2 class="section__header">Tools</h2>
  <p class="section__summary">Tools that have been created for SVG.</p>
  <ul class="resources">
    <?php 
    foreach($tool_resources as $resource) {
        include(ROOT_PATH . 'includes/partial-resource-tool.html.php');
    }
    ?>
  </ul>
</section>
</div>

<?php include(ROOT_PATH . 'includes/footer.php') ?>