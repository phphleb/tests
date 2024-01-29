<?php

declare(strict_types=1);

namespace Phphleb\Tests;

class StandardModuleInit
{
    protected string $initiator = 'init.php';

    public const DEFAULT_DATA = [
        'SERVER' => [
            'HTTP_HOST' => 'site.com',
            'REQUEST_URI' => '/test/',
            'REQUEST_METHOD' => 'GET',
        ],
        'POST' => [],
        'GET' => [],
        'COOKIE' => [],
        'SESSION' => [
            'PHPSESSID' => '1'
        ]
    ];

    private bool $status = true;

    public function run(array $params = [], array $config = [])
    {
        $params = array_merge(self::DEFAULT_DATA, $params);
        $data = $this->getNormalizedJsonData($params);
        $dir = __DIR__;
        ob_start();
        passthru("php $dir/{$this->initiator} $data", $resultCode);
        $this->status = $resultCode === 0;

        $output = ob_get_clean();

        return (string)$output;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    private function getNormalizedJsonData(array $list): string
    {
        return str_replace('"', '\"', json_encode($list));
    }

}