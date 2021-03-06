<?php

namespace SDN3Q\Request\Channels;

use MintWare\DMM\ObjectMapper;
use MintWare\DMM\Serializer\JsonSerializer;
use SDN3Q\Model\ChannelIngest;
use SDN3Q\Model\ChannelInput;
use SDN3Q\Request\BaseRequest;

class Ingest extends BaseRequest
{
    protected static $endpoint = 'channels';

    /**
     * Return Input of a Channel
     *
     * @param int $channelId
     *
     * @return ChannelInput
     * @throws \Exception
     */
    public static function getIngest(int $channelId)
    {
        parent::$subUrl = $channelId . '/ingest';

        try {
            $mapper = new ObjectMapper(new JsonSerializer());
            ;
            $response = self::getResponse();
            $input = $mapper->map($response, ChannelIngest::class);
        } catch (\Exception $e) {
            throw $e;
        }

        return $input;
    }

    /**
     * Change Channel Input
     *
     * @param int    $channelId
     * @param string $streamInType
     * @param bool   $useIngestVersion2
     * @param int    $timeshiftDuration
     * @param int    $srtRecoveryBuffer
     * @param bool   $srtPasswordProtection
     * @param bool   $automaticTranscoding
     *
     * @return ChannelInput
     * @throws \Exception
     */
    public static function changeIngest(
        int $channelId,
        string $streamInType,
        bool $useIngestVersion2 = true,
        int $timeshiftDuration = 0,
        int $srtRecoveryBuffer = 0,
        bool $srtPasswordProtection = false,
        bool $automaticTranscoding = false
    ) {
        parent::$subUrl = $channelId . '/ingest';
        self::$method = 'put';
        self::$possibleParm = [
            'StreamInType',
            'UseIngestVersion2',
            'TimeshiftDuration',
            'srtRecoveryBuffer',
            'srtPasswordProtection',
            'AutomaticTranscoding',
        ];

        try {
            self::$requestParm['StreamInType'] = $streamInType;
            self::$requestParm['UseIngestVersion2'] = $useIngestVersion2;
            self::$requestParm['TimeshiftDuration'] = $timeshiftDuration;
            self::$requestParm['srtRecoveryBuffer'] = $srtRecoveryBuffer;
            self::$requestParm['srtPasswordProtection'] = $srtPasswordProtection;
            self::$requestParm['AutomaticTranscoding'] = $automaticTranscoding;

            $mapper = new ObjectMapper(new JsonSerializer());
            $response = self::getResponse();
            $input = $mapper->map($response, ChannelIngest::class);
        } catch (\Exception $e) {
            throw $e;
        }

        return $input;
    }
}
