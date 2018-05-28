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
                  <li class="contacts__item"><i class="fa fa-phone" aria-hidden="true"></i> <span>Телефон</span></li>
                  <li class="contacts__item"><i class="fa fa-envelope" aria-hidden="true"></i> <span>bolshakova55@yandex.ru</span></li>
                </ul>
              </div>
            </div>
            <div class="contact-block-right">
              <form action="" class="contact-form">
                <input type="text" placeholder="Ваше имя" class="input-name">
                <input type="email" placeholder="Ваша почта" class="input-email">
                <textarea name="" id="" cols="30" rows="10" placeholder="Ваше сообщение" class="input-text"></textarea>
                <input type="submit" value="Отправить" class="contact-submit">
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
</template>

<script>

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
    /*background-image: url("../images/map.png");*/
    background: #7c7171;
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

  .contact-block-right:before {
     content: "";
     display: block;

     border-top: 27px solid transparent;
     border-bottom: 27px solid transparent;
     border-right: 27px solid #123762;
     width: 0;
     height: 0;
     position: absolute;
     z-index: 3;
     right: 100%;
   }

  .contact-slogan {
    margin-top: 88px;
    color: #ffffff;
    font-size: 20px;
    font-weight: bold;
  }

  .contact-subslogan {
    color: #ffffff;
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

  .contacts__item span,.contacts__item .fa {
    color: #ffffff;
  }

  .contact-form {
    padding: 0 50px;
  }

  .input-name {
    display: block;
    width: 100%;
    height: 70px;
    border-radius: 3px;
    padding: 20px;
    border: none;
  }

  .input-email {
    display: block;
    width: 100%;
    height: 70px;
    border-radius: 3px;
    padding: 20px;
    margin-top: 30px;
    border: none;
  }

  .input-text {
    display: block;
    width: 100%;
    margin-top: 30px;
    border-radius: 3px;
    resize: none;
    padding: 20px;
    border: none;
  }

  .contact-submit {
    display: block;
    width: 100%;
    height: 70px;
    margin-top: 30px;
    border-radius: 35px;
    border: none;
    background: #fff;
    font-size: 20px;
    color: #123762;
    font-weight: 600;
    cursor: pointer;
  }

</style>
