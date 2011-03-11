<h1>Cars List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Spz</th>
      <th>Factory</th>
      <th>Type</th>
      <th>Year</th>
      <th>Assignment</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Cars as $Car): ?>
    <tr>
      <td><a href="<?php echo url_for('cars/show?id='.$Car->getId()) ?>"><?php echo $Car->getId() ?></a></td>
      <td><?php echo $Car->getName() ?></td>
      <td><?php echo $Car->getSPZ() ?></td>
      <td><?php echo $Car->getFactory() ?></td>
      <td><?php echo $Car->getType() ?></td>
      <td><?php echo $Car->getYear() ?></td>
      <td><?php echo $Car->getAssignment() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('cars/new') ?>">New</a>
