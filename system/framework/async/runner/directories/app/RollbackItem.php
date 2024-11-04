<?php

namespace App;

use Hleb\Base\RollbackInterface;

// Для проверки сохранения состояния в асинхронном режиме.
class RollbackItem implements RollbackInterface
{
    public static $data = 0;

    #[\Override]
    public static function rollback(): void
    {
        self::$data = 0;
    }
}
