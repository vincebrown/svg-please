<?php require_once("includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");
include(ROOT_PATH . "includes/new_resource_parser.php"); 

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
        include(ROOT_PATH . 'articles/partial-articles.php');
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

  <section class="resource-section books">
    <h2 class="section__header">Books</h2>
    <p class="section__summary">Books that have been written about SVG.</p>
    <ul class="resources">
      <?php 
      foreach($book_resources as $resource) {
        include(ROOT_PATH . 'books/partial-books.php');
      }
      ?>
      <li class="resource--add">
        <div class="resource__main-info"> 
        <h2 class="resource__title">Add Book</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="link">Link to Book</label>
            <input type="text" name="link" id="link">
            <label for="title">Title of Book</label>
            <input type="text" name="title" id="title">
            <label for="summary">Brief Summary of Book</label>
            <input type="textarea" name="summary" id="summary">
            <label for="author">Author of Book</label>       
            <input type="text" name="author" id="author">
            <label for="publisher">Publisher of Book</label>       
            <input type="text" name="publisher" id="publisher">
            <label for="gh_username">Github Username or Nickname</label>
            <input type="text" name="gh_username" id="gh_username">
            <input type="submit" value="Add Book">
            <input type="hidden" name="type" value="book">
            <input type="hidden" name="did_post" value="1">
          </form>
          <p class="resource__summ">C'mon and contribute. You know you want to.</p>
        </div>
      </li>
    </ul>
  </section>

  <section class="resource-section tutorials">
    <h2 class="section__header">Tutorials</h2>
    <p class="section__summary">Tutorials that have been written about SVG.</p>
    <ul class="resources">
      <?php 
      foreach($tutorial_resources as $resource) {
        include(ROOT_PATH . 'tutorials/partial-tutorials.php');
      }
      ?>
      <li class="resource--add">
        <div class="resource__main-info"> 
          <h2 class="resource__title">Add Tutorial</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="link">Link to Tutorial</label>
            <input type="text" name="link" id="link">
            <label for="title">Title of Tutorial</label>
            <input type="text" name="title" id="title">
            <label for="summary">Brief Summary of Tutorial</label>
            <input type="textarea" name="summary" id="summary">
            <label for="author">Author of Tutorial</label>       
            <input type="text" name="author" id="author">
            <label for="publisher">Publisher of Tutorial</label>       
            <input type="text" name="publisher" id="publisher">
            <label for="gh_username">Github Username or Nickname</label>
            <input type="text" name="gh_username" id="gh_username">
            <input type="submit" value="Add Tutorial">
            <input type="hidden" name="type" value="tutorial">
            <input type="hidden" name="did_post" value="1">
          </form>
          <p class="resource__summ">C'mon and contribute. You know you want to.</p>
        </div>
      </li>
    </ul>
  </section>

  <section class="resource-section podcasts">
    <h2 class="section__header">Podcasts</h2>
    <p class="section__summary">Podcasts that have been written about SVG.</p>
    <ul class="resources">
      <?php 
      foreach($podcast_resources as $resource) {
        include(ROOT_PATH . 'podcasts/partial-podcasts.php');
      }
      ?>
      <li class="resource--add">
        <div class="resource__main-info"> 
          <h2 class="resource__title">Add Podcast</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="link">Link to Podcast</label>
            <input type="text" name="link" id="link">
            <label for="title">Title of Podcast Episode</label>
            <input type="text" name="title" id="title">
            <label for="summary">Brief Summary of Podcast Episode</label>
            <input type="textarea" name="summary" id="summary">
            <label for="author">Hosts & Guests on Podcast</label>       
            <input type="text" name="author" id="author">
            <label for="location">Name of Podcast</label>       
            <input type="text" name="location" id="location">
            <label for="gh_username">Github Username or Nickname</label>
            <input type="text" name="gh_username" id="gh_username">
            <input type="submit" value="Add Podcast">
            <input type="hidden" name="type" value="podcast">
            <input type="hidden" name="did_post" value="1">
          </form>
          <p class="resource__summ">C'mon and contribute. You know you want to.</p>
        </div>
      </li>
    </ul>
  </section>

  <section class="resource-section talks">
    <h2 class="section__header">Talks</h2>
    <p class="section__summary">Talks that have been given on SVG.</p>
    <ul class="resources">
      <?php 
      foreach($talk_resources as $resource) {
        include(ROOT_PATH . 'talks/partial-talks.php');
      }
      ?>
      <li class="resource--add">
        <div class="resource__main-info"> 
          <h2 class="resource__title">Add Talk</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="link">Link to Talk</label>
            <input type="text" name="link" id="link">
            <label for="title">Title of Talk</label>
            <input type="text" name="title" id="title">
            <label for="summary">Brief Summary of Talk</label>
            <input type="textarea" name="summary" id="summary">
            <label for="author">Presenter</label>       
            <input type="text" name="author" id="author">
            <label for="location">Conference</label>       
            <input type="text" name="location" id="location">
            <label for="gh_username">Github Username or Nickname</label>
            <input type="text" name="gh_username" id="gh_username">
            <input type="submit" value="Add Talk">
            <input type="hidden" name="type" value="talk">
            <input type="hidden" name="did_post" value="1">
          </form>
          <p class="resource__summ">C'mon and contribute. You know you want to.</p>
        </div>
      </li>
    </ul>
  </section>

  <section class="resource-section tools">
    <h2 class="section__header">Tools</h2>
    <p class="section__summary">Tools that have been created for SVG.</p>
    <ul class="resources">
      <?php 
      foreach($tool_resources as $resource) {
        include(ROOT_PATH . 'tools/partial-tools.php');
      }
      ?>
      <li class="resource--add">
        <div class="resource__main-info"> 
          <h2 class="resource__title">Add Tool</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="link">Link to Tool</label>
            <input type="text" name="link" id="link">
            <label for="title">Name of Tool</label>
            <input type="text" name="title" id="title">
            <label for="summary">Brief Summary of Tool</label>
            <input type="textarea" name="summary" id="summary">
            <label for="author">Author of Tool</label>       
            <input type="text" name="author" id="author">
            <label for="tech">Platform / Language</label>       
            <input type="text" name="tech" id="tech">
            <label for="gh_username">Github Username or Nickname</label>
            <input type="text" name="gh_username" id="gh_username">
            <input type="submit" value="Add Tool">
            <input type="hidden" name="type" value="tool">
            <input type="hidden" name="did_post" value="1">
          </form>
          <p class="resource__summ">C'mon and contribute. You know you want to.</p>
        </div>
      </li>
    </ul>
  </section>
</div>

<?php include(ROOT_PATH . 'includes/footer.php') ?>