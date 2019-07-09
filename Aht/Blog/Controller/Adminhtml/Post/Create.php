<?php
namespace Aht\Blog\Controller\Adminhtml\Index;

class Create extends \Magento\Backend\App\Action
{
	protected $_pageFactory;

	protected $_postFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Aht\Blog\Model\PostFactory $postFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_postFactory = $postFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		return $this->_pageFactory->create();
	}
}