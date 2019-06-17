<template>
  <div class="info" :id="'info-' + name" role="dialog">
    <button type="button" @click="close" aria-label="Close panel">X</button>
    <h4>{{ name }}</h4>

    <div class="info-wrapper" @click="openIPanel()"> <!-- BOF info-wrapper -->
      <div class="arrow_box" :class="{'arrow_box--piopen' : this.isopen}"></div>
      <p>Personal information:</p>
      
      <transition v-on:enter="enter" v-on:leave="leave">
        <div v-show="this.isopen" class="pi-panel">
          <ul :id="'information-' + name">
            <li v-for="(value, detail) in hero_information" :key="detail.hero_information">        
              {{ detail = detail.replace(/_/g, ' ') }}: {{ value }}
            </li>
          </ul>
        </div>
      </transition>
    </div> <!-- EOF info-wrapper -->

    <div class="info-wrapper" @click="openIPanel()"> <!-- BOF info-wrapper -->
      <div class="arrow_box" :class="{'arrow_box--piopen' : this.isopen}"></div>
      <p>Physical details:</p>

      <transition v-on:enter="enter" v-on:leave="leave">
        <div v-show="this.isopen" class="pi-panel">
          <ul :id="'basic-details-' + name">
            <li v-for="(value, detail ) in hero_basic_details" :key="detail.hero_basic_details">{{ detail = detail.replace(/_/g, ' ') }}: {{ value }}</li>
          </ul>
        </div>
      </transition>
    </div> <!-- EOF info-wrapper -->
  </div>
</template>

<script>
export default {
  name: 'Panel',
  data() {
    return {
      isopen: false
    }
  },
  props: {
    name: String,
    pi_panel: Object,
    hero_information: Object,
    hero_basic_details: Object
  },  
  methods: {
    close() {
      this.$emit('close');
    },
    openIPanel() {
      this.isopen = ! this.isopen
    },
    setClass() {
      if(this.isopen == true ) {
        return 'piopen'
      }
      return 'piclose'
    },
    enter: function(el, done) {
      Velocity(el, 'slideDown', {duration: 400,
                                   easing: "easeInBack"},
                                {complete: done})
    },
    leave: function(el, done) {
      Velocity(el, 'slideUp', {duration: 400,
                                 easing: "easeInBack"},
                              {complete: done})
    }
  }
}
</script>

<style scoped>
.info {
  position: absolute;
  right: 10px;
  top: 275px;
  width: 40%;
  display: block;
  background-color: lightgray;
  padding: 0.5rem;
  font-size: 0.5rem;
  border-radius: 0 0 0 10px;
  z-index: 999;
}

button {
  font-size: 150%;
  background-color: unset;
  color: inherit;
  float: left;
}

ul {
  list-style: none;
}
li {
  text-transform: capitalize;
}
li:not(:last-child) {
  margin-bottom: 10px;
}

.info-wrapper {
 cursor: pointer;
}
.info-wrapper p {
  margin-left: 10px;

}
.arrow_box {
  width:10px;
  height:10px;
  transition: all .3s;
  padding-bottom:0px;
  position:absolute;
  margin-top: 4px;
}
.arrow_box:after, .arrow_box:before {
	border: solid transparent;
	content: " ";
	position: absolute;
}
.arrow_box:after {
	border-width: 5px;
}
.arrow_box:before {
	border-left-color: #000;
	border-width: 5px;
}
.arrow_box--piopen{
   transform: rotateZ(90deg);
   transform-origin: 50% 50%;
}
</style>