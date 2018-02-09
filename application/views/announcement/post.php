 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Announcement
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>view/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="#">Post Announcement</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><p id="modalHeader"></p></h4>
                </div>
                <div class="modal-body">
                  <p id="modalContent"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="myModalApproval" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Aprroval</h4>
                </div>
                <div class="modal-body">
                  Are you sure you want to approve/disapprove this request?
                  <input type="hidden" name="" id="announcement-approve-id">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-default pull-right" id="announcement-no">Disapproved</button>
                  <button type="button" class="btn btn-default pull-right" id="announcement-yes">Approved</button>
                </div>
              </div>
              
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="myModalArchive" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Archive</h4>
                </div>
                <div class="modal-body">
                  Are you sure you want to archive this.?
                  <input type="hidden" name="" id="announcement-delete-id">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                  <button type="button" class="btn btn-default" id="announcement-archive">Yes</button>
                </div>
              </div>
              
            </div>
          </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of announcement</h3>
              <h5>Legend: <span class="label label-success">priority</span></h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="announcement" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Posted</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($announcement)){

                }else{
                    foreach($announcement as $item){
                        if($item['priority'] == 'yes'){
                          echo '<tr style="background-color:#32CD32;color:white;">';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="announcement-id" id="announcement-id" value="'.$item["announcement_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="announcement-title" id="announcement-title" value="'.$item["title"].'">
                                    <input type="hidden" class="btn btn-primary" name="announcement-date" id="announcement-date" value="'.$item["date"].'">
                                    <input type="hidden" class="btn btn-primary" name="announcement-priority" id="announcement-priority" value="'.$item["priority"].'">
                                    <input type="hidden" class="btn btn-primary" name="announcement-content" id="announcement-content" value="'.$item["content"].'">
                                  '.$item["title"].'</td>';
                        echo '    <td>
                                        <input type="hidden" class="btn btn-primary" name="announcement-date" id="announcement-date" value="'.$item["date_created"].'">
                                        '.$item["date_created"].'
                                    </td>';
                        if($item['is_pending'] == 'true'){
                                    echo '    <td>
                                        <input type="hidden" class="btn btn-primary" name="announcement-pending" id="announcement-pending" value="'.$item["is_pending"].'">
                                        Pending
                                    </td>';
                        }else if($item['is_pending'] == 'false'){
                            echo '    <td>
                                        <input type="hidden" class="btn btn-primary" name="announcement-pending" id="announcement-pending" value="'.$item["is_pending"].'">
                                        Posted
                                    </td>';
                        }

                        if($this->session->userdata('role') == 'admin'){
                                echo '    <td>';
                                    if($this->session->userdata('userid') == $item['account_id']){
                                        echo '<a href="#" class="btn btn-primary announcement-edit" name="announcement-edit" id="announcement-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-danger announcement-remove" name="announcement-remove" id="announcement-remove"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                    }else{
                                        echo '<a href="#" disabled class="btn btn-primary " name="announcement-edit" id="announcement-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="#" disabled class="btn btn-danger " name="announcement-remove" id="announcement-remove"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                    }
                                    echo '<a href="#" class="btn btn-warning announcement-view" name="announcement-view" id="announcement-view"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                                    if($item['disapproved'] != 'notyet'){
                                        echo '<a href="#" class="btn btn-info " disabled><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>';
                                    }else{
                                        echo '<a href="#" class="btn btn-info announcement-like" name="announcement-like" id="announcement-like"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>';
                                    }

                                  echo '</td>';
                        
                        }else if($this->session->userdata('role') == 'teacher'){
                            echo '    <td>
                                        <a href="#" class="btn btn-primary announcement-edit" name="announcement-edit" id="announcement-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-danger announcement-remove" name="announcement-remove" id="announcement-remove"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-warning announcement-view" name="announcement-view" id="announcement-view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                  </td>';
                        }

                        echo '</tr>';
                        }else{
                          echo '<tr>';
                        echo '';
                        echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="announcement-id" id="announcement-id" value="'.$item["announcement_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="announcement-title" id="announcement-title" value="'.$item["title"].'"><input type="hidden" class="btn btn-primary" name="announcement-date" id="announcement-date" value="'.$item["date"].'">
                                    <input type="hidden" class="btn btn-primary" name="announcement-priority" id="announcement-priority" value="'.$item["priority"].'">
                                    <input type="hidden" class="btn btn-primary" name="announcement-content" id="announcement-content" value="'.$item["content"].'">
                                  '.$item["title"].'</td>';
                        echo '    <td>
                                        <input type="hidden" class="btn btn-primary" name="announcement-date" id="announcement-date" value="'.$item["date_created"].'">
                                        '.$item["date_created"].'
                                    </td>';
                        if($item['is_pending'] == 'true'){
                                    echo '    <td>
                                        <input type="hidden" class="btn btn-primary" name="announcement-pending" id="announcement-pending" value="'.$item["is_pending"].'">
                                        Pending
                                    </td>';
                        }else if($item['is_pending'] == 'false'){
                            echo '    <td>
                                        <input type="hidden" class="btn btn-primary" name="announcement-pending" id="announcement-pending" value="'.$item["is_pending"].'">
                                        Posted
                                    </td>';
                        }

                        if($this->session->userdata('role') == 'admin'){
                                echo '    <td>';
                                    if($this->session->userdata('userid') == $item['account_id']){
                                        echo '<a href="#" class="btn btn-primary announcement-edit" name="announcement-edit" id="announcement-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-danger announcement-remove" name="announcement-remove" id="announcement-remove"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                    }else{
                                        echo '<a href="#" disabled class="btn btn-primary " name="announcement-edit" id="announcement-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="#" disabled class="btn btn-danger " name="announcement-remove" id="announcement-remove"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                    }
                                    echo '<a href="#" class="btn btn-warning announcement-view" name="announcement-view" id="announcement-view"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                                    if($item['disapproved'] != 'notyet'){
                                        echo '<a href="#" class="btn btn-info " disabled><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>';
                                    }else{
                                        echo '<a href="#" class="btn btn-info announcement-like" name="announcement-like" id="announcement-like"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>';
                                    }

                                  echo '</td>';
                        
                        }else if($this->session->userdata('role') == 'teacher'){
                            echo '    <td>
                                        <a href="#" class="btn btn-primary announcement-edit" name="announcement-edit" id="announcement-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-danger announcement-remove" name="announcement-remove" id="announcement-remove"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-warning announcement-view" name="announcement-view" id="announcement-view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                  </td>';
                        }

                        echo '</tr>';
                        }
                        
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
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open_multipart('view/announcement'); ?>
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
                    <label>Title:<?php echo form_error('title', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo set_value('title');?>">
                    </div>

                    <!-- <div class="form-group">
                        <label>Image: <?php echo form_error('filepath', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?>
                           <input type="file" class="form-control" name="filepath" id="filepath" value="<?php echo set_value('filepath');?>">
                    </div> -->
                    <div class="form-group">
                    <label><span>Content:<h5 style="color:gray;">(min. of 20 and maximum of 500 character)</h5></span><?php echo form_error('content', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                    <textarea class="form-control" style="resize:none;height:20vh" name="content" id="content" placeholder="ex. hello...."  size="50"><?php echo set_value('content');?></textarea>
                    </div>

                    <div class="form-group">
                    <label>Expired date:<?php echo form_error('date', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                        <input type="date" name="date" id="date" class="form-control" value="<?php echo set_value('date');?>">
                    </div>

                    <div class="form-group">
                    <label>Priority:<?php echo form_error('top_priority', '<div class="error" style="font-size:10px;color:red;">', '</div>'); ?></label>
                        <input type="radio" name="top_priority" id="top_priority" class="" value="yes">Yes
                        <input type="radio" name="top_priority" checked="true" id="top_priority" class="" value="no">No
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-right" name="save">Save</button>
                        <button type="submit" class="btn btn-default pull-right" name="announcement-clear" id="user-clear">clear</button>
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
