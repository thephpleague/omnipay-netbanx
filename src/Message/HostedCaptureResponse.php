<?php

namespace Omnipay\NetBanx\Message;

class HostedCaptureResponse extends HostedAbstractResponse
{
    public function isSuccessful()
    {
        $successfulTransaction = (isset($this->data['authType']) && $this->data['authType'] == 'settlement');

        return !$this->isRedirect() && !isset($this->data['error']) && $successfulTransaction;
    }

    public function isRedirect()
    {
        return false;
    }

    public function getMessage()
    {
        $message = null;

        if (isset($this->data['confirmationNumber'])) {
            $message = $this->data['confirmationNumber'];
        }

        if (isset($this->data['error']['message'])) {
            $message = $this->data['error']['message'];
        }

        return $message;
    }

    public function getRedirectData()
    {
        return null;
    }
}
