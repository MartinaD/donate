<template>
	<div class="category__list">
 		<div class="container containter-category">
            <div class="intro-text">
                <h1>Volunteer & Service</h1>
                <p>We have raised over $4 billion for people in need.
					Set up a Powerful Fundraiser in less than 30 Seconds.
					Get real results fast!
				</p>
                <a href="#/campaign/create" class="page-scroll waves-effect btn btn-primary">Start a Campaign</a>
            </div>
        </div>

        <div class="campaign__list">
			<div class="col-md-4 col-sm-4 campaign__item" v-for="campaign in campaigns">
				 <div class="campaign-section text-center waves-effect">
				<router-link class="campaign__inner" :to="`/campaigns/${campaign.title}`">
					<img :src="`/uploads/${campaign.image}`" v-if="campaign.image">
					<p class="campaign__name">{{campaign.title}}</p>
				</router-link>
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
				campaigns: [],
			}
		},
		created() {
			get('/api/campaigns')
				.then((res) => {
					this.campaigns = res.data.campaigns
				})
		}
	}
</script>