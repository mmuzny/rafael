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
    <tr>
      <th>Factory:</th>
      <td><?php echo $Car->getFactory() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $Car->getType() ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $Car->getYear() ?></td>
    </tr>
    <tr>
      <th>Assignment:</th>
      <td><?php echo $Car->getAssignment() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('cars/edit?id='.$Car->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('cars/index') ?>">List</a>
