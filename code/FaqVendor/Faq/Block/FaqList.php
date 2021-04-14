<?php

namespace FaqVendor\Faq\Block;

use Magento\Framework\View\Element\Template;

class FaqList extends \Magento\Framework\View\Element\Template
{
    protected $_faqCollectionFactory;

    public function __construct(
        \FaqVendor\Faq\Model\ResourceModel\Faq\CollectionFactory $faqCollectionFactory,
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        $this->_faqCollectionFactory = $faqCollectionFactory;
        parent::__construct($context);
    }

    public function getFaqCollection()
    {
        /** @var \FaqVendor\Faq\Model\ResourceModel\Faq\Collection $faq */
        $faq = $this->_faqCollectionFactory->create();
        $faq->addFieldToSelect(['faq_id','faq_ques','faq_answ']);
        return $faq->getData();
    }
}
