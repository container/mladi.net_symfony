<h1>Vprasanje List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Naslov</th>
      <th>Text</th>
      <th>Nickname</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vprasanje_list as $vprasanje): ?>
    <tr>
      <td><a href="<?php echo url_for('vprasanje/show?id='.$vprasanje->getId()) ?>"><?php echo $vprasanje->getId() ?></a></td>
      <td><?php echo $vprasanje->getNaslov() ?></td>
      <td><?php echo $vprasanje->getText() ?></td>
      <td><?php echo $vprasanje->getNickname() ?></td>
      <td><?php echo $vprasanje->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('vprasanje/new') ?>">New</a>
