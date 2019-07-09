<?php
namespace Aht\Blog\Block\Adminhtml;

use Magento\Backend\Block\Widget\Form\Container;

Class Edit extends Container
{
	protected function _construct()
	{
		//var_dump('in Block/Adimhtml/Edit');die;
		// chỉ ra đường dẫn tới file edit nơi tạo ra form.
		$this->_blockGroup = "Aht_Blog";
		$this->_controller = "adminhtml"; // name folder chứa blog ???
		$this->_mode = 'Edit';
		parent::_construct();
	}
}