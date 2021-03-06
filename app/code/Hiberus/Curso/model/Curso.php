<?php

namespace Hiberus\Curso\model;

use Hiberus\Curso\Api\Data\CursoInterface;

class Curso extends \Magento\Framework\Model\AbstractModel implements \Hiberus\Curso\Api\Data\CursoInterface
{

    protected function _construct()
    {
        $this->_init(\Hiberus\Curso\model\ResourceModel\Curso::class);
        //parent::_construct(); // TODO: Change the autogenerated stub
    }
    /**
     * @inheritDoc
     */
    public function getEntityId()
    {
        return $this->getData('entity_id');
    }
    /**
     * @inheritDoc
     */
    public function setEntityId($entityId)
    {
        return $this->setData('entity_id',$entityId);
    }
    /**
     * @inheritDoc
     */
    public function getNombre()
    {
        return $this->getData('nombre');
    }
    /**
     * @inheritDoc
     */
    public function setNombre(string $nombre)
    {
        return $this->setData('nombre',$nombre);
    }
    /**
     * @inheritDoc
     */
    public function getApellido()
    {
        return $this->getData('apellido');
    }
    /**
     * @inheritDoc
     */
    public function setApellido(string $apellido)
    {
        return $this->setData('apellido',$apellido);
    }
    /**
     * @inheritDoc
     */
    public function getTimestamp()
    {
        return $this->getData('created_at');
    }

    /**
     * @inheritDoc
     */
    public function setTimestamp(string $timestamp)
    {
        return $this->setData('created_at',$timestamp);
    }
}
