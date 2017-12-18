<?php
$directions = array('left','right','up','down','left_up','left_down','right_up','right_down');
$types = array('slide_in_','slide_out_','slide_in_scale_','slide_out_scale_','fade_in_','fade_out_','fade_in_scale_','fade_out_scale_');

$animations = array();

foreach($types as $type)
{
	foreach($directions as $direction)
	{
		$animations[] = $type.$direction;
	}
}

$i = 0;
?>

<div class="outer">
	<div class="inner">
		<div class="content">
			<h1>Animation Examples</h1>
		</div>
		
		<div class="columns c_2 t_ctr">
			<div class="col">
				<div class="content">
					<h2>.loading</h2>
					<div class="loading"></div>
				</div>
			</div>
			
			<div class="col">
				<div class="content">
					<h2>.waiting</h2>
					<div class="waiting"></div>
				</div>
			</div>
			
			<?php foreach($animations as $animation): $i++?>
			
			<div class="col animate">
				<div class="content">
					<h2>.<?php echo $animation?></h2>
					
					<p>animation effect number <?php echo $i?></p>
					
					<p><a href="#/" class="animation_toggle" data-animation="<?php echo $animation?>">Trigger Animation Example</a></p>
				</div>
			</div>
			
			<?php endforeach;?>
		</div>
	</div>
</div>