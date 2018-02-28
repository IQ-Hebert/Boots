
<div id="grid_transition" class="outer">
	<div class="inner">
		<section class="content">
			<h2>Grid Transition</h2>
			<p>
				Allows for our CSS Grid to have animated transitions between width, height and location. May pass a custom transitioning class and child column selector.
			</p>
			<ul>
				<li><strong>Requires JavaScript</strong> - Is a jQuery plugin.</li>
				<li>
					<strong>Example:</strong>
					<code>
						$('selector').grid_transition();
					</code>
				</li>
				<li>
					<strong>Example - class and column:</strong>
					<code>
						$('selector').grid_transition({class:'transition',col:'.col'});
					</code>
				</li>
			</ul>
		</section>
	</div>
		
	<div class="inner">
		<section class="columns gt" style="position: relative">
		<?php for($i = 6; $i <= 12; $i++):?>
			
			<div class="col auto">
				<div class="content bubble"><p>Auto</p></div>
			</div>
		<?php 
			$size = $i;
			for($n = $size - 1; $n <= 10; $n += $i): if($n + $size > 12) $size = 13 - $n;?>
			<div class="col s_<?php echo $size?>">
				<div class="content bubble" data-i="<?php echo $i?>" data-n="<?php echo $n?>"><p><?php echo $size?></p></div>
			</div>
			<?php endfor;?>
			
		<?php endfor;?>
		</section>
	</div>
</div>
