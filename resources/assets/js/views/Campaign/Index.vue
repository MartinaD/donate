<template>
	<div>
		<div class="center-image">
			<div id="overlay-1" class="middle text-center clearfix">
            	<div class="container">
                   `<vue-typer class="pro-name" text='Помогни сега!'
					       	:repeat='Infinity'
							:shuffle='false'
							initial-action='typing'
							:pre-type-delay='70'
							:type-delay='200'
							:pre-erase-delay='2500'
							:erase-delay='200'
							erase-style='clear'
							:erase-on-complete='false'
							caret-animation='solid'
					></vue-typer> </br></br>

                    <div class="navbar__item" v-if="auth">
						<router-link to="/categories" class="btn-donate">Донирај</router-link>
					</div> 

					<div class="navbar__item" v-if="guest">
						<router-link to="/login" class="btn-donate">Донирај</router-link>
					</div> 

                </div>  <!-- container -->
            </div>  <!-- middle -->  
        </div>

        <!-- Start Campaign Section -->
	    <div class="services-section">
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
									<p class="campaign__name">{{campaign.title}}</p>
								</router-link>
	                        </div>
	                </div><!-- /.col-md-4 -->
	            </div>
	        </div>
	    </div>
	    <!-- End Campaign Section -->

		<!-- Start Facts Section -->
		<div id="facts" class="facts mt-100 mbr-box mbr-section mbr-section--relative">
			<div class=facts-container>
				<div class="row text-center">	
			    	<div class="col-xs-12 col-lg-3 col-md-3">
			            <div class="count-item">
			                <i class="lnr lnr-clock"></i>
			                <div class="numscroller">
			                   	<animated-number :number="233"></animated-number>
			                </div>
			                <div class="count-name-intro">Hours</div>
			            </div>
		           	</div>
		            <div class="col-xs-12 col-lg-3 col-md-3">
		               	<div class="count-item">
		                    <i class="lnr lnr-rocket"></i>
		                    <div class="numscroller">
		                        <animated-number :number="142"></animated-number>
		                    </div>
		                    <div class="count-name-intro">Projects</div>
		                </div>
		            </div>
		            <div class="col-xs-12 col-lg-3 col-md-3">
		                <div class="count-item">
		                    <i class="lnr lnr-coffee-cup"></i>
		                    <div class="numscroller">
		                        <animated-number :number="275"></animated-number>
		                    </div>
		                    <div class="count-name-intro">coffe's</div>
		                </div>
		            </div>
		            <div class="col-xs-12 col-lg-3 col-md-3">
		                <div class="count-item">
		                    <i class="lnr lnr-coffee-cup"></i>
		                    <div class="numscroller">
		                        <animated-number :number="255"></animated-number>
		                    </div>
		                    <div class="count-name-intro">coffe's</div>
		                </div>
		            </div>
				</div>
			</div>
		</div>

		<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%">
			<path d="M0 0 L50 100 L100 0 Z" fill="#1ea78d" stroke=""></path>
		</svg>
		<!-- End Facts Section -->
		
		<div class="content-block" id="testimonials">
			<div class="block-content text-center">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<!--
							<agile :arrows="false" :speed="750" :timing="'linear'" :fade="true" :autoplay="true" :autoplaySpeed="5000" :pauseOnHover="true" :dots="false">	
							<div  v-for="post in posts" class="testimonial slide" :class="'slide--' + post.id" >
								<img :src="`/images/${post.image}`" v-if="post.image">
								<p>{{post.text}}</p>
								<strong>{{post.author}}</strong><br>
							</div>
						</agile> -->   
					
							<agile :arrows="false" :speed="750" :timing="'linear'" :fade="true" :autoplay="true" :autoplaySpeed="5000" :pauseOnHover="true" :dots="false">
						
								<div class="slide slide--1">
									<div class="testimonial">
			                            <img alt="Client Photo1" src="images/image1.jpg">
			                            <p>In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet</p>
			                            <strong>Jhon Doe</strong><br>
			                            <span>Head of Ideas, Technext</span>
			                        </div>
								</div>
								<div class="slide slide--2">
									<div class="testimonial">
										<img alt="Client Photo2" src="images/image2.jpg">
			                            <p>SECOND In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet</p>
			                            <strong>SECOND Jhon Doe</strong><br>
			                            <span>Head of Ideas, Technext</span>
			                        </div>
								</div>
								<div class="slide slide--3">
									<div class="testimonial">
										<img alt="Client Photo3" src="images/image3.jpg">
			                            <p>THIRD In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet</p>
			                            <strong> THIRD Jhon Doe</strong><br>
			                            <span>Head of Ideas, Technext</span>
			                        </div>
								</div>
							</agile> 
						</div>
					</div>
				</div>  
			</div>   
        </div>	<!-- content-block -->

        <!-- Start Categories Section -->
		<categories-cmp></categories-cmp>
		
		<!-- End Categories Section -->

		<contact></contact>

		<footer-cmp></footer-cmp>

		

	</div>
</template>


<script type="text/javascript">
	import Vue from 'vue'
	import Auth from '../../store/auth'
    import AnimateNumber from '../../components/AnimateNumber.vue'
    import ContactTemplate from '../../components/ContactTemplate.vue'
    import Footer from '../../components/Footer.vue'
    import Categories from '../../components/Categories.vue'
    import VueAgile from 'vue-agile'
	Vue.use(VueAgile)
	import { VueTyper } from 'vue-typer'
    Vue.component('animated-number', AnimateNumber)
    Vue.component('contact', ContactTemplate)
    Vue.component('footer-cmp', Footer)
    Vue.component('categories-cmp', Categories)
	import { post, get } from '../../helpers/api'
	export default {
		components: {
   			 VueTyper
 		 },
		data() {
			return {
				show: false,
				showText: 'View more categories',
				campaigns: [],
				posts: [],
				categories: [],
				authState: Auth.state,            
			}
		},
		computed: {

			auth() {
				if(this.authState.api_token) {
					return true
				}
				return false
			},
			guest() {
				return !this.auth
			}
		},
		methods: {
			
			showMoreLess() {
				if(this.show == true){
					this.show = false
					this.showText = "View more categories"
				}
				else{
					this.show = true
					this.showText = "View few categories"
				}
				
			}
		},
		created() {
		Auth.initialize(),
			get('/api/campaigns')
				.then((res) => {
					this.campaigns = res.data.campaigns
				}),
			get('/api/posts')
				.then((res) => {
					this.posts = res.data.posts
				}),
			get('/api/categories')
				.then((res) => {
					this.categories = res.data.categories
				})
		}
	}
</script>




