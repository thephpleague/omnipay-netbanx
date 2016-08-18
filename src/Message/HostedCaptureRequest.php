<?php

namespace Omnipay\NetBanx\Message;

class HostedCaptureRequest extends HostedAbstractRequest
{

	public function getData()
	{
		$this->validate('amount','transactionReference','transactionId');

		$data = parent::getBaseData();

		$data['amount'] = $this->getAmountInteger();
		$data['merchantRefNum'] = $this->getTransactionId();

		return $data;
	}

	public function getEndpointAction()
	{
		return "/orders/".$this->getTransactionReference()."/settlement";
	}

	public function sendData($data)
	{
		$httpResponse = $this->sendRequest($this->getEndpointAction(), null, 'POST');
		$responseData = json_decode($httpResponse->getBody(true),true);

		return $this->response = new HostedCaptureResponse($this, $responseData);
	}
}
