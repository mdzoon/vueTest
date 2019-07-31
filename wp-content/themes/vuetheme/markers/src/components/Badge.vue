<template>
  <li            
    @click="openPanel(badge)"
    aria-label="Open panel" 
    class="badge" :id="badge.name">
    <img class="badge-img" :src="badge.image" />
    <h3>{{ badge.name }}</h3>
  </li>
</template>

<script>
import { eventBus } from '../main';

export default {
  name: 'Badge',
  props: {
    badge: Object
  },
  methods: {
    openPanel(badge) {
      let panelToOpen = badge.name
      eventBus.openPanelEvent(panelToOpen);
    }
  }
}
</script>

<style scoped>
.badge {
  display: flex;
  flex-direction: column;
  text-align: center;
  color: #212121;
}
.badge > img {
  height: 120px;
  width: 120px;
  margin: auto;
  background: rgba(188,224,238,1);
  background: -moz-linear-gradient(-45deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(188,224,238,1)), color-stop(20%, rgba(188,224,238,1)), color-stop(50%, rgba(242,226,78,1)), color-stop(80%, rgba(188,224,238,1)), color-stop(100%, rgba(188,224,238,1)));
  background: -webkit-linear-gradient(-45deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  background: -o-linear-gradient(-45deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  background: -ms-linear-gradient(-45deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  background: linear-gradient(135deg, rgba(188,224,238,1) 0%, rgba(188,224,238,1) 20%, rgba(242,226,78,1) 50%, rgba(188,224,238,1) 80%, rgba(188,224,238,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bce0ee', endColorstr='#bce0ee', GradientType=1 );
}

.badge-img{
  border-radius: 50%;
  transition: box-shadow .3s;
  border: 4px #f6e767 solid;
}
.badge-img:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.6); 
}
h3 {
  position: relative;
  text-decoration: none;
  font-size: medium;
  margin: 15px 0;
}
h3:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: -5px;
  left: 0;
  background-color: #000;
  visibility: hidden;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}
.badge:hover > h3:before {
  visibility: visible;  
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
</style>