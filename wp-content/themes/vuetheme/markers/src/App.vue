<template>
  <div id="appMap">
    <h1>A WordPress + Vue.js Integration Demo</h1>
    
    <ul class="info-container">
      <li v-for="info in markers" :key="info.name" >
        <Info :badge="info" :panel="info" />
      </li>
    </ul>

    <Map v-if="markers.length > 0" :markers="markers" />
      
  </div>
</template>

<script>
import Info from './components/Info.vue'
import Map from './components/Map.vue'
export default {
  name: 'appMap',
  components: {
    Info,
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
.info-container {
  padding-top: 60px;
  display: flex;
  justify-content: space-evenly;
  position: relative;
}
.info-container li {
  list-style-type: none;
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