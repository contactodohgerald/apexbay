<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait Generics{

    public function random_string ( $type = 'alnum', $len = 15 ){
        switch ( $type )
        {
            case 'alnum'	:
            case 'numeric'	:
            case 'nozero'	:

                switch ($type)
                {
                    case 'alnum'	:	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        break;
                    case 'numeric'	:	$pool = '0123456789';
                        break;
                    case 'nozero'	:	$pool = '123456789';
                        break;
                }

                $str = '';
                $mdstr = md5 ( uniqid ( mt_rand () ) );
                $mdstrstrlen = strlen($mdstr);
                for ( $i=0; $i < $len; $i++ )
                {
                    $str .= substr ( $pool, mt_rand ( 0, strlen ( $pool ) -1 ), 1 );
                }
                return $str.substr($mdstr, 0, $mdstrstrlen/2);
                break;
            case 'unique' : return md5 ( uniqid ( mt_rand () ) );
                break;
        }
    }

    //create a unique id
    public function createUniqueId($table_name, $column){

        /*$unique_id = Controller::picker();*/
        $unique_id = $this->random_string();

        //check for the database count from the database"unique_id"
        $rowcount = DB::table($table_name)->where($column, $unique_id)->count();

        if($rowcount == 0){

            if(empty($unique_id)){
                $this->createUniqueId($table_name, $column);
            }else{
                return $unique_id;
            }

        }else{
            $this->createUniqueId($table_name, $column);
        }

    }


}