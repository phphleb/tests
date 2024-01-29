<?php

#[Attribute]
class FirstTestMethodAttribute
{
    public function __construct(public string $value)
    {
    }
}