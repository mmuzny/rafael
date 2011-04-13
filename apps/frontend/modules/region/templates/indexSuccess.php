<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('regions-mods.css') ?>

<div id="jobs">
 <div class="category_vary">
  <div class="category">
        <h1><?php echo sfConfig::get('app_organization', $default_value)?> - Regiony</h1>
       </div>

  <table class="jobs">
    <?php foreach ($Regions as $i => $region): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td class="location"><?php echo $region->getName() ?></td>
        <td class="position"><?php echo $region->getName() ?>
        </td>

	<td class="company">
          <a href="<?php echo url_for('region/show?id='.$region->getId()) ?>">
            <?php echo $region->getName() ?>
          </a>
	</td>
      </tr>
    <?php endforeach ?>
  </table>
</div>
</div>
