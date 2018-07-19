<?php
/**
 * This file contains only the EditSummaryControllerTest class.
 */

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\Container;

/**
 * Integration/unit tests for the ArticleInfoController.
 * @group integration
 */
class EditSummaryControllerTest extends WebTestCase
{
    /** @var Container The DI container. */
    protected $container;

    /** @var Client The Symfony client */
    protected $client;

    /**
     * Set up the tests.
     */
    public function setUp()
    {
        $this->client = static::createClient();
        $this->container = $this->client->getContainer();
    }

    /**
     * Test that the Edit Summaries index page displays correctly.
     */
    public function testIndex()
    {
        $crawler = $this->client->request('GET', '/editsummary/de.wikipedia');
        static::assertEquals(200, $this->client->getResponse()->getStatusCode());

        if (!$this->container->getParameter('app.is_labs') || $this->container->getParameter('app.single_wiki')) {
            return;
        }

        // should populate project input field
        static::assertEquals('de.wikipedia.org', $crawler->filter('#project_input')->attr('value'));
    }
}
