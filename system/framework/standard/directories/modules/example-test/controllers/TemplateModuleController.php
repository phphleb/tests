<?php

namespace Modules\ExampleTest\Controllers;

use Hleb\Base\Module;
use Hleb\Constructor\Data\View;

class TemplateModuleController extends Module
{
    public function index(): View
    {
        return view("example");
    }

    public function method(): View
    {
        return view("section/example");
    }

    public function get(): string
    {
        return 'MODULE-VERBS-SUCCESS';
    }

    public function template(): string
    {
        return 'MODULE-TEMPLATE-SUCCESS';
    }

    public function checkParams(): string
    {
        $s = $this->settings();
        return json_encode([
            'database.type' =>  $s->getParam('database','base.db.type'),
            'database.data' => $s->getParam('database','db.settings.list'),
            'main.session.enabled' => $s->getParam('main','session.enabled'),
            'main.db.log.enabled' => $s->getParam('main','db.log.enabled'),
            'main.test.value' => $s->getParam('main','test.value'),
        ]);
    }
}
