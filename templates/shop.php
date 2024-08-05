<?
  /**
  * Template Name: Страница магазина
  * Template Post Type: post, page, product
  */
?>

<?
  $themeFolder = get_template_directory_uri();
  $imgFolder = "{$themeFolder}/img";
  $iconsFolder = "{$themeFolder}/icons";

?>


<? get_header() ?>



<section class="market__bullet mBlt"
  style='background-image: url(<?= $imgFolder ?>/shop.jpg)'
>
  <div class="mBlt__filter"></div>
    <h1 class="mBlt__title">Магазин AutoSfera</h1>
    <p class="mBlt__desc">
      Просто укажите то, что вы ищите
    </p>
    <br><br>    
  </div>

  <label class="mBlt__search">
    <img class="mBlt__searchIcon" src="{{ $iconsFolder }}/search.png">
    <input type="text" class="mBlt__searchInput">
  </label>
  
</section>

<? get_template_part('/parts/brands')?>


<section class="market__hotSells mHs">
<? get_template_part('/parts/hots')?>
</section>

<section class="market__callForm mcf">
  <h1 class="mcf__title">
    Узнайте об акциях и скидках первыми!
  </h1>

  <p class="mcf__desc">
    Один раз в месяц мы будем присылать вам информацию о <br>
    наших последних коллекциях, скидках и акциях. Обещаем быть полезными!
  </p>

  <div class="mcf__form">
    <input
      type="text" class="mcf__input"
      placeholder="Ваш email"
    >

    <button class="mcf__button">Подписаться</button>
  </div>
</section>



<script>
document.addEventListener('DOMContentLoaded', async () => {
  Motion.animate(
    '.mBlt__title',
    {
      translateY: [200, 0],
      opacity: [0, 1]
    },
    { duration: 1},
  )
  Motion.animate(
    '.mBlt__desc',
    {
      translateY: [200, 0],
      opacity: [0, 1]
    },
    { duration: 1.4, delay: 0.2},
  )
  Motion.animate(
    '.mBlt__search',
    {
      translateY: [200, 0],
      opacity: [0, 1]
    },
    { duration: 1.2, delay: 0.6},
  )

  Motion.inView('.mBnd__brand', info => {
    Motion.animate(
      info.target,
      { opacity: 1 },
      { duration: 2 },
    )
  })
})
</script>


<? get_footer() ?>