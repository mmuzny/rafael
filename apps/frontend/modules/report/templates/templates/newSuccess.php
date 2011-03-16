<h1>Nový Report</h1>

<? 
$form->getWidgetSchema()->setLabel('name', 'Název');

$form->getWidgetSchema()->setLabel('filename', 'Soubor');
?>

<?php include_partial('form', array('form' => $form)) ?>
