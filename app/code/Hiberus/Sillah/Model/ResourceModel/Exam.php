<?php

namespace Hiberus\Sillah\Model\ResourceModel;
use Hiberus\Sillah\Api\Data\ExamInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class Exam extends AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\EntityManager\MetadataPool $metadataPool,
        \Magento\Framework\EntityManager\EntityManager $entityManager,$connection=null
    )
    {
        $this->metadataPool=$metadataPool;
        $this->entityManager=$entityManager;
        parent::__construct($context,$connection);
    }

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(ExamInterface::TABLE_NAME, ExamInterface::COLUMN_ID);
    }

    /**
     * @param AbstractModel $object
     * @return $this|Exam
     * @throws \Exception
     */
    public function save(AbstractModel $object){
        $this->entityManager->save($object);
        return $this;
    }

    /**
     * @param AbstractModel $object
     * @param mixed $value
     * @param null $field
     * @return Exam|mixed
     */
    public function load(AbstractModel $object, $value, $field=null){
        return $this->entityManager->load($object,$value);
    }

    /**
     * @param AbstractModel $object
     * @return Exam|void
     * @throws \Exception
     */
    public function delete(AbstractModel $object){
        $this->entityManager->delete($object);
    }
}
