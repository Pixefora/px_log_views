<?php

class px_video_log_login extends px_video_log_main
{
    public $id;

    public $mail;

    public $date;

    public $table;

    public function __construct( $id ){

        global $wpdb;

        $this->table = $wpdb->prefix . 'login_log';
        $this->id = $id;

        $obj = parent::get();

        $this->mail = $obj->mail;
        $this->date = $obj->date;


    }

    public function add( $args){

        $insert_id = parent::add($args);

        return $insert_id;


    }

    public function delete($args){

        parent::delete($args);
    }

    public function repository($filters){

        return parent::repository($filters);

    }






}