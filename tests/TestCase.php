<?php
namespace Tests;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class TestCase extends WebTestCase
{
    /** @var  EntityManager */
    protected static $em;

    /** @var bool  */
    protected static $doTransactionRollback = true;

    /**
     * setUpBeforeClass
     */
    public static function setUpBeforeClass()
    {
        $_SERVER['IS_DOCTRINE_ORM_SUPPORTED'] = true;

        self::bootKernel();

        self::$em = static::$kernel->getContainer()->get('doctrine.orm.entity_manager');
        self::$em->getConnection()->connect();

        self::nuke();
    }

    /**
     *
     */
    protected function setUp()
    {
        if (static::$doTransactionRollback) {
            self::$em->getConnection()->beginTransaction();
        }
    }


    /**
     * tearDownAfterClass
     */
    public static function tearDownAfterClass()
    {
        self::$em->close();
        self::$em = null;

        static::ensureKernelShutdown();
    }

    /**
     *
     */
    public function tearDown()
    {
        if (static::$doTransactionRollback) {
            try {
                self::$em->getConnection()->rollBack();
            } catch (\Exception $ex){
                self::$em->getConnection()->close();
            }
        }
        $this->getEntityManager()->clear();
    }

    /**
     * @param string $id
     * @return object
     */
    protected function get($id)
    {
        return $this->getService($id);
    }

    /**
     * @param string $service
     * @return object
     */
    protected function getService($service)
    {
        return static::$kernel->getContainer()->get($service);
    }

    /**
     * @param string $parameter
     * @return array
     */
    protected function getParameter($parameter)
    {
        return static::$kernel->getContainer()->getParameter($parameter);
    }

    /**
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return self::$em;
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    protected function getConnection()
    {
        return self::$em->getConnection();
    }


    /**
     *
     */
    public static function nuke()
    {
        try {
            self::$em->getConnection()->executeQuery('SET FOREIGN_KEY_CHECKS = 0');

            $purger = new ORMPurger(self::$em);
            $purger->setPurgeMode(ORMPurger::PURGE_MODE_TRUNCATE);
            $purger->purge();

            self::$em->clear();

        } finally {
            self::$em->getConnection()->executeQuery('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
