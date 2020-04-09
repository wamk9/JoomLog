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
 * Versions Controller
 *
 * @since  0.0.1
 */
class JoomlogControllerVersions extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  object  The model.
	 *
	 * @since   1.6
	 */
	public function getModel($name = 'Version', $prefix = 'JoomlogModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	/*public function delete()
	{
		$input = JFactory::getApplication()->input;
		$items = $input->get('cid', array(), 'array');
		$numberItems = $input->get('boxchecked', 0, 'int');
		
		$model = $this->getModel('Version','JoomlogModel');
		$model->delete($items);
		
		$msg = "$numberItems item(s) deleted!";
		JFactory::getApplication()->enqueueMessage($msg);
		
		$this->setRedirect(JRoute::_('index.php?option=com_joomlog&view=versions', $msg));
	}*/
}