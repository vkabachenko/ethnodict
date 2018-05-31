<template>
  <div class="main-page">
    <section class="hero">
      <div class="hero__header">ТРАДИЦИОННЫЙ МИР ПСКОВСКИХ КРЕСТЬЯН</div>
      <div class="container">
        <search v-if="items.length > 0" :items="items" @select="onSelect"></search>
      </div>
    </section>
    <section class="about">
      <div class="container">
        <div class="acknowledgement">
          <div class="acknowledgement__title">ПРЕДИСЛОВИЕ</div>
          <div class="acknowledgement__text">
            Первый опыт регионального этнолингвистического словаря отражает традиционный
            быт сельских жителей Псковщины. Словарь создан в научно-исследовательской лаборатории
            региональных филологических исследований Псковского государственного университета.
            В лаборатории филологического факультета сосредоточены ценнейшие материалы по диалектной
            лексике и фольклору, которые являются плодом многолетней экспедиционной работы студентов и
            преподавателей кафедр русского языка и литературы. Словарь представляет собой оригинальный
            лексикографический труд, отражающий через диалектное слово этнокультурные реалии Псковской земли.

            Основными источниками словаря являются: картотека Псковского областного словаря
            (та ее часть, которая находится в ПсковГУ); псковский диалектный и фольклорно-этнографический
            архив (рукописный фонд и фонотека). К числу источников относятся также опубликованные
            выпуски Псковского областного словаря с историческими данными (Вып. 1-21. – Л. (СПб.), 1967-2009).

            Словарь воплощает идею исторической и социокультурной значимости народной речи,
            в которой, как в зеркале, отражается вся полнота реального существования и мировосприятия человека.
            Описывая этнографически значимые слова-реалии, словарь является средоточием разнообразной
            информации о традиционной народной культуре одного региона. Вместе с тем диалектный
            и фольклорный материал, зафиксированный на территории Псковщины, обладает многими общерусскими чертами,
            что расширяет территориальные границы этнолингвистического пространства словаря.

            Записи народной речи и фольклора относятся в основном к периоду второй половины
            ХХ – начала XXI вв. Однако, воспроизводя воспоминания диалектоносителей о недавнем и отдаленном прошлом,
            отражая многочисленные ссылки на то, как жили их предки, материалы словаря тем самым охватывают
            довоенный, а отчасти и дореволюционный период. Таким образом, значительно углубляется временной
            диапазон представленных материалов, что создает необходимую для этнолингвистического словаря степень историзма.
          </div>
        </div>
        <div class="cast">
          <div class="cast__title">Состав словаря</div>
          <div class="cast__text">
            Объектом словаря являются этнографизмы – комплексные единицы, отражающие понятия
            и реалии, характерные для традиционной русской, в том числе и псковской, деревни.

            Если внимание этнографии сосредоточено на предметах мира человека, принадлежащего к определенному
            этносу или его части, то задачей лингвистики является описание наименований, отражающих мир реалий.
            Этнолингвистика как смежная и комплексная наука пытается синтезировать эти объекты.

            Определив этнографизм как категорию синкретичную, при работе над словарем необходимо было установить
            круг понятий, а следовательно и их наименований, которые могут соответствовать понятию этнографизма, т.к.
            содержание самого этого понятия не является однородным. Принято выделять две разновидности
            этнографизмов – общерусские и локальнорусские. Общенациональные этнографизмы обозначают предметы и явления
            русской жизни и русского быта, характерные для всего русского народа, воспринимаемые как типично русские
            явления, не свойственные другим народам. При определении специфики этого вида этнографизмов русский язык
            противопоставляется другим национальным языкам. Примерами таких этнографических лексем являются изба, лапти,
            сарафан и под. Локальнорусские, или собственно этнографизмы, представлены диалектными наименованиями и
            принадлежат диалектной языковой системе. Таких единиц большинство как в языке в целом, так и в материалах
            настоящего словаря: восьмикепина, ершевица, крутцовики, пуня и др.

            В словаре получили описание около 650 единиц, среди них представлены как общерусские, так и локальнорусские
            этнографизмы, что позволяет раскрыть этнолингвистическую специфику Псковщины в общенациональном контексте.

            Словник сформирован по тематическим группам с алфавитным принципом расположения заголовков словарных
            статей внутри каждой группы. Корпус первого опыта псковского этнолингвистического словаря составляют
            слова-объекты главным образом материальной культуры.
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import {apiUrl} from '@/api-server.js'
import axios from 'axios'
import Search from './Search.vue'
import alertifyjs from 'alertifyjs'
import 'alertifyjs/build/css/alertify.css'

export default {
  name: 'Main',
  components: {
    Search
  },
  data () {
    return {
      items: [],
      categories: []
    }
  },
  methods: {
    onSelect (text) {
      let id = this.items.reduce((prev, curr) => curr.title === text ? curr.id : prev, 0)
      if (!id) {
        alertifyjs.alert('Ошибка', 'Слово не найдено')
      } else {
        this.$router.push('/word/' + id)
      }
    }
  },
  mounted () {
    axios.all([axios.get(apiUrl + 'words'), axios.get(apiUrl + 'category')])
      .then(axios.spread((responseWord, responseCategory) => {
        this.items = responseWord.data
        this.$store.commit('loadItems', this.items)
        this.categories = responseCategory.data
        this.$store.commit('loadCategories', this.categories)
      }))
  }
}
</script>

<style>

body {
  background-image: url(../assets/img/main-bg.jpg);
  background-position: center;
  background-size: cover;
}

.hero {
  background-image: url("../assets/img/herobg1.jpg");
  background-position: 0 0;
  background-size: cover;
  background-repeat: no-repeat;
  padding-bottom: 320px;
}

.hero .container {
  text-align: center;
}

.hero__header {
  font-size: 30px;
  color: #fff;
  text-align: center;
  background: #9a2027;
  padding: 24.5px 0;
  position: relative;
}

.hero__header:before {
  content: "";
  display: block;
  background-image: url("../assets/img/ribon-left.png");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  height: 92px;
  width: 243px;
  position: absolute;
  top: 0;
  left: 0;
}

.hero__header:after {
  content: "";
  display: block;
  background-image: url("../assets/img/ribon-right.png");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  height: 92px;
  width: 243px;
  position: absolute;
  top: 0;
  right: 0;
}

.about {
  padding: 40px 0;
}
.about .container {
  color: #ffffff;
}

.about .container:after {
  content: "";
  display: block;
  clear: both;
}

  .acknowledgement {
    width: 500px;
    float: left;
    background-image: url("../assets/img/header-bg.jpg");
    background-position: 0 0;
    background-repeat: repeat;
    padding: 25px;
    color: #5f5b5b;
    height: 1180px;
  }

  .cast {
    width: 500px;
    float: right;
    background-image: url("../assets/img/header-bg.jpg");
    background-position: 0 0;
    background-repeat: repeat;
    padding: 25px;
    color: #5f5b5b;
    height: 1180px;
  }

  .acknowledgement__title,.cast__title {
    margin-bottom: 40px;
    font-size: 25px;
    font-weight: bold;
    text-transform: uppercase;
  }

  .acknowledgement__text,.cast__text {
    font-weight: 600;
  }
</style>
