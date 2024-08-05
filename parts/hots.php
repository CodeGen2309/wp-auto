<?php
$themeFolder = get_template_directory_uri();
$iconsFolder = "{$themeFolder}/icons";

$title = [
  'text'  => 'Масла',
  'class' => 'hots__titleText',
  'step'  => 5,
  'onhover' => false,
];


$productsFile = file_get_contents("{$themeFolder}/mocks/testProducts.json");
$products = json_decode($productsFile);

?>

<section class='hots'>
  <div class="hots__title">
    <? get_template_part('/parts/coolTitle', null, $title)?>
  </div>

  <ul class="hots__list">
    <? foreach ($products as $item): ?>
      <?
        $img = "{$themeFolder}/{$item -> image}";
        $title = $item -> title;
        $price = $item -> price;
      ?>

      <li class="hots__listItem">
        <div class="hots__listCover">
          <img class="hots__listImg" src="<?= $img ?>">
          <p class="hots__listPrice"><?= $price ?>₽</p>  
        </div>
        <p class="hots__listTitle"><?= $title ?></p>
        <a class="hots__listBuy" href="#">В корзину</a>
      </li>
    <? endforeach; ?>
  </ul>

</section>


<style>
.hots {
  padding: 60px 0;
  width: 100%;
  color: white;
}

.hots__title {
}

.hots__titleText {
  padding: 15px 30px;
  font-size: 30px;
  font-weight: 300;
}

.hots__list {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 40px;

  list-style: none;
  padding: 40px 20px;
  margin: 10px auto;
}

.hots__listItem {
  display: flex;
  flex-direction: column;
  position: relative;

  transition: .3s;
}

.hots__listCover {
  position: relative;
  width: 200px; height: 250px;
}


.hots__listImg {
  width: 100%; height: 100%;
  object-fit: cover;
  object-position: center;
  border-radius: 2px;
}

.hots__listPrice {
  position: absolute;
  bottom: 0; right: -10px;
  padding: 6px 30px;
  

  margin: 0;
  color: white;
  z-index: 9;
  transition: .3s;
}


.hots__listPrice::after {
  content: '';
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(34, 124, 133, 1);
  z-index: -1;

  transform: skewX(40deg);
  box-shadow: 0 0 10px 2px rgba(0, 0, 0, .3);
}


.hots__listTitle {
  font-size: 21px;
  font-weight: 100;
}

.hots__listBuy {
  padding: 10px 20px;
  font-size: 16px;
  background: rgba(34, 124, 133, 1);
  border-radius: 2px;
  text-decoration: none;
  color: inherit;
  transition: .3s;
}

.hots__listBuy:hover {
  background: rgb(47, 177, 189);
}


@media (width > 1300px) {
  .hots {}

  .hots__list {
    justify-content: space-around;
  }

  .hots__listCover {
    width: 300px;
    height: 400px;
  }

  .hots__listBuy {
    padding: 15px;
  }
}
</style>