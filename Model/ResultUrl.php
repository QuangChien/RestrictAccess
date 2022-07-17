<?php
/**
 * @author  Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license  Open Software License (“OSL”) v. 3.0
 */

namespace Tigren\RestrictAccess\Model;

use Tigren\RestrictAccess\Api\Data\ResultUrlInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class ResultUrl extends AbstractExtensibleModel implements ResultUrlInterface
{

    /**
     * @inheritDoc
     */
    public function getUrl()
    {
        return $this->_getData(ResultUrlInterface::URL);
    }

    /**
     * @inheritDoc
     */
    public function setUrl($url)
    {
        $this->setData(ResultUrlInterface::URL, $url);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return $this->_getData(ResultUrlInterface::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status)
    {
        $this->setData(ResultUrlInterface::STATUS, $status);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getMessage()
    {
        return $this->_getData(ResultUrlInterface::MESSAGE);
    }

    /**
     * @inheritDoc
     */
    public function setMessage($message)
    {
        $this->setData(ResultUrlInterface::MESSAGE, $message);
        return $this;
    }
}
