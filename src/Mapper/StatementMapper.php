<?php

namespace VldmrK\MonoAcquiring\Mapper;

use VldmrK\MonoAcquiring\CancelListItem;
use VldmrK\MonoAcquiring\Model\MerchantStatementItem;
use VldmrK\MonoAcquiring\Model\Statement;

class StatementMapper implements MapperInterface {

    /**
     * @param string $jsonString
     * @return Statement
     */
    public function jsonToObject(string $jsonString): Statement
    {
        $data = json_decode($jsonString, true);

        $list = [];
        foreach ($data['list'] as $item) {
            $statement = new MerchantStatementItem(
                $item['invoiceId'],
                $item['status'],
                $item['maskedPan'],
                $item['date'],
                $item['paymentScheme'],
                $item['amount'],
                $item['profitAmount'],
                $item['ccy'],
                $item['approvalCode'],
                $item['rrn'],
                $item['reference']
            );

            foreach ($item['cancelList'] as $cancel) {
                $statement->addCancelItem(new CancelListItem(
                    $cancel['status'],
                    $cancel['createdDate'],
                    $cancel['modifiedDate'],
                    $cancel['amount']*1,
                    $cancel['ccy']*1,
                    $cancel['approvalCode'],
                    $cancel['rrn'],
                    $cancel['extRef']
                ));
            }

            $list[] = $statement;
        }

        return new Statement($list);
    }
}
