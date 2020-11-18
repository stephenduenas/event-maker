require('../bootstrap');

import EventForm from '../components/EventForm';
import EventList from '../components/EventList';

export const EventBus = new Vue();

var app = new Vue({
    el: '#app',
    components: {
        EventForm,
        EventList
    },
    data: {
        show_success: false,
        show_fail: false,
    },

    created() {
        EventBus.$on('showAlertMessage', (sAlertType = 'success') => {
            const bIsSuccess = sAlertType === 'success';
            console.log(bIsSuccess);
            this.show_success = bIsSuccess;
            this.show_fail = !bIsSuccess;
        });
        EventBus.$on('renderAllEventDates', this.renderAllEventDates);
    },
    methods: {
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
         * To be used for rendering of dates on EventList.vue
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
});