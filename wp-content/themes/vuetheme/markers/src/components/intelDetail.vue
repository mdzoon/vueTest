<template>
    <div @click="toggleIntel">
        <div class="arrow_box" :class="{'arrow_box--isVisible' : isVisible}"></div>
        <h5>{{ index | underscoresToSpaces }}</h5>
        <transition name="intel-slide">
            <ul v-show="isVisible">
                <li v-for="(value, detail) in intel" :key="detail">        
                    {{ detail | underscoresToSpaces }}: {{ value }}
                </li>
            </ul>
        </transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isVisible: false
        }
    },
    props: {
        intel: Object,
        index: String
    },
    methods: {
        toggleIntel() {
            //console.log(index);
            this.isVisible = !this.isVisible;
        }
    }
}
</script>

<style scoped>
.intel-slide-enter {
  opacity: 0;
}
.intel-slide-enter-active {
  animation: slide-in 2s ease-out;
}
.intel-slide-leave-active {
  animation: slide-out 2s ease-in;
}
@keyframes slide-in {
  from {
    transform: translateX(100%);
  } to {
    transform: translateX(0);
  }
}
@keyframes slide-out {
  from {
    transform: translateX(0);
  } to {
    transform: translateX(100%);
  }
}

h5 {
  margin-left: 15px;
  margin-bottom: 0.5rem;
  font-size: 0.5rem;
  text-transform: capitalize;
}

.arrow_box {
  width:10px;
  height:10px;
  transition: all .3s;
  padding-bottom:0px;
  position:absolute;
  margin-top: 2px;
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
.arrow_box--isVisible{
   transform: rotateZ(90deg);
   transform-origin: 50% 50%;
}

ul {
  background-color: #999;
  padding: 0.5rem 1rem;
  border-radius: 10px 0 0 10px;
  margin-left: 15px;
  border: 1px solid #666;
  border-right: none;
}

li:not(:last-child) {
  margin-bottom: 5px;
}
</style>