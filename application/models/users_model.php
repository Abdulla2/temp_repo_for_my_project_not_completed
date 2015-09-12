<?php
class users_model extends MVC_Model
{
    function get_students()
    {
        return $this->select_all('students');
    }
}
