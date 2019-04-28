<?php declare(strict_types=1);

namespace App\Controller;

use App\FakeDB;
use App\LegacyDB;
use App\Controller\toArray;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

//use App\Entity\Order;


final class Order
{
    public function getAll()
    {
        //todo
        $orders = FakeDB::getOrders();
      //  $ArrayOrders = new array();                //je laisse la preuve de mes essais en commentaire
      //  foreach ($orders as $order) {              // je fait un foreach pour pouvoir récuperer des objets unique et appeller des méthodes sur chacun d'entre eux
      //   $ArrayOrders[] = $order->toArray();      // appel de la fonction toArray pour que JsonResponse les affiches correctement
      //  }
        $orders = array_map("\APP\Entity\Order::toArray2",$orders);  //pour appliquer la méthode toArray a tout le tableau $Orders

        return new JsonResponse($orders);
    }

    public function getPaid()
    {
        //todo
        $orders = FakeDB::getOrders();
        foreach ($orders as $order) {
            if($order->isPaid()) // je compare leurs états. si ils sont "paid" je les ajoutes
              $ArrayOrdersPaid[] = $order->toArray();
          }
        return new JsonResponse($ArrayOrdersPaid);
    }

    public function getByName(string $name)
    {
        //todo
        $orders = FakeDB::getOrders();
        //foreach ($orders as $order) {
        //  if(strpos($order->client_email(), $name) !== false) // comparaison pour savoir si l'adresse mail contient le nom envoyé en paramètre.
        //    $ArrayOrders[] = $order->toArray();
        //  }
        $ArrayOrders;
        for ($i=0; $i < sizeof($orders)-1; $i++) // effectuée sans forEach mais avec un for malheuresement
        {
            $ArrayOrders[$i+(strpos($orders[$i]->client_email(), $name))]=$orders[$i]->toArray();  //pour appliquer la méthode toArray a tout le tableau $Orders

        }

      //  $ArrayOrders = preg_grep ( '"/'.$name.'@'.'/"' , $orders );

        return new JsonResponse($ArrayOrders);
    }

    public function post(Request $request)
    {
        //todo
        $email = $request->get('client_email');
        if(strpos($order->client_email(), "mordor.com") !== false) //  si mordor.com est autre part qu'a la fin du mail cela marche aussi :(. Mais je n'ai pas trouvé comment faire autrement.
         {
           $uuid = uniqid('', true); // j'utilise une fonction de génération aléatoire.La probabilité d'avoir 2 même uuid est faible.
           return new JsonResponse(['uuid' => $uuid],200); //on retourne un code 200 car la reponse est conforme.
         }
         return new JsonResponse(ERREUR,403);// ici il y a  une erreur, on retourne le bon code.
    }

    public function getLegacy()
    {
      $orders = FakeDB::getOrders();
      $oldorders = LegacyDB::getOrders(); // je charge l'ancienne bdd
      foreach ($orders as $order) {
        $ArrayOrders[] = $order->toArray();
        $ArrayUuid[] = $order->uuid(); // je stocke l'uuid des nouveaux "order" afin de les comparer plus tard.
      }
      foreach ($oldorders as $oldorder) {
        if(!in_array($oldorder->uuid(), $ArrayUuid)) // si l'uuid n'est pas dans le tableau de nouveaux orders, je l'ajoute
          $ArrayOrders[] = $oldorder->toArray();
      }
      return new JsonResponse($ArrayOrders);
    }
}
