<section class="asf__footer asfoot">
  <a href="tel:+79850876243" class="asfoot__phone">
    <p class="asfoot__phoneText">+7 985 087 62 43</p>
  </a>

  <p class="asfoot__address">г. Москва, Осташковское шоссе, "Формула-91"</p>
</section>


<style>
.asf__footer {
  background: black;
  color: white;
  padding: 10px;
}

.asfoot {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.asfoot__phone {
  color: inherit;
  text-decoration: none;
}

.asfoot__address {
  margin: 0; padding: 0;
}


@media (width < 700px) {
  .asfoot__address { display: none; }
}



</style>


<? wp_footer() ?>