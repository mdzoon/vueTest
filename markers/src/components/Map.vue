<template>
    <div>
        <div id='map' class='map'> </div>
    </div>
</template>

<script>

export default {
    name: 'Map',
    mounted() {
        window.mapboxgl.accessToken = "{YOUR_MAPBOX_ACCESS_TOKEN}"; 
        let map = new window.mapboxgl.Map( {
            container: 'map',
            style: 'mapbox://styles/mapbox/dark-v9',
            center: [-81.4608, 48.4758],
            zoom: 4
        });

        map.on('load', (() => {

            this.markers.forEach( function(marker) {
                let el = document.createElement('div');
                el.className = 'marker';
    
                new window.mapboxgl.Marker(el)
                    .setLngLat([parseFloat(marker.latitude), parseFloat(marker.longitude)])
                    .addTo(map);
            });

            this.marker.forEach((x) => {
                document.getElementById(x.name)
                    .addEventListener('click', () => {
                        map.flyTo( {
                            center: [parseFloat(x.latitude), parseFloat(x.longitude)],
                            zoom: 9
                        })
                    ;}
                )
            })
        }).bind(this));
    },
    props: {
        markers: Array
    }
}
</script>

<style>
.marker {
  background-image: url('./../assets/mapbox-icon.png');
  background-size: cover;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  cursor: pointer;
}
</style>