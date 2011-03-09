<?php

/**
 * cars actions.
 *
 * @package    proect
 * @subpackage cars
 * @author     Your name here
 */
class carsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Cars = CarPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Car = CarPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Car);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CarForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CarForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Car = CarPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Car does not exist (%s).', $request->getParameter('id')));
    $this->form = new CarForm($Car);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Car = CarPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Car does not exist (%s).', $request->getParameter('id')));
    $this->form = new CarForm($Car);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Car = CarPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Car does not exist (%s).', $request->getParameter('id')));
    $Car->delete();

    $this->redirect('cars/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Car = $form->save();

      $this->redirect('cars/edit?id='.$Car->getId());
    }
  }
}
