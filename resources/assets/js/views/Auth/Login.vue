<template>
<div>
    <div class="category-header"></div>

    <div class="container container_form">

        <section id="content">
            <form  @submit.prevent="login">
                <h1 class="form__title">Најави се!</h1>
                <div >
                    <input type="text" v-model="form.email" placeholder="Корисничко име">
                    <i class="fa fa-user fa-lg input-icon-username" aria-hidden="true"></i> <br>
                    <small class="error__control" v-if="error.email">{{error.email[0]}}</small>
                </div>
                <div >
                    <input type="password" v-model="form.password" placeholder="Лозинка">
                    <i class="fa fa-lock fa-lg input-icon-psw" aria-hidden="true"></i>
                    <small class="error__control" v-if="error.password">{{error.password[0]}}</small>
                </div>
                <div>
                    <button :disabled="isProcessing" class="btn btn__primary"> Најави се</button>
                </div>
              

                <hr>
                
                <div >
                   
                    <router-link to="/register">
                         <h1>Креирај нов профил!</h1>
                    </router-link>
                </div>
            </form>

        </section>
    </div>
</div>


</template>

<script type="text/javascript">
    import Auth from '../../store/auth'
    import { post } from '../../helpers/api'
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                error: {},
                isProcessing: false
            }
        },
        methods: {
            login() {
                this.isProcessing = true
                this.error = {}
                post('api/login', this.form)
                    .then((res) => {
                        if(res.data.authenticated) {
                            // set token
                            Auth.set(res.data.api_token, res.data.user_id)
                            this.$router.push('/campaign/create')
                        }
                        this.isProcessing = false
                    })
                    .catch((err) => {
                        if(err.response.status === 422) {
                            this.error = err.response.data
                        }
                        this.isProcessing = false
                    })
            }
        }
    }
</script>
