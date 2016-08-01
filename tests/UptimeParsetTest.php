<?php

use VitorBari\UptimeParser\Parser;

class UptimeParsetTest extends PHPUnit_Framework_TestCase
{
    public function testDaysGetter()
    {
        $this->assertEquals(22,     Parser::uptime('SNMP OK - Timeticks: (197181577) 22 days, 19:43:35.77')->days);
        $this->assertEquals(22,     Parser::uptime('SNMP OK - Timeticks: (197019927) 22 days, 19:16:39.27')->days);
        $this->assertEquals(18,     Parser::uptime('SNMP OK - Timeticks: (161977941) 18 days, 17:56:19.41')->days);
        $this->assertEquals(48,     Parser::uptime('SNMP OK - Timeticks: (419415644) 48 days, 13:02:36.44')->days);
        $this->assertEquals(1,      Parser::uptime('SNMP OK - Timeticks, (12490039) 1 day, 10,41,40.39')->days);
        $this->assertEquals(1,      Parser::uptime('SNMP OK - Timeticks: (9623260) 1 day, 2:43:52.60')->days);
        $this->assertEquals(2,      Parser::uptime('SNMP OK - Timeticks: (24966798) 2 days, 21:21:07.98')->days);
        $this->assertEquals(3,      Parser::uptime('SNMP OK - Timeticks: (32699917) 3 days, 18:49:59.17')->days);
        $this->assertEquals(4,      Parser::uptime('SNMP OK - Timeticks: (40867300) 4 days, 17:31:13.00')->days);
        $this->assertEquals(257,    Parser::uptime('SNMP OK - Timeticks: (2225335382) 257 days, 13:29:13.82')->days);
        $this->assertEquals(70,     Parser::uptime('SNMP OK - Timeticks: (609933900) 70 days, 14:15:39.00')->days);
        $this->assertEquals(163,    Parser::uptime('SNMP OK - Timeticks: (1416676962) 163 days, 23:12:49.62')->days);
        $this->assertEquals(7,      Parser::uptime('SNMP OK - Timeticks: (65046149) 7 days, 12:41:01.49')->days);
        $this->assertEquals(78,     Parser::uptime('SNMP OK - Timeticks: (680992667) 78 days, 19:38:46.67')->days);
        $this->assertEquals(3,      Parser::uptime('SNMP OK - Timeticks: (29976523) 3 days, 11:16:05.23')->days);
        $this->assertEquals(6,      Parser::uptime('SNMP OK - Timeticks: (53459434) 6 days, 4:29:54.34')->days);
    }

    public function testHoursGetter()
    {
        // days * (hours per day) + hours
        $this->assertEquals(22 * 24 + 19,   Parser::uptime('SNMP OK - Timeticks: (197181577) 22 days, 19:43:35.77')->hours);
        $this->assertEquals(22 * 24 + 19,   Parser::uptime('SNMP OK - Timeticks: (197019927) 22 days, 19:16:39.27')->hours);
        $this->assertEquals(18 * 24 + 17,   Parser::uptime('SNMP OK - Timeticks: (161977941) 18 days, 17:56:19.41')->hours);
        $this->assertEquals(48 * 24 + 13,   Parser::uptime('SNMP OK - Timeticks: (419415644) 48 days, 13:02:36.44')->hours);
        $this->assertEquals(1 * 24 + 10,    Parser::uptime('SNMP OK - Timeticks, (12490039) 1 day, 10,41,40.39')->hours);
        $this->assertEquals(1 * 24 + 2,     Parser::uptime('SNMP OK - Timeticks: (9623260) 1 day, 2:43:52.60')->hours);
        $this->assertEquals(2 * 24 + 21,    Parser::uptime('SNMP OK - Timeticks: (24966798) 2 days, 21:21:07.98')->hours);
        $this->assertEquals(3 * 24 + 18,    Parser::uptime('SNMP OK - Timeticks: (32699917) 3 days, 18:49:59.17')->hours);
        $this->assertEquals(4 * 24 + 17,    Parser::uptime('SNMP OK - Timeticks: (40867300) 4 days, 17:31:13.00')->hours);
        $this->assertEquals(257 * 24 + 13,  Parser::uptime('SNMP OK - Timeticks: (2225335382) 257 days, 13:29:13.82')->hours);
        $this->assertEquals(70 * 24 + 14,   Parser::uptime('SNMP OK - Timeticks: (609933900) 70 days, 14:15:39.00')->hours);
        $this->assertEquals(163 * 24 + 23,  Parser::uptime('SNMP OK - Timeticks: (1416676962) 163 days, 23:12:49.62')->hours);
        $this->assertEquals(7 * 24 + 12,    Parser::uptime('SNMP OK - Timeticks: (65046149) 7 days, 12:41:01.49')->hours);
        $this->assertEquals(78 * 24 + 19,   Parser::uptime('SNMP OK - Timeticks: (680992667) 78 days, 19:38:46.67')->hours);
        $this->assertEquals(3 * 24 + 11,    Parser::uptime('SNMP OK - Timeticks: (29976523) 3 days, 11:16:05.23')->hours);
        $this->assertEquals(6 * 24 + 4,     Parser::uptime('SNMP OK - Timeticks: (53459434) 6 days, 4:29:54.34')->hours);
    }

    public function testMinutesGetter()
    {
        // days * (minutes per day) + hours * (minutes per hour) + minutes
        $this->assertEquals(22 * 1440 + 19 * 60 + 43,   Parser::uptime('SNMP OK - Timeticks: (197181577) 22 days, 19:43:35.77')->minutes);
        $this->assertEquals(22 * 1440 + 19 * 60 + 16,   Parser::uptime('SNMP OK - Timeticks: (197019927) 22 days, 19:16:39.27')->minutes);
        $this->assertEquals(18 * 1440 + 17 * 60 + 56,   Parser::uptime('SNMP OK - Timeticks: (161977941) 18 days, 17:56:19.41')->minutes);
        $this->assertEquals(48 * 1440 + 13 * 60 + 02,   Parser::uptime('SNMP OK - Timeticks: (419415644) 48 days, 13:02:36.44')->minutes);
        $this->assertEquals(1 * 1440 + 10 * 60 + 41,    Parser::uptime('SNMP OK - Timeticks, (12490039) 1 day, 10,41,40.39')->minutes);
        $this->assertEquals(1 * 1440 + 2 * 60 + 43,     Parser::uptime('SNMP OK - Timeticks: (9623260) 1 day, 2:43:52.60')->minutes);
        $this->assertEquals(2 * 1440 + 21 * 60 + 21,    Parser::uptime('SNMP OK - Timeticks: (24966798) 2 days, 21:21:07.98')->minutes);
        $this->assertEquals(3 * 1440 + 18 * 60 + 49,    Parser::uptime('SNMP OK - Timeticks: (32699917) 3 days, 18:49:59.17')->minutes);
        $this->assertEquals(4 * 1440 + 17 * 60 + 31,    Parser::uptime('SNMP OK - Timeticks: (40867300) 4 days, 17:31:13.00')->minutes);
        $this->assertEquals(257 * 1440 + 13 * 60 + 29,  Parser::uptime('SNMP OK - Timeticks: (2225335382) 257 days, 13:29:13.82')->minutes);
        $this->assertEquals(70 * 1440 + 14 * 60 + 15,   Parser::uptime('SNMP OK - Timeticks: (609933900) 70 days, 14:15:39.00')->minutes);
        $this->assertEquals(163 * 1440 + 23 * 60 + 12,  Parser::uptime('SNMP OK - Timeticks: (1416676962) 163 days, 23:12:49.62')->minutes);
        $this->assertEquals(7 * 1440 + 12 * 60 + 41,    Parser::uptime('SNMP OK - Timeticks: (65046149) 7 days, 12:41:01.49')->minutes);
        $this->assertEquals(78 * 1440 + 19 * 60 + 38,   Parser::uptime('SNMP OK - Timeticks: (680992667) 78 days, 19:38:46.67')->minutes);
        $this->assertEquals(3 * 1440 + 11 * 60 + 16,    Parser::uptime('SNMP OK - Timeticks: (29976523) 3 days, 11:16:05.23')->minutes);
        $this->assertEquals(6 * 1440 + 4 * 60 + 29,     Parser::uptime('SNMP OK - Timeticks: (53459434) 6 days, 4:29:54.34')->minutes);
    }

    public function testSecondsGetter()
    {
        // days * (seconds per day) + hours * (seconds per hour) + minutes * (seconds per minute) + seconds
        $this->assertEquals(22 * 86400 + 19 * 3600 + 43 * 60 + 35,   Parser::uptime('SNMP OK - Timeticks: (197181577) 22 days, 19:43:35.77')->seconds);
        $this->assertEquals(22 * 86400 + 19 * 3600 + 16 * 60 + 39,   Parser::uptime('SNMP OK - Timeticks: (197019927) 22 days, 19:16:39.27')->seconds);
        $this->assertEquals(18 * 86400 + 17 * 3600 + 56 * 60 + 19,   Parser::uptime('SNMP OK - Timeticks: (161977941) 18 days, 17:56:19.41')->seconds);
        $this->assertEquals(48 * 86400 + 13 * 3600 + 02 * 60 + 36,   Parser::uptime('SNMP OK - Timeticks: (419415644) 48 days, 13:02:36.44')->seconds);
        $this->assertEquals(1 * 86400 + 10 * 3600 + 41 * 60 + 40,    Parser::uptime('SNMP OK - Timeticks, (12490039) 1 day, 10,41,40.39')->seconds);
        $this->assertEquals(1 * 86400 + 2 * 3600 + 43 * 60 + 52,     Parser::uptime('SNMP OK - Timeticks: (9623260) 1 day, 2:43:52.60')->seconds);
        $this->assertEquals(2 * 86400 + 21 * 3600 + 21 * 60 + 07,    Parser::uptime('SNMP OK - Timeticks: (24966798) 2 days, 21:21:07.98')->seconds);
        $this->assertEquals(3 * 86400 + 18 * 3600 + 49 * 60 + 59,    Parser::uptime('SNMP OK - Timeticks: (32699917) 3 days, 18:49:59.17')->seconds);
        $this->assertEquals(4 * 86400 + 17 * 3600 + 31 * 60 + 13,    Parser::uptime('SNMP OK - Timeticks: (40867300) 4 days, 17:31:13.00')->seconds);
        $this->assertEquals(257 * 86400 + 13 * 3600 + 29 * 60 + 13,  Parser::uptime('SNMP OK - Timeticks: (2225335382) 257 days, 13:29:13.82')->seconds);
        $this->assertEquals(70 * 86400 + 14 * 3600 + 15 * 60 + 39,   Parser::uptime('SNMP OK - Timeticks: (609933900) 70 days, 14:15:39.00')->seconds);
        $this->assertEquals(163 * 86400 + 23 * 3600 + 12 * 60 + 49,  Parser::uptime('SNMP OK - Timeticks: (1416676962) 163 days, 23:12:49.62')->seconds);
        $this->assertEquals(7 * 86400 + 12 * 3600 + 41 * 60 + 01,    Parser::uptime('SNMP OK - Timeticks: (65046149) 7 days, 12:41:01.49')->seconds);
        $this->assertEquals(78 * 86400 + 19 * 3600 + 38 * 60 + 46,   Parser::uptime('SNMP OK - Timeticks: (680992667) 78 days, 19:38:46.67')->seconds);
        $this->assertEquals(3 * 86400 + 11 * 3600 + 16 * 60 + 05,    Parser::uptime('SNMP OK - Timeticks: (29976523) 3 days, 11:16:05.23')->seconds);
        $this->assertEquals(6 * 86400 + 4 * 3600 + 29 * 60 + 54,     Parser::uptime('SNMP OK - Timeticks: (53459434) 6 days, 4:29:54.34')->seconds);
    }
}
