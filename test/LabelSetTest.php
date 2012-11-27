<?php
namespace Label;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-11-26 at 22:10:20.
 */
class LabelSetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LabelSet
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new LabelSet(array(
            'hoge' => array(
                'a' => 'hoge',
                'b' => '%s hoge',
                'c' => '%s %s',
            ),
            'fuga' => array(
                'a' => 'fuga',
            ),
        ));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Label\LabelSet::get
     */
    public function testGet()
    {
        $this->assertEquals($this->object->get('hoge.a'), 'hoge');
        $this->assertEquals($this->object->get('hoge.a.'), 'hoge');
        $this->assertEquals($this->object->get('.hoge.a'), 'hoge');
        $this->assertEquals($this->object->get('hoge.hoge'), null);
        $this->assertEquals($this->object->get('hoge.b', 'hoge'), 'hoge hoge');
        $this->assertEquals($this->object->get('hoge.b', array('hoge')), 'hoge hoge');
        $this->assertEquals($this->object->get('hoge.c', array('hoge', 'hoge')), 'hoge hoge');
    }

    /**
     * @covers Label\LabelSet::display
     * @todo   Implement testDisplay().
     */
    public function testDisplay()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Label\LabelSet::context
     * @todo   Implement testContext().
     */
    public function testContext()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Label\LabelSet::resetContext
     * @todo   Implement testResetContext().
     */
    public function testResetContext()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
