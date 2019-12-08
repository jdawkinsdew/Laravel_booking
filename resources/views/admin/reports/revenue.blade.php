@extends('admin.layouts.master')

@section('style')
    <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page_title') Revenue @endsection

@section('content')

    <!-- Start Main content -->
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
                                <h4 class="header-title">Revenue</h4>
                                <div class="graph_data">                                                    
                                    <div id="basic-column" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ends Main content -->
           
@endsection

@section('script')

    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- custom app -->
    <script>
        // global variable
        var current_time;
        var disp_year_month,disp_week_data,disp_month_data,week_data,year_month,month_data;

        // database data
        disp_year_month = @json($disp_year_month);
        year_month = @json($year_month);
        disp_week_data = @json($disp_week_data);
        week_data = @json($week_data);
        disp_month_data = @json($disp_month_data);
        month_data = @json($month_data);
        current_time = @json($currentTime); 
        
        $(function() {   
            flag = 2;
            bookingReport(disp_year_month,year_month);  
        });
    
        function bookingReport(data,category){
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
                    name: 'booking',            
                    data:data       
                }],
                xaxis: {
                categories: category,
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
                            return " "+val
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
            bookingReport(disp_year_month,year_month); 
        });

        $(".fc-agendaWeek-button").click(function(){
            $(".fc-month-button").removeClass("fc-state-active");
            $(".fc-agendaWeek-button").removeClass("fc-state-active");
            $(".fc-agendaDay-button").removeClass("fc-state-active");
            $(".fc-agendaWeek-button").addClass("fc-state-active");
            $('.apexcharts-canvas').css("height","350px");
            $("#basic-column").html("");
            flag = 1;
            bookingReport(disp_week_data,week_data);  
        });

        $(".fc-agendaDay-button").click(function(){
            $(".fc-month-button").removeClass("fc-state-active");
            $(".fc-agendaWeek-button").removeClass("fc-state-active");
            $(".fc-agendaDay-button").removeClass("fc-state-active");
            $(".fc-agendaDay-button").addClass("fc-state-active");
            $('.apexcharts-canvas').css("height","350px");
            $("#basic-column").html("");
            flag = 0;
            bookingReport(disp_month_data,month_data);   
        });
        
        $(".fc-next-button").click(function(){
            $(".fc-prev-button").removeClass("fc-state-active");
            $(".fc-next-button").removeClass("fc-state-active");
            $(".fc-next-button").addClass("fc-state-active");
            $('.apexcharts-canvas').css("height","350px");
            $.get("{{ route('admin.reports.nextbooking') }}",         
                {
                flag:flag,
                current_time:current_time,             
                },
                function (data) {
                    if(data!="false"){
                        disp_year_month = data['disp_year_month'];
                        year_month = data['year_month'];
                        disp_month_data = data['disp_month_data'];
                        month_data = data['month_data'];
                        disp_week_data = data['disp_week_data'];
                        week_data = data['week_data'];
                    
                        flag = data['flag'];
                            $(".graph_data").html("<div id='basic-column' class='apex-charts'></div>");
                        if(flag == 1){                        
                            bookingReport(disp_week_data,week_data);  
                        }else if(flag == 2)
                        {
                            bookingReport(disp_year_month,year_month);
                        }else if(flag==0)
                        {
                            bookingReport(disp_month_data,month_data); 
                        }
                            var currentYear = data['currentYear'];
                            var currentMonthName = data['currentMonthName'];
                            current_time = data['current_time'];
                            console.log(current_time);
                        $(".fc-center").html("<h2>"+currentYear+"- "+currentMonthName+"</h2>");
                    }                            
                }); 
        });  

    
        $(".fc-prev-button").click(function(){
            $(".fc-prev-button").removeClass("fc-state-active");
            $(".fc-next-button").removeClass("fc-state-active");
            $(".fc-prev-button").addClass("fc-state-active");
            $('.apexcharts-canvas').css("height","350px");
            $.get("{{ route('admin.reports.prevbooking') }}",
                {
                    flag:flag,
                    current_time:current_time,             
                },
                function (data) {
                    if(data!="false"){
                        disp_year_month = data['disp_year_month'];
                        year_month = data['year_month'];
                        disp_month_data = data['disp_month_data'];
                        month_data = data['month_data'];
                        disp_week_data = data['disp_week_data'];
                        week_data = data['week_data'];
                        flag = data['flag'];

                        $(".graph_data").html("<div id='basic-column' class='apex-charts'></div>");

                        if(flag == 1){bookingReport(disp_week_data,week_data);}
                        else if(flag == 2){bookingReport(disp_year_month,year_month);}
                        else if(flag==0){bookingReport(disp_month_data,month_data);}
                        var currentYear = data['currentYear'];
                        var currentMonthName = data['currentMonthName'];
                        current_time = data['current_time'];
                        console.log(current_time);

                        $(".fc-center").html("<h2>"+currentYear+"- "+currentMonthName+"</h2>");
                    }
                    else{
                        console.log(data);   
                    }                                
                }); 
        });
        
        $(".fc-today-button").click(function(){
            $(".fc-prev-button").removeClass("fc-state-active");
            $(".fc-next-button").removeClass("fc-state-active");
            $(".fc-today-button").removeClass("fc-state-active");
            $(".fc-today-button").addClass("fc-state-active");
            location.reload();
        });
    </script>
    <!-- end custom js-->

@endsection