<?php

$themeFolder = get_template_directory_uri();
$imgFolder   = "{$themeFolder}/img";
$tilesFolder = "{$imgFolder}/tiles";

$mocks = [
  [
    'title' => 'Косметика',
    'img' => "{$tilesFolder}/kosmetic.jpg",
    'size' => "large",
  ],
  [
    'title' => 'Масла',
    'img' => "{$tilesFolder}/oil.jpg",
    'size' => "small",
  ],
  [
    'title' => "Инструменты",
    'img' => "{$tilesFolder}/tools.jpg",
    'size' => "small",
  ],
  [
    'title' => "Колеса",
    'img' => "{$tilesFolder}/wheels.jpg",
    'size' => "wide",
  ],
];


$tiles = isset($args['tiles'])? $args['tiles'] : $mocks;


?>

<div class="tiles">
  <? foreach ($tiles as $item): ?>
    <? 
      $params = [
        'text' => $item['title'], 'step' => 14,
        'class' => 'tiles__itemTitle'
      ] 
    ?>

    <div class="tiles__item tiles__item_<?= $item['size'] ?>">
      <img class="tiles__img" src="<?= $item['img'] ?>">
      <div class="tiles__title">
        <? get_template_part( '/parts/coolTitle', null, $params ); ?>
      </div>
    </div>
  <? endforeach; ?>
      </div>



<style>

.tiles {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  gap: 20px;
  height: 100%;



  padding: 20px;
}

.tiles__item {
  position: relative;
  display: flex;
  flex-direction: column-reverse;

  border: 1px solid rgba(255, 255, 255, .6);
  border-radius: 6px;
  overflow: hidden;
}

.tiles__item:hover .ctitle__decor_one  { width: 70%;  }
.tiles__item:hover .ctitle__decor_two  { width: 100%; }
.tiles__item:hover .ctitle__decor_tree { width: 130%; }
.tiles__item:hover .ctitle__decor_fore { width: 150%; }

.tiles__img {
  object-fit: cover;
  object-position: center;
}


.tiles__item_small {

}

.tiles__item_wide {
  grid-column: span 2;
}

.tiles__item_large {
  grid-column: span 2;
  grid-row: span 2;
}

.tiles__itemTitle {
  margin: 0; padding: 20px;
}



.tiles__img {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
}

.tiles__title {
}

@media (width < 1100px) {
  .tiles {
    grid-template-columns: 1fr 1fr;
    min-height: max-content;
  }  

}



@media (width < 500px) {
  .tiles {
    grid-template-columns: 1fr;
    min-height: max-content;
  }  

  .tiles__item_small {
    grid-column: span 1;
    grid-row: span 1;
  }

  .tiles__item_wide {
    grid-column: span 1;
    grid-row: span 1;
  }

  .tiles__item_large {
    grid-column: span 1;
    grid-row: span 1;
  }
}


</style>


