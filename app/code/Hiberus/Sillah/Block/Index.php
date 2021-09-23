<?php

namespace Hiberus\Sillah\Block;

use Hiberus\Sillah\Model\Exam;
use Hiberus\Sillah\Api\Data\ExamInterfaceFactory;
use Hiberus\Sillah\Api\ExamRepositoryInterface;

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
        array $data = []
    ) {
        $this->registry = $registry;
        $this->exam = $exam;
        $this->examRepository = $examRepository;
        $this->examInterfaceFactory = $examInterfaceFactory;
        $this->examResource = $examResource;
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

    public function insertEvaluation($firstname, $lastname,$mark) {

        $evaluation = $this->cursoInterfaceFactory->create();
        $evaluation->setFirstname($firstname);
        $evaluation->setLastname($lastname);
        $evaluation->setMark($mark);
        $this->examResource->save($evaluation);
        return $evaluation->getEntityId();

    }
}
