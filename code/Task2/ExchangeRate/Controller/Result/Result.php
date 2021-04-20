<?php


namespace Task2\ExchangeRate\Controller\Result;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class Result extends \Magento\Framework\App\Action\Action
{
    /**
     * @var Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    protected $resultJsonFactory;

    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory
    )
    {

        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        return parent::__construct($context);
    }


    public function execute()
    {
        $num = $this->getRequest()->getParam('num');

        $btn = $this->getRequest()->getParam('btn');
        $result = $this->resultJsonFactory->create();
        $resultPage = $this->resultPageFactory->create();

        $block = $resultPage->getLayout()
            ->createBlock('Task2\ExchangeRate\Block\Index')
            ->setTemplate('Task2_ExchangeRate::result.phtml')
            ->setData('num',$num)
            ->setData('btn',$btn)
            ->toHtml();


        $result->setData(['output' => $block]);
        return $result;
    }
}
