<?php declare(strict_types=1);

namespace App\Controller;

use App\FakeDB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class Order
{
    public function getAll()
    {
        //todo
        $orders = FakeDB::getOrders();
        return new JsonResponse();
    }

    public function getPaid()
    {
        //todo
        $orders = FakeDB::getOrders();
        return new JsonResponse();
    }

    public function getByName(string $name)
    {
        //todo
        $orders = FakeDB::getOrders();
        return new JsonResponse();
    }

    public function post(Request $request)
    {
        //todo
        $orders = FakeDB::getOrders();
        return new JsonResponse();
    }
}
