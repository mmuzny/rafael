<?php use_stylesheet('job.css') ?>
<?php use_stylesheet('jobs.css') ?>

<div id="jobs">
 <div class="category_vary">
  <div class="category">
        <h1><?php echo $Report->getName() ?></h1>
       </div>

<table class="jobs">
  <tbody>
    <tr class="even">
      <td class="header">Id:</td>
      <td class="value"><?php echo $Report->getId() ?></td>
    </tr>
    <tr class="odd">
      <td class="header">Název reportu:</td>
      <td class="value"><?php echo $Report->getName() ?></td>
    </tr>
    <tr class="even">
      <td class="header">Soubor:</td>
      <td class="value"><?php echo $Report->getFilename() ?></td>
    </tr>
    <tr class="odd">
      <td class="header">Naposledy exportováno:</td>
      <td class="value"><?php echo get_slot('last_time') ?></td>
    </tr>
    <tr class="even">
      <td class="header">Příští export:</td>
      <td class="value"><?php echo get_slot('next_time') ?></td>
    </tr>
  </tbody>
</table>
</div>
</div>
<hr />

<a href="<?php echo url_for('report/edit?id='.$Report->getId()) ?>">Upravit</a>
&nbsp;
<a href="<?php echo url_for('report/index') ?>">Seznam</a>
