<?php

/**
 * Report form.
 *
 * @package    proect
 * @subpackage form
 * @author     Your name here
 */
class ReportForm extends BaseReportForm
{
  public function configure()
  {
		$this->getWidgetSchema()->setLabel('name', 'Název');	
		$this->getWidgetSchema()->setLabel('filename', 'Soubor');	
		  $this->useFields(array('id', 'name','filename'));	
  }
}
