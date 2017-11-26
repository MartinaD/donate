<template>
	<div class="campaign__list">

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

		<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%">
			<path d="M0 0 L50 100 L100 0 Z" fill="#7AE2DE" stroke="#7AE2DE"></path>
		</svg>
		
		<div class="content-block" id="testimonials">
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
        </div>	<!-- content-block -->


		<div id="categories" class="categories mbr-box mbr-section mbr-section--relative">
			<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%">
				<path d="M0 0 L50 100 L100 0 Z" fill="#ebeef3" stroke="#ebeef3"></path>
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
				show: false,
				showText: 'View more categories',
				campaigns: [],
				posts: [],
				categories: [],
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
