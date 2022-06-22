@extends('layouts.master')
@section('title','Admin | Silica Logstics Dashboard')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <!-- top tiles -->
   <div class="row" style="display: inline-block;" >
      <div class="tile_count">
         <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Active Drivers</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
         </div>
         <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
            <div class="count">123.50</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
         </div>
         <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Vehicles</span>
            <div class="count green">2,500</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
         </div>
         <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Requests</span>
            <div class="count">4,567</div>
            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
         </div>
         <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
            <div class="count">2,315</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
         </div>
         <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
            <div class="count">7,325</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
         </div>
      </div>
   </div>
   <!-- /top tiles -->
   <div class="row">
      <div class="col-md-12 col-sm-12 ">
         <div class="dashboard_graph">
            <div class="row x_title">
               <div class="col-md-6">
                  <h3>Network Activities <small>Graph title sub-title</small></h3>
               </div>
               <div class="col-md-6">
                  <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                     <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                     <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                  </div>
               </div>
            </div>
            <div class="col-md-9 col-sm-9">
               <div id="chart_plot_01" class="demo-placeholder"></div>
            </div>
            <div class="col-md-3 col-sm-3  bg-white">
               <div class="x_title">
                  <h2>Active Work Order</h2>
                  <div class="clearfix"></div>
               </div>
               <div class="col-md-12 col-sm-12">
                  <div>
                     <p>Order 1</p>
                     <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                           <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <p>Order 2</p>
                     <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                           <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 ">
                  <div>
                     <p>Order 3</p>
                     <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                           <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <p>Order 4</p>
                     <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                           <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
   </div>
   <br />
   <div class="row">
      <div class="col-md-4 col-sm-4 ">
         <div class="x_panel tile fixed_height_320">
            <div class="x_title">
               <h2>Truck Revenue</h2>
               <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                     </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
               </ul>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <h4>Average vehicle Revenue</h4>
               <div class="widget_summary">
                  <div class="w_left w_25">
                     <span>0.1.5.2</span>
                  </div>
                  <div class="w_center w_55">
                     <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                           <span class="sr-only">60% Complete</span>
                        </div>
                     </div>
                  </div>
                  <div class="w_right w_20">
                     <span>123k</span>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="widget_summary">
                  <div class="w_left w_25">
                     <span>0.1.5.3</span>
                  </div>
                  <div class="w_center w_55">
                     <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                           <span class="sr-only">60% Complete</span>
                        </div>
                     </div>
                  </div>
                  <div class="w_right w_20">
                     <span>53k</span>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="widget_summary">
                  <div class="w_left w_25">
                     <span>0.1.5.4</span>
                  </div>
                  <div class="w_center w_55">
                     <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                           <span class="sr-only">60% Complete</span>
                        </div>
                     </div>
                  </div>
                  <div class="w_right w_20">
                     <span>23k</span>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="widget_summary">
                  <div class="w_left w_25">
                     <span>0.1.5.5</span>
                  </div>
                  <div class="w_center w_55">
                     <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                           <span class="sr-only">60% Complete</span>
                        </div>
                     </div>
                  </div>
                  <div class="w_right w_20">
                     <span>3k</span>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="widget_summary">
                  <div class="w_left w_25">
                     <span>0.1.5.6</span>
                  </div>
                  <div class="w_center w_55">
                     <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                           <span class="sr-only">60% Complete</span>
                        </div>
                     </div>
                  </div>
                  <div class="w_right w_20">
                     <span>1k</span>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4 ">
         <div class="x_panel tile fixed_height_320 overflow_hidden">
            <div class="x_title">
               <h2>Earning Reports</h2>
               <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                     </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
               </ul>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <table class="" style="width:100%">
                  <tr>
                     <th style="width:37%;">
                        <p>Shipment</p>
                     </th>
                     <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                           <p class="">Revenue</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                           <p class="">Profit</p>
                        </div>
                     </th>
                  </tr>
                  <tr>
                     <td>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                     </td>
                     <td>
                        <table class="tile_info">
                           <tr>
                              <td>
                                 <p><i class="fa fa-square blue"></i>Data </p>
                              </td>
                              <td>30%</td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square green"></i>Data </p>
                              </td>
                              <td>10%</td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square purple"></i>Data </p>
                              </td>
                              <td>20%</td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square aero"></i>Data </p>
                              </td>
                              <td>15%</td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square red"></i>Others </p>
                              </td>
                              <td>30%</td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4 ">
         <div class="x_panel tile fixed_height_320 overflow_hidden">
            <div class="x_title">
               <h2>Vehicles Condition</h2>
               <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                     </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
               </ul>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <table class="" style="width:100%">
                  <tr>
                     <th style="width:37%;">
                        <p></p>
                     </th>
                     <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                           <p class="">Status</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 ">
                           <p class=""></p>
                        </div>
                     </th>
                  </tr>
                  <tr>
                     <td>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                     </td>
                     <td>
                        <table class="tile_info">
                           <tr>
                              <td>
                                 <p><i class="fa fa-square blue"></i>Good (10 Vehicles) </p>
                              </td>
                              <td>30%</td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square green"></i>Satisfactory (20 Vehicles)</p>
                              </td>
                              <td>10%</td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square red"></i>Critical (40 Vehicles)</p>
                              </td>
                              <td>20%</td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4 col-sm-4 ">
         <div class="x_panel">
            <div class="x_title">
               <h2>Truck Loading <small>Status</small></h2>
               <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                     </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
               </ul>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="dashboard-widget-content">
                  <ul class="list-unstyled timeline widget">
                     <li>
                        <div class="block">
                           <div class="block_content">
                              <h2 class="title">
                                 <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                              </h2>
                              <div class="byline">
                                 <span>13 hours ago</span> by <a>Jane Smith</a>
                              </div>
                              <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                              </p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="block">
                           <div class="block_content">
                              <h2 class="title">
                                 <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                              </h2>
                              <div class="byline">
                                 <span>13 hours ago</span> by <a>Jane Smith</a>
                              </div>
                              <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                              </p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="block">
                           <div class="block_content">
                              <h2 class="title">
                                 <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                              </h2>
                              <div class="byline">
                                 <span>13 hours ago</span> by <a>Jane Smith</a>
                              </div>
                              <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                              </p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="block">
                           <div class="block_content">
                              <h2 class="title">
                                 <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                              </h2>
                              <div class="byline">
                                 <span>13 hours ago</span> by <a>Jane Smith</a>
                              </div>
                              <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                              </p>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-8 col-sm-8 ">
         <div class="row">
            <div class="col-md-12 col-sm-12 ">
               <div class="x_panel">
                  <div class="x_title">
                     <h2>Service<small>Reminders</small></h2>
                     <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Settings 1</a>
                              <a class="dropdown-item" href="#">Settings 2</a>
                           </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                     </ul>
                     <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="dashboard-widget-content">
                        <div class="col-md-4 hidden-small">
                           <h2 class="line_30">Active Service Reminders</h2>
                           <table class="countries_list">
                              <tbody>
                                 <tr>
                                    <td>Reminder 1</td>
                                   
                                 </tr>
                                 <tr>
                                    <td>Reminder 2</td>
                                   
                                 </tr>
                                 <tr>
                                    <td>Reminder 3</td>
                                    
                                 </tr>
                                 <tr>
                                    <td>Reminder 4</td>
                                    
                                 </tr>
                                 <tr>
                                    <td>Reminder 5</td>
                                    
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div id="world-map-gdp" class="col-md-8 col-sm-12 " style="height:230px;"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <!-- Start to do list -->
            <div class="col-md-6 col-sm-6 ">
               <div class="x_panel">
                  <div class="x_title">
                     <h2>To Do List <small>Sample tasks</small></h2>
                     <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Settings 1</a>
                              <a class="dropdown-item" href="#">Settings 2</a>
                           </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                     </ul>
                     <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="">
                        <ul class="to_do">
                           <li>
                              <p>
                                 <input type="checkbox" class="flat"> Schedule meeting with new client 
                              </p>
                           </li>
                           <li>
                              <p>
                                 <input type="checkbox" class="flat"> Create email address for new intern
                              </p>
                           </li>
                           <li>
                              <p>
                                 <input type="checkbox" class="flat"> Have IT fix the network printer
                              </p>
                           </li>
                           <li>
                              <p>
                                 <input type="checkbox" class="flat"> Copy backups to offsite location
                              </p>
                           </li>
                           <li>
                              <p>
                                 <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                              </p>
                           </li>
                           <li>
                              <p>
                                 <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                              </p>
                           </li>
                           <li>
                              <p>
                                 <input type="checkbox" class="flat"> Create email address for new intern
                              </p>
                           </li>
                           <li>
                              <p>
                                 <input type="checkbox" class="flat"> Have IT fix the network printer
                              </p>
                           </li>
                           <li>
                              <p>
                                 <input type="checkbox" class="flat"> Copy backups to offsite location
                              </p>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End to do list -->
            <!-- start of weather widget -->
            <div class="col-md-6 col-sm-6 ">
               <div class="x_panel">
                  <div class="x_title">
                     <h2>Daily active Driver <small>Sessions</small></h2>
                     <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Settings 1</a>
                              <a class="dropdown-item" href="#">Settings 2</a>
                           </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                     </ul>
                     <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="temperature"><b>Monday</b>, 07:30 AM
                              <span>F</span>
                              <span><b>C</b></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-4">
                           <div class="weather-icon">
                              <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                           </div>
                        </div>
                        <div class="col-sm-8">
                           <div class="weather-text">
                              <h2>Delhi <br><i>Partly Cloudy Day</i></h2>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-12">
                        <div class="weather-text pull-right">
                           <h3 class="degrees">23</h3>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="row weather-days">
                        <div class="col-sm-2">
                           <div class="daily-weather">
                              <h2 class="day">Mon</h2>
                              <h3 class="degrees">25</h3>
                              <canvas id="clear-day" width="32" height="32"></canvas>
                              <h5>15 <i>km/h</i></h5>
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="daily-weather">
                              <h2 class="day">Tue</h2>
                              <h3 class="degrees">25</h3>
                              <canvas height="32" width="32" id="rain"></canvas>
                              <h5>12 <i>km/h</i></h5>
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="daily-weather">
                              <h2 class="day">Wed</h2>
                              <h3 class="degrees">27</h3>
                              <canvas height="32" width="32" id="snow"></canvas>
                              <h5>14 <i>km/h</i></h5>
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="daily-weather">
                              <h2 class="day">Thu</h2>
                              <h3 class="degrees">28</h3>
                              <canvas height="32" width="32" id="sleet"></canvas>
                              <h5>15 <i>km/h</i></h5>
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="daily-weather">
                              <h2 class="day">Fri</h2>
                              <h3 class="degrees">28</h3>
                              <canvas height="32" width="32" id="wind"></canvas>
                              <h5>11 <i>km/h</i></h5>
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <div class="daily-weather">
                              <h2 class="day">Sat</h2>
                              <h3 class="degrees">26</h3>
                              <canvas height="32" width="32" id="cloudy"></canvas>
                              <h5>10 <i>km/h</i></h5>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end of weather widget -->
         </div>
      </div>
   </div>
</div>
<!-- /page content -->
@endsection