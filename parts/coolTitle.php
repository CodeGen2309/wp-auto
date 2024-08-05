<?php
$themeFolder = get_template_directory_uri();
$iconsFolder = "{$themeFolder}/icons";

$class = isset($args['class'])? $args['class'] : null;
$text = isset($args['text'])? $args['text'] : 'rapapap';
$step = isset($args['step'])? $args['step'] : 20;
$onhover = isset($args['onhover'])? $args['onhover'] : true;

?>

<div class='ctitle'>
  <div class="ctitle__decor ctitle__decor_one"></div>
  <div class="ctitle__decor ctitle__decor_two"></div>
  <div class="ctitle__decor ctitle__decor_tree"></div>
  <div class="ctitle__decor ctitle__decor_fore"></div>

  <h3 class = 'ctitle__text <?= $class ?>' ><?= $text ?></h3>
</div>


<style>

.ctitle {
  position: relative;
  margin: 0; padding: 0;
  overflow: hidden;
  color: white;

  display: flex;
  transition: .7s
}


<? if ($onhover): ?>
  .ctitle:hover .ctitle__decor_one  { width: 70%;  }
  .ctitle:hover .ctitle__decor_two  { width: 100%; }
  .ctitle:hover .ctitle__decor_tree { width: 130%; }
  .ctitle:hover .ctitle__decor_fore { width: 150%; }
<? endif; ?>


.ctitle__text {
  color: white;
  font-weight: 300;
  justify-self: center;
  align-self: center;
  position: relative;

  margin: 0; padding: 10px 30px;
  transition: .5s
}

.ctitle__decor {
  position: absolute;
  top: 0; left: 0;
  height: 100%;

  background: rgba(34, 124, 133, .2);
  transform: skewX(60deg) translateX(-25%);
  transition: .5s
}

.ctitle__decor_one  { width: 60%; }
.ctitle__decor_two  { width: <?= 60 + $step ?>%; }
.ctitle__decor_tree { width: <?= 60 + $step * 2 ?>%; }
.ctitle__decor_fore { width: <?= 60 + $step * 3 ?>%; }

</style>