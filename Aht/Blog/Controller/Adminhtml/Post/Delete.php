<?php

namespace Aht\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Aht\Blog\Model\PostFactory;

class Delete extends \Magento\Backend\App\Action
{
	protected $_pageFactory;
	protected $_postFactory;

	public function __construct(
		Context $context,
		PostFactory $postFactory,
		PageFactory $pageFactory)
	{
		$this->_postFactory = $postFactory;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$id = $this->getRequest()->getParam('id');
		if (isset($id)) {
			var_dump($id);die;
			$model = $this->_postFactory->create();
			$model->load($id)->delete();
			$this->messageManager->addSuccess(__('Xóa thành công'));
			return $this->_redirect('blog/post/index');
		}
	}
}