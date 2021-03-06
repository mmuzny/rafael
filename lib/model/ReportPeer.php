<?php


/**
 * Skeleton subclass for performing query and update operations on the 'report' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Thu Feb 17 10:50:36 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ReportPeer extends BaseReportPeer {

static public function getLuceneIndex()
{
  ProjectConfiguration::registerZend();
 
  if (file_exists($index = self::getLuceneIndexFile()))
  {
    return Zend_Search_Lucene::open($index);
  }
 
  return Zend_Search_Lucene::create($index);
}
 
static public function getLuceneIndexFile()
{
  return sfConfig::get('sf_data_dir').'/report.'.sfConfig::get('sf_environment').'.index';
}

static public function getForLuceneQuery($query)
{
  $hits = self::getLuceneIndex()->find($query);
 
  $pks = array();
  foreach ($hits as $hit)
  {
    $pks[] = $hit->pk;
  }
  $criteria = new Criteria();
  $criteria->add(self::ID, $pks, Criteria::IN);
  return self::doSelect($criteria);
}

} // ReportPeer
