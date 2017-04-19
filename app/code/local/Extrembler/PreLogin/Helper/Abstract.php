<?php
/**
* @category Extrembler
* @package Extrembler_PreLogin
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
abstract class Extrembler_PreLogin_Helper_Abstract extends Mage_Core_Helper_Abstract
{	
	/**
	* system configuration path for login success
	*/
	const XML_PATH_LOGIN_SUCCESS = 'prelogin/prelogin_redirect/prelogin_redirect_url';

	/**
	* Current Store Id
	* @return int
	*/
	protected function storeId()
	{
		return Mage::app()->getStore()->getId();
	}

	/**
	* Generate Session
	* @return bool
	*/
	public function createSession()
	{
		Mage::getSingleton('prelogin/session')->setSuccessLogin(true);
		$existsession = $this->checkSession();
		return $existsession;
	}

	/**
	* Check session exist or not
	* @return bool
	*/
	public function checkSession()
	{
		$isExist = Mage::getSingleton('prelogin/session')->getSuccessLogin();
		return $isExist;
	}

	/**
	* Destroy session
	*/
	public function unsetsession()
	{
		Mage::getSingleton('prelogin/session')->unsSuccessLogin();
	}

	/**
	* Re-Direct after successful login 
	*/
	public function rediectTo()
	{
		$storeId = $this->storeId();
		return Mage::getStoreConfig(self::XML_PATH_LOGIN_SUCCESS,$storeId);
	}
}