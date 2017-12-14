<?php
// Sample columns

$columns = array('columns' => 12);

foreach($columns as $class => $count):?>

<div class="outer">
	<div class="inner">
		<div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'>
			<h1><?php echo $count?> Column Layout</h1>
		</div>
	</div>
		
	<div class="inner">
		<div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'>
			<h2>Size Examples</h2>
		</div>
		<div class="<?php echo $class?>">
		<?php 
			for($i = 1; $i <= $count; $i++):
			$size = 's_'.$i;
		?>
			<div class="col <?php echo $size?>"><div class="content" scroll_efx='{"animation":"fade_in_scale_left_down","offset":50,"reset":"both"}'><p class="t_ctr">.<?php echo $size?></p></div></div>
			<?php if($i != $count):?><div class="col"><div class="content" scroll_efx='{"animation":"fade_in_left_down","offset":50,"reset":"both"}'><p class="t_ctr">Auto</p></div></div><?php endif?>
			<div class="clr"></div>
		<?php endfor;?>
		</div>
	</div>
		
	<div class="inner">
		<div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'>
			<h2>Offsets Examples</h2>
		</div>
		<div class="<?php echo $class?>">
		<?php 
			for($i = 1; $i <= $count; $i++):
			$size = 's_1';
			$offset = 'o_'.($i-1);
			
			if($i > 1):?>
			<?php if($i != $count):?><div class="col"><div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'><p class="t_ctr">Auto</p></div></div><?php endif?>
			<div class="col <?php echo $size.' '.$offset?>"><div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'><p class="t_ctr">.<?php echo $offset?></p></div></div>
			<div class="clr"></div>
			<?php endif;?>
		<?php endfor;?>
		</div>
	</div>
	
	<div class="inner">
		<div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'>
			<h2><?php echo $count?> Columns - Layout Examples</h2>
		</div>
		<div class="<?php echo $class?>">
		<?php 
			for($i = 1; $i <= $count; $i++):
				$n = 0;
				while($n*$i < $count):
				$n ++;
				$size = 's_'.(($i * $n) > $count ? ($count - $i*($n-1)):$i);
		?>
				<div class="col <?php echo $size;?>"><div class="content" scroll_efx='{"animation":"fade_in_down","offset":50,"reset":"both"}'><p class="t_ctr">.<?php echo $size?></p></div></div>
			<?php endwhile;?>
			<div class="clr"></div>
		<?php endfor;?>
		</div>
	</div>

<?php for($i = 2; $i <= $count; $i++):?>
	<div class="inner">
		<div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'>
			<h2>Row set size (.c_<?php echo $i?>)</h2>
		</div>
		<div class="<?php echo $class.' '.'c_'.$i?>">
		<?php 
			for($c = 1; $c <= 3; $c++):
				$n = 0;
				while($n < $i):
				$n ++;
		?>
				<div class="col"><div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'><p class="t_ctr">auto</p></div></div>
			<?php endwhile;?>
		<?php endfor;?>
		</div>
	</div>
<?php endfor;?>

	<div class="inner">
		<div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'>
			<h2>Page Layout Examples</h2>
		</div>
		<div class="<?php echo $class?>">
			<?php $c_s = floor($count/1.25);?>
			
			<div class="col full"><div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'><p class="t_ctr">Header .full</p></div></div>
			
			<div class="col auto"><div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'><p class="t_ctr">Sidebar .auto</p></div></div>
			<div class="col s_<?php echo $c_s?> grow"><div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'><p class="t_ctr">Content .s_<?php echo $c_s?> .grow</p></div></div>
			
			<div class="col full"><div class="content" scroll_efx='{"animation":"fade_in_up","offset":50,"reset":"both"}'><p class="t_ctr">Footer .full</p></div></div>
		</div>
	</div>
	
</div>
	
<?php endforeach;?>