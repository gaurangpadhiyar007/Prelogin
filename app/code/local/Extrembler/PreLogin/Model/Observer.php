<?php
/**
* @category Extrembler
* @package Extrembler_PreLogin
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_PreLogin_Model_Observer
{
	const MODULE = 'Extrembler_PreLogin';

	/**
	* Init Observer for to check pre login
	* and Redirection
	*/
	public function init(Varien_Event_Observer $observer)
	{
		$_helper = Mage::helper('prelogin');
		$enable = $_helper->isEnable();
		
		if($enable == true){
			$request = Mage::app()->getRequest();
			$module = $request->getControllerModule();
        	
			// If Last Request is current module do not save last server request for redirect
			// if($module != self::MODULE){
			// 	$lastRequestUri = Mage::helper('core/url')->getCurrentUrl();
			// 	Mage::getSingleton('core/session')->setUri($lastRequestUri);
			// }
            $response = Mage::app()->getResponse();
            
			$session = $_helper->checkSession();
			
			$hasError = Mage::getSingleton('prelogin/session')->getErrorPreLogin();
					
			$hasSuccess = Mage::getSingleton('prelogin/session')->getSuccessPreLogin();
			
			if(!empty($hasError)){
				foreach ($hasError as $error) {
					Mage::getSingleton('core/session')->addError($error);
				}
				Mage::getSingleton('prelogin/session')->unsErrorPreLogin();
			}
			if(!empty($hasSuccess)){
				foreach ($hasSuccess as $success) {
					Mage::getSingleton('core/session')->addSuccess($success);
				}
				Mage::getSingleton('prelogin/session')->unsSuccessPreLogin();
			}
			if($session == false){
				if($module != self::MODULE){
            		$response->setRedirect(Mage::getUrl('prelogin/index'));
            		$response->sendResponse();
				}
			}
			else{
				if($module == self::MODULE){
					$response->setRedirect(Mage::getSingleton('core/session')->getUri());
    				$response->sendResponse();
				}
			}
			return $response;
		}
	}
}