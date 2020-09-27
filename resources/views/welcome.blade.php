@extends('layout.index')
@section('content')
<div class="has-sidebar-left has-sidebar-tabs">
    <div class="container-fluid relative animatedParent animateOnce p-lg-5">
        <div class="row row-eq-height my-3">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="card no-b mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="icon-timer s-18"></i></div>
                            </div>
                            <div class="text-center">
                            <div class="s-48 my-3 font-weight-lighter">{{$tmlayanan_count}}</div>
                                Total Layanan
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card no-b mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="icon-user-circle-o s-18"></i></div>
                            </div>
                            <div class="text-center">
                                <div class="s-48 my-3 font-weight-lighter">{{$tmpelanggan_count}}</div>
                                Total Pelanggan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="card no-b">
            <div class="card-header center">
                <strong>Data Pembayaran Hari ini</strong>
            </div>
            <div class="card-body">
                <table class="table table-hover earning-box"
                data-options='{"searching":false}'>
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Pelanggan</th>
                      <th scope="col">Nomor Telphone</th>
                      <th scope="col">Tanggal Online</th>
                      <th scope="col">Paket Layanan</th>
                      <th scope="col">Jumlah Bayar</th>


                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($tmpelanggan as $key => $item)
                      <tr>
                          <th scope="row">{{ ++$key }}</th>
                          <td>{{ $item->n_pelanggan }}</td>
                          <td>{{ $item->no_hp }}</td>
                          <td>{{ $item->tgl_daftar }}</td>
                          <td>{{ $item->tmLayanan->n_layanan }}</td>
                          <td>{{ $item->tmLayanan->harga }}</td>
                        </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Total Pembayaran: </td>
                          <td>
                           {{ $tot_harga }}
                          </td>
                      </tr>
                  </tfoot>
             </table>
            </div>
        </div>
        <div class="card-deck my-3 pt-3">
            <div class="card b-0">
                <div class="card-body p-5">
                    <canvas id="shadowChart" style="height: 450px"></canvas>
                    <script>
                        $(function(){
                            'use strict';
                            let draw = Chart.controllers.line.prototype.draw;
                            Chart.controllers.line = Chart.controllers.line.extend({
                                draw: function() {
                                    draw.apply(this, arguments);
                                    let ctx = this.chart.chart.ctx;
                                    let _stroke = ctx.stroke;
                                    ctx.stroke = function() {
                                        ctx.save();
                                        ctx.shadowColor = '#3f51b5';
                                        ctx.shadowBlur = 10;
                                        ctx.shadowOffsetX = 0;
                                        ctx.shadowOffsetY = 4;
                                        _stroke.apply(this, arguments)
                                        ctx.restore();
                                    }
                                }
                            });

                            let ctx = document.getElementById("shadowChart").getContext('2d');
                            let myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                                    datasets: [{
                                        label: "Months",
                                        data: [65, 59, 80, 81, 56, 55, 40],
                                        borderColor: '#03a9f4',
                                        pointBackgroundColor: "#fff",
                                        pointBorderColor: "#03a9f4",
                                        pointHoverBackgroundColor: "#03a9f4",
                                        pointHoverBorderColor: "#fff",
                                        pointRadius: 4,
                                        pointHoverRadius: 4,
                                        fill: false
                                    }]
                                },
                                options:{
                                    legend: {
                                        display: !0,
                                        labels: {
                                            fontColor: '#7F8FA4',
                                            boxRadius: 4,
                                            usePointStyle: !0
                                        }
                                    },
                                    layout: {
                                        padding: {
                                            left: 0,
                                            right: 0,
                                            top: 0,
                                            bottom: 0
                                        }
                                    },
                                    scales: {
                                        xAxes: [{
                                            display: !0,
                                            ticks: {
                                                fontSize: '11',
                                                fontColor: '#969da5'
                                            },
                                            gridLines: {
                                                display: false,
                                                zeroLineColor: 'rgba(255,255,255,0.1)',
                                                color: 'rgba(255,255,255,0.1)',
                                            }
                                        }],
                                        yAxes: [{
                                            display: !0,
                                            gridLines: {
                                                display: false,
                                                zeroLineColor: 'rgba(255,255,255,0.1)',
                                                color: 'rgba(255,255,255,0.1)',
                                            },
                                            ticks: {
                                                beginAtZero: !0,
                                                max: 100,
                                                stepSize: 25,
                                                fontSize: '11',
                                                fontColor: '#969da5'
                                            }
                                        }]
                                    }
                                }
                            });
                        });
                    </script>
                </div>
            </div>
            <div class="card no-b">
                <div class="card-body">
                    <table class="table table-hover earning-box">
                        <tbody>
                        <tr class="no-b">
                            <td class="w-10">
                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                    <img src="assets/img/dummy/u6.png" alt="">
                                </a>
                            </td>
                            <td>
                                <h6>Sara Kamzoon</h6>
                                <small class="text-muted">Marketing Manager</small>
                            </td>
                            <td>25</td>
                            <td>$250</td>
                        </tr>
                        <tr>
                            <td class="w-10">
                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                    <img src="assets/img/dummy/u7.png" alt="">
                                </a>
                            </td>
                            <td>
                                <h6>Sara Kamzoon</h6>
                                <small class="text-muted">Marketing Manager</small>
                            </td>
                            <td>25</td>
                            <td>$250</td>
                        </tr>
                        <tr>
                            <td class="w-10">
                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                    <img src="assets/img/dummy/u9.png" alt="">
                                </a>
                            </td>
                            <td>
                                <h6>Sara Kamzoon</h6>
                                <small class="text-muted">Marketing Manager</small>
                            </td>
                            <td>25</td>
                            <td>$250</td>
                        </tr>
                        <tr>
                            <td class="w-10">
                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                    <img src="assets/img/dummy/u11.png" alt="">
                                </a>
                            </td>
                            <td>
                                <h6>Sara Kamzoon</h6>
                                <small class="text-muted">Marketing Manager</small>
                            </td>
                            <td>25</td>
                            <td>$250</td>
                        </tr>
                        <tr>
                            <td class="w-10">
                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                    <img src="assets/img/dummy/u12.png" alt="">
                                </a>
                            </td>
                            <td>
                                <h6>Sara Kamzoon</h6>
                                <small class="text-muted">Marketing Manager</small>
                            </td>
                            <td>25</td>
                            <td>$250</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- Right Sidebar -->
<aside class="control-sidebar fixed white ">
    <div class="slimScroll">
        <div class="sidebar-header">
            <h4>Activity List</h4>
            <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="p-3">
            <div>
                <div class="my-3">
                    <small>25% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>45% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 45%;" aria-valuenow="45"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>60% Complete</small>
                    `
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>75% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>100% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 bg-primary text-white">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="font-weight-normal s-14">Sodium</h5>
                    <span class="font-weight-lighter text-primary">Spark Bar</span>
                    <div> Oxygen
                        <span class="text-primary">
                                                    <i class="icon icon-arrow_downward"></i> 67%</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <canvas width="100" height="70" data-chart="spark" data-chart-type="bar"
                            data-dataset="[[28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100]]"
                            data-labels="['a','b','c','d','e','f','g','h','i','j','k','l','m','n','a','b','c','d','e','f','g','h','i','j','k','l','m','n']">
                    </canvas>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                <tbody>
                <tr>
                    <td>
                        <a href="#">INV-281281</a>
                    </td>
                    <td>
                        <span class="badge badge-success">Paid</span>
                    </td>
                    <td>$ 1228.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="#">INV-01112</a>
                    </td>
                    <td>
                        <span class="badge badge-warning">Overdue</span>
                    </td>
                    <td>$ 5685.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="#">INV-281012</a>
                    </td>
                    <td>
                        <span class="badge badge-success">Paid</span>
                    </td>
                    <td>$ 152.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="#">INV-01112</a>
                    </td>
                    <td>
                        <span class="badge badge-warning">Overdue</span>
                    </td>
                    <td>$ 5685.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="#">INV-281012</a>
                    </td>
                    <td>
                        <span class="badge badge-success">Paid</span>
                    </td>
                    <td>$ 152.28</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="sidebar-header">
            <h4>Activity</h4>
            <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="p-4">
            <div class="activity-item activity-primary">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 5 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                </div>
            </div>
            <div class="activity-item activity-danger">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 8 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit ametcon the sectetur that ascing elit users.</p>
                </div>
            </div>
            <div class="activity-item activity-success">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 10 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit amet cons the ecte tur and adip ascing elit users.</p>
                </div>
            </div>
            <div class="activity-item activity-warning">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 12 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit amet consec tetur adip ascing elit users.</p>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<script>
    /*
     *  Add sidebar classes (sidebar-mini sidebar-collapse sidebar-expanded-on-hover) in body tag
     *  you can remove this script tag and add classes directly to body
     *  this is only for demo
     */
    document.body.className += ' theme-dark';
</script>
<!--/#app -->

<script src="assets/js/app.js"></script>




<!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>

@endsection
