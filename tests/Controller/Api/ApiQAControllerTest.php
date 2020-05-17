<?php declare(strict_types=1);

namespace App\Tests\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @internal
 * @coversNothing
 */
class ApiQAControllerTest extends WebTestCase
{
    private const JSON_QUESTION = <<<'JSON'
{
 "title": "How to",
 "promoted": true,
 "created": "1990-12-31T23:59:60Z",
 "updated": "1990-12-31T23:59:60Z",
 "status": "draft",
 "channel": "faq",
 "content": "Answer by question"
}
JSON;

    private int $id;

    /**
     * @dataProvider provideUrls
     *
     * @param $url
     *
     * @throws \JsonException
     */
    public function testGetQAAction($url): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/qa',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            self::JSON_QUESTION
        );
        $this->assertEquals(201, $client->getResponse()->getStatusCode());

        $this->id = json_decode($client->getResponse()->getContent(), true, 512, JSON_THROW_ON_ERROR)['id'];

        $client->request('GET', $url, ['id' => $this->id]);

        static::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testGetNegativeQAAction(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/qa/negative_1');

        static::assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testNegativeSaveQAAction(): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            'api/qa'
        );
        static::assertStringContainsString('Your field is blank', $client->getResponse()->getContent());
        static::assertEquals(400, $client->getResponse()->getStatusCode());
    }

    /**
     * @dataProvider provideUrls
     *
     * @param $url
     * @throws \JsonException
     */
    public function testUpdateQAAction($url): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/qa',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            self::JSON_QUESTION
        );
        $this->assertEquals(201, $client->getResponse()->getStatusCode());

        $this->id = json_decode($client->getResponse()->getContent(), true, 512, JSON_THROW_ON_ERROR)['id'];

        $client->request(
            'PUT',
            $url,
            ['id' => $this->id],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            '{ "title": "Changed", "status": "published"}'
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', $url, ['id' => $this->id]);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * раскоментить когда нужно.
     */
    public function testSaveQAAction(): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            'api/qa',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            self::JSON_QUESTION
        );

        static::assertEquals(201, $client->getResponse()->getStatusCode());
    }

    /**
     * @return array
     */
    public function provideUrls(): array
    {
        return [
            ["/api/qa/{$this->id}"],
        ];
    }
}