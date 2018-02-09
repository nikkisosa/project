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
		<?php array_pop($show);?>
		<div class="col-lg-6" id="emojis" style="height: 40vh; overflow-y: scroll;">
			<?php
				
				for($i=0;$i < count($show);$i++){
					echo '<a href="#" id="emoji" class="emoji" data-value = "'.$alt[$i].'" >'.$show[$i].'</a>';
				}
				
			?>

		</div>
	</div>
</div>
</body>
</html>

<script>
	$(document).ready(function(){
		
		$(document).on("click","#emoji",function(e){
			e.preventDefault();
			var emojiValue = $(this).attr('data-value');
			// console.log("clicked " + emojiValue);
			var textAreaValue = $("#text-area").val();
			$('#text-area').val(textAreaValue+emojiValue);
		})

	});
</script>