<?php

namespace FaqVendor\Faq\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{

    public function execute()
    {
        $pageResult = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $pageResult->getConfig()->getTitle()->set('FAQ');
        return $pageResult;
    }

}
