<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/KeyTest.php

require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/BaseSingleton.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Insert/DeterminantStaticUncreated.php";
require_once HLEB_FRAMEWORK_DIR . "Main/Errors/ErrorOutput.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Key.php";

// При запуске теста может сгенерироваться ключ кэша, без особых последствий.

use PHPUnit\Framework\TestCase;
use Hleb\Constructor\Handlers\Key;

class KeyTest extends TestCase
{
    private $session;

    // Совпадает ли установленная сессия с ключом (первоначальная проверка!)
    public function testCreateKeyInSession()
    {
        $value = $this->mainTestGetObj();
        $this->assertTrue($_SESSION['_SECURITY_TOKEN'] === $value);
    }

     // Работает ли вывод чего-либо
    public function testCreateMethod()
    {
        $this->assertTrue(is_string($this->mainTestGetObj()));
    }

    // В правильном ли формате ключ
    public function testCreateValidKey()
    {
        $data =  preg_match('/[^a-z0-9]/', $this->mainTestGetObj(), $matches);

        $this->assertTrue(count($matches) == 0);
    }

    private function mainTestGetObj()
    {
        return (Key::get());
    }


}