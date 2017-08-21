<?php

namespace Codibly\DatabricksBundle\DTO;

class ClusterLogConf extends GenericDTO
{
    /**
     * @var DbfsStorageInfo
     */
    protected $dbfs;

    /**
     * @var S3StorageInfo
     */
    protected $s3;

    public function __construct(\stdClass $storageInfo)
    {
        if(!$storageInfo instanceof DbfsStorageInfo && !$storageInfo instanceof S3StorageInfo) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Object type %s is not valid cluster log storage. Use %s or %s',
                    get_class($storageInfo),
                    DbfsStorageInfo::class,
                    S3StorageInfo::class
                )
            );
        }

        switch (get_class($storageInfo)) {
            case DbfsStorageInfo::class:
                $this->dbfs = $storageInfo;
                break;

            case S3StorageInfo::class:
                $this->s3 = $storageInfo;
                break;
        }
    }

    public static function hydrate(array $rawAPIResponse): DTOInterface
    {
        $clusterLogConf = new ClusterLogConf(new DbfsStorageInfo('dbfs://tmp'));
    }


    /**
     * @return DbfsStorageInfo
     */
    public function getDbfs(): DbfsStorageInfo
    {
        return $this->dbfs;
    }

    /**
     * @return S3StorageInfo
     */
    public function getS3(): S3StorageInfo
    {
        return $this->s3;
    }

    /**
     * @return DbfsStorageInfo|S3StorageInfo
     */
    public function getStorage()
    {
        if(is_null($this->dbfs)) {
            return $this->s3;
        }

        return $this->dbfs;
    }
}
