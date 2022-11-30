<?php

class px_video_log_video_views extends px_video_log_main
{
    public $id;

    public $id_video;

    public $date;

    public $table;

    public $mail;

    public function __construct( $id ){

        global $wpdb;

        $this->table = $wpdb->prefix . 'video_views';
        $this->id = $id;

        $obj = parent::get();

        $this->id_video = $obj->id_video;
        $this->date = $obj->date;
        $this->mail = $obj->mail;


    }

    public function add( $args){

        $insert_id = parent::add($args);

        return $insert_id;


    }

    public function delete($args){

        parent::delete($args);
    }

    public function repository($filters){

        $repository =  parent::repository($filters);

        array_map(
            array($this,'getVideoName'),$repository
        );

        return $repository;
    }

    public function getVideoName($repo){
        $video_post = get_post($repo->id_video);

        $repo->video_name = $video_post->post_title;
        return $repo;
    }



}