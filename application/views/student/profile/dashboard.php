


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<section class="content-header">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="<?php echo base_url();?>banner/sti_1.jpg" alt="sti" style="width:100%;height:40vh;">
          </div>

          <div class="item">
            <img src="<?php echo base_url();?>banner/sti_2.png" alt="sti" style="width:100%;height:40vh;">
          </div>
        
          <div class="item">
            <img src="<?php echo base_url();?>banner/sti_3.jpg" alt="sti" style="width:100%;height:40vh;">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  <div class="row">
        <div class="col-lg-12" style="margin-top: 5%;">
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
    </section>
</div>
</div>
<!-- ./wrapper -->


