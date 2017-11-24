import Vue from 'vue'
import VueRouter from 'vue-router'
import VeeValidate from 'vee-validate';

import Login from '../views/Auth/Login.vue'
import Register from '../views/Auth/Register.vue'
import CampaignForm from '../views/Campaign/Form.vue'
import CampaignIndex from '../views/Campaign/Index.vue'




Vue.use(VueRouter)
Vue.use(VeeValidate)

const router = new VueRouter({
	
	routes: [
		{ path: '/', component: CampaignIndex },
		{ path: '/login', component: Login },
		{ path: '/register', component: Register },
		{ path: '/campaign/create', component: CampaignForm, meta: { mode: 'create' }},


	
	]
})

export default router
