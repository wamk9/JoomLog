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
		/*if ($this->params->get('client_group', 0) == 0)
		{
			$query = $this->_db->getQuery(true);
			$query->select('a.id,a.name,a.email');
			$query->from('#__users AS a');
			$query->where('a.block = 0');
			$query->where('a.id NOT IN(SELECT id FROM #__myportal_users)');
	
			$this->_db->setQuery($query);
			$clients = $this->_db->loadObjectList();
		}
		else
		{*/
			//$group = $this->params->get('client_group');

			$query = $this->_db->getQuery(true);
			$query->select('id,createdDate,version,published');
			$query->from('#__joomlog_version AS v');
			//$query->join('inner', '#__user_usergroup_map AS b ON b.user_id = a.id');
			//$query->where('b.group_id = ' . $group);
			//$query->where('a.block = 0');
			//$query->where('a.id NOT IN(SELECT id FROM #__myportal_users)');

			$this->_db->setQuery($query);
			$versions = $this->_db->loadObjectList();
		/*}*/
		
		return $versions;
	}
	
	
		public function getLogType()
	{
		/*if ($this->params->get('client_group', 0) == 0)
		{
			$query = $this->_db->getQuery(true);
			$query->select('a.id,a.name,a.email');
			$query->from('#__users AS a');
			$query->where('a.block = 0');
			$query->where('a.id NOT IN(SELECT id FROM #__myportal_users)');
	
			$this->_db->setQuery($query);
			$clients = $this->_db->loadObjectList();
		}
		else
		{*/
			//$group = $this->params->get('client_group');

			$query = $this->_db->getQuery(true);
			$query->select('id,title,description,published');
			$query->from('#__joomlog_type AS t');
			//$query->join('inner', '#__user_usergroup_map AS b ON b.user_id = a.id');
			//$query->where('b.group_id = ' . $group);
			//$query->where('a.block = 0');
			//$query->where('a.id NOT IN(SELECT id FROM #__myportal_users)');

			$this->_db->setQuery($query);
			$logType = $this->_db->loadObjectList();
		/*}*/
		
		return $logType;
	}
	
		public function getLog()
	{
		/*if ($this->params->get('client_group', 0) == 0)
		{
			$query = $this->_db->getQuery(true);
			$query->select('a.id,a.name,a.email');
			$query->from('#__users AS a');
			$query->where('a.block = 0');
			$query->where('a.id NOT IN(SELECT id FROM #__myportal_users)');
	
			$this->_db->setQuery($query);
			$clients = $this->_db->loadObjectList();
		}
		else
		{*/
			//$group = $this->params->get('client_group');

			$query = $this->_db->getQuery(true);
			$query->select('id,title,description,fk_joomlog_version_id,fk_joomlog_type_id,published');
			$query->from('#__joomlog_log AS l');
			//$query->join('inner', '#__user_usergroup_map AS b ON b.user_id = a.id');
			//$query->where('b.group_id = ' . $group);
			//$query->where('a.block = 0');
			//$query->where('a.id NOT IN(SELECT id FROM #__myportal_users)');

			$this->_db->setQuery($query);
			$log = $this->_db->loadObjectList();
		/*}*/
		
		return $log;
	}
}