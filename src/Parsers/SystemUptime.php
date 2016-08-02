<?php namespace VitorBari\UptimeParser\Parsers;


use VitorBari\UptimeParser\Parser;

class SystemUptime implements ParserInterface
{

    public function match($uptime)
    {
        if (preg_match_all(
            '/^System Uptime\ -\ (?<days>\d+)\ day\(s\)\ (?<hours>\d+)\ hour\(s\)\ (?<minutes>\d+)\ minute\(s\)$/',
            $uptime,
            $matches
        )) {
            return $matches['days'][0] * Parser::SECONDS_PER_DAY + $matches['hours'][0] * Parser::SECONDS_PER_HOUR +
            $matches['minutes'][0] * Parser::SECONDS_PER_MINUTE;
        }
    }
}