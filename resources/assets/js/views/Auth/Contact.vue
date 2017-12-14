<template>
	<div>
		<div class="category-header"></div>
		<contact></contact>
	</div>
</template>

<script type="text/javascript">
    import ContactTemplate from '../../components/ContactTemplate.vue'
	import Vue from 'vue'
    Vue.component('contact', ContactTemplate)

    export default {
		components: {
   			 ContactTemplate
 		 },
 	}
</script>
