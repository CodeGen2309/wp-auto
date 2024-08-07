<?php
$themeFolder = get_template_directory_uri();
$iconsFolder = "{$themeFolder}/icons";
?>

<label class="nirx">
  <img class="nirx__searchIcon" src="<?= $iconsFolder ?>/search.png">
  <input type="text" class="nirx__searchInput">
</label>



<script>
let openSession = async () => {
  let url, req, res

  url = `
    http://web.nirax.ru/api/index.php?
    action=sessionOpen&
    login=jrjcdr&
    password=ZaEbAlI2309&
    keySoftware=Cross
  `

  req = await fetch(url)
  res = null

  if (req.ok) { res = await req.json() }
  else { console.log(req) }
  return res
}

let closeSession = async session => {
  let url, res, req
  
  url = `
    http://web.nirax.ru/api/index.php?
    action=sessionClose&
    login=jrjcdr&
    password=ZaEbAlI2309&
    keySoftware=Cross&
    idSession=${session}
  `

  req = await fetch(url)
  res = null

  if (req.ok) { res = await req.json() }
  else { console.log(req) }
  return res
}

let getArticle = async (session, code) => {
  let url, res, req
  
  url = `
    http://web.nirax.ru/api/index.php?
    action=getArticlesSearchCode&
    idSession=${session}&
    keySoftware=Cross&
    FoundString=${code}
  `
  req = await fetch(url)
  res = null

  if (req.ok) { res = await req.json() }
  else { console.log(req) }
  return res
}


let niraxSearch = async code => {
  let open = await openSession()
  let sessionID = open.idSession

  let article = await getArticle(sessionID, code)
  let close = await closeSession(sessionID)
  return article
}


let createContainer = (top, left, width) => {
  let container = document.createElement('div')
  container.classList.add('search__container')
  container.style = `
    position: absolute;
    top: ${top + 20}; left: ${left};
    width: ${width}
  `

  return container
}

let createInner = () => {
  let inner = document.createElement('code')
  inner.classList.add('search__inner')
  return inner
}

let getCoords = elem => {
  let box = elem.getBoundingClientRect();

  return {
    top: box.top + window.pageYOffset,
    right: box.right + window.pageXOffset,
    bottom: box.bottom + window.pageYOffset,
    left: box.left + window.pageXOffset,
    width: box.width
  };
}



document.addEventListener('DOMContentLoaded', async () => {
  let code, search, data, timeout,
  input, holder, rect, container

  timeout = null
  input = document.querySelector('.nirx__searchInput')
  holder = document.querySelector('.nirx')
  rect = null
  container = null

  
  input.addEventListener('input', () => {
    let text = input.value

    if (text.length < 7) { return false}

    console.log('changed');
    clearTimeout(timeout)
    
    timeout = setTimeout(async () => {
      if (container != null) {
        document.body.removeChild(container)
        container = null
      }

      rect = getCoords(holder)
      container = createContainer(
        rect.bottom, rect.left, rect.width
      )

      search = await niraxSearch(input.value)
      data = search.data
      console.log({data})

      container.append(JSON.stringify(data))
      document.body.append(container)
    }, 1000);
    
  })

  // code = 'A6420943004'
  // search = await niraxSearch(code)
  // data = search.data
  // console.log({data});
})


</script>



<style>
.nirx {
  position: relative;
  display: flex;
  box-sizing: border-box;

  width: 100%;
  max-width: 100%;

  background: white;
  border-radius: 10px;
  overflow: hidden;
  margin: 30px auto;
}


.nirx__searchInput {
  border: none;
  outline: none;
  flex-grow: 1;
  font-size: 16px;
  font-weight: 100;
  padding: 10px 0;
}


.nirx__searchIcon {
  width: 20px;
  padding: 15px 20px;
  opacity: .3;
}

.search__container {
  background: rgba(255, 255, 255, .9);
  /* background: white; */
  padding: 20px;
  box-sizing: border-box;
  border-radius: 10px;
  overflow: hidden;

  animation: fadeDown .3s linear both;
  transition: .3s;
}

@keyframes fadeDown {
  0% {
    opacity: 0;
    transform: translateY(-40px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>