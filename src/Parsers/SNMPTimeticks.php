<?php namespace VitorBari\UptimeParser\Parsers;


use VitorBari\UptimeParser\Parser;

class SNMPTimeticks implements ParserInterface
{

    public function match($uptime)
    {
        if (preg_match_all(
            '/^SNMP\sOK\s-\sTimeticks[:,]\s\(\d+\)\s(?<days>\d+)\sday[s]?,\s(?<hours>\d{1,2})[:,](?<minutes>\d{1,2})[:,](?<seconds>\d{1,2}).*$/',
            $uptime,
            $matches
        )) {
            return $matches['days'][0] * Parser::SECONDS_PER_DAY + $matches['hours'][0] * Parser::SECONDS_PER_HOUR +
                $matches['minutes'][0] * Parser::SECONDS_PER_MINUTE + $matches['seconds'][0];
        }
    }
}