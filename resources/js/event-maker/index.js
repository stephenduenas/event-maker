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
            this.show_success = bIsSuccess;
            this.show_fail = !bIsSuccess;
        });
    },
});