import Vue from 'vue'
import VueRouter from 'vue-router'
import VeeValidate from 'vee-validate';

import Login from '../views/Auth/Login.vue'
import Register from '../views/Auth/Register.vue'


Vue.use(VueRouter)
Vue.use(VeeValidate)

const router = new VueRouter({
	
	routes: [
		{ path: '/login', component: Login },
		{ path: '/register', component: Register },

	
	]
})

export default router
