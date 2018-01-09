<?php
$directions = array('left','right','up','down','left_up','left_down','right_up','right_down');
$types = array('slide_in','slide_out','fade_in','fade_out','scale_in','scale_out','fade_scale_in','fade_scale_out');

$animations = array();

foreach($types as $type)
{
	if($type !== 'slide_in' & $type !== 'slide_out') $animations[] = $type;
	
	foreach($directions as $direction)
	{
		$animations[] = $type.'_'.$direction;
	}
}

$i = 0;
?>

<div id="sections_animations" class="outer dark">
	<div class="inner">
		<h1>Example Animations</h1>
	</div>
</div>

<?php _inc('assets/break')?>

<div class="outer">
	<div class="inner">
		<div class="columns">			
			<?php foreach($animations as $animation): $i++?>
			
			<div class="col s_6">
				<div class="content bubble">
					<p>
						<strong>.<?php echo $animation?></strong>
						<br>
						animation effect number <?php echo $i?>
						<br>	<br>
							
						<a class="btn_outline" href="#/" animation="<?php echo $animation?>"><span>Trigger Example</span></a>
					</p>
				</div>
			</div>
			
			<?php endforeach;?>
		</div>
	</div>
</div>
