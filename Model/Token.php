<?php
/**
 * @author  Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license  Open Software License (“OSL”) v. 3.0
 */

namespace Tigren\RestrictAccess\Model;
use Tigren\RestrictAccess\Api\Data\ResultTokenInterface;
use Magento\Framework\Model\AbstractModel;

class Token extends AbstractModel implements ResultTokenInterface
{
    protected function _construct()
    {
        $this->_init('Tigren\RestrictAccess\Model\ResourceModel\Token');
    }


    /**
     * @inheritDoc
     */
    public function getTokenValue()
    {
        return $this->getData(ResultTokenInterface::TOKEN_VALUE);
    }

    /**
     * @inheritDoc
     */
    public function setTokenValue($token)
    {
        $this->setData(self::TOKEN_VALUE, $token);
        return $this;
    }
}
