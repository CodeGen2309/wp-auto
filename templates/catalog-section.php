<?
  /**
  * Template Name: Подраздел каталога
  * Template Post Type: post, page, product
  */
?>

<? 
  $imgFolder = get_template_directory_uri(). '/img';
  $iconsFolder = get_template_directory_uri(). '/icons';
  $sectoinsList = get_categories(['parent' => 19, 'hide_empty' => false]);

?>

<? get_header() ?>

<section class="bullet">
	<img src="<?= $imgFolder ?>/bullet.jpg" class="bullet__img">
	<div class="bullet__cover"></div>
	
  <!-- <img class="bullet__logo" src="<?= $imgFolder ?>/logo.png"> -->
	<h1 class="bullet__title">AutoSfera</h1>
	<p class="bullet__footNote">
		Онлайн-магазин автозапчастей и товаров для наших верных друзей.
	</p>

  <!-- <label class="bullet__search">
    <img class="bullet__searchIcon" src="<?= $iconsFolder ?>/search.png">
    <input type="text" class="bullet__searchInput">
  </label> -->
</section>



<h1>TEEEEST</h1>

<? get_footer() ?>