
<div id="utility_height" class="outer">
	<div class="inner">
		<div class="content">
			<h2>Equalize Height</h2>
			<p>
				Equalizes the hight of multiple elements. Setting all elements heights equal to the tallest elements height. May pass a class to be used before heights are calculated. May also pass a min height. 
			</p>
			<ul>
				<li><strong>Requires JavaScript</strong> - Is a jQuery plugin.</li>
				<li>
					<strong>Example:</strong>
					<code>
						$('selector').equalize_height();
					</code>
				</li>
				<li>
					<strong>Example - calc class:</strong>
					<code>
						$('selector').equalize_height('calc');
					</code>
				</li>
				<li>
					<strong>Example - min height:</strong>
					<code>
						$('selector').equalize_height(100);
					</code>
				</li>
				<li>
					<strong>Example - calc class and min height:</strong>
					<code>
						$('selector').equalize_height({calc:'calc',min:100});
					</code>
				</li>
			</ul>
			
			<div class="clr"></div>
			
			<div class="calc_height">
				<div style="height: 40px">
					<p>40px</p>
				</div>
			</div>
			
			<div class="calc_height">
				<div style="height: 80px">
					<p>80px</p>
				</div>
			</div>
			
			<div class="calc_height">
				<div style="height: 160px">
					<p>160px</p>
				</div>
			</div>
	
	
			<div class="calc_height">
				<div style="height: 320px">
					<p>320px</p>
				</div>
			</div>
			
			<div class="clr"></div>
		</div>
	</div>
</div>
