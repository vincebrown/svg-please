<?php require_once("../includes/config.php");

// resources.php contains all models
include(ROOT_PATH . "includes/resources.php");
include(ROOT_PATH . "includes/new_resource_parser.php"); 

// fetch all resources by type.
$book_resources = get_resource_by_type('book');
include(ROOT_PATH . "includes/header.php");
?>
<section class="resource-section books">
  <h2 class="section__header">Books</h2>
  <p class="section__summary">Books that have been written about SVG.</p>
  <ul class="resources">
    <?php 
    foreach($book_resources as $resource) {
        include('partial-books.php');
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
<?php 
include(ROOT_PATH . "includes/footer.php");
 ?>