<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_joomlog
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Version Model
 *
 * @since  1.0
 */
class JoomlogModelLogType extends JModelAdmin
{
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
	public function getTable($type = 'LogType', $prefix = 'JoomlogTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.0
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_joomlog.logtype',
			'logtype',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}
	/**
	 * Method to get the script that have to be included on the form
	 *
	 * @return string	Script files
	 */
	public function getScript() 
	{
		return 'administrator/components/com_joomlog/models/forms/joomlog.js';
	}
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.0
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_joomlog.edit.logtypes.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}
	
	function saveit($data)
    {
        //$id = $data['id'];
        //$greeting = $data['greeting']; 
        
        //JFactory::getApplication()->enqueueMessage("In saveit() with id $id and greeting $greeting");
        
        $table = $this->getTable('LogType', 'JoomlogTable');
        $table->bind($data);
        /*JFactory::getApplication()->enqueueMessage("saveit id is " . $table->id);*/
        //JFactory::getApplication()->enqueueMessage("saveit greeting is " . $table->greeting);
        $table->store();
        
		/*
        if ((isset($id) && ($id != 0)))   // id already set - record must already exist
        {
            $table->load($id);
            $table->greeting = $greeting;
            $table->store();
        }
        else
        {
            $table->greeting = $greeting;
            $table->store();
        }
        */
    }
}
