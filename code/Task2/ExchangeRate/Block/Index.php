<?php


namespace Task2\ExchangeRate\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

class Index extends Template
{
    public function __construct(Context $context, \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    public function apiFixer(){
        // set API Endpoint, access key, required parameters
        $endpoint = 'latest';
        $access_key = '8793410fc563d00dff2ae3d6448d6b67';

        // initialize CURL:
        $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'&format=1');   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // get the JSON data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $conversionResult = json_decode($json, true);

        // access the conversion result
        $res = $conversionResult['rates']['USD'];

       return $res;

    }

    public function getConvertData()
    {
        $euroToDollar = $this->apiFixer();
        $dollarToEuro=0.83;

        $data = $this->getBtn();
        $num = $this->getNum();

       if ($data == 1) {
        $changeRate = $num * $euroToDollar;
            return $changeRate;

        }elseif ($data == 2) {
            $changeRate = $num * $dollarToEuro;
            return $changeRate;
        }

        return $data;
    }

    public function getBtnData(){
        return $this->getBtn();
    }
}
