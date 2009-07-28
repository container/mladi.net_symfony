<h1>Odgovor List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Vprasanje</th>
      <th>Svetovalec</th>
      <th>Naslov</th>
      <th>Text</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($odgovor_list as $odgovor): ?>
    <tr>
      <td><a href="<?php echo url_for('odgovor/show?id='.$odgovor->getId()) ?>"><?php echo $odgovor->getId() ?></a></td>
      <td><?php echo $odgovor->getVprasanjeId() ?></td>
      <td><?php echo $odgovor->getSvetovalecId() ?></td>
      <td><?php echo $odgovor->getNaslov() ?></td>
      <td><?php echo $odgovor->getText() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('odgovor/new') ?>">New</a>
