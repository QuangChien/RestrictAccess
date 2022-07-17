<?php
/**
 * @author  Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license  Open Software License (“OSL”) v. 3.0
 */

namespace Tigren\RestrictAccess\Api;
use Tigren\RestrictAccess\Api\Data\ResultUrlInterface;

interface UrlRepositoryInterface
{
    /**
     * @param string $appToken
     * @return \Tigren\RestrictAccess\Api\Data\ResultUrlInterface
     * @api
     */
    public function getUrl($appToken);
}
