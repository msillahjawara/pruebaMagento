<?php

namespace Hiberus\Curso\Plugin\Pricing;

class ProductPricing
{

    public function afterFormatCurrency(\Magento\Framework\Pricing\Render\Amount $subject, $result)
    {

        $result.="/ud";
        return $result;
    }

}
