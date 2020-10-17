<?php

namespace Grayl\Test\Display\Content;

use Grayl\Display\Content\ContentPorter;
use Grayl\Display\Content\Controller\ContentController;
use PHPUnit\Framework\TestCase;

/**
 * Test class for the Content package
 *
 * @package Grayl\Display\Content
 */
class ContentControllerTest extends
    TestCase
{

    /**
     * Tests the creation of a ContentController object
     *
     * @return ContentController
     * @throws \Exception
     */
    public function testCreateContentController(): ContentController
    {

        // Create a ContentController
        $content = ContentPorter::getInstance()
            ->newContentControllerFromFiles(
                'test',
                [
                    'test/general.php',
                    'test/other.php',
                ]
            );

        // Check the type of object created
        $this->assertInstanceOf(
            ContentController::class,
            $content
        );

        // Return it
        return $content;
    }


    /**
     * Tests that data of a ContentController
     *
     * @param ContentController $content A ContentController entity to test
     *
     * @depends testCreateContentController
     */
    public function testContentControllerData(ContentController $content): void
    {

        // Test a piece of content from the first file
        $this->assertNotEmpty($content->getContent('string'));
        $this->assertIsString($content->getContent('string'));
        $this->assertEquals(
            'test',
            $content->getContent('string')
        );

        // Test another piece of content from the second file
        $this->assertNotEmpty($content->getContent('array'));
        $this->assertIsArray($content->getContent('array'));
        $this->assertEquals(
            'value',
            $content->getContent('array')['one']
        );
    }

}
