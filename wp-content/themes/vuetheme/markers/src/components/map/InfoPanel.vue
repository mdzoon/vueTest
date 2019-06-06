<template>
  <div class="info" :id="'info-' + name">
    <h5>{{ name }}</h5>
    <p>Information</p>
    <ul :id="'information-' + name">
      <li v-for="(value, detail) in hero_information" :key="detail.hero_information">{{ detail }}: {{ value }}</li>
    </ul>
    <p>Details</p>
    <ul :id="'basic-details-' + name">
      <li v-for="(value, detail) in hero_basic_details" :key="detail.hero_basic_details">{{ detail }}: {{ value }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'InfoPanel',
  props: {
    name: String,
    hero_information: Object,
    hero_basic_details: Object
  },
  // methods: {
  //   info:  function getInfo() {
  //   let infoPanel = document.getElementById("info-" + name);
  //   console.log(infoPanel);
  //   if (infoPanel.classList.contains("open")) {
  //     infoPanel.classList.remove("open");
  //   }
  //   while (infoPanel.lastChild) {
  //     infoPanel.removeChild(infoPanel.lastChild);
  //   }
  //   infoPanel.classList.add("open");
  //   }
  // }
}
</script>

<style scoped>
.info {
  /* position: absolute;
  right: 10px;
  bottom: 10px; */
  width: 30%;
  /* display: none; */
  display: block;
  background-color: lightgray;
  padding: 1rem;
  font-size: 0.5rem;
  border-radius: 0 0 0 10px;
  z-index: 999;
}
/* .open {
  display: block;
  width: 30%;
} */
</style>