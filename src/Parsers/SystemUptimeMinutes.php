<?php namespace VitorBari\UptimeParser\Parsers;

use VitorBari\UptimeParser\Parser;

class SystemUptimeMinutes implements ParserInterface
{
    public function match($uptime)
    {
        if (preg_match_all(
            '/^System Uptime\s-\s(?<minutes>\d+)\sminute\(s\)$/i',
            $uptime,
            $matches
        )) {
            return $matches['minutes'][0] * Parser::SECONDS_PER_MINUTE;
        }
    }
}
