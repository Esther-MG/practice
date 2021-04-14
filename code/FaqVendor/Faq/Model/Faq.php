<?php
namespace FaqVendor\Faq\Model;
class Faq extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(\FaqVendor\Faq\Model\ResourceModel\Faq::class);
    }
}
