<?php
/**
* @category Extrembler
* @package Extrembler_PreLogin
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_PreLogin_Helper_Data extends Extrembler_PreLogin_Helper_Abstract
{
	CONST XML_PATH_PRELOGIN_ENABLE		= 'prelogin/prelogin_enable/is_enable';

	CONST XML_PATH_PRELOGIN_PAGE_TITLE	= 'prelogin/prelogin_general/page_title';

	CONST XML_PATH_PRELOGIN_LABEL		= 'prelogin/prelogin_general/label';

	CONST XML_PATH_PRELOGIN_NOTICEE		= 'prelogin/prelogin_general/noticeenable';

	CONST XML_PATH_PRELOGIN_NOTICE_POS	= 'prelogin/prelogin_general/noticeposition';

	CONST XML_PATH_PRELOGIN_NOTICE		= 'prelogin/prelogin_general/notice';

	CONST XML_PATH_PRELOGIN_BGIMAGE		= 'prelogin/prelogin_general/backlogo';

	CONST XML_PATH_PRELOGIN_EXTRA_CSS	= 'prelogin/prelogin_general/stylecss';
	

	/**
	* Pre login Enable
	* @return bool
	*/
	public function isEnable()
	{
		$storeId = $this->storeId();
		return Mage::getStoreConfig(self::XML_PATH_PRELOGIN_ENABLE,$storeId);
	}

	/**
	* Pre login Form Page Title
	* @return bool
	*/
	public function pageTitle()
	{
		$storeId = $this->storeId();
		return Mage::getStoreConfig(self::XML_PATH_PRELOGIN_PAGE_TITLE,$storeId);
	}
	
	/**
	* Pre login Form Label
	* @return string
	*/
	public function getLabel()
	{
		$storeId = $this->storeId();
		return Mage::getStoreConfig(self::XML_PATH_PRELOGIN_LABEL,$storeId);
	}

	/**
	* Pre login Form Notice
	* @return string | string with html
	*/
	public function getNotice()
	{
		$noticeEnable = $this->noticeEnable();
		$notice = '';
		if($noticeEnable == true){
			$storeId = $this->storeId();
			$notice = Mage::getStoreConfig(self::XML_PATH_PRELOGIN_NOTICE,$storeId);
		}
		return $notice;
	}

	/**
	* Pre login Form Notice Enable
	* @return bool
	*/
	protected function noticeEnable()
	{
		$storeId = $this->storeId();
		return Mage::getStoreConfig(self::XML_PATH_PRELOGIN_NOTICEE,$storeId);
	}

	/**
	* Pre login Form Notice Position
	* @return bool
	*/
	public function noticePosition()
	{
		$storeId = $this->storeId();
		return Mage::getStoreConfig(self::XML_PATH_PRELOGIN_NOTICE_POS,$storeId);
	}

	/**
	* Pre login bg Image Path
	* @return string | null
	*/
	public function bgImagePath()
	{
		$storeId = $this->storeId();
		$imagePath = null;
		$imagePath = Mage::getStoreConfig(self::XML_PATH_PRELOGIN_BGIMAGE,$storeId);
		if($imagePath != '')
			return Mage::getBaseUrl('media').'theme'.DS.$imagePath;
		return $imagePath;
	}

	/**
	* Pre login Form Extra Css
	* @return string | null
	*/
	public function extraStyle()
	{
		$storeId = $this->storeId();
		return strip_tags(Mage::getStoreConfig(self::XML_PATH_PRELOGIN_EXTRA_CSS,$storeId));
	}
}