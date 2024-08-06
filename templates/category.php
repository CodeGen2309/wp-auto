<?
  /**
  * Template Name: Страница брэнда
  * Template Post Type: post, page, product
  */
?>

<? 
  $imgFolder = get_template_directory_uri(). '/img';
  $iconsFolder = get_template_directory_uri(). '/icons';
  $brand = $_GET['brand'];

  
  $cat = get_term_by( 'slug', $brand, 'product_cat');
  $thumb_id = get_term_meta( $cat -> term_id, 'thumbnail_id', true);
  $thumb_link = wp_get_attachment_image_url( $thumb_id, 'full');
  $title = $cat -> name;

?>

<? get_header() ?>

<section class="cat__bullet">
	<img src="<?= $thumb_link ?>" class="cat__img">
	<div class="cat__cover"></div>
	
	<h1 class="cat__title"><?= $title ?></h1>
	<p class="cat__footNote">
		Здесь будет описание брэнда
	</p>

  <label class="cat__search">
    <img class="cat__searchIcon" src="<?= $iconsFolder ?>/search.png">
    <input type="text" class="cat__searchInput">
  </label>
</section>


<section class="tiles__holder">
  <? get_template_part( 'parts/tiles' ) ?>
</section>


<? get_template_part( 'parts/hots' ) ?>
<? get_template_part( 'parts/hots' ) ?>
<? get_template_part( 'parts/hots' ) ?>
<? get_template_part( 'parts/hots' ) ?>


<style>
body {
  color: white;
}

.cat__bullet {
  position: fixed;
  padding: 20px;
  top: 0; left: 0;

  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 20px;

  width: 100%; height: 90vh;
  max-width: 100%;
  box-sizing: border-box;
}

.cat__img {
  position: absolute;
  width: 100%; height: 100%;

  object-fit: cover;
  object-position: center;
}

.cat__cover {
  position: absolute; 
  width: 100%; height: 100%;

  background: rgba(0, 0, 0, .7);
  backdrop-filter: blur(5px);
}

.cat__title {
  position: relative;
  color: white;
  font-size: 60px;
  padding: 0; margin: 0;
  text-align: center;
  padding-top: 40px;
}

.cat__footNote {
  position: relative;
  text-align: center;
  color: white;
  font-size: 24px;
  margin: 0; padding: 0;
  font-weight: 100;
}


.cat__search {
  position: relative;
  display: flex;
  box-sizing: border-box;

  width: 500px;
  max-width: 100%;

  background: white;
  border-radius: 10px;
  overflow: hidden;
  margin: 30px auto;
}


.cat__searchInput {
  border: none;
  outline: none;
  flex-grow: 1;
  font-size: 16px;
  font-weight: 100;
  padding: 10px 0;
}


.cat__searchIcon {
  width: 20px;
  padding: 15px 20px;
  opacity: .3;
}


.tiles__holder {
  padding-top: 85vh;
  position: relative;
  min-height: 70vh;
  height: 70vh;
}


@media (width < 500px) {
  .cat__bullet {
    gap: 40px;
  }

  .tiles__holder {
    height: 200vh;
  }

  .cat__footNote {
  }
}


</style>



<script>

  document.addEventListener('DOMContentLoaded', () => {
    let duration = 1
    let delay = '-0.6'
  
    let animLine = [
      [
        '.cat__title',
        { 
          translateY: [-100, 0],
          opacity: [0, 1]
        },
        {duration, at: delay}
      ],
      [
        '.cat__footNote',
        { 
          opacity: [0, 1]
        },
        {duration, at: delay}
      ],
      [
        '.cat__search',
        { 
          opacity: [0, 1]
        },
        {duration, at: delay}
      ],
    ]
  
    Motion.timeline(animLine)
  
    Motion.scroll((info) => {
      let img = document.querySelector('.cat__img')
      let title = document.querySelector('.cat__title')
      let note = document.querySelector('.cat__footNote')
      let search = document.querySelector('.cat__search')
      let cover = document.querySelector('.cat__cover')


      
      let textFade = 1 - window.scrollY / 100
      let textValue = textFade || 1 

      let backFade = 1 - window.scrollY / 500
      let backValue = backFade || 1 
  
      title.style = `opacity: ${textValue} `
      note.style = `opacity: ${textValue} `
      search.style = `opacity: ${textValue} `

      cover.style = `opacity: ${backValue} `
      img.style = `opacity: ${backValue} `
    })
  })
  
  </script>
  

<? get_footer() ?>