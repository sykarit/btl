<?php
namespace Aht\Blog\Block;
class Create extends \Magento\Framework\View\Element\Template
{
	private $postFactory;
	private $postRepository;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Aht\Blog\Model\PostFactory $postFactory, \Aht\Blog\Model\PostRepository $postRepository)
	{
		parent::__construct($context);
		$this->postFactory = $postFactory;
		$this->postRepository = $postRepository;
	}
}