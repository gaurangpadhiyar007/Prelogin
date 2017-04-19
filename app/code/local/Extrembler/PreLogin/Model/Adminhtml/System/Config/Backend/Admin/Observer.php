<?php 
/**
* @category Extrembler
* @package Extrembler_PreLogin
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_PreLogin_Model_Adminhtml_System_Config_Backend_Admin_Observer
{
	/**
	* Save configuration with encryption
	*/
	public function saveConfig($observer)
	{
		$_helper = Mage::helper('prelogin/login');
		$userConfig = Extrembler_PreLogin_Helper_Login::XML_PATH_LOGIN_USER;
		$passConfig = Extrembler_PreLogin_Helper_Login::XML_PATH_LOGIN_USER_PASS;
        $loginC = $_helper->loginC();
        $data = $observer->getEvent()->getData();
        $scope = $data['store'];
        if($scope == ''){
			$scope = 'default';
        }
        $store = Mage::getModel('core/store')->load($scope);
        $scopeId = $store->getId();
		$store = Mage::getModel('core/store')->load($storeCode);
        // Mage::getConfig()->saveConfig($userConfig, md5($loginC['user']), 'default', 0);
        Mage::getConfig()->saveConfig($userConfig, $loginC['user'], $scope, $scopeId);
        Mage::getConfig()->saveConfig($passConfig, md5($loginC['password']), $scope, $scopeId);
	}	
}