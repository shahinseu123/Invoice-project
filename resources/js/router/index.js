import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)

import AddInvoice from '../components/AddInvoice'
import ShowInvoice from '../components/ShowInvoice'
import Dashboard from '../components/Dashboard'
import Invoice from '../components/Invoice'
import Customer from '../components/Customer'
// import Supplier from '../components/Supplier'


const routes = [
    { path: '/home', name: 'Dashboard', component: Dashboard },
    { path: '/invoice', name: 'Invoice', component: Invoice },
    { path: '/addinvoice', name: 'AddInvoice', component: AddInvoice },
    // { path: '/Supplier', name: 'supplier', component: Supplier },
    { path: '/customer', name: 'Customer', component: Customer },
    { path: '/ShowInvoice/:id', name: 'ShowInvoice', component: ShowInvoice }
  ]
  

  const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,  
    routes 
  })

  export default router