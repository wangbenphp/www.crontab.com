<?php

namespace App\Service;

use WbPHPLibraryPackage\Service\Aliyun\Oss as AliyunOss;

/**
 * 阿里云OSS服务
 * @author WangBen
 */
class Oss
{
    public function upload($filePath, $fileName)
    {
        $info = AliyunOss::getInstance()->upload($filePath, $fileName);
        return $info;
    }
}
