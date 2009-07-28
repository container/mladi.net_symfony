<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $odgovor->getId() ?></td>
    </tr>
    <tr>
      <th>Vprasanje:</th>
      <td><?php echo $odgovor->getVprasanjeId() ?></td>
    </tr>
    <tr>
      <th>Svetovalec:</th>
      <td><?php echo $odgovor->getSvetovalecId() ?></td>
    </tr>
    <tr>
      <th>Naslov:</th>
      <td><?php echo $odgovor->getNaslov() ?></td>
    </tr>
    <tr>
      <th>Text:</th>
      <td><?php echo $odgovor->getText() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('odgovor/edit?id='.$odgovor->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('odgovor/index') ?>">List</a>
