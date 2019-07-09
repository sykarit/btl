<?php
namespace Aht\Featured\Model\ResourceModel\FeaturedPro;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Aht\Featured\Model\FeaturedPro', 'Aht\Featured\Model\ResourceModel\FeaturedPro');
	}
}