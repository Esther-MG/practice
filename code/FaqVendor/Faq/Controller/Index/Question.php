<?php

namespace FaqVendor\Faq\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use FaqVendor\Faq\Model\Faq;
use FaqVendor\Faq\Model\ResourceModel\Faq as FaqResource;

class Question extends Action
{
    /**
     * @var Faq
     */
    private $faq;
    /**
     * @var FaqResource
     */
    private $faqResource;

    /**
     * Add constructor.
     * @param Context $context
     * @param Faq $faq
     * @param FaqResource $faqResource
     */

    public function __construct(
        Context $context,
        Faq $faq,
        FaqResource $faqResource
    ){
        parent::__construct($context);
        $this->faq = $faq;
        $this->faqResource = $faqResource;
    }
    /**
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */

    public function execute(){
        /* Get the post data */
        $post = $this->getRequest()->getParams();

        /* Set the data in the model */
        $data=array('faq_ques'=>$post['question'], 'customer_id'=>'1');

        $faqModel = $this->faq;
        $faqModel->setData($data);

        try {
            /* Use the resource model to save the model in the DB */
            $this->faqResource->save($faqModel);
            $this->messageManager->addSuccessMessage("Question saved successfully!");
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage(__("Error saving question"));
        }

        /* Redirect back to question page */
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('faq');
        return $redirect;
    }
}
