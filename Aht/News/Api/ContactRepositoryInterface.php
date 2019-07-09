<?php
namespace Aht\News\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ContactRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \Aht\News\Api\Data\ContactInterface $Contact
     * @return \Aht\News\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Aht\News\Api\Data\ContactInterface $Contact);

    /**
     * Retrieve Post.
     *
     * @param int $ContactId
     * @return \Aht\News\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($ContactId);

    /**
     * Retrieve Posts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Aht\News\Api\Data\PostSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Post.
     *
     * @param \Aht\News\Api\Data\ContactInterface $Contact
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Aht\News\Api\Data\ContactInterface $Contact);

    /**
     * Delete Post by ID.
     *
     * @param int $ContactId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ContactId);
}