<?php declare(strict_types=1);

namespace App\Controller;

use App\FakeDB;
use App\LegacyDB;
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
        foreach ($orders as $order) {
          $ArrayOrders[] = $order->toArray();
        }
        return new JsonResponse($ArrayOrders);
    }

    public function getPaid()
    {
        //todo
        $orders = FakeDB::getOrders();
        foreach ($orders as $order) {
            if($order->status()=="paid")
              $ArrayOrdersPaid[] = $order->toArray();
          }
        return new JsonResponse($ArrayOrdersPaid);
    }

    public function getByName(string $name)
    {
        //todo
        $orders = FakeDB::getOrders();
        foreach ($orders as $order) {
          if(strpos($order->client_email(), $name) !== false)
            $ArrayOrders[] = $order->toArray();
          }
        return new JsonResponse($ArrayOrders);
    }

    public function post(Request $request)
    {
        //todo

        return new JsonResponse();//$request->all);
    }

    public function getLegacy()
    {
      $orders = FakeDB::getOrders();
      $oldorders = LegacyDB::getOrders();
      foreach ($orders as $order) {
        $ArrayOrders[] = $order->toArray();
      }
      foreach ($oldorders as $oldorder) {
        $ArrayOrders[] = $oldorder->toArray();
      }



      return new JsonResponse($ArrayOrders);
    }
}
