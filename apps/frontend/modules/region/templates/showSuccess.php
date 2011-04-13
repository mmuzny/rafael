<?php use_stylesheet('job.css') ?>
<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('regions-mods.css') ?>
<div id="jobs">
 <div class="category_vary">
  <div class="category">
        <h1><?php echo $Region->getName() ?></h1>
       </div>

<table class="jobs">
  <tbody>
    <tr class="even">
      <td class="header">Id:</td>
      <td class="value"><?php echo $Region->getId() ?></td>
    </tr>
    <tr class="odd">
      <td class="header">Název regionu:</td>
      <td class="value"><?php echo $Region->getName() ?></td>
    </tr>
  </tbody>
</table>
</div>
</div>
<hr />

<a href="<?php echo url_for('region/edit?id='.$Region->getId()) ?>">Upravit</a>
&nbsp;
<a href="<?php echo url_for('region/index') ?>">Seznam</a>
