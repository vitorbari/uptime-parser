<?php

use VitorBari\UptimeParser\Parser;

use PHPUnit\Framework\TestCase;

class UptimeParsetTest extends TestCase
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

        $this->assertEquals(0,      Parser::uptime('SNMP OK - Timeticks, (6261427) 17,23,34.27')->days);
        $this->assertEquals(0,      Parser::uptime('SNMP OK - Timeticks: (1292426) 3:35:24.26')->days);
        $this->assertEquals(0,      Parser::uptime('SNMP OK - Timeticks: (3468804) 9:38:08.04')->days);
        $this->assertEquals(0,      Parser::uptime('SNMP OK - Timeticks: (3194230) 8:52:22.30')->days);
        $this->assertEquals(0,      Parser::uptime('SNMP OK - Timeticks: (43423) 0:07:14.23')->days);
        $this->assertEquals(0,      Parser::uptime('SNMP OK - Timeticks: (5900) 0:00:59.00')->days);
        $this->assertEquals(0,      Parser::uptime('SNMP OK - Timeticks: (30405) 0:05:04.05')->days);
        $this->assertEquals(0,      Parser::uptime('SNMP OK - Timeticks: (1400) 0:00:14.00')->days);
        $this->assertEquals(0,      Parser::uptime('SNMP OK - Timeticks: (15773) 0:02:37.73')->days);

        $this->assertEquals(44,     Parser::uptime('System Uptime - 44 day(s) 23 hour(s) 14 minute(s)')->days);
        $this->assertEquals(51,     Parser::uptime('System Uptime - 51 day(s) 4 hour(s) 38 minute(s)')->days);
        $this->assertEquals(0,      Parser::uptime('System Uptime - 0 day(s) 0 hour(s) 11 minute(s)')->days);
        $this->assertEquals(1,      Parser::uptime('System Uptime - 1 day(s) 23 hour(s) 40 minute(s)')->days);
        $this->assertEquals(8,      Parser::uptime('System Uptime - 8 day(s) 12 hour(s) 44 minute(s)')->days);
        $this->assertEquals(117,    Parser::uptime('System Uptime - 117 day(s) 17 hour(s) 18 minute(s)')->days);

        $this->assertEquals(57,     Parser::uptime('System Uptime - up 57 days, 12 Hours, 41 Minutes')->days);
        $this->assertEquals(22,     Parser::uptime('System Uptime - up 22 days, 6 Hours, 24 Minutes')->days);
        $this->assertEquals(19,     Parser::uptime('System Uptime - up 19 days, 17 Hours, 02 Minutes')->days);
        $this->assertEquals(100,    Parser::uptime('System Uptime - up 100 days, 7 Hours, 57 Minutes')->days);

        $this->assertEquals(57,     Parser::uptime('Sistema ativo a 57 Dia(s), 12 Hora(s) e 41 Minutos(s)')->days);
        $this->assertEquals(0,      Parser::uptime('Sistema ativo a 0 Dia(s), 2 Hora(s) e 21 Minutos(s)')->days);
        $this->assertEquals(245,    Parser::uptime('Sistema ativo a 245 Dia(s), 10 Hora(s) e 09 Minutos(s)')->days);
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

        $this->assertEquals(17,             Parser::uptime('SNMP OK - Timeticks, (6261427) 17,23,34.27')->hours);
        $this->assertEquals(3,              Parser::uptime('SNMP OK - Timeticks: (1292426) 3:35:24.26')->hours);
        $this->assertEquals(9,              Parser::uptime('SNMP OK - Timeticks: (3468804) 9:38:08.04')->hours);
        $this->assertEquals(8,              Parser::uptime('SNMP OK - Timeticks: (3194230) 8:52:22.30')->hours);
        $this->assertEquals(0,              Parser::uptime('SNMP OK - Timeticks: (43423) 0:07:14.23')->hours);
        $this->assertEquals(0,              Parser::uptime('SNMP OK - Timeticks: (5900) 0:00:59.00')->hours);
        $this->assertEquals(0,              Parser::uptime('SNMP OK - Timeticks: (30405) 0:05:04.05')->hours);
        $this->assertEquals(0,              Parser::uptime('SNMP OK - Timeticks: (1400) 0:00:14.00')->hours);
        $this->assertEquals(0,              Parser::uptime('SNMP OK - Timeticks: (15773) 0:02:37.73')->hours);

        $this->assertEquals(44 * 24 + 23,   Parser::uptime('System Uptime - 44 day(s) 23 hour(s) 14 minute(s)')->hours);
        $this->assertEquals(51 * 24 + 4,    Parser::uptime('System Uptime - 51 day(s) 4 hour(s) 38 minute(s)')->hours);
        $this->assertEquals(0 * 24 + 0,     Parser::uptime('System Uptime - 0 day(s) 0 hour(s) 11 minute(s)')->hours);
        $this->assertEquals(1 * 24 + 23,    Parser::uptime('System Uptime - 1 day(s) 23 hour(s) 40 minute(s)')->hours);
        $this->assertEquals(8 * 24 + 12,    Parser::uptime('System Uptime - 8 day(s) 12 hour(s) 44 minute(s)')->hours);
        $this->assertEquals(117 * 24 + 17,  Parser::uptime('System Uptime - 117 day(s) 17 hour(s) 18 minute(s)')->hours);

        $this->assertEquals(57 * 24 + 12,   Parser::uptime('System Uptime - up 57 days, 12 Hours, 41 Minutes')->hours);
        $this->assertEquals(22 * 24 + 6,    Parser::uptime('System Uptime - up 22 days, 6 Hours, 24 Minutes')->hours);
        $this->assertEquals(19 * 24 + 17,   Parser::uptime('System Uptime - up 19 days, 17 Hours, 02 Minutes')->hours);
        $this->assertEquals(100 * 24 + 7,   Parser::uptime('System Uptime - up 100 days, 7 Hours, 57 Minutes')->hours);

        $this->assertEquals(57 * 24 + 12,   Parser::uptime('Sistema ativo a 57 Dia(s), 12 Hora(s) e 41 Minutos(s)')->hours);
        $this->assertEquals(0 * 24  + 2,    Parser::uptime('Sistema ativo a 0 Dia(s), 2 Hora(s) e 21 Minutos(s)')->hours);
        $this->assertEquals(245 * 24 + 10,  Parser::uptime('Sistema ativo a 245 Dia(s), 10 Hora(s) e 09 Minutos(s)')->hours);
    }

    public function testMinutesGetter()
    {
        // days * (minutes per day) + hours * (minutes per hour) + minutes
        $this->assertEquals(22 * 1440 + 19 * 60 + 43,   Parser::uptime('SNMP OK - Timeticks: (197181577) 22 days, 19:43:35.77')->minutes);
        $this->assertEquals(22 * 1440 + 19 * 60 + 16,   Parser::uptime('SNMP OK - Timeticks: (197019927) 22 days, 19:16:39.27')->minutes);
        $this->assertEquals(18 * 1440 + 17 * 60 + 56,   Parser::uptime('SNMP OK - Timeticks: (161977941) 18 days, 17:56:19.41')->minutes);
        $this->assertEquals(48 * 1440 + 13 * 60 + 2,    Parser::uptime('SNMP OK - Timeticks: (419415644) 48 days, 13:02:36.44')->minutes);
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

        $this->assertEquals(17 * 60 + 23,               Parser::uptime('SNMP OK - Timeticks, (6261427) 17,23,34.27')->minutes);
        $this->assertEquals(3 * 60 + 35,                Parser::uptime('SNMP OK - Timeticks: (1292426) 3:35:24.26')->minutes);
        $this->assertEquals(9 * 60 + 38,                Parser::uptime('SNMP OK - Timeticks: (3468804) 9:38:08.04')->minutes);
        $this->assertEquals(8 * 60 + 52,                Parser::uptime('SNMP OK - Timeticks: (3194230) 8:52:22.30')->minutes);
        $this->assertEquals(0 * 60 + 7,                 Parser::uptime('SNMP OK - Timeticks: (43423) 0:07:14.23')->minutes);
        $this->assertEquals(0 * 60 + 0,                 Parser::uptime('SNMP OK - Timeticks: (5900) 0:00:59.00')->minutes);
        $this->assertEquals(0 * 60 + 5,                 Parser::uptime('SNMP OK - Timeticks: (30405) 0:05:04.05')->minutes);
        $this->assertEquals(0 * 60 + 0,                 Parser::uptime('SNMP OK - Timeticks: (1400) 0:00:14.00')->minutes);
        $this->assertEquals(0 * 60 + 2,                 Parser::uptime('SNMP OK - Timeticks: (15773) 0:02:37.73')->minutes);

        $this->assertEquals(44 * 1440 + 23 * 60 + 14,   Parser::uptime('System Uptime - 44 day(s) 23 hour(s) 14 minute(s)')->minutes);
        $this->assertEquals(51 * 1440 + 4 * 60 + 38,    Parser::uptime('System Uptime - 51 day(s) 4 hour(s) 38 minute(s)')->minutes);
        $this->assertEquals(0 * 1440 + 0 * 60 + 11,     Parser::uptime('System Uptime - 0 day(s) 0 hour(s) 11 minute(s)')->minutes);
        $this->assertEquals(1 * 1440 + 23 * 60 + 40,    Parser::uptime('System Uptime - 1 day(s) 23 hour(s) 40 minute(s)')->minutes);
        $this->assertEquals(8 * 1440 + 12 * 60 + 44,    Parser::uptime('System Uptime - 8 day(s) 12 hour(s) 44 minute(s)')->minutes);
        $this->assertEquals(117 * 1440 + 17 * 60 + 18,  Parser::uptime('System Uptime - 117 day(s) 17 hour(s) 18 minute(s)')->minutes);

        $this->assertEquals(57 * 1440 + 12 * 60 + 41,   Parser::uptime('System Uptime - up 57 days, 12 Hours, 41 Minutes')->minutes);
        $this->assertEquals(22 * 1440 + 6 * 60 + 24,    Parser::uptime('System Uptime - up 22 days, 6 Hours, 24 Minutes')->minutes);
        $this->assertEquals(19 * 1440 + 17 * 60 + 2,    Parser::uptime('System Uptime - up 19 days, 17 Hours, 02 Minutes')->minutes);
        $this->assertEquals(100 * 1440 + 7 * 60 + 57,   Parser::uptime('System Uptime - up 100 days, 7 Hours, 57 Minutes')->minutes);

        $this->assertEquals(57 * 1440 + 12 * 60 + 41,   Parser::uptime('Sistema ativo a 57 Dia(s), 12 Hora(s) e 41 Minutos(s)')->minutes);
        $this->assertEquals(0 * 1440 + 2 * 60 + 21,     Parser::uptime('Sistema ativo a 0 Dia(s), 2 Hora(s) e 21 Minutos(s)')->minutes);
        $this->assertEquals(245 * 1440 + 10 * 60 + 9,   Parser::uptime('Sistema ativo a 245 Dia(s), 10 Hora(s) e 09 Minutos(s)')->minutes);

        $this->assertEquals(23,                         Parser::uptime('System Uptime - 23 minute(s)')->minutes);
        $this->assertEquals(1440,                       Parser::uptime('System Uptime - 1440 minute(s)')->minutes);
        $this->assertEquals(5760,                       Parser::uptime('System Uptime - 5760 minute(s)')->minutes);
    }

    public function testSecondsGetter()
    {
        // days * (seconds per day) + hours * (seconds per hour) + minutes * (seconds per minute) + seconds
        $this->assertEquals(22 * 86400 + 19 * 3600 + 43 * 60 + 35,   Parser::uptime('SNMP OK - Timeticks: (197181577) 22 days, 19:43:35.77')->seconds);
        $this->assertEquals(22 * 86400 + 19 * 3600 + 16 * 60 + 39,   Parser::uptime('SNMP OK - Timeticks: (197019927) 22 days, 19:16:39.27')->seconds);
        $this->assertEquals(18 * 86400 + 17 * 3600 + 56 * 60 + 19,   Parser::uptime('SNMP OK - Timeticks: (161977941) 18 days, 17:56:19.41')->seconds);
        $this->assertEquals(48 * 86400 + 13 * 3600 + 2 * 60 + 36,    Parser::uptime('SNMP OK - Timeticks: (419415644) 48 days, 13:02:36.44')->seconds);
        $this->assertEquals(1 * 86400 + 10 * 3600 + 41 * 60 + 40,    Parser::uptime('SNMP OK - Timeticks, (12490039) 1 day, 10,41,40.39')->seconds);
        $this->assertEquals(1 * 86400 + 2 * 3600 + 43 * 60 + 52,     Parser::uptime('SNMP OK - Timeticks: (9623260) 1 day, 2:43:52.60')->seconds);
        $this->assertEquals(2 * 86400 + 21 * 3600 + 21 * 60 + 7,     Parser::uptime('SNMP OK - Timeticks: (24966798) 2 days, 21:21:07.98')->seconds);
        $this->assertEquals(3 * 86400 + 18 * 3600 + 49 * 60 + 59,    Parser::uptime('SNMP OK - Timeticks: (32699917) 3 days, 18:49:59.17')->seconds);
        $this->assertEquals(4 * 86400 + 17 * 3600 + 31 * 60 + 13,    Parser::uptime('SNMP OK - Timeticks: (40867300) 4 days, 17:31:13.00')->seconds);
        $this->assertEquals(257 * 86400 + 13 * 3600 + 29 * 60 + 13,  Parser::uptime('SNMP OK - Timeticks: (2225335382) 257 days, 13:29:13.82')->seconds);
        $this->assertEquals(70 * 86400 + 14 * 3600 + 15 * 60 + 39,   Parser::uptime('SNMP OK - Timeticks: (609933900) 70 days, 14:15:39.00')->seconds);
        $this->assertEquals(163 * 86400 + 23 * 3600 + 12 * 60 + 49,  Parser::uptime('SNMP OK - Timeticks: (1416676962) 163 days, 23:12:49.62')->seconds);
        $this->assertEquals(7 * 86400 + 12 * 3600 + 41 * 60 + 1,     Parser::uptime('SNMP OK - Timeticks: (65046149) 7 days, 12:41:01.49')->seconds);
        $this->assertEquals(78 * 86400 + 19 * 3600 + 38 * 60 + 46,   Parser::uptime('SNMP OK - Timeticks: (680992667) 78 days, 19:38:46.67')->seconds);
        $this->assertEquals(3 * 86400 + 11 * 3600 + 16 * 60 + 05,    Parser::uptime('SNMP OK - Timeticks: (29976523) 3 days, 11:16:05.23')->seconds);
        $this->assertEquals(6 * 86400 + 4 * 3600 + 29 * 60 + 54,     Parser::uptime('SNMP OK - Timeticks: (53459434) 6 days, 4:29:54.34')->seconds);

        $this->assertEquals(17 * 3600 + 23 * 60 + 34,                Parser::uptime('SNMP OK - Timeticks, (6261427) 17,23,34.27')->seconds);
        $this->assertEquals(3 * 3600 + 35 * 60 + 24,                 Parser::uptime('SNMP OK - Timeticks: (1292426) 3:35:24.26')->seconds);
        $this->assertEquals(9 * 3600 + 38 * 60 + 8,                  Parser::uptime('SNMP OK - Timeticks: (3468804) 9:38:08.04')->seconds);
        $this->assertEquals(8 * 3600 + 52 * 60 + 22,                 Parser::uptime('SNMP OK - Timeticks: (3194230) 8:52:22.30')->seconds);
        $this->assertEquals(0 * 3600 + 7 * 60 + 14,                  Parser::uptime('SNMP OK - Timeticks: (43423) 0:07:14.23')->seconds);
        $this->assertEquals(0 * 3600 + 00 * 60 + 59,                 Parser::uptime('SNMP OK - Timeticks: (5900) 0:00:59.00')->seconds);
        $this->assertEquals(0 * 3600 + 5 * 60 + 4,                   Parser::uptime('SNMP OK - Timeticks: (30405) 0:05:04.05')->seconds);
        $this->assertEquals(0 * 3600 + 0 * 60 + 14,                  Parser::uptime('SNMP OK - Timeticks: (1400) 0:00:14.00')->seconds);
        $this->assertEquals(0 * 3600 + 2 * 60 + 37,                  Parser::uptime('SNMP OK - Timeticks: (15773) 0:02:37.73')->seconds);

        $this->assertEquals(44 * 86400 + 23 * 3600 + 14 * 60,        Parser::uptime('System Uptime - 44 day(s) 23 hour(s) 14 minute(s)')->seconds);
        $this->assertEquals(51 * 86400 + 4 * 3600 + 38 * 60,         Parser::uptime('System Uptime - 51 day(s) 4 hour(s) 38 minute(s)')->seconds);
        $this->assertEquals(0 * 86400 + 0 * 3600 + 11 * 60,          Parser::uptime('System Uptime - 0 day(s) 0 hour(s) 11 minute(s)')->seconds);
        $this->assertEquals(1 * 86400 + 23 * 3600 + 40 * 60,         Parser::uptime('System Uptime - 1 day(s) 23 hour(s) 40 minute(s)')->seconds);
        $this->assertEquals(8 * 86400 + 12 * 3600 + 44 * 60,         Parser::uptime('System Uptime - 8 day(s) 12 hour(s) 44 minute(s)')->seconds);
        $this->assertEquals(117 * 86400 + 17 * 3600 + 18 * 60,       Parser::uptime('System Uptime - 117 day(s) 17 hour(s) 18 minute(s)')->seconds);

        $this->assertEquals(57 * 86400 + 12 * 3600 + 41 * 60,        Parser::uptime('System Uptime - up 57 days, 12 Hours, 41 Minutes')->seconds);
        $this->assertEquals(22 * 86400 + 6 * 3600 + 24 * 60,         Parser::uptime('System Uptime - up 22 days, 6 Hours, 24 Minutes')->seconds);
        $this->assertEquals(19 * 86400 + 17 * 3600 + 2 * 60,         Parser::uptime('System Uptime - up 19 days, 17 Hours, 02 Minutes')->seconds);
        $this->assertEquals(100 * 86400 + 7 * 3600 + 57 * 60,        Parser::uptime('System Uptime - up 100 days, 7 Hours, 57 Minutes')->seconds);

        $this->assertEquals(57 * 86400 + 12 * 3600 + 41 * 60,        Parser::uptime('Sistema ativo a 57 Dia(s), 12 Hora(s) e 41 Minutos(s)')->seconds);
        $this->assertEquals(0 * 86400 + 2 * 3600 + 21 * 60,          Parser::uptime('Sistema ativo a 0 Dia(s), 2 Hora(s) e 21 Minutos(s)')->seconds);
        $this->assertEquals(245 * 86400 + 10 * 3600 + 9 * 60,        Parser::uptime('Sistema ativo a 245 Dia(s), 10 Hora(s) e 09 Minutos(s)')->seconds);
    }

    public function testTimeStringGetter()
    {
        $this->assertEquals('22 day(s), 19 hour(s), 43 minute(s) and 35 second(s)',   Parser::uptime('SNMP OK - Timeticks: (197181577) 22 days, 19:43:35.77')->toTimeString());
        $this->assertEquals('22 day(s), 19 hour(s), 16 minute(s) and 39 second(s)',   Parser::uptime('SNMP OK - Timeticks: (197019927) 22 days, 19:16:39.27')->toTimeString());
        $this->assertEquals('18 day(s), 17 hour(s), 56 minute(s) and 19 second(s)',   Parser::uptime('SNMP OK - Timeticks: (161977941) 18 days, 17:56:19.41')->toTimeString());
        $this->assertEquals('48 day(s), 13 hour(s), 2 minute(s) and 36 second(s)',    Parser::uptime('SNMP OK - Timeticks: (419415644) 48 days, 13:02:36.44')->toTimeString());
        $this->assertEquals('1 day(s), 10 hour(s), 41 minute(s) and 40 second(s)',    Parser::uptime('SNMP OK - Timeticks, (12490039) 1 day, 10,41,40.39')->toTimeString());
        $this->assertEquals('1 day(s), 2 hour(s), 43 minute(s) and 52 second(s)',     Parser::uptime('SNMP OK - Timeticks: (9623260) 1 day, 2:43:52.60')->toTimeString());
        $this->assertEquals('2 day(s), 21 hour(s), 21 minute(s) and 7 second(s)',     Parser::uptime('SNMP OK - Timeticks: (24966798) 2 days, 21:21:07.98')->toTimeString());
        $this->assertEquals('3 day(s), 18 hour(s), 49 minute(s) and 59 second(s)',    Parser::uptime('SNMP OK - Timeticks: (32699917) 3 days, 18:49:59.17')->toTimeString());
        $this->assertEquals('4 day(s), 17 hour(s), 31 minute(s) and 13 second(s)',    Parser::uptime('SNMP OK - Timeticks: (40867300) 4 days, 17:31:13.00')->toTimeString());
        $this->assertEquals('257 day(s), 13 hour(s), 29 minute(s) and 13 second(s)',  Parser::uptime('SNMP OK - Timeticks: (2225335382) 257 days, 13:29:13.82')->toTimeString());
        $this->assertEquals('70 day(s), 14 hour(s), 15 minute(s) and 39 second(s)',   Parser::uptime('SNMP OK - Timeticks: (609933900) 70 days, 14:15:39.00')->toTimeString());
        $this->assertEquals('163 day(s), 23 hour(s), 12 minute(s) and 49 second(s)',  Parser::uptime('SNMP OK - Timeticks: (1416676962) 163 days, 23:12:49.62')->toTimeString());
        $this->assertEquals('7 day(s), 12 hour(s), 41 minute(s) and 1 second(s)',     Parser::uptime('SNMP OK - Timeticks: (65046149) 7 days, 12:41:01.49')->toTimeString());
        $this->assertEquals('78 day(s), 19 hour(s), 38 minute(s) and 46 second(s)',   Parser::uptime('SNMP OK - Timeticks: (680992667) 78 days, 19:38:46.67')->toTimeString());
        $this->assertEquals('3 day(s), 11 hour(s), 16 minute(s) and 5 second(s)',     Parser::uptime('SNMP OK - Timeticks: (29976523) 3 days, 11:16:05.23')->toTimeString());
        $this->assertEquals('6 day(s), 4 hour(s), 29 minute(s) and 54 second(s)',     Parser::uptime('SNMP OK - Timeticks: (53459434) 6 days, 4:29:54.34')->toTimeString());

        $this->assertEquals('0 day(s), 17 hour(s), 23 minute(s) and 34 second(s)',    Parser::uptime('SNMP OK - Timeticks, (6261427) 17,23,34.27')->toTimeString());
        $this->assertEquals('0 day(s), 3 hour(s), 35 minute(s) and 24 second(s)',     Parser::uptime('SNMP OK - Timeticks: (1292426) 3:35:24.26')->toTimeString());
        $this->assertEquals('0 day(s), 9 hour(s), 38 minute(s) and 8 second(s)',      Parser::uptime('SNMP OK - Timeticks: (3468804) 9:38:08.04')->toTimeString());
        $this->assertEquals('0 day(s), 8 hour(s), 52 minute(s) and 22 second(s)',     Parser::uptime('SNMP OK - Timeticks: (3194230) 8:52:22.30')->toTimeString());
        $this->assertEquals('0 day(s), 0 hour(s), 7 minute(s) and 14 second(s)',      Parser::uptime('SNMP OK - Timeticks: (43423) 0:07:14.23')->toTimeString());
        $this->assertEquals('0 day(s), 0 hour(s), 0 minute(s) and 59 second(s)',      Parser::uptime('SNMP OK - Timeticks: (5900) 0:00:59.00')->toTimeString());
        $this->assertEquals('0 day(s), 0 hour(s), 5 minute(s) and 4 second(s)',       Parser::uptime('SNMP OK - Timeticks: (30405) 0:05:04.05')->toTimeString());
        $this->assertEquals('0 day(s), 0 hour(s), 0 minute(s) and 14 second(s)',      Parser::uptime('SNMP OK - Timeticks: (1400) 0:00:14.00')->toTimeString());
        $this->assertEquals('0 day(s), 0 hour(s), 2 minute(s) and 37 second(s)',      Parser::uptime('SNMP OK - Timeticks: (15773) 0:02:37.73')->toTimeString());

        $this->assertEquals('44 day(s), 23 hour(s), 14 minute(s) and 0 second(s)',    Parser::uptime('System Uptime - 44 day(s) 23 hour(s) 14 minute(s)')->toTimeString());
        $this->assertEquals('51 day(s), 4 hour(s), 38 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - 51 day(s) 4 hour(s) 38 minute(s)')->toTimeString());
        $this->assertEquals('0 day(s), 0 hour(s), 11 minute(s) and 0 second(s)',      Parser::uptime('System Uptime - 0 day(s) 0 hour(s) 11 minute(s)')->toTimeString());
        $this->assertEquals('1 day(s), 23 hour(s), 40 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - 1 day(s) 23 hour(s) 40 minute(s)')->toTimeString());
        $this->assertEquals('8 day(s), 12 hour(s), 44 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - 8 day(s) 12 hour(s) 44 minute(s)')->toTimeString());
        $this->assertEquals('117 day(s), 17 hour(s), 18 minute(s) and 0 second(s)',   Parser::uptime('System Uptime - 117 day(s) 17 hour(s) 18 minute(s)')->toTimeString());

        $this->assertEquals('57 day(s), 12 hour(s), 41 minute(s) and 0 second(s)',    Parser::uptime('System Uptime - up 57 days, 12 Hours, 41 Minutes')->toTimeString());
        $this->assertEquals('22 day(s), 6 hour(s), 24 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - up 22 days, 6 Hours, 24 Minutes')->toTimeString());
        $this->assertEquals('19 day(s), 17 hour(s), 2 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - up 19 days, 17 Hours, 02 Minutes')->toTimeString());
        $this->assertEquals('100 day(s), 7 hour(s), 57 minute(s) and 0 second(s)',    Parser::uptime('System Uptime - up 100 days, 7 Hours, 57 Minutes')->toTimeString());

        $this->assertEquals('57 day(s), 12 hour(s), 41 minute(s) and 0 second(s)',    Parser::uptime('Sistema ativo a 57 Dia(s), 12 Hora(s) e 41 Minutos(s)')->toTimeString());
        $this->assertEquals('0 day(s), 2 hour(s), 21 minute(s) and 0 second(s)',      Parser::uptime('Sistema ativo a 0 Dia(s), 2 Hora(s) e 21 Minutos(s)')->toTimeString());
        $this->assertEquals('245 day(s), 10 hour(s), 9 minute(s) and 0 second(s)',    Parser::uptime('Sistema ativo a 245 Dia(s), 10 Hora(s) e 09 Minutos(s)')->toTimeString());
    }


    public function testToStringGetter()
    {
        $this->assertEquals('22 day(s), 19 hour(s), 43 minute(s) and 35 second(s)',   Parser::uptime('SNMP OK - Timeticks: (197181577) 22 days, 19:43:35.77'));
        $this->assertEquals('22 day(s), 19 hour(s), 16 minute(s) and 39 second(s)',   Parser::uptime('SNMP OK - Timeticks: (197019927) 22 days, 19:16:39.27'));
        $this->assertEquals('18 day(s), 17 hour(s), 56 minute(s) and 19 second(s)',   Parser::uptime('SNMP OK - Timeticks: (161977941) 18 days, 17:56:19.41'));
        $this->assertEquals('48 day(s), 13 hour(s), 2 minute(s) and 36 second(s)',    Parser::uptime('SNMP OK - Timeticks: (419415644) 48 days, 13:02:36.44'));
        $this->assertEquals('1 day(s), 10 hour(s), 41 minute(s) and 40 second(s)',    Parser::uptime('SNMP OK - Timeticks, (12490039) 1 day, 10,41,40.39'));
        $this->assertEquals('1 day(s), 2 hour(s), 43 minute(s) and 52 second(s)',     Parser::uptime('SNMP OK - Timeticks: (9623260) 1 day, 2:43:52.60'));
        $this->assertEquals('2 day(s), 21 hour(s), 21 minute(s) and 7 second(s)',     Parser::uptime('SNMP OK - Timeticks: (24966798) 2 days, 21:21:07.98'));
        $this->assertEquals('3 day(s), 18 hour(s), 49 minute(s) and 59 second(s)',    Parser::uptime('SNMP OK - Timeticks: (32699917) 3 days, 18:49:59.17'));
        $this->assertEquals('4 day(s), 17 hour(s), 31 minute(s) and 13 second(s)',    Parser::uptime('SNMP OK - Timeticks: (40867300) 4 days, 17:31:13.00'));
        $this->assertEquals('257 day(s), 13 hour(s), 29 minute(s) and 13 second(s)',  Parser::uptime('SNMP OK - Timeticks: (2225335382) 257 days, 13:29:13.82'));
        $this->assertEquals('70 day(s), 14 hour(s), 15 minute(s) and 39 second(s)',   Parser::uptime('SNMP OK - Timeticks: (609933900) 70 days, 14:15:39.00'));
        $this->assertEquals('163 day(s), 23 hour(s), 12 minute(s) and 49 second(s)',  Parser::uptime('SNMP OK - Timeticks: (1416676962) 163 days, 23:12:49.62'));
        $this->assertEquals('7 day(s), 12 hour(s), 41 minute(s) and 1 second(s)',     Parser::uptime('SNMP OK - Timeticks: (65046149) 7 days, 12:41:01.49'));
        $this->assertEquals('78 day(s), 19 hour(s), 38 minute(s) and 46 second(s)',   Parser::uptime('SNMP OK - Timeticks: (680992667) 78 days, 19:38:46.67'));
        $this->assertEquals('3 day(s), 11 hour(s), 16 minute(s) and 5 second(s)',     Parser::uptime('SNMP OK - Timeticks: (29976523) 3 days, 11:16:05.23'));
        $this->assertEquals('6 day(s), 4 hour(s), 29 minute(s) and 54 second(s)',     Parser::uptime('SNMP OK - Timeticks: (53459434) 6 days, 4:29:54.34'));

        $this->assertEquals('0 day(s), 17 hour(s), 23 minute(s) and 34 second(s)',    Parser::uptime('SNMP OK - Timeticks, (6261427) 17,23,34.27'));
        $this->assertEquals('0 day(s), 3 hour(s), 35 minute(s) and 24 second(s)',     Parser::uptime('SNMP OK - Timeticks: (1292426) 3:35:24.26'));
        $this->assertEquals('0 day(s), 9 hour(s), 38 minute(s) and 8 second(s)',      Parser::uptime('SNMP OK - Timeticks: (3468804) 9:38:08.04'));
        $this->assertEquals('0 day(s), 8 hour(s), 52 minute(s) and 22 second(s)',     Parser::uptime('SNMP OK - Timeticks: (3194230) 8:52:22.30'));
        $this->assertEquals('0 day(s), 0 hour(s), 7 minute(s) and 14 second(s)',      Parser::uptime('SNMP OK - Timeticks: (43423) 0:07:14.23'));
        $this->assertEquals('0 day(s), 0 hour(s), 0 minute(s) and 59 second(s)',      Parser::uptime('SNMP OK - Timeticks: (5900) 0:00:59.00'));
        $this->assertEquals('0 day(s), 0 hour(s), 5 minute(s) and 4 second(s)',       Parser::uptime('SNMP OK - Timeticks: (30405) 0:05:04.05'));
        $this->assertEquals('0 day(s), 0 hour(s), 0 minute(s) and 14 second(s)',      Parser::uptime('SNMP OK - Timeticks: (1400) 0:00:14.00'));
        $this->assertEquals('0 day(s), 0 hour(s), 2 minute(s) and 37 second(s)',      Parser::uptime('SNMP OK - Timeticks: (15773) 0:02:37.73'));

        $this->assertEquals('44 day(s), 23 hour(s), 14 minute(s) and 0 second(s)',    Parser::uptime('System Uptime - 44 day(s) 23 hour(s) 14 minute(s)'));
        $this->assertEquals('51 day(s), 4 hour(s), 38 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - 51 day(s) 4 hour(s) 38 minute(s)'));
        $this->assertEquals('0 day(s), 0 hour(s), 11 minute(s) and 0 second(s)',      Parser::uptime('System Uptime - 0 day(s) 0 hour(s) 11 minute(s)'));
        $this->assertEquals('1 day(s), 23 hour(s), 40 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - 1 day(s) 23 hour(s) 40 minute(s)'));
        $this->assertEquals('8 day(s), 12 hour(s), 44 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - 8 day(s) 12 hour(s) 44 minute(s)'));
        $this->assertEquals('117 day(s), 17 hour(s), 18 minute(s) and 0 second(s)',   Parser::uptime('System Uptime - 117 day(s) 17 hour(s) 18 minute(s)'));

        $this->assertEquals('57 day(s), 12 hour(s), 41 minute(s) and 0 second(s)',    Parser::uptime('System Uptime - up 57 days, 12 Hours, 41 Minutes'));
        $this->assertEquals('22 day(s), 6 hour(s), 24 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - up 22 days, 6 Hours, 24 Minutes'));
        $this->assertEquals('19 day(s), 17 hour(s), 2 minute(s) and 0 second(s)',     Parser::uptime('System Uptime - up 19 days, 17 Hours, 02 Minutes'));
        $this->assertEquals('100 day(s), 7 hour(s), 57 minute(s) and 0 second(s)',    Parser::uptime('System Uptime - up 100 days, 7 Hours, 57 Minutes'));

        $this->assertEquals('57 day(s), 12 hour(s), 41 minute(s) and 0 second(s)',    Parser::uptime('Sistema ativo a 57 Dia(s), 12 Hora(s) e 41 Minutos(s)'));
        $this->assertEquals('0 day(s), 2 hour(s), 21 minute(s) and 0 second(s)',      Parser::uptime('Sistema ativo a 0 Dia(s), 2 Hora(s) e 21 Minutos(s)'));
        $this->assertEquals('245 day(s), 10 hour(s), 9 minute(s) and 0 second(s)',    Parser::uptime('Sistema ativo a 245 Dia(s), 10 Hora(s) e 09 Minutos(s)'));
    }

    public function testInvalidFormatParsing()
    {
        $this->setExpectedException('InvalidArgumentException');

        Parser::uptime('SNMP');
    }

    public function testInvalidGetter()
    {
        $this->setExpectedException('InvalidArgumentException');

        Parser::uptime('SNMP OK - Timeticks: (15773) 0:02:37.73')->milliseconds;
    }
}
