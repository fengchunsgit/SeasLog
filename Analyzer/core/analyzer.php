<?php
/**
 * seaslog_analyzer
 *
 * @author ciogao@gmail.com
 * Date: 14-3-8 下午5:10
 */
namespace core;

use constant\config as config;
use core\analyzer as coreRun;

class analyzer
{
    static public function run()
    {
        config::getConfig();

        seaslog_set_basepath(config::getAnalyzerPath());

        if ($forkCount = config::getForkCount()) {
            coreRun\pcntl::setForkCount($forkCount);
            coreRun\pcntl::run();
        } else {
            coreRun\single::run();
        }
    }
}