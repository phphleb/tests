<?php

declare(strict_types=1);

namespace App\Controllers\Dir\Post;

use Hleb\Base\Controller;
use Hleb\Static\Request;

class H2bTest0VariableParamController extends Controller
{  
    public function data(): string
    {
        $dataFromContainer = $this->request()->data();
        $objectData = Request::data();
        $rawData = Request::rawData();
        $type = current($rawData) ?: ($objectData ? current($objectData) : null);

        $result = [];
        if ($type === 'raw') {
            foreach($rawData as $key => $value) {
                $result []= "$key:$value";
            }
        }
        if ($type === 'object') {
            foreach($objectData as $key => $value) {
                $result []= "$key:$value";
            }
        }
        if ($type === 'container') {
            foreach($dataFromContainer as $key => $object) {
                $result []= "$key:" . $object->value();
            }
        }

        return "[" . \implode(',', $result) . "]";
    }

    public function url(): string
    {
        $data = $this->request()->data();

        return url('test.variable.url', ['part1', 'part2']);

    }
}
