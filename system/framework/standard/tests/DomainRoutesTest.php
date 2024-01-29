<?php

declare(strict_types=1);

namespace Phphleb\Tests;

use Phphleb\TestO\TestCase;

/**
 * Проверка назначения доменов.
 */
class DomainRoutesTest extends TestCase
{
    private const DOMAIN_1 = 'new-site.com';

    private const DOMAIN_2 = 'subdomain.new-site.com';

    private StandardInit $framework;

    public function __construct()
    {
        require_once __DIR__ . '/../standard_autoloader.php';

        $this->framework = new StandardInit();
    }

    public function testDomainRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = self::DOMAIN_1;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'NEW-DOMAIN-1-SUCCESS';

        $this->assertTrue($result);
    }

    public function testDomainRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'NEW-DOMAIN-2-SUCCESS';

        $this->assertTrue($result);
    }

    public function testDomainRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/domain-group';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = self::DOMAIN_2;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'NEW-DOMAIN-3-SUCCESS';

        $this->assertTrue($result);
    }

    public function testDomainRouteV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/subdomain-group';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = 'sub2.' . self::DOMAIN_1;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult = 'DOMAIN-2-SUCCESS-V1';

        $this->assertTrue($result);
    }

    public function testDomainRouteV5(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/subdomain-group';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = 'sub3.' . self::DOMAIN_1;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === 'DOMAIN-2-SUCCESS-V1';

        $this->assertTrue($result);
    }

    public function testDomainRouteV6(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/subdomain-group';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = 'sub0.' . self::DOMAIN_1;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult === $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testDomainRouteV7(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/domain-group';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = 'over1.start.psub1.sub1.domain.ru';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  === 'DOMAIN-2-SUCCESS-GROUP';

        $this->assertTrue($result);
    }

    public function testDomainRouteGroup(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/domain-group';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $lv5s = ['start'];
        $lv4s = ['psub1', 'psub2', 'psub3'];
        $lv3s = ['sub1', 'sub2', 'sub3'];
        $lv2s = ['new-domain', 'domain'];
        $lv1s = ['com', 'ru'];
        foreach ($lv5s as $lv5) {
            foreach ($lv4s as $lv4) {
                foreach ($lv3s as $lv3) {
                    foreach ($lv2s as $lv2) {
                        foreach ($lv1s as $lv1) {
                            $params['SERVER']['HTTP_HOST'] = "$lv5.$lv4.$lv3.$lv2.$lv1";
                            $commandResult = $this->framework->run($params);
                            $status = $this->framework->getStatus();
                            $result = $status && $commandResult === 'DOMAIN-2-SUCCESS-GROUP';

                            $this->assertTrue($result);
                        }
                    }
                }
            }
        }
    }

    public function testDomainRegexRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/domain-regex';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = 'qWerty.abc-100.com';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  === 'DOMAIN-REGEX-1-SUCCESS';

        $this->assertTrue($result);
    }

    public function testDomainRegexRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/domain-regex';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = 'abc1.abc-100.com';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  === 'DOMAIN-REGEX-1-SUCCESS';

        $this->assertTrue($result);
    }

    public function testDomainRegexRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/domain-regex';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = 'abc2.abc-100.com';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  === 'DOMAIN-REGEX-1-SUCCESS';

        $this->assertTrue($result);
    }

    public function testDomainGroupRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/from-group';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = self::DOMAIN_2;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  === 'DOMAIN-GROUP-GET-SUCCESS';

        $this->assertTrue($result);
    }

    public function testDomainGroupRouteV2(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/from-group';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $params['SERVER']['HTTP_HOST'] = self::DOMAIN_2;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  === 'DOMAIN-GROUP-POST-SUCCESS';

        $this->assertTrue($result);
    }

    public function testDomainGroupRouteV3(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/from-group';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $params['SERVER']['HTTP_HOST'] = self::DOMAIN_1;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  ===  $this->framework::FALLBACK . 'POST';

        $this->assertTrue($result);
    }

    public function testDomainGroupRouteV4(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/from-group';
        $params['SERVER']['REQUEST_METHOD'] = 'GET';
        $params['SERVER']['HTTP_HOST'] = '';
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  ===  $this->framework::FALLBACK . 'GET';

        $this->assertTrue($result);
    }

    public function testDomainShortcutRouteV1(): void
    {
        $params = $this->framework::DEFAULT_DATA;
        $params['SERVER']['REQUEST_URI'] = '/test-domain/from-group';
        $params['SERVER']['REQUEST_METHOD'] = 'POST';
        $params['SERVER']['HTTP_HOST'] = self::DOMAIN_1;
        $commandResult = $this->framework->run($params);
        $status = $this->framework->getStatus();
        $result = $status && $commandResult  === $this->framework::FALLBACK . 'POST';

        $this->assertTrue($result);
    }

}