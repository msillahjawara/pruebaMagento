<?php

namespace Hiberus\Curso\controller\index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;

class Index implements HttpGetActionInterface
{
    protected \Magento\Framework\View\Result\PageFactory $pageFactory;
    private \Hiberus\Curso\model\CursoFactory $cursoFactory;
    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory,\Hiberus\Curso\model\CursoFactory $curso){
        $this->pageFactory=$pageFactory;
        $this->cursoFactory=$curso;
    }

    public function execute()
    {
        //return $this->pageFactory->create();
        $curso= $this->cursoFactory->create();
        $collection=$curso->getCollection();
        foreach ($collection as $item){
            echo $item->getData();
        }
        return $this->pageFactory->create();
    }
}
