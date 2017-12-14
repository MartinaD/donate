<template>
    <div>
        <form class="form" @submit.prevent="login">
            <h1 class="form__title">Најави се!</h1>
            <div class="form__group">
                <label>Корисничко име</label>
                <input type="text" class="form__control" v-model="form.email" placeholder="email@domain.com">
                <small class="error__control" v-if="error.email">{{error.email[0]}}</small>
            </div>
            <div class="form__group">
                <label>Лозинка</label>
                <input type="password" class="form__control" v-model="form.password" placeholder="********">
                <small class="error__control" v-if="error.password">{{error.password[0]}}</small>
            </div>
            <div class="form__group">
                <button :disabled="isProcessing" class="btn btn__primary">Најави се</button>
            </div>
            <div class="form__group" style="float: right;">
                <a href="#/register">Регистрирај се</a>
            </div>
        </form>

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
