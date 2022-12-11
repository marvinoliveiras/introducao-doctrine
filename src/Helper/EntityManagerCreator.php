<?php
namespace App\Doctrine\Helper;

use Doctrine\ORM\{
    EntityManager,ORMSetup
};
use Exception;

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
        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../database/db.sqlite',
        ];
        return EntityManager::create(
            $conn, $config
        );
    }
}