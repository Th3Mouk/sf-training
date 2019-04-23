<?php declare(strict_types=1);

namespace App\Entity;

final class Order
{
    const STATUS_DRAFT = 'draft';
    const STATUS_OPEN = 'open';
    const STATUS_PAID = 'paid';
    const STATUS_UNCOLLECTIBLE = 'uncollectible';

    /** @var string */
    private $uuid;
    /** @var string */
    private $client_email;
    /** @var float */
    private $amount;
    /** @var string */
    private $status;

    public function __construct(string $uuid, string $client_email, float $amount, string $status)
    {
        $this->uuid = $uuid;
        $this->client_email = $client_email;
        $this->amount = $amount;
        $this->status = $status;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function client_email(): string
    {
        return $this->client_email;
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid(),
            'client_email' => $this->client_email(),
            'amount' => $this->amount(),
            'status' => $this->status(),
        ];
    }
}
