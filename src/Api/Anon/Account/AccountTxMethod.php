<?php

namespace XRPHP\Api\Anon\Account;

use XRPHP\Api\Method;
use XRPHP\Exception\InvalidParameterException;

/**
 * The account_tx method retrieves a list of transactions that involved the specified account.
 *
 * @link https://developers.ripple.com/account_tx.html Documentation of account_tx.
 * @package XRPHP\Api\Account
 */
class AccountTxMethod extends Method
{
    public function getValidParameters(): array
    {
        return [
            'account',
            'ledger_index_min',
            'ledger_index_max',
            'ledger_hash',
            'ledger_index',
            'binary',
            'forward',
            'limit',
            'marker'
        ];
    }

    /**
     * Validates parameters.
     *
     * @param array|null $params
     * @throws InvalidParameterException
     */
    public function validateParameters(array $params = null): void
    {
        if (!isset($params['account'])) {
            throw new InvalidParameterException('Missing parameter: account');
        }

        if (!isset($params['ledger_index_min'])
            && !isset($params['ledger_index_max'])
            && !isset($params['ledger_hash'])
            && !isset($params['ledger_index'])
        ) {
            throw new InvalidParameterException('At least one of the following parameters must be used: ledger_index, ledger_hash, ledger_index_min, ledger_index_max');
        }
    }
}
