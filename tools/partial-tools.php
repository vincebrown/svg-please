<?php 
/**
 * This file displays a single tool resource in a list view. It needs
 * to receive the following resource details(as elements of an array named $resource)
 *  - link: the web address of the tool
 *  - title: the title of the tool
 *  - summary: the summary of the tool
 *  - author: The author of the tool
 *  - tech: The platform/language that the tool is published in
 */
 ?>
 <li class="resource--tool">
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
  <div class="resource__main-info ripple" data-ripple-color="#F8BBD0">
    
      <h2 class="resource__title"><?php echo $resource['title'];?></h2>
      <p class="resource__summ"><?php echo $resource['summary'];?></p>
    
  </div>
  <div class="resource__meta">
    <p class="resource__meta-info"><span>By: </span><?php echo $resource['author'];?></p>
      <p class="resource__meta-info"><span>Platform/Language: </span><?php echo $resource['tech'] ?></p>
  </div>
  <?php if ($resource['recommended'] == 1) {?>
  <div class="resource__recommended">RECOMMENDED</div>
  <?php } // end if ?>
  </a>
</li>