<template>
  <div>
    <div v-for="(item, index) in items">
    
      <transition-group tag="div" class="img-slider" name="slide">
      <div v-for="number in [currentImg]" v-bind:key="number" >
        <img :src="imgList[Math.abs(currentImg) % imgList.length]"/>
      </div>
      </transition-group>




      <transition name="custom-classes-transition" 
        enter-active-class="animated flash" 
        leave-active-class="animated fadeOutUp">
      
      <li v-if="currentItem ==  index" class="slide-item"><p>{{ item.message }}</p> <strong> {{item.name}} </strong> <br> {{item.image}}</li>
      
      </transition>
    </div>
  </div>
</template>

<script type="text/javascript">
	export default {
  props: {
      index: {default:1}
    },
		data: function(){
   			 return {
     			items: [
            { message: 'In at accumsan risus. Nam id volutpat ante. Etiam vel mi mattis, vulputate nunc nec, sodales nibh. Etiam nulla magna, gravida eget ultricies sit amet.', name: "John Doe", image: "IMAGEEE"},
            { message: 'Albert Doe Team Lead, Design Studio', name: "Matina Denkovikj", image: "SECOOOND IMAGE"}
         ],
      			currentItem: 0,
      			show: true
     		   }
   		 },
   		  mounted: function() {
    			setInterval(() => {

      				this.currentItem++
      				if (this.items.length <= this.currentItem) {
        				this.currentItem = 0
     				 }
    			}, 5000)
  			}
 		
   		}

</script>





