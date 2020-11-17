require('../bootstrap');

import EventForm from '../components/EventForm';
import EventList from '../components/EventList';


var app = new Vue({
    el: '#app',
    components: {
        EventForm,
        EventList
    },
    data: {},
});