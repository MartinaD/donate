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
						<router-link to="/categories" class="btn btn-lg btn-donate wow animated zoomIn">Донирај</router-link>
					</div> 

					<div class="navbar__item" v-if="guest">
						<router-link to="/login" class="btn btn-lg btn-donate wow animated zoomIn">Донирај</router-link>
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
	                    <div class="service waves-effect">
	                        <div class="border"></div>
	                        <div class="service-content">
	                            <router-link class="campaign__inner" :to="`/campaigns/${campaign.id}`">
									<img :src="`/uploads/${campaign.image}`" v-if="campaign.image">
									<p class="campaign__name">{{campaign.title}}</p>
								</router-link>
	                        </div>
	                    </div>
	                </div><!-- /.col-md-3 -->
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
		<div id="categories" class="categories mbr-box mbr-section mbr-section--relative">
			<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%">
				<path d="M0 0 L50 100 L100 0 Z" fill="#fff" stroke="#fff"></path>
			</svg>

			<div class="container">
				<div class="row">
					<div id="owl-demo">
						<div class="item" v-for="category in categories">
							<router-link class="category__inner" :to="`/categories/${category.name}`">
								<i :class="['fa fa-5x fa-' + category.image]" aria-hidden="true"></i>
							</router-link>
						</div>	
					</div>
				</div>

				<div  v-if="show === true" class="row">
					<div id="owl-demo">
						<div class="item" v-for="category in categories">
							<router-link class="category__inner" :to="`/categories/${category.name}`">
								<i :class="['fa fa-5x fa-' + category.image]" aria-hidden="true"></i>
							</router-link>
						</div>	
					</div>


					<div id="owl-demo">
						<div class="item" v-for="category in categories">
							<router-link class="category__inner" :to="`/categories/${category.name}`">
								<i :class="['fa fa-5x fa-' + category.image]" aria-hidden="true"></i>
							</router-link>
						</div>	
					</div>
				</div>			


			</div>

			<div class="show-more" @click="showMoreLess">
				<strong> {{showText}} </strong>
			</div>
		</div>
		<!-- End Categories Section -->



		<!--Start Contact Section-->		
		<section id="contact" class="contact">
			<div class="container">
				<div class="row mb50">
				
					<div class="sec-title text-center mb50 wow fadeInDown animated" data-wow-duration="500ms">
						<h2>Let’s Discuss</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>
					
					<div class="sec-sub-title text-center wow rubberBand animated" data-wow-duration="1000ms">
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
					</div>
					
					<!-- contact address -->
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 wow fadeInLeft animated" data-wow-duration="500ms">
						<div class="contact-address">
							<h3>Cras at ultrices erat, sed vulputate!</h3>
							<p>2345 Setwant natrer, 1234,</p>
							<p>Washington. United States.</p>
							<p>(401) 1234 567</p>
						</div>
					</div>
					<!-- end contact address -->
					
					<!-- contact form -->
					<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms">
						<div class="contact-form">
							<h3>Say hello!</h3>
							<form action="#" id="contact-form">
								<div class="input-group name-email">
									<div class="input-field">
										<input type="text" name="name" id="name" placeholder="Name" class="form-control">
									</div>
									<div class="input-field">
										<input type="email" name="email" id="email" placeholder="Email" class="form-control">
									</div>
								</div>
								<div class="input-group">
									<textarea name="message" id="message" placeholder="Message" class="form-control"></textarea>
								</div>
								<div class="input-group">
									<input type="submit" id="form-submit" class="pull-right" value="Send message">
								</div>
							</form>
						</div>
					</div>
					<!-- end contact form -->
					
					<!-- footer social links -->
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 wow fadeInRight animated" data-wow-duration="500ms" data-wow-delay="600ms">
						<ul id="footer-social">
							<li><a href="https://www.behance.net/Themefisher"><i class="fa fa-behance fa-2x"></i></a></li>
							<li><a href="https://www.twitter.com/Themefisher"><i class="fa fa-twitter fa-2x"></i></a></li>
							<li><a href="https://dribbble.com/themefisher"><i class="fa fa-dribbble fa-2x"></i></a></li>
							<li><a href="https://www.facebook.com/Themefisher"><i class="fa fa-facebook fa-2x"></i></a></li>
						</ul>
					</div>
					<!-- end footer social links -->
					
				</div>
			</div>
			
			<!-- Google map -->
			<div id="map_canvas" class="wow bounceInDown animated" data-wow-duration="500ms"></div>
			<!-- End Google map -->
			
		</section>
		
        <!--End Contact Section-->

	</div>
</template>


<script type="text/javascript">
	import Auth from '../../store/auth'
    import AnimateNumber from '../../components/AnimateNumber.vue'
    import VueAgile from 'vue-agile'
	Vue.use(VueAgile)
	import { VueTyper } from 'vue-typer'
	import Vue from 'vue'
    Vue.component('animated-number', AnimateNumber)
	import { get } from '../../helpers/api'
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




