<template>
    <form ref="eventForm" id="contact-form" class="mb-5" name="contact-form" action="api/events/1" method="GET">
        <div class="form-row">
            <div class="col-md-12">
                <div class="md-form">
                    <input name="event_name" type="text" id="event_name" class="form-control" v-model="form.event_name" required>
                    <label for="event_name">Event</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-6">
                <div class="md-form md-outline input-with-post-icon datepicker">
                    <input name="start_date" placeholder="Select date" type="date" id="start_date" class="form-control" v-model="form.start_date" required>
                    <label for="start_date">Initial Date</label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="md-form md-outline input-with-post-icon datepicker">
                    <input name="end_date" placeholder="Select date" type="date" id="end_date" class="form-control" v-model="form.end_date" required>
                    <label for="end_date">Final Date</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-12">
                <div class="my-3 m-lg-0">
                    <div class="custom-control custom-checkbox custom-control-inline" v-for="iDay in days">
                        <input name="day[]" :value="iDay-1" type="checkbox" class="custom-control-input" :id="getStringDay(iDay-1)">
                        <label class="custom-control-label" :for="getStringDay(iDay-1)">{{ getStringDay(iDay-1) }}</label>
                    </div>
                </div>
            </div>                    
        </div>
        <div class="form-row justify-content-center">
                <button type="submit" class="btn btn-primary btn-md" @click.prevent="submitForm()">Save</button>
        </div>
    </form>
</template>
<script>
import { HelperMixin } from '../mixins/helper-mixin.js'
import { EventBus } from '../event-maker/index'

export default {
    name: "app",
    mixins: [HelperMixin],
    data() {
        return {
            event_dates: {},
            days: 7,
            form: {
                event_name: 'Chula',
                start_date: '',
                end_date: '',
            }
        }
    },
    beforeMount() {
        /**
         * Add default date (today)
         */
        this.form.start_date = new Date().toISOString().slice(0,10);
        this.form.end_date = new Date().toISOString().slice(0,10);
    },
    methods: {
        /**
         * Save/Submit Form
         */
        async submitForm() {
            const oFormData = new FormData(this.$refs.eventForm);
            const oResult = await this.apiRequest('POST', 'events/1', oFormData);
            this.renderAllEventDates(oResult.data)
        },

        /**
         * Render all event dates
         * @params object oEventSettings
         */
        renderAllEventDates(oEventSettings) {
            const aEventDates = this.getAllInBetweenDates(oEventSettings.start_date, oEventSettings.end_date);
            const oFormattedEventDates = this.formatEventDates(aEventDates);
            EventBus.$emit('getAllEventDates', oFormattedEventDates, oEventSettings);
        },

        /**
         * Get all in between the dates
         * @param string sStartDate
         * @param string sEndDate
         * @returns oDates
         */
        getAllInBetweenDates(sStartDate, sEndDate) {
            let aDates = [];
            //to avoid modifying the original date
            const oStartDate = new Date(sStartDate);
            const oEndDate =  new Date(sEndDate);
            while (oStartDate <= oEndDate) {
                aDates = [...aDates, new Date(oStartDate)];
                oStartDate.setDate(oStartDate.getDate() + 1)
            }
            return aDates;
        },

        /**
         * Format event date
         * To be used for rendering on EventList.vue
         * @param array aEventDates
         * @returns object oFormattedEventDates
         */
        formatEventDates(aEventDates) {
            let oFormattedEventDates = {};
            let iCurrentYear = null;
            let iCurrentMonth = null;
            aEventDates.forEach((oDate, iIndex) => {
                let iFullYear = oDate.getFullYear();
                let iMonth = oDate.getMonth();
                if (iFullYear > iCurrentYear || iCurrentYear === null) {
                    iCurrentYear = iFullYear;
                    oFormattedEventDates[iFullYear] = {};
                    iCurrentMonth = null;
                }
                if (iMonth > iCurrentMonth || iCurrentMonth === null) {
                    iCurrentMonth = iMonth;
                    oFormattedEventDates[iFullYear][iMonth] = [];
                }
                oFormattedEventDates[iFullYear][iMonth].push(oDate);
            })
            return oFormattedEventDates;
        },
    }
}
</script>
