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

        $this->assertInstanceOf('Label\StringLabel', $this->object->get('hoge.a'));

        $this->assertNull($this->object->get('hoge.hoge'));
    }

    /**
     * @covers Label\LabelSet::offsetGet
     */
    public function testOffsetGet()
    {
        $this->assertEquals($this->object['hoge.a'], 'hoge');
        $this->assertEquals($this->object['hoge.hoge'], null);
    }

    /**
     * @covers Label\LabelSet::offsetExists
     */
    public function testOffsetExists()
    {
        $this->assertTrue(isset($this->object['hoge']));
        $this->assertTrue(isset($this->object['hoge.a']));
        $this->assertFalse(isset($this->object['hoge.hoge']));
    }

    /**
     * @covers Label\LabelSet::offsetGet
     */
    public function testOffsetGet()
    {
        $this->assertEquals($this->object['hoge.a'], 'hoge');
        $this->assertEquals($this->object['hoge.hoge'], null);
    }

    /**
     * @covers Label\LabelSet::offsetExists
     */
    public function testOffsetExists()
    {
        $this->assertTrue(isset($this->object['hoge']));
        $this->assertTrue(isset($this->object['hoge.a']));
        $this->assertFalse(isset($this->object['hoge.hoge']));
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
     */
    public function testContext()
    {
        $this->assertTrue($this->object->context('fuga'));
        $this->assertEquals($this->object->get('a'), 'fuga');
        $this->assertNull($this->object->get('b'));
    }

    /**
     * @covers Label\LabelSet::resetContext
     */
    public function testResetContext()
    {
        $this->assertTrue($this->object->context('fuga'));
        $this->assertEquals($this->object->get('a'), 'fuga');
        $this->object->resetContext();
        $this->assertNull($this->object->get('a'));
    }
}
