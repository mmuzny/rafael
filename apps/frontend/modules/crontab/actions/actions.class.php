<?php

/**
 * crontab actions.
 *
 * @package    proect
 * @subpackage crontab
 * @author     Your name here
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class crontabActions extends sfActions
{
/**
* Executes index action
*
* @param sfRequest $request A request object
*/

public function executeIndex(sfWebRequest $request)
{

$base_dir=sfConfig::get('app_crontab_folder', $default_value);
		
$myDirectory = opendir($base_dir);

while($entryName = readdir($myDirectory)) {
	$dirArray[] = $entryName;
}

closedir($myDirectory);
$indexCount	= count($dirArray);
sort($dirArray);
for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "."){
		$handle = fopen($base_dir.$dirArray[$index],'r');
		$contents = fread($handle, filesize($base_dir.$dirArray[$index]));
    		list( $cron_minute, $cron_hour, $cron_day, $cron_month, $cron_day_of_week ) = split( " ", $contents );
		$Cron['filename']=$dirArray[$index];
		$Cron['minute']=$cron_minute;
		$Cron['hour']=$cron_hour;
		$Cron['day']=$cron_day;
		$Cron['month']=$cron_month;
		$Cron['day_of_week']=$cron_day_of_week;
		$Crons[]=$Cron;
		$this->getResponse()->setSlot('Crons', $Crons);	
	}
}}


public function executeUpdate(sfWebRequest $request)
{

$base_dir=sfConfig::get('app_crontab_folder', $default_value);
		
$handle = fopen($base_dir.$request->getParameter('filename'),'w');

$minute=$request->getPostParameter('minute',null);
$hour=$request->getPostParameter('hour',null);
$day=$request->getPostParameter('day',null);
$month=$request->getPostParameter('month',null);
$day_of_week=$request->getPostParameter('day_of_week',null);
$command=$request->getPostParameter('command',null);

fwrite($handle, $minute." ".$hour." ".$day." ".$month." ".$day_of_week." ".$command);

$this->redirect('crontab/index');
}

public function executeEdit(sfWebRequest $request)
{


$base_dir=sfConfig::get('app_crontab_folder', $default_value);
		
$myDirectory = opendir($base_dir);

while($entryName = readdir($myDirectory)) {
	$dirArray[] = $entryName;
}

closedir($myDirectory);
$indexCount	= count($dirArray);
sort($dirArray);
for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "."){
		if ($dirArray[$index] == $request->getParameter('filename')){
		$handle = fopen($base_dir.$dirArray[$index],'r');
		$contents = fread($handle, filesize($base_dir.$dirArray[$index]));
    		list( $cron_minute, $cron_hour, $cron_day, $cron_month, $cron_day_of_week, $command ) = split( " ", $contents );
		$Cron['filename']=$dirArray[$index];
		$Cron['minute']=$cron_minute;
		$Cron['hour']=$cron_hour;
		$Cron['day']=$cron_day;
		$Cron['month']=$cron_month;
		$Cron['day_of_week']=$cron_day_of_week;
		$Cron['command']=substr($contents, strlen($contents) - strlen(substr($contents,strpos($contents,$cron_day_of_week." php")+2)));
		$this->getResponse()->setSlot('Cron', $Cron);	
	}}
}
$this->form = new CrontabForm(array(), array('hour' => $Cron['hour'], 'minute' => $Cron['minute'], 'day' => $Cron['day'],'month' => $Cron['month'],'day_of_week' => $Cron['day_of_week'],'command' => $Cron['command']));
/*
*/
  }
}
 
