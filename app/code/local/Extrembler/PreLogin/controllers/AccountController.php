<?php
/**
* @category Extrembler
* @package Extrembler_PreLogin
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_PreLogin_AccountController extends Mage_Core_Controller_Front_Action
{
	/**
	* Login Validation
	*/
	public function indexAction()
	{
     	if (!$this->_validateFormKey()) {
            $this->_redirect('prelogin/index');
            return;
        }
        
        if ($this->getRequest()->isPost()) {        	
        	$login = $this->getRequest()->getPost('prelogin');
        	$_helper = Mage::helper('prelogin/login');

        	$validate = $_helper->validateLogin($login);

        	if($validate == true){
                // $url = Mage::getSingleton('core/session')->getUri();
                Mage::getSingleton('core/session')->addSuccess($this->__('Login Successfully'));
                $this->_redirect($_helper->rediectTo());
            }
            else{
                $_errorMsgs = Mage::getSingleton('prelogin/session')->getErrorPreLogin();
                if(is_array($_errorMsgs) && !empty($_errorMsgs)){
                    foreach ($_errorMsgs as $_error) {
                        Mage::getSingleton('core/session')->addError($this->__($_error));
                    }
                    Mage::getSingleton('prelogin/session')->unsErrorPreLogin();
                }
	        	$this->_redirect('prelogin/index');
        	}
        }
        else{
        	Mage::getSingleton('core/session')->addError($this->__('Error while Login'));
        	$this->_redirect('prelogin/index');
        }
	}
}