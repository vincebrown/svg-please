<?php 
/**
 * Clean String Inputs before submitting to DB
 * @param $input - the dirty data that is coming in.
 * @param $db - database object
 * @return cleaned data
 */
function clean_input($input, $db) {
  return mysqli_real_escape_string( $db, strip_tags($input) );
}
?>


<?php 
/**
 * @param $type - A string that means type of resource.
 */
function show_meta($type,$row) {
  switch ($type) {
    case 'article':?>
    <div class="resource__meta">
      <h3 class="resource__meta-info"><span>Written By: </span><?php echo $row['author'];?></h3>
    </div>
    <?php break;?>

    <?php case 'book':?> 
    <div class="resource__meta">
      <h3 class="resource__meta-info"><span>Written By: </span><?php echo $row['author'];?></h3>
      <h3 class="resource__meta-info"><span>Publisher: </span><?php echo $row['publisher'] ?></h3>
    </div>
    <?php break;?>

    <?php case 'tutorial':?>
    <div class="resource__meta">
    <h3 class="resource__meta-info"><span>By: </span><?php echo $row['author'];?></h3>
      <h3 class="resource__meta-info"><span>On: </span><?php echo $row['publisher'] ?></h3>
    </div>
    <?php break; ?>

    <?php case 'podcast': ?>
    <div class="resource__meta">
    <h3 class="resource__meta-info"><span>By: </span><?php echo $row['author'];?></h3>
      <h3 class="resource__meta-info"><span>On: </span><?php echo $row['location'] ?></h3>
    </div>
    <?php break; ?>

    <?php case 'talk': ?>
    <div class="resource__meta">
    <h3 class="resource__meta-info"><span>By: </span><?php echo $row['author'];?></h3>
      <h3 class="resource__meta-info"><span>At: </span><?php echo $row['location'] ?></h3>
    </div>
    <?php break; ?>

    <?php case 'tool': ?>
    <div class="resource__meta">
    <h3 class="resource__meta-info"><span>By: </span><?php echo $row['author'];?></h3>
      <h3 class="resource__meta-info"><span>Platform/Language: </span><?php echo $row['tech'] ?></h3>
    </div>
    <?php break; 
  } // end switch
} // end function?>


<?php 
/**
 * @param $type - A string that means type of resource.
 */
function ripple_color($type) {
  switch ($type) {
    case 'article':?>
      #D1C4E9
    <?php break;?>

    <?php case 'book':?> 
    #B2DFDB
    <?php break;?>
    
    <?php case 'tutorial':?>
    #FFCDD2
    <?php break; ?>

    <?php case 'podcast': ?>
    #BBDEFB
    <?php break; ?>

    <?php case 'talk': ?>
    #B2EBF2
    <?php break; ?>

    <?php case 'tool': ?>
    #F8BBD0
    <?php break; 
  } // end switch
} // end function?>



<?php
/**
 * Function show_resources()
 * @param $db - Database to connect to
 * @param $type - Resource type must be singular (article, book, tutorial, podcast, talk, tool)
 * @param $plural - Resource type pluralized for css and content
 * @return complete resource sections with resources
 */
function show_resources($db,$type='article',$plural='articles') { ?>
<section class="resource-section <?php echo $plural; ?>">
  <h2 class="section__header"><?php echo ucwords($plural); ?></h2>
  <p class="section__summary"><?php echo ucwords($plural) ?> that have been written about SVG.</p>
  <ul class="resources">
    <?php 
    $query_resources = "SELECT *
    FROM resources
    WHERE type = '$type'
    ORDER BY recommended DESC";
  // run query
    $result_resources = $db -> query($query_resources);
  //check to see if rows were found
    if ($result_resources -> num_rows >= 1) {
      while($row = $result_resources -> fetch_assoc()){
        ?>
        <li class="resource--<?php echo $type; ?>">
          <div class="resource__main-info ripple" data-ripple-color="<?php ripple_color($type)?>">
            <a href="<?php echo $row['link'];?>" class="resource__link">
              <h2 class="resource__title"><?php echo $row['title'];?></h2>
              <p class="resource__summ"><?php echo $row['summary'];?></p>
            </a>
          </div>
          <?php show_meta($type,$row) ?>
          <?php if ($row['recommended'] == 1) {?>
          <div class="resource__recommended">RECOMMENDED</div>
          <?php } // end if ?>
        </li>
        <?php 
      } // end while
    } else { 
      echo 'Sorry no resources found' ;
    } // end if else.
    ?>
  </ul>
</section>
<?php  
} // end function
