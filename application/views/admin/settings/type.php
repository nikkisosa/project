 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SMS Configuration
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>view/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="#">Sms Notification</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">SMS type</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="sms-type" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Type</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($type)){

                }else{
                    foreach($type as $item){
                        echo '<tr>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="type-id" id="type-id" value="'.$item["type_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="type-title" id="type-title" value="'.$item["type"].'">
                                  '.$item["type"].'</td>';
                        echo '    <td>
                                    <a href="#" class="btn btn-primary type-edit" name="type-edit" id="type-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger type-remove" name="type-remove" id="type-remove"><i class="fa fa-times" aria-hidden="true"></i></a>
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
                    <h3 class="box-title">Save type</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open('view/sms_type'); ?>
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
                    <label>Type:<?php echo form_error('title', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <input type="text" class="form-control" name="title" id="title" placeholder="ex. Emergency template" value="<?php echo set_value('title');?>" size="50">
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="type-clear" id="type-clear">clear</button>
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
