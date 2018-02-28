<?php
$navigation = array
(
	'layouts' => array('default','sidebars','split'),	
	'columns' => array('sizes','offsets','examples'),
	'sections' => array('content','icons','buttons','forms','animations'),
	'utility' => array('images','height','sticky')
);
?>

<div id="navigation" class="outer">
	<nav class="inner">
		
		<div id="toggle" class="sticky">
			<a href="#/" class="icon_hamburger"><i></i></a>
		</div>
		
		<ul class="columns">
			<?php foreach($navigation as $section => $links):?>
			<li class="col s_2">
				<a href="#<?php echo $section?>"><?php echo strtoupper($section)?></a>
				<ul>
				<?php foreach($links as $link):?>
					<li><a href="#<?php echo $section?>_<?php echo $link?>"><?php echo strtoupper($link)?></a></li>
				<?php endforeach;?>
				</ul>
			</li>
			<?php endforeach;?>
		</ul>
	</nav>
</div>