@extends('layouts.app')


@section('Page Title', 'Event Maker')

@section('main')
<div id="app" class="container mt-3">
    <div class="alert alert-success" role="alert" v-show="show_success" style="display: none">
        <a href="#" class="alert-link">Event Successfully Saved</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-danger" role="alert" v-show="show_fail" style="display: none">
        <a href="#" class="alert-link">Event not saved</a>. Something is wrong.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <h3>Calendar</h3>
    <hr>
    <div class="form-row">
        <div class="col-lg-5">
            <event-form></event-maker-form>
        </div>
        <div class="col-lg-7">
            <event-list></event-list>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="js/event-maker/index.js"></script>
@endpush