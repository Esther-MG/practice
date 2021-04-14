<?php
namespace FaqVendor\Faq\Model\ResourceModel;
class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('faq','faq_id');
    }
}
