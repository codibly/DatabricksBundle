<?php

namespace Codibly\DatabricksBundle\DTO;

final class ClusterState
{
    const PENDING = 'PENDING';
    const RUNNING = 'RUNNING';
    const RESTARTING = 'RESTARTING';
    const RESIZING = 'RESIZING';
    const TERMINATING = 'TERMINATING';
    const TERMINATED = 'TERMINATED';
    const ERROR = 'ERROR';
    const UNKNOWN = 'UNKNOWN';

    public $description = [
        self::PENDING => 'Indicates a cluster that is in progress of being created.',
        self::RUNNING => 'Indicates a cluster that has been started and is ready for use.',
        self::RESTARTING => 'Indicates that a cluster is in the process of restarting.',
        self::RESIZING => 'Indicates that a cluster is in the process of adding or removing nodes.',
        self::TERMINATING => 'Indicates that a cluster is in the process of being destroyed.',
        self::TERMINATED => 'Indicates a cluster which has been successfully destroyed.',
        self::ERROR => 'This state is not used anymore. It was used to indicate a cluster which failed to be created. Terminating and Terminated are used instead.',
        self::UNKNOWN => 'Indicates a cluster which is an unknown state. A cluster should never be in this state.',
    ];
}
