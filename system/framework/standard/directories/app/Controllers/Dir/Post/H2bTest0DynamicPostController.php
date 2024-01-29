<?php

declare(strict_types=1);

namespace App\Controllers\Dir\Post;

use Hleb\Base\Controller;
use Hleb\Constructor\Data\View;

class H2bTest0DynamicPostController extends Controller
{  
    public function postFromTemplatePost(): View
    {
        $data = $this->request()->data();

        return view('dynamic/template', [
            'first' => isset($data['first']) ? $data['first']->asString(null) : null,
        ]);
    }
}