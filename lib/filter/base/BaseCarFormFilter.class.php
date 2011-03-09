<?php

/**
 * Car filter form base class.
 *
 * @package    proect
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCarFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'spz'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorPass(array('required' => false)),
      'spz'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('car_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Car';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'name' => 'Text',
      'spz'  => 'Text',
    );
  }
}
