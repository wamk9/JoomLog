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
 * Versions View
 *
 * @since  1.0
 */
class JoomLogViewPanel extends JViewLegacy
{
	/**
	 * Display the Panel view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Check for errors.
		if (!empty($this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Set the submenu
		JoomlogHelper::addSubmenu('panel');
		
		// Set the toolbar and number of found items
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
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
		JToolbarHelper::title(JText::_('COM_JOOMLOG_MANAGER_PANEL'), 'panel');
	}

}