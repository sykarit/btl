<?php
namespace Aht\News\Controller\Adminhtml\Index;

use Blog\Post\Model\Contact as Contact;


class DeleteContact extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $_contactFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Aht\News\Model\ContactFactory $contactFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->_contactFactory = $contactFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $contact = $this->_contactFactory->create()->load($id);

        if(!$contact)
        {
            $this->messageManager->addError(__('Unable to process. please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/', array('_current' => true));
        }

        try{
            $contact->delete();
            $this->messageManager->addSuccess(__('Your contact has been deleted !'));
        }
        catch(\Exception $e)
        {
            $this->messageManager->addError(__('Error while trying to delete contact'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}