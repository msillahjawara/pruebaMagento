<?php

namespace Hiberus\Sillah\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;

class Index implements HttpGetActionInterface
{
    protected \Magento\Framework\View\Result\PageFactory $pageFactory;
    private \Hiberus\Sillah\Model\ExamFactory $examFactory;
    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory,\Hiberus\Sillah\Model\ExamFactory $exam){
        $this->pageFactory=$pageFactory;
        $this->examFactory=$exam;
    }

    public function execute()
    {
        return $this->pageFactory->create();
        /*$exam= $this->examFactory->create();
        $collection=$exam->getCollection();
        foreach ($collection as $item){
            echo $item->getData();
        }
        return $this->pageFactory->create();*/
    }
}
