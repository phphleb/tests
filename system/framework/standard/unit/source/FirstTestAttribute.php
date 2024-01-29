<?php

#[Attribute]
class FirstTestAttribute
{
  public function __construct(public int $value)
  {
  }
}