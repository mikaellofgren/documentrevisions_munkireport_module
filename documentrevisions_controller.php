<?php 

/**
 * documentrevisions, report controller class
 *
 * @package munkireport
 * @author Mikael Lofgren
 **/
class documentrevisions_controller extends Module_controller
{
    public function __construct()
    {
        $this->module_path = dirname(__FILE__);
    }

    /**
     * Default method
     *
     * @author Mikael Lofgren
     **/
    public function index()
    {
        echo "You've loaded the documentrevisions report module!";
    }

/**
     * Retrieve data in json format
     *
     **/
    public function get_data($serial_number = '')
    {
        $obj = new View();

        if (! $this->authorized()) {
            $obj->view('json', array('msg' => 'Not authorized'));
            return;
        }

        $documentrevisions = new documentrevisions_model($serial_number);
        $obj->view('json', array('msg' => $documentrevisions->rs));
    }
} // END class documentrevisions_controller