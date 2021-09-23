<?php

namespace Hiberus\Curso\Api\Data;

interface CursoInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const TABLE_NAME='hiberus_curso';
    const COLUMN_ID='entity_id';

    /**
     * @return int
     */
    public function getEntityId();

    /**
     * @param int $entityId
     * @return $this
     */
    public function setEntityId(int $entityId);

    /**
     * @return string
     */
    public function getNombre();

    /**
     * @param string $nombre
     * @return $this
     */
    public function setNombre(string $nombre);

    /**
     * @return string
     */
    public function getApellido();

    /**
     * @param string $apellido
     * @return $this
     */
    public function setApellido(string $apellido);

    /**
     * @return string
     */
    public function getTimestamp();

    /**
     * @param string $timestamp
     * @return $this
     */
    public function setTimestamp(string $timestamp);

}
