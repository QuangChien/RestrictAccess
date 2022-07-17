<?php
/**
 * @author  Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license  Open Software License (“OSL”) v. 3.0
 */

namespace Tigren\RestrictAccess\Api\Data;

interface ResultTokenInterface
{
    const TOKEN_VALUE = 'token_value';

    /**
     * @return string
     */
    public function getTokenValue();

    /**
     * @param string $token
     * @return $this
     */
    public function setTokenValue($token);

}
