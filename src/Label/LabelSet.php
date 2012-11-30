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
 * LabelSet
 *
 * @author Hiroyuki Anai<hiroyukianai@gmail.com>
 */
class LabelSet implements \ArrayAccess
{
    private $_labelSet;
    private $_context = null;

    /**
     * constructor
     *
     * @param array $labelSet
     * @access public
     * @return void
     */
    public function __construct(array $labelSet)
    {
        $this->_labelSet = $labelSet;
    }

    /**
     * get label
     *
     * @param string $path
     * @access public
     * @return string
     */
    public function get($path)
    {
        $path = explode('.', trim($path, '.'));
        $label = $this->_find($path, $this->_context !== null ? $this->_context : $this->_labelSet);
        if (is_string($label)) {
            return new StringLabel($label);
        }
        return $label;
    }

    /**
     * display label
     *
     * @param string $path path separated by dot(.)
     * @param mixed $assignData
     * @access public
     * @return void
     */
    public function display($path)
    {
        echo $this->get($path);
    }

    /**
     * set context
     *
     * @param string $path
     * @access public
     * @return void
     */
    public function context($path)
    {
        if ($context = $this->get($path)) {
            if (is_array($context)) {
                $this->_context = $context;
                return true;
            }
        }
        return false;
    }

    /**
     * reset context
     *
     * @access public
     * @return void
     */
    public function resetContext()
    {
        $this->_context = null;
    }

    /**
     * get label by array access
     *
     * @param string $offset
     * @access public
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * checks whether a label exists
     *
     * @param string $offset
     * @access public
     * @return bool
     */
    public function offsetExists($offset)
    {
        return ($this->get($offset) !== null);
    }

    /**
     * offsetSet
     *
     * @param mixed $offset
     * @param mixed $value
     * @access public
     * @return void
     */
    public function offsetSet($offset, $value)
    {
    }

    /**
     * offsetUnset
     *
     * @param mixed $offset
     * @access public
     * @return void
     */
    public function offsetUnset($offset)
    {
    }

    /**
     * set context
     *
     * @param string $path
     * @access public
     * @return void
     */
    public function context($path)
    {
        if ($context = $this->get($path)) {
            if (is_array($context)) {
                $this->_context = $context;
                return true;
            }
        }
        return false;
    }

    /**
     * reset context
     *
     * @access public
     * @return void
     */
    public function resetContext()
    {
        $this->_context = null;
    }

    /**
     * get label by array access
     *
     * @param string $offset
     * @access public
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * checks whether a label exists
     *
     * @param string $offset
     * @access public
     * @return bool
     */
    public function offsetExists($offset)
    {
        return ($this->get($offset) !== null);
    }

    public function offsetSet($offset, $value)
    {
    }

    public function offsetUnset($offset)
    {
    }

    /**
     * find label
     *
     * @param array $path
     * @param array $labelSet
     * @access private
     * @return mixed
     */
    private function _find(array $path, array $labelSet)
    {
        $current = array_shift($path);
        if (isset($labelSet[$current])) {
            if (empty($path)) {
                return $labelSet[$current];
            }
            return $this->_find($path, $labelSet[$current]);
        }
        return null;
    }
}
