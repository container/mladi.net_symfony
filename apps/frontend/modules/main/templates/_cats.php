	<div id="cats">
		<ul>
		<?php foreach ($cats as $cat): ?>
			<li><a href="<?php echo url_for('category/show?id='.$cat->getId()) ?>">
				<?php echo  $cat->getNaslov();?>
			</a></li>
		<?php endforeach; ?>
		</ul>
	</div>