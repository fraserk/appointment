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
					// [
						
					// 	{
					// 		title  : 'event2',
					// 		start  : '2018-05-22T12:30:00',
					// 		end    : '2018-05-22T15:34:00',
					// 		allDay : false
					// 	},
					// 	{
					// 		title  : 'New Event',
					// 		start  : '2018-05-22T09:30:00',
					// 		end    : '2018-05-22T10:34:00',
					// 		allDay : false
					// 	}
						
					// ]				
			,
			config: {
        defaultView: 'month',
				eventRender: function(event, element) {
				},
				timeFormat: 'h(:mm)p'

      },
    }
  }
}

</script>
<style>
    @import '~fullcalendar/dist/fullcalendar.css';
	
</style>