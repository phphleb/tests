<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Static\Cache;
use Hleb\Static\Settings;

class HTest0CacheController extends Controller
{
    private const KEY = 'HL_cache_test_b59fef7251d1ab9ec58a5b9a2472bf05';

    public function set(): string
    {
        $value = md5(mt_rand() . '-' . microtime(true));
        Cache::set(self::KEY, $value);

        return $value;
    }

    public function get(): string
    {
        return (string)Cache::get(self::KEY);
    }

    public function expire(): int
    {
        return (int)Cache::getExpire(self::KEY);
    }

    public function delete(): void
    {
        Cache::delete(self::KEY);
    }

    public function clear(): string|false
    {
        return $this->clearData(Settings::getRealPath('@storage/cache/source'));
    }

    public function clearData(?string $path = null): string|false
    {
        if ($path) {
            if (\file_exists($path) && \is_dir($path)) {
                $dir = \opendir($path);
                if (!\is_resource($dir)) {
                    return false;
                }
                while (false !== ($element = \readdir($dir))) {
                    if ($element !== '.' && $element !== '..') {
                        $tmp = $path . '/' . $element;
                        \chmod($tmp, 0777);
                        if (\is_dir($tmp)) {
                            $this->clearData($tmp);
                        } else {
                            \unlink($tmp);
                        }
                    }
                }
                \closedir($dir);
                \clearstatcache();
                if (\is_dir($path)) {
                    \rmdir($path);
                }
            }
        }

        return $path;
    }
}