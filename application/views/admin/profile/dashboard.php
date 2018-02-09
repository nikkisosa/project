 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-person-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Student</span>
              <span class="info-box-number"><?php echo $student;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Faculty</span>
              <span class="info-box-number"><?php echo $teacher;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-calendar-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Events</span>
              <span class="info-box-text">Posted <b>2000</b></span>
              <span class="info-box-text">Pending <b>2000</b></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-bullhorn"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Announcements</span>
              <span class="info-box-text">Posted <b><?php echo $post;?></b></span>
              <span class="info-box-text">Pending <b><?php echo $pending;?></b></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">Announcement</div>
            <?php

            if(empty($announcement)){

            }else{
              foreach ($announcement as $value) {
                ?>
                  <div class="panel panel-default" style="padding:2%;">
                    <div class="panel-heading"><strong><?php echo $value['title'];?></strong><p class="pull-right"><?php echo $value['date_created'];?></p></div>
                    <div class="panel-body"><b>Content</b>:<br> <p><?php echo $value['content'];?></p></div>
                    <div class="panel-footer">Posted by:<a href="#"><?php echo $value['name'];?></a></div>
                </div>
                <?php
              }
            }

            ?>
              
          </div>
        </div>
        <!-- end of -->
      </div>
</div>
