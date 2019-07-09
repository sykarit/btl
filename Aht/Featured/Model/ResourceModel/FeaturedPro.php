<?php
namespace Aht\Featured\Model\ResourceModel;
class FeaturedPro extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('aht_featured_pro', 'id'); // table name vs khoá chính
	}
}