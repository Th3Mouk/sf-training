<?php declare(strict_types=1);

namespace App;

use App\Entity\Order;

final class FakeDB
{
    static function getOrders()
    {
        return [
            new Order('ed7d58b7-4baf-4160-be3e-4ce0408e09b3','saroumane@mordor.com',12.04,Order::STATUS_PAID),
            new Order('752b8b99-383f-4e9d-88d9-d22d318f6c7f','saroumane@mordor.com',12.04,Order::STATUS_PAID),
            new Order('5933f742-e7e4-42b1-990c-6d9694f6ed79','sauron@mordor.com',12.04,Order::STATUS_PAID),
            new Order('da20b3f0-fb35-457c-824a-6c169453cb17','balrog@mordor.com',12.04,Order::STATUS_PAID),
            new Order('2035d110-a669-49f3-8c41-69ace093aaea','nazgul@mordor.com',12.04,Order::STATUS_PAID),
            new Order('ed7d58b7-4baf-4160-be3e-4ce0408e09b2','saroumane@mordor.com',12.04,Order::STATUS_UNCOLLECTIBLE),
            new Order('752b8b99-383f-4e9d-88d9-d22d318f6c7e','warg@mordor.com',12.04,Order::STATUS_UNCOLLECTIBLE),
            new Order('5933f742-e7e4-42b1-990c-6d9694f6ed78','orc@mordor.com',12.04,Order::STATUS_UNCOLLECTIBLE),
            new Order('da20b3f0-fb35-457c-824a-6c169453cb16','balrog@mordor.com',12.04,Order::STATUS_PAID),
            new Order('2035d110-a669-49f3-8c41-69ace093aae0','nazgul@mordor.com',12.04,Order::STATUS_PAID),
        ];
    }
}
