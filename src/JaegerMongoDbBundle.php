<?php
declare(strict_types=1);

namespace Jaeger\MongoDb\Symfony;

use Jaeger\MongoDb\Symfony\Resources\DependencyInjection\JaegerMongoDbExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JaegerMongoDbBundle extends Bundle
{
    public function boot()
    {
        parent::boot();
        \MongoDB\Driver\Monitoring\addSubscriber($this->container->get('jaeger.mongodb.query.time.collector'));
    }


    public function getContainerExtension()
    {
        return new JaegerMongoDbExtension();
    }
}
