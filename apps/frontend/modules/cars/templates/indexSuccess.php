<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('cars-mods.css') ?>

<div id="jobs">
 <div class="category_vary">
  <div class="category">
        <h1><?php echo sfConfig::get('app_organization', $default_value)?> - Vozový park</h1>
       </div>

  <table class="jobs">
    <?php foreach ($Cars as $i => $car): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td class="location"><?php echo $car->getName() ?></td>
        <td class="position"><?php echo $car->getType() ?>
        </td>

	<td class="company">
          <a href="<?php echo url_for('cars/show?id='.$car->getId()) ?>">
            <?php echo $car->getSPZ() ?>
          </a>
	</td>
      </tr>
    <?php endforeach ?>
  </table>
</div>
</div>
