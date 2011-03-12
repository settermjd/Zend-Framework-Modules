<?php
/**
 * Ensure's that a user is logged in before using the application
 *
 */
class User_Plugin_Menu extends Zend_Controller_Plugin_Abstract
{
    protected $_redirector = NULL;

    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        $auth = Zend_Auth::getInstance();
        $navigation = Zend_Registry::get('Zend_Navigation');
        if ($auth instanceof Zend_Auth && $auth->hasIdentity()) {
            // create and assign login page
            $pageLogout = new Zend_Navigation_Page_Mvc(array(
                'action'     => 'logout',
                'controller' => 'index',
                'module'     => 'user',
                'title'      => 'Logout',
                'label'      => 'Logout',
                'route'      => 'logout'
            ));
            // create and assign update profile page
            $pageUpdateProfile = new Zend_Navigation_Page_Mvc(array(
                'action'     => 'update-password',
                'controller' => 'index',
                'module'     => 'user',
                'title'      => 'Update Password',
                'label'      => 'Update Password',
                'route'      => 'update-password'
            ));
            // create and assign update password page
            $pageUpdatePassword = new Zend_Navigation_Page_Mvc(array(
                'action'     => 'update-profile',
                'controller' => 'index',
                'module'     => 'user',
                'title'      => 'Update Profile',
                'label'      => 'Update Profile',
                'route'      => 'update-profile'
            ));
            $navigation->addPage($pageLogout)
                       ->addPage($pageUpdateProfile)
                       ->addPage($pageUpdatePassword);
        } else {
            $page = new Zend_Navigation_Page_Mvc(array(
                'action'     => 'login',
                'controller' => 'index',
                'module'     => 'user',
                'title'      => 'login',
                'label'      => 'login',
                'route'      => 'login'
            ));
            $navigation->addPage($page);
        }
    }
}