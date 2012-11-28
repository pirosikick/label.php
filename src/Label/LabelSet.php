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
class LabelSet
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
     * @param mixed $assignData string or array
     * @access public
     * @return string
     */
    public function get($path, $assignData = false)
    {
        $path = explode('.', trim($path, '.'));
        $label = $this->_find($path, $this->_context !== null ? $this->_context : $this->_labelSet);
        if ($label === null || empty($assignData)) {
            return $label;
        }
        return $this->_assign($label, $assignData);
    }

    /**
     * display label
     *
     * @param string $path path separated by dot(.)
     * @param mixed $assignData
     * @access public
     * @return void
     */
    public function display($path, $assignData = false)
    {
        echo $this->get($path, $assignData);
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

    /**
     * assign data to label
     *
     * @param mixed $label
     * @param mixed $assignData
     * @access private
     * @return void
     */
    private function _assign($label, $assignData)
    {
        if (is_array($assignData)) {
            return vsprintf($label, $assignData);
        }
        return sprintf($label, $assignData);
    }
}
