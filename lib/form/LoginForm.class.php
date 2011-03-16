<?php

class LoginForm extends BasesfGuardFormSignin
{
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInput(array('type' => 'password')),
      'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'username' => new sfValidatorString(),
      'password' => new sfValidatorString(),
      'remember' => new sfValidatorBoolean(),
    ));

    $this->getWidgetSchema()->setLabel('username', 'Uživatelské jméno');	
    $this->getWidgetSchema()->setLabel('password', 'Heslo');	
    $this->getWidgetSchema()->setLabel('remember', 'Zapamatovat');	

    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser());

    $this->widgetSchema->setNameFormat('signin[%s]');
  }
}
