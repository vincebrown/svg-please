<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Svg Please</title>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo BASE_URL;?>dist/css/style.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<?php if ($_SESSION['loggedin']) { 
    include(ROOT_PATH . 'includes/svg-defs.svg');
 } ?> 
  <header>
    <div class="logo">
      <a href="<?php echo BASE_URL;?>"><img src="<?php echo BASE_URL;?>dist/svg/svg-please-logo.svg" alt="Svg Please"></a>
    </div>
    <div class="search-wrap">
   
    <form id="searchform" action="<?php echo BASE_URL;?>search/" method="get">
    <div class="search-bar-cont">
    <a class="icon-cont" href="javascript:void(0)">
      <svg id ="search-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32">
        <path fill ="black" opacity=".54"  d="M22.857,20.114h-1.463l-0.549-0.549c1.829-2.011,2.926-4.754,2.926-7.68C23.771,5.303,18.469,0,11.886,0S0,5.303,0,11.886
        s5.303,11.886,11.886,11.886c2.926,0,5.669-1.097,7.68-2.926l0.549,0.549v1.463L29.257,32L32,29.257L22.857,20.114z M11.886,20.114
        c-4.571,0-8.229-3.657-8.229-8.229s3.657-8.229,8.229-8.229s8.229,3.657,8.229,8.229S16.457,20.114,11.886,20.114z"/>
      </svg>
      </a>
      <input type="search" name="phrase"  class="search-bar" id="phrase" value="<?php echo $_GET['phrase']; ?>" autofocus>
</div>
      
      
    </form>

    <a href="<?php echo BASE_URL; ?>contributors/" class="btn-contrib ripple" data-ripple-color="#BBDEFB" >VIEW CONTRIBUTORS</a>
    </div>
    <nav class="main-nav">
      <a href="<?php echo BASE_URL;?>articles/" data-link-name="article" class="main-nav__link--articles ripple" data-ripple-color="#D1C4E9" >Articles</a>
      <a href="<?php echo BASE_URL;?>books/" data-link-name="book" class="main-nav__link--books ripple" data-ripple-color="#B2DFDB">Books</a>
      <a href="<?php echo BASE_URL;?>tutorials/" data-link-name="tutorial" class="main-nav__link--tutorials ripple" data-ripple-color="#FFCDD2">Tutorials</a>
      <a href="<?php echo BASE_URL;?>podcasts/" data-link-name="podcast" class="main-nav__link--podcasts ripple" data-ripple-color="#BBDEFB">Podcasts</a>
      <a href="<?php echo BASE_URL;?>talks/" data-link-name="talk" class="main-nav__link--talks ripple" data-ripple-color="#B2EBF2">Talks</a>
      <a href="<?php echo BASE_URL;?>tools/" data-link-name="tool" class="main-nav__link--tools ripple" data-ripple-color="#F8BBD0">Tools</a>
    </nav>
  </header>
  <div class="site-wrapper">
    <?php if ($_SESSION['loggedin']): ?>
      <a href="<?php echo BASE_URL; ?>admin/index.php?action=logout">Logout</a>
    <?php endif ?>

