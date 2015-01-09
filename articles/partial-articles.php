<?php 
/**
 * This file displays a single article resource in a list view. It needs
 * to receive the following resource details(as elements of an array named $resource)
 *  - link: the web address of the article 
 *  - title: the title of the article 
 *  - summary: the summary of the article 
 *  - author: The author of the article 
 */
?>
<li class="resource--article">
 <?php 
 if ($_SESSION['loggedin']) { ?>
 <div class="resource__actions-cont">
  <a href="javascript:void(0)" class="delete"  data-resource-id="<?php echo $resource['resource_id'];?>">
    <svg  width="18" height="18"><use xlink:href="#shape-delete"/></svg>
  </a>
  <a href="javascript:void(0)" class="favorite"  data-resource-id="<?php echo $resource['resource_id'];?>">
    <svg  width="18" height="18"><use xlink:href="#shape-heart"/></svg>
  </a>
</div>
<?php } ?> 
<a href="<?php echo $resource['link'];?>" class="resource__link">
  <div class="resource__main-info ripple" data-ripple-color="#D1C4E9">   
    <h2 class="resource__title"><?php echo $resource['title'];?></h2>
    <p class="resource__summ"><?php echo $resource['summary'];?></p>
  </div>
  <div class="resource__meta">
    <p class="resource__meta-info">
      <span>Written By:</span>
      <?php echo $resource['author']; ?>
    </p>
  </div>
  <?php if ($resource['recommended'] == 1) {?>
  <div class="resource__recommended">RECOMMENDED</div>
  <?php } // end if ?>
</a>
</li>