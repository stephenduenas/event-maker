@extends('layouts.app')


@section('Page Title', 'Event Maker')

@section('main')
<div id="app" class="container-fluid p-3">
    <div class="alert alert-success" role="alert" v-if="show_success">
        <a href="#" class="alert-link">Event Successfully Saved</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-danger" role="alert" v-if="show_fail">
        <a href="#" class="alert-link">Event not saved</a>. Something is wrong.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <h3 class="mt-5">Calendar</h3>
    <hr>
    <div class="form-row">
        <div class="col-lg-4">
            <event-form></event-maker-form>
        </div>
        <div class="col-lg-8">
            <event-list></event-list>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="js/event-maker/index.js"></script>
@endpush