<?php

namespace App\Service;

use WbPHPLibraryPackage\Service\Aliyun\Oss as AliyunOss;

/**
 * 阿里云OSS服务
 * @author WangBen
 */
class Oss
{
    /**
     * 上传文件
     */
    public function upload($filePath, $fileName)
    {
        $info = AliyunOss::getInstance()->upload($filePath, $fileName);
        return $info;
    }

    /**
     * 删除文件
     */
    public function delete($filePath)
    {
        $info = AliyunOss::getInstance()->delete($filePath);
        return $info;
    }
}
