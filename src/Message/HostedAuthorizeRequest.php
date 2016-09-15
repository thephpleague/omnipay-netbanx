<?php

namespace Omnipay\NetBanx\Message;

class HostedAuthorizeRequest extends HostedPurchaseRequest
{

    public function getData()
    {
        $data = parent::getData();

        $data['extendedOptions'][] = array('key' => 'authType', 'value' => 'auth');

        return $data;
    }
}
