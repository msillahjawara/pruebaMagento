<?php

namespace Hiberus\Curso\model\ResourceModel;

use Hiberus\Curso\Api\Data\CursoInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Curso extends AbstractDb
{
    /**
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\EntityManager\MetadataPool $metadataPool
     * @param \Magento\Framework\EntityManager\EntityManager $entityManager
     * @param null $connection
     */
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
        $this->_init(CursoInterface::TABLE_NAME, CursoInterface::COLUMN_ID);
    }

    /**
     * @param AbstractModel $object
     * @return $this|Curso
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
     * @return AbstractDb|mixed
     */
    public function load(AbstractModel $object, $value, $field=null){
            return $this->entityManager->load($object,$value);
        }

    /**
     * @param AbstractModel $object
     * @return AbstractDb|void
     * @throws \Exception
     */
    public function delete(AbstractModel $object){
            $this->entityManager->delete($object);
        }

}
