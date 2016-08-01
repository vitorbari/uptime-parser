<?php namespace VitorBari\UptimeParser\Parsers;


use VitorBari\UptimeParser\Parser;

class SNMPTimeticks implements ParserInterface
{

    public function match($uptime)
    {
        if (preg_match_all(
            '/^SNMP\ OK\ -\ Timeticks[:,]\ \(\d+\)\ (?<days>\d+)[[:space:]]day[s]?,[[:space:]](?<hours>\d{1,2})[:,](?<minutes>\d{1,2})[:,](?<seconds>\d{1,2}).*$/',
            $uptime,
            $matches
        )) {
            return $matches['days'][0] * Parser::SECONDS_PER_DAY + $matches['hours'][0] * Parser::SECONDS_PER_HOUR +
            $matches['minutes'][0] * Parser::SECONDS_PER_MINUTE + $matches['seconds'][0];
        }
    }
}