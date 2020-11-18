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
});