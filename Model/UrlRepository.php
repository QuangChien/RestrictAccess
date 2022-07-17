<?php
/**
 * @author  Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license  Open Software License (“OSL”) v. 3.0
 */

namespace Tigren\RestrictAccess\Model;

use Tigren\RestrictAccess\Api\UrlRepositoryInterface;
use Tigren\RestrictAccess\Model\ResultUrlFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\UrlInterface;
use Tigren\RestrictAccess\Model\TokenFactory;
use Tigren\RestrictAccess\Helper\Data;

class UrlRepository implements UrlRepositoryInterface
{
    /**
     * @var \Tigren\RestrictAccess\Model\ResultUrlFactory
     */
    protected $resultUrl;

    /**
     * @var \Tigren\RestrictAccess\Model\TokenFactory
     */
    protected $accessToken;

    /**
     * @var \Tigren\RestrictAccess\Helper\Data
     */
    protected $dataHelper;

    public function __construct(
        ResultUrlFactory      $resultUrl,
        StoreManagerInterface $storeManager,
        UrlInterface          $urlInterface,
        TokenFactory          $accessTokenFactory,
        Data                  $dataHelper
    )
    {
        $this->resultUrl = $resultUrl;
        $this->accessToken = $accessTokenFactory;
        $this->dataHelper = $dataHelper;
    }

    /**
     * @inheritDoc
     */
    public function getUrl($appToken)
    {
        try {
            $resultUrl = $this->resultUrl->create();

            $date = date('Y-m-d H:i:s');
            $accessToken = base64_encode($appToken . $date);
            $this->accessToken->create()->addData(['token_value' => $accessToken])->save();

            $url = $this->dataHelper->getUrl() . "?key=" . $accessToken;
            $resultUrl->setUrl($url);
            $resultUrl->setStatus("200");
            $resultUrl->setMessage("Success");
            return $resultUrl;
        } catch (\Exception $e) {
            $resultUrl = $this->resultUrl->create();
            $resultUrl->setStatus("500");
            $resultUrl->setMessage($e->getMessage());
            return $resultUrl;
        }
    }
}
