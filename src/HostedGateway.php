<?php

namespace Omnipay\NetBanx;

use Omnipay\Common\AbstractGateway;

/**
 * NetBanx Hosted Payment Class
 *
 */
class HostedGateway extends AbstractGateway
{
    public function getName()
    {
        return 'NetBanx Hosted Payments';
    }

    public function getDefaultParameters()
    {
        return array(
            'keyId'       => '',
            'keyPassword' => '',
            'testMode'    => false
        );
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NetBanx\Message\HostedAuthorizeRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NetBanx\Message\HostedPurchaseRequest', $parameters);
    }

    public function completeAuthorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NetBanx\Message\HostedCompleteAuthorizeRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NetBanx\Message\HostedCompletePurchaseRequest', $parameters);
    }

    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NetBanx\Message\HostedCaptureRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\NetBanx\Message\HostedRefundRequest', $parameters);
    }

    public function setKeyId($value)
    {
        return $this->setParameter('keyId', $value);
    }

    public function getKeyId()
    {
        return $this->getParameter('keyId');
    }

    public function setKeyPassword($value)
    {
        return $this->setParameter('keyPassword', $value);
    }

    public function getKeyPassword()
    {
        return $this->getParameter('keyPassword');
    }
}
