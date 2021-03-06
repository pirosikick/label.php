<?php
namespace Label;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-11-20 at 21:53:39.
 */
class StringLabelTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->object = new StringLabel('%s %s');
    }

    /**
     * @covers Label\StringLabel::sprintf
     */
    public function testSprintf()
    {
        $this->assertEquals($this->object->sprintf('fuga', 'fuga'), 'fuga fuga');
    }

    /**
     * @covers Label\StringLabel::vsprintf
     */
    public function testVsprintf()
    {
        $this->assertEquals($this->object->vsprintf(array('fuga', 'fuga')), 'fuga fuga');
    }

    /**
     * @covers Label\StringLabel::__tostring
     */
    public function test__tostring()
    {
        $label = new StringLabel('hoge');
        $this->assertEquals($label, 'hoge');
    }
}
