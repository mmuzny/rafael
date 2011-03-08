<!-- apps/frontend/modules/job/templates/indexSuccess.php -->
<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('jobs.css') ?>
 
<div id="jobs">
 <div class="category_vary">
  <div class="category">
        <h1><?php echo sfConfig::get('app_organization', $default_value)?></h1>
       </div>
<?php $cron=get_slot('Cron'); $filename=$cron['filename']; ?>
  <form action="<?php echo url_for('crontab/update?filename='.$filename) ?>" method="post">
  <table class="jobs">
	<?php echo $form ?>
	<tr><td></td><td><input type="submit" value="Uložit"/></td></tr>
  </table>
  </form>
</div>
</div>
