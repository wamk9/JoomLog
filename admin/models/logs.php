<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * LogsList Model
 *
 * @since  0.0.1
 */
class JoomlogModelLogs extends JModelList
{
	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @see     JController
	 * @since   1.6
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id',
				'title',
				'createdDate',
				'published'
			);
		}

		parent::__construct($config);
	}

	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the base select statement.
		/*$query->select('*')
			  ->from($db->quoteName('#__joomlog_log'));*/
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

		// Filter: like / search
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('title LIKE ' . $like);
		}

		// Filter by published state
		/*$published = $this->getState('filter.published');

		if (is_numeric($published))
		{
			$query->where('published = ' . (int) $published);
		}
		elseif ($published === '')
		{
			$query->where('(published IN (0, 1))');
		}*/

		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'title');
		$orderDirn 	= $this->state->get('list.direction', 'asc');

		$query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));

		return $query;
	}

}