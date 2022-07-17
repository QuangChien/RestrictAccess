<?php
/**
 * @author  Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license  Open Software License (“OSL”) v. 3.0
 */
namespace Tigren\RestrictAccess\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Tigren\RestrictAccess\Api\Data\ResultTokenInterface;
use Tigren\RestrictAccess\Model\ResourceModel\Token\CollectionFactory;
use Tigren\RestrictAccess\Model\ResourceModel\Token;
use Tigren\RestrictAccess\Model\TokenFactory;
use Magento\Framework\Api\SortOrder;
use Tigren\RestrictAccess\Api\TokenRepositoryInterface;

/**
 * Class CustomManagement
 * @package ViMagento\CustomApi\Model
 */
class TokenRepository implements TokenRepositoryInterface
{
    /**
     * @var TokenFactory
     */
    protected $tokenFactory;

    /**
     * @var ResourceModel\Token
     */
    protected $tokenResource;

    /**
     * @var ResourceModel\Token\CollectionFactory
     */
    protected $collectionFactory;


    public function __construct(
        TokenFactory                 $tokenFactory,
        Token                        $tokenResource,
        CollectionFactory            $collectionFactory
    )
    {
        $this->tokenFactory = $tokenFactory;
        $this->tokenResource = $tokenResource;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getByTokenValue($value)
    {
        $tokenModel = $this->tokenFactory->create();
        $this->tokenResource->load($tokenModel, $value, 'token_value');
        return $tokenModel;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteByTokenValue($value)
    {
        try {
            $tokenModel = $this->tokenFactory->create();
            $this->tokenResource->load($tokenModel, $value, 'token_value');
            $this->tokenResource->delete($tokenModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: ' . $exception->getMessage())
            );
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getList()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getData();
    }
}
