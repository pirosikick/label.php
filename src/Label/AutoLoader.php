<?php
/*
 * This file is part of label.php.
 *
 * (c) 2012 Hiroyuki Anai
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Label;

/**
 * AutoLoader
 */
class AutoLoader
{
    static private $_baseDir = null;
    static private $_isRegistered = false;

    /**
     * set base directory of autoload
     *
     * @param string $path
     * @static
     * @access public
     * @return void
     */
    static public function setBaseDir($path)
    {
        self::$_baseDir = rtrim($path, DIRECTORY_SEPARATOR);
    }

    /**
     * get base directory path of autoload
     *
     * @static
     * @access public
     * @return string
     */
    static public function getBaseDir()
    {
        if (self::$_baseDir === null) {
            return dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
        }

        return self::$_baseDir;
    }

    /**
     * autoload function
     *
     * @param string $className
     * @static
     * @access public
     * @return void
     */
    static public function autoload($className)
    {
        $className = ltrim($className, '\\');

        if (strpos($className, '\\') !== false) {
            $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        }

        require self::getBaseDir() . DIRECTORY_SEPARATOR . $className . '.php';
    }

    /**
     * register autoload function
     *
     * @static
     * @access public
     * @return void
     */
    static public function register()
    {
        if (self::$_isRegistered === true) {
            return;
        }
        spl_autoload_register(__NAMESPACE__ . '\AutoLoader::autoload');
        self::$_isRegistered = true;
    }
}
?>
