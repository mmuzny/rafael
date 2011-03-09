<!-- apps/frontend/modules/job/templates/indexSuccess.php -->

<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('jobs.css') ?>
 
<div id="jobs">
 <div class="category_vary">
  <div class="category">
        <h1><?php echo sfConfig::get('app_organization', $default_value)?></h1>
       </div>

  <table class="jobs">
    <?php foreach ($Cars as $Car => $car): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td class="location"><?php echo $car->getName() ?></td>
        <td class="position">
          <a href="<?php echo url_for('cars/show?id='.$car->getId()) ?>">
            <?php echo $car->getSPZ() ?>
          </a>
        </td>

	<td class="company">
		 <a href="<?php echo url_for('report/export?id='.$car->getId()) ?>">Exportovat</a>
	</td>
      </tr>
    <?php endforeach ?>
  </table>
  <a href="<?php echo url_for('cars/new') ?>">New</a>
</div>
</div>
