<?php declare(strict_types=1);

namespace App\Tests\Controller;

use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class OrderTest extends WebTestCase
{
    public function testAllOrdersCanBeRetrieved(): void
    {
        $client = static::createClient();

        $client->request('GET', '/orders');

        $response = $client->getResponse();
        $orders = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(10, \count($orders));
        $this->assertEquals('ed7d58b7-4baf-4160-be3e-4ce0408e09b3', current($orders)['uuid']);
    }

    public function testOrderByClientName(): void
    {
        $client = static::createClient();

        $client->request('GET', '/orders/name/saroumane');

        $response = $client->getResponse();
        $orders = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(3, \count($orders));
        $this->assertEquals('ed7d58b7-4baf-4160-be3e-4ce0408e09b3', current($orders)['uuid']);
    }

    public function testOrderPaid(): void
    {
        $client = static::createClient();

        $client->request('GET', '/orders/paid');

        $response = $client->getResponse();
        $orders = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(7, \count($orders));
        $this->assertEquals('ed7d58b7-4baf-4160-be3e-4ce0408e09b3', current($orders)['uuid']);
    }

    public function testOrderSubmissionFilter(): void
    {
        $client = static::createClient();

        $client->request('POST', '/orders', [
            'client_email' => 'roi@isengard.com',
            'amount' => 12.04,
            'status' => Order::STATUS_PAID,
        ]);

        $response = $client->getResponse();

        $this->assertEquals(403, $response->getStatusCode());
    }

    public function testDuplicitousOrderSubmissionFilter(): void
    {
        $client = static::createClient();

        $client->request('POST', '/orders', [
            'client_email' => 'frodon@mmordor.com',
            'amount' => 12.04,
            'status' => Order::STATUS_PAID,
        ]);

        $response = $client->getResponse();

        $this->assertEquals(403, $response->getStatusCode());
    }

    public function testCreateOrder(): void
    {
        $client = static::createClient();

        $client->request('POST', '/orders', [
            'client_email' => 'frodon@mordor.com',
            'amount' => 12.04,
            'status' => Order::STATUS_PAID,
        ]);

        $response = $client->getResponse();
        $content = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('uuid', $content);
    }

    public function testLegacy(): void
    {
        $client = static::createClient();

        $client->request('GET', '/orders/legacy');

        $response = $client->getResponse();
        $orders = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(12, \count($orders));
    }
}
