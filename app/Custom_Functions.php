<?php

use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\DB;


//****************************Queries*********************************** */
///Get All Records
if (!function_exists('GetAllRecords')) {
    function GetAllRecords($table = null)
    {
        $records = DB::table($table)->get();
        return $records->toArray();
    }
}


///GetByWhere
if (!function_exists('GetByWhere')) {
    function GetByWhere($table = null, $where = array())
    {
        $records = DB::table($table)->where($where)->get();
        return $records->toArray();
    }
}

///LastQuery
if (!function_exists('GetLastQuery')) {
    function GetLastQuery()
    {
        $query = DB::getQueryLog();
        dd($query);
    }
}


///addNew
if (!function_exists('addNew')) {
    function addNew($table, $data)
    {
        $id = DB::table($table)->insertGetId(
            $data
        );
        return $id;
    }
}


///UpdateRecord
if (!function_exists('UpdateRecord')) {
    function UpdateRecord($table = null, $where = array(),  $data = array())
    {
        $affected = DB::table($table)
            ->where($where)
            ->update($data);
        return $affected;
    }
}
///DeleteRecord
if (!function_exists('DeleteRecord')) {
    function DeleteRecord($table = null, $where = array())
    {
        DB::table($table)->where($where)->delete();
         
    }
}

///EnableQueryLog 
if (!function_exists('EnableQueryLog')) {
    function EnableQueryLog()
    {
        ///Query Logs
        DB::enableQueryLog();
    }
}
