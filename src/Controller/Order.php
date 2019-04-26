<?php declare(strict_types=1);

namespace App\Controller;

use App\FakeDB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

//use App\Entity\Order;


final class Order
{
    public function getAll()
    {
        //todo
        $orders = FakeDB::getOrders();
      //  $ArrayOrders = new array();         //je laisse la preuve de mes essais en commentaire
      //  foreach ($orders as $order) {
      //    $ArrayOrders[] = new Order($order->uuid(),$order->client_email(),$order->amount(),$order->status());
      //  }
        return new JsonResponse($orders);
    }

    public function getPaid()
    {
        //todo
        $orders = FakeDB::getOrders();
        foreach ($orders as $order) {
            if($order->status()=="paid")
              $ArrayOrdersPaid[] = $order;
          }
        return new JsonResponse($ArrayOrdersPaid);
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
        return new JsonResponse();
    }
}
