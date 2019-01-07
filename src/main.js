import Vue from 'vue'
import App from './App.vue'
import Vuetify from 'vuetify'


Vue.use(Vuetify)

Vue.filter('cm', (value) => {
  if (!value) return '0cm'
  return value.toString() + 'cm'
})

Vue.filter('Kg', (value) => {
  if (!value) return '0Kg'
  return value.toString() + 'Kg'
})

Vue.filter('percent', (value) => {
  if (!value) return '0%'
  return value.toString() + '%'
})

Vue.filter('trim', (value, n) => {
  if (!value) return 0
  return value.toFixed(n)
})

new Vue({
  el: '#bb_calc',
  render: h => h(App)
})
