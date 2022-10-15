<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\CancelListItem;
use VldmrK\MonoAcquiring\Model\Invoice\InvoicePaymentInfo;

class PaymentInfoMapper implements MapperInterface
{
    /**
     * @param string $jsonString
     * @return InvoicePaymentInfo
     */
    public function jsonToObject(string $jsonString): InvoicePaymentInfo
    {
        $data = \json_decode($jsonString, true);

        $cancelList = array_map(function ($item) {
            return new CancelListItem(
                $item['status'],
                $item['createdDate'],
                $item['modifiedDate'],
                $item['amount'],
                $item['ccy'],
                $item['approvalCode'],
                $item['rrn'],
                $item['extRef']
            );
        }, $data['cancelList']);

        $output = new InvoicePaymentInfo(
            $data['maskedPan'],
            $data['approvalCode'],
            $data['rrn'],
            $data['amount'],
            $data['ccy'],
            $data['finalAmount'],
            $data['createdDate'],
            $data['terminal'],
            $data['paymentScheme'],
            $data['paymentMethod'],
            $data['domesticCard'],
            $data['country'],
            $data['fee'],
            $cancelList
        );

        return $output;
    }
}
