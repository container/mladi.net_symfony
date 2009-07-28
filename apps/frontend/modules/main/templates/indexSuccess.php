
<div id="left">

	<h1>Micova Svetovalnica</h1>
	<p>Čau. Maš problem? Mi mamo precej odgovorov. Smo pametni, ja, strci smo vedno pametni. Ampak sori bejbi, dejansko smo pametnejši od tebe. In nič hudega, noben ne ve, da si tukaj, mi pa ti še vedno radi pomagamo. Kaj te tare?
	</p>

	<input name="search" />
	<input type="submit" value="išči"/>

	Oznake, kategorije, svetovalci
	<div id="cats_results_div">
	</div>

	vprasanja
	<div id="vprasanja_results_div">
		<ul>
		<?php foreach ($recentVprasanje as $vprasanje): ?>
			<li>
			<?php echo link_to(
			  $vprasanje->getNaslov(),
			  'vprasanje/permalink?id='.$vprasanje->getId().'&naslov='.$vprasanje->getNaslov()
			) ?>

			</li>
		<?php endforeach; ?>
		</ul>
	
	</div>

	Ne najdeš odgovora na svoje vprašanje? 
	Razloži nam svoj problem in odgovorili ti bomo!
	<textarea disabled="disabled">
	</textarea>
	<?php include_partial('vprasanje/form', array('form' => $newForm)) ?>
</div>



<div id="right">
<?php include_partial('main/tagcloud', array('tags' => $tags)) ?>
<?php include_partial('main/cats', array('cats' => $cats)) ?>
</div>



