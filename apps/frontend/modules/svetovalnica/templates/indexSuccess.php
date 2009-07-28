<h1>Svetovalnica List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Category</th>
      <th>Naslov</th>
      <th>Text</th>
      <th>Nickname</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vprasanje_list as $vprasanje): ?>
    <tr>
      <td><a href="<?php echo url_for('svetovalnica/show?id='.$vprasanje->getId().'&category_id='.$vprasanje->getCategoryId()) ?>"><?php echo $vprasanje->getId() ?></a></td>
      <td><a href="<?php echo url_for('svetovalnica/show?id='.$vprasanje->getId().'&category_id='.$vprasanje->getCategoryId()) ?>"><?php echo $vprasanje->getCategoryId() ?></a></td>
      <td><?php echo $vprasanje->getNaslov() ?></td>
      <td><?php echo $vprasanje->getText() ?></td>
      <td><?php echo $vprasanje->getNickname() ?></td>
      <td><?php echo $vprasanje->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('svetovalnica/new') ?>">New</a>
