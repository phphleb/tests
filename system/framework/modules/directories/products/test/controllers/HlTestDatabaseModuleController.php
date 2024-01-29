<?php

namespace Products\Test\Controllers;

use Hleb\Base\Module;
use Hleb\Static\Settings;

class HlTestDatabaseModuleController extends Module
{
    public function index(): array
    {
       return [
           'base.redis.type' => Settings::getParam('database', 'base.redis.type'),
           'base.db.type' => Settings::getParam('database', 'base.db.type'),
           'db.settings.list' => Settings::getParam('database', 'db.settings.list'),
       ];
    }
}
