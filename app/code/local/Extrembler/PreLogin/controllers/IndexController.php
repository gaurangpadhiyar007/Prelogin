<?php
/**
* @category Extrembler
* @package Extrembler_PreLogin
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_PreLogin_IndexController extends Mage_Core_Controller_Front_Action
{

	protected $_helper;

	public function _construct()
	{
		$this->_helper = Mage::helper('prelogin');
	}
	
	/**
	* Intialize Form
	*/
	public function indexAction()
	{
        $this->loadLayout();
        $block = $this->getLayout()->createBlock(
			'prelogin/login','prelogin',array('template' => 'extrembler/prelogin/prelogin.phtml'));
        $this->getLayout()->getBlock('content')->append($block);
        // $this->_helper->unsetsession();
        $this->renderLayout();
	}
}