<?php
use yii\grid\GridView;

/* @var $this yii\web\View */
$this->title = 'PCinventory';
?>

  <div class="site-index">

    <div class="body-content">


        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Панель уведомлений
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i> New Comment
                        <span class="pull-right text-muted small"><em>4 minutes ago</em>
                        </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                        <span class="pull-right text-muted small"><em>12 minutes ago</em>
                        </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                        <span class="pull-right text-muted small"><em>27 minutes ago</em>
                        </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-tasks fa-fw"></i> New Task
                        <span class="pull-right text-muted small"><em>43 minutes ago</em>
                        </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                        <span class="pull-right text-muted small"><em>11:32 AM</em>
                        </span>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                        <span class="pull-right text-muted small"><em>11:13 AM</em>
                        </span>

                    </div>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">Показать все уведомления</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Остаток на складе
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">

                    </div>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">Показать все уведомления</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Приходы
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">

                    </div>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">Показать все уведомления</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Расходы
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">

                    </div>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">Показать все уведомления</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Заправка картриджей
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">

                    </div>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">Показать все</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
      <div id="wrapper">


          <div class="navbar-default sidebar" role="navigation">
              <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                      <li class="sidebar-search">
                          <div class="input-group custom-search-form">
                              <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                          </div>
                          <!-- /input-group -->
                      </li>
                      <li>
                          <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="flot.html">Flot Charts</a>
                              </li>
                              <li>
                                  <a href="morris.html">Morris.js Charts</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>
                      <li>
                          <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                      </li>
                      <li>
                          <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="panels-wells.html">Panels and Wells</a>
                              </li>
                              <li>
                                  <a href="buttons.html">Buttons</a>
                              </li>
                              <li>
                                  <a href="notifications.html">Notifications</a>
                              </li>
                              <li>
                                  <a href="typography.html">Typography</a>
                              </li>
                              <li>
                                  <a href="icons.html"> Icons</a>
                              </li>
                              <li>
                                  <a href="grid.html">Grid</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="#">Second Level Item</a>
                              </li>
                              <li>
                                  <a href="#">Second Level Item</a>
                              </li>
                              <li>
                                  <a href="#">Third Level <span class="fa arrow"></span></a>
                                  <ul class="nav nav-third-level">
                                      <li>
                                          <a href="#">Third Level Item</a>
                                      </li>
                                      <li>
                                          <a href="#">Third Level Item</a>
                                      </li>
                                      <li>
                                          <a href="#">Third Level Item</a>
                                      </li>
                                      <li>
                                          <a href="#">Third Level Item</a>
                                      </li>
                                  </ul>
                                  <!-- /.nav-third-level -->
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>

                  </ul>
              </div>
              <!-- /.sidebar-collapse -->
          </div>
          <!-- /.navbar-static-side -->
          </nav>

          <div id="page-wrapper">

              <div class="row">
                  <div class="col-lg-8">

                      <div class="panel-body">
                          <div id="morris-area-chart"></div>
                      </div>

                  </div>



                  <div class="panel-body">
                      <div class="row">

                          <div class="col-lg-8">
                              <div id="morris-bar-chart"></div>
                          </div>
                          <!-- /.col-lg-8 (nested) -->
                      </div>
                      <!-- /.row -->
                  </div>
                  <!-- /.panel-body -->
              </div>

          </div>
          <!-- /.panel-heading -->

          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
      <div class="panel panel-default">
          <div class="panel-heading">
              <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
          </div>
          <div class="panel-body">
              <div id="morris-donut-chart"></div>
              <a href="#" class="btn btn-default btn-block">View Details</a>
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
      <div class="chat-panel panel panel-default">
          <div class="panel-heading">
              <i class="fa fa-comments fa-fw"></i>
              Chat
              <div class="btn-group pull-right">
                  <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-chevron-down"></i>
                  </button>

              </div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">

          </div>
          <!-- /.panel-body -->

      </div>
      <!-- /.panel .chat-panel -->
  </div>
<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>


  </div>
