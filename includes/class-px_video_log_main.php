<?php

class px_video_log_main
{
    public $id;

    public $table;

    public function get(){
        global $wpdb;

        return $wpdb->get_row( "SELECT * FROM $this->table WHERE id = ".$this->id );

    }

    public function add($args){
        global $wpdb;
        $wpdb->insert(
            $this->table,
            $args
        );
        return $wpdb->insert_id;

    }

    public function delete($args){
        global $wpdb;

        $wpdb->delete(
            $this->table,
            $args
        );

    }

    public function repository($filters){
        global $wpdb;

        $mail = isset($filters['mail']) ? $filters['mail'] : '';
        $date_from = isset($filters['date_from']) ? $filters['date_from'] : '';
        $date_to = isset($filters['date_to']) ? $filters['date_to'] : '';

        $sql = 'SELECT * FROM `'.$this->table.'` WHERE 1';

        if (!empty($mail)){
            $sql.= ' AND mail = "'.$mail.'"';
        }

        if (!empty($date_from)){
            $date_from.= ' 00:00:00';

            $sql.= 'AND date >= "'.$date_from.'"';
        }

        if (!empty($date_to)){
            $date_to.= ' 23:59:59';

            $sql.= 'AND date <= "'.$date_to.'"';
        }
        $sql.=' ORDER BY mail';




        return $wpdb->get_results($sql);

    }
}