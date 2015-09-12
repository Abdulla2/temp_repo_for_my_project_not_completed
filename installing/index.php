<?php
/**
 *
 */
 /**
  *
  */
  /**
   *
   */

 class index
 {

     function __construct()
     {
         # code...
         $db_o = new database_operations;
         $n_db_o = new non_database_operations;
     }
 }

class database_operations extends MVC_Model
{

    function __construct()
    {
        # code..
        $this->create_or_delete_table("Persons","
                user_id int unsigned auto_increment not null ,
                name varchar(255) not null ,
                password varchar(255) not null ,
                email varchar(255) not null,
                describtion varchar(1000) ,
                date_of_birth date not null ,
                user_gender bit ,
                freelancer_or_pm bit ,
                primary key (user_id) ,
                unique (name) ,
                unique (email)
                "
              );
        $this->create_or_delete_table("al-maharat","

                user_id references Persons(user_id) ,
                name varchar(50) not null ,
                primary key (name,user_id)"
                );
        $this->create_or_delete_table ("Projects","

                project_id int  unsigned auto_increment not null ,
                name varchar(50) not null ,
                describtion varchar(1000) not null,
                category references categories(id),
                status int(1),
                primary key (project_id)
              "  )‬‬;

        $this->create_or_delete_table ("talabat",
            "
                id int unsigned auto_increment not null,
                user_id references Persons(user_id) not null ,
                price int unsigned not null ,
                project_id references Projects(project_id) not null,
                agreed_or_not_agreed int(1) unsigned ,
                primary key (id)

        ");
        $this->create_or_delete_table ("categories",

            "
                id  int unsigned auto_increment not null ,
                name varchar(50) not null ,
                primary key (id)
                
        ");






    }
}
/**
 *
 */
class non_database_operations extends MVC_Controller
{

    function __construct()
    {
        # code...
    }
}
