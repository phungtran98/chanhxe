<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from flatfull.com/themes/first/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Sep 2018 07:34:09 GMT -->
   <head>
      <meta charset="utf-8">
      <title>Mobile first web app theme | first</title>
      <meta name="description" content="mobile first, app, web app, responsive, admin dashboard, flat, flat ui">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     @include('admin.template.css')
      <!--[if lt IE 9]> <script src="js/ie/respond.min.js"></script> <script src="js/ie/html5.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
   </head>
   <body>
      <!-- header -->
      @include('admin.template.header')
      <!-- / header --> <!-- nav --> 
      <nav id="nav" class="nav-primary hidden-xs nav-vertical">
         <ul class="nav" data-spy="affix" data-offset-top="50">
            <li class="active"><a href="index.html"><i class="fa fa-dashboard fa-lg"></i><span>Dashboard</span></a></li>
            <li class="dropdown-submenu">
               <a href="#"><i class="fa fa-th fa-lg"></i><span>Elements</span></a> 
               <ul class="dropdown-menu">
                  <li><a href="buttons.html">Buttons</a></li>
                  <li><a href="icons.html"><b class="badge pull-right">302</b>Icons</a></li>
                  <li><a href="grid.html">Grid</a></li>
                  <li><a href="widgets.html"><b class="badge bg-primary pull-right">8</b>Widgets</a></li>
                  <li><a href="components.html"><b class="badge pull-right">18</b>Components</a></li>
                  <li><a href="portlet.html">Portlet</a></li>
               </ul>
            </li>
            <li class="dropdown-submenu">
               <a href="#"><i class="fa fa-list fa-lg"></i><span>Lists</span></a> 
               <ul class="dropdown-menu">
                  <li><a href="list.html">List groups</a></li>
                  <li><a href="table.html">Table</a></li>
               </ul>
            </li>
            <li><a href="form.html"><i class="fa fa-edit fa-lg"></i><span>Form</span></a></li>
            <li><a href="chart.html"><i class="fa fa-signal fa-lg"></i><span>Chart</span></a></li>
            <li class="dropdown-submenu">
               <a href="#"><i class="fa fa-link fa-lg"></i><span>Others</span></a> 
               <ul class="dropdown-menu">
                  <li><a href="mail.html">Mail</a></li>
                  <li><a href="calendar.html">Fullcalendar</a></li>
                  <li><a href="timeline.html">Timeline</a></li>
                  <li><a href="profile.html">Profile</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                  <li><a href="maps.html">Maps</a></li>
                  <li><a href="invoice.html">Invoice</a></li>
                  <li><a href="signin.html">Signin page</a></li>
                  <li><a href="signup.html">Signup page</a></li>
                  <li><a href="404.html">404 page</a></li>
               </ul>
            </li>
         </ul>
      </nav>
      <!-- / nav --> 
      <section id="content">
         <section class="main padder">
            <div class="row">
               <div class="col-lg-12">
                  <section class="toolbar clearfix m-t-large m-b"> <a href="mail.html" class="btn btn-white btn-circle"><i class="fa fa-envelope-o"></i>Inbox <b class="badge bg-white">5</b></a> <a href="#" class="btn btn-primary btn-circle active"><i class="fa fa-lightbulb-o"></i>Projects</a> <a href="#" class="btn btn-success btn-circle"><i class="fa fa-check"></i>Tasks</a> <a href="#" class="btn btn-info btn-circle active"><i class="fa fa-clock-o"></i>Timeline<b class="badge bg-info"><i class="fa fa-plus"></i></b></a> <a href="#" class="btn btn-inverse btn-circle"><i class="fa fa-bar-chart-o"></i>Stats</a> <a href="calendar.html" class="btn btn-warning btn-circle"><i class="fa fa-calendar-o"></i>Calendar</a> <a href="#" class="btn btn-danger btn-circle"><i class="fa fa-group"></i>Groups</a> <a href="#" class="btn btn-circle"><i class="fa fa-plus"></i>More</a> </section>
               </div>
               <div class="col-lg-6">
                  <div class="row">
                     <!-- easypiechart --> 
                     <div class="col-xs-6">
                        <section class="panel">
                           <header class="panel-heading bg-white">
                              <div class="text-center h5">Play/Pause pie</div>
                           </header>
                           <div class="panel-body pull-in text-center">
                              <div class="inline">
                                 <div class="easypiechart" data-percent="55" data-loop="true">
                                    <span class="h2" style="margin-left:10px;margin-top:10px;display:inline-block">55</span>% 
                                    <div class="easypie-text"><button class="btn btn-link m-t-n-small" data-toggle="class:pie"><i class="fa fa-play text-active text-muted"></i><i class="fa fa-pause text text-muted"></i></button></div>
                                 </div>
                              </div>
                           </div>
                        </section>
                     </div>
                     <div class="col-xs-6">
                        <section class="panel">
                           <header class="panel-heading bg-white">
                              <div class="text-center h5">Total: <strong>5,000</strong></div>
                           </header>
                           <div class="panel-body pull-in text-center">
                              <div class="inline">
                                 <div class="easypiechart" data-percent="75" data-bar-color="#576879">
                                    <span class="h2" style="margin-left:10px;margin-top:10px;display:inline-block">75</span>% 
                                    <div class="easypie-text text-muted">new visits</div>
                                 </div>
                              </div>
                           </div>
                        </section>
                     </div>
                     <!-- easypiechart end--> 
                  </div>
                  <section class="panel">
                     <div class="panel-body text-muted l-h-2x"> <span class="badge">3,3121</span> <span class="m-r-small">Orders</span> <span class="badge bg-success">25,129</span> <span class="m-r-small">Selling Items</span> <span class="badge">59,973</span> <span class="m-r-small">Items</span> <span class="badge">3,141</span> Customers </div>
                  </section>
               </div>
               <div class="col-lg-6">
                  <!-- sparkline stats --> 
                  <section class="panel">
                     <header class="panel-heading">
                        <ul class="nav nav-pills pull-right">
                           <li><a href="#" data-loading-text="loading..."><i class="fa fa-retweet"></i></a></li>
                           <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="text">Day</span> <span class="caret"></span> </a> 
                              <ul class="dropdown-menu pull-right">
                                 <li class="active"><a href="#">Day</a></li>
                                 <li><a href="#">Week</a></li>
                                 <li><a href="#">Month</a></li>
                              </ul>
                           </li>
                        </ul>
                        <span>Snapshot</span> 
                     </header>
                     <ul class="list-group">
                        <li class="list-group-item">
                           <div class="media">
                              <div class="pull-left text-center media-large">
                                 <div class="h4 m-t-mini"><strong>890</strong></div>
                                 <small class="text-muted">Total views</small> 
                              </div>
                              <div class="pull-right hidden-sm text-right m-t"> <b class="badge bg-info" data-toggle="tooltip" data-title="New">250</b> </div>
                              <div class="media-body">
                                 <div class="sparkline" data-type="bar" data-bar-color="#8e98a9" data-bar-width="10" data-height="28">
                                    <!--20,10,15,21,12,5,21,30,24,15,8,19-->
                                 </div>
                                 <ul class="list-inline text-muted axis">
                                    <li>12<br>a</li>
                                    <li>2</li>
                                    <li>4</li>
                                    <li>6</li>
                                    <li>8</li>
                                    <li>10</li>
                                    <li>12<br>p</li>
                                    <li>2</li>
                                    <li>4</li>
                                    <li>6</li>
                                    <li>8</li>
                                    <li>10</li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="list-group-item">
                           <div class="media">
                              <div class="pull-left text-center media-large">
                                 <div class="h4 m-t-mini"><strong>$4,800</strong></div>
                                 <small class="text-muted">Revenue</small> 
                              </div>
                              <div class="pull-right hidden-sm text-right m-t"> <b class="badge bg-success" data-toggle="tooltip" data-title="Captured">$4,000</b> </div>
                              <div class="media-body">
                                 <div class="sparkline" data-type="bar" data-bar-color="#13c4a5" data-bar-width="10" data-height="28">
                                    <!--200,400,500,100,90,1200,1500,1000,800,500,80,50-->
                                 </div>
                                 <ul class="list-inline text-muted axis">
                                    <li>12<br>a</li>
                                    <li>2</li>
                                    <li>4</li>
                                    <li>6</li>
                                    <li>8</li>
                                    <li>10</li>
                                    <li>12<br>p</li>
                                    <li>2</li>
                                    <li>4</li>
                                    <li>6</li>
                                    <li>8</li>
                                    <li>10</li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                        <li class="list-group-item">
                           <div class="media">
                              <div class="pull-left text-center media-large">
                                 <div class="h4 m-t-mini"><strong>595</strong></div>
                                 <small class="text-muted">Orders</small> 
                              </div>
                              <div class="pull-right hidden-sm text-right m-t"> <b class="badge" data-toggle="tooltip" data-title="Awaiting">120<i class="fa fa-plane"></i></b> </div>
                              <div class="media-body">
                                 <div class="sparkline" data-type="bar" data-bar-color="#61a1e1" data-bar-width="10" data-height="28">
                                    <!--15,21,30,24,15,8,19,20,10,15,21,12-->
                                 </div>
                                 <ul class="list-inline text-muted axis">
                                    <li>12<br>a</li>
                                    <li>2</li>
                                    <li>4</li>
                                    <li>6</li>
                                    <li>8</li>
                                    <li>10</li>
                                    <li>12<br>p</li>
                                    <li>2</li>
                                    <li>4</li>
                                    <li>6</li>
                                    <li>8</li>
                                    <li>10</li>
                                 </ul>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </section>
                  <!-- sparkline stats end --> 
               </div>
            </div>
            <div class="row">
               <div class="col-lg-6">
                  <!-- scrollable inbox widget --> 
                  <section class="panel">
                     <header class="panel-heading">
                        <ul class="nav nav-pills pull-right">
                           <li> <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down fa-lg text-active"></i><i class="fa fa-caret-up fa-lg text"></i></a> </li>
                        </ul>
                        <span class="label label-large bg-default">15</span> Inbox 
                     </header>
                     <section style="height:210px" class="panel-body scrollbar scroll-y m-b">
                        <article class="media">
                           <span class="pull-left thumb-small"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span> 
                           <div class="media-body">
                              <div class="pull-right media-mini text-center text-muted"> <strong class="h4">12:18</strong><br> <small class="label bg-light">pm</small> </div>
                              <a href="#" class="h4">Bootstrap 3.0 is comming</a> <small class="block"><a href="#" class="">John Smith</a> <span class="label label-success">Circle</span></small> <small class="block">Sleek, intuitive, and powerful mobile-first front-end framework for faster and easier web development.</small> 
                           </div>
                        </article>
                        <div class="line pull-in"></div>
                        <article class="media">
                           <span class="pull-left thumb-small"><i class="fa fa-user fa fa-2x text-muted"></i></span> 
                           <div class="media-body">
                              <div class="pull-right media-mini text-center text-muted"> <strong class="h4">17</strong><br> <small class="label bg-light">feb</small> </div>
                              <a href="#" class="h4">Bootstrap documents</a> <small class="block"><a href="#" class="">John Smith</a> <span class="label label-info">Friends</span></small> <small class="block">There are a few easy ways to quickly get started with Bootstrap, each one appealing to a different skill level and use case. Read through to see what suits your particular needs.</small> 
                           </div>
                        </article>
                        <div class="line pull-in"></div>
                        <article class="media">
                           <div class="media-body">
                              <div class="pull-right media-mini text-center text-muted"> <strong class="h4">09</strong><br> <small class="label bg-light">jan</small> </div>
                              <a href="#" class="h4 text-success">Mobile first html/css framework</a> <small class="block">Bootstrap, Ratchet</small> 
                           </div>
                        </article>
                     </section>
                  </section>
                  <!-- / scrollable inbox widget--> 
               </div>
               <div class="col-lg-6">
                  <!-- task --> 
                  <section class="panel">
                     <header class="panel-heading"> Tasks </header>
                     <ul class="list-group">
                        <li class="list-group-item" data-toggle="class:active" data-target="#todo-1">
                           <div class="media">
                              <span class="pull-left thumb-small m-t-mini"> <i class="fa fa-code fa-lg text-default"></i> </span> 
                              <div id="todo-1" class="pull-right text-primary m-t-small"> <i class="fa fa-circle fa-lg text text-default"></i> <i class="fa fa-check fa-lg text-active text-primary"></i> </div>
                              <div class="media-body">
                                 <div><a href="#" class="h5">Coding on app</a></div>
                                 <small class="text-muted">9:30 am every day</small> 
                              </div>
                           </div>
                        </li>
                        <li class="list-group-item bg" data-toggle="class:active" data-target="#todo-2">
                           <div class="media">
                              <span class="pull-left thumb-small m-t-mini"> <i class="fa fa-reply fa-lg text-default"></i> </span> 
                              <div id="todo-2" class="pull-right text-primary m-t-small"> <i class="fa fa-circle fa-lg text text-default"></i> <i class="fa fa-check fa-lg text-active text-primary"></i> </div>
                              <div class="media-body">
                                 <div><a href="#" class="h5">Reply email</a></div>
                                 <small class="text-muted">Check Gmail and reply</small> 
                              </div>
                           </div>
                        </li>
                        <li class="list-group-item" data-toggle="class:active" data-target="#todo-3">
                           <div class="media">
                              <span class="pull-left thumb-small m-t-mini"> <i class="fa fa-coffee fa-lg text-default"></i> </span> 
                              <div id="todo-3" class="pull-right text-primary m-t-small"> <i class="fa fa-circle fa-lg text text-default"></i> <i class="fa fa-check fa-lg text-active text-primary"></i> </div>
                              <div class="media-body">
                                 <div><a href="#" class="h5">Coffee time</a></div>
                                 <small class="text-muted">Freetime as you want</small> 
                              </div>
                           </div>
                        </li>
                        <li class="list-group-item bg" data-toggle="class:active" data-target="#todo-4">
                           <div class="media">
                              <span class="pull-left thumb-small m-t-mini"> <i class="fa fa-music fa-lg text-default"></i> </span> 
                              <div id="todo-4" class="pull-right text-primary m-t-small"> <i class="fa fa-circle fa-lg text text-default"></i> <i class="fa fa-check fa-lg text-active text-primary"></i> </div>
                              <div class="media-body">
                                 <div><a href="#" class="h5">Listen music</a></div>
                                 <small class="text-muted">Listening and finding</small> 
                              </div>
                           </div>
                        </li>
                     </ul>
                  </section>
                  <!-- / task--> 
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <!-- .comment-list --> 
                  <section class="comment-list block">
                     <article id="comment-id-1" class="comment-item media arrow arrow-left">
                        <a class="pull-left thumb-small avatar"><img src="images/avatar.jpg" class="img-circle"></a> 
                        <section class="media-body panel">
                           <header class="panel-heading clearfix"> <a href="#">John smith</a> <label class="label bg-info m-l-mini">Editor</label> <span class="text-muted m-l-small pull-right"><i class="fa fa-clock-o"></i> 24 minutes ago</span> </header>
                           <div class="panel-body">
                              <div>Lorem ipsum dolor sit amet, consecteter adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>
                              <div class="comment-action m-t-small"> <a href="#" data-toggle="class" class="btn btn-white btn-xs active"> <i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-danger text-active"></i> Like </a> <a href="#comment-form" class="btn btn-white btn-xs"><i class="fa fa-mail-reply text-muted"></i> Reply</a> </div>
                           </div>
                        </section>
                     </article>
                     <!-- .comment-reply --> 
                     <article id="comment-id-2" class="comment-item comment-reply media arrow arrow-left">
                        <a class="pull-left thumb-small"><span class="btn btn-circle btn-white btn-xs"><i class="fa fa-user"></i></span></a> 
                        <section class="media-body panel text-small">
                           <div class="panel-body"> <a href="#">Mika Sam</a> <label class="label bg-inverse m-l-mini">Admin</label> Report this comment is helpful <span class="text-muted m-l-small pull-right"><i class="fa fa-clock-o"></i> 10 minutes ago</span> </div>
                        </section>
                     </article>
                     <!-- / .comment-reply --> 
                     <article id="comment-id-3" class="comment-item media arrow arrow-left">
                        <a class="pull-left thumb-small avatar"><img src="images/avatar.jpg" class="img-circle"></a> 
                        <section class="media-body panel">
                           <header class="panel-heading clearfix"> <a href="#">By me</a> <label class="label bg-default m-l-mini">User</label> <span class="text-muted m-l-small pull-right"> <i class="fa fa-clock-o"></i> about 1 hour ago </span> </header>
                           <div class="panel-body">
                              <div>This comment was posted by you.</div>
                              <div class="comment-action m-t-small"> <a href="#comment-id-3" data-dismiss="alert" class="btn btn-white btn-xs"> <i class="fa fa-trash-o text-muted"></i> Remove </a> </div>
                           </div>
                        </section>
                     </article>
                     <article id="comment-id-4" class="comment-item media arrow arrow-left">
                        <a class="pull-left thumb-small avatar"><img src="images/avatar.jpg" class="img-circle"></a> 
                        <section class="media-body panel">
                           <header class="panel-heading clearfix"> <a href="#">Peter</a> <label class="label bg-primary m-l-mini">Vip</label> <span class="text-muted m-l-small pull-right"><i class="fa fa-clock-o"></i> 2 hours ago</span> </header>
                           <div class="panel-body">
                              <blockquote>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                 <small>Someone famous in <cite title="Source Title">Source Title</cite></small> 
                              </blockquote>
                              <div>Lorem ipsum dolor sit amet, consecteter adipiscing elit...</div>
                              <div class="comment-action m-t-small"> <a href="#" data-toggle="class" class="btn btn-white btn-xs"> <i class="fa fa-star-o text-muted text"></i> <i class="fa fa-star text-danger text-active"></i> Like </a> <a href="#comment-form" class="btn btn-white btn-xs"> <i class="fa fa-mail-reply text-muted"></i> Reply </a> </div>
                           </div>
                        </section>
                     </article>
                     <!-- comment form --> 
                     <article class="comment-item media" id="comment-form">
                        <a class="pull-left thumb-small avatar"><img src="images/avatar.jpg" class="img-circle"></a> 
                        <section class="media-body">
                           <form action="#" class="m-b-none">
                              <div class="input-group"> <input type="text" placeholder="Input your comment here" class="form-control"> <span class="input-group-btn"> <button class="btn btn-primary" type="button">POST</button> </span> </div>
                           </form>
                        </section>
                     </article>
                  </section>
                  <!-- / .comment-list --> 
               </div>
            </div>
         </section>
      </section>
      <!-- .modal --> 
      <div id="modal" class="modal fade">
         <form class="m-b-none">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button> 
                     <h4 class="modal-title" id="myModalLabel">Post your first idea</h4>
                  </div>
                  <div class="modal-body">
                     <div class="block"> <label class="control-label">Title</label> <input type="text" class="form-control" placeholder="Post title"> </div>
                     <div class="block"> <label class="control-label">Content</label> <textarea class="form-control" placeholder="Content" rows="5"></textarea> </div>
                     <div class="checkbox"> <label> <input type="checkbox"> Share with all memebers of first </label> </div>
                  </div>
                  <div class="modal-footer"> <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Save</button> <button type="button" class="btn btn-sm btn-primary" data-loading-text="Publishing...">Publish</button> </div>
               </div>
               <!-- /.modal-content --> 
            </div>
         </form>
      </div>
      <!-- / .modal --> <!-- footer --> 
      @include('admin.template.footer')
      @include('admin.template.js')
   </body>
   <!-- Mirrored from flatfull.com/themes/first/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Sep 2018 07:34:18 GMT -->
</html>