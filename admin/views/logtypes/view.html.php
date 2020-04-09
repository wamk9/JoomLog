<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_joomlog
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Logs View
 *
 * @since  1.0
 */
class JoomLogViewLogTypes extends JViewLegacy
{
	/**
	 * Display the Log Types view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Get application
		$app = JFactory::getApplication();
		$context = "joomlog.list.admin.logtypes";
		
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'logs', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm    	= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Set the submenu
		JoomlogHelper::addSubmenu('logtypes');
		
		// Set the toolbar and number of found items
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	
		// Set the document
		//$this->setDocument();
	}
	
	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function addToolBar()
	{
		$title = JText::_('COM_JOOMLOG_MANAGER_LOGTYPES');

		if ($this->pagination->total)
		{
			$title .= " <span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}
		
		JToolbarHelper::title($title, 'logtype');
		//JToolbarHelper::addNew('logtype.add');
		JToolbarHelper::editList('logtype.edit');
		//JToolbarHelper::deleteList('Are you really, really sure?', 'logtypes.delete');
        //JToolbarHelper::publishList('logtypes.publish');
        //JToolbarHelper::unpublishList('logtypes.unpublish');

	}
	
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JOOMLOG_ADMINISTRATION'));
	}
}