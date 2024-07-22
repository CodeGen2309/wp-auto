<?
  /**
  * Template Name: Главная страница каталога
  * Template Post Type: post, page, product
  */
?>

<? get_header() ?>


<?

$pagesArr = get_pages(['parent' => 62]);

$pagesData = [];
foreach ($pagesArr as $item) {
  $newPage          = [];
  $newPage['ID']    = $item -> ID;
  $newPage['title'] = $item -> post_title;
  $newPage['url']   = $item -> guid;
  $newPage['img']   = get_the_post_thumbnail_url($item -> ID);
  $pagesData[]      = $newPage;
}


?>


<section class='bkShowCase'>
  <h2 class="bkShowCase__header">Каталог</h2>

  <div class="bkShowCase__sideHolder">
    <?
      wp_nav_menu([
        'theme_location' => 'sidemenu',
        'menu_class' => 'bkSideMenu',
      ])
    ?>
  </div>

  <div class="bkShowCase__content">
    <? the_content() ?>
  </div>
</section>






<style>
.bkShowCase {
  display: grid;
  grid-template-columns: 300px 1fr;
  max-width: 1175px;
  margin: 40px auto;
  grid-gap: 20px;
}


.bkShowCase__header {
  grid-column: span 2;
  text-align: center;
  font-weight: 300;
  font-size: 31px;
  padding: 10px 0;
  border-bottom: 1px solid rgba(170, 165, 136, .6);
  margin: 20px 0;
}

.bkShowCase__sideHolder {}
.bkShowCase__sideBar {
  background: wheat;
  padding: 20px;
  margin: 30px 0;
  box-sizing: border-box;
}
</style>


<? get_footer() ?>