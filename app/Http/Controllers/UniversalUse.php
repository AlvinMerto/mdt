<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class UniversalUse extends Controller
{
    //
    function savefunc(Request $req) {
    // var table       = "the_values";
    // var keyid_field = "valuesid";

    // var keyfield    = $(this).data('field');
    // var keyid       = $(this).data('dbid');
    // var thevalue    = $(this).val();

        $table       = $req->input("table");
        $keyid_field = $req->input("keyid_fld");
        $keyid       = $req->input("keyid");
        $keyfield    = $req->input("keyfield");
        $thevalue    = $req->input("thevalue");

        $ret         = DB::table($table)->where([$keyid_field=>$keyid])->update([$keyfield => $thevalue]);

        return response()->json($ret);
    }

    function savenew(Request $req) {
        $table       = $req->input("table");
        $keyid_field = $req->input("keyid_fld");
        $keyid       = $req->input("keyid");
        $keyfield    = $req->input("keyfield");
        $thevalue    = $req->input("thevalue");
    }
}
