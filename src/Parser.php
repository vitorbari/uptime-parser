<?php namespace VitorBari\UptimeParser;

use InvalidArgumentException;

/**
 * Class Parser
 * @package VitorBari\UptimeParser
 */
class Parser
{
    /**
     * @var
     */
    protected $seconds;

    /**
     * @var array
     */
    private $parsers = array(
        'SNMPTimeticks'
    );

    const SECONDS_PER_DAY = 86400;
    const SECONDS_PER_HOUR = 3600;
    const SECONDS_PER_MINUTE = 60;

    /**
     * Parser constructor.
     * @param $uptime
     */
    public function __construct($uptime)
    {
        $this->parse($uptime);
    }


    /**
     * This is an alias for the constructor that allows better fluent syntax
     * Parser::uptime($uptime)->minutes;
     *
     * @param $uptime
     * @return static
     *
     */
    public static function uptime($uptime)
    {
        return new static($uptime);
    }

    /**
     * @param $uptime
     */
    private function parse($uptime)
    {
        $this->seconds = NULL;

        foreach ($this->parsers as $parse) {
            $classname = __NAMESPACE__ . '\Parsers\\' . $parse;
            $seconds = (new $classname)->match($uptime);

            if (is_numeric($seconds)) {
                $this->seconds = $seconds;
                break;
            }
        }

        if($this->seconds == NULL) {
            throw new InvalidArgumentException(sprintf("Unable to parse the string '%s'", $uptime));
        }
    }

    ///////////////////////// GETTERS /////////////////////

    /**
     *
     */
    public function toTimeString()
    {

    }

    /**
     * Get the uptime total time in different units
     *
     * @param string $name
     *
     * @return int
     * @throws \InvalidArgumentException
     *
     */
    public function __get($name)
    {
        switch ($name) {

            case 'seconds':
                return $this->seconds;

            case 'minutes':
                return (int)floor($this->seconds / static::SECONDS_PER_MINUTE);

            case 'hours':
                return (int)floor($this->seconds / static::SECONDS_PER_HOUR);

            case 'days':
                return (int)floor($this->seconds / static::SECONDS_PER_DAY);

            default:
                throw new InvalidArgumentException(sprintf("Unknown getter '%s'", $name));
        }
    }
}