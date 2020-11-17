@extends('layouts.app')


@section('Page Title', 'Event Maker')

@section('main')
<div id="app" class="container-fluid p-3">
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