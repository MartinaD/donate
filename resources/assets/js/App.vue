<template>
	<div class="container">
		<div class="navbar">

			<div class="navbar__brand">
				<router-link to="/">
					<img src="/images/logo.png" id="logo" class="logo img-responsive">
				</router-link>
				
			</div>

			<div class="navbar__item" v-if="auth">
				<router-link to="/campaign/create">Create new campaign</router-link>
			</div>

			<div class="navbar__item" v-if="guest">
				<router-link to="/login">Create new campaign</router-link>
			</div>

			<div :class="[isOpen ? 'menu-wrap' : 'menu-wrap-close']" transition="expand">
				
					<div class="icon-list">
						<a href="#home" class="logo page-scroll waves-effect">Navigator</a>

						<a v-if="auth" class="page-scroll waves-effect">
							<i class="fa fa-fw fa-user"></i>
								<span @click.stop="logout">Logout</span>
						</a>

						<a v-if="guest" href="#login" class="page-scroll waves-effect">
							<i class="fa fa-fw fa-user"></i>
								<span>Login</span>
						</a>
						
						<a href="#portfolio" class="page-scroll waves-effect">
							<i class="fa fa-fw fa-bell-o"></i>
								<span>Portfolio</span>
						</a>
					</div>
				<button  @click.stop="closeMenu" class="close-button" id="close-button"></button>
			</div>
				
			<li class="navbar__item">
					<button @click.stop="openMenu" class="menu-button waves-effect" id="open-button"></button>
				</li>	
			</ul>

		</div>

		<div class="flash flash__error" v-if="flash.error">
			{{flash.error}}
		</div>

		<div class="flash flash__success" v-if="flash.success">
			{{flash.success}}
		</div>

		<router-view></router-view>

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



