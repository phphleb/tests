<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Static\Settings;

class HTest0SettingsController extends Controller
{
   public function getSettingsData(): array
   {
       $st = $this->settings();

       return [
           'settings.getParam.common' => $st->getParam('common', 'max.log.level', null),
           'settings.getParam.database' => $st->getParam('database', 'base.db.type', null),
           'settings.getParam.main' => $st->getParam('main', 'session.enabled', null),
           'settings.getParam.system' => $st->getParam('system', 'session.name', null),
           'settings.getPath1' => file_exists($st->getPath('@/test.file')),
           'settings.getPath2' => is_dir($st->getPath('global')),
           'settings.getIsCliMode' => $st->isCli(),
           'settings.getIsAsyncMode' => $st->isAsync(),
           'settings.getIsDebug' => $st->isDebug(),
           'settings.isStandardMode' => $st->isStandardMode(),
           'settings.getModuleName' => $st->getModuleName(),
           'settings.getRealPath' => (bool)$st->getRealPath('@global/test.file'),
           'settings.getIsEndingUrl' => $st->isEndingUrl(),
       ];
   }

    public function getSettingsStatic(): array
    {
        return [
            'settings.getParam.common' => Settings::getParam('common', 'max.log.level', null),
            'settings.getParam.database' => Settings::getParam('database', 'base.db.type', null),
            'settings.getParam.main' => Settings::getParam('main', 'session.enabled', null),
            'settings.getParam.system' => Settings::getParam('system', 'session.name', null),
            'settings.getPath1' => file_exists(Settings::getPath('@global/test.file')),
            'settings.getPath2' => is_dir(Settings::getPath('global')),
            'settings.getIsCliMode' => Settings::isCli(),
            'settings.getIsAsyncMode' => Settings::isAsync(),
            'settings.getIsDebug' => Settings::isDebug(),
            'settings.isStandardMode' => Settings::isStandardMode(),
            'settings.getModuleName' => Settings::getModuleName(),
            'settings.getRealPath' => (bool)Settings::getRealPath('@/test.file'),
            'settings.getIsEndingUrl' => Settings::isEndingUrl(),
        ];

    }
}