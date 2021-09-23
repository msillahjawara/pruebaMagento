<?php

namespace Hiberus\Curso\Plugin\Catalog;

use Hiberus\Curso\model\Author;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;


class ProductPlugin
{
    /**
     * @var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig,Author $author){
        $this->scopeConfig=$scopeConfig;
        $this->author=$author;
    }
    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result):string
    {
        //Valores del getValue()--------------------------section_id/group_id/field_id
        //$nombreGeneral=$this->scopeConfig->getValue('hiberus_nombre/general/nombre_general',ScopeInterface::SCOPE_STORE);
        //$result= $result.''.$nombreGeneral;
        $result= $result.' '.$this->author->getAuthorName();
        return $result;
    }

    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    public function afterLoad(\Magento\Catalog\Model\Product $subject, $result):string
    {
        $texto=$this->scopeConfig->getValue('hiberus_sillah/general/name_general',ScopeInterface::SCOPE_STORE);
        $num=$this->scopeConfig->getValue('hiberus_sillah/general/numero_general',ScopeInterface::SCOPE_STORE);
        $des=$subject->getDescription();
        $des.=$texto.' '.$num;
        $subject->setDescription($des);
        $result= $subject->getDescription();
        return $result;
    }

}
