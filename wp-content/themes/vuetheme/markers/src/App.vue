<template>
  <div id="appMap">
    <h1>A WordPress + Vue.js Integration Demo</h1>
    
    <ul class="info-container">
        <app-badge v-for="badge in markers" :key="badge.name" :badge="badge" />
    </ul>

    <app-map v-if="markers.length > 0" :markers="markers" />
      
  </div>
</template>

<script>
import Badge from './components/Badge.vue';
import Map from './components/Map.vue';

export default {
  name: 'appMap',
  components: {
    'app-badge': Badge,
    'app-map': Map,
  }, 
  data() {
    return {
      markers: [], 
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
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: space-evenly;
}
@media only screen and (max-width: 600px) {
  .info-container {
    flex-direction: column;
  }
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

.info-wrapper {
 cursor: pointer;
 position: relative;
}

ul {
  list-style: none;
}

li {
  text-transform: capitalize;
}
</style>