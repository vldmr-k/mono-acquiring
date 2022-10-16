<?php

namespace spec\VldmrK\MonoAcquiring\Mapper;

use PhpSpec\ObjectBehavior;
use VldmrK\MonoAcquiring\Mapper\StatementMapper;
use VldmrK\MonoAcquiring\Model\Statement;
use VldmrK\MonoAcquiring\Model\StatementCancelListItem;
use VldmrK\MonoAcquiring\Model\StatementItem;

class StatementMapperSpec extends ObjectBehavior
{

    private $jsonString = '{
          "list": [
            {
              "invoiceId": "2205175v4MfatvmUL2oR",
              "status": "success",
              "maskedPan": "444403******1902",
              "date": "2019-08-24T14:15:22Z",
              "paymentScheme": "bnpl_later_30",
              "amount": 4200,
              "profitAmount": 4100,
              "ccy": 980,
              "approvalCode": "662476",
              "rrn": "060189181768",
              "reference": "84d0070ee4e44667b31371d8f8813947",
              "cancelList": [
                {
                  "amount": 4200,
                  "ccy": 980,
                  "date": "2019-08-24T14:15:22Z",
                  "approvalCode": "662476",
                  "rrn": "060189181768",
                  "maskedPan": "444403******1902"
                }
              ]
            }
          ]
        }';

    private $jsonStringUnsetCancelList = '
        {
          "list": [
            {
              "invoiceId": "2205175v4MfatvmUL2oR",
              "status": "success",
              "maskedPan": "444403******1902",
              "date": "2019-08-24T14:15:22Z",
              "paymentScheme": "bnpl_later_30",
              "amount": 4200,
              "profitAmount": 4100,
              "ccy": 980,
              "approvalCode": "662476",
              "rrn": "060189181768",
              "reference": "84d0070ee4e44667b31371d8f8813947"
            }
          ]
        }
    ';

    function it_is_initializable()
    {
        $this->shouldHaveType(StatementMapper::class);
    }

    function it_to_json_object_not_set_cancel_list() {
        $this->jsonToObject($this->jsonStringUnsetCancelList)->shouldBeAnInstanceOf(Statement::class);

        $statement = new Statement([
            new StatementItem(
                '2205175v4MfatvmUL2oR',
                'success',
                '444403******1902',
                '2019-08-24T14:15:22Z',
                'bnpl_later_30',
                4200,
                4100,
                980,
                '662476',
                '060189181768',
                '84d0070ee4e44667b31371d8f8813947',
                []
            )
        ]);
        $this->jsonToObject($this->jsonStringUnsetCancelList)->toArray()->shouldReturn($statement->toArray());
    }

    function it_to_json_to_object() {
        $this->jsonToObject($this->jsonString)->shouldBeAnInstanceOf(Statement::class);


        $statement = new Statement([
            new StatementItem(
                '2205175v4MfatvmUL2oR',
                'success',
                '444403******1902',
                '2019-08-24T14:15:22Z',
                'bnpl_later_30',
                4200,
                4100,
                980,
                '662476',
                '060189181768',
                '84d0070ee4e44667b31371d8f8813947',
                [
                    new StatementCancelListItem(
                        4200,
                        980,
                        "2019-08-24T14:15:22Z",
                        "444403******1902",
                        "662476",
                        "060189181768",
                    )
                ]
            )
        ]);

        $this->jsonToObject($this->jsonString)->toArray()->shouldReturn($statement->toArray());
    }
}
