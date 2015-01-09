<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");
include(ROOT_PATH . "includes/new_resource_parser.php"); 

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
    <li class="resource--add">
      <div class="resource__main-info"> 
        <h2 class="resource__title">Add Article</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <label for="link">Link to Article</label>
          <input type="text" name="link" id="link">
          <label for="title">Title of Article</label>
          <input type="text" name="title" id="title">
          <label for="summary">Brief Summary of Article</label>
          <input type="textarea" name="summary" id="summary">
          <label for="author">Author of Article</label>
          <input type="text" name="author" id="author">
          <label for="gh_username">Github Username or Nickname</label>
          <input type="text" name="gh_username" id="gh_username">
          <input type="submit" value="Add Article">
          <input type="hidden" name="type" value="article">
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