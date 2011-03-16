<?php

/**
 * Car form.
 *
 * @package    proect
 * @subpackage form
 * @author     Your name here
 */
class CarForm extends BaseCarForm
{
  public function configure()
  {
		$this->getWidgetSchema()->setLabel('name', 'Název');	
		$this->getWidgetSchema()->setLabel('spz', 'SPZ');	
		$this->getWidgetSchema()->setLabel('type', 'Typ');	
		$this->getWidgetSchema()->setLabel('assignment', 'Přiřazení');	
		$this->getWidgetSchema()->setLabel('factory', 'Značka');	
		$this->getWidgetSchema()->setLabel('year', 'Rok výroby');	
                $this->useFields(array('id', 'name','spz','type','assignment','year'));	
  }
}
