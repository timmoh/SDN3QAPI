<?php

namespace SDN3Q\Request\Files;

use MintWare\DMM\ObjectMapper;
use MintWare\DMM\Serializer\JsonSerializer;
use SDN3Q\Model\File;
use SDN3Q\Request\BaseRequest;

class Files extends BaseRequest
{
    protected static $endpoint = 'projects';

    /**
     * Return a collection of Files in Project.
     *
     * @param int   $projectId
     * @param array $parms
     *
     * @return File[]|array
     * @throws \Exception
     */
    public static function getFiles(int $projectId, $parms = [])
    {
        $files = [];
        parent::$subUrl = $projectId . '/files';
        self::$possibleParm = [
            'IncludeDeleted',
            //	boolean	false		Include Files that are marked as deleted
            'IncludeMetadata',
            //	boolean	false		Include File Metadata in response
            'IncludeProperties',
            //	boolean	false		Include File Properties in response
            'OrderBy',
            //	string	false	[create|lastupdate]	Order Files in response by create or last update DateTime
            'Sort',
            //	string	false	[asc|desc]	Sorting of response list
            'Period',
            //	string	false	[lasthour|lastday|lastweek|lastmonth|lastyear]	If you have choose a OrderBy criteria you can filter the response list by period
            'CategoryId',
            //	integer	false		You can filter the response list by a Category. Set the corresponding CategoryId
            'VideotypeId',
            //	integer	false		You can filter the response list by a Videotype. Set the corresponding VideotypeId
            'Offset',
            //	integer	false		Offset for Pagination
            'Limit',
            //	integer	false		Limit for Pagination
        ];
        foreach ($parms as $key => $value) {
            self::$requestParm[$key] = $value;
        }

        try {
            $mapper = new ObjectMapper(new JsonSerializer());
            ;
            $response = self::getResponse();
            $data = json_decode($response, true);
            if (count($data['Files']) > 0) {
                foreach ($data['Files'] as $dataFiles) {
                    $files[] = $mapper->map(json_encode($dataFiles), File::class);
                }
            }
        } catch (\Exception $e) {
            throw $e;
        }

        return $files;
    }

    /**
     * Return a File by Id
     *
     * @param int $projectId
     * @param int $fileId
     *
     * @return File|null
     * @throws \Exception
     */
    public static function getFile(int $projectId, int $fileId)
    {
        $file = null;
        parent::$subUrl = $projectId . '/files/' . $fileId;

        try {
            $mapper = new ObjectMapper(new JsonSerializer());
            ;
            $response = self::getResponse();
            $data = json_decode($response, true);
            $file = $mapper->map(json_encode($data), File::class);

            return $file;
        } catch (\Exception $e) {
            throw $e;
        }

        return $file;
    }

    /**
     * Create a new File Entity and return the File Upload URI in the Location Header
     *
     * @param int    $projectId  Format of the Video File
     * @param string $fileName   original File Name
     * @param string $fileFormat Format of the Video File ("mp4","avi","mov","webm","mp3","wav","aac")
     *
     * @return string|null
     * @throws \Exception
     */
    public static function postFile(int $projectId, string $fileName, string $fileFormat)
    {
        $uploadUrl = null;
        self::$method = 'post';
        parent::$requestParmAsJson = true;
        parent::$subUrl = $projectId . '/files';

        self::$possibleParm = [
            'FileName',
            'FileFormat',
        ];
        $uploadUrl = null;
        self::$expected_response = 'header';
        self::$requestParm['FileName'] = $fileName;
        self::$requestParm['FileFormat'] = $fileFormat;

        try {
            $response = self::getResponse();
            $header = self::$responseHeader;
            $uploadUrl = $header['Location'][0];
        } catch (\Exception $e) {
            throw $e;
        }

        return $uploadUrl;
    }

    /**
     * Return the File Upload URI in the Location Header to replace the source Video File
     *
     * @param int    $projectId  Project Id
     * @param int    $fileId     File Id to get replaced
     * @param string $fileName   original File Name
     * @param string $fileFormat Format of the Video File ("mp4","avi","mov","webm","mp3","wav","aac")
     *
     * @return string|null
     * @throws \Exception
     */
    public static function replaceFile(int $projectId, int $fileId, string $fileName, string $fileFormat)
    {
        $uploadUrl = null;
        self::$method = 'put';
        parent::$requestParmAsJson = true;
        parent::$subUrl = $projectId . '/files/' . $fileId . '/replace';
        self::$possibleParm = [
            'FileName',
            'FileFormat',
        ];
        $uploadUrl = null;
        self::$expected_response = 'header';
        self::$requestParm['FileName'] = $fileName;
        self::$requestParm['FileFormat'] = $fileFormat;

        try {
            $response = self::getResponse();
            $header = self::$responseHeader;
            $uploadUrl = $header['Location'][0];
        } catch (\Exception $e) {
            throw $e;
        }

        return $uploadUrl;
    }

    /**
     * Delete a File by Id
     *
     * @param int $projectId
     * @param int $fileId
     *
     * @return File|null
     * @throws \Exception
     */
    public static function deleteFile(int $projectId, int $fileId)
    {
        $file = null;
        self::$method = 'delete';
        parent::$subUrl = $projectId . '/files/' . $fileId;

        try {
            $mapper = new ObjectMapper(new JsonSerializer());
            ;
            $response = self::getResponse();
            $data = json_decode($response, true);
            $file = $mapper->map(json_encode($data), File::class);

            return $file;
        } catch (\Exception $e) {
            throw $e;
        }

        return $file;
    }
}
