<?php
$themeFolder = get_template_directory_uri();
$iconsFolder = "{$themeFolder}/icons";



$cat_id = isset($args['cat_id'])? $args['cat_id'] : 30;
$cat = get_term_by( 'id', $cat_id, 'product_cat');
$text = $cat -> name;


$title = [
  'text'  => $text,
  'class' => 'hots__titleText',
  'step'  => 5,
  'onhover' => false,
];


$query_args = array(
  'post_type' => 'product',
  'fields' => 'id',
  'tax_query' => [
    [
      'taxonomy' => 'product_cat',
      'field' => 'slug',
      'terms' => $cat -> slug, 
    ]
  ],
); 


$the_query = new WP_Query( $query_args );

$prodList = [];
foreach ($the_query -> posts as $post) {
  $id = $post -> ID;
  $postTitle = $post -> post_title;
  $img = get_the_post_thumbnail_url($id, 'full');
  $prodItem = wc_get_product($id);
  $price = $prodItem -> price;

  $prodList[] = [
    'id' => $id,
    'title' => $postTitle,
    'img' => $img,
    'price' => $price,
  ];
};


?>

<section class='hots'>
  <div class="hots__title">
    <? get_template_part('/parts/coolTitle', null, $title)?>
  </div>

  <ul class="hots__list">
    <? foreach ($prodList as $item): ?>
      <li class="hots__listItem">
        <div class="hots__listCover">
          <img class="hots__listImg" src="<?= $item['img'] ?>">
          <p class="hots__listPrice"><?= $item['price'] ?>₽</p>  
        </div>
        <p class="hots__listTitle"><?= $item['title'] ?></p>
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

  list-style: none;
  padding: 40px 20px;
  margin: 10px auto;
}

.hots__listItem {
  display: flex;
  flex-direction: column;
  position: relative;
  margin: 40px 20px;

  transition: .3s;
}

.hots__listCover {
  position: relative;
  width: 200px; height: 250px;
  background: white;
}


.hots__listImg {
  width: 100%; height: 100%;
  object-fit: contain;
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
  max-width: 300px;
  max-height: 60px;
  padding: 10px 0;
  box-sizing: border-box;
  overflow: hidden;
  text-overflow: ellipsis;
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


@media (width < 700px) {
  .hots__list {
    justify-content: center;
  }

  .hots__listItem {
    width: 90%;
    margin: 40px 0; padding: 0;
  }

  .hots__listCover {
    width: 100%;
  }

  .hots__listImg {
    object-fit: contain;
    background: white;
  }

  .hots__listBuy {
    padding: 20px 10px;
    text-align: center;
  }
}
</style>