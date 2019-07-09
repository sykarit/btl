<?php
namespace Aht\Featured\Controller\Adminhtml\Pro;

use Aht\Featured\Model\FeaturedPro as Contact;


class DeleteFPro extends \Magento\Backend\App\Action
{

    protected $resultPageFactory;
    protected $_featuredProFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Aht\Featured\Model\FeaturedProFactory $featuredProFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->_featuredProFactory = $featuredProFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $contact = $this->_featuredProFactory->create()->load($id);

        if(!$contact)
        {
            $this->messageManager->addError(__('Unable to process. please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/', array('_current' => true));
        }

        try{
            $contact->delete();
            $this->messageManager->addSuccess(__('Your featured product has been deleted !'));
        }
        catch(\Exception $e)
        {
            $this->messageManager->addError(__('Error while trying to delete featured product'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}