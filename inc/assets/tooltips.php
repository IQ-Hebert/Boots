<?php 
	$postions = array('top','bottom','left','right');
?>	

<div id="tooltips" class="outer">
	<div class="inner">		
		<div class="content">
			<h1>Tooltips - Examples</h1>
		</div>
		<div class="columns t_ctr">
		<?php foreach($postions as $postion):?>
			<div class="col s_6">
				<div class="content">
					<h2>.tooltip .tip.<?php echo $postion?></h2>
					<p>
						Some text before a <span class="tooltip"><strong>tooltip</strong> <span class="tip <?php echo $postion?>">Tooltip Example</span></span>; some text after it.
					</p>
				</div>
			</div>
		<?php endforeach;?>
		</div>
	</div>
</div>