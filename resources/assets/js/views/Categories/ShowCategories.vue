<template>
	<div class="category__list">

		<div class="category-header"></div>

		<div class="row-category">
	    	<div class="col-md-3 col-sm-6 col-xs-12" style="margin:0px; padding: 0px">
	        	<div class="grid-item">
	        	<img src="http://lorempixel.com/400/200/food/2/" class="img-fluid-hover"/>
                	<img src="/images/kids.jpg" alt="Image" class="img-fluid">

                	
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" style="margin:0px; padding: 0px">
	        	<div class="grid-item">
                	<img src="images/cancer.jpg" alt="Image" class="img-fluid tm-img">
                  
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" style="margin:0px; padding: 0px">
	        	<div class="grid-item">
                	<img src="/images/kids.jpg" alt="Image" class="img-fluid tm-img">
                   
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" style="margin:0px; padding: 0px">
	        	<div class="grid-item">
                	<img src="images/cancer.jpg" alt="Image" class="img-fluid tm-img">
                    
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" style="margin:0px; padding: 0px">
	        	<div class="grid-item">
                	<img src="/images/kids.jpg" alt="Image" class="img-fluid">

                   
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" style="margin:0px; padding: 0px">
	        	<div class="grid-item">
                	<img src="images/cancer.jpg" alt="Image" class="img-fluid tm-img">
                    
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" style="margin:0px; padding: 0px">
	        	<div class="grid-item">
                	<img src="/images/kids.jpg" alt="Image" class="img-fluid tm-img">
                    
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" style="margin:0px; padding: 0px">
	        	<div class="grid-item">
                	<img src="images/cancer.jpg" alt="Image" class="img-fluid tm-img">
                    
                </div>
            </div>
        </div>

	</div>
</template>


<script type="text/javascript">
	import { get } from '../../helpers/api'
	export default {
	
		data() {
			return {
				categories: [],
			}
		},
		created() {
			get('/api/categories')
				.then((res) => {
					this.categories = res.data.categories
				})
		}
	}
</script>