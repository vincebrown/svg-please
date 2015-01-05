<?php 
require_once("../includes/config.php");

/* This file contains instructions for 2 different states of the form:
 *   - Handling a form submission and ...
 *       - ... displaying the results if matches are found.
 *       - ... displaying a "no results found" message if necessary.
 */

// check to make sure a phrase is set
if (isset($_GET["phrase"])) {
  $phrase = trim($_GET["phrase"]);

  // if a non-blank search term is specified in
  // the query string, perform a search ( run get_resources_search() )
  if ($phrase != "") {
    require_once(ROOT_PATH . "includes/resources.php");
    $resources = get_resources_search($phrase);
  }
}

include(ROOT_PATH . 'includes/header.php');
?>

<section class="resource-section results">
  <h2 class="section__header">Search Results</h2>
  <p class="section__summary">These are all the Results that pertain to your search of <?php echo $phrase; ?></p>
  <ul class="resources">
    <?php 
    foreach($resources as $resource) {
      if ($resource['type'] == 'article') {
        include(ROOT_PATH . 'includes/partial-resource-article.html.php');
      } elseif ($resource['type'] == 'book') {
        include(ROOT_PATH . 'includes/partial-resource-book.html.php');
      } elseif ($resource['type'] == 'tutorial') {
        include(ROOT_PATH . 'includes/partial-resource-tutorial.html.php');
      } elseif ($resource['type'] == 'podcast') {
        include(ROOT_PATH . 'includes/partial-resource-podcast.html.php');
      } elseif ($resource['type'] == 'talk') {
        include(ROOT_PATH . 'includes/partial-resource-talk.html.php');
      } elseif ($resource['type'] == 'tool') {
        include(ROOT_PATH . 'includes/partial-resource-tool.html.php');
      }
    }
    ?>
  </ul>
</section>






<?php include(ROOT_PATH . 'includes/footer.php') ?>