
<?php use_stylesheet('job.css'); ?>
<?php use_stylesheet('jobs.css') ?>
<div style="margin-top: 10%;">
<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table class="jobs">
    <?php echo $form ?>
<tr><td></td><td>
<input type="submit" value="Přihlásit" /></td></tr>
  </table>

</form>
</div>
