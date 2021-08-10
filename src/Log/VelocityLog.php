<?php

namespace Aternos\Codex\Minecraft\Log;

use Aternos\Codex\Detective\SinglePatternDetector;
use Aternos\Codex\Minecraft\Analyser\VelocityAnalyser;

/**
 * Class VelocityLog
 * @package Aternos\Codex\Minecraft\Log
 */
class VelocityLog extends MinecraftProxyLog
{
    /**
     * @var string
     */
    protected static $pattern = '/^(\[(?:[0-9]{2}\:?){3}\] \[[^\/]+\/(\w+)\]\:).*$/';

    /**
     * @var string
     */
    protected static $prefixPattern = '(\[(?:[0-9]{2}\:?){3}\] \[[^\/]+\/(\w+)\]\:) ';

    /**
     * @return VelocityAnalyser
     */
    public static function getDefaultAnalyser()
    {
        return new VelocityAnalyser();
    }

    /**
     * @return array
     */
    public static function getDetectors()
    {
        return [
            (new SinglePatternDetector())->setPattern('/^' . static::$prefixPattern . 'Booting up Velocity [0-9\.]+$/m')
        ];
    }

    /**
     * @return string
     */
    public function getServerSoftware(): string
    {
        return "Velocity";
    }

}