<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TheAgenda;
use App\Models\TheOutcome;
use App\Models\TheValues;
use App\Models\TheOutput;

use App\Models\TheFormulas;

use DB;

class TheAgendaController extends Controller
{
    //

    function get_agenda(Request $req) {
        // $id           = $req->input("agendaid");
        // $kpi_rate     = [];

        // $collection   = DB::select("SELECT valuesid, thelocation, thekpi, ((current-baseline)/(target-baseline)*100) as thevalue, outcomeid FROM the_values
        //                             join the_outcomes on the_values.fkoutcomeid = the_outcomes.outcomeid 
        //                             join the_agendas on the_outcomes.fkagendaid = the_agendas.agendaid
        //                             where agendaid = '{$id}'");
        // // dd($collection);    
        // $regional_data = [];
        
        // foreach($collection as $c) {
        //     if (array_key_exists($c->thelocation, $regional_data)) {
        //         if (array_key_exists($c->outcomeid, $regional_data[$c->thelocation])) {
        //             $regional_data[$c->thelocation] = [$c->outcomeid => $c->valuesid];
        //         } else {
        //             $regional_data[$c->thelocation][$c->outcomeid] = [];
        //         }
        //     } else {
        //         $regional_data[$c->thelocation]                    = [];
        //         $regional_data[$c->thelocation][$c->outcomeid][]   = $c->valuesid;
        //     }
        // }

        // return response()->json(["id" => $id, "collection" => "a"]);
    }

    function get_agenda_details(Request $req) {
        $agendaid   = $req->input("agendaid");

        $agenda     = TheAgenda::where("agendaid",$agendaid)->get();

        $outcomes   = TheOutcome::where("fkagendaid", $agendaid)->get();

        $fm         = new TheFormulas();
        $wv         = $fm->weighted_value();

        // $peragenda  = DB::select("SELECT the_values.thelocation, ROUND(avg({$wv}),2) as thevalue 
        //                             FROM `the_outputs` 
        //                             join the_deep_values on the_outputs.outputid = the_deep_values.fkoutputid 
        //                             join the_values on the_deep_values.dv_id = the_values.fkdeepvalueid 
        //                             join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
        //                             join the_agendas on the_outcomes.fkagendaid = the_agendas.agendaid 
        //                             where agendaid = {$agendaid} group by the_values.thelocation");

        $peragenda  = DB::select("SELECT the_values.thelocation, ROUND(avg({$wv}),2) as thevalue 
                                    FROM `the_outputs` 
                                    join the_values on the_outputs.outputid = the_values.fkoutputid 
                                    join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
                                    join the_agendas on the_outcomes.fkagendaid = the_agendas.agendaid 
                                    where agendaid = {$agendaid} group by the_values.thelocation");
        
        // $sql1       = "SELECT the_agendas.agendaid, the_agendas.agendatitle, 
        //                         ROUND(avg({$wv}),2) as thevalue 
        //                         FROM `the_outputs` 
        //                         join the_deep_values on the_outputs.outputid = the_deep_values.fkoutputid 
        //                         join the_values on the_deep_values.dv_id = the_values.fkdeepvalueid 
        //                         join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
        //                         join the_agendas on the_outcomes.fkagendaid = the_agendas.agendaid 
        //                         where the_agendas.agendaid = {$agendaid}
        //                         group by the_agendas.agendaid, the_agendas.agendatitle";
        
        $sql1       = "SELECT the_agendas.agendaid, the_agendas.agendatitle, 
                                ROUND(avg({$wv}),2) as thevalue 
                                FROM `the_outputs` 
                                join the_values on the_outputs.outputid = the_values.fkoutputid 
                                join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
                                join the_agendas on the_outcomes.fkagendaid = the_agendas.agendaid 
                                where the_agendas.agendaid = {$agendaid}
                                group by the_agendas.agendaid, the_agendas.agendatitle";

        $collection = DB::select($sql1);

        return response()->json(["id"=>$agendaid,"agenda"=>$agenda,"outcomes" => $outcomes, "peragenda" => $peragenda,"agendadetails" => $collection]);
    }

    function get_kpis(Request $req) {
        $fm         = new TheFormulas();
        $wv         = $fm->weighted_value();

        $outcomeid = $req->input("outcomeid");
        $region    = $req->input("region_id_selected");

        $where     = ["the_outcomes.outcomeid" => $outcomeid];

        if (null == $region) {
            array_merge($where, ["the_values.thelocation" => $region]);
        }

        // $sql = "SELECT the_outputs.outputid, the_outputs.kpi, 
        //                             ROUND(avg({$wv}),2) as thevalue 
        //                             from the_deep_values
        //                             join the_values on the_deep_values.dv_id = the_values.fkdeepvalueid 
        //                             join the_outputs on the_deep_values.fkoutputid = the_outputs.outputid 
        //                             where the_outputs.fkoutcomeid = {$outcomeid} 
        //                             group by the_outputs.outputid, the_outputs.kpi";
         
        $sql         = "SELECT the_outputs.outputid, the_outputs.kpi, 
                            ROUND(avg({$wv}),2) as thevalue 
                            from the_values
                            join the_outputs on the_values.fkoutputid = the_outputs.outputid 
                            where the_outputs.fkoutcomeid = {$outcomeid} 
                            group by the_outputs.outputid, the_outputs.kpi";

        $collection  = DB::select($sql);

        return response()->json(["values"=>$collection]);
    }

    function get_kpi_info(Request $req) {
        $fm         = new TheFormulas();
        $wv         = $fm->weighted_value();

        $outputid   = $req->input("outputid");

        $year       = null;

        if (null != $req->input("theyear")) {
            $year   = " and the_values.theyear = '{$req->input('theyear')}'";
        }

        // $sql        = "SELECT the_values.thelocation, 
        //                           ROUND(avg({$wv}),2) as thevalue 
        //                           from the_deep_values
        //                           join the_values on the_deep_values.dv_id = the_values.fkdeepvalueid 
        //                           join the_outputs on the_deep_values.fkoutputid = the_outputs.outputid 
        //                           where the_outputs.outputid = {$outputid} {$year}
        //                           group by the_values.thelocation";

        $sql        = "SELECT the_values.thelocation, 
                        ROUND(avg({$wv}),2) as thevalue,
                        min(the_values.baseline) as baseline, 
                        min(the_values.target) as target
                        from the_values
                        join the_outputs on the_values.fkoutputid = the_outputs.outputid 
                        where the_outputs.outputid = {$outputid} {$year}
                        group by the_values.thelocation";

        // return response()->json($sql);
        $collection = DB::select($sql);

        return response()->json(["values"=>$collection]); 
    }

    function get_per_outcome(Request $req) {
        $fm     = new TheFormulas();
        $wv     = $fm->weighted_value();

        $outcomeid = $req->input("outcomeid");

        $year   = null;

        if (null != $req->input("theyear")) {
            $year   = " and the_values.theyear = '{$req->input('theyear')}'";
        }

        
        // $sql    = "SELECT the_values.thelocation,
        //             ROUND(avg({$wv}),2) as thevalue 
        //             FROM the_deep_values
        //             join the_outputs on the_deep_values.fkoutputid = the_outputs.outputid 
        //             join the_values on the_values.fkdeepvalueid = the_deep_values.dv_id 
        //             join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
        //             WHERE the_outcomes.outcomeid = '{$outcomeid}' {$year}
        //             GROUP BY the_values.thelocation";

        $sql    = "SELECT the_values.thelocation,
                    ROUND(avg({$wv}),2) as thevalue 
                    FROM the_values
                    join the_outputs on the_values.fkoutputid = the_outputs.outputid 
                    join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
                    WHERE the_outcomes.outcomeid = '{$outcomeid}' {$year}
                    GROUP BY the_values.thelocation";

        $collection = DB::select($sql);

        return response()->json(["values" => $collection]);
    }

    function get_agenda_per_region() {

    }

    function get_rate_region() {
        
    }

    function ma_status(Request $req) {
        $fm         = new TheFormulas();
        $wv         = $fm->weighted_value();

        $year       = $req->input("year");

        // $sql = "SELECT the_values.thelocation, ROUND(avg({$wv}),2) as thevalue 
        //             FROM the_deep_values 
        //             join the_outputs on the_deep_values.fkoutputid = the_outputs.outputid 
        //             join the_values on the_values.fkdeepvalueid = the_deep_values.dv_id 
        //             join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
        //             join the_agendas on the_outcomes.fkagendaid = the_agendas.agendaid 
        //             group by the_values.thelocation";

        $sql = "SELECT the_values.thelocation, ROUND(avg({$wv}),2) as thevalue 
                FROM the_values 
                join the_outputs on the_values.fkoutputid = the_outputs.outputid 
                join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
                join the_agendas on the_outcomes.fkagendaid = the_agendas.agendaid 
                group by the_values.thelocation";

        $collection = DB::select($sql);
        
        return response()->json($collection);
    }

    function avg_allregion_peragenda(Request $req) {
        // $agendaid = $req->input("agendaid");
        $agendaid = 1;
        
        $fm         = new TheFormulas();
        $wv         = $fm->weighted_value();

        // $sql = "SELECT the_agendas.agendaid, the_agendas.agendatitle, 
        //         ROUND(avg({$wv}),2) as thevalue 
        //         FROM `the_outputs` 
        //         join the_deep_values on the_outputs.outputid = the_deep_values.fkoutputid 
        //         join the_values on the_deep_values.dv_id = the_values.fkdeepvalueid 
        //         join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
        //         join the_agendas on fkagendaid = agendaid 
        //         group by the_agendas.agendaid, the_agendas.agendatitle";

        $sql        = "SELECT the_agendas.agendaid, the_agendas.agendatitle, 
                        ROUND(avg({$wv}),2) as thevalue 
                        FROM `the_outputs` 
                        join the_values on the_outputs.outputid = the_values.fkoutputid 
                        join the_outcomes on the_outputs.fkoutcomeid = the_outcomes.outcomeid 
                        join the_agendas on fkagendaid = agendaid 
                        group by the_agendas.agendaid, the_agendas.agendatitle";

        $collection = DB::select($sql);

        return response()->json($collection);        
    }

    function trend(Request $req) {
        $outpudid   = $req->input("outpudid");

        $collection = TheOutcome::select("the_outcomes.outcomeid","the_outcomes.yearstart","the_outcomes.yearend")
                                ->join("the_outputs","the_outcomes.outcomeid","=","the_outputs.fkoutcomeid")
                                ->where(["the_outputs.outputid" => $outpudid])
                                ->groupBy('the_outcomes.outcomeid',"yearstart","yearend")
                                ->get();

        // $sql = "SELECT sum(the_values.current) as current, the_values.theyear 
        //                             from the_deep_values join the_values on the_deep_values.dv_id = the_values.fkdeepvalueid 
        //                             where the_deep_values.fkoutputid = '{$outpudid}' 
        //                             group by the_values.theyear 
        //                             ORDER by theyear ASC";
         
        $sql        = "SELECT sum(the_values.current) as current, the_values.theyear 
                        from the_values 
                        where the_values.fkoutputid = '{$outpudid}' 
                        group by the_values.theyear 
                        ORDER by theyear ASC";

        $yearval    = DB::select($sql);
    
        $html = view("backend.modals.trend", compact("collection","yearval"))->render();

        return response()->json($html);
    }
}
