<?php
/**
 * @author  Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license  Open Software License (“OSL”) v. 3.0
 */

namespace Tigren\RestrictAccess\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * XML_PATH_RESTRICTACCESS_GENERAL
     */
    const XML_PATH_RESTRICTACCESS_GENERAL = 'restrictaccess/general/';

    /**
     * Return Configuration value of given field
     * @param param $field field
     * @return mixed
     */

    public function getConfigValue($field)
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE
        );
    }

//    /**
//     * Return Module is enable or not
//     * @return mixed
//     */
//    public function getIsEnable()
//    {
//        return $this->getConfigValue(
//            self::XML_PATH_RESTRICTACCESS_GENERAL . 'enable'
//        );
//    }

    /**
     * Return Headline Text
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->getConfigValue(
            self::XML_PATH_RESTRICTACCESS_GENERAL . 'error_message'
        );
    }

    /**
     * Return url
     * @return mixed
     */
    public function getUrl()
    {
        return $this->getConfigValue(
            self::XML_PATH_RESTRICTACCESS_GENERAL . 'url'
        );
    }
}
