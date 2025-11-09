<?php

return [
    'replace.int' => 100,

    'replace.string' => 'str101',

    'override.int' => '{%replace.int%}', // integer

    'override.levels' => '{%main.replace.temp%}/{%main.replace.var%}/{%replace.int%}/{%replace.string%}',
];
