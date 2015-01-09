<?php 
/**
 * This file displays a single tutorial resource in a list view. It needs
 * to receive the following resource details(as elements of an array named $resource)
 *  - link: the web address of the tutorial
 *  - title: the title of the tutorial
 *  - summary: the summary of the tutorial
 *  - author: The author of the tutorial
 *  - publisher: The site/person that published tutorial
 */
 ?>

 <li class="resource--tutorial">
  <?php 
 if ($_SESSION['loggedin']) { ?>
 <div class="resource__actions-cont">
  <a href="javascript:void(0)" class="delete" data-resource-id ="<?php echo $resource['resource_id'];?>">
    <svg width="18" height="18"><use xlink:href="#shape-delete"/></svg>
  </a>
  <a href="javascript:void(0)" class="favorite" data-resource-id ="<?php echo $resource['resource_id'];?>">
    <svg width="18" height="18"><use xlink:href="#shape-heart"/></svg>
  </a>
</div>
<?php } ?> 
 <a href="<?php echo $resource['link'];?>" class="resource__link">
  <div class="resource__main-info ripple" data-ripple-color="#FFCDD2">
    
      <h2 class="resource__title"><?php echo $resource['title'];?></h2>
      <p class="resource__summ"><?php echo $resource['summary'];?></p>
    
  </div>
  <div class="resource__meta">
    <p class="resource__meta-info"><span>By: </span><?php echo $resource['author'];?></p>
      <p class="resource__meta-info"><span>On: </span><?php echo $resource['publisher'] ?></p>
  </div>
  <?php if ($resource['recommended'] == 1) {?>
  <div class="resource__recommended">RECOMMENDED</div>
  <?php } // end if ?>
  </a>
</li>