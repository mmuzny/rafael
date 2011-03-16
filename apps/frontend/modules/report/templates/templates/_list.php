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
      </tr>
    <?php endforeach ?>
  </table>
