@extends('admin.layouts.master')

@section('panel_title','صفحه اصلی')

@section('panel_page_title','داشبورد')

@section('panel_content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-6 animatedParent animateOnce z-index-50">
                    <div class="panel minimal panel-default animated fadeInUp">
                        <div class="panel-heading clearfix">
                            <div class="panel-title">مجموع درآمد</div>
                        </div>
                        <!-- panel body -->
                        <div class="panel-body">
                            <div class="stack-order">
                                <h1 class="no-margins">$87,003</h1>
                            </div>
                            <div class="bar-chart-icon"><i class="fa fa-bar-chart"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animatedParent animateOnce z-index-49">
                    <div class="panel minimal panel-default animated fadeInUp">
                        <div class="panel-heading clearfix">
                            <div class="panel-title">پرسش و پاسخ</div>
                        </div>
                        <!-- panel body -->
                        <div class="panel-body">
                            <div class="stack-order">
                                <h1 class="no-margins">69</h1>
                            </div>
                            <div class="bar-chart-icon"><i class="fa fa-question-circle"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 animatedParent animateOnce z-index-48">
                    <div class="panel minimal panel-default animated fadeInUp">
                        <div class="panel-heading clearfix">
                            <div class="panel-title">تعداد کاربران</div>
                        </div>
                        <!-- panel body -->
                        <div class="panel-body">
                            <div class="stack-order">
                                <h1 class="no-margins">823</h1>
                            </div>
                            <div class="bar-chart-icon">
                                <div class="fa fa-user"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animatedParent animateOnce z-index-47">
                    <div class="panel minimal panel-default animated fadeInUp">
                        <div class="panel-heading clearfix">
                            <div class="panel-title">پیامک های احراز هویت ارسالی</div>
                        </div>
                        <!-- panel body -->
                        <div class="panel-body">
                            <div class="stack-order">
                                <h1 class="no-margins">823</h1>
                            </div>
                            <div class="bar-chart-icon">
                                <div class="fa fa-commenting"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 animatedParent animateOnce z-index-38">
            <div class="panel panel-default animated fadeInUp">
                <div class="panel-heading no-border clearfix">
                    <!--<h2 class="panel-title">ترافیک سایت</h2>-->
                </div>
                <div class="panel-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('panel_script')
    <!--ChartJs-->
    <script src="/panel/js/plugins/chartjs/Chart.min.js"></script>
    <script>
        /* start chart */
        var chart = document.getElementById("myChart");
        var myChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                datasets: [{
                    label: 'آمار بازدید',
                    fill: true,
                    lineTension: 0.2,
                    data: [124, 120, 222, 250, 200, 280, 310, 352, 364, 454, 490, 501],
                    /*backgroundColor: [
                        'rgba(255,235,59,0.3)'
                    ],
                    borderColor: [
                        'rgba(255,235,59,1)'
                    ],*/
                    borderWidth: 3
                }]
            },
            options: {
                legend: {
                    display: false,
                    defaultFontFamily: 'sans-serif'
                }
            }
        });
        /* end chart */
    </script>
@endsection