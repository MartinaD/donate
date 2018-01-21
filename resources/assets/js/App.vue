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
										<router-link to="/campaign/create" v-if="auth"><i class="fa fa-hourglass-start "></i> Започни акција</router-link>
										<router-link to="/login" v-if="guest"><i class="fa fa-hourglass-start "></i> Започни акција</router-link>
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

		


		
	</div>
</template>

<script type="text/javascript">
	import Auth from './store/auth'
	import { post, interceptors, get } from './helpers/api'

	export default {
		created() {
			
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



