<?php

declare(strict_types=1);

namespace App\Controllers\Di;

use App\Dto\DiControllerEmptyDto;
use Hleb\Base\Controller;
use Hleb\Reference\LogInterface;
use Hleb\Reference\LogReference;

// Проверка DI для контроллера.

class HTestDiController extends Controller
{
    private array $beforeData = [];

    public function __construct(
        readonly private \DateTime                 $time,
        readonly private DiControllerEmptyDto|null $dto,
        readonly private LogReference              $log,
        array                             $config = []
    )
    {
        parent::__construct($config);
    }

    public function index(\DateTime $time): array
    {
        return [
            'time' => $time::class,
        ];
    }

    public function twoArgs(\DateTime $time, DiControllerEmptyDto|null $dto): array
    {
        return [
            'time' => $time::class,
            'dto' => $dto::class,
        ];
    }

    public function manyArgs(
        \DateTime $time,
        DiControllerEmptyDto|null $dto,
        LogInterface $log,
        ?string $test = 'default',
        array|null $null = null,
        ?LogReference $log2 = null,
    ): array
    {
        return [
            'time' => $time::class,
            'dto' => $dto::class,
            'log' => $log::class,
            'test' => $test,
            'null' => $null,
            'log2' => $log2::class,
        ];
    }

    public function dynamicArgs(
        $arg1,
        DiControllerEmptyDto|null $dto,
        LogReference $log,
        ?int $arg2 = null,
    ): array
    {
        return [
            'arg1' => $arg1,
            'arg2' => $arg2,
            'dto' => $dto::class,
            'log' => $log::class,
        ];
    }

    public function getConstruct(): array
    {
        return [
            'dto' => $this->dto::class,
            'log' => $this->log::class,
            'time' => $this->time::class,
        ];
    }

    public function getBefore(): array
    {
        return $this->beforeData;
    }
}