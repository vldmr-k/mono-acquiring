<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\CancelListItem;
use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Model\Invoice\Status;

class StatusMapper implements MapperInterface {

    /**
     * @param string $jsonString
     * @return Status
     */
    public function jsonToObject(string $jsonString): Status
    {
        $data = json_decode($jsonString, true);
        $output = new Status(
            $data['invoiceId'],
            $data['status'],
            $data['amount'],
            $data['ccy'],
            $data['finalAmount'],
            $data['reference'],
            $data['createdDate'],
            $data['modifiedDate'],
        );

        foreach ($data['cancelList'] as $item) {
            $output->addCancelList(new CancelListItem(
                $item['status'],
                $item['createdDate'],
                $item['modifiedDate'],
                $item['amount'],
                $item['ccy'],
                $item['approvalCode'],
                $item['rrn'],
                $item['extRef']
            ));
        }

        return $output;
    }

}
