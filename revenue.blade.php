@extends('admin.layouts.master')

@section('style')
   <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Revenue</a></li>
                                        <li class="breadcrumb-item active">Revenue</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Revenue</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                         <div class="col-lg-12">
                                           <div class="fc fc-unthemed fc-ltr">
                                               <div class="fc-toolbar fc-header-toolbar">
                                                   <div class="fc-left">
                                                      <div class="fc-button-group">
                                                       <button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left" aria-label="prev">
                                                           <span class="fc-icon fc-icon-left-single-arrow"></span>
                                                        </button>
                                                        <button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right" aria-label="next">
                                                            <span class="fc-icon fc-icon-right-single-arrow"></span>
                                                        </button>
                                                      </div>
                                                      <button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right">today</button>
                                                    </div>
                                                    <div class="fc-right">
                                                      <div class="fc-button-group">
                                                        <button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button>
                                                        <button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button>
                                                        <button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button>
                                                      </div>
                                                    </div>
                                                    <div class="fc-center"><h2>{{ $currentYear }} - {{ $currentMonthName}}</h2></div>
                                                    <div class="fc-clear"></div>
                                                </div>
                                               </div>
                                           </div>
                                        </div>
                                        <div class="card" style="margin-top:20px;">
                                            <div class="card-body">
                                                <h4 class="header-title">Booking Report</h4>
                                                <div id="basic-column" class="apex-charts"></div>
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
           
                </div> <!-- container -->
@endsection

@section('script')
    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/fullcalendar.min.js') }}"></script>
    <!-- third party js ends -->
    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
    <!-- demo app -->
    <script src="{{ asset('assets/js/demo/demo.calendar.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/demo/demo.dashboard-sales.js') }}"></script> --}}
   <script>
    var currentMonth;
    var currentYear;
    var data_graph;
    var category;
    var categorys = ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'];
    var week = ["","","","","","",""];
    var flag;
    var countMonth_week;
    currentMonth = @json($currentMonth);
    currentYear = @json($currentYear);
    var countMonth_day = @json($countMonth_day);
    $(function() {   
    flag = 2;     
    bookingReport(flag);
    });
   
  function bookingReport(flag){
    var firstOfMonth = new Date(currentYear,currentMonth - 1, 1);
       var firstDate = firstOfMonth.getDay();
       var thisDate = firstDate;
       var lastOfMonth = new Date(currentYear,currentMonth,0);
       var j = 0;
       countMonth_week = [0,0,0,0,0,0,0];
       week[j] = currentMonth+":"+(j+1)+"week";
       for(var i = 1;i<lastOfMonth.getDate();i++) 
        {
            if (thisDate == 6 )
            {
                j++;
                thisDate = 0;
                week[j] = currentMonth+":"+(j+1)+"week";
                continue;
            }
                thisDate += 1;
                countMonth_week[j] +=countMonth_day[currentMonth-1][i];
        }
      if( flag == 2)
        {
        data_graph = @json($countMonth);
        category = ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'];
        }else if(flag == 1)
        {
       data_graph = countMonth_week;
       category = week;
        } else if(flag == 0)
       {
        data_graph = countMonth_day[currentMonth-1];
        category = ['1','2', '3', '4', '5', '6', '7', '8', '9', '10','11','12', '13', '14', '15', '16', '17', '18', '19', '20','21','22', '23', '24', '25', '26', '27', '28', '29', '30','31',''];
       }
       var options = {
        chart: {
            height: 400,
            type: 'bar',
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                endingShape: 'rounded',
                columnWidth: '55%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        colors: ["#5d78ff"],
        series: [ {
            name: 'Revenue',            
             data:data_graph       
        }],
          xaxis: {
           categories: category
           },
        legend: {
            offsetY: 10,
        },
        fill: {
            opacity: 1

        },
        grid: {
            row: {
                colors: ['transparent', 'transparent'],
                opacity: 0.2
            },
            borderColor: '#f1f3fa'
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return " "+val+"$"
                }
            }
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    toolbar: {
                        show: false
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                legend: {
                    show: false
                },
            }
        }]
    }
    var chart = new ApexCharts(
        document.querySelector("#basic-column"),
        options
    );
    chart.render();
  }
 $(".fc-month-button").click(function(){
         $(".fc-month-button").removeClass("fc-state-active");
         $(".fc-agendaWeek-button").removeClass("fc-state-active");
        $(".fc-agendaDay-button").removeClass("fc-state-active");
        $('.apexcharts-canvas').css("height","350px");
        $(".fc-month-button").addClass("fc-state-active");
        $("#basic-column").html("");
        flag = 2;
        bookingReport(flag);
        });

       $(".fc-agendaWeek-button").click(function(){
        $(".fc-month-button").removeClass("fc-state-active");
        $(".fc-agendaWeek-button").removeClass("fc-state-active");
        $(".fc-agendaDay-button").removeClass("fc-state-active");
        $(".fc-agendaWeek-button").addClass("fc-state-active");
        $('.apexcharts-canvas').css("height","350px");
         $("#basic-column").html("");
         flag = 1;
         bookingReport(flag); 
    });
       $(".fc-agendaDay-button").click(function(){
        $(".fc-month-button").removeClass("fc-state-active");
        $(".fc-agendaWeek-button").removeClass("fc-state-active");
        $(".fc-agendaDay-button").removeClass("fc-state-active");
        $(".fc-agendaDay-button").addClass("fc-state-active");
        $('.apexcharts-canvas').css("height","350px");
        $("#basic-column").html("");
        flag = 0;
        bookingReport(flag);   
    });
    $(".fc-next-button").click(function(){
        $(".fc-prev-button").removeClass("fc-state-active");
        $(".fc-next-button").removeClass("fc-state-active");
        $(".fc-next-button").addClass("fc-state-active");
        $('.apexcharts-canvas').css("height","350px");
        $("#basic-column").html("");
              currentMonth += 1;
                if(currentMonth>12)
                {
                currentMonth =1;
                }
                else if(currentMonth < 1)
                {
                currentMonth =12;
                }
              bookingReport(flag);
              var cYear = ""+currentYear;
              var cMonth = ""+categorys[currentMonth-1];
              $(".fc-center").html("<h2>"+cYear+"- "+cMonth+"</h2>");
        
    });

    $(".fc-prev-button").click(function(){
        $(".fc-prev-button").removeClass("fc-state-active");
        $(".fc-next-button").removeClass("fc-state-active");
        $(".fc-prev-button").addClass("fc-state-active");
        $('.apexcharts-canvas').css("height","350px");
        $("#basic-column").html("");
                currentMonth -= 1;
                if(currentMonth>12)
                {
                currentMonth =1;
                }
                else if(currentMonth < 1)
                {
                currentMonth =12;
                }
                bookingReport(flag);
                   var cYear = ""+currentYear;
                   var cMonth = ""+categorys[currentMonth-1];
                   $(".fc-center").html("<h2>"+cYear+"- "+cMonth+"</h2>");
    });
   

    </script>
    <!-- end demo js-->
@endsection