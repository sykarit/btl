<?php

namespace AhtBlog\Model\ResourceModel;

class DataExample extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	public function _construct()
	{
		$this->_init('aht_blog_post','post_id');
	}

}