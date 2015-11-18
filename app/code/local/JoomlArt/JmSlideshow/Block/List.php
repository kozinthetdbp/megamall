<?php
/*------------------------------------------------------------------------
# $JA#PRODUCT_NAME$ - Version $JA#VERSION$ - Licence Owner $JA#OWNER$
# ------------------------------------------------------------------------
# Copyright (C) 2004-2009 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: J.O.O.M Solutions Co., Ltd
# Websites: http://www.joomlart.com - http://www.joomlancers.com
# This file may not be redistributed in whole or significant part.
-------------------------------------------------------------------------*/

class JoomlArt_JmSlideshow_Block_List extends Mage_Catalog_Block_Product_Abstract
{
    protected $_configs = array();

	public function __construct($attributes = array())
	{
        $helper = Mage::helper('joomlart_jmslideshow/data');

        //Handle configs value from configs or static block call line.
        foreach($helper::$_params as $paramKey){
            $this->_configs[$paramKey] = $helper->get($paramKey, $attributes);
        }

        //Check enabled sideshow
        if(!$this->_configs['show'])
            return;

		parent::__construct();
	}
	
//	protected function _prepareLayout()
//	{
//		if ($this->_configs['show']) {
//			$headBlock = $this->getLayout()->getBlock('head');
//            if($headBlock){
//                //Add jquery-ui
//                if ($this->_configs['animation'] == 'vrtaccordion' || $this->_configs['animation'] == 'hrzaccordion') {
//
//                    $headBlock->addItem('js_css', 'joomlart/lib/jquery-ui/jquery-ui.min.css');
//                    $headBlock->addItem('js', 'joomlart/lib/jquery-ui/js/jquery-ui.min.js');
//
//                    if ($this->_configs['animation'] == 'hrzaccordion') {
//                        $headBlock->addItem('js_css', 'joomlart/lib/jquery-ui/jquery.hrzAccordion.defaults.css');
//                        $headBlock->addItem('js', 'joomlart/lib/jquery-ui/js/jquery.hrzAccordion.js');
//                    }
//                }
//            }
//		}
//
//		return parent::_prepareLayout();
//	}

    protected function _beforeToHtml()
    {
        if (!$this->_configs['show'])
            return;

        //Handle data from call line in xml (custom design)
        foreach ($this->_configs as $key => $value){
            $data = $this->getData($key);
            if ($data){
                $this->_configs[$key] = $data;
            }
        }

        $detect = Mage::helper ( 'joomlart_jmslideshow/mobiledetect' );

        if($detect->isTablet()){
            if($this->_configs["mainWidthtablet"])
                $this->_configs["mainWidth"] =  $this->_configs["mainWidthtablet"];
        }
        else if($detect->isMobile()){
            if($this->_configs["mainWidthmobile"])
                $this->_configs["mainWidth"] =  $this->_configs["mainWidthmobile"];
        }

        return parent::_beforeToHtml();
    }
	
	/**
	 * Rendering block content
	 *
	 * @return string
	 */
	protected function _toHtml()
	{
        if (!$this->_configs['show'])
            return;

		//Check the animation used?
		if ($this->_configs['animation'] == 'vrtaccordion' || $this->_configs['animation'] == 'hrzaccordion') {
			$this->_configs['template'] = 'joomlart/jmslideshow/accordion.phtml';
		} else {
			$this->_configs['template'] = 'joomlart/jmslideshow/basic.phtml';
		}
        $this->setTemplate($this->_configs['template']);

        //Get slide data
        $helper = Mage::helper('joomlart_jmslideshow/data');
        $slideData = $helper->getSlideShowData($this->_configs);

		//Assign data to template
		$this->assign('config', $this->_configs);
        $this->assign('items', $slideData['items']);
        $this->assign('titles', $slideData['titles']);
        $this->assign('urls', $slideData['urls']);
        $this->assign('targets', $slideData['targets']);

        return parent::_toHtml();
	}

}
