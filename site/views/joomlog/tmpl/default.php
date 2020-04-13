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

<style>
.my-joomlog-0
{
	margin-top: 0 !important;
	margin-bottom: 0 !important;
}

.ml-joomlog-2 { margin-left: .5rem !important; }
.ml-joomlog-4 { margin-left: 1.5rem !important; }
.ml-joomlog-5 { margin-left: 3rem !important; }

.joomlog-version { font-size: 1.75rem; }
.joomlog-logtype { font-size: 1.25rem; }
.joomlog-log { font-size: 1rem; }

hr.separator-joomlog 
{
	margin-top: 1rem;
	margin-bottom: 1rem;
}

#joomlog
{
	margin-top: 15px;
	margin-left: auto;
	margin-right: auto;
	max-width: 1000px;
	width: 100%;
	text-align: left;
}
</style>

<div id="joomlog">
<h1><?php echo JText::_('COM_JOOMLOG_FRONTEND_CHANGELOG_TITLE'); ?></h1>
<?php echo JText::_('COM_JOOMLOG_FRONTEND_CHANGELOG_DESC');; ?>

<?php
foreach($this->logType as $logType)
{
	$logType = get_object_vars($logType);
	
	echo '<p class="my-joomlog-0">'.$logType['title'].' - '.$logType['description'].'</p>';
}
?>

<hr>

<?php 
foreach($this->versions as $version)
{
	$version = get_object_vars($version);
	echo '<h2 class="ml-joomlog-2 joomlog-version">'.$version['version'].' ('.$version['createdDate'].')</h2>';
	
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
					echo '<h3 class="ml-joomlog-4 joomlog-logtype">'.$logType["title"].'</h3>'; 
					$logType['DisplayTitle'] = false;
				}
				echo '<p class="ml-joomlog-5 joomlog-log">'.$logs['title'].'</p>';
			}
		}
	}	
}
?>
</div>