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
	                <div class="col-md-3 col-sm-6 col-xs-12"  v-for="campaign in campaigns">
	                    <div class="service waves-effect">
	                        <i class="fa fa-magic"></i>
	                        <div class="border"></div>
	                        <div class="service-content">
	                            <router-link class="campaign__inner" :to="`/campaigns/${campaign.id}`">
									<img :src="`/images/${campaign.image}`" v-if="campaign.image">
									<p class="campaign__name">{{campaign.title}}</p>
								</router-link>
	                        </div>
	                    </div>
	                </div><!-- /.col-md-3 -->
	            </div>
	        </div>
	    </section>
	    <!-- End Campaign Section -->
		

	</div>
</template>


<script type="text/javascript">
	import { get } from '../../helpers/api'
	export default {
	
		data() {
			return {
				campaigns: [],
			}
		},
		created() {
			get('/api/campaigns')
				.then((res) => {
					this.campaigns = res.data.campaigns
				})
		}
	}
</script>