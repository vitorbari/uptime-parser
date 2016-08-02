# uptime-parser

[![Build Status](https://travis-ci.org/vitorbari/uptime-parser.svg?branch=master)](https://travis-ci.org/vitorbari/uptime-parser)

A PHP package for parsing uptime command output

## Installation

Pull in the package through Composer.

```
composer require vitorbari/uptime-parser
```

## Usage


```php
use VitorBari\UptimeParser\Parser;

$uptime_output = 'SNMP OK - Timeticks: (197181577) 22 days, 19:43:35.77';

$uptime = Parser::uptime($uptime_output);

echo $uptime->days; // 22
echo $uptime->hours; // 547
echo $uptime->minutes; // 32863
echo $uptime->seconds; // 1971815
echo $uptime->toTimeString(); // '22 day(s), 19 hour(s), 43 minute(s) and 35 second(s)'

```