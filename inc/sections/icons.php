
<div id="sections_icons" class="outer dark">
	<div class="inner">
		<h1>Example Icons</h1>
	</div>
</div>

<?php _inc('assets/break')?>
<?php $icons = array('close','plus','minus','toggle','arrow_left','arrow_right','arrow_up','arrow_down');?>

<div class="outer">
	<div class="inner">
		
		<div class="columns">
			<div class="col s_4">
				<div class="content bubble">
					<p>
						<strong>.icon_hamburger</strong>
						<br>
						<a href="#/" class="icon_hamburger">
							<i></i>
						</a>
					</p>
				</div>
			</div>
			
			<?php foreach($icons as $icon):?>
			<div class="col s_4">
				<div class="content bubble">
					<p>
						<strong>.icon_<?php echo $icon?></strong>
						<br>
						<i class="icon_<?php echo $icon?>"></i>
					</p>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
