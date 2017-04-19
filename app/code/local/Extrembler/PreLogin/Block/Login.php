<?php
/**
* @category Extrembler
* @package Extrembler_PreLogin
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_PreLogin_Block_Login extends Mage_Core_Block_Template
{
	/**
	* Helper
	*/
	protected $_helper;
	
	public function _construct()
	{
		$this->_helper = Mage::helper('prelogin');
		parent::_construct();
	}

	/**
	* Preparing Layout for Pre Login form
	*/
	protected function _prepareLayout()
	{
		$this->getLayout()->getBlock('head')->setTitle($this->__($this->_helper->pageTitle()));
        $this->getLayout()->getBlock('root')->setTemplate('page/1column.phtml');
		$this->getLayout()->getBlock('head')->addCss('css/extrembler/prelogin/form.css');
		$this->getLayout()->getBlock('root')->unsetChild('header');
		$this->getLayout()->getBlock('root')->unsetChild('footer');
	    return parent::_prepareLayout();
	}

	/**
	* @return url
	*/
	protected function getLoginUrl()
	{
		return $this->getUrl('*/account/index');
	}

	/**
	* @return text
	*/
	protected function loginLabel()
	{
		return $this->_helper->getLabel();
	}
	
	/**
	* @return text
	*/
	protected function loginNotice()
	{
		return $this->_helper->getNotice();
	}

	/**
	* @return text
	*/
	protected function loginNoticePosition()
	{
		return $this->_helper->noticePosition();
	}

	/**
	* @return string | null
	*/
	protected function bgImage()
	{
		return $this->_helper->bgImagePath();
	}

	/**
	* @return string | null
	*/
	protected function extraStyleCss()
	{
		return $this->_helper->extraStyle();
	}
}