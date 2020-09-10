<?php 


class User {

    private $_id;
    private $_mail;
    private $_psw;

    public function __construct($id,$mail,$psw){
 
        $this->set_id($id);
        $this->set_mail($mail);
        $this->set_psw($psw);
    
    }

    public function get_mail()
    {
        return $this->_mail;
    }

    public function get_psw()
    {
        return $this->_psw;
    }

    public function set_mail($mail)
    {
        $this->_mail = $mail;
    }

    public function set_psw($psw)
    {
        $this->_psw = $psw;
    }

    /**
     * Get the value of _id
     */
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     */
    public function set_id($id)
    {
        $this->_id = $id;

    }

    
}


  