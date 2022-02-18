<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FfeReportRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

#[ORM\Entity(repositoryClass: ExampleRepository::class)]
#[ORM\Table(name: 'db_name.example')]
#[ORM\UniqueConstraint(name: 'example_ticker_x', columns: ['file_name', 'ticker'])]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'openapi_context' => [
                'summary' => 'Получить ... ',
                'description' => 'Возвращает ... ',
                'tags' => ['Group one'],
            ],
        ],
    ],
    itemOperations: [
        'get' => [
            'openapi_context' => [
                'summary' => 'Получить ...',
                'description' => 'Возвращает ... ',
                'tags' => ['Group one'],
            ],
        ],
    ],
    shortName: 'shortName',
    normalizationContext: [
        'groups' => ['list'],
    ],
    order: ['id' => 'DESC'],
    paginationEnabled: true,
    paginationItemsPerPage: 30,
    paginationMaximumItemsPerPage: 100,
    routePrefix: 'example/name',
)]
class FfeDividendReport
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private ?int $id = null;

    #[ORM\Column(name: 'file_name', type: 'string', length: 200, nullable: false)]
    private ?string $fileName = null;

    #[ORM\Column(name: 'ticker', type: 'string', length: 50, nullable: false)]
    private ?string $ticker = null;

    #[ORM\Column(name: 'date_pay', type: 'datetime', nullable: true)]
    private ?DateTimeInterface $datePay = null;

    #[ORM\Column(name: 'amount', type: 'decimal', precision: 12, scale: 2, nullable: true)]
    private ?string $amount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): void
    {
        $this->fileName = $fileName;
    }

    public function getTicker(): ?string
    {
        return $this->ticker;
    }

    #[Pure] public function getTickerMaster(): ?string
    {
        return !$this->ticker ?: explode('.', (string) $this->getTicker())[0];
    }

    public function setTicker(?string $ticker): void
    {
        $this->ticker = $ticker;
    }

    /**
     * @return DateTime|null
     */
    public function getDatePay(): ?DateTimeInterface
    {
        return $this->datePay;
    }

    public function setDatePay(?DateTimeInterface $datePay): void
    {
        $this->datePay = $datePay;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): void
    {
        $this->amount = $amount;
    }
}
