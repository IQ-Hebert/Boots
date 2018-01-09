<?php 
	$values = array('Red','Green','Blue','White','Black');
	$options = '';
	$years = '';
	
	foreach($values as $value) $options .= '<option>'.$value.'</option>';
	for($year = 1960; $year < 2018; $year++) $years .= '<option>'.$year.'</option>';
?>

<div id="sections_forms" class="outer dark">
	<div class="inner">
		<h1>Example Forms</h1>
	</div>
</div>

<?php _inc('assets/break')?>

<div class="outer">
	<div class="inner">
		<form>
			<div class="input">
				<label>Label Test</label>
				<input type="text" placeholder="Enter text...">
				<button class="btn">
					<span>Button</span>
				</button>
			</div>
			
			<div class="select">
				<select>
					<option>Select a option...</option>
					<?php echo $options?>
				</select>
				<i class="icon_arrow_down"></i>
			</div>
			
			<div class="textarea">
				<textarea name="text" cols="9" rows="8" placeholder="Enter text...."></textarea>
			</div>
			
			<div class="other">
				<p>
					<input id="cb_a" type="checkbox" name="cb_a" />
					<label for="cb_a">Checkbox</label>
				</p>
			</div>
			
			<div class="other">
				<p>
					Radio button test: 
					<input id="rd_test_b_a" type="radio" name="rd_test_b" tabindex="1" />
					<label for="rd_test_b_a">Yes</label>
					,
					<input id="rd_test_b_b" type="radio" name="rd_test_b" tabindex="1" />
					<label for="rd_test_b_b">No</label>
				</p>
			</div>
		</form>
	</div>
	
	<div class="inner">
		<form class="columns">
			<div class="col s_6">
				<div class="input required">
					<input type="text" placeholder="Name">
				</div>
			</div>
			
			<div class="col s_6">
				<div class="input required">
					<input type="email" placeholder="Email">
				</div>
			</div>
			
			<div class="col s_6">
				<div class="input">
					<input type="text" placeholder="Company">
				</div>
			</div>
			
			<div class="col s_6">
				<div class="select required">
					<select>
						<option>Year</option>
						<?php echo $years?>
					</select>
					<i class="icon_arrow_down"></i>
				</div>
			</div>
			
			<div class="col grow">
				<div class="other required">
					<p>
						Required fields
					</p>
				</div>
			</div>
			
			<div class="col no_grow t_ctr">
				<div class="other">
					<button class="btn"><span>Submit</span></button>
				</div>
			</div>
		</form>
	</div>
</div>