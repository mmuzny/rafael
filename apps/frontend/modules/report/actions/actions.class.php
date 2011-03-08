<?php

/**
 * report actions.
 *
 * @package    proect
 * @subpackage report
 * @author     Your name here
 */
class reportActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Reports = ReportPeer::doSelect(new Criteria());
  }

  public function executeSearch(sfWebRequest $request)
  {
  $this->forwardUnless($query = $request->getParameter('query'), 'report', 'index');
 
  $this->reports = ReportPeer::getForLuceneQuery($query);
  if ($request->isXmlHttpRequest())
  {
    if ('*' == $query || !$this->reports)
    {
      return $this->renderText('No results.');
    }
 
    return $this->renderPartial('report/list', array('reports' => $this->reports));
  }

  }

 
  public function executeExport(sfWebRequest $request)
  {

    $this->Report = ReportPeer::retrieveByPk($request->getParameter('id'));


require_once(sfConfig::get('app_knowledge_root', $default_value).'/knowledgetree/config/dmsDefaults.php');
require_once(sfConfig::get('app_knowledge_root', $default_value).'/knowledgetree/ktapi/ktapi.inc.php');

$my_link   = mysql_connect("192.168.3.31", "mirek", "mirek")
 or exit('Could not connect (' . mysql_errno() . '): ' . mysql_error()); 
$my = mysql_select_db("jasperserver", $my_link) 
 or exit('Could not select database (' . mysql_errno() . '): ' . mysql_error());  
$row = mysql_fetch_array(mysql_query("SELECT id FROM jiresource WHERE name='".$this->Report->getFilename()."'"));
$row = mysql_fetch_array(mysql_query("SELECT data FROM jicontentresource WHERE id=".$row['id']));
$handle = fopen($this->Report->getName(), 'w');
fwrite($handle, $row['data']);
//echo getcwd()."/".$this->Report->getFilename();
fclose($hadle);

$kt = new KTAPI();
$kt->start_session("admin", "admin");

$folder = $kt->get_folder_by_id(4);



$listing = $folder->get_full_listing();

foreach($listing as $val) {

   if($val['item_type'] != 'F'){

      $object=$kt->get_document_by_id($val['id']);

      if ($object->get_title()==$this->Report->getName()) {

		 $document->delete('Nahrazen aktualni verzi');
		 $result = $folder->add_document($this->Report->getName(), getcwd()."/".$this->Report->getFilename(), "pdf", $this->Report->getFilename());		

	}
       }
     }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Report = ReportPeer::retrieveByPk($request->getParameter('id'));
    $base_dir=sfConfig::get('app_crontab_folder', $default_value);
    $handle = fopen($base_dir.$this->Report->getFilename(),'r');
    $contents = fread($handle, filesize($base_dir.$this->Report->getFilename()));
    $cron_parser = new cron_parser($contents);
    $next_time = $cron_parser->next_runtime();
    $last_time = $cron_parser->last_runtime();
    $this->getResponse()->setSlot('last_time', date( "m/d/Y H:i T", $last_time));	
    $this->getResponse()->setSlot('next_time', date( "m/d/Y H:i T", $next_time));	
    $this->forward404Unless($this->Report);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ReportForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ReportForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Report = ReportPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Report does not exist (%s).', $request->getParameter('id')));
    $this->form = new ReportForm($Report);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Report = ReportPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Report does not exist (%s).', $request->getParameter('id')));
    $this->form = new ReportForm($Report);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Report = ReportPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Report does not exist (%s).', $request->getParameter('id')));
    
    $base_dir=sfConfig::get('app_crontab_folder', $default_value);
    $filename=$base_dir.$Report->getFilename();
    unlink($filename);
    $Report->delete();

    $this->redirect('report/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Report = $form->save();
	
      $base_dir=sfConfig::get('app_crontab_folder', $default_value);

      $handle = fopen($base_dir.$request->getPostParameter('report[filename]', null),'w');
 
      fclose($handle);
      
      $this->redirect('report/edit?id='.$Report->getId());
    }
  }
}


class cron_parser
{
 
  public $cron_schedule;
 
  function cron_parser($cron_schedule)
  {
    $this->cron_schedule = $cron_schedule;
  }
 
  public function next_runtime()
  {
 
    $j=0; // used as an internal counter to prevent an endless loop
    $time = time(); // time right now
    // split our cron into variables
    list( $cron_minute, $cron_hour, $cron_day, $cron_month, $cron_day_of_week ) = split( " ", $this->cron_schedule );
 
    if( $cron_day_of_week == "0" ) $cron_day_of_week = "7"; // 7 and 0 both mean Sunday
 
    do
    {
      // split our current time into variables (the $time variable will be updated after every iteration)
      list( $now_minute, $now_hour, $now_day, $now_month, $now_day_of_week ) = split( " ", date("i H d n N", $time ) );
 
      if( $cron_month != "*" )
      {
        if( (int)$cron_month != $now_month )
        {
          $j++; // internal counter
          $now_month = (int)$now_month + 1; // increment the month by 1
          // set minute, hour and day to 0 so we start at the begining of the next month
          $time = mktime( 0, 0, 0, $now_month, 1, date("Y",$time) ); // $time + 1 month
          continue; // start again
        }
      }
 
      if( $cron_day != "*" )
      {
        if( (int)$cron_day != $now_day )
        {
          $j++; // internal counter
          $now_day = (int)$now_day + 1; // increment the day by 1
          // set minute and hour to 0 so we start at the begining of the next day
          $time = mktime( 0, 0, 0, $now_month, $now_day, date("Y",$time) ); // $time + 1 day
          continue; // start again
        }
      }
 
      if( $cron_hour != "*" )
      {
        if( (int)$cron_hour != $now_hour )
        {
          $j++; // internal counter
          $now_hour = (int)$now_hour + 1; // increment the hour by 1
          // set minute to 0 so we start at the begining of the next hour
          $time = mktime( $now_hour, 0, 0, $now_month, $now_day, date("Y",$time) ); // $time + 1 hour
          continue; // start again
        }
      }
 
      if( $cron_minute != "*" )
      {
        if( (int)$cron_minute != $now_minute )
        {
          $j++; // internal counter
          $now_minute = (int)$now_minute + 1; // increment the minute by 1
          $time = mktime( $now_hour, $now_minute, 0, $now_month, $now_day, date("Y",$time) ); // $time + 1 minute
          continue; // start again
        }
      }
 
      // must be checked last
      if( $cron_day_of_week != "*" )
      {
        if( (int)$cron_day_of_week != $now_day_of_week )
        {
          $j++; // internal counter
          $now_day = (int)$now_day + 1; // increment the day by 1
           // set minute and hour to 0 so we start at the begining of the next day
          $time = mktime( 0, 0, 0, $now_month, $now_day, date("Y",$time) ); // $time + 1 day
          continue; // start again
        }
      }
 
      break; /* if we reach this point, all the conditions
      * above are true and we have our next cron time!
      */
 
    } while( $j < 10000 );
 
    return $time;
 
  }
 
  public function last_runtime()
  {
 
    $j=0; // used as an internal counter to prevent an endless loop
    $time = time(); // time right now
    // split our cron into variables
    list( $cron_minute, $cron_hour, $cron_day, $cron_month, $cron_day_of_week ) = split( " ", $this->cron_schedule );
 
    if( $cron_day_of_week == "0" ) $cron_day_of_week = "7"; // 7 and 0 both mean Sunday
 
    do
    {
      // split our current time into variables (the $time variable will be updated after every iteration)
      list( $now_minute, $now_hour, $now_day, $now_month, $now_day_of_week ) = split( " ", date("i H d n N", $time ) );
 
      if( $cron_month != "*" )
      {
        if( (int)$cron_month != $now_month )
        {
          $j++; // internal counter
          $now_month = (int)$now_month - 1; // subtract the month by 1
          $num_days_in_month = (int)date("t",mktime( 0, 0, 0, $now_month, 1, date("Y",$time) ) ); // number of days in month
          // set minute, hour and day to their highest value so we start at the end of the previous month
          $time = mktime( 23, 59, 59, $now_month, $num_days_in_month, date("Y",$time) ); // $time - 1 month
          continue; // start again
        }
      }
 
      if( $cron_day != "*" )
      {
        if( (int)$cron_day != $now_day )
        {
          $j++; // internal counter
          $now_day = (int)$now_day - 1; // subtract the day by 1
          // set minute and hour to their highest value so we start at the end of the previous day
          $time = mktime( 23, 59, 59, $now_month, $now_day, date("Y",$time) ); // $time - 1 day
          continue; // start again
        }
      }
 
      if( $cron_hour != "*" )
      {
        if( (int)$cron_hour != $now_hour )
        {
          $j++; // internal counter
          $now_hour = (int)$now_hour - 1; // subtract the hour by 1
          // set minute and second to their highest value so we start at the end of the previous hour
          $time = mktime( $now_hour, 59, 59, $now_month, $now_day, date("Y",$time) ); // $time + 1 hour
          continue; // start again
        }
      }
 
      if( $cron_minute != "*" )
      {
        if( (int)$cron_minute != $now_minute )
        {
          $j++; // internal counter
          $now_minute = (int)$now_minute - 1; // subtract the minute by 1
          $time = mktime( $now_hour, $now_minute, 59, $now_month, $now_day, date("Y",$time) ); // $time - 1 minute
          continue; // start again
        }
      }
 
      // must be checked last
      if( $cron_day_of_week != "*" )
      {
        if( (int)$cron_day_of_week != $now_day_of_week )
        {
          $j++; // internal counter
          $now_day = (int)$now_day - 1; // subtract the day by 1
           // set minute and hour to 0 so we start at the end of the previous day
          $time = mktime( 0, 0, 0, $now_month, $now_day, date("Y",$time) ); // $time - 1 day
          continue; // start again
        }
      }
 
      break; /* if we reach this point, all the conditions
      * above are true and we have our previous cron time!
      */
 
    } while( $j < 10000 );
 
    return $time;
 
  }
 
}
