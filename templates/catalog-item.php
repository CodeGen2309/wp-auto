<?
  /**
  * Template Name: Товар каталога
  * Template Post Type: post, page, product
  */
?>

<? get_header() ?>

<?
  $acfArr = acf_get_fields('group_6304b72c87660');
  $postFields = [];
  $postGallery = get_post_gallery($post -> id, false);
  $imagesFolder = get_template_directory_uri(). '/images';


  foreach ($acfArr as $item) {
    print("<pre>");
    print_r($item);
    print("</pre>");
    $fieldName = $item['name']; 
    $fieldLabel = $item['label']; 

    if ($fieldName == 'description') {continue;}
    $postFields[$fieldLabel] = get_field($fieldName, $post -> ID);
  }

  $catList = get_categories(['hide_empty' => false]);
?>



<section class="bkProduct">
  <h2 class="bkProduct__header"><?= $post -> post_name?></h2>

  <div class="bkProduct__gallery bkGallery">
    <div class="bkGallery__viewFrame">
          <img class="bkGallery__frameImg" src="<?= $postGallery['src']['0'] ?>" alt="">

    </div>

    <div class="bkGallery__thumbList">
      <? foreach ($postGallery['src'] as $imgSrc): ?>
        <div class="bkGallery__thumbIcon">
          <img class="bkGallery__thumbImg" src="<?= $imgSrc ?>" alt="">
        </div>
      <? endforeach; ?>
    </div>
  </div>

  <div class="bkProduct__details bkDetails">
    <div class="bkDetails__holder">
      <? foreach ($postFields as $key => $item): ?>
        <div class="bkDetails__item">
          <p class="bkDetails__name"><?= $key ?></p>
          <p class="bkDetails__value"><?= $item ?></p>
        </div>
      <? endforeach; ?>
    </div>

    <div class="bkDetails__buttons">
      <a class="bkDetails__button bkDetails__button_main" href="#">Оставить заявку</a>
      <a class="bkDetails__button bkDetails__button_alt" href="#">Вернуться в каталог</a>
    </div>
  </div>

  <div class="bkProduct__description"></div>
</section>

<section class="crossSels">
  <h2 class="crossSels__header">Вместе с этим товаром смотрят</h2>

  <div class="crossSels__products">
    <div class="bkKatalog__item bkKard">
      <img class="bkKard__img" src="<?= $imagesFolder .'/cards/1.jpg' ?>" alt="">
      <p class="bkKard__name">Boley</p>
      <p class="bkKard__description">
        Эксклюзивные камины индивидуального голландского дизайна
      </p>
      <a class="bkKard__button" href="#">Подробнее</a>
    </div>
    
    <div class="bkKatalog__item bkKard">
      <img class="bkKard__img" src="<?= $imagesFolder .'/cards/2.jpg' ?>" alt="">
      <p class="bkKard__name">Urfeuer 4FREE</p>
      <p class="bkKard__description">
        Ulrich Brunner GmbH – ведущая германская фирма 
        по производству каминов и печей
      </p>
      <a class="bkKard__button" href="#">Подробнее</a>
    </div>

    <div class="bkKatalog__item bkKard">
      <img class="bkKard__img" src="<?= $imagesFolder .'/cards/3.jpg' ?>" alt="">
      <p class="bkKard__name">Stil-Kamin 75/90</p>
      <p class="bkKard__description">
        Продукция Brunner дороже основных конкурентов в Германии
      </p>
      <a class="bkKard__button" href="#">Подробнее</a>
    </div>
  </div> 
</section>


<script>
  class bkGallery {
    constructor () {
      this.galleryItem = document.querySelector('.bkGallery')
      this.viewFrame = this.galleryItem.querySelector('.bkGallery__viewFrame')
      this.bigImg = this.galleryItem.querySelector('.bkGallery__frameImg')
      this.thumbList = this.galleryItem.querySelector('.bkGallery__thumbList')
      this.thumbsColl = this.thumbList.querySelectorAll('.bkGallery__thumbIcon')

      for (let item of this.thumbsColl) {
        item.addEventListener('click', () => this.changeImg(item))
      }

      console.log('HELLO FROM BKGALLERY')
    }

    changeImg (item) {
      let img, src

      img = item.querySelector('.bkGallery__thumbImg')
      src = img.getAttribute('src')

      this.bigImg.classList.add('bkGallery__frameImg_inactive')
      
      setTimeout(() => {
        this.bigImg.setAttribute('src', src)
        this.bigImg.classList.remove('bkGallery__frameImg_inactive')
      }, 500);
    }
  }

  window.addEventListener('load', () => {
    let gallery = new bkGallery()
  })
</script>


<style>
.bkProduct {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;

  max-width: 1175px;
  margin: 0 auto 40px auto;
}

.bkProduct__header {
  width: 100%;
  text-align: center;

  padding: 5px;
  box-sizing: border-box;
  border-bottom: 1px solid rgba(170, 165, 136, .8);
  text-transform: uppercase;
}

.bkProduct__gallery {
  width: 45%;
}

.bkGallery {
  display: flex;
  flex-direction: column;
  justify-content: stretch;
  align-items: stretch;
  gap: 10px;
}

.bkGallery__viewFrame {
  position: relative;
  height: 500px;
  flex-grow: 1;
}

.bkGallery__frameImg {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;

  position: absolute;
  border-radius: 5px;
  overflow: hidden;
  transition: .5s;
}

.bkGallery__frameImg_inactive {
  opacity: 0;
}

.bkGallery__thumbList {
  display: flex;
  gap: 10px;
}

.bkGallery__thumbIcon {
  height: 70px;
  flex-grow: 1;

  border-radius: 5px;
  overflow: hidden;

  cursor: pointer;
  transition: .3s;
}

.bkGallery__thumbIcon:hover {
  opacity: .5;
}

.bkGallery__thumbImg {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}

.bkProduct__details {
  background: rgba(170, 165, 136, .2);
  min-height: 100%;
  flex-grow: 1;
  padding: 20px;
}

.bkDetails {
  display: flex;
  flex-direction: column;
  justify-content: stretch;
  align-items: stretch;
}

.bkDetails__holder {
  flex-grow: 1;
}

.bkDetails__item {
  display: flex;
  justify-content: space-between;
  padding: 15px 0;
  border-bottom: 1px solid rgba(170, 165, 136, .8);
}

.bkDetails__name {
  font-weight: 400;
  font-size: 18px;
  margin: 0; padding: 0;
}

.bkDetails__value {
  font-weight: 300;
  font-size: 18px;
  margin: 0; padding: 0;
}

.bkDetails__buttons {
  display: flex;
  justify-content: space-between;
}

.bkDetails__button {
  display: flex;
  justify-content: center;
  align-items: center;

  width: 45%;
  text-decoration: none;
  color: inherit;

  transition: .3s;
}

.bkDetails__button_main {
  padding: 15px 0;
  background: rgba(170, 165, 136, .4);
}

.bkDetails__button_alt {
  border: 1px solid black;
}


.bkDetails__button_main:hover {
  background: rgba(170, 165, 136, 1);
  color: white;
}

.bkDetails__button_alt:hover {
  background: rgba(170, 165, 136, 1);
  border: 1px solid rgba(170, 165, 136, 0);
  color: white;
}

.bkProduct__description {
  width: 100%;
  padding: 20px;
}

.crossSels {
  max-width: 1175px;
  margin: auto;
}

.crossSels__header {
  width: 100%;
  padding: 5px;
  box-sizing: border-box;
  border-bottom: 1px solid rgba(170, 165, 136, .8); 
  text-transform: uppercase;
  font-weight: 400;
}


.crossSels__products {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}
</style>

<? get_footer() ?>