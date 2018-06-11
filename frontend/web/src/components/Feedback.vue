<template>
    <div class="contact-block-right">
      <form action="#" class="contact-form" @submit.prevent="onSubmit">
        <input type="text" name="name" placeholder="Ваше имя" class="input-name" required v-model="name">
        <input type="email" name="email" placeholder="Ваша почта" class="input-email" required v-model="email">
        <textarea name="message" cols="30" rows="10" placeholder="Ваше сообщение" class="input-text" required v-model="message"></textarea>
        <div>
          <vue-recaptcha
                ref="recaptcha"
                @verify="onCaptchaVerified"
                @expired="onCaptchaExpired"
                size="invisible"
                :sitekey="recapthaSiteKey">
          </vue-recaptcha>
        </div>
        <input type="submit" value="Отправить" class="contact-submit" :disabled="status !== null">
      </form>
      <div v-if="status === 'sent'" class="sent"><i class="fa fa-check" aria-hidden="true"></i>
        <span> {{messageAfterSend}} </span>
      </div>
    </div>
</template>

<script>
import axios from 'axios'
import VueRecaptcha from 'vue-recaptcha'

export default {
  name: 'Feedback',
  components: {
    VueRecaptcha
  },
  data () {
    return {
      name: '',
      email: '',
      message: '',
      status: null,
      recapthaSiteKey: process.env.RECAPTCHA_SITE_KEY,
      messageAfterSend: 'Сообщение отправлено'
    }
  },
  methods: {
    onSubmit () {
      this.$refs.recaptcha.execute()
    },
    onCaptchaExpired () {
      this.$refs.recaptcha.reset()
    },
    onCaptchaVerified (recaptchaToken) {
      this.$refs.recaptcha.reset()
      this.status = 'pending'

      axios.post(process.env.API_URL + 'feedback/create',
        JSON.stringify({
          'name': this.name,
          'email': this.email,
          'message': this.message,
          'recaptchaToken': recaptchaToken
        }))
        .then((response) => {
          this.name = ''
          this.email = ''
          this.message = ''
          this.status = 'sent'
        })
        .catch((error) => {
          console.log(error.response)
          this.messageAfterSend = error.response
        })
    }
  }
}
</script>

<style scoped>

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

  .sent {
      color: white;
      display: inline-block;
      padding: 30px;
      background: #EF6261;
      margin-top: 20px;
      border-radius: 4px;
      font-size: 18px;
  }
  .sent .fa-check {
    margin-right: 10px;
    font-size: 20px;
    display: inline-block;
    vertical-align: middle;
  }
  .sent span {
    display: inline-block;
    vertical-align: middle;
  }

</style>
