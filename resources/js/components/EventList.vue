<template>
    <div>
        <template v-for="(aMonths, sYears) in event_dates">
            <template v-for="(aDates, iMonths) in aMonths">
                <h4>{{ getStringMonth(aDates[0]) }} {{ sYears }} </h4>
                <hr>
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Event Name</th>
                    </tr>
                </thead>
                <template v-for="oDate in aDates">
                    <tbody>
                        <tr>
                            <th scope="row">{{ oDate.getDate() }} {{ getStringDay(oDate.getDay()) }}</th>
                            <td>
                                <template v-if="event_day.includes(oDate.getDay())">
                                    {{ event_name }}
                                </template>
                            </td>
                        </tr>
                    </tbody>
                </template>
                </table>
            </template>
        </template>
        
    </div>
</template>
<script>

import { EventBus } from '../event-maker/index'
import { HelperMixin } from '../mixins/helper-mixin'

export default {
    name: "app",
    mixins: [HelperMixin],
    data() {
        return {
            event_dates: {},
            event_day: [],
            event_name: '',
            show_event_name: false,
        }
    },
    created() {
        EventBus.$on('getAllEventDates', (oEventDates, oEventSettings) => {
            this.event_dates = oEventDates;
            this.event_day = oEventSettings.days.map(oDays => {
                return oDays.day;
            });
            this.event_name = oEventSettings.event_name;
            console.log(this.event_day);
        });
    },
}

</script>
