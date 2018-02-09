 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title?>
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>forum"><i class="fa fa-home"></i> Home </a></li>
        <li><a href="#">Category</a></li>
        <li class="active"><?php echo $title?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
          
                <?php
                    if(!empty($item)){
                        foreach ($item as $value) {
                            if($value['is_close'] == "false"){
                                echo '<div class="col-lg-12" >';
                                echo '<div class="info-box">';
                                echo '<label class="col-lg-12 col-md-12 col-sm-10 col-xs-8">'.$value['name'].'</label>';
                                echo '<label class="col-lg-12 col-md-12 col-sm-10 col-xs-8"><a href="'.base_url().'forum/content?category_id='.$value['category_id'].'&thread_id='.$value['thread_id'].'&category='.$value['category'].'&title='.$value['title'].'&name='.$value['name'].'&content='.$value['content'].'">'.$value['title'].'</a></label>';
                                echo '</div>';
                                echo '</div>';
                            }else{
                                echo '<div class="col-lg-12">';
                                echo '<div class="info-box">';
                                echo '<label class="col-lg-12 col-md-12 col-sm-10 col-xs-8">'.$value['name'].'<span class="pull-right"><i class="fa fa-lock" aria-hidden="true"> Thread Closed</i></span></label>';
                                echo '<label class="col-lg-12 col-md-12 col-sm-10 col-xs-8"><a href="'.base_url().'forum/content?category_id='.$value['category_id'].'&thread_id='.$value['thread_id'].'&category='.$value['category'].'&title='.$value['title'].'&name='.$value['name'].'&content='.$value['content'].'">'.$value['title'].'</a></label>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    }else{
                        echo '<div class="col-lg-12">';
                        echo '<div class="info-box">';
                        echo '<label class="col-lg-12 col-md-12 col-sm-10 col-xs-8">No record for this category.</label>';
                        echo '</div>';
                        echo '</div>';
                    }
                
                ?>
          
        
        <!-- end of -->
      </div>
</div>
