<?php

namespace Hiberus\Sillah\Api\Data;

interface ExamInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const TABLE_NAME='hiberus_exam';
    const COLUMN_ID='id_exam';

    /**
     * @return int
     */
    public function getIdExam();

    /**
     * @param int $idExam
     * @return $this
     */
    public function setIdExam(int $idExam);

    /**
     * @return string
     */
    public function getFirstname();

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname(string $firstname);

    /**
     * @return string
     */
    public function getLastname();

    /**
     * @param string $lastname
     * @return $this
     */
    public function setLastname(string $lastname);

    /**
     * @return string
     */
    public function getMark();

    /**
     * @param double $mark
     * @return $this
     */
    public function setMark(float $mark);

}
