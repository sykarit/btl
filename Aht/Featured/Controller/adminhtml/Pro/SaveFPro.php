<?php
namespace Aht\Featured\Controller\Adminhtml\Pro;

class SaveFPro extends \Magento\Backend\App\Action
{

    protected $resultPageFactory;
    protected $featuredProFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Aht\Featured\Model\FeaturedProFactory $featuredProFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->featuredProFactory = $featuredProFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if($data)
        {
            try{
                $id = $data['id'];

                $contact = $this->featuredProFactory->create()->load($id);

                $data = array_filter($data, function($value) {return $value !== ''; });
                
                $contact->setData($data);
                if(isset($data['image'][0])){
                    $contact->setImage($data['image'][0]['name']); //sử lý ảnh 
                }
                $contact->save();
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/*/');
            }
            catch(\Exception $d)
            {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/editfpro', ['id' => $contact->getId()]);
            }
        }

         return $resultRedirect->setPath('*/*/');
    }
}