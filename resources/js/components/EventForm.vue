<template>
    <form ref="eventForm" id="contact-form" class="mb-5" name="contact-form" action="api/events/1" method="GET">
        <div class="form-row">
            <div class="col-md-12">
                <div class="md-form">
                    <input name="event_name" type="text" id="event_name" class="form-control" placeholder="Event Name" v-model="form.event_name" required>
                    <small class="text-muted float-right">{{ form.event_name.length }}/{{ counter.event_name }}</small>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-12">
                <div class="md-form md-outline input-with-post-icon datepicker">
                    <input name="start_date" placeholder="Select date" type="date" id="start_date" class="form-control" v-model="form.start_date" required>
                    <label for="start_date">Start Date</label>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="md-form md-outline input-with-post-icon datepicker">
                    <input name="end_date" placeholder="Select date" type="date" id="end_date" class="form-control" v-model="form.end_date" required>
                    <label for="end_date">End Date</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-12">
                <div class="my-3 m-lg-0">
                    <div class="custom-control custom-checkbox custom-control-inline" v-for="iDay in days">
                        <input name="day[]" :checked="form.event_day.includes(iDay-1)" :value="iDay-1" type="checkbox" class="custom-control-input" :id="getStringDay(iDay-1)">
                        <label class="custom-control-label" :for="getStringDay(iDay-1)">{{ getStringDay(iDay-1) }}</label>
                    </div>
                </div>
            </div>                    
        </div>
        <div class="form-row justify-content-center mt-lg-3">
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
                event_name: '',
                start_date: '',
                end_date: '',
                event_day: [],
            },
            counter: {
                event_name: 100
            },
            alert_message: {
                empty_event_name: 'Please enter event name',
                greater_start_date: 'Start date must not exceed end date',
            }
        }
    },
    beforeMount() {
        /**
         * Add default date (today)
         */
        this.form.start_date = this.formatDate();
        this.form.end_date = this.formatDate();
        EventBus.$on('renderEventSettings', (oEventSettings) => {
            this.form.start_date = this.formatDate(oEventSettings.start_date);
            this.form.end_date = this.formatDate(oEventSettings.end_date);
            this.form.event_name = oEventSettings.event_name;
            this.form.event_day = oEventSettings.days;
        });
    },
    watch: {
        'form.event_name'(sNew, sOld) {
            if (sNew.length > this.counter.event_name) {
                this.form.event_name = sOld;
            }
        }
    },
    methods: {

        /**
         * Formate Date
         * @param string sDate => default date_today
         * @return string date
         */
        formatDate(sDate = new Date()) {
            /**
             * 'en-CA' to use yyyy-mm-dd format
             */
            const LOCALE = 'en-CA'
            return new Date(sDate).toLocaleDateString('en-CA');
        },

        /**
         * Save/Submit Form
         */
        async submitForm() {
            const bIsValid = this.validateForm();
            if (bIsValid) {
                const oFormData = new FormData(this.$refs.eventForm);
                const oResponse = await this.apiRequest('POST', 'events/1', oFormData);
                console.log(oResponse.status);
                if (oResponse.status === 201) {
                    EventBus.$emit('showAlertMessage');
                    EventBus.$emit('renderAllEventDates', oResponse.data);
                    return;
                }
                EventBus.$emit('showAlertMessage', 'error');
            }
        },

        /**
         * Validate Form
         * @returns bool
         */
        validateForm() {
            if (this.form.event_name.length === 0) {
                alert(this.alert_message.empty_event_name);
                return false;
            };
            if (new Date(this.form.start_date) > new Date(this.form.end_date)) {
                alert(this.alert_message.greater_start_date);
                return false;
            }
            return true;
        },
    }
}
</script>
