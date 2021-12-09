<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\Panther\PantherTestCaseTrait;

final class HomepageTest extends TestCase
{
    use PantherTestCaseTrait;

    /**
     * @test
     */
    public function the_homepage_works(): void
    {
        $client = self::createHttpBrowserClient();
        $response = $client->request('GET', self::$baseUri . '/public');

        // Make a request for the homepage
        $response = $client->request('GET', '/');

        // The page should contain an <h5> element with the right text
        self::assertStringContainsString('Star Lab - A Wind River Company', $response->filter('h5')->text());
    }
}
