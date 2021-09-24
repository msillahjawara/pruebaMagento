<?php

namespace Hiberus\Sillah\Plugin\Mark;

use Hiberus\Sillah\Model\Exam;

class MarksPlugin
{

    public function afterGetMark(Exam $subject, $result)
    {
        if ($subject->getData('mark') < 5.0) {
            $subject->setMark(4.9);
            $result = $subject->getData('mark');
        }
        return $result;

    }


}
