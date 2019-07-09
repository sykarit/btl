<?php 
    namespace Aht\Blog\Block;
    class Index extends \Magento\Framework\View\Element\Template
    {
         private $postFactory;
        private $postRepository;
        public function __construct(
            \Magento\Framework\View\Element\Template\Context $content,
            \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
            \Aht\Blog\Model\PostFactory $postFactory,
            \Aht\Blog\Model\PostRepository $postRepository,
            array $data = []  
        )
        {
            $this->_productCollectionFactory = $productCollectionFactory;
            parent::__construct($content,$data);
            $this->postFactory = $postFactory;
            $this->postRepository = $postRepository;
        }
        public function getBlogInfo(){
            return __('AHT BLog module');
        }
        public function getPosts()
        {
            $collection = $this->postRepository->getList();
            // $collection = $post->getCollection();
            return $collection;
        }
        
        public function getProductCollection()
        {
            $collection = $this->_productCollectionFactory->create();
            $collection->addAttributeToSelect('*');
            return $collection;

        }
    }
?>
