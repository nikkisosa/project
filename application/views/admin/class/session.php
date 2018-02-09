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
        <li class="active"><a href="#">Session</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sessions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="session" class="table table-bordered table-striped">
                <thead >
                <tr>
                  <th>Session</th>
                  <th></th>
                </tr>
                </thead>
                <tbody >
                <?php

                if(empty($session)){

                }else{
                    foreach($session as $item){
                        
                        if($item['active'] == 'active'){
                          echo '<tr style="background-color:#32CD32;">';
                          echo '    <td >
                                    <input type="hidden" class="btn btn-primary" name="session-id" id="session-id" value="'.$item["session_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="session-title" id="session-title" value="'.$item["session"].'">
                                  '.$item["session"].'</td>';
                          echo '    <td>
                                    <a href="#" class="btn btn-primary "  disabled><i class="fa fa-pencil" aria-hidden="true" ></i></a>
                                  </td>';
                        }else{
                          echo '<tr>';
                          echo '    <td>
                                    <input type="hidden" class="btn btn-primary" name="session-id" id="session-id" value="'.$item["session_id"].'">
                                    <input type="hidden" class="btn btn-primary" name="session-title" id="session-title" value="'.$item["session"].'">
                                  '.$item["session"].'</td>';
                          echo '    <td>
                                    <a href="#" class="btn btn-primary session-edit" name="session-edit" id="session-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                  </td>';
                        }
                        
                        
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



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
