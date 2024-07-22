<?
  /**
  * Template Name: Подраздел каталога
  * Template Post Type: post, page, product
  */
?>

<? 
  $imagesFolder = get_template_directory_uri(). '/images';
  $sectoinsList = get_categories(['parent' => 19, 'hide_empty' => false]);

?>

<? get_header() ?>


<section class="bkCatalog">
  <h2 class="bkCatalog__header"><?= $post -> post_title ?></h2>

  <div class="bkCatalog__sideHolder">
    <? wp_nav_menu([
      'theme_location' => 'sidemenu',
      'menu_class' => 'bkSideMenu',
    ]) ?>
  </div>

  <div class="bkCatalog__content">
    <? the_content() ?>
  </div>
</section>

<style>
.bkCatalog {
  display: grid;
  grid-template-columns: 300px 1fr;
  max-width: 1175px;
  margin: 40px auto;
  grid-gap: 10px;
}

.bkCatalog__header {
  grid-column: span 2;
  text-align: center;
  font-weight: 300;
  font-size: 31px;
  padding: 10px 0;
  border-bottom: 1px solid rgba(170, 165, 136, .6);
  margin: 20px 0;
}

.bkCatalog__sideHolder {
  height: 300px;
}

.bkCatalog__sideBar {
  padding: 20px;
  margin: 30px 0;
  box-sizing: border-box;
}

.bkCatalog__content {
  min-height: 100vh;
}


.bkKatalog__item {}
</style>

<? get_footer() ?>