<?php declare(strict_types=1);

namespace App\Tests\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @internal
 * @coversNothing
 */
class ApiQAControllerTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     *
     * @param $url
     */
    public function testGetQAAction($url): void
    {
        $client = static::createClient();

        $client->request('GET', $url);

        static::assertTrue($client->getResponse()->isSuccessful());
        //or
        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testGetNegativeQAAction(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/qa/t1');

        static::assertTrue($client->getResponse()->isNotFound());
        //or
        static::assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testNegativeSaveQAAction(): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            'api/qa',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            ''
        );
        static::assertStringContainsString('Your field is blank', $client->getResponse()->getContent());
        static::assertEquals(400, $client->getResponse()->getStatusCode());
    }

    /**
     * раскоментить когда нужно.
     */
    public function ptestSaveQAAction(): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            'api/qa',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            '{ "title": "New title","promoted": true,"status": "draft","channel": "faq","content": "Answer by question"}'
        );

        static::assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * @return array
     */
    public function provideUrls(): array
    {
        return [
            ['/api/qa/1'],
        ];
    }
}
