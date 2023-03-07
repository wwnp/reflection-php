<?php

abstract class PaymentGatewayContract
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    // Abstract method that needs to be implemented by the child class
    abstract public function charge($amount);
}

class PayPalPaymentGateway extends PaymentGatewayContract
{

    public function __construct($apiKey)
    {
        // Call the constructor of the parent class
        parent::__construct($apiKey);

        // Additional code for the child class
    }
    public function charge($amount)
    {
        // Implement the charge method
    }
}
$pp = new PayPalPaymentGateway("asdasd");
