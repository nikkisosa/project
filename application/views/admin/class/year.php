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
        <li class="active"><a href="#">Year</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Year level</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="yearlevel" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Year Level</th>
                  <th>Session</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($year)){

                }else{
                 
                    foreach($year as $item){
                        echo '<tr>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="year-id" id="year-id" value="'.$item["year_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="year-title" id="year-title" value="'.$item["year"].'">
                                  '.$item["year"].'</td>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="year-session" id="year-session" value="'.$item["session_id"].'">
                                  '.$item["session"].'</td>';
                        echo '    <td>
                                    <a href="#" class="btn btn-primary year-edit" name="year-edit" id="year-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger year-remove" name="year-remove" id="year-remove"><i class="fa fa-times" aria-hidden="true"></i></a>
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
                    <h3 class="box-title">Save Year Level</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open('view/year'); ?>
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
                    <label>Year Level:<?php echo form_error('title', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <input type="text" class="form-control" name="title" id="title" placeholder="ex. Grade 1" value="<?php echo set_value('title');?>" size="50">
                    </div>

                   <div class="form-group">
                    <label>Session:<?php echo form_error('sessions', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <select name="sessions" id="sessions" class="form-control" style="color: gray; ">
                        <option value="" disabled selected>Choose session</option>
                        <?php
                            if(empty($session)){

                            }else{
                                foreach ($session as $value) {
                                    echo '<option value="'.$value['session_id'].'">'.$value['session'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="year-clear" id="year-clear">clear</button>
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
