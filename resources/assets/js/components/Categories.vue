<template>
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
						<div class="item" v-for="category in categories">
							<router-link class="category__inner" :to="`/categories/${category.name}`">
								<i :class="['fa fa-5x fa-' + category.image]" aria-hidden="true"></i>
							</router-link>
						</div>
						<div class="item" v-for="category in categories">
							<router-link class="category__inner" :to="`/categories/${category.name}`">
								<i :class="['fa fa-5x fa-' + category.image]" aria-hidden="true"></i>
							</router-link>
						</div>

					</div>
				</div>
			</div>
	</div>

		<!-- End Categories Section -->


</template>

<script type="text/javascript">
	import { post, get } from './../helpers/api'
	import Auth from './../store/auth'
	export default {
		data() {
			return {
				categories: [],  
				      
			}
		},
		created() {
			Auth.initialize()
			get('/api/categories')
				.then((res) => {
					this.categories = res.data.categories
				})
		}
	}
</script>
