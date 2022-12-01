<?php declare(strict_types=1);

namespace Blockchain;

/**
 * Class Config
 */
class Config
{
    // Project
    private const PRODUCT_NAME = 'Xero';
    private const PRODUCT_COPYRIGHT = 'Copyright (c)2021,2022 by Kladskull <kladskull@currazy.com>';
    private const VERSION = '0.0001';
    private const NETWORK_IDENTIFIER = "xv01";
    private const ENVIRONMENT = "prod";

    // Genesis block
    private const GENESYS_DATE = 1638738156; // Sunday, December 5, 2021 4:02:36 PM GMT-05:00

    // Block creation
    private const DESIRED_BLOCK_TIME = 600;

    // Transaction creation
    private const MAX_UNSPENT_PER_TRANSACTION = 100;
    private const MAX_SPENT_PER_TRANSACTION = 100;

    // Coin
    private const DEFAULT_BLOCK_REWARD = "5000000000";
    private const MINIMUM_FEE = "10000000"; // 0.1 xc
    private const ADDRESS_HEADER = 'Xa'; // Xa = live / xa = testnet
    private const CHAIN_VERSION = '00'; // 00 = live, 01 = testnet
    private const MAX_CURRENCY_SUPPLY = "21000000000000000"; // Satoshi's per coin x 210,000,000
    private const MAX_TRANSACTION_SIZE = 100;

    // mining
    private const DEFAULT_LIVE_DIFFICULTY = 28;
    private const DEFAULT_TEST_DIFFICULTY = 24;
    private const DEFAULT_DEV_DIFFICULTY = 16;
    private const LOCK_HEIGHT = 144; // 144 blocks ~ 1 day

    // Scripting
    private const MAX_LOOPS = 100;
    private const MAX_SCRIPT_LENGTH = 2048;

    // Peers
    private const MAX_PEERS = 60;
    private const MAX_REBROADCASTING_PEERS = 30;
    private const PEER_REQUEST_TIMEOUT = 10;

    // host identifier
    private const HOST_ID_SERVICE = 'https://api64.ipify.org';

    // Hosts that are allowed to mine on this node
    private const PUBLIC_API_ACCESS = true;
    private const ALLOWED_PUBLIC_HOSTS = [];
    private const ALLOWED_LOCAL_HOSTS = ['127.0.0.1'];

    // Initial Peers to connect to
    private const INITIAL_PEER_LIST = [
        '3.97.76.137:7747',
        '3.99.119.232:7747',
    ];

    /**
     * @return string
     */
    public static function getAddressHeader(): string
    {
        return self::ADDRESS_HEADER;
    }

    /**
     * @return array
     */
    public static function getAllowedLocalHosts(): array
    {
        return self::ALLOWED_LOCAL_HOSTS;
    }

    /**
     * @return array
     */
    public static function getAllowedPublicHosts(): array
    {
        return self::ALLOWED_PUBLIC_HOSTS;
    }

    /**
     * @return string
     */
    public static function getChainVersion(): string
    {
        return self::CHAIN_VERSION;
    }

    /**
     * @return string
     */
    public static function getDefaultBlockReward(): string
    {
        return self::DEFAULT_BLOCK_REWARD;
    }

    /**
     * @return int
     */
    public static function getDesiredBlockTime(): int
    {
        return self::DESIRED_BLOCK_TIME;
    }

    /**
     * @return int
     */
    public static function getDefaultDifficulty(): int
    {
        $env = $_ENV['ENVIRONMENT'] ?? self::ENVIRONMENT;

        return match ($env) {
            'dev' => self::DEFAULT_DEV_DIFFICULTY,
            'test' => self::DEFAULT_TEST_DIFFICULTY,
        default => self::DEFAULT_LIVE_DIFFICULTY,
        };
    }

    /**
     * @return string
     */
    public static function getDbEnvironment(): string
    {
        $return = '';
        $env = $_ENV['ENVIRONMENT'] ?? self::ENVIRONMENT;
        switch ($env) {
            case 'live':
                $return = 'live';
                break;

            case 'dev':
                $return = 'dev';
                break;

            case 'test':
                $return = 'test';
                break;

            default:
                break;
        }
        return $return;
    }

    /**
     * @return int
     */
    public static function getGenesisDate(): int
    {
        return self::GENESYS_DATE;
    }

    /**
     * @return string
     */
    public static function getHostIdService(): string
    {
        return self::HOST_ID_SERVICE;
    }

    /**
     * @return array
     */
    public static function getInitialPeers(): array
    {
        return self::INITIAL_PEER_LIST;
    }

    /**
     * @return int
     */
    public static function getListenAddress(): string
    {
        return $_ENV['LISTEN_IP'] ?? '0.0.0.0';
    }

    /**
     * @return int
     */
    public static function getListenPort(): int
    {
        return (int)($_ENV['LISTEN_PORT'] ?? 7747);
    }

    /**
     * @return int
     */
    public static function getLockHeight(): int
    {
        return self::LOCK_HEIGHT;
    }

    /**
     * @return string
     */
    public static function getMaxCurrencySupply(): string
    {
        return self::MAX_CURRENCY_SUPPLY;
    }

    /**
     * @return int
     */
    public static function getMaxLoops(): int
    {
        return self::MAX_LOOPS;
    }

    /**
     * @return int
     */
    public static function getMaxPeers(): int
    {
        return self::MAX_PEERS;
    }

    /**
     * @return int
     */
    public static function getMaxRebroadcastPeers(): int
    {
        return self::MAX_REBROADCASTING_PEERS;
    }

    /**
     * @return int
     */
    public static function getMaxScriptLength(): int
    {
        return self::MAX_SCRIPT_LENGTH;
    }

    /**
     * @return int
     */
    public static function getMaxSpentTransactionCount(): int
    {
        return self::MAX_SPENT_PER_TRANSACTION;
    }

    /**
     * @return int
     */
    public static function getMaxTransactionSize(): int
    {
        return self::MAX_TRANSACTION_SIZE;
    }

    /**
     * @return int
     */
    public static function getMaxUnspentTransactionCount(): int
    {
        return self::MAX_UNSPENT_PER_TRANSACTION;
    }

    /**
     * @return string
     */
    public static function getMinimumTransactionFee(): string
    {
        return self::MINIMUM_FEE;
    }

    /**
     * @return string
     */
    public static function getNetworkIdentifier(): string
    {
        return self::NETWORK_IDENTIFIER;
    }

    /**
     * @return int
     */
    public static function getPeerRequestTimeout(): int
    {
        return self::PEER_REQUEST_TIMEOUT;
    }

    /**
     * @return string
     */
    public static function getProductCopyright(): string
    {
        return self::PRODUCT_COPYRIGHT;
    }

    /**
     * @return string
     */
    public static function getProductName(): string
    {
        return self::PRODUCT_NAME;
    }

    /**
     * @return bool
     */
    public static function getPublicAccess(): bool
    {
        return self::PUBLIC_API_ACCESS;
    }

    /**
     * @return string
     */
    public static function getVersion(): string
    {
        return self::VERSION;
    }
}
