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
  <div class="resource__main-info ripple" data-ripple-color="#D1C4E9">
    <a href="<?php echo $resource['link'];?>" class="resource__link">
      <h2 class="resource__title"><?php echo $resource['title'];?></h2>
      <p class="resource__summ"><?php echo $resource['summary'];?></p>
    </a>
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
</li>