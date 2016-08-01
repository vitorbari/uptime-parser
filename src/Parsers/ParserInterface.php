<?php namespace VitorBari\UptimeParser\Parsers;


interface ParserInterface
{
    public function match($uptime);
}