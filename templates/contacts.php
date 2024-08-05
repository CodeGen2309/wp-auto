<?
  /**
  * Template Name: Страница контактов
  * Template Post Type: post, page, product
  */
?>


<? get_header() ?>


<?
$marks = [
  [
    'text' => 'г. Москва, ст. метро Братиславская, ул. Перерва, д. 39.',
    'coords' => [55.68,37.70],
  ],
  [
    'text' => 'г. Москва, Каширское шоссе, д. 61, к. 3А, павильон Д12',
    'coords' => [55.61,37.71],
  ],
  [
    'text' => 'г. Москва, ул. Гарбунова, д. 12, с.6, к.2, павильон В108.',
    'coords' => [55.72,37.38],
  ],
  [
    'text' => 'г. Москва, Осташковское шоссе, авторынок "Формула-91", этаж 2, павильон 15.',
    'coords' => [55.62,37.43],
  ]
];


?>


<section class="conts">
  <ul class="conts__labelList">
    <? foreach ($marks as $item): ?>
      <li class = 'conts__label'
        coords = '<?= json_encode($item['coords']) ?>'
      >
        <?= $item['text'] ?>
      </li>
    <? endforeach; ?>
  </ul>
  <div id="conts__map"></div>
</section>



<script src="https://api-maps.yandex.ru/2.0/?load=package.standard&amp;lang=ru-RU&amp;apikey=7cd93e71-cc50-4347-bdbc-c58593837c8b
" type="text/javascript"></script>




<script>
let createMark = geo => {
  return new ymaps.Placemark(geo)
}

let init = () => {
  let placeMarks = [
    createMark([55.68,37.70]),
    createMark([55.61,37.71]),
    createMark([55.72,37.38]),
    createMark([55.62,37.43]),
  ]


  let myMap = new ymaps.Map('conts__map', {
    center:[55.68,37.70],
    zoom:13,
    behaviors:['default', 'scrollZoom']
  });

  for (let mark of placeMarks) {
    myMap.geoObjects.add(mark)
  }  


  let buttons = document.querySelectorAll('.conts__label')

  for (let item of buttons) {
    let string = item.attributes.coords.value
    let coords = JSON.parse(string)

    item.addEventListener('click', () => {
      myMap.panTo(coords, {duration: 700, delay: 0})
    })
  }
}


ymaps.ready(init);
</script>




<style>
  .conts {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40;

    padding-top: 120px;
    list-style: none;

    width: 100vw;
    min-height: 80vh;
    color: white;
  }


  .conts__labelList {
    list-style: none;

    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
    gap: 40px;
  }

  .conts__label {
    cursor: pointer;
    width: 200px;
    flex-grow: 1;

    border-radius: 4px;
    border: 1px solid rgba(255, 255, 255, .4);
    padding: 20px 40px;
  }

  #conts__map {
    height: 90vh;
    margin: 40px;
    box-sizing: border-box;
    border-radius: 20px;
    overflow: hidden;
    flex-grow: 1;
  }


  @media (width < 900px) {
    .conts {
      flex-direction: column-reverse;
      padding: 40px;
      padding-top: 100px;
      box-sizing: border-box;
    }

    .conts__labelList {
      flex-direction: row;
      justify-content: space-between;
    }

    .conts__label {
      width: 30%;
      flex-grow: 1;
      gap: none;
    }

    #conts__map {
      width: 100%;
      box-sizing: border-box;
      /* min-height: 800px; */
    }
  }
</style>



<? wp_footer() ?>