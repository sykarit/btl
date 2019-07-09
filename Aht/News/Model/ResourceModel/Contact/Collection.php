<?php
namespace Aht\News\Model\ResourceModel\Contact;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

	protected function _construct()
	{
		$this->_init('Aht\News\Model\Contact', 'Aht\News\Model\ResourceModel\Contact');
	}
}