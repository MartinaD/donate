<template>
<div>
<div class="category-header"></div>
    <div class="campaign__show">
        <div class="campaign__header">
            <h3>{{action}} Campaign</h3>
            <div>
                <button class="btn btn__primary" @click="save" :disabled="isProcessing">Save</button>
                <button class="btn" @click="$router.back()" :disabled="isProcessing">Cancel</button>
            </div>
        </div>
        <div class="campaign__row">
            <div class="campaign__image">
                <div class="campaign__box">
                    <image-upload v-model="form.image"></image-upload>
                    <small class="error__control" v-if="error.image">{{error.image[0]}}</small>
                </div>
            </div>
            <div class="campaign__details">
                <div class="campaign__details_inner">
                    <div class="form__group">
                        <label>Name</label>
                        <input type="text" class="form__control" v-model="form.title">
                        <small class="error__control" v-if="error.title">{{error.title[0]}}</small>
                    </div>
                    <div class="form__group">
                        <label>Category</label>
                        <select class="form__control" v-model="form.category">
                            <option disabled value="">Please select one</option>
                            <option :value="category.id" v-for="category in categories">
                                {{category.name}}
                            </option>
                        </select>
                        
                        <small class="error__control" v-if="error.category">{{error.category[0]}}</small>
                    </div>
                     <div class="form__group">
                        <label>Enter the goal amount</label>
                        <input type="text" class="form__control form__control1" v-model="form.goalamount">
                        <small class="error__control" v-if="error.goalamount">{{error.goalamount[0]}}</small>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="campaign__row">
            <div class="campaign__tags">
                <div class="campaign__box">
                 <h3 class="campaign__sub_title">Tags</h3>
                    <div v-for="(tag, index) in form.tags" class="campaign__form">
                        <input type="text" class="form__control" v-model="tag.name"
                            :class="[error[`tags.${index}.name`] ? 'error__bg' : '']">
                        
                        <button @click="remove('tags', index)" class="btn btn__danger">&times;</button>
                    </div>
                    <button @click="addTag" class="btn">Add Tag</button>
                </div>
            </div>

            <div class="campaign__details">
                <div class="campaign__details_inner">
                    <div class="form__group">
                        <label>Description</label>
                        <textarea class="form__control form__description" v-model="form.body"></textarea>
                        <small class="error__control" v-if="error.body">{{error.body[0]}}</small>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue'
    import Flash from '../../helpers/flash'
    import { get, post } from '../../helpers/api'
    import { toMulipartedForm } from '../../helpers/form'
    import ImageUpload from '../../components/ImageUpload.vue'
    import ImagePreview from '../../components/ImagePreview.vue'


    export default {
        components: {
            ImageUpload,
            ImagePreview
        },
        data() {
            return {
                form: {
                    title: '',
                    category: '',
                    goalamount: '',
                    body: "",
                    tags: [],
                },
                categories: [],
                error: {},
                isProcessing: false,
                initializeURL: `/api/campaign/create`,
                storeURL: `/api/campaigns`,
                action: 'Create',
            } 
        },
        created() {
            get('/api/categories')
                .then((res) => {
                    this.categories = res.data.categories
                }),
             this.form.tags.push({name: ''})  
        },
        methods: {
            save() {
                const form = toMulipartedForm(this.form, this.$route.meta.mode)
                post(this.storeURL, form)
                    .then((res) => {
                        if(res.data.saved) {
                            Flash.setSuccess(res.data.message)
                            this.$router.push(`/campaigns/${res.data.name}`)
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