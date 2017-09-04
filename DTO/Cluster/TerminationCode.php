<?php

namespace Codibly\DatabricksBundle\DTO;

class TerminationCode
{
    const USER_REQUEST = 'USER_REQUEST';
    const JOB_FINISHED = 'JOB_FINISHED';
    const INACTIVITY = 'INACTIVITY';
    const CLOUD_PROVIDER_SHUTDOWN = 'CLOUD_PROVIDER_SHUTDOWN';
    const COMMUNICATION_LOST = 'COMMUNICATION_LOST';
    const CLOUD_PROVIDER_LAUNCH_FAILURE = 'CLOUD_PROVIDER_LAUNCH_FAILURE';
    const SPARK_STARTUP_FAILURE = 'SPARK_STARTUP_FAILURE';
    const INVALID_ARGUMENT = 'INVALID_ARGUMENT';
    const UNEXPECTED_LAUNCH_FAILURE = 'UNEXPECTED_LAUNCH_FAILURE';
    const INTERNAL_ERROR = 'INTERNAL_ERROR';
    const INSTANCE_UNREACHABLE = 'INSTANCE_UNREACHABLE';

    public static $description = [
        self::USER_REQUEST => 'A user terminated the cluster directly. Parameters should include a username field that indicates the specific user who terminated the cluster',
        self::JOB_FINISHED => 'This cluster was launched by a Job, and terminated when the Job completed',
        self::INACTIVITY => 'This cluster was terminated since it was idle',
        self::CLOUD_PROVIDER_SHUTDOWN => 'The instance that hosted the spark driver was terminated by the cloud provider. In AWS, for example, AWS may retire instances and directly shut them down. Parameters should include an aws_instance_state_reason field indicating the AWS-provided reason why the instance was terminated',
        self::COMMUNICATION_LOST => 'Databricks may lose connection to services on the driver instance. One such case is when problems arise in cloud networking infrastructure, or when the instance itself becomes unhealty',
        self::CLOUD_PROVIDER_LAUNCH_FAILURE => 'Databricks may hit cloud provider failures when requesting instances to launch clusters. For example, AWS limits the number of running instances and EBS volumes. If you ask Databricks to launch a cluster that requires instances or EBS volumes that exceed your AWS limit, the cluster will fail with this status code. Parameters should include one of aws_api_error_code, aws_instance_state_reason, or aws_spot_request_status to indicate the AWS-provided reason why Databricks could not request the required instances for the cluster',
        self::SPARK_STARTUP_FAILURE => 'The Spark driver failed to start. Possible reasons may include incompatible libraries and initialization scripts that corrupted the Spark container',
        self::INVALID_ARGUMENT => 'Cannot launch the cluster because the user specified an invalid argument. For example, the use might specify an invalid spark version for the cluster',
        self::UNEXPECTED_LAUNCH_FAILURE => 'While launching this cluster, Databricks failed to complete critical setup steps, terminating the cluster',
        self::INTERNAL_ERROR => 'Databricks encountered an unexpected error which forced the running cluster to be terminated. Please contact Databricks support for additional details',
        self::INSTANCE_UNREACHABLE => 'Databricks was not able to access instances in order to start the cluster. This can be a transient networking issue. If the problem persists, this usually indicates a networking environment misconfiguration',
    ];
}
