<template>
  <transition name="panel-fade">
    <div v-if="isOpen"
        class="heroIntel"
        :id="'panel-' + panel.name | toLowerCase | spacesToHypens"
        role="dialog">
      <button class="topBtn"
        type="button"
        @click="closePanel"
        aria-label="Close panel">X
      </button>
      <h4>{{ panel.name }}</h4>
      <div class="info-wrapper"
          v-for="(intel, index) in panel.hero_intel"
          :key="index">
      
        <intelDetail :intel="intel" :index="index" />

      </div>
      <button class="bottomBtn"
        type="button"
        @click="closePanel"
        aria-label="Close panel">Close
      </button>
    </div>
  </transition>
</template>

<script>
import { eventBus } from '../main';
import intelDetail from './intelDetail.vue'

export default {
  name: 'Panel',
  components: {
    'intelDetail': intelDetail
  },
  data() {
    return {
      isOpen: false,
    }
  },
  props: {
    panel: Object
  },  
  methods: {
    closePanel() {
      this.isOpen = false;
    },
  },
  created() {
    eventBus.$on( 'wasOpened', (panelToOpen) => {
      console.log('panel-' + panelToOpen);
      let isOpen;
      if( panelToOpen == this.panel.name ) {
        this.isOpen = true;
        console.log(this.isOpen);
        return (this.isOpen);
      } else {
        this.isOpen = false;
        console.log(this.isOpen);
      }
    });
  }
}
</script>

<style scoped>

.panel-fade-enter {
  opacity: 0;
  position: absolute;
}
.panel-fade-enter-active {
  transition: opacity 2s ease-out;
  animation: scale-out 2s;
}
.panel-fade-leave-active {
  transition: opacity 2s ease-in;
  opacity: 0;
}
@keyframes scale-out {
  from {
    transform: scale(0) translate(100%);
  } to {
    transform: scale(1) translate(0);
  }
}

.heroIntel {
  position: absolute;
  top: 5px;
  right: 5px;
  width: 80%;
  max-height: calc(90vh - 35px);
  display: block;
  background-color: lightgray;
  padding: 0.5rem 0 0.5rem 0.5rem;
  font-size: 0.5rem;
  border-radius: 0 0 0 10px;
  z-index: 99;
  overflow-y: auto;
  overflow-x: hidden;
  -webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0); 
  box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0);
}
@media only screen and (min-width: 600px) {
  .heroIntel {
    width: 60%;
  }
}
@media only screen and (min-width: 800px) {
  .heroIntel {
    width: 40%;
  }
}

.topBtn {
  font-size: 120%;
  font-weight: 900;
  background-color: unset;
  float: right;
  margin-right: 0.5rem;
  color: inherit;
  padding: 4px 7px;
  border-radius: 50%;
  border: 3px solid #333;
}
.topBtn:hover, .topBtn:active, .topBtn:focus {
  background-color: #000;
  color: #fff;
  border-color: #000;
}

h4 {
  margin: 0.75rem 0;
}

.bottomBtn {
  display: block;
  margin: 20px auto 10px;
  padding-left: 2rem;
  padding-right: 2rem; 
}

</style>