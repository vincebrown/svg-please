<?php 
/**
 * This file displays a single podcast resource in a list view. It needs
 * to receive the following resource details(as elements of an array named $resource)
 *  - link: the web address of the podcast episode
 *  - title: the title of the podcast episode
 *  - summary: the summary of the podcast episode
 *  - author: The guests/hosts of the podcast episode
 *  - location: The podcast the episode first aired on.
 */
 ?>
 <li class="resource--podcast">
  <div class="resource__main-info ripple" data-ripple-color="#BBDEFB">
    <a href="<?php echo $resource['link'];?>" class="resource__link">
      <h2 class="resource__title"><?php echo $resource['title'];?></h2>
      <p class="resource__summ"><?php echo $resource['summary'];?></p>
    </a>
  </div>
  <div class="resource__meta">
    <p class="resource__meta-info"><span>With: </span><?php echo $resource['author'];?></p>
      <p class="resource__meta-info"><span>On: </span><?php echo $resource['location'] ?></p>
  </div>
  <?php if ($resource['recommended'] == 1) {?>
  <div class="resource__recommended">RECOMMENDED</div>
  <?php } // end if ?>
</li>