<?php

$code = Hleb\Static\Response::getStatus();

echo strtoupper("TEST-VIEW-FUNC-$code-SUCCESS");