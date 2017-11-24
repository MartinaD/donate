<template>
	<div class="campaign__list">
		<div class="campaign__item" v-for="campaign in campaigns">
			<router-link class="campaign__inner" :to="`/campaigns/${campaign.id}`">
				<img :src="`/images/${campaign.image}`" v-if="campaign.image">
				<p class="campaign__name">{{campaign.title}}</p>
			</router-link>
		</div>

		<div class="campaign__item" v-for="campaign in campaigns">
			<router-link class="campaign__inner" :to="`/campaigns/${campaign.id}`">
				<img :src="`/images/${campaign.image}`" v-if="campaign.image">
				<p class="campaign__name">{{campaign.title}}</p>
			</router-link>
		</div>

		<div class="campaign__item" v-for="campaign in campaigns">
			<router-link class="campaign__inner" :to="`/campaigns/${campaign.id}`">
				<img :src="`/images/${campaign.image}`" v-if="campaign.image">
				<p class="campaign__name">{{campaign.title}}</p>
			</router-link>
		</div>

		<div class="campaign__item" v-for="campaign in campaigns">
			<router-link class="campaign__inner" :to="`/campaigns/${campaign.id}`">
				<img :src="`/images/${campaign.image}`" v-if="campaign.image">
				<p class="campaign__name">{{campaign.title}}</p>
			</router-link>
		</div>

		<div class="campaign__item" v-for="campaign in campaigns">
			<router-link class="campaign__inner" :to="`/campaigns/${campaign.id}`">
				<img :src="`/images/${campaign.image}`" v-if="campaign.image">
				<p class="campaign__name">{{campaign.title}}</p>
			</router-link>
		</div>

		<div id="facts" class="facts mt-100 mbr-box mbr-section mbr-section--relative">
			<div class=facts-container>
				
					<div class="row text-center">
					    <div class="facts_items">
		                    <div class="count-item">
		                        <i class="lnr lnr-clock"></i>
		                        <div class="numscroller" data-slno='1' data-min='0' data-max='4444' data-delay='10' data-increment="10">
		                        <animated-number :number="23"></animated-number>
		                        </div>
		                        <div class="count-name-intro">Hours</div>
		                    </div>
		                </div>
		                <div class="facts_items">
		                    <div class="count-item">
		                        <i class="lnr lnr-rocket"></i>
		                        <div class="numscroller" data-slno='1' data-min='0' data-max='1111' data-delay='10' data-increment="5">
		                        <animated-number :number="12"></animated-number>
		                        </div>
		                        <div class="count-name-intro">Projects</div>
		                    </div>
		                </div>
		                <div class="facts_items">
		                    <div class="count-item">
		                        <i class="lnr lnr-coffee-cup"></i>
		                        <div class="numscroller" data-slno='1' data-min='0' data-max='1555' data-delay='10' data-increment="5">
		                        <animated-number :number="27"></animated-number>
		                        </div>
		                        <div class="count-name-intro">coffe's</div>
		                    </div>
		                </div>
				</div>
			</div>
		</div>

		<!-- SVG triangle 
		<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%">
		<defs>
  			<pattern id="img1" patternUnits="userSpaceOnUse" width="100" height="100">
    			<image xlink:href="/images/number1.gif"/>
 			</pattern>
		</defs>
			<path d="M0 0 L50 100 L100 0 Z"  fill="url(#img1)"></path>
		</svg>
		-->


		<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 0 L50 100 L100 0 Z" fill="#7AE2DE" stroke="#7AE2DE"></path>
		</svg>
		
		<div class="content-block" id="testimonials">
            <header class="block-heading cleafix text-center">
                <h1>Thank you</h1>


					<agile :arrows="false" :speed="750"
					    :timing="'linear'" :fade="true"
					    :autoplay="true" :pauseOnHover="false">
					    <div class="slide slide--1">One</div>
					    <div class="slide slide--2">Two</div>
					    <div class="slide slide--3">Three</div>
					</agile>
            </header>
            <div class="block-content text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                        	<div class="owl-carousel">
								<div class="owl-item">
									<div class="testimonial">
                                        <img alt="Client Photo" src="img/testimonial_31-190x190.jpg">
                                        <p>In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.</p>
                                        <strong>Jhon Doe</strong><br>
                                        <span>Head of Ideas, Technext</span>
                                    </div>
								</div>	<!-- owl-item -->
								<div class="owl-item">
									<div class="testimonial">
                                        <img alt="Client Photo" src="img/testimonial_11-190x190.jpg">
                                        <p>In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.</p>
                                        <strong>Jane Doe</strong><br>
                                        <span>CEO, Apple Inc</span>
                                    </div>
								</div>	<!-- owl-item -->
								<div class="owl-item">
									<div class="testimonial">
                                        <img alt="Client Photo" src="img/testimonial_22-190x190.jpg">
                                        <p>In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.</p>
                                        <strong>Albert Doe</strong><br>
                                        <span>Team Lead, Design Studio</span>
                                    </div>
								</div>	<!-- owl-item -->
							</div>	<!-- owl-carousel -->
						</div>	<!-- col-md-12 -->
                    </div>	<!-- row -->
                </div>	<!-- container -->
            </div>	<!-- block-content -->
        </div>	<!-- content-block -->


		<div id="clients" class="clients mt-100 mbr-box mbr-section mbr-section--relative">
			<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 0 L50 100 L100 0 Z" fill="#ebeef3" stroke="#ebeef3"></path>
			</svg>
			<div class="container">
				<div class="row">
							
							<div id="owl-demo">
									<div class="item"><img src="assets/img/clients/1.png" alt="Category1"></div>
									<div class="item"><img src="assets/img/clients/2.png" alt="Category2"></div>
									<div class="item"><img src="assets/img/clients/3.png" alt="Category3"></div>
									<div class="item"><img src="assets/img/clients/1.png" alt="Category4"></div>
									<div class="item"><img src="assets/img/clients/2.png" alt="Category5"></div>
									<div class="item"><img src="assets/img/clients/3.png" alt="Category6"></div>
							</div>
					</div>
			</div>
	</div>

		

	</div>
</template>


<script type="text/javascript">
    import AnimateNumber from '../../components/AnimateNumber.vue'
    import VueAgile from 'vue-agile'
	Vue.use(VueAgile)
	import Vue from 'vue'
    Vue.component('animated-number', AnimateNumber)
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
