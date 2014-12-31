<?php 
/**
 * This file displays a single book resource in a list view. It needs
 * to receive the following resource details(as elements of an array named $resource)
 *  - link: the web address of the book 
 *  - title: the title of the book 
 *  - summary: the summary of the book 
 *  - author: The author of the book 
 *  - publisher: The publisher of the book.
 */
 ?>
 <li class="resource--book">
  <div class="resource__main-info ripple" data-ripple-color="#B2DFDB">
    <a href="<?php echo $resource['link'];?>" class="resource__link">
      <h2 class="resource__title"><?php echo $resource['title'];?></h2>
      <p class="resource__summ"><?php echo $resource['summary'];?></p>
    </a>
  </div>
  <div class="resource__meta">
    <p class="resource__meta-info"><span>Written By: </span><?php echo $resource['author'];?></p>
      <p class="resource__meta-info"><span>Publisher: </span><?php echo $resource['publisher'] ?></p>
  </div>
  <?php if ($resource['recommended'] == 1) {?>
  <div class="resource__recommended">RECOMMENDED</div>
  <?php } // end if ?>
</li>