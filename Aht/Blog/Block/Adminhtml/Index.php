<?php 
    namespace Aht\Blog\Block\Adminhtml;
    class Index extends \Magento\Framework\View\Element\Template
    {
        public function __construct(\Magento\Framework\View\Element\Template\Context $content)
        {
            parent::__construct($content);
        }
        public function getBlogAdInfo(){
            return __('AHT BLog Ad module');
        }
        public function getPosts(){
            $post = $this->_pageFactory->create();
            $collection = $post->getCollection();
            return $collection;
        }
    }
    
?>