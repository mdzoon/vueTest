Vue.config.productionTip = true
Vue.config.devtools = true

import Vue from 'vue'
import App from './App.vue'

new Vue( {
  el: "#appMap",
  render: h => h(App)
} );
