<template>
	<div class="image" >
		<h1> {{displayNumber}} </h1>
	</div>
</template>

<script type="text/javascript">
	import Vue from 'vue'
	export default {
		props: {
			number: {default:23}
		},
		data: function(){
   			 return {
     			 displayNumber:0,
     			 interval:false,
     		   }
   		 },

 		 ready:function(){
    		this.displayNumber = this.number ? this.number : 0;
  			},

  		created: function () {
        window.addEventListener('scroll', this.animate);
    	},
    	destroyed: function () {
      	  window.removeEventListener('scroll', this.animate);
    },

  		methods: {
            animate() {
                	clearInterval(this.interval);

		        	if(this.number == this.displayNumber){
		          		return;
		        	}

		        	this.interval = window.setInterval(function(){

			         	 if(this.displayNumber != this.number){
			           		var change = (this.number - this.displayNumber) / 10;
			            	change = change >= 0 ? Math.ceil(change) : Math.floor(change);
			           		this.displayNumber = this.displayNumber + change;
			          	}
					}.bind(this), 20);

   		 	}
   		}

}


</script>