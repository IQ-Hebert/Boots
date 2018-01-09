
<div id="utility_images" class="outer">
	<div class="inner">
		<div class="content">
			<h2>Dynamic Images</h2>
			<p>
				Dynamic images allow for multiple image sources to be used. The boots JS will detect if the device is mobile and if it has retina support (2k+ resolution). Then select an image from the sources to be used. Doing this allows for the page to load and render the original source image and be swapped to a higher resolution image if needed.
			</p>
			<ul>
				<li><strong>Requires JavaScript</strong> - Is a jQuery plugin.</li>
				<li>
					<strong>Example:</strong>
					<code>
						$('selector').dynamic_images();
					</code>
				</li>
				<li>
					Images should have a default image on the <strong>src</strong> attribute, the standard image for <strong>basic</strong> attribute, the mobile image for <strong>mobile</strong> attribute, the retina image for <strong>retina</strong> attribute.
				</li>
				<li>
					Images will use retina images for non-mobile retina displays.
				</li>
				<li>
					Images will use standard images for mobile retina displays and non-retina non-mobile displays.
				</li>
				<li>
					Images will use mobile images for non-retina mobile displays.
				</li>
			</ul>
			<div class="columns">
				<div class="col s_3">
					<p>Mobile Image</p>
					<img src="img/mobile.png" />
				</div>
				<div class="col s_3">
					<p>Default Image</p>
					<img src="img/default.png" />
				</div>
				<div class="col s_3">
					<p>Retina Image</p>
					<img src="img/retina.png" />
				</div>
				<div class="col s_3">
					<p>Dynamic Image</p>
					<img class="dynamic" src="img/placeholder.gif" basic="img/default.png" mobile="img/mobile.png" retina="img/retina.png" />
				</div>
			</div>
		</div>
	</div>
</div>
