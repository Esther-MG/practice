<?php


namespace FaqVendor\Faq\Block;

use FaqVendor\Faq\Model\ResourceModel\Faq\Collection;

class FaqQues extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * @param Template\Context $context
     * @param Collection $collection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Collection $collection,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->collection = $collection;
    }

    public function getQuestionUrl()
    {
        return $this->getUrl('faq/index/question');
    }
}
