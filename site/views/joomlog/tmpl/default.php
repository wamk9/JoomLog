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
?>

<h1>Changelog</h1>
<?php 
foreach($this->versions as $version)
{
	$version = get_object_vars($version);
	echo '<h2 class="ml-2 h3">'.$version['version'].' ('.$version['createdDate'].')</h2>';
	
	foreach($this->logType as $logType)
	{
		$logType = get_object_vars($logType);
		$logType['DisplayTitle'] = true;
		
		foreach($this->logs as $logs)
		{
			$logs = get_object_vars($logs);
			if($logs['fk_joomlog_version_id'] == $version['id'] && 
			   $logs['fk_joomlog_type_id'] == $logType['id'])
			{
				if($logType['DisplayTitle'])
				{ 
					echo '<h2 class="ml-4 h5">'.$logType["title"].'</h2>'; 
					$logType['DisplayTitle'] = false;
				}
				echo '<p class="ml-5 h6">'.$logs['title'].'</p>';
			}
		}
	}	
}
?>