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
	                    <!-- Brand and toggle get grouped for better mobile display -->
	                        <div class="navbar-header">
	                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                                <i class="fa fa-bars fa-2x"></i>
	                            </button>
	                        </div>

	                    <!-- Collect the nav links, forms, and other content for toggling -->
	                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                            <ul class="nav navbar-nav">
	                                <li class="active">
										<router-link to="/campaign/create" v-if="auth">Донирај</router-link>
										<router-link to="/login" v-if="guest">Донирај</router-link>
	                                </li>
	                                <li><a href="#portfolio"><i class="fa fa-bookmark"></i> Portfolio</a></li>
	                                <li><a href="#services"><i class="fa fa-bullhorn"></i> Me</a></li>
	                                <li><a href="#testimonials"><i class="fa fa-thumbs-up"></i> Tetimonials</a></li>
	                                <li><a href="#contact"><i class="fa fa-phone-square"></i> Contact</a></li>
	                            </ul>
	                        </div>  <!-- /.navbar-collapse -->
	                    </nav>
	                </div>
	            </header>	<!-- site-header -->    
	        </div>  <!-- overlay-1 -->
		</div>  <!-- content-block -->

		<router-view></router-view>

		FOOOOOOTER
	</div>
</template>

<script type="text/javascript">

	import Auth from './store/auth'
	import Flash from './helpers/flash'
	import { post, interceptors } from './helpers/api'

	export default {
		created() {
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
				isOpen: false
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
			alert("Logout")
				post('/api/logout')
				    .then((res) => {
				    alert("In")
				        if(res.data.done) {
				            // remove token
				            Auth.remove()
				            Flash.setSuccess('You have successfully logged out.')
				            this.$router.push('/login')
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



