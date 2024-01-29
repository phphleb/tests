<?php

#[\FirstTestAttribute(1234)]
#[\SecondTestAttribute]
class Test0AttributeHelperExample
{
    #[\FirstTestMethodAttribute('abc')]
    #[\SecondTestMethodAttribute]
    public function test()
    {

    }
}