<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Static\Cache;
use Hleb\Static\Settings;

class HTest0CacheController extends Controller
{
    private const KEY = 'HL_cache_test_b59fef7251d1ab9ec58a5b9a2472bf05';

    private const VALUE = '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>HTML Тест свойств</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .box { border: 1px solid #ccc; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
    <h1>Тест HTML свойств</h1>

    <!-- Текстовые элементы -->
    <div class="box">
        <h2>Текст</h2>
        <p>Обычный текст</p>
        <p><b>Жирный</b> <i>Курсив</i> <u>Подчёркнутый</u></p>
        <p><mark>Выделенный</mark> <del>Удалённый</del> <ins>Вставленный</ins></p>
        <p><sup>Верхний</sup> индекс <sub>Нижний</sub> индекс</p>
    </div>

    <!-- Ссылки -->
    <div class="box">
        <h2>Ссылки</h2>
        <a href="#test">Обычная ссылка</a><br>
        <a href="#" target="_blank">Открыть в новой вкладке</a><br>
        <a href="#" title="Всплывающая подсказка">Ссылка с title</a>
    </div>

    <!-- Изображения -->
    <div class="box">
        <h2>Изображение</h2>
        <img src="data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'100\'%3E%3Crect fill=\'%23ff0000\' width=\'100\' height=\'100\'/%3E%3C/svg%3E"
             alt="Красный квадрат"
             width="100"
             height="100">
    </div>

    <!-- Списки -->
    <div class="box">
        <h2>Списки</h2>
        <ul>
            <li>Пункт 1</li>
            <li>Пункт 2</li>
        </ul>
        <ol>
            <li>Первый</li>
            <li>Второй</li>
        </ol>
    </div>

    <!-- Таблица -->
    <div class="box">
        <h2>Таблица</h2>
        <table border="1">
            <tr>
                <th>Заголовок 1</th>
                <th>Заголовок 2</th>
            </tr>
            <tr>
                <td>Ячейка 1</td>
                <td>Ячейка 2</td>
            </tr>
        </table>
    </div>

    <!-- Формы -->
    <div class="box">
        <h2>Формы</h2>
        <form>
            <input type="text" placeholder="Текст" value="Значение"><br><br>
            <input type="checkbox" checked> Чекбокс<br>
            <input type="radio" name="r"> Радио 1
            <input type="radio" name="r"> Радио 2<br><br>
            <select>
                <option>Опция 1</option>
                <option selected>Опция 2</option>
            </select><br><br>
            <textarea rows="3">Текстовая область</textarea><br><br>
            <button type="button">Кнопка</button>
            <input type="submit" value="Отправить">
        </form>
    </div>

    <!-- Атрибуты данных -->
    <div class="box">
        <h2>Атрибуты</h2>
        <div id="myId" class="myClass" data-custom="значение" hidden>
            Скрытый div
        </div>
        <button onclick="alert(\'Клик!\')">Событие onclick</button>
    </div>

    <!-- Семантические элементы -->
    <div class="box">
        <h2>Семантика</h2>
        <article>Article</article>
        <section>Section</section>
        <aside>Aside</aside>
        <nav>Nav</nav>
        <footer>Footer</footer>
    </div>

</body>
</html>
';


    public function set(): string
    {
        $value = md5(mt_rand() . '-' . microtime(true)) . self::VALUE;
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