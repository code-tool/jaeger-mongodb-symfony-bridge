<?php
declare(strict_types=1);

namespace Jaeger\MongoDb\Symfony;

use Jaeger\MongoDb\Symfony\Resources\DependencyInjection\JaegerMongoDbExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JaegerMongoDbBundle extends Bundle
{
    public function boot(): void
    {
        parent::boot();

        if ($this->container->getParameter('jaeger.mongodb.auto_subscribe')) {
            \MongoDB\Driver\Monitoring\addSubscriber($this->container->get('jaeger.mongodb.query.time.collector'));
        }
    }

    public function getContainerExtension(): ExtensionInterface
    {
        return new JaegerMongoDbExtension();
    }
}
