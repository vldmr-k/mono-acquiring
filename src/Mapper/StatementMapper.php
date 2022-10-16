<?php

namespace VldmrK\MonoAcquiring\Mapper;

use VldmrK\MonoAcquiring\Model\StatementCancelListItem;
use VldmrK\MonoAcquiring\Model\StatementItem;
use VldmrK\MonoAcquiring\Model\Statement;

class StatementMapper implements MapperInterface
{
    /**
     * @param string $jsonString
     * @return Statement
     */
    public function jsonToObject(string $jsonString): Statement
    {
        $data = \json_decode($jsonString, true);

        $output = [];
        foreach ($data['list'] as $item) {
            $cancelList = array_map(function ($item): StatementCancelListItem {
                return new StatementCancelListItem(
                    $item['amount'],
                    $item['ccy'],
                    $item['date'],
                    $item['maskedPan'],
                    $item['approvalCode'],
                    $item['rrn']
                );
            }, $item['cancelList'] ?? []);

            $statement = new StatementItem(
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
                $item['reference'],
                $cancelList
            );

            $output[] = $statement;
        }

        return new Statement($output);
    }
}
