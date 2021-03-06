<?php

/**
 * @package		Joomla
 * @subpackage	Fabik
 * @copyright	Copyright (C) 2005 - 2008 Pollen 8 Design Ltd. All rights reserved.
 * @license		GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport('joomla.application.component.view');

class FabrikViewElement extends JView{

	var $_id 				= null;
	var $_isMambot 	= null;

	function setId($id)
	{
		$this->_id = $id;
	}

	/**
	 * display the template
	 *
	 * @param sting $tpl
	 */

	function display($tpl = null)
	{
		$element = JRequest::getVar('element');
		$elementid = JRequest::getVar('elid');
		$pluginManager =& JModel::getInstance('Pluginmanager', 'FabrikModel');
		$className = JRequest::getVar('plugin');
		$plugin =& $pluginManager->getPlugIn($className, 'element');
		if (JError::isError($plugin)) {
			JError::handleMessage($plugin);
			return;
		}
		$plugin->setId($elementid);
		$data = array();
		$repeatCounter = 0;
		$groupModel =& $plugin->getGroup();
		$plugin->formJavascriptClass();
		$html = '<script>';
		$html .= $plugin->elementJavascript($repeatCounter);
		$html .= '</script>';
		$html .= $plugin->_getElement($data, $repeatCounter, $groupModel);
		echo $html;
	}

}
?>