<?php

namespace Aht\Blog\Model\ResourceModel\DataExample;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	public function _construct()
	{
		$this->_init(" Aht\Blog\Model\DataExample", "Aht\Blog\Model\ResourceModel\DataExample");
	}
}