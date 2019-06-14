<template>
  <div class="info" :id="'info-' + name">
    <h4>{{ name }}</h4>
    <p>Personal information:</p>
    <ul :id="'information-' + name">
      <li v-for="(value, detail) in hero_information" :key="detail.hero_information">{{ detail = detail.replace(/_/g, ' ') }}: {{ value }}</li>
    </ul>
    <p>Physical details:</p>
    <ul :id="'basic-details-' + name">
      <li v-for="(value, detail ) in hero_basic_details" :key="detail.hero_basic_details">{{ detail = detail.replace(/_/g, ' ') }}: {{ value }}</li>
    </ul>
    <button type="button" @click="close" aria-label="Close panel">X</button>
  </div>
</template>

<script>
export default {
  name: 'Panel',
  methods: {
    close() {
      this.$emit('close');
    },
  },
  props: {
    name: String,
    hero_information: Object,
    hero_basic_details: Object
  },
}
</script>

<style scoped>
.info {
  /* position: absolute;
  right: 10px;
  bottom: 10px; */
  width: 40%;
  /* display: none; */
  display: block;
  background-color: lightgray;
  padding: 0.5rem;
  font-size: 0.5rem;
  border-radius: 0 0 0 10px;
  z-index: 999;
}
/* .open {
  display: block;
  width: 30%;
} */
ul {
  list-style: none;
}
li {
  text-transform: capitalize;
}
li:not(:last-child) {
  margin-bottom: 10px;
}
</style>