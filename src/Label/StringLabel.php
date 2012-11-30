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

class StringLabel
{
    private $_label;

    /**
     * constructor method
     *
     * @param mixed $label
     * @access public
     * @return void
     */
    public function __construct($label)
    {
        $this->_label = $label;
    }

    /**
     * sprintf
     *
     * @access public
     * @return string
     */
    public function sprintf(/*$args, $...*/)
    {
        return vsprintf($this->_label, func_get_args());
    }

    /**
     * vsprintf
     *
     * @param array $args
     * @access public
     * @return string
     */
    public function vsprintf(array $args)
    {
        return vsprintf($this->_label, $args);
    }

    /**
     * return label
     *
     * @access public
     * @return string
     */
    public function __tostring()
    {
        return (string)$this->_label;
    }
}
?>
