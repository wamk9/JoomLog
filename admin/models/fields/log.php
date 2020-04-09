<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 *
 * @since  0.0.1
 */
class JFormFieldLog extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Log';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__joomlog_log.id as id,'.
		'#__joomlog_log.title as title,'.
		'#__joomlog_log.description as description,'.
		'fk_joomlog_version_id,'.
		'fk_joomlog_type_id,'.
		'#__joomlog_type.title as logtype,'.
		'#__joomlog_version.version as version,'.
		'#__joomlog_log.published as published');
		$query->from('#__joomlog_log');
		$query->leftJoin('#__joomlog_version on fk_joomlog_version_id=#__joomlog_version.id');
		$query->leftJoin('#__joomlog_type on fk_joomlog_type_id=#__joomlog_type.id');
		// Retrieve only published items
		//$query->where('#__joomlog_version.published = 1');
		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
		$options  = array();

		if ($messages)
		{
			foreach ($messages as $message)
			{
				$options[] = JHtml::_('select.option', $message->id, $message->version.' ('.$message->createdDate.')');
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
