<?php
include 'core.php';
 $asana = new Asana();
?>

<!DOCTYPE html>
<html>
<head>
<title>Randomiser</title>
<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
<link href="css/global.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="app">
	<div class="app-inner">
		<input class="task-ID" type="text" name="name" placeholder="Task ID">

		<ul class="us-list">
		<?php
			foreach($asana->getTeam() as $name=>$value) {
				echo '<li data-usid="'.$value.'">' . $name.' <i class="icon ion-close-circled"></i></li>';
			}
		?>
		</ul>

		<a class="cta-app run-app">Run</a>
		<div class="app-result">

		</div>
		<a class="cta-app run-assign">Assign</a>
	</div>
	<div class="app-footer">
		Assigned
	</div>
	</div>
<script>
$('.run-app').click(function() {
	$(".us-list li").removeClass('selected');
	random_user = $(".us-list li:eq(" + Math.floor(Math.random()* $('.us-list li').length) + ")");
	random_user.addClass('selected');
});
$('.us-list').on('click', 'li i',function() {
	$(this).parent().remove();
});
$('.run-assign').click(function() {
	console.log($(".us-list li.selected").data('usid'));
		$.post( "func.php", {
			func: 'update_task',
			uid: $(".us-list li.selected").data('usid'),
			tid: $('.task-ID').val()
		},function(data) {
			console.log(data);
			if (data == '200') {
				$('.app-footer').text('Assigned to ' + $(".us-list li.selected").text());
				$('.app-footer').fadeIn('fast').delay(4000).fadeOut('fast');
				$(".us-list li.selected").remove();
			}
		});
});
</script>
</body>
</html>
