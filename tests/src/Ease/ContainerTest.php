<?php

namespace Test\Ease;

use Ease\Container;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-17 at 23:58:14.
 */
class ContainerTest extends SandTest
{
    /**
     * @var Container
     */
    protected $object;

    /**
     * What we want to get ?
     * @var string
     */
    public $rendered = '';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Container();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
        
    }

    /**
     * @covers Ease\Container::__construct
     */
    public function testConstructor()
    {
        $tester = new \Ease\Container('test');
        $this->assertEquals('test', $tester->__toString());
    }

    /**
     * @covers Ease\Container::addItemCustom
     */
    public function testAddItemCustom()
    {
        $context = new \Ease\Html\DivTag();
        Container::addItemCustom('*', $context);
        $this->assertEquals("<div>*</div>", $context->getRendered());

        $context = new \Ease\Html\DivTag();
        Container::addItemCustom(new \Ease\Html\ImgTag(null), $context);
        $this->assertEquals("<div><img src=\"\" /></div>",
            $context->getRendered());
        $this->object->addItem([new \Ease\Html\ATag('#', 'TEST'), new \Ease\Html\ATag('#',
                'TEST')]);
    }

    /**
     * @covers Ease\Container::addItem
     */
    public function testAddItem()
    {
        $prober   = new \Ease\Html\H1Tag();
        $inserted = $this->object->addItem($prober);
        $this->assertEquals(get_class($inserted), get_class($prober));
        $this->assertEquals($prober, end($this->object->pageParts));
    }

    /**
     * @covers Ease\Container::addAsFirst
     *
     * @todo   Implement testAddAsFirst().
     */
    public function testAddAsFirst()
    {
        $this->object->emptyContents();
        $this->object->addItem(new \Ease\Html\DivTag());
        $this->object->addAsFirst(new \Ease\Html\SpanTag());
        $testSpan               = new \Ease\Html\SpanTag();
        $testSpan->parentObject = $this->object;
        $this->assertEquals($testSpan, current($this->object->getContents()));
    }

    /**
     * @covers Ease\Container::suicide
     */
    public function testSuicide()
    {
        $element = new \Ease\Html\DivTag();
        $embeded = $element->addItem($this->object);
        $this->assertTrue($embeded->suicide());
        $this->assertEmpty($element->pageParts);
        $this->assertFalse($embeded->suicide());
    }

    /**
     * @covers Ease\Container::getItemsCount
     */
    public function testGetItemsCount()
    {
        $this->object->emptyContents();
        $this->assertEquals(0, $this->object->getItemsCount());
        $this->object->addItem('@');
        $this->assertEquals(1, $this->object->getItemsCount());
        $this->assertEquals(2,
            $this->object->getItemsCount(new \Ease\Html\DivTag(['a', 'b'])));
    }

    /**
     * @covers Ease\Container::addNextTo
     */
    public function testAddNextTo()
    {
        $testDiv                = $this->object->addItem(new \Ease\Html\DivTag());
        $testDiv->addNextTo(new \Ease\Html\SpanTag());
        $testSpan               = new \Ease\Html\SpanTag();
        $testSpan->parentObject = $this->object;
        $this->assertEquals($testSpan, end($this->object->pageParts));
    }

    /**
     * @covers Ease\Container::lastItem
     */
    public function testLastItem()
    {
        $this->object->addItem(new \Ease\Html\DivTag());
        $this->object->addItem(new \Ease\Html\ATag('', ''));
        $this->object->addItem(new \Ease\Html\PTag());
        $testP               = new \Ease\Html\PTag();
        $testP->parentObject = $this->object;
        $this->assertEquals($testP, $this->object->lastItem());
    }

    /**
     * @covers Ease\Container::addToLastItem
     */
    public function testAddToLastItem()
    {
        $this->object->emptyContents();
        $this->object->addItem(new \Ease\Html\DivTag());

        $testobj = new \Ease\Html\SpanTag('test');

        $this->object->addToLastItem($testobj);
        $this->assertEquals($testobj,
            $this->object->getFirstPart()->getFirstPart());
    }

    /**
     * @covers Ease\Container::getFirstPart
     */
    public function testGetFirstPart()
    {
        $this->object->emptyContents();
        $this->assertNull($this->object->getFirstPart());
        $this->object->addItem(new \Ease\Html\DivTag());
        $this->object->addItem(new \Ease\Html\ATag('', ''));
        $this->object->addItem(new \Ease\Html\PTag());
        $controlDiv               = new \Ease\Html\DivTag();
        $controlDiv->parentObject = $this->object;
        $this->assertEquals(get_class($controlDiv),
            get_class($this->object->getFirstPart()));
    }

    /**
     * @covers Ease\Container::getContents
     */
    public function testGetContents()
    {
        $this->object->emptyContents();
        $this->assertEmpty($this->object->getContents());
    }

    /**
     * @covers Ease\Container::addItems
     */
    public function testAddItems()
    {
        $this->object->emptyContents();
        $this->object->addItems([new \Ease\Html\DivTag(), new \Ease\Html\Span()]);
        $this->assertEquals(2, $this->object->getItemsCount());
    }

    /**
     * @covers Ease\Container::emptyContents
     */
    public function testEmptyContents()
    {
        $this->object->addItem(new \Ease\Html\DivTag());
        $this->object->emptyContents();
        $this->assertEmpty($this->object->getContents());
    }

    /**
     * @covers Ease\Container::drawAllContents
     */
    public function testDrawAllContents()
    {
        $this->object->emptyContents();
        $this->object->addItem('content1');
        $this->object->addItem(new \Ease\Html\SpanTag());
        $this->object->addItem('content2');
        ob_start();
        $this->object->drawAllContents();
        switch (get_class($this->object)) {
            case 'Ease\Container':
            case 'Ease\Document':
                $this->assertTrue(true);
                break;
            default :
                $out = ob_get_contents();
                $this->assertNotEmpty($out);
                break;
        }
        ob_end_clean();
    }

    /**
     * @covers Ease\Container::getRendered
     */
    public function testGetRendered()
    {
        switch (get_class($this->object)) {
            case 'Ease\Container':
            case 'Ease\Document':
                $this->assertEmpty($this->object->getRendered());
                break;
            default :
                $this->object->addItem('*');
                $this->assertNotEmpty($this->object->getRendered());
                break;
        }
    }

    /**
     * @covers Ease\Container::drawIfNotDrawn
     */
    public function testDrawIfNotDrawn($canBeEmpty = false)
    {
        ob_start();
        $this->object->drawIfNotDrawn();
        $out = ob_get_contents();
        $this->assertEquals($this->rendered, $out);
        ob_end_clean();
        ob_start();
        $this->object->drawIfNotDrawn();
        $out = ob_get_contents();
        $this->assertEmpty($out);
        ob_end_clean();
    }

    /**
     * @covers Ease\Container::isFinalized
     */
    public function testIsFinalized()
    {
        $this->assertFalse($this->object->isFinalized());
        $this->object->setFinalized();
        $this->assertTrue($this->object->isFinalized());
    }

    /**
     * @covers Ease\Container::setFinalized
     */
    public function testSetFinalized()
    {
        $this->object->setFinalized();
        $this->assertTrue($this->object->isFinalized());
    }

    /**
     * @covers Ease\Container::isEmpty
     */
    public function testIsEmpty()
    {
        $this->object->emptyContents();
        $this->assertTrue($this->object->isEmpty());
        $this->object->addItem('@');
        $this->assertFalse($this->object->isEmpty($this->object));
    }

    /**
     * @covers Ease\Container::draw
     */
    public function testDraw($whatWant = null)
    {
        ob_start();
        $this->object->emptyContents();
        $this->object->addItem(new \Ease\Html\SmallTag('test'));
        $this->object->draw();
        switch (get_class($this->object)) {
            case 'Ease\Container':
            case 'Ease\Document':
                $this->assertTrue(true);
                break;
            default :
                $out = ob_get_contents();
                $this->assertNotEmpty($out);
                if (!is_null($whatWant)) {
                    $this->assertEquals($whatWant, $out);
                }
                break;
        }
        ob_end_clean();
    }

    /**
     * @covers Ease\Container::__toString
     */
    public function test__toString()
    {
        $result = $this->object->__toString();
        switch (get_class($this->object)) {
            case 'Ease\Container':
            case 'Ease\Document':
                $this->assertTrue(true);
                break;
            default :
                $this->assertTrue(is_string($result));
                break;
        }
    }
}
