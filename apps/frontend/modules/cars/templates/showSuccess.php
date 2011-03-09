<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Car->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $Car->getName() ?></td>
    </tr>
    <tr>
      <th>Spz:</th>
      <td><?php echo $Car->getSPZ() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('cars/edit?id='.$Car->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('cars/index') ?>">List</a>
