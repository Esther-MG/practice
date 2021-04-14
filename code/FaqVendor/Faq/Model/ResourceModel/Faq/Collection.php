<?php
namespace FaqVendor\Faq\Model\ResourceModel\Faq;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\FaqVendor\Faq\Model\Faq::class,
            \FaqVendor\Faq\Model\ResourceModel\Faq::class);
    }
}
