<?php

namespace SDN3Q\Request\Channels;

use SDN3Q\Request\BaseRequest;

class Timeshift extends BaseRequest
{
    protected static $endpoint = 'channels';

	/**
	 * Creates an Job to Purge Timeshift
	 *
	 * @param int $channelId
	 *
	 * @return array
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 * @throws \SDN3Q\Exception\ApiException
	 */
    public static function getPurge(int $channelId)
    {
        parent::$subUrl = $channelId . '/timeshift/purge';
        try {
	        $response = self::getResponse();
	        $data = json_decode($response, true);
        } catch (\Exception $e) {
            throw $e;
        }
        return $data;
    }
}
