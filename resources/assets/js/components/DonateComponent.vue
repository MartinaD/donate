<template>
<div class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
              <span class="close" @click="$emit('close')">&times;</span>
              <div class="form-style-5">
                    <fieldset>
                        <legend><span class="number">1</span> Внесете ги Вашите податоци</legend>
                        <input type="hidden" name="campaign" v-model="form.campaign">
                        <input type="text" name="field1" placeholder="Име *" v-model="form.name">
                        <small class="error__control" v-if="error.name">{{error.name[0]}}</small>
                        <input type="email" name="field2" placeholder="Е-маил адреса *" v-model="form.email">
                        <small class="error__control" v-if="error.email">{{error.email[0]}}</small>
                        <input dir="ltr" type="text" name="field3" placeholder="Сума *" v-model="form.sum">
                        <small class="error__control" v-if="error.sum">{{error.sum[0]}}</small>
                    </fieldset>

                    <fieldset>
                        <legend><span class="number">2</span> Внесете ги податоците од вашата картичка</legend>
                        <the-mask :mask="['#### #### #### ####']" placeholder="Број на картичка *" v-model="form.card_num" />
                        <input type="text" name="field3" placeholder="CSV код *">
                        <label for="date">Датум на важност</label>
                        <select id="date" name="field4">
                            <option v-for="m in months"> {{m}} </option>>
                            
                        </select> 
                        <select id="date" name="field4">
                            <option v-for="m in years"> {{m}} </option>>
                        </select>
                    </fieldset>

                    <fieldset>
                        <legend><span class="number">3</span> Коментар </legend>
                        <textarea name="field1" placeholder="..." v-model="form.comment"></textarea>
                        <input type="checkbox" v-model="form.private"> Дали сакате донацијата да е приватна? </input>
                    </fieldset>
                    <br>
                    <button class="btn_donate_form" @click="save" :disabled="isProcessing">Донирај</button>
            </div>
        </div>
    </div>
 
</div>
</template>


<script type="text/javascript">
    import Vue from 'vue'
    import Flash from './../helpers/flash'
    import { get, post } from './../helpers/api'
    import { toMulipartedForm } from './../helpers/form'
    import {TheMask} from 'vue-the-mask'
    import money from 'v-money'

// register directive v-money and component <money>
Vue.use(money, {precision: 4})


    export default {
        components: {TheMask},
        props: ['campaign'],
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    sum: '',
                    comment: '',
                    private: false,
                    campaign: this.campaign
                },
                months: ['01', '02','03', '04','05', '06','07', '08','09', '10','11', '12'],
                years: ['2017', '2018','2019', '2020','2021', '2022','2023', '2024','2025'],
                error: {},
                isProcessing: false,
                storeURL: `/api/donations`,
            } 
        },
        methods: {
            save() {
                const form = toMulipartedForm(this.form, this.$route.meta.mode)
                post(this.storeURL, form)
                    .then((res) => {
                        if(res.data.saved) {
                            Flash.setSuccess("Успешно е завршена донацијата. Ви благодариме!")
                          
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
            addTag() {
               this.form.tags.push({
                    name: ''
                })            
            },
            remove(type, index) {
                if(this.form[type].length > 1) {
                    this.form[type].splice(index, 1)
                }
            }
           
        }
    }
</script>
