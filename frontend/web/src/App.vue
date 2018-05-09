<template>
  <div id="app">
    <header class="header clearfix">
      <div class="container">
        <div class="logo">
          <img src="./assets/img/logo.png" alt="" class="logo__img">
        </div>
        <nav class="nav">
          <ul class="nav__list">
            <li class="nav__item">
              <router-link to="/" class="nav__link">Главная</router-link>
            </li>
            <li class="nav__item">
              <router-link to="/word" class="nav__link">Список слов</router-link>
            </li>
            <li class="nav__item">
              <router-link to="/contacts" class="nav__link">Контакты</router-link>
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

    <div class="rout-views">
      <router-view/>
    </div>

    <footer class="footer">
      <div class="container">
        <div class="logo">
          <img src="./assets/img/logo.png" alt="" class="logo__img">
        </div>
        <div class="pskovgu-logo">
          <img src="./assets/img/pskgu-icon.png" alt="" class="pskovgu-logo__img">
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
  width: 100%;
  height: 100%;
  font-size: 16px;
  position: relative;
}
/*Adjustment style here*/
html {
  font-size: 16px;
}

html, body {
  width: 100%;
  height: 100%;
}

*, *:after, *:before {
  box-sizing: border-box;
}

body {
  line-height: 1.42;
  -webkit-font-smoothing: antialiased;
  background: #ffffff;
}

ul {
  padding: 0;
  margin: 0;
}

li {
  list-style: none;
}

p {
  margin-top: 0;
}

h1, h2, h3, h4, h5, h6 {
  margin-top: 0;
  font-weight: normal;
}

.clearfix:after {
  content: "";
  display: block;
  clear: both;
}
  /*header style here*/

.header {
  background-image: url("./assets/img/header-bg.jpg");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  padding: 10px 0;
}

.logo {
  width: 110px;
  height: 78px;
  display: inline-block;
  vertical-align: middle;
}

.logo__img {
  display: block;
  max-height: 100%;
  max-width: 100%;
}

.nav {
  display: inline-block;
  vertical-align: middle;
  margin-left: 94px;
}
.nav__list {
  font-size: 0;
}

.nav__item {
  font-size: 18px;
  display: inline-block;
}

.nav__item:first-child, .nav__item:nth-child(2){
  border-right: 2px solid #123762;
}

.nav__link {
  text-transform: uppercase;
  text-decoration: none;
  font-size: 18px;
  font-weight: 600;
  display: block;
  color: #123762;
  padding: 0 10px;
}

.contacts {
  display: inline-block;
  vertical-align: middle;
  margin-left: 430px;
}

.contacts__item {
  margin-top: 10px;
}

.contacts__item:first-child {
  margin-top: 0;
}

.contacts__item .fa {
  color: #123762;
  font-size: 20px;
}

.contacts__item span {
  color: #123762;
  font-weight: 600;
  margin-left: 5px;
}

.contacts__item .add {
  margin-left: 10px;
}

.header-search {
  display: inline-block;
  margin-left: 220px;
  position: relative;
}

.header-search__input {
  height: 40px;
  width: 500px;
  border: 2px solid #123762;
  background-color: white;
  padding: 10px;
}

.header-submit {
  position: absolute;
  top: 0;
  right: 0;
  height: 40px;
  width: 50px;
  background: #123762;
  border: none;
  cursor: pointer;
}

.header-submit .fa-search {
  font-size: 25px;
  color: #ffffff;
}
  /*footer style here*/

.footer {
  background-image: url("./assets/img/footer-bg.png");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  z-index: 2;
  padding-top: 50px;
  width: 100%;
  height: 216px;
  /*position: absolute;*/
  /*bottom: 0;*/
  margin-top: 30px;
}

.container:after {
  content: "";
  display: block;
  clear: both;
}

.pskovgu-logo {
  display: inline-block;
  vertical-align: middle;
  margin-left: 100px;
}

.footer__contacts {
  margin-left: 700px;
}
</style>
