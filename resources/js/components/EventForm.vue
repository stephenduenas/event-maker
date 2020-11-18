<template>
    <form ref="eventForm" id="contact-form" class="mb-5" name="contact-form" action="api/events/1" method="GET">
        <div class="form-row">
            <div class="col-md-12">
                <div class="md-form">
                    <input name="event_name" type="text" id="event_name" class="form-control">
                    <label for="event_name">Event</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-6">
                <div class="md-form md-outline input-with-post-icon datepicker">
                    <input name="start_date" placeholder="Select date" type="date" id="start_date" class="form-control">
                    <label for="start_date">Initial Date</label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="md-form md-outline input-with-post-icon datepicker">
                    <input name="end_date" placeholder="Select date" type="date" id="end_date" class="form-control">
                    <label for="end_date">Final Date</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-12">
                <div class="my-3 m-lg-0">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="day[]" value="1" type="checkbox" class="custom-control-input" id="monday">
                        <label class="custom-control-label" for="monday">Mon</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="day[]" value="2" type="checkbox" class="custom-control-input" id="tuesday">
                        <label class="custom-control-label" for="tuesday">Tue</label>
                        </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="day[]" value="3" type="checkbox" class="custom-control-input" id="wednesday">
                        <label class="custom-control-label" for="wednesday">Wed</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="day[]" value="4" type="checkbox" class="custom-control-input" id="thursday">
                        <label class="custom-control-label" for="thursday">Thu</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="day[]" value="5" type="checkbox" class="custom-control-input" id="friday">
                        <label class="custom-control-label" for="friday">Fri</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="day[]" value="6" type="checkbox" class="custom-control-input" id="saturday">
                        <label class="custom-control-label" for="saturday">Sat</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="day[]" value="7" type="checkbox" class="custom-control-input" id="sunday">
                        <label class="custom-control-label" for="sunday">Sun</label>
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

export default {
    name: "app",
    mixins: [HelperMixin],
    data() {
        return {
            message: 'Component Message!'
        }
    },
    methods: {
        async submitForm() {
            const oFormData = new FormData(this.$refs.eventForm);
            const oResult = await this.apiRequest('POST', 'events/1', oFormData);
            let oData = oResult.data;
            let aEventDates = this.getAllInBetweenDates(oData.start_date, oData.end_date);
            this.formatEventDates(aEventDates);

        },
        getAllInBetweenDates(sStartDate, sEndDate) {
            let oDates = [];
            //to avoid modifying the original date
            const oStartDate = new Date(sStartDate);
            const oEndDate =  new Date(sEndDate);
            while (oStartDate <= oEndDate) {
                oDates = [...oDates, new Date(oStartDate)];
                oStartDate.setDate(oStartDate.getDate() + 1)
            }
            return oDates;
        },
        formatEventDates(aEventDates) {

        },
        getStringMonth(oDate) {
            const LOCALE = 'default';
            const OPTIONS = {
                month: 'long'
            };
            return oDate.toLocaleString(LOCALE, OPTIONS);
        }
    }
}
</script>
