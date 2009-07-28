<table>
  <tbody>
    <tr>
      <th>Name:</th>
      <td><?php echo $tags->getName() ?></td>
    </tr>
    <tr>
      <th>Vprasanje:</th>
      <td><?php echo $tags->getVprasanjeId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tags/edit?name='.$tags->getName().'&vprasanje_id='.$tags->getVprasanjeId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('tags/index') ?>">List</a>
