<?php require_once('helper.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, width=600">
	
	<title>Boots v5</title>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="css/boots.css?v=<?php echo urlencode(microtime())?>" rel="stylesheet">
	
	<style type="text/css">
		.col .content{
			position: relative;
			padding: 20px;
			text-align: center;
		}
		
		.col > .content:before{
			content: '';
			
			position: absolute;
			left: 0;
			top: 0;
			height: 100%;
			width: 100%;
			
			background: currentcolor;
			opacity: 0.05;
			border-radius: 2px;
		}
	</style>
</head>
<body>

<?php _inc('header')?>
<?php _inc('main')?>
<?php _inc('columns')?>
<?php _inc('footer')?>

<script type="text/javascript" src="js/boots.js?v=<?php echo urlencode(microtime())?>"></script>
</body>
</html>