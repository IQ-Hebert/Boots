
<div id="sections_buttons" class="outer dark">
	<div class="inner">
		<h1>Example Buttons</h1>
	</div>
</div>

<?php _inc('assets/break')?>
<?php $types = array('btn','btn invert','btn_outline','btn_outline invert');?>

<div class="outer">
	<div class="inner">
		<div class="columns">
			<?php foreach($types as $type):?>
			<div class="col s_6">
				<div class="content bubble">
					<p>
						<strong>.<?php echo $type?></strong>
						<br>
						<a class="<?php echo $type?>" href="#/"><span>Example</span></a>
					</p>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
