<?php

namespace tests\functional;


use Codibly\DatabricksBundle\DTO\Cluster;

class ClusterCest
{
    public function testList(\FunctionalTester $I)
    {
        $jsonResponse = json_decode(file_get_contents(codecept_data_dir('cluster_list.json')),true);

        $list = [];

        foreach ($jsonResponse['clusters'] as $rawCluster) {
            $list[] = Cluster::hydrate($rawCluster);
        }

        $I->assertCount(4, $list);

        foreach ($list as $cluster) {
            $I->assertInstanceOf(Cluster::class, $cluster);
        }
    }
}
