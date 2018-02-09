  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>view/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Settings</a></li>
        <li class="active">Subject</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Subject</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="subject-table" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Subject</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($subject)){

                }else{
                    foreach($subject as $item){
                        echo '<tr>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="subject-id" id="subject-id" value="'.$item["subject_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="subject-title" id="subject-title" value="'.$item["subject"].'">
                                  '.$item["subject"].'</td>';
                        echo '    <td>
                                    <a href="#" class="btn btn-primary subject-edit" name="subject-edit" id="subject-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger subject-remove" name="subject-remove" id="subject-remove"><i class="fa fa-times" aria-hidden="true"></i></a>
                                  </td>';
                        echo '</tr>';  
                    }
                }

                ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Save Subject</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open('view/subject'); ?>
                    <?php
                        if(empty($this->session->flashdata('msg')))
                        {

                        }
                        else
                        {
                            echo $this->session->flashdata('msg');
                        }
                    ?>
                    <div class="form-group" style="display:none;">
                    <label>id</label>
                    <input type="text" class="form-control" name="priority" id="priority" value="<?php echo set_value('priority');?>">
                    </div>


                    <div class="form-group">
                    <label>Subject:<?php echo form_error('subject', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="ex. History" value="<?php echo set_value('subject');?>" size="50">
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="subject-clear" id="subject-clear">clear</button>
                    </div>

                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

