<?php

namespace tests\unit;


use Codibly\DatabricksBundle\DTO\Autoscale;
use Codibly\DatabricksBundle\DTO\AwsAttributes;
use Codibly\DatabricksBundle\DTO\AwsAvailability;
use Codibly\DatabricksBundle\DTO\Cluster;
use Codibly\DatabricksBundle\DTO\SparkConfPair;

class ClusterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGetParams()
    {
        $cluster = new Cluster();
        $cluster
            ->setClusterName('my-cluster')
            ->setSparkVersion('2.0.x-scala2.10')
            ->setNodeTypeId('r3.xlarge')
            ->addSparkConfPair(
                new SparkConfPair('spark.speculation', true)
            )
            ->setAwsAttributes(
                (new AwsAttributes())
                    ->setAvailability(new AwsAvailability(AwsAvailability::SPOT_WITH_FALLBACK))
                    ->setZoneId('us-west-2a')
            )
            ->setNumWorkers(25)
        ;

        $expectedJson = <<<JSON
{
  "cluster_name": "my-cluster",
  "spark_version": "2.0.x-scala2.10",
  "node_type_id": "r3.xlarge",
  "spark_conf": {
    "spark.speculation": true
  },
  "aws_attributes": {
    "availability": "SPOT",
    "zone_id": "us-west-2a"
  },
  "num_workers": 25
}
JSON;

        codecept_debug($cluster->getParams());
        $this->tester->assertEquals(json_decode($expectedJson, true), $cluster->getParams());

        $autoscaleCluster = new Cluster();
        $autoscaleCluster
            ->setClusterName('autoscaling-cluster')
            ->setSparkVersion('2.0.x-scala2.10')
            ->setNodeTypeId('r3.xlarge')
            ->setAutoscale(
                new Autoscale(2, 50)
            );

        $expectedAutoscaleJson = <<<JSON
{
  "cluster_name": "autoscaling-cluster",
  "spark_version": "2.0.x-scala2.10",
  "node_type_id": "r3.xlarge",
  "autoscale" : {
    "min_workers": 2,
    "max_workers": 50
  }
}
JSON;
        codecept_debug($cluster->getParams());
        $this->tester->assertEquals(json_decode($expectedAutoscaleJson, true), $autoscaleCluster->getParams());
    }

    public function testHydrate()
    {
        $response = [
            'cluster_id' => 'dsfewfwef-egwegwegw-fefwefwef'
        ];

        /** @var Cluster $cluster */
        $cluster = Cluster::hydrate($response);

        $this->tester->assertEquals($response['cluster_id'], $cluster->getClusterId());
    }
}
