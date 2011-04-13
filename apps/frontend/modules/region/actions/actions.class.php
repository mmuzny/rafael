<?php

/**
 * region actions.
 *
 * @package    proect
 * @subpackage region
 * @author     Your name here
 */
class regionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Regions = RegionPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Region = RegionPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Region);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RegionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RegionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Region = RegionPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Region does not exist (%s).', $request->getParameter('id')));
    $this->form = new RegionForm($Region);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Region = RegionPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Region does not exist (%s).', $request->getParameter('id')));
    $this->form = new RegionForm($Region);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Region = RegionPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Region does not exist (%s).', $request->getParameter('id')));
    $Region->delete();

    $this->redirect('region/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Region = $form->save();

      $this->redirect('region/edit?id='.$Region->getId());
    }
  }
}
