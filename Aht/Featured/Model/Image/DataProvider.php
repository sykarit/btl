<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aht\Featured\Model\Image;

use Aht\Featured\Model\ResourceModel\FeaturedPro\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Framework\ObjectManagerInterface;

/**
 * Class DataProvider
 */
class DataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
	/**
	 * @var \Magento\Cms\Model\ResourceModel\Block\Collection
	 */
	protected $collection;

	protected $_objectManager;

	/**
	 * @var DataPersistorInterface
	 */
	protected $dataPersistor;

	/**
	 * @var array
	 */
	protected $_loadedData;

	/**
	 * Constructor
	 *
	 * @param string $name
	 * @param string $primaryFieldName
	 * @param string $requestFieldName
	 * @param CollectionFactory $blockCollectionFactory
	 * @param DataPersistorInterface $dataPersistor
	 * @param array $meta
	 * @param array $data
	 * @param PoolInterface|null $pool
	 */
	public function __construct(
		$name,
		$primaryFieldName,
		$requestFieldName,
		CollectionFactory $fProCollectionFactory,
		DataPersistorInterface $dataPersistor,
		ObjectManagerInterface $objectManager,
		array $meta = [],
		array $data = [],
		PoolInterface $pool = null
	)
	{
		$this->_objectManager = $objectManager;
		$this->collection = $fProCollectionFactory->create();
		$this->dataPersistor = $dataPersistor;
		parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
	}

	/**
	 * Get data
	 *
	 * @return array
	 */
	public function getBaseURLMedia()
	{
		$media = $this->_objectManager->get("Magento\Store\Model\StoreManagerInterface")
			->getStore()
			->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
		return $media;
	}

	// trả về dữ liệu khi muốn update
	public function getData()
	{
		if (isset($this->_loadedData)) {
			return $this->_loadedData;
		}
		$urlMedia = $this->getBaseUrlMedia(); // lấy link tới hình ảnh
		$link = $urlMedia . "test/tmp";

		$items = $this->collection->getItems(); 

		foreach ($items as $brand) {
			$brandData = $brand->getData();
			$brand_img = $brandData['image'];
			unset($brandData['image']);
			$brandData['image'][0]['name'] = $brand_img;
			$brandData['image'][0]['url'] = $link . "/" . $brand_img;
			$this->_loadedData[$brandData['id']] = $brandData;
		}
		return $this->_loadedData;
	}
}
