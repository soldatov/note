<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Example;
use Doctrine\ORM\EntityManagerInterface;

final class ExampleItemDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    public function __construct(private EntityManagerInterface $em)
    {

    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Example::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?Example
    {
        return $this->em->getRepository($resourceClass)->find($id);
    }
}
