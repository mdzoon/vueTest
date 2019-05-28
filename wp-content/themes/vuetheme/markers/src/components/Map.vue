<template>
  <div>
      <div id='map' class='map'>

      </div>
  </div>
</template>

<script>
export default {
  name: 'Map',
  mounted() {
          
    window.mapboxgl.accessToken = "pk.eyJ1IjoibWR6b29uIiwiYSI6ImNqdmJhemU2eDB5a2E0Nm1tNGdqNzg2eHkifQ.q7SipboLEjFT7jtWP_WjGw";	
    
    let map = new window.mapboxgl.Map( {
        container: 'map',
        style: 'mapbox://styles/mapbox/dark-v9',
        center: [ 0.0, 0.0 ], 
        zoom: 1
    } );
    
    map.on( 'load', ( () => {

        this.markers.forEach( function(marker) {
          let name = marker.name;
          let el = document.createElement('div');
          el.className = "marker";
          el.id = "marker-" + name;
          new window.mapboxgl.Marker(el)
            .setLngLat( [parseFloat(marker.latitude), parseFloat(marker.longitude)] )
            .addTo(map);
          el.addEventListener( 'click', () => {
            map.flyTo( {
              center: [parseFloat(marker.latitude), parseFloat(marker.longitude)],
              zoom: 12
            } )
          ;} )
        });
        
        this.markers.forEach( (x) => {
          document.getElementById( x.name )
            .addEventListener( 'click', () => {
              map.flyTo( {
                center: [parseFloat(x.latitude), parseFloat(x.longitude)],
                zoom: 4
              } )
            ;} )
        })

/*TODO        const button = function(button) { 
          document.createElement('button');
          button.id = "resetBtn";
          button.addEventListener( 'click', () => {
            map.flyTo( {
              center: [ 0.0, 0.0 ], 
              zoom: 1
            } )
          ;} )
        } */
    }).bind(this));
  },
  props: {
    markers: Array
  }
}
</script>

<style>
.marker {
  background-image: url('http://localhost/vueTest/wp-content/uploads/2019/05/hero-marker.png');
  /* background-image: url('./../assets/hero-marker.png'); */
  background-size: cover;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  cursor: pointer;
}
.map { 
    height: 600px;
    border: #f6e767 3px solid;
    border-radius: 7px;
}
</style>