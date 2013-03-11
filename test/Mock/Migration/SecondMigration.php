<?php

/**
 * =============================================================================
 * @file        Mock/Migration/SecondMigration.php
 * @author     Lukasz Cepowski <lukasz@cepowski.com>
 * 
 * @copyright  PHP Commons
 *              Copyright (C) 2009-2012 HellWorx Software
 *              All rights reserved.
 *              www.hellworx.com
 * =============================================================================
 */

namespace Mock\Migration;

use Commons\Migration\MigrationInterface;

class SecondMigration implements MigrationInterface
{
    
    public function upgrade()
    {
        Persistence::$counter += 2;
    }
    
    public function downgrade()
    {
        Persistence::$counter -= 2;
    }
    
}
