<?php

namespace Codibly\DatabricksBundle\DTO;

class S3StorageInfo extends GenericDTO
{
    /**
     * @var string
     */
    protected $destination;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $enableEncryption;

    /**
     * @var string
     */
    protected $encryptionType;

    /**
     * @var string
     */
    protected $kmsKey;

    /**
     * @var string
     */
    protected $cannedAcl;

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $s3StorageInfo = new S3StorageInfo();

        return $s3StorageInfo;
    }


    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     * @return S3StorageInfo
     */
    public function setDestination(string $destination): S3StorageInfo
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return S3StorageInfo
     */
    public function setRegion(string $region): S3StorageInfo
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     * @return S3StorageInfo
     */
    public function setEndpoint(string $endpoint): S3StorageInfo
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @return string
     */
    public function getEnableEncryption(): string
    {
        return $this->enableEncryption;
    }

    /**
     * @param string $enableEncryption
     * @return S3StorageInfo
     */
    public function setEnableEncryption(string $enableEncryption): S3StorageInfo
    {
        $this->enableEncryption = $enableEncryption;

        return $this;
    }

    /**
     * @return string
     */
    public function getEncryptionType(): string
    {
        return $this->encryptionType;
    }

    /**
     * @param string $encryptionType
     * @return S3StorageInfo
     */
    public function setEncryptionType(string $encryptionType): S3StorageInfo
    {
        $this->encryptionType = $encryptionType;

        return $this;
    }

    /**
     * @return string
     */
    public function getKmsKey(): string
    {
        return $this->kmsKey;
    }

    /**
     * @param string $kmsKey
     * @return S3StorageInfo
     */
    public function setKmsKey(string $kmsKey): S3StorageInfo
    {
        $this->kmsKey = $kmsKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getCannedAcl(): string
    {
        return $this->cannedAcl;
    }

    /**
     * @param string $cannedAcl
     * @return S3StorageInfo
     */
    public function setCannedAcl(string $cannedAcl): S3StorageInfo
    {
        $this->cannedAcl = $cannedAcl;

        return $this;
    }
}
