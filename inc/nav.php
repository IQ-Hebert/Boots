<?php
$navigation = array
(
	'layouts' => array('default','sidebars','split'),	
	'columns' => array('sizes','offsets','examples'),
	'sections' => array('content','icons','forms','animations')
);
?>

<div class="outer sticky">
	<nav class="inner">
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