
require('./bootstrap');

window.Vue = require('vue');

import router from './router/index'

// autocomplete
// import Vue from 'vue'


import Vue from 'vue'
import { Form, HasError, AlertError } from 'vform'
import moment from 'moment'
import Swal from 'sweetalert2'
const numWords = require('num-words')

// html to paper 
import VueHtmlToPaper from 'vue-html-to-paper';

const options = {
  name: '_blank',
  specs: [
    'fullscreen=yes',
    'titlebar=yes',
    'scrollbars=yes'
  ],
  styles: [
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
    'https://unpkg.com/kidlat-css/css/kidlat.css'
  ]
}

Vue.use(VueHtmlToPaper, options);

// or, using the defaults with no stylesheet
Vue.use(VueHtmlToPaper);

// filter
  Vue.filter('uptext', (value)=>{
    if (!value) return ''
      value = value.toString()
      return value.charAt(0).toUpperCase() + value.slice(1)
  })
  Vue.filter('momentTime', (time)=>{
    return moment(time).format("MMM Do YY")
  })
  Vue.filter('changeCurrency', (currency)=>{
    if(currency == 'USD'){
        return 'doller'
    }else if(currency == 'EURO'){
        return "euro"
    }else if(currency == 'POUND'){
        return "pound"
    }else if(currency == 'AUD'){
        return "Australian doller"
    }else {
        return "taka"
    }
  })
  Vue.filter('currencyToSimble', (cur) => {
      if(currency == 'USD'){
          return '$'
      }else if(currency == 'EURO'){
          return "€"
      }else if(currency == 'POUND'){
          return "£"
      }else{
          return "৳"
      }
  })

// CommonJS
window.Bus = new Vue()

window.swal = Swal; 

window.Form = Form

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);


const app = new Vue({
    el: '#app',
    router,
    // props:['invoice_id'],
    data: {
       selected_id: null,
    //    selected_ID: window.selected_id
    },
    methods: {

    },
    computed: {
        getSelectedId(){
            return this.selected_id
        }
    },
    created(){
        Bus.$on('getinvoid', id => this.selected_id = id)
    }
});
