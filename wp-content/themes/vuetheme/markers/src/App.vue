<template>
  <div id="appMap">
    <h1>A WordPress + Vue.js Integration Demo</h1>
    <div class="badge-container">
      <div v-for="badge in markers" :key="badge.name">
        <Badge :name="badge.name" :image="badge.image" />
      </div>
    </div>

    <Map v-if="markers.length > 0" :markers="markers" />
    
    <div class="infoPanel-container">
      <div v-for="info in markers" :key="info.name">
        <InfoPanel :name="info.name" :hero_information="info.hero_information" :hero_basic_details="info.hero_basic_details" />
      </div>
    </div>

  </div>
</template>

<script>
import Badge from './components/Badge.vue'
import Map from './components/Map.vue'
import InfoPanel from './components/InfoPanel.vue'
export default {
  name: 'appMap',
  data(){
    return {
      markers: [],
    }
  },
  components: {
    Badge,
    Map,
    InfoPanel
  },
  mounted(){
    fetch('http://localhost/vueTest/wp-json/markers/v1/post')
      .then((r) => r.json())
      .then((res) => this.markers = res.map(x => x.acf))
  }
}
</script>

<style>
.badge-container {
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
#mapFooter{
  margin-top: 20px;
  text-align: center;
  text-decoration: none;
  color: 212121;
}
</style>