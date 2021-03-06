<?php

namespace Hiberus\Sillah\Model;

use Hiberus\Sillah\Api\Data\ExamInterface;

class Exam extends \Magento\Framework\Model\AbstractModel implements \Hiberus\Sillah\Api\Data\ExamInterface
{
    protected function _construct()
    {
        $this->_init(\Hiberus\Sillah\Model\ResourceModel\Exam::class); // TODO: Change the autogenerated stub
    }
    /**
     * @inheritDoc
     */
    public function getIdExam(){
        return $this->getData('id_exam');
    }
    /**
     * @inheritDoc
     */
    public function setIdExam($idExam){
        return $this->setData('id_exam',$idExam);
    }
    /**
     * @inheritDoc
     */
    public function getFirstname(){
        return $this->getData('firstname');
    }
    /**
     * @inheritDoc
     */
    public function setFirstname(string $firstname){
        return $this->setData('firstname',$firstname);
    }
    /**
     * @inheritDoc
     */
    public function getLastname(){
        return $this->getData('lastname');
    }
    /**
     * @inheritDoc
     */
    public function setLastname(string $lastname){
        return $this->setData('lastname',$lastname);
    }
    /**
     * @inheritDoc
     */
    public function getMark(){
        return $this->getData('mark');
    }
    /**
     * @inheritDoc
     */
    public function setMark(float $mark){
        return $this->setData('mark',$mark);
    }
}
