<template>
  <div id='map' class='map'>
    <button id='resetBtn'><img src='http://localhost/vueTest/wp-content/themes/vuetheme/markers/src/assets/globe-icon.png' /></button>
    <!-- <button id='resetBtn'><img src='./../assets/globe-icon.png' /></button> for production  -->
    <app-panel v-for="panel in markers" :key="panel.name" :panel="panel"/>
  </div>
</template>

<script>
import Panel from './Panel.vue';

export default {
  name: 'Map',
  components: {
    'app-panel': Panel
  },
  mounted() {
          
    window.mapboxgl.accessToken = "pk.eyJ1IjoibWR6b29uIiwiYSI6ImNqdmJhemU2eDB5a2E0Nm1tNGdqNzg2eHkifQ.q7SipboLEjFT7jtWP_WjGw";	
    
    let map = new window.mapboxgl.Map( {
        container: 'map',
        style: 'mapbox://styles/mapbox/dark-v9',
        center: [ 0.0, 0.0 ], 
        zoom: 1
    } );
    
    map.on( 'load', ( () => {

        this.markers.forEach( (marker) => {
          let name = marker.name;
          let el = document.createElement('div');
          el.className = "marker";
          el.id = "marker-" + name;
          let iconName = name.replace(/ /g, '-');
          //el.setAttribute("style", "background-image: url( './../assets/" + name + "-icon.png')"); for production
          el.setAttribute("style", "background-image: url( 'http://localhost/vueTest/wp-content/uploads/2019/05/" + iconName + "-icon.png')"); 
          new window.mapboxgl.Marker(el)
            .setLngLat( [parseFloat(marker.latitude), parseFloat(marker.longitude)] )
            .addTo(map);
          el.addEventListener( 'click', () => {
            map.flyTo( {
              center: [parseFloat(marker.latitude), parseFloat(marker.longitude)],
              zoom: 12
            } );

          } );
        });
        
        this.markers.forEach( (marker) => {
          let el = document.getElementById( marker.name );
          el.addEventListener( 'click', () => {
            map.flyTo( {
              center: [parseFloat(marker.latitude), parseFloat(marker.longitude)],
              zoom: 4
            } );
          } );
        })

        const resetBtn = document.getElementById('resetBtn')
        resetBtn.addEventListener( 'click', () => {
          map.flyTo( {
            center: [ 0.0, 0.0 ], 
            zoom: 1
          } )
        ;} )

    }).bind(this));

  },
  props: {
    markers: Array
  },
}
</script>

<style>
.marker {
  background-size: cover;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  cursor: pointer;
}
.map {
  position: relative;
  height: 90vh;
  border: #f6e767 3px solid;
}
#resetBtn {
  position: absolute;
  top: 10px;
  left: 10px;
  z-index: 99;
  height: 40px;
  width: 40px;
  padding: 5px;
  border-radius: 50%;
  background-color: #f6e767;
}
</style>