<!DOCTYPE html>
<html>
<head>
	<title>Emoticon</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>common/component/bootstrap/dist/css/bootstrap.css">
	<script src="<?php echo base_url();?>common/component/jquery/dist/jquery.js"></script>
</head>
<body>
<div class="container">

	<div class="row">
		<div class="col-lg-6">
			<label><?php echo $icons;?></label>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<textarea class="form-control" id="text-area" style="height: 20vh;"></textarea>
				<button class="btn btn-info pull-right">Send</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6" id="emojis" style="height: 40vh; overflow-y: scroll;">
			<?php
				foreach ($show as $value) {
					$array = array();
					foreach ($alt as $alts) {
						$array[] = $alts;
					}

					echo '<a href="#" id="emoji" class="emoji"><input type="hidden"  value="'.$array[0].'" id="alt">'.$value.'</a>';
					
				}
			?>
		</div>
	</div>
</div>
</body>
</html>

<script>
	$(document).ready(function(){

		$('#emoji').on('click',function(e){
			e.preventDefault();

			var alt =  $(this).closest('input[class^=emoji]').find('#alt').html();
			$('#text-area').val(alt);
		})

	});
</script>