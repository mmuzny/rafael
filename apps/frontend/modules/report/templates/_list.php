<table class="jobs">
  <?php foreach ($reports as $i => $report): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td class="location">
        <?php echo $report->getName() ?>
      </td>
      <td class="position">
          <a href="<?php echo url_for('report/show?id='.$report->getId()) ?>">
            <?php echo $report->getFilename() ?>
          </a>
      </td>
      <td class="company">
        <?php echo $report->getExported() ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

