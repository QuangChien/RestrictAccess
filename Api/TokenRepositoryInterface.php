<?php
/**
 * @author  Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license  Open Software License (“OSL”) v. 3.0
 */

namespace Tigren\RestrictAccess\Api;
use Magento\Framework\Api\SearchCriteriaInterface;
use Tigren\RestrictAccess\Api\Data\ResultTokenInterface;
use Tigren\RestrictAccess\Api\Data\ResultUrlInterface;

interface TokenRepositoryInterface
{
    /**
     * @param string $value
     * @return ResultTokenInterface
     */
    public function getByTokenValue($value);

    /**
     * @param string $value
     * @return array
     */
    public function deleteByTokenValue($value);

    /**
     * @return ResultTokenInterface[]
     */
    public function getList();
}
