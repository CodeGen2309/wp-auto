<?php
$themeFolder = get_template_directory_uri();
$iconsFolder = "{$themeFolder}/icons";

$coolTitle = "";
?>


<section class='hots'>
  <div class='ctitle'>
    <div class="ctitle__decor ctitle__decor_one"></div>
    <div class="ctitle__decor ctitle__decor_two"></div>
    <div class="ctitle__decor ctitle__decor_tree"></div>
    <div class="ctitle__decor ctitle__decor_fore"></div>
    
    <h3 class='ctitle__text'>Косметика</h3>
  </div>
</section>


<style>
.hots {
  padding: 40px;
  width: 100%;
}

.ctitle {
  position: relative;
  margin: 0; padding: 0;
  width: 500px;
  overflow: hidden;

  display: flex;
  transition: .7s
}



.ctitle:hover .ctitle__decor_one  { width: 70%; }
.ctitle:hover .ctitle__decor_two  { width: 100%; }
.ctitle:hover .ctitle__decor_tree { width: 130%; }
.ctitle:hover .ctitle__decor_fore { width: 150%; }


.ctitle__text {
  color: white;
  font-weight: 200;
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

.ctitle__decor_one {
  width: 60%;
}

.ctitle__decor_two {
  width: 70%;
}

.ctitle__decor_tree {
  width: 80%;
}

.ctitle__decor_fore {
  width: 90%;
}
</style>



<script>
  // document.addEventListener('scroll', ent => {
  document.addEventListener('falseEvent', ent => {
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