 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title?>
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>forum"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Category</a></li>
        <li><a href="#">Category List</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-lg-7">
                <div class="info-box" style="height:auto;padding:2%;">
                    <table id="category-list" class="table table-bordered table-striped display" cellspacing="0"> 
                    <thead>
                        <tr>
                            <td>
                                Category
                            </td>
                            <td>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            if(!empty($category)){
                                foreach ($category as $value) {
                                    echo '<tr>';
                                    echo '<td>
                                    <input type="hidden" id="category-id" value="'.$value['category_id'].'">
                                    <input type="hidden" id="category" value="'.$value['category'].'">'.$value['category'].'</td>';
                                    echo '<td>
                                                <input type="button" class="btn btn-primary category-edit" name="category-edit" id="category-edit" value="edit">
                                                <input type="button" class="btn btn-danger category-remove" name="category-remove" id="category-remove" value="remove">
                                         </td>';
                                }
                            }else{
                                
                            }

                        ?>
                    </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="info-box" style="height:20vh;">
                    <div class="box-body">
                        <?php echo form_open('forum/category_list'); ?>
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
                        <input type="hidden" class="form-control" name="priority" id="priority" value="<?php echo set_value('priority');?>">
                        </div>

                        <div class="form-group">
                        <label>Category Name:</label>
                        <?php echo form_error('categoryname', '<div class="error" style="color:red;font-size:10px;">', '</div>'); ?>
                        <input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="Computer programming" value="<?php echo set_value('categoryname');?>" size="50">
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-default pull-right" name="category-save">Save</button>
                            <button type="submit" class="btn btn-default pull-right" name="category-clear" id="category-clear">clear</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
      </div>
      <div class="row" >

      </div>
</div>
