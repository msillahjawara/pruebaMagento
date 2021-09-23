<?php

namespace Hiberus\Sillah\Model\ResourceModel\Exam;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hiberus\Sillah\Model;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model\Exam::class, Model\ResourceModel\Exam::class);
    }
}
