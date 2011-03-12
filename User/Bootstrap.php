<?php

class User_Bootstrap extends Zend_Application_Module_Bootstrap
{
    /**
     * This allows for adding resources with configuration options
     */
    protected function _initPlugins()
    {
        $bootstrap = $this->getApplication();
        $bootstrap->bootstrap('frontcontroller');
        $front = $bootstrap->getResource('frontcontroller');
        $front->registerPlugin(new User_Plugin_Menu());
    }
}

