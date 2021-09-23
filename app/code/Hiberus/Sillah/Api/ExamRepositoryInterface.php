<?php

namespace Hiberus\Sillah\Api;

interface ExamRepositoryInterface
{
    /**
     * @param \Hiberus\Sillah\Api\Data\ExamInterface $examInterface
     * @return \Hiberus\Sillah\Api\Data\ExamInterface
     */
    public function save(\Hiberus\Sillah\Api\Data\ExamInterface $examInterface);

    /**
     * @param $entityId
     * @return \Hiberus\Sillah\Api\Data\ExamInterface
     */
    public function getById($entityId);

    /**
     * @param \Hiberus\Sillah\Api\Data\ExamInterface $cursoInterface
     * @return bool
     */
    public function delete(\Hiberus\Sillah\Api\Data\ExamInterface $cursoInterface);

    /**
     * @param $idExam
     * @return bool
     */
    public  function deleteById($idExam);
}
