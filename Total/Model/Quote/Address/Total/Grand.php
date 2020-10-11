<?php
namespace Sjinnovation\Total\Model\Quote\Address\Total;

class Grand extends \Magento\Quote\Model\Quote\Address\Total\Grand
{
    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        $grandTotal = $total->getGrandTotal();
        $baseGrandTotal = $total->getBaseGrandTotal();
        $totals = array_sum($total->getAllTotalAmounts());
        $baseTotals = array_sum($total->getAllBaseTotalAmounts());
        $totalCartAmount = round($grandTotal + $totals);
        $total->setGrandTotal($totalCartAmount);
        $total->setBaseGrandTotal($baseGrandTotal + $baseTotals);
        return $this;
    }
}
