<template>
    <div class="mt-5 mt-lg-0">
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
            alert_message: {
                get_api: 'There\'s something wrong on response.'
            }
        }
    },
    async created() {
        EventBus.$on('getAllEventDates', (oEventDates, oEventSettings) => {
            this.event_dates = oEventDates;
            this.event_day = oEventSettings.days.map(oDays => {
                return oDays.day;
            });
            this.event_name = oEventSettings.event_name;
        });
        this.renderEventDatesList();
    },
    methods: {

        /**
         * Render event dates list
         */
        async renderEventDatesList() {
            const oEventSettings = await this.getEventSettingsApi();
            if (oEventSettings !== null && oEventSettings.length !== 0) {
                /**
                 * @link resources\js\event-maker\index.js
                 */
                EventBus.$emit('renderAllEventDates', oEventSettings);
                oEventSettings.days = this.event_day;
                /**
                 * @link resources\js\components\EventForm.vue
                 */
                EventBus.$emit('renderEventSettings', oEventSettings);
            }
        },

        /**
         * Get event settings from back-end api
         * @return mixed
         */
        async getEventSettingsApi() {
            /**
             * Since event_id doesn't need to be dynamic
             */
            const EVENT_ID = 1;
            const oResponse = await this.apiRequest('GET', `events/${EVENT_ID}`);
            if (oResponse.status !== 200) {
                alert(this.alert_message.get_api);
                return null;
            }
            return oResponse.data
        }
    }
}

</script>
