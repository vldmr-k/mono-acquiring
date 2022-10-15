<?php

namespace VldmrK\MonoAcquiring\Query;

use VldmrK\MonoAcquiring\Mapper\MapperInterface;
use VldmrK\MonoAcquiring\Mapper\StatementMapper;

class StatementQuery implements ResourceInterface
{
    /** @var int  */
    public int $from;

    /** @var int|null  */
    public ?int $to;

    /**
     * Statement constructor.
     * @param int $from
     * @param int|null $to
     */
    public function __construct(int $from, ?int $to = null)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return array<string, int|null>
     */
    public function toArray(): array
    {
        return [
            "from" => $this->from,
            "to" => $this->to
        ];
    }

    public function url(): string
    {
        return "/api/merchant/statement";
    }

    public function httpMethod(): string
    {
        return "GET";
    }

    public function mapper(): MapperInterface
    {
        return new StatementMapper();
    }
}
