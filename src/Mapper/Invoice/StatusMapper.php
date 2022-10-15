<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\CancelListItem;
use VldmrK\MonoAcquiring\Model\Invoice\InvoiceStatus;

class StatusMapper implements MapperInterface
{
    /**
     * @param string $jsonString
     * @return InvoiceStatus
     */
    public function jsonToObject(string $jsonString): InvoiceStatus
    {
        $data = json_decode($jsonString, true);

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

        $output = new InvoiceStatus(
            $data['invoiceId'],
            $data['status'],
            $data['amount'],
            $data['ccy'],
            $data['finalAmount'],
            $data['reference'],
            $data['createdDate'],
            $data['modifiedDate'],
            $data['failureReason'],
            $cancelList
        );

        return $output;
    }
}
