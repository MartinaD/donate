<template>
	<div class="category__list">
 		<div class="container containter-category">
            <div class="intro-text">
                <h1>Volunteer & Service</h1>
                <p>We have raised over $4 billion for people in need.
					Set up a Powerful Fundraiser in less than 30 Seconds.
					Get real results fast!
				</p>
                <a href="#/campaign/create" class="page-scroll waves-effect btn btn-primary">Start a Campaign</a>
            </div>
        </div>

         <!-- Start Campaign Section -->
	    <section id="service" class="services-section">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="section-title text-center">
	                        <h2>Our Services</h2>
	                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
	                    </div>
	                </div>
	            </div>

	            <div class="row">
	                <div class="col-md-4 col-sm-6 col-xs-12"  v-for="campaign in campaigns">
	                    <div class="service-content">
	                        <router-link class="campaign__inner" :to="`/campaigns/${campaign.id}`">
								<img class="campaign_img" :src="`/uploads/${campaign.image}`" v-if="campaign.image">
								<div class="bottom-left">{{campaign.title}} </div>
								  
  								<div class="progress-bar" :style="'width:' + progress + '%'"></div>
						
							</router-link>
							<div class="campaign__name"><b>{{campaign.totalamount}}23 МКД</b> од {{campaign.goalamount}} МКД</div>
							
								
	                    </div>
	                </div><!-- /.col-md-4 -->
	            </div>

	            <div class="btn btn__primary showMore" @click="showMoreCampaigns">
 						<strong> {{showText}} </strong>
 				</div>
	        </div>
	    </section>
	    <!-- End Campaign Section -->
	  
    <categories-cmp></categories-cmp>
    <footer-cmp></footer-cmp>

</div>
</template>


<script type="text/javascript">
import { get, post } from '../../helpers/api'
import Vue from 'vue'
import Footer from '../../components/Footer.vue'
Vue.component('footer-cmp', Footer)
import Categories from '../../components/Categories.vue'
Vue.component('categories-cmp', Categories)

export default {

	data() {
		return {
			campaigns: [],
			limit: 9,
			moreURL: '/api/more-campaigns',
			showText: 'Покажи повеќе акции',  
			progress: 0, 
		}
	},
	methods: {
		showMoreCampaigns() {
				this.show = false
				this.showText = "Покажи повеќе акции"
				this.limit +=9
				var dict = new Object()
				var dict = {limit: this.limit,}
				post(this.moreURL, dict)
                .then((res) => {
                    if(res.data.campaigns) {
                       this.campaigns = res.data.campaigns
                    }
                })
			}	
	},
	created() {
		get( `/api/categories/${this.$route.params.name} `)
			.then((res) => {
				this.campaigns = res.data.campaigns
				this.progress = res.data.progress
			})	
			},
}
	
</script>