

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>common/component/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>common/component/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>common/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>common/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>common/component/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>common/component/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>common/plugins/jQueryUI/ellipsis.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>common/plugins/toastr/toastr.min.js"></script>
</body>
</html>

<script>
  $(function () {

    $('#category-list').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true,
      "scrollY"     : true,
      "dom"         : '<"pull-right"f><"pull-right"l>tip'
    })


    $('#timeline').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "scrollX"     : true,
      "scrollY"     : true,
      "dom"         : '<"pull-right"f><"pull-right"l>tip'
    })
  })

  $(document).ready(function(){
      
        $('#category-clear').click(function(e){
            e.preventDefault();
            $('#priority').val('');
            $('#categoryname').val('');
        })
        

        $('#category-list').on('click','.category-edit',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="category-id"]').val();
            var category = $(this).closest("tr").find('input[id="category"]').val();
            $('#priority').val(id);
            $('#categoryname').val(category);
        })
        $('#category-list').on('click','.category-remove',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="category-id"]').val();
            var row = $(this).closest("tr");
            console.log(id);
            $.post('category_delete',{id:id},function(data){
                row.remove();
                var table = $('#category-list').DataTable();
                //table.ajax.reload();
            });
        })
        

        $('#timeline').on('click','.timeline-edit',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="timeline-id"]').val();
            var title = $(this).closest("tr").find('input[id="timeline-title"]').val();
            var content = $(this).closest("tr").find('input[id="timeline-content"]').val();
            var category = $(this).closest("tr").find('input[id="timeline-category"]').val();
            
            $('#priority').val(id);
            $('#post-title').val(title);
            $('#post-content').val(content);
            $('#categoryname').val(category);
        })

        $('#timeline-clear').click(function(e){
            e.preventDefault();
            $('#priority').val('');
            $('#post-title').val('');
            $('#post-content').val('');
        })


        $('#timeline').on('click','.timeline-remove',function(e){
            e.preventDefault();
            var id = $(this).closest("tr").find('input[id="timeline-id"]').val();
            var row = $(this).closest("tr");
            console.log(id);
            $.post('thread_close',{id:id},function(data){
                //row.remove();
                var table = $('#timeline').DataTable();
                //table.ajax.reload();
            });
        });
    })
</script>
