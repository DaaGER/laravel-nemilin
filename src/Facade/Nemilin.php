<?php


namespace DaaGER\Nemilin\Facade;


use Illuminate\Support\Facades\Facade;

class Nemilin extends Facade
{
protected static function getFacadeAccessor(): string
{
    return 'nemilin';
}
}
