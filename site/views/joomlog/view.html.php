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
 * HTML View class for the JoomLog Component
 *
 * @since  1.0
 */
class JoomLogViewJoomLog extends JViewLegacy
{
	/**
	 * Display the JoomLog view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		$this->versions = $this->get('Versions');
		$this->logType = $this->get('LogType');
		$this->logs = $this->get('Log');

		// Check for errors.
		if (!empty($this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

			return false;
		}

		// Display the view
		parent::display($tpl);
	}
	
	/*public function display($tpl = null) {		

		$id = JRequest::getVar('id', 0);
		$this->user = MyUser::getInstance();
		$this->folders = $this->get('Objects');
		$this->client = JFactory::getUser($id);
		$this->policy = MyClientPolicy::getInstance($id);

		$this->addResources();
	
		parent::display($tpl);
	}*/
	
	/*
	public function addResources() 
	{	
		JHtml::stylesheet('components/com_myportal/assets/skeleton.css');
		JHtml::stylesheet('components/com_myportal/assets/style.css');
	}
	*/
}