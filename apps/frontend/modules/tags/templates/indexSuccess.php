<h1>Tags List</h1>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Vprasanje</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tags_list as $tags): ?>
    <tr>
      <td><a href="<?php echo url_for('tags/show?name='.$tags->getName().'&vprasanje_id='.$tags->getVprasanjeId()) ?>"><?php echo $tags->getName() ?></a></td>
      <td><a href="<?php echo url_for('tags/show?name='.$tags->getName().'&vprasanje_id='.$tags->getVprasanjeId()) ?>"><?php echo $tags->getVprasanjeId() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tags/new') ?>">New</a>
