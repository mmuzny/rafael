<?php use_stylesheet('job.css') ?>
<?php use_stylesheet('jobs.css') ?>

<?php use_stylesheet('cars-mods.css') ?>
<div id="jobs">
 <div class="category_vary">
  <div class="category">
        <h1><?php echo $Car->getName() ?></h1>
       </div>

<table class="jobs">
  <tbody>
    <tr class="even">
      <td class="header">Id:</td>
      <td class="value"><?php echo $Car->getId() ?></td>
    </tr>
    <tr class="odd">
      <td class="header">Název auta:</td>
      <td class="value"><?php echo $Car->getName() ?></td>
    </tr>
    <tr class="even">
      <td class="header">SPZ:</td>
      <td class="value"><?php echo $Car->getSPZ() ?></td>
    </tr>
    <tr class="odd">
      <td class="header">Značka:</td>
      <td class="value"><?php echo $Car->getFactory() ?></td>
    </tr>
    <tr class="even">
      <td class="header">Typ:</td>
      <td class="value"><?php echo $Car->getType() ?></td>
    </tr>
    <tr class="odd">
      <td class="header">Rok výroby:</td>
      <td class="value"><?php echo $Car->getYear() ?></td>
    </tr>
    <tr class="even">
      <td class="header">Přiřazení:</td>
      <td class="value"><?php echo $Car->getAssignment() ?></td>
    </tr>
  </tbody>
</table>
</div>
</div>
<hr />

<a href="<?php echo url_for('cars/edit?id='.$Car->getId()) ?>">Upravit</a>
&nbsp;
<a href="<?php echo url_for('cars/index') ?>">Seznam</a>
