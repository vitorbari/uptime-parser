<?php namespace VitorBari\UptimeParser\Parsers;


use VitorBari\UptimeParser\Parser;

class SistemaAtivo implements ParserInterface
{

    public function match($uptime)
    {
        if (preg_match_all(
            '/^Sistema\sativo\sa\s(?<days>\d+)\sDia\(s\),\s(?<hours>\d+)\sHora\(s\)\se\s(?<minutes>\d+)\sMinutos\(s\)$/',
            $uptime,
            $matches
        )) {
            return $matches['days'][0] * Parser::SECONDS_PER_DAY + $matches['hours'][0] * Parser::SECONDS_PER_HOUR +
            $matches['minutes'][0] * Parser::SECONDS_PER_MINUTE;
        }
    }
}