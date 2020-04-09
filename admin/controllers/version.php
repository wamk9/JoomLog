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
 * HelloWorld Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_joomlog
 * @since       0.0.9
 */
class JoomlogControllerVersion extends JControllerForm
{
	public function getModel($name = 'Version', $prefix = 'JoomlogModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
	
	/*
	function add()
    {
        $msg = "Redirecting in add()";
        $this->setRedirect(JRoute::_('/helloworld/administrator/index.php?option=com_helloworld&view=helloworld&layout=edit&id=0'), $msg);
    }
    
    function edit()
    {
        $app = JFactory::getApplication();
        $input = $app->input;
        $id = $input->get('id', 0, 'int');
        if ($id == 0) 
        {
            $ids = $input->get('cid', array(), 'array');
            $id = $ids[0];
        }
        $msg = "Redirecting in edit() for id $id";
        $this->setRedirect(JRoute::_("/helloworld/administrator/index.php?option=com_helloworld&view=helloworld&layout=edit&id=$id"), $msg);
    }
    
    function save()
    {
        $app = JFactory::getApplication();
        $input = $app->input;
        $data = $input->get('robbie', array(), 'array');
        $greeting = $data['greeting'];
        $id = $data['id'];
        $model = $this->getModel();
        $model->saveit($data);

        JFactory::getApplication()->enqueueMessage("Saved greeting was $greeting for id $id");
        $this->setRedirect(JRoute::_('/helloworld/administrator/index.php?option=com_helloworld&view=helloworlds'), "saved ok");
    }
    
    function cancel()
    {
        $app = JFactory::getApplication();
        $input = $app->input;
        $data = $input->get('robbie', array(), 'array');
        $greeting = $data['greeting'];
        JFactory::getApplication()->enqueueMessage("Discarded greeting was $greeting");
        $this->setRedirect(JRoute::_('/helloworld/administrator/index.php?option=com_helloworld&view=helloworlds'), "operation cancelled");
    }
	*/
}
