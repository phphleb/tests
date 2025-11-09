<?php

declare(strict_types=1);

namespace App\Controllers\Psr;

use Hleb\Base\Controller;
use Hleb\Reference\ArrInterface;
use Hleb\Static\Converter;
use Psr\Log\InvalidArgumentException;

class HTestPsrController extends Controller
{
    public function getLoggerV1(): string
    {
        $logger = Converter::toPsr3Logger();

        return $logger::class;
    }

    public function getLoggerV2(): string
    {
        try {
            Converter::toPsr3Logger()->log('undefined_level', 'test');
        } catch (InvalidArgumentException){
            return 'true';
        }

        return 'false';
    }

    public function getContainerV1(): string
    {
        $container = Converter::toPsr11Container();

        return $container::class;
    }

    public function getContainerV2(): string
    {
        $check = Converter::toPsr11Container()->get(ArrInterface::class)->isAssoc(['test' => 1]);

        return $check ? 'true' : 'false';
    }

    public function getContainerV3(): string
    {
        $check = Converter::toPsr11Container()->has(ArrInterface::class);

        return $check ? 'true' : 'false';
    }
}