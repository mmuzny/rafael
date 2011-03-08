<!-- apps/frontend/modules/job/templates/indexSuccess.php -->
<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('jobs.css') ?>
 
<div id="jobs">
 <div class="category_vary">
  <div class="category">
        <h1><?php echo sfConfig::get('app_organization', $default_value)?></h1>
       </div>

  <table class="jobs">
    <?php foreach (get_slot('Crons') as $i => $cron): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td class="halftohalf"><?php echo $cron['filename']  ?></td>
        <td class="halftohalf_exp"><a href="<?php echo url_for('crontab/edit?filename='.$cron['filename']) ?>">Editovat</a></td>
      </tr>
    <?php endforeach ?>
  </table>
</div>
</div>
