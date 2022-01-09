<?php


namespace Guess\Application\Service;


interface FileUploaderInterface
{
    public function upload(string $bucketName, string $objectName, string $imageUrl);

    public function getImageUrl();
}