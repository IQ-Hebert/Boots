
<div id="utility_fontsize" class="outer">
	<div class="inner">
		<div class="content">
			<h2>Auto Font Size</h2>
			<p>
				Auto font size allows the text content of an element to grow to fit the elements width.
			</p>
			<ul>
				<li><strong>Requires JavaScript</strong> - Is a jQuery plugin.</li>
				<li>
					<strong>Example:</strong>
					<code>
						$('selector').auto_fs();
					</code>
				</li>
				<li>
					<strong>Example - calc class:</strong>
					<code>
						$('selector').auto_fs('calc');
					</code>
				</li>
				<li>
					<strong>Example - max size:</strong>
					<code>
						$('selector').auto_fs(300);
					</code>
				</li>
				<li>
					<strong>Example - calc class and max size, min size, lines:</strong>
					<code>
						$('selector').auto_fs({calc:'calc',max:300,min:10,lines:1});
					</code>
				</li>
			</ul>
		</div>
	</div>
		
	<div class="inner">
		<?php for($i = 0; $i <= 9; $i+=2):?>			
		<div class="content bubble" style="width: <?php echo (100 - $i*10)?>%; margin: 20px auto !important;">
			<p class="a_fs" style="padding: 0 1em !important; line-height: 1;">Auto Sized Text</p>
		</div>
		<?php endfor;?>
	</div>
</div>
