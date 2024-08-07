<?php
$themeFolder = get_template_directory_uri();
$brandFolder = "{$themeFolder}/img/brands";
$iconsFolder = "{$themeFolder}/icons";

$brands = [
  [
    'title' => 'BMW', 'link' => '/brand?brand=bmw', 
    'img' => "{$brandFolder}/bmw.jpg"
  ],
  
  [
    'title' => 'Mercedes', 'link' => '/brand?brand=mercedes', 
    'img' => "{$brandFolder}/mercedes.jpg"
  ],
  
  [
    'title' => 'Audi', 'link' => '/brand?brand=audi', 
    'img' => "{$brandFolder}/audi.jpg"
  ],
  
  [
    'title' => 'Toyota', 'link' => '/brand?brand=toyota', 
    'img' => "{$brandFolder}/toyota.jpg"
  ],
  
  [
    'title' => 'Hyundai', 'link' => '/brand?brand=hyundai', 
    'img' => "{$brandFolder}/hyundai.jpg"
  ],
  
  [
    'title' => 'Nissan', 'link' => '/brand?brand=nissan', 
    'img' => "{$brandFolder}/nissan.jpg"
  ],
  
  [
    'title' => 'Porshe', 'link' => '/brand?brand=porshe', 
    'img' => "{$brandFolder}/porshe.jpg"
  ],
  
  [
    'title' => 'KIA', 'link' => '/brand?brand=kia', 
    'img' => "{$brandFolder}/kia.jpg"
  ]  
];

?>


<ul class="brands__list">
  <? foreach ($brands as $item): ?>
    <a class="brands__item bnd" href="<?= $item['link'] ?>">
      <img class="bnd__image" src = "<?= $item['img'] ?>">
      <div class="bnd__cover"></div>
      <p class="bnd__title"><?= $item['title'] ?></p>
  </a>
  <? endforeach; ?>
</ul>


<script>
  let tiles = document.querySelectorAll('.bnd')


  document.addEventListener('scroll', ent => {
    for (let id in tiles) {
      if (id == 'entries') { return false }

      let rect = tiles[id].getBoundingClientRect()
      let fadeValue = (rect.y + rect.height) / 150 - 1

      let styles = {}


      if ( rect.top < window.innerHeight / 2) {
        styles.opacity = fadeValue
      }

      let styleString = ` opacity: ${styles.opacity} `
      tiles[id].style = styleString
    }
  })
</script>



<style>
.brands {}

.brands__list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;

  margin: 0; padding: 0;
  list-style: none;
}

.bnd {
  position: relative;
  overflow: hidden;
  width: 40%;
  flex-grow: 1;

  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;

  color: white;
  font-size: 40px;

  height: 40vh;
  transition: .3s;
  cursor: pointer;
}

.bnd:hover {
  flex-grow: 2;
}

.bnd:hover .bnd__cover {
  background: rgba(0, 0, 0, .2);
}

.bnd__image {
  position: absolute;
  width: 100%; height: 100%;

  object-fit: cover;
  object-position: center;
  transition: .3s;
}

.bnd__cover {
  position: absolute;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, .4);
  transition: .3s;
}

.bnd__title {
  position: relative;
}

@media (max-width: 500px) {
  .brands__list {
    flex-wrap: wrap;
    /* gap: 10px; */
  }

  .bnd {
    width: 100%;
    animation: bubbleAnim linear both;
    animation-timeline: view();
  }

  .bnd__cover {
  }
}

@keyframes bubbleAnim {
  0% { height: 0; }

  50% { 
    height: 60vh;
  }

  100% { height: 30vh; }
}

</style>