Vue.config.productionTip = true
Vue.config.devtools = true

import Vue from 'vue'
import App from './App.vue'

export const eventBus = new Vue({
  methods: {
    openPanelEvent(panelToOpen) {
      this.$emit( 'wasOpened', panelToOpen);
    }
  }
});

// export const heroMixin = {

// };

Vue.filter('toLowerCase', function(value) {
  return  value.toLowerCase();
});
Vue.filter('spacesToHypens', function(value) {
  return value.replace(' ', '-');
});
Vue.filter('underscoresToSpaces', function(value) {
  return value.replace(/_/g, ' ');
});

new Vue( {
  el: "#appMap",
  render: h => h(App)
} );
