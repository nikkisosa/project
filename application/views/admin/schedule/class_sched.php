  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Schedule
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>view/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Schedule</a></li>
        <li class="active">Class</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Class Schedule</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="class-schedule" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Year</th>
                  <th>Subject(time)</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($class_sched)){

                }else{
                    foreach($class_sched as $item){
                        echo '<tr>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="class-id" id="class-id" value="'.$item["class_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="class-year" id="class-year" value="'.$item["year_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="class-time" id="class-time" value="'.$item["time_id"].'">
                                  '.$item["year"].'</td>';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="class-subject" id="class-subject" value="'.$item["class"].'">
                                  '.$item["class"].'('.$item["time"].')</td>';
                        echo '    <td>
                                    <a href="#" class="btn btn-primary class-edit" name="class-edit" id="class-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger class-remove" name="class-remove" id="class-remove"><i class="fa fa-times" aria-hidden="true"></i></a>
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
                    <h3 class="box-title">Save Class Schedule</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open('view/class_sched'); ?>
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
                    <label>Year:<?php echo form_error('year-sub', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <select name="year-sub" id="year-sub" class="form-control" style="color: gray; ">
                        <option value="" disabled selected>Choose year level</option>
                        <?php
                            if(empty($year)){

                            }else{
                                foreach ($year as $value) {
                                    echo '<option value="'.$value['year_id'].'">'.$value['year'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Subject:<?php echo form_error('subject-sub', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <select name="subject-sub" id="subject-sub" class="form-control" style="color: gray; ">
                        <option value="" disabled selected>Choose subject</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Time:<?php echo form_error('time-sub', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    
                    <select name="time-sub" id="time-sub" class="form-control" style="color: gray; ">
                        <option value="" disabled selected>Choose time</option>
                        <?php
                            if(empty($time)){

                            }else{
                                foreach ($time as $value) {
                                    echo '<option value="'.$value['time_id'].'">'.$value['time'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="class-clear" id="sub-clear">clear</button>
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

