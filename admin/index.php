<?php 
// check to see if the user is logged in ]
session_start();
if ($_SESSION['loggedin'] != true) {
  // kick them out
  header('Location:login.php');
  // stop this file from loading
  die(' You do not have permission to view this page');
}
require_once('../includes/config.php'); ?>
<?php require_once(ROOT_PATH . 'includes/header.php'); ?>
<?php include(ROOT_PATH . 'includes/functions.php') ;?>
<a href="login.php?action=logout">Logout</a>
<?php show_resources($db,'article', 'articles'); ?>
<?php show_resources($db,'book','books') ?>
<?php show_resources($db,'tutorial','tutorials') ?>
<?php show_resources($db,'podcast','podcasts') ?>
<?php show_resources($db,'talk','talks') ?>
<?php show_resources($db,'tool','tools') ?>


<?php include(ROOT_PATH . 'includes/footer.php') ?>