<!-- apps/frontend/modules/job/templates/indexSuccess.php -->

<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('jobs.css') ?>
 
<div id="jobs">
 <div class="category_vary">
  <div class="category">
        <h1>Karlovy Vary</h1>
       </div>

  <table class="jobs">
    <?php foreach ($Reports as $i => $job): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td class="location"><?php echo $job->getName() ?></td>
        <td class="position">
          <a href="<?php echo url_for('report/show?id='.$job->getId()) ?>">
            <?php echo $job->getFilename() ?>
          </a>
        </td>

	<td class="company">
		 <a href="<?php echo url_for('report/export?id='.$job->getId()) ?>">Exportovat</a>
	</td>
        <td class="exported"></td>
      </tr>
    <?php endforeach ?>
  </table>
</div>
</div>
