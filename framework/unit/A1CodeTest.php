<?php

// Start  phpunit vendor/phphleb/tests/framework/unit/CodeTest.php

require_once __DIR__ . "/../conf.php";

use PHPUnit\Framework\TestCase;

class A1CodeTest extends TestCase
{
    public function testAllCodeValidate()
    {
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(HLEB_PROJECT_DIRECTORY)
        );
        $result = true;
        foreach($files as $file){
            if($file->isFile() && $file->getExtension() === "php"){
                $return = shell_exec("php -l ".  $file->getRealPath());
                if(trim($return)[0] !== "N" && trim($return)[1] !== "o" ){
                    $result = false;
                    continue;
                }
            }
        }

        $this->assertTrue($result);
    }

}

