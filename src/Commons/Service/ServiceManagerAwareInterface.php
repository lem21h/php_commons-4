<?php

/**
 * =============================================================================
 * @file       Commons/Service/ServiceManagerAwareInterface.php
 * @author     Lukasz Cepowski <lukasz@cepowski.com>
 * 
 * @copyright  PHP Commons
 *             Copyright (C) 2009-2013 PHP Commons Contributors
 *             All rights reserved.
 *             www.phpcommons.com
 * =============================================================================
 */

namespace Commons\Service;

interface ServiceManagerAwareInterface
{

    /**
     * Set service manager.
     * @param ServiceManagerInterface $serviceManager
     * @return ServiceManagerAwareInterface
     */
    public function setServiceManager(ServiceManagerInterface $serviceManager);
    
    /**
     * Get service manager.
     * @return ServiceManagerInterface
     */
    public function getServiceManager();
    
}
