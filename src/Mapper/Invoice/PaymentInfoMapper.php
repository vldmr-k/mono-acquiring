<?php

namespace VldmrK\MonoAcquiring\Mapper\Invoice;

use VldmrK\MonoAcquiring\CancelListItem;
use VldmrK\MonoAcquiring\Model\Invoice\PaymentInfo;
use VldmrK\MonoAcquiring\Model\MapperInterface;

class PaymentInfoMapper implements MapperInterface {

    /**
     * @param string $jsonString
     * @return PaymentInfo
     */
    public function jsonToObject(string $jsonString): PaymentInfo
    {
        $data = json_decode($jsonString, true);

        $output = new PaymentInfo(
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
            $data['fee'],
            $data['domesticCard'],
            $data['country'],
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
