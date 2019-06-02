<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Unit\Http\Message\Response;

use Phalcon\Http\Message\Response;
use UnitTester;

class GetHeadersCest
{
    /**
     * Tests Phalcon\Http\Message\Response :: getHeaders()
     *
     * @since  2019-03-09
     */
    public function httpMessageResponseGetHeaders(UnitTester $I)
    {
        $I->wantToTest('Http\Message\Response - getHeaders()');

        $data = [
            'Cache-Control' => ['max-age=0'],
            'Accept'        => ['text/html'],
        ];

        $response = new Response('php://memory', 200, $data);

        $expected = [
            'Accept'        => ['text/html'],
            'Cache-Control' => ['max-age=0'],
        ];

        $I->assertEquals(
            $expected,
            $response->getHeaders()
        );
    }

    /**
     * Tests Phalcon\Http\Message\Response :: getHeaders() - empty
     *
     * @since  2019-03-09
     */
    public function httpMessageResponseGetHeadersEmpty(UnitTester $I)
    {
        $I->wantToTest('Http\Message\Response - getHeaders() - empty');

        $response = new Response();

        $I->assertEquals(
            [],
            $response->getHeaders()
        );
    }
}
