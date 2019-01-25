<?php
/*
 * This file is part of the php-code-coverage package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage;

use SebastianBergmann\Version as VersionId;

final class Version
{
    /**
     * @var string
     */
    private static $version;

    public static function id(): string
    {
        if (self::$version === null) {
<<<<<<< HEAD
            $version       = new VersionId('5.3.2', \dirname(__DIR__));
=======
            $version       = new VersionId('6.1.4', \dirname(__DIR__));
>>>>>>> 4bd4fc608bb0fbe73d3b89caf1e677235b4f9ca4
            self::$version = $version->getVersion();
        }

        return self::$version;
    }
}
