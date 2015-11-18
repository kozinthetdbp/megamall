<?php
class JoomlArt_JmProductsSlider_Helper_Data extends Mage_Core_Helper_Abstract {
	protected $defaultStoreCode = null;
	protected $activeStoreCode = null;

	public function __construct()
	{
		//initial default store code
		$this->defaultStoreCode = Mage::app()->getWebsite(true)->getDefaultStore()->getCode();

		//initial current store code
		if(isset($_GET["___store"])){
			$this->activeStoreCode = $_GET["___store"];
		}
	}

	public function get($var, $attributes)
	{
		$value = null;
		if(isset($attributes[$var])){
			$value = $attributes[$var];
		}else{
			$storeCode = ($this->activeStoreCode) ? $this->activeStoreCode : $this->defaultStoreCode;
			$configGroups = Mage::getStoreConfig("joomlart_jmproductsslider", $storeCode);
			foreach($configGroups as $configs){
				if(isset($configs[$var])){
					$value = $configs[$var];
					break;
				}
			}
		}

		return $value;
	}
}
