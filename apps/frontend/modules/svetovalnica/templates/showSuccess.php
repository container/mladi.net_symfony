<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $vprasanje->getId() ?></td>
    </tr>
    <tr>
      <th>Category:</th>
      <td><?php echo $vprasanje->getCategoryId() ?></td>
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
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('svetovalnica/edit?id='.$vprasanje->getId().'&category_id='.$vprasanje->getCategoryId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('svetovalnica/index') ?>">List</a>
