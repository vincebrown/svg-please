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
  <div class="resource__main-info ripple" data-ripple-color="#F8BBD0">
    <a href="<?php echo $resource['link'];?>" class="resource__link">
      <h2 class="resource__title"><?php echo $resource['title'];?></h2>
      <p class="resource__summ"><?php echo $resource['summary'];?></p>
    </a>
  </div>
  <div class="resource__meta">
    <p class="resource__meta-info"><span>By: </span><?php echo $resource['author'];?></p>
      <p class="resource__meta-info"><span>Platform/Language: </span><?php echo $resource['tech'] ?></p>
  </div>
  <?php if ($resource['recommended'] == 1) {?>
  <div class="resource__recommended">RECOMMENDED</div>
  <?php } // end if ?>
</li>