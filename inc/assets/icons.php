<?php
	$icons = array('hamburger','close','plus','minus','toggle','arrow_left','arrow_right','arrow_up','arrow_down');
?>
<div class="outer">
	<div class="inner">		
		<div class="content">
			<h1>Icon Examples</h1>
		</div>
		
		<div class="columns">
			<?php foreach($icons as $icon):?>
			<div class="col">
				<div class="content t_ctr">
					<h2>.icon_<?php echo $icon?></h2>
					<p>
						<i class="icon_<?php echo $icon?>"></i> <a href="#/"><i class="icon_<?php echo $icon?>"></i></a>
					</p>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</div>