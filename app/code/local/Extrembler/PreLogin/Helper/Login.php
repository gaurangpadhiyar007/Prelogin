<?php
/**
* @category Extrembler
* @package  Extrembler_PreLogin
* @author   Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_PreLogin_Helper_Login extends Extrembler_PreLogin_Helper_Abstract
{
	/**
	* system configuration path for user 
	*/
	const XML_PATH_LOGIN_USER 		= 'prelogin/prelogin_login/user';

	/**
	* system configuration path for user password
	*/
	const XML_PATH_LOGIN_USER_PASS 	= 'prelogin/prelogin_login/password';
	
	protected $_errorMsg 	= array();

	protected $_successMsg 	= array();
	
	/**
	* System Configuration
	* @return bool
	*/
	public function loginC()
	{
		$storeId = $this->storeId();
		$credential = array('user' => Mage::getStoreConfig(self::XML_PATH_LOGIN_USER,$storeId), 'password' => Mage::getStoreConfig(self::XML_PATH_LOGIN_USER_PASS,$storeId));
		return $credential;
	}

	/**
	* Validating Pre login
	* @return bool
	*/
	public function validateLogin($post)
	{
		$flag = false;
		$validate = $this->isEmptyCheck($post);
		if($validate == false){
			$postUser = md5($post['username']);
	        $postPwd = Mage::helper('core')->encrypt($post['password']);

	        $loginC = $this->loginC();
	        
	        $user = md5($loginC['user']);
	        $password = $loginC['password'];
	        
	        if($user == $postUser && $password == $postPwd){
	        	$sessionActivate = $this->createSession();
	        	if($sessionActivate == true){
	        		$flag = true;
	        	}
	        	else{
	        		$this->_errorMsg[] = $this->__('Something is Wrong');
	        	}
	        }
	        else{
	        	$this->_errorMsg[] = $this->__('Invalid login or password.');
	        }
		}

		if(!empty($this->_errorMsg)){
			Mage::getSingleton('prelogin/session')->setErrorPreLogin($this->_errorMsg);
		}
		if(!empty($this->_successMsg)){
			Mage::getSingleton('prelogin/session')->setSuccessPreLogin($this->_successMsg);
		}
		return $flag;
	}

	/**
	* Validating Non empty data
	* @return bool
	*/
	protected function isEmptyCheck($post)
	{
		$error = false;
		$postUser = $post['username'];
		$postPwd = $post['password'];
		if($postUser == ''){
			$error = true;
			$this->_errorMsg[] = $this->__('User Name is Required');
		}
		if($postPwd == ''){
			$error = true;
			$this->_errorMsg[] = $this->__('Password is Required');	
		}
		return $error;
	}
}