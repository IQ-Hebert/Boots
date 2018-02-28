
<div id="utility_sticky" class="outer">
	<div class="inner">
		<div class="content">
			<h2>Sticky Positioned</h2>
			<p>
				Sticky Positioned allow for elements to be sticky. The element will scroll with the page, but be in a fixed position when the elements parent container is scrolling.
			</p>
			<ul>
				<li><strong>Requires JavaScript</strong> - Is a jQuery plugin.</li>
				<li>
					<strong>Example:</strong>
					<code>
						$('selector').sticky_postion();
					</code>
				</li>
				<li>
					<strong>Example - sticky class:</strong>
					<code>
						$('selector').sticky_postion('sticky');
					</code>
				</li>
				<li>
					<strong>Example - placeholder:</strong>
					<code>
						$('selector').sticky_postion(true);
					</code>
				</li>
				<li>
					<strong>Example - class and placeholder:</strong>
					<code>
						$('selector').sticky_postion({class:'sticky',placeholder:true});
					</code>
				</li>
			</ul>
			<?php /*
			
			<div class="bubble">
				<div style="height: 200px; overflow: auto;">
					<div style="position: relative;">
						<div class="sticky">Sticky</div>
						<div style="height: 2000px; border-left: 2px dashed; width: 2px; margin: 0 auto;"></div>
					</div>
				</div>
			</div>
			*/?>
		</div>
	</div>
</div>
