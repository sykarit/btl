<?php

namespace Aht\Featured\Model;

class FeaturedPro extends \Magento\Framework\Model\AbstractModel 
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	
	public function _construct()
	{
		$this->_init("Aht\Featured\Model\ResourceModel\FeaturedPro");
	}
	public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
	}
	public function getAvailableIsFeatured()
    {
        return [self::STATUS_ENABLED => __('Yes'), self::STATUS_DISABLED => __('No')];
    }
}