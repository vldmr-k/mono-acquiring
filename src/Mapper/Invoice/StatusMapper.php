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
                $item['amount'] ?? 0,
                $item['ccy'] ?? 0,
                $item['approvalCode'] ?? null,
                $item['rrn'] ?? null,
                $item['extRef'] ?? null
            );
        }, $data['cancelList'] ?? []);

        $output = new InvoiceStatus(
            $data['invoiceId'],
            $data['status'],
            $data['amount'] ?? 0,
            $data['ccy'] ?? 0,
            $data['finalAmount'] ?? 0,
            $data['reference'] ?? null,
            $data['createdDate'] ?? null,
            $data['modifiedDate'] ?? null,
            $data['failureReason'] ?? null,
            $cancelList
        );

        return $output;
    }
}
