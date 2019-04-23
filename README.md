# Start collaborate with PHP & Symfony

## Discover Git & Github

To collaborate with mates you need to take a tour on [Github tutorial](https://guides.github.com/activities/hello-world/).

It's a basic how to share code on this platform.

But to merge code we need to go deeper, because repositories are not under you're ownership. So you can't modify the distant git history of others persons.
Another explanation is necessary [on this tutorial](https://code.tutsplus.com/tutorials/how-to-collaborate-on-github--net-34267).  

## Installation

To begin you need to Fork & Clone the project.

Once you get your copy of the repository, you can do anything on it.

### Setup

Your computer must run at least PHP 7.1 and [Composer](https://getcomposer.org/) must be installed globally.

### Run the project 

To start the project you need to be on the root folder (with .env and composer files), and run `composer i`. 
It will install all dependencies.
Then you can use `php bin/console server:run` command to start the server.

## Subject

The goal is to provide an API to expose fake orders, fetch from a fake DB.

Before starting, take time to read [Symfony getting started](https://symfony.com/doc/current/index.html).

Take time also to start the API and send a request with the tool of your choice (or curl).

All exercises are independent, if you're stuck in the middle of the night, first go bed, secondly you can skip the exercise.

### Collaborate

Open Pull Request very early, commit frequently, ask when you're totally stuck, and let thread the discussion in the opened PR.

Don't forget to take a look at the discussion tab of the Pull Request, I will comment your code. 

### PHP

You can do all exercises in `src/Controller/Order.php` file, but you can also create files if necessary.

All API's endpoints must return a JSON response, so always use `return new JsonResponse()` it will be easier.

#### Exercise 1

__Order::getAll()__

> `/orders` endpoint must return all orders of the FakeDB in a JsonResponse.

You already have two lines of code to help you understand, how to return a response, and how to fetch data from the fake database.
Take a look at `src/Entity/Order`, the FakeDB return an array of Order entities.

*Clue: You can't return directly `$orders`, JsonResponse can't handle basic objects.*

Make the API call on `http://127.0.0.1:8000/orders` when the server is up, to verify your code.

#### Exercise 2

__Order::getPaid()__

> `/orders/paid` endpoint must only return paid orders of the FakeDB.

Same way has precedent but this time, you need to filter results of the FakeDB.
There is many way to do it, optimize later if you have time, but first make it works.

Make the API call on `http://127.0.0.1:8000/orders/paid` when the server is up, to verify your code.

#### Exercise 3

__Order::getByName()__

> `/orders/name/{name}` endpoint must only return orders of a customer from the FakeDB.

Now the filter is a bit different, you don't have the name in the order, but we don't have to.
The name corresponds to the name used in the email adress. 
For example for the name `toto`, the relative email adress is `toto@mordor.com`.

Make the API call on `http://127.0.0.1:8000/orders/name/saroumane` when the server is up, to verify your code.

#### Exercise 4

__Order::post()__

> `/orders` endpoint must fake register an order.

We will not really record orders.
No need to simulate a record call or something else.

The rules are a little different.

When you submit a form on this endpoint you need to send mandatory parameters:
```
{
    'client_email': 'xxxxxxxxxx',
    'amount': 99999999,
    'status': 'xxxxxxxxx'
}
```

And the behavior must be:

If the email address end with mordor.com, you must return a 200 JsonResponse with a new uuid
If the email address is incorrect, you must return a 403 JsonResponse.
  
*Clue: Take a look at the parameter.*

Make a POST on `http://127.0.0.1:8000/orders/` when the server is up, to verify your code and different responses, don't forget uuid return.

#### Bonus Track

__Order::getLegacy()__

> `/orders/legacy` endpoint must return all orders of FakeDB but with LegacyDB merged.

`LegacyDB::getOrders()` is the same as `FakeDB::getOrders()` but with older data.

You need to merge both results, and ensure there is no duplicate in the final array. 
A duplicate can be determined by the uuid property.

This time you need to create a symfony route so take a look @documentation. 
Use existing code to create the new endpoint, it will guide you.

Ask for a clue if necessary.

Make the API call on `http://127.0.0.1:8000/orders/legacy` when the server is up, to verify your code.
