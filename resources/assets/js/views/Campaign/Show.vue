<template>

	<div>

		<div class="category-header"></div>

		<div class="container container_form">
	    	<div class="row row_campaign">
	            <div class="col-md-6 col-sm-6 col-xs-12">
	                <div class="show-image">
                		<img :src="`/uploads/${campaign.image}`" alt="Image" class="img-fluid-show">
               		</div>
             	</div><!-- /.col-md-6 -->


               	<div class="col-md-6 col-sm-6 col-xs-12">
	            	<div class="campaign_desc">
	            		<h3 class="campaign_tile">
	            			{{campaign.title}}
	            			<span class="campaign_date">Креирано на: {{campaign.created_at}}</span>
	            		</h3>
	            		<p class="campaign_category">	
	            			Категорија: {{category.name}} 
	            		</p>
	            		<div class="campaign_price">
	            			<p class="campaign_amount">
	            				<b>{{campaign.totalamount}}23 МКД</b> од {{campaign.goalamount}} МКД
	            			</p>
	            		</div>
	            		<div class="progress-bar" :style="'width:' + progress + '%'"></div>
	            		<hr>
               		</div>

	       			<donate :campaign="campaign_id" v-if="showDonateModal" @close="showDonateModal = false"></donate> 
	       			<button class="btn_donate" @click="showDonateModal = true"> ДОНИРАЈ </button>

	            </div><!-- /.col-md-6 -->
	        </div>


	        <div class="row row_campaign">
	            <div class="col-md-6 col-sm-6 col-xs-12">
	               <div class="campaign_body">
	            		{{campaign.body}}
	            	</div>
             	</div><!-- /.col-md-6 -->


               	<div class="col-md-6 col-sm-6 col-xs-12">
	            	<div class="campaign_desc">
	            		<h3 class="campaign_tile">
	            			{{campaign.title}}
	            			<span class="campaign_date">Креирано на: {{campaign.created_at}}</span>
	            		</h3>
	            		<p class="campaign_category">	
	            			Категорија: {{category.name}} 
	            		</p>
	            		<div class="campaign_price">
	            			<p class="campaign_amount">
	            				<b>{{campaign.totalamount}}23 МКД</b> од {{campaign.goalamount}} МКД
	            			</p>
	            		</div>
	            		<div class="progress-bar" :style="'width:' + progress + '%'"></div>
	            		<hr>
               		</div>







               		<div class="campaign_desc">
	            		<h3 class="campaign_tile">
	            			{{campaign.title}}
	            			<span class="campaign_date">Креирано на: {{campaign.created_at}}</span>
	            		</h3>
	            		<p class="campaign_category">	
	            			Категорија: {{category.name}} 
	            		</p>
	            		<div class="campaign_price">
	            			<p class="campaign_amount">
	            				<b>{{campaign.totalamount}}23 МКД</b> од {{campaign.goalamount}} МКД
	            			</p>
	            		</div>
	            		<div class="progress-bar" :style="'width:' + progress + '%'"></div>
	            		<hr>
               		</div>
               		<div class="campaign_desc">
	            		<h3 class="campaign_tile">
	            			{{campaign.title}}
	            			<span class="campaign_date">Креирано на: {{campaign.created_at}}</span>
	            		</h3>
	            		<p class="campaign_category">	
	            			Категорија: {{category.name}} 
	            		</p>
	            		<div class="campaign_price">
	            			<p class="campaign_amount">
	            				<b>{{campaign.totalamount}}23 МКД</b> од {{campaign.goalamount}} МКД
	            			</p>
	            		</div>
	            		<div class="progress-bar" :style="'width:' + progress + '%'"></div>
	            		<hr>
               		</div>
               		<div class="campaign_desc">
	            		<h3 class="campaign_tile">
	            			{{campaign.title}}
	            			<span class="campaign_date">Креирано на: {{campaign.created_at}}</span>
	            		</h3>
	            		<p class="campaign_category">	
	            			Категорија: {{category.name}} 
	            		</p>
	            		<div class="campaign_price">
	            			<p class="campaign_amount">
	            				<b>{{campaign.totalamount}}23 МКД</b> од {{campaign.goalamount}} МКД
	            			</p>
	            		</div>
	            		<div class="progress-bar" :style="'width:' + progress + '%'"></div>
	            		<hr>
               		</div>
               		<div class="campaign_desc">
	            		<h3 class="campaign_tile">
	            			{{campaign.title}}
	            			<span class="campaign_date">Креирано на: {{campaign.created_at}}</span>
	            		</h3>
	            		<p class="campaign_category">	
	            			Категорија: {{category.name}} 
	            		</p>
	            		<div class="campaign_price">
	            			<p class="campaign_amount">
	            				<b>{{campaign.totalamount}}23 МКД</b> од {{campaign.goalamount}} МКД
	            			</p>
	            		</div>
	            		<div class="progress-bar" :style="'width:' + progress + '%'"></div>
	            		<hr>
               		</div>
               		<div class="campaign_desc">
	            		<h3 class="campaign_tile">
	            			{{campaign.title}}
	            			<span class="campaign_date">Креирано на: {{campaign.created_at}}</span>
	            		</h3>
	            		<p class="campaign_category">	
	            			Категорија: {{category.name}} 
	            		</p>
	            		<div class="campaign_price">
	            			<p class="campaign_amount">
	            				<b>{{campaign.totalamount}}23 МКД</b> од {{campaign.goalamount}} МКД
	            			</p>
	            		</div>
	            		<div class="progress-bar" :style="'width:' + progress + '%'"></div>
	            		<hr>
               		</div>
               		<div class="campaign_desc">
	            		<h3 class="campaign_tile">
	            			{{campaign.title}}
	            			<span class="campaign_date">Креирано на: {{campaign.created_at}}</span>
	            		</h3>
	            		<p class="campaign_category">	
	            			Категорија: {{category.name}} 
	            		</p>
	            		<div class="campaign_price">
	            			<p class="campaign_amount">
	            				<b>{{campaign.totalamount}}23 МКД</b> од {{campaign.goalamount}} МКД
	            			</p>
	            		</div>
	            		<div class="progress-bar" :style="'width:' + progress + '%'"></div>
	            		<hr>
               		</div>

	            </div><!-- /.col-md-6 -->
	        </div> 
	        
	          
	     </div>


			
	    <categories-cmp></categories-cmp>
	    <contact></contact>
	    <footer-cmp></footer-cmp>

	</div>
</template>


<script type="text/javascript">
	import { get, post } from '../../helpers/api'
	import Vue from 'vue'
    import Footer from '../../components/Footer.vue'
    import ContactTemplate from '../../components/ContactTemplate.vue'
    import Categories from '../../components/Categories.vue'
    import DonateComponent from '../../components/DonateComponent.vue'
    Vue.component('footer-cmp', Footer)
    Vue.component('contact', ContactTemplate)
    Vue.component('categories-cmp', Categories)
    Vue.component('donate', DonateComponent)

	export default {
	
		data() {
			return {
				campaign: [],
				category: [],
				campaign_id: "",
				limit: 9,
				moreURL: '/api/more-campaigns',
				showText: 'Покажи повеќе акции',  
				progress: 0, 
				showDonateModal: false,
			}
		},

		created() {
			get(`/api/campaigns/${this.$route.params.id}`)
				.then((res) => {
					this.campaign = res.data.campaign
					this.category = res.data.category
					this.campaign_id = res.data.campaign.id
					this.progress = 76
				})
		},
		
  }
		
</script>


