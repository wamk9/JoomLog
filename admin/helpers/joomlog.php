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
 * Joomlog component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.0
 */
abstract class JoomlogHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_JOOMLOG_MENU_PANEL'),
			'index.php?option=com_joomlog',
			$submenu == 'messages'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_JOOMLOG_MENU_VERSIONS'),
			'index.php?option=com_joomlog&view=versions',
			$submenu == 'messages'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_JOOMLOG_MENU_LOGTYPES'),
			'index.php?option=com_joomlog&view=logtypes',
			$submenu == 'messages'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_JOOMLOG_MENU_LOGS'),
			'index.php?option=com_joomlog&view=logs',
			$submenu == 'messages'
		);

		// set some global property
		/*$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-helloworld ' .
										'{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION_CATEGORIES'));
		}*/
	}
}
