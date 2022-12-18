<?php
namespace App\Doctrine\Helper;

use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\{
    EntityManager,ORMSetup
};
use Exception;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__."/.."],
            $isDevMode,
            $proxyDir,
            $cache
        );
        $consoleOutput = new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG);
        $consoleLogger = new ConsoleLogger($consoleOutput);
        $logMiddleware = new Middleware($consoleLogger);
        $config->setMiddlewares([
            $logMiddleware
        ]);
        $cacheDirectory = __DIR__ . '/../../var/cache';
        $config->setMetadataCache(new PhpFilesAdapter(
            namespace:'metadata_cache', defaultLifetime: 0,
            directory: $cacheDirectory
        ));
        $config->setQueryCache(new PhpFilesAdapter(
            namespace: 'query_cache',
            directory: $cacheDirectory
        ));
        $conn = [

            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../database/db.sqlite',
        ];
        return EntityManager::create(
            $conn, $config
        );
    }
}