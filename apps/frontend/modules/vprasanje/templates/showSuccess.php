<div id="left">
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $vprasanje->getId() ?></td>
    </tr>
    <tr>
      <th>Naslov:</th>
      <td><?php echo $vprasanje->getNaslov() ?></td>
    </tr>
    <tr>
      <th>Text:</th>
      <td><?php echo $vprasanje->getText() ?></td>
    </tr>
    <tr>
      <th>Nickname:</th>
      <td><?php echo $vprasanje->getNickname() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $vprasanje->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>tags</th>
      <td><?php echo $vprasanje->getTagsCommaSeparated(); ?></td>
    </tr>
  </tbody>
</table>
<hr />	
		<?php foreach ($vprasanje->getOdgovori() as $odgovor): ?>
			<div class="odgovor">
				<h2><?php echo  $odgovor->getNaslov();?></h2>
				<div class="odgovor_content">
					<?php echo  $odgovor->getText();?>
					<?php echo $odgovor->getCreatedAt('m/d/Y');?>
				</div>
				
			</div>
		<?php endforeach; ?>

<hr />
<?php include_partial('odgovor/form', array('form' => $odgovorForm, 'vprasanjeId'  => $vprasanje->getId())) ?>
<a href="<?php echo url_for('vprasanje/edit?id='.$vprasanje->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('vprasanje/index') ?>">List</a>

</div>
<div id="right">
<?php include_partial('main/tagcloud', array('tags' => $tags)) ?>
<?php include_partial('main/cats', array('cats' => $cats)) ?>
</div>