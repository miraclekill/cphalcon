<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Unit\Http\Message\Stream;

use Phalcon\Http\Message\Exception;
use Phalcon\Http\Message\Stream;
use RuntimeException;
use UnitTester;

class TellCest
{
    /**
     * Tests Phalcon\Http\Message\Stream :: tell()
     *
     * @since  2019-02-10
     */
    public function httpMessageStreamTell(UnitTester $I)
    {
        $I->wantToTest('Http\Message\Stream - tell()');
        $fileName = dataDir('assets/stream/bill-of-rights.txt');
        $handle   = fopen($fileName, 'rb');
        $stream   = new Stream($handle);

        $expected = 274;
        fseek($handle, $expected);
        $actual = $stream->tell();
        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Http\Message\Stream :: tell() - detached
     *
     * @since  2019-02-10
     */
    public function httpMessageStreamTellDetached(UnitTester $I)
    {
        $I->wantToTest('Http\Message\Stream - tell() - detached');
        $I->expectThrowable(
            new RuntimeException(
                'A valid resource is required.'
            ),
            function () {
                $fileName = dataDir('assets/stream/bill-of-rights.txt');
                $stream   = new Stream($fileName, 'rb');
                $stream->detach();

                $stream->tell();
            }
        );
    }
}
