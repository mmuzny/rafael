<?php

/**
 * Car form base class.
 *
 * @method Car getObject() Returns the current form's model object
 *
 * @package    proect
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCarForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'spz'        => new sfWidgetFormInputText(),
      'factory'    => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormInputText(),
      'year'       => new sfWidgetFormInputText(),
      'assignment' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'spz'        => new sfValidatorString(array('max_length' => 255)),
      'factory'    => new sfValidatorString(array('max_length' => 255)),
      'type'       => new sfValidatorString(array('max_length' => 255)),
      'year'       => new sfValidatorString(array('max_length' => 255)),
      'assignment' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('car[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Car';
  }


}
