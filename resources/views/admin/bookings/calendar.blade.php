@extends('admin.layouts.master')

@section('style')
   <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page_title') Calendar @endsection

@section('content')

    <!-- Start Main Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="calendar">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="event-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add New Event</h4>
                        </div>
                        <div class="modal-body pt-3 pr-4 pl-4">
                        </div>
                        <div class="text-right pb-4 pr-4">
                            <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event  ">Create event</button>
                            <button type="button" class="btn btn-danger delete-event  " data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="add-category" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0 d-block">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add a category</h4>
                        </div>
                        <div class="modal-body p-4">
                            <form>
                                <div class="form-group">
                                    <label class="control-label">Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="primary">Primary</option>
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="warning">Warning</option>
                                        <option value="dark">Dark</option>
                                    </select>
                                </div>

                            </form>
                            <div class="text-right">
                                <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary ml-1   save-category" data-dismiss="modal">Save</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content -->

@endsection

@section('script')

    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/fullcalendar.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- custom app -->
    <script>
        $('#external-events .bee-event').each(function() {
            $(this).data('event', {
                title: $.trim($(this).text()),
                stick: true
            });
            $(this).draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0
            });
        });
        var d = new Date();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: moment(d).format("YYYY-MM-DD"),
            editable: true,
            droppable: true,
            events: [
            @foreach($bookings as $key => $booking)    
            {
            @if($booking->status!='rejected' && $booking->status!='pending')
                title: '{{ $booking->provider->name }}',
                start: '{{ $booking->date}}.{{$booking->start_time }}',
                end: '{{ $booking->date}}.{{$booking->finish_time }}',
                description: 'long description',
                borderColor:'#fd397a',
                backgroundColor:'{{ $booking->client->area->color }}',
                textColor: '#fff',
            @endif
            },
            @endforeach   ],eventRender: function(event, element) {
                            element.description = event.description;
                        },   
            drop: function() {
                if ($('#drop-remove').is(':checked')) {
                    $(this).remove();
                }
            },
        });
    </script>
    <!-- custom app ends -->

@endsection