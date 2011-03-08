<?php

/**
 * Report form base class.
 *
 * @method Report getObject() Returns the current form's model object
 *
 * @package    proect
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseReportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(),
      'filename' => new sfWidgetFormInputText(),
      'exported' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 255)),
      'filename' => new sfValidatorString(array('max_length' => 255)),
      'exported' => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('report[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Report';
  }


}
