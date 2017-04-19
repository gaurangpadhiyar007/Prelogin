<?php
/**
* @category Extrembler
* @package Extrembler_PreLogin
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_PreLogin_Model_Session extends Mage_Core_Model_Session_Abstract
{
	/**
	* Creating Prelogin session
	*/
	public function __construct()
    {
        $namespace = 'prelogin';
        $namespace .= '_' . (Mage::app()->getStore()->getWebsite()->getCode());
        $this->init($namespace);
        Mage::dispatchEvent('prelogin_session_init', array('prelogin_session' => $this));
    }
}
