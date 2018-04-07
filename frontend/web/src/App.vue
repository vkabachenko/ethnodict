<template>
  <div id="app">
    <header class="header">
      <div class="container">
        <div class="logo">
          <img src="images/logo.png" alt="" class="logo__img">
        </div>
        <nav class="nav">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.html" class="nav__link">Главная</a>
            </li>
            <li class="nav__item">
              <a href="listofwords.html" class="nav__link">Список слов</a>
            </li>
            <li class="nav__item">
              <a href="contacts.html" class="nav__link">Контакты</a>
            </li>
          </ul>
        </nav>
        <div class="contacts">
          <ul class="contacts__list">
            <li class="contacts__item"><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="add">Адрес</span></li>
            <li class="contacts__item"><i class="fa fa-phone" aria-hidden="true"></i> <span>Телефон</span></li>
            <li class="contacts__item"><i class="fa fa-envelope" aria-hidden="true"></i> <span>Почта</span></li>
          </ul>
        </div>
      </div>
    </header>

    <div class="container">
      <router-view/>
    </div>
    <footer>
      <div class="container">
        <div class="logo">
          <img src="images/logo.png" alt="" class="logo__img">
        </div>
        <div class="pskovgu-logo">
          <img src="images/pskgu-icon.png" alt="" class="pskovgu-logo__img">
        </div>
        <div class="contacts footer__contacts">
          <ul class="contacts__list">
            <li class="contacts__item"><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="add">Адрес</span></li>
            <li class="contacts__item"><i class="fa fa-phone" aria-hidden="true"></i> <span>Телефон</span></li>
            <li class="contacts__item"><i class="fa fa-envelope" aria-hidden="true"></i> <span>Почта</span></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
}
</style>
