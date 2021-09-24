<?php

namespace Hiberus\Sillah\Block;

use Hiberus\Sillah\Model\Exam;
use Hiberus\Sillah\Api\Data\ExamInterfaceFactory;
use Hiberus\Sillah\Api\ExamRepositoryInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $registry;
    protected $exam;
    protected $examRepository;
    protected $cursoInterfaceFactory;
    protected $cursoResource;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        Exam $exam,
        ExamRepositoryInterface $examRepository,
        ExamInterfaceFactory $examInterfaceFactory,
        \Hiberus\Sillah\Model\ResourceModel\Exam $examResource,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->exam = $exam;
        $this->examRepository = $examRepository;
        $this->examInterfaceFactory = $examInterfaceFactory;
        $this->examResource = $examResource;
        $this->scopeConfig=$scopeConfig;
        parent::__construct($context, $data);
    }

    public function getExam() {

        $createEvaluation = $this->insertEvaluation('carlos', 'jimenez',8.3);
        return $this->examRepository->getById($createEvaluation);

    }

    /**
     * @return AbstractDb|AbstractCollection|null
     */
    public function getExams() {
        $resultPage = $this->examInterfaceFactory->create();
        return $resultPage->getCollection();
    }

    public function getAverageMarks(){
        $total=$this->getExams();
        $marks=[];
        foreach ($total as $item){
            $marks[]=$item->getMark();
        }
        $averageMark=array_sum($marks)/count($marks);
        return $averageMark;
    }

    public function getMaxMarks(){
        $total=$this->getExams();
        $marks=[];
        $maxMarks=[];
        foreach ($total as $item){
            $marks[]=$item->getMark();
        }
        rsort($marks);
        foreach ($marks as $mark){
            if(count($maxMarks)<3){
                $maxMarks[]=$mark;
            }
        }
        return $maxMarks;
    }




     public function getDefaultMark() {
         $defaultMark= $this->scopeConfig->getValue( 'hiberus_sillah/general/number_general', ScopeInterface::SCOPE_STORE);
         if(is_null($defaultMark)||$defaultMark<=0){
             $defaultMark=5;
         }
         return $defaultMark;
     }

    public function getElements() {
        $elements= $this->scopeConfig->getValue( 'hiberus_sillah/general/element_general', ScopeInterface::SCOPE_STORE);
        return $elements;
    }

    public function insertEvaluation($firstname, $lastname,$mark) {

        $evaluation = $this->cursoInterfaceFactory->create();
        $evaluation->setFirstname($firstname);
        $evaluation->setLastname($lastname);
        $evaluation->setMark($mark);
        $this->examResource->save($evaluation);
        return $evaluation->getEntityId();

    }
}
