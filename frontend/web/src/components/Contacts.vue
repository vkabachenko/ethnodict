<template>
    <div class="container">
      <section class="contact">
        <div class="container">
          <div class="contact-block">
            <div class="contact-block-left">
              <div class="contact-slogan">Оставайтесь на связи</div>
              <div class="contact-subslogan">Мы готовы ответить на любые ваши вопросы</div>
              <div class="contacts contact__contacts">
                <ul class="contacts__list">
                  <li class="contacts__item"><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="add">г. Псков, ул. Ленина, д. 8, к. 58</span></li>
                  <li class="contacts__item"><i class="fa fa-phone" aria-hidden="true"></i> <span>+7(8112) 29-70-64</span></li>
                  <li class="contacts__item"><i class="fa fa-envelope" aria-hidden="true"></i> <span><a href="mailto:bolshakova55@yandex.ru">labrfi@yandex.ru</a></span></li>
                </ul>
              </div>
            </div>
            <feedback></feedback>
          </div>
        </div>
      </section>
    </div>
</template>

<script>
import Feedback from './Feedback.vue'

export default {
  name: 'Contacts',
  components: {
    Feedback
  }
}
</script>

<style scoped>

  .contact {
    padding-bottom: 50px;
  }

  .contact .container {
    text-align: center;
  }

  .contact-block {
    display: inline-block;
    width: 1000px;
    height: 650px;
    margin-top: 80px;
  }

  .contact-block-left {
    width: 390px;
    text-align: left;
    float: left;
    height: 100%;
    background-image: url("../assets/img/contact-map.jpg");
    /*background: #7c7171;*/
    padding: 0 25px;
  }

  .contact-block-right {
    width: 608px;
    float: left;
    padding-top: 88px;
    background: #123762;
    height: 100%;
    position: relative;
  }

  .contact-slogan {
    margin-top: 88px;
    color: #2f2b2b;
    font-size: 20px;
    font-weight: bold;
  }

  .contact-subslogan {
    color: #2f2b2b;
    font-weight: bold;
    margin-top: 18px;
  }

  .contact__contacts {
    margin-left: 0;
    margin-top: 60px;
  }

  .contact__contacts .contacts__item {
    margin-top: 62px;
  }
  .contacts__item:first-child {
    margin-top: 0;
  }

  .contacts__item span,.contacts__item .fa,.contacts__item a {
    color: #2f2b2b;
  }

</style>
