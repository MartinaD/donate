import Vue from 'vue'
import VueRouter from 'vue-router'
import VeeValidate from 'vee-validate';

import Contact from '../views/Auth/Contact.vue'
import Login from '../views/Auth/Login.vue'
import Register from '../views/Auth/Register.vue'
import CampaignForm from '../views/Campaign/Form.vue'
import CampaignIndex from '../views/Campaign/Index.vue'
import IndexCategories from '../views/Campaign/IndexCategories.vue'
import ShowCategories from '../views/Categories/ShowCategories.vue'






Vue.use(VueRouter)
Vue.use(VeeValidate)

const router = new VueRouter({
	
	routes: [
		{ path: '/', component: CampaignIndex },
		{ path: '/ask-question', component: CampaignIndex },
		{ path: '/contact', component: Contact },
		{ path: '/login', component: Login },
		{ path: '/register', component: Register },
		{ path: '/campaign/create', component: CampaignForm, meta: { mode: 'create' }},
		{ path: '/categories/:categoryname', component: IndexCategories },
		{ path: '/categories', component: ShowCategories },

	]
})

export default router
