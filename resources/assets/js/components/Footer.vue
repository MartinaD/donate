<template>
<footer id="footer" class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="footer-single">
					<img src="images/logo.png" alt="">
					<p>Тука треба да стои некоја добра мисла за луѓето, хуманоста и слично...
						Тука треба да стои некоја добра мисла за луѓето, хуманоста и слично...
					</p>
				</div>
			</div>
				
			<div class="col-md-3 col-sm-6 col-xs-12">
				<h6>Следи не на: </h6>
				<ul id="footer-social">
					<li><a href="https://www.youtube.com/"><i class="fa fa-youtube fa-2x"></i></a></li>
					<li><a href="https://www.twitter.com/"><i class="fa fa-twitter fa-2x"></i></a></li>
					<li><a href="https://instagram.com//"><i class="fa fa-instagram fa-2x"></i></a></li>
					<li><a href="https://www.facebook.com/"><i class="fa fa-facebook fa-2x"></i></a></li>
				</ul>
			</div>
				
			<div class="col-md-3 col-sm-6 col-xs-12 footer-categories">
				<h6>Категории</h6>
					<div v-for="category in categories">
							<router-link class="footer-category" :to="`/categories/${category.name}`">
								<i :class="['fa fa-1x fa-' + category.image]" aria-hidden="true"></i> {{category.name}}
							</router-link>
					</div>			
			</div>
				
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="footer-single">
					<h6>Мапа на страната</h6>
						<a href="#contact"><i class="fa fa-phone-square"></i> Контакт</a>
						<router-link to="/campaign/create" v-if="auth"><i class="fa fa-hourglass-start "></i> Започни акција</router-link>
						<router-link to="/login" v-if="guest"><i class="fa fa-hourglass-start "></i> Започни акција</router-link>
						<router-link to="/login" v-if="guest"><i class="fa fa-sign-in"></i> Најави се</router-link>
	                    <a class="header-logout" @click="logout" v-if="auth"><i class="fa fa-sign-out"></i> Одјави се</a>
				</div>
			</div>
					
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<p class="copyright text-center">
					Матина Денковиќ 125027</a>
				</p>
			</div>
		</div>
	</div>
</footer>

</template>

<script type="text/javascript">
	import Auth from './../store/auth'
	import { post, interceptors, get } from './../helpers/api'
	

	export default {
		created() {
			get('/api/categories')
				.then((res) => {
					this.categories = res.data.categories
			}),
			// global error http handler
			interceptors((err) => {
				if(err.response.status === 401) {
					Auth.remove()
					this.$router.push('/login')
				}

			})
			Auth.initialize()
		},
		data() {
			return {
				authState: Auth.state,
				categories: [],
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
			logout() {
				post('/api/logout')
				    .then((res) => {
				        if(res.data.done) {
				            // remove token
				            Auth.remove()
				            this.$router.push('/#')
				        }
				    })
			},
			
		}
	}
</script>