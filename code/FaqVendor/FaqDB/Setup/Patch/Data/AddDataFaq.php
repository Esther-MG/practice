<?php

namespace FaqVendor\FaqDB\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\PatchInterface;

class AddDataFaq implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $faqList = [
            ['faq_ques'=>'What payment methods do you accept?', 'faq_answ'=>'PayPal and MasterCard', 'customer_id'=>1],
            ['faq_ques'=>'How long does the delivery take?', 'faq_answ'=>'It depends on the distance, it could be between 8 to 24 hours', 'customer_id'=>1],
            ['faq_ques'=>'Are the products guaranteed?', 'faq_answ'=>'When selecting your product in the characteries area you will see if it has a guarantee or not.', 'customer_id'=>1],
        ];
        $connection = $this->moduleDataSetup->getConnection();
        $faqTbl = $connection->getTableName('faq');
        foreach ($faqList as $faq) {
            $connection->insertForce($faqTbl, $faq);
        }
        $this->moduleDataSetup->endSetup();

    }
}