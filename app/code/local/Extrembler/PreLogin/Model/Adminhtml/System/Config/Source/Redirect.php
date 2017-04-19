<?php
/**
* @category Extrembler
* @package Extrembler_PreLogin
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_PreLogin_Model_Adminhtml_System_Config_Source_Redirect
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => '', 'label'=>Mage::helper('adminhtml')->__('Home Page')),
            array('value' => 'customer/account', 'label'=>Mage::helper('adminhtml')->__('Customer Login')),
            array('value' => 'checkout/cart', 'label'=>Mage::helper('adminhtml')->__('Cart Page')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            '' => Mage::helper('adminhtml')->__('Home Page'),
            'customer/account' => Mage::helper('adminhtml')->__('Customer Login'),
            'checkout/cart' => Mage::helper('adminhtml')->__('Cart Page'),
        );
    }

}