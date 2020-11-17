@extends('layouts.app')


@section('Page Title', 'Event Maker')

@section('main')
<div id="app" class="container-fluid p-3">
    <h3 class="mt-5">Calendar</h3>
    <hr>
    <div class="form-row">
        <div class="col-lg-4">
            <form id="contact-form" class="mb-5" name="contact-form" action="mail.php" method="POST">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <input type="text" id="event_name" class="form-control">
                            <label for="event_name">Event</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-6">
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input placeholder="Select date" type="date" id="initial_date" class="form-control">
                            <label for="initial_date">Initial Date</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="md-form md-outline input-with-post-icon datepicker">
                            <input placeholder="Select date" type="date" id="final_date" class="form-control">
                            <label for="final_date">Final Date</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-12">
                        <div class="my-3 m-lg-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="monday">
                                <label class="custom-control-label" for="monday">Mon</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="tuesday">
                                <label class="custom-control-label" for="tuesday">Tue</label>
                              </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="wednesday">
                                <label class="custom-control-label" for="wednesday">Wed</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="thursday">
                                <label class="custom-control-label" for="thursday">Thu</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="friday">
                                <label class="custom-control-label" for="friday">Fri</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="saturday">
                                <label class="custom-control-label" for="saturday">Sat</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="sunday">
                                <label class="custom-control-label" for="sunday">Sun</label>
                            </div>
                        </div>

                       
                       
                    </div>                    
                </div>
                <div class="form-row justify-content-center">
                        <button type="submit" class="btn btn-primary btn-md">Sign in</button>
                </div>

            </form>
        </div>
        <div class="col-lg-8">
            <h4>Date: July xx, xxxx</h4>
            <hr>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Event Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Mark</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection