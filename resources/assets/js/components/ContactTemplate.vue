<template>
	<div>
	<!--Start Contact Section-->		
		<section id="contact" class="contact">
			<div class="container" style="padding-bottom: 33px;">
				<div class="row">
				
					<div class="sec-title text-center">
						<h2>Имаш прашања?</h2>
						<div class="devider"></div>
					</div>
					
					<div class="sec-sub-title text-center">
						<p>Вашите прашања ќе бидат разгледани и ќе добиете одговор на истите во рок од 24 часа. Ви благодариме!</p> 
					</div>
					
					<!-- contact address -->
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="contact-address">
							<h3>Ја очекуваме вашата посета! <i class="fa fa-heart-o fa-lg"></i></h3>
							<p>бул.Партизански Одереди 59</p>
							<p>Скопје, Македонија</p>
							<p>070 231 293</p>
						</div>
					</div>
					<!-- end contact address -->
					
					<!-- contact form -->
					<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
						<div class="contact-form">
							<h3>Постави прашање</h3>
							<form @submit.prevent="sendQuestion" id="contact-form">
								<div class="input-group name-email">
									<div class="input-field">
										<input type="text" name="name" id="name" placeholder="Име" class="form-control" v-model="form.name">
									</div>
									<div class="input-field">
										<input type="email" name="email" id="email" placeholder="Е-маил" class="form-control" v-model="form.email">
            							<small class="error__control" v-if="error.email">{{error.email[0]}}</small>
									</div>
								</div>
								<div class="input-group">
									<textarea name="question" id="question" placeholder="Прашање" class="form-control" v-model="form.question" required></textarea>
								</div>
								<div class="input-group">
									<button :disabled="isProcessing" id="form-submit" class="pull-right"> Испрати </button>
								</div>
							</form>

						</div>

						
					</div>
					<!-- end contact form -->
					
				</div>
			
			</div>

			<!-- Google map -->
			<gmap></gmap>
			<!-- End Google map -->
		</section>
        <!--End Contact Section-->
        
    </div>

</template>

<script type="text/javascript">
	import Vue from 'vue'
	import GoogleMap from './GoogleMap.vue'
	import Footer from './../components/Footer.vue'
	Vue.component('footer-cmp', Footer)
	Vue.component('gmap', GoogleMap)
	import { post } from '../helpers/api'

	export default {
		data() {
			return {
				form: {
                    email: '',
                    question: '',
                    name: ''
                },
                error: {},
                isProcessing: false
			}
		},
		methods: {
			sendQuestion(){
				this.isProcessing = true
                this.error = {}
                post('api/ask-question', this.form)
                    .then((res) => {
                    if(res.data.sent) {
                    	this.form.name = ""
                    	this.form.email = ""
                    	this.form.question = ""
        				toastr.success('Успешно испратено прашање', 'Success Alert', {timeOut: 4000});
                        this.$router.push('/')
                        }
                        this.isProcessing = false
                    })
                    .catch((err) => {
                        if(err.response.status === 422) {
                            this.error = err.response.data
                        }
                        this.isProcessing = false
                    })

			},
		}
	}
</script>






