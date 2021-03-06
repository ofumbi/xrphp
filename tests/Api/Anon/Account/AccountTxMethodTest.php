<?php

namespace XRPHP\Tests\Api\Anon\Account;

use XRPHP\Exception\InvalidParameterException;
use XRPHP\Tests\Api\MethodTestCase;

class AccountTxMethodTest extends MethodTestCase
{
    public function testSuccessMinParameters(): void
    {
        // Setup a successful response.
        $this->setResponse($this->getJsonFromFile('account_tx_success'));

        $params = ['account' => 'rG1QQv2nh2gr7RCZ1P8YYcBUKCCN633jCn', 'ledger_index' => 'current'];
        $method = $this->client->method('account_tx', $params);

        $this->assertEquals('account_tx', $method->getMethod());
        $this->assertSame($params, $method->getParams());

        $res = $method->execute();

        $this->assertTrue($res->isSuccess(), 'isSuccess is not true');
        $this->assertTrue($res->isValidated(), 'isValidated is not null');
    }

    public function testMissingAccountWithEmptyArrayThrowsException()
    {
        $this->expectException(InvalidParameterException::class);
        $this->client->method('account_tx', []);
    }

    public function testMissingLedgerParamThrowsException()
    {
        $this->expectException(InvalidParameterException::class);
        $this->client->method('account_tx', [
            'account' => 'rG1QQv2nh2gr7RCZ1P8YYcBUKCCN633jCn',
        ]);
    }
}
