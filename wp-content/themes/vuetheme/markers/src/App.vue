<template>
  <div id="appMap">
    <h1>A WordPress + Vue.js Integration Demo</h1>
    <div class="badges-container">
      <div v-for="info in markers" :key="info.name">
        <Badge :name="info.name" :image="info.image" @open="openPanel" />
      </div>
    </div>

    <div class="panels-container">
      <div v-for="info in markers" :key="info.name">
        <Panel :name="info.name" :hero_information="info.hero_information" :hero_basic_details="info.hero_basic_details" v-if="isVisible" @close="closePanel"/>
      </div>
    </div>

    <Map v-if="markers.length > 0" :markers="markers" />
      
  </div>
</template>

<script>
import Badge from './components/Badge.vue'
import Panel from './components/Panel.vue'
import Map from './components/Map.vue'
export default {
  name: 'appMap',
  components: {
    Badge,
    Panel,
    Map
  }, 
  data() {
    return {
      markers: [],
      isVisible: false
    }
  },
  methods: {
    openPanel() {
      this.isVisible = true
    },
    closePanel() {
      this.isVisible = false
    }
  },
  mounted() {
    fetch('http://localhost/vueTest/wp-json/markers/v1/post')
      .then((r) => r.json())
      .then((res) => this.markers = res.map(x => x.acf))
  }
}
</script>

<style>
.badges-container {
  padding-top: 60px;
  display: flex;
  justify-content: space-evenly;
}
html, body {
    margin: 0;
    height: 100%;
    background-color: #FAFAFA;
    font-family: 'Roboto', sans-serif;
}
#appMap > h1 {
  text-align: center;
  color: 212121;
}
#appMap {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.map-container {
  position: relative;
}
#mapFooter{
  margin-top: 20px;
  text-align: center;
  text-decoration: none;
  color: 212121;
}
</style>