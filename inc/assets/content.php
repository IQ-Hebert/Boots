<div class="outer">
	<div class="inner">
		<div class="content">
			<h1>Content Examples - Headlines</h1>
			<h1>H1 - Heading example</h1>
			<h2>H2 - Heading example</h2>
			<h3>H3 - Heading example</h3>
			<h4>H4 - Heading example</h4>
			<h5>H5 - Heading example</h5>
			<h6>H6 - Heading example</h6>
		</div>
	</div>
		
	<div class="inner">
		<div class="content">
			<h1>Content Examples - Paragraphs</h1>	
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Summus dolor plures dies manere non potest? Ut non sine causa ex iis memoriae ducta sit disciplina. <a href="http://loripsum.net/" target="_blank">Primum quid tu dicis breve?</a> Duo Reges: constructio interrete. Qui autem de summo bono dissentit de tota philosophiae ratione dissentit. <mark>Easdemne res?</mark> <b>Quis est tam dissimile homini.</b> Estne, quaeso, inquam, sitienti in bibendo voluptas? Iam enim adesse poterit. Itaque hic ipse iam pridem est reiectus; </p>
			
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duo Reges: constructio interrete. At enim hic etiam dolore.
			</p>
			
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quot homines, tot sententiae; Quod equidem non reprehendo; Certe non potest. Duo Reges: constructio interrete. Aperiendum est igitur, quid sit voluptas; Quid Zeno? At coluit ipse amicitias. </p>
			
		</div>
	</div>
		
	<div class="inner">
		<div class="content">
			<h1>Content Examples - Lists</h1>
			<ul>
				<li>Quoniam, si dis placet, ab Epicuro loqui discimus.</li>
				<li>Nihil minus, contraque illa hereditate dives ob eamque rem laetus.</li>
				<li>
					Aliam vero vim voluptatis esse, aliam nihil dolendi, nisi valde pertinax fueris, concedas necesse est.
					<ul>
						<li>Duo Reges: constructio interrete.</li>
						<li>An potest, inquit ille, quicquam esse suavius quam nihil dolere?</li>
						<li>Verba tu fingas et ea dicas, quae non sentias?</li>
						<li>Cur igitur, inquam, res tam dissimiles eodem nomine appellas?</li>
					</ul>
				</li>
				<li>At, illa, ut vobis placet, partem quandam tuetur, reliquam deserit.</li>
				<li>Commentarios quosdam, inquam, Aristotelios, quos hic sciebam esse, veni ut auferrem, quos legerem, dum essem otiosus;</li>
			</ul>
			
			<ol>
				<li>Quoniam, si dis placet, ab Epicuro loqui discimus.</li>
				<li>Nihil minus, contraque illa hereditate dives ob eamque rem laetus.</li>
				<li>
					Aliam vero vim voluptatis esse, aliam nihil dolendi, nisi valde pertinax fueris, concedas necesse est.
					<ol>
						<li>Duo Reges: constructio interrete.</li>
						<li>An potest, inquit ille, quicquam esse suavius quam nihil dolere?</li>
						<li>Verba tu fingas et ea dicas, quae non sentias?</li>
						<li>Cur igitur, inquam, res tam dissimiles eodem nomine appellas?</li>
					</ol>
				</li>
				<li>At, illa, ut vobis placet, partem quandam tuetur, reliquam deserit.</li>
				<li>Commentarios quosdam, inquam, Aristotelios, quos hic sciebam esse, veni ut auferrem, quos legerem, dum essem otiosus;</li>
			</ol>
		</div>
	</div>
		
	<div class="inner">
		<div class="content">
			<h1>Content Examples - Inline Styles</h1>
		</div>
		<div class="columns c_6 t_ctr">
		<?php
			$tags = array('a','b','strong','i','em','var','sup','sub','small','mark','ins','u','strike','s','del','q','code');
			foreach($tags as $tag):
		?>
			<div class="col">
				<div class="content">
					<h2><?php echo $tag?></h2>
					<p>Example of a <<?php echo $tag?>><?php echo $tag?> tag</<?php echo $tag?>></p>
				</div>
			</div>
		<?php endforeach;?>
		</div>
	</div>
	
	<div class="inner">
		<div class="content">
			<h1>Content Examples - Block Styles</h1>
		</div>
		<div class="columns c_3 t_ctr">
		<?php
			$tags = array('pre','blockquote');
			foreach($tags as $tag):
		?>
			<div class="col">
				<div class="content">
					<h2><?php echo $tag?></h2>
					<<?php echo $tag?>><p>Example of a <?php echo $tag?> tag</p></<?php echo $tag?>>
				</div>
			</div>
		<?php endforeach;?>
		</div>
	</div>
</div>