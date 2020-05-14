<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_joomlog
 *
 * @copyright   Copyright (C) 2020 Startproj - Solucoes Digitais. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * JoomLog Model
 *
 * @since  1.0
 */
class JoomLogModelJoomLog extends JModelItem
{
  /**
   * @var string message
   */
  protected $message;


  /**
   * Method to get a table object, load it if necessary.
   *
   * @param   string  $type    The table name. Optional.
   * @param   string  $prefix  The class prefix. Optional.
   * @param   array   $config  Configuration array for model. Optional.
   *
   * @return  JTable  A JTable object
   *
   * @since   1.0
   */
  public function getTable($type = 'JoomLog', $prefix = 'JoomLogTable', $config = array())
  {
    return JTable::getInstance($type, $prefix, $config);
  }


  /**
   * Get the message
   *
   * @param   integer  $id  Greeting Id
   *
   * @return  string        Fetched String from Table for relevant Id
   */
  public function getMsg($id = 1)
  {
    if (!is_array($this->messages))
    {
      $this->messages = array();
    }

    if (!isset($this->messages[$id]))
    {
      // Request the selected id
      $jinput = JFactory::getApplication()->input;
      $id     = $jinput->get('id', 1, 'INT');

      // Get a TableHelloWorld instance
      $table = $this->getTable();

      // Load the message
      $table->load($id);

      // Assign the message
      $this->messages[$id] = $table->title;
    }

    return $this->messages[$id];
  }
  
  public function getVersions()
  {
    $query = $this->_db->getQuery(true);
    $query->select('v.id,v.createdDate,v.version,v.published');
    $query->from('#__joomlog_version AS v');
    $query->where('v.published = 1');

    $this->_db->setQuery($query);
    $versions = $this->_db->loadObjectList();
    
    return $versions;
  }
  
  
  public function getLogType()
  {
    $query = $this->_db->getQuery(true);
    $query->select('id,title,description,published');
    $query->from('#__joomlog_type AS t');
    
    $query->where('t.published = 1');
    
    $this->_db->setQuery($query);
    $logType = $this->_db->loadObjectList();
    
    return $logType;
  }
  
  public function getLog()
  {
    $query = $this->_db->getQuery(true);
    
    $query->select('l.id, l.title, l.description, l.fk_joomlog_version_id, l.fk_joomlog_type_id, l.published');
    $query->from('#__joomlog_log AS l');
    
    $query->leftJoin('#__joomlog_version AS v on fk_joomlog_version_id = v.id');
    
    $query->where('v.published = 1');
    $query->where('l.published = 1');

    $this->_db->setQuery($query);
    $log = $this->_db->loadObjectList();
    
    return $log;
  }
}