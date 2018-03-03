<template>
	<div>
		<Full-Calendar :config="config" :events="events"></Full-Calendar>
	</div>
</template>

<script>
import { FullCalendar } from 'vue-full-calendar';

	export default {
        components:{
            FullCalendar
				},
	props: ['appointments'],
  data () {
    return {
			events: 		
					this.appointments				
			,
			config: {
        defaultView: 'month',
				eventRender: function(event, element) {
        	console.log(event)
				},
				timeFormat: 'h(:mm)p',	
				weekends: false

      },
    }
  }
}

</script>
<style>
    @import '~fullcalendar/dist/fullcalendar.css';
	
</style>