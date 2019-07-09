<?php

namespace Aht\News\Model;

class Contact extends \Magento\Framework\Model\AbstractModel 
{
	public function _construct()
	{
		$this->_init("Aht\News\Model\ResourceModel\Contact");
	}
}