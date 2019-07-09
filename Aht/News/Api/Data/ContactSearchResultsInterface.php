<?php

namespace Aht\News\Api\Data;

interface ContactSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Post list.
     * @return \Aht\News\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Aht\News\Api\Data\PostInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
