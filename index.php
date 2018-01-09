<?php require_once('helper.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<title>IQ - Boots v5</title>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="css/boots.css?v=<?php echo urlencode(microtime())?>" rel="stylesheet">
	
	<style type="text/css">
		.bubble,.calc_height{
			position: relative;
			padding: 20px 0 !important;
			margin: 0 !important;			
			text-align: center;
			
			border: 1px solid;
			border-radius: 2px;
			
			z-index: 1;
		}
		
		.bubble:before,.calc_height:before{
			content: '';
			
			position: absolute;
			left: 0;
			top: 0;
			height: 100%;
			width: 100%;
			
			background: currentcolor;
			opacity: 0.05;
			border-radius: 2px;
			
			z-index: -1;
		}
		
		.bubble > *{
			padding: 0 !important;
			margin: 0 auto !important;
		}
		
		.calc_height{
			display: table;
			width: 25%;
			height: auto;
			padding: 0 !important;
			margin-top: 1.5em !important;
			
			float: left;
		}
		
		.calc_height > div{
			display: table-cell;
			vertical-align: middle;
			text-align: center;
		}
		
		#navigation{
			background: none;
			display: none;
		}
		
		#toggle{
			font-size: 3rem;
		}
		
		.transition{			
			transition-property: width,height,left,top;
			transition-duration: 1s;
			transition-timing-function: ease-in-out;
		}
	</style>
</head>
<body>
	
<?php _inc('nav')?>
<?php _inc('intro')?>
<?php _inc('assets/break')?>
<?php _inc('sections/layout')?>
<?php _inc('assets/break')?>
<?php _inc('sections/columns')?>
<?php _inc('assets/break')?>
<?php _inc('sections/content')?>
<?php _inc('assets/break')?>
<?php _inc('sections/icons')?>
<?php _inc('assets/break')?>
<?php _inc('sections/buttons')?>
<?php _inc('assets/break')?>
<?php _inc('sections/forms')?>
<?php _inc('assets/break')?>
<?php _inc('sections/animations')?>
<?php _inc('assets/break')?>
<?php _inc('sections/utility')?>
<?php _inc('assets/break')?>
<?php _inc('sections/effects')?>

<script type="text/javascript" src="js/boots.js?v=<?php echo urlencode(microtime())?>"></script>
<script>
	if(window.mobile) $('body').addClass('mobile');
	
	$('.sticky').sticky_postion();
	$('img').dynamic_images();
	$('.calc_height').equalize_height();
	
	$('.gt').grid_transition();
	
	$('[animation]').each(function()
	{
		var animation = $(this).attr('animation'),
			preview = $(this).parent().parent().parent();
			
		preview.addClass('animate');
				
		$(this).on('click',function()
		{
			preview.addClass(animation);
		});		
			
		preview.bb_animation_end(function()
		{
			preview.removeClass(animation);
		});				
	});
	
</script>

</body>
</html>