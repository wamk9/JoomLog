<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_joomlog
 *
 * @copyright   Copyright (C) 2020 Startproj - Solucoes Digitais. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Hello Table class
 *
 * @since  1.0
 */
class JoomlogTableLogType extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  A database connector object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__joomlog_type', 'id', $db);
	}
}