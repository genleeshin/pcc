<html>
<head>
	<meta charset="UTF-8">
	<title>Test</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<?php foreach(PCC\Core\App::css() as $css): ?>
		<link rel="stylesheet" href="../assets/css/<?=$css?>">
	<?php endforeach; ?>

	<style>
		body{
			margin: 50px auto;
		}


	</style>
</head>
<body>










	<div class="container">
		<?=$output?>
	</div>
















<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>