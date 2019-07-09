<?php

namespace Aht\Blog\Block\Adminhtml\Edit;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Aht\Blog\Model\PostFactory;

class Form extends Generic
{
	public function __construct(
		Context $context,
		Registry $registry,
		FormFactory $formFactory,
		PostFactory $postFactory,
		array $data)
	{
		$this->_postFactory = $postFactory;
		parent::__construct($context, $registry, $formFactory, $data);
	}
	public function _prepareForm()
	{
		//var_dump('vào form');die;
		$model = $this->_postFactory->create();
		$id = $this->getRequest()->getParam('id');
		$infoPost = $model->load($id)->getData(); 
		$a = true;
		if (@$infoPost['status'] == 1) {
			$a = true;
		} else {
			$a = false;
		}

		// _formFactory ở trong cái Magento\Backend\Block\Widget\Form\Generic dùng cái kia
		// để tạo form.
		$form = $this->_formFactory->create(
			[
				"data" => [
					"id" => "edit_form",
					"action" => $this->getUrl("blog/post/save"),
					"method" => "post",
					"enctype" => "multipart/form-data"
				]
			]
		);
		$fieldset = $form->addFieldset(
			"base_fieldset",
			["legend" => __("Edit")]
		);
		if(!empty($infoPost['post_id'])){
			//var_dump($infoPost['post_id']);die;
			$fieldset->addField(
				"id",
				"hidden",
				[
					"name" => "post_id",
					"label" => __("id Post"),
					"value" => $infoPost['post_id'],
					"required" => true,
				]
			);

		}
		$fieldset->addField(
			"Name Post",
			"text",
			[
				"name" => "name",
				"label" => __("Name Post"),
				"value" => isset($infoPost['name'])?$infoPost['name']:'',
				"required" => true,
			]
		);
		$fieldset->addField(
			"Url",
			"text",
			[
				"name" => "url_key",
				"label" => __("Url key"),
				"value" => isset($infoPost['url_key'])?$infoPost['url_key']:'',
				"required" => true,
			]
		);
		$fieldset->addField(
			"status",
			"checkbox",
			[
				"name" => "status",
				"label" => __("Status"),
				"value" => isset($infoPost['status'])?(int)$infoPost['status']:0,
				"checked" => $a,
			]
		);

		$form->setUseContainer(true);
		$this->setForm($form);
		return parent::_prepareForm();
	}
}