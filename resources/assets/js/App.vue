<template>
	<div  id="main_div">
		<div class="content-block" id="header">
	        <div id="overlay-11">
	            <header id="site-header" class="clearfix">
	                <div class="pull-left">
	               		<router-link to="/">
	                    	<img src="/images/logo.png" id="logo" class="logo img-responsive">
	                    </router-link> 
	                </div>
	                <div class="pull-right">
	                    <nav class="navbar site-nav" role="navigation">
	                        <div class="navbar-header">
	                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                                <i class="fa fa-bars fa-2x"></i>
	                            </button>
	                        </div>

	                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                            <ul class="nav navbar-nav">
	                                <li class="active">
										<router-link to="/campaign/create" v-if="auth"><i class="fa fa-hourglass-start "></i>Започни акција</router-link>
										<router-link to="/login" v-if="guest"><i class="fa fa-hourglass-start "></i>Започни акција</router-link>
	                                </li>
	                                <li>
	                                	<router-link to="/login" v-if="guest"><i class="fa fa-sign-in"></i> Најави се</router-link>
	                                	<a class="header-logout" @click="logout" v-if="auth"><i class="fa fa-sign-out"></i> Одјави се</a>
	                                </li>
	                                <li><a href="#contact"><i class="fa fa-phone-square"></i> Контакт</a></li>
	                            </ul>
	                        </div>  <!-- /.navbar-collapse -->
	                    </nav>
	                </div>
	            </header>	<!-- site-header -->    
	        </div>  <!-- overlay-1 -->
		</div>  <!-- content-block -->

		<router-view></router-view>

		<footer id="footer" class="footer">
			<div class="container">
				<div class="row">
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
						<div class="footer-single">
							<img src="images/logo.png" alt="">
							<p>Тука треба да стои некоја добра мисла за луѓето, хуманоста и слично...
							Тука треба да стои некоја добра мисла за луѓето, хуманоста и слично...
							</p>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
						<div class="footer-single">
							<h6>Subscribe </h6>
							<form action="#" class="subscribe">
								<input type="text" name="subscribe" id="subscribe">
								<input type="submit" value="" id="subs" placeholder="email@domain.com">
							</form>
						</div>
						<ul id="footer-social">
							<li><a href="https://www.youtube.com/"><i class="fa fa-youtube fa-2x"></i></a></li>
							<li><a href="https://www.twitter.com/"><i class="fa fa-twitter fa-2x"></i></a></li>
							<li><a href="https://instagram.com//"><i class="fa fa-instagram fa-2x"></i></a></li>
							<li><a href="https://www.facebook.com/"><i class="fa fa-facebook fa-2x"></i></a></li>
						</ul>
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated footer-categories" data-wow-duration="500ms" data-wow-delay="600ms">
						<h6>Категории</h6>
						<div v-for="category in categories">
							<router-link class="footer-category" :to="`/categories/${category.name}`">
								<i :class="['fa fa-1x fa-' + category.image]" aria-hidden="true"></i> {{category.name}}
							</router-link>
						</div>			
					</div>
				
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
						<div class="footer-single">
							<h6>Мапа на страната</h6>
							<a href="#contact">Контакт</a>
							<a href="#">Започни акција</a>
							<a href="#">Најави се</a>
							</ul>
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
	</div>
</template>

<script type="text/javascript">

	import Auth from './store/auth'
	import Flash from './helpers/flash'
	import { post, interceptors, get } from './helpers/api'

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

				if(err.response.status === 500) {
					Flash.setError(err.response.statusText)
				}

				if(err.response.status === 404) {
					this.$router.push('/not-found')
				}
			})
			Auth.initialize()
		},
		data() {
			return {
				authState: Auth.state,
				flash: Flash.state,
				isOpen: false,
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
				            Flash.setSuccess('You have successfully logged out.')
				            this.$router.push('/#')
				        }
				    })
			},
			openMenu() {
				this.isOpen = !this.isOpen;
			},
			closeMenu(){
				this.isOpen = !this.isOpen;
			}
		}
	}
</script>



