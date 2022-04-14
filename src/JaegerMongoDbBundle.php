<?php
declare(strict_types=1);

namespace Jaeger\MongoDb\Symfony;

use Jaeger\MongoDb\Symfony\Resources\DependencyInjection\JaegerMongoDbExtension;
use MongoDB\Driver\Monitoring\CommandSubscriber;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JaegerMongoDbBundle extends Bundle
{
    public function boot(): void
    {
        parent::boot();

        if ($this->container->getParameter('jaeger.mongodb.auto_subscribe')) {
            /** @var CommandSubscriber $collector */
            $collector = $this->container->get('jaeger.mongodb.query.time.collector');
            \MongoDB\Driver\Monitoring\addSubscriber($collector);
        }
    }

    public function getContainerExtension(): ExtensionInterface
    {
        return new JaegerMongoDbExtension();
    }
}
