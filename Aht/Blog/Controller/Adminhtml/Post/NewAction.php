<?php

namespace Aht\Blog\Controller\Adminhtml\Post;

class NewAction extends \Aht\Blog\Controller\Adminhtml\Post
{
    public function execute()
    {
        $this->_forward('edit');
    }
}