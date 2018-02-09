 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title?>
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>forum/"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Category</a></li>
        <li><a href="<?php echo base_url();?>forum/category?id=<?php echo $category_id.'&category='.$categorys;?>"><?php echo $categorys;?></a></li>
        <li><a href="#"><?php echo $title;?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-lg-12">
                <div class="info-box">
                    <label class="col-lg-12 col-md-12 col-sm-10 col-xs-8"><a href="#"><?php echo $name;?></a><i class="pull-right"><?php echo $date_posted;?></i></label>
                    <label class="col-lg-12 col-md-12 col-sm-10 col-xs-8"><?php echo $post_content;?></label>
                </div>
            </div>
      </div>
      <div class="row" style="height:50vh;overflow-y: scroll;">

          
                <?php
                    if(!empty($comment)){
                        foreach ($comment as $value) {
                            echo '<div class="col-lg-12">';
                            echo '<div class="info-box col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:1%;margin-left:1%;width:78vw; padding:2%;">';
                            echo '<label class="col-lg-12 col-md-12 col-sm-12 col-xs-8"><a href="#">'.$value['name'].'('.$value['type'].')</a><i class="pull-right">'.$value['date_commented'].'</i></label>';
                            echo '<label class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'.$value['comment'].'</label>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }else{
                        echo '<div class="col-lg-12" >';
                        echo '<div class="info-box">';
                        echo '<label class="col-lg-12 col-md-12 col-sm-10 col-xs-8">No one commented on this thread.</label>';
                        echo '</div>';
                        echo '</div>';
                    }
                
                ?>
        <!-- end of -->
      </div>
      <div class="row" style="margin-top:2%;">
            <div class="col-lg-12">
                <div class="info-box" style="padding:1%;height:25vh;">
                    
                    <?php echo form_open('forum/content?category_id='.$category_id.'&thread_id='.$thread_id); ?>
                        <?php
                            if(empty($this->session->flashdata('msg')))
                            {
                                
                            }
                            else
                            {
                                echo $this->session->flashdata('msg');
                            }
                        ?>
                        <label>Comment Box: <?php echo form_error('comment', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                        <textarea class="form-control col-lg-12 col-md-12 col-sm-10 col-xs-8" name="comment" style="resize: none;"><?php echo set_value('comment'); ?></textarea>
                        <div class="pull-right" style="margin-top:1%">
                         <input type="submit" role="role" name="submit" class="btn btn-primary col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2%;">
                        </div>
                    </form>
                </div>
            </div>
      </div>
</div>
