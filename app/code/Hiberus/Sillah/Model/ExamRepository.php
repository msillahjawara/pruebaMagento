<?php

namespace Hiberus\Sillah\Model;

use Hiberus\Sillah\Api\ExamRepositoryInterface;
use Hiberus\Sillah\Api\Data\ExamInterface;
use Magento\Framework\Exception\CouldNotSaveException;

class ExamRepository implements ExamRepositoryInterface
{

    protected ResourceModel\Exam $resourceExam;
    protected \Hiberus\Sillah\Api\Data\ExamInterfaceFactory $examInterfaceFactory;

    /**
     * @param ResourceModel\Exam $resourceExam
     * @param \Hiberus\Sillah\Api\Data\ExamInterfaceFactory $examInterfaceFactory
     */
    public function __construct(
        \Hiberus\Sillah\Model\ResourceModel\Exam $resourceExam,
        \Hiberus\Sillah\Api\Data\ExamInterfaceFactory $examInterfaceFactory
    ) {
        $this->resourceExam = $resourceExam;
        $this->examInterfaceFactory = $examInterfaceFactory;
    }

    /**
     * @param ExamInterface $exam
     * @return ExamInterface
     * @throws CouldNotSaveException
     */
    public function save(
        ExamInterface $exam
    ) {

        try {
            $this->resourceExam->save($exam);
        } catch(\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $exam;

    }

    /**
     * @param $entityId
     * @return mixed
     */
    public function getById($idExam)
    {
        try {
            $exam = $this->examInterfaceFactory->create();
            $exam->setIdExam($idExam);
            $this->resourceExam->load($exam, $idExam);
        } catch (\Exception $e) {
            $exam = $this->examInterfaceFactory->create();
        }

        return $exam;
    }

    /**
     * @param \Hiberus\Sillah\Api\Data\ExamInterface $exam
     * @return bool
     */
    public function delete(\Hiberus\Sillah\Api\Data\ExamInterface $exam)
    {
        try {
            $this->resourceExam->delete($exam);
        } catch (\Exception $e) {

            return false;
        }

        return true;
    }

    /**
     * @param int $idExam
     * @return bool
     */
    public function deleteById($idExam)
    {
        return $this->delete($this->getById($idExam));
    }

}
