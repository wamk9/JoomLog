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

JFormHelper::loadFieldClass('list');

class JFormFieldVersion extends JFormFieldList
{
  /**
   * The field type.
   *
   * @var         string
   */
  protected $type = 'Version';

  /**
   * Method to get a list of options for a list input.
   *
   * @return  array  An array of JHtml options.
   */
  protected function getOptions()
  {
    $db    = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('#__joomlog_version.id as id,version,createdDate');
    $query->from('#__joomlog_version');

    // Retrieve only published items
    //$query->where('#__joomlog_version.published = 1');
    
    $query->order('createdDate DESC');
    
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
