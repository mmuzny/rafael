<?php

/**
 * Report filter form base class.
 *
 * @package    proect
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseReportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'filename' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'exported' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'filename' => new sfValidatorPass(array('required' => false)),
      'exported' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('report_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Report';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'filename' => 'Text',
      'exported' => 'Number',
    );
  }
}
