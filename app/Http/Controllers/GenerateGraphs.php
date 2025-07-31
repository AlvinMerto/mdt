<?php

namespace App\Http\Controllers;

use App\Models\MasterData;
use Illuminate\Http\Request;

use DB;

class GenerateGraphs extends Controller
{
    function progress_status() {
        // Agriculture, Agrarian Reform
        // Industry, Trade and Tourism
        // Governance and Institutional Development
        // Social Reform and Community Development
        // infrastructure
        
        $collection = ["agriculture" => [
                                        "pipeline"   => MasterData::where("sector","like","Agriculture, Agrarian Reform")->where("status","pipeline")->count(),
                                        "ongoing"    => MasterData::where("sector","like","Agriculture, Agrarian Reform")->where("status","on-going")->count(),
                                        "completed"  => MasterData::where("sector","like","Agriculture, Agrarian Reform")->where("status","completed")->count(),
                                        "onhold"     => MasterData::where("sector","like","Agriculture, Agrarian Reform")->where("status","on-hold")->count(),
                                    ],
                        "itt"   => [
                                        "pipeline"   => MasterData::where("sector","like","Industry, Trade and Tourism")->where("status","pipeline")->count(),
                                        "ongoing"    => MasterData::where("sector","like","Industry, Trade and Tourism")->where("status","on-going")->count(),
                                        "completed"  => MasterData::where("sector","like","Industry, Trade and Tourism")->where("status","completed")->count(),
                                        "onhold"     => MasterData::where("sector","like","Industry, Trade and Tourism")->where("status","on-hold")->count(),
                                    ],
                        "gid"   => [
                                        "pipeline"   => MasterData::where("sector","like","Governance and Institutional Development")->where("status","pipeline")->count(),
                                        "ongoing"    => MasterData::where("sector","like","Governance and Institutional Development")->where("status","on-going")->count(),
                                        "completed"  => MasterData::where("sector","like","Governance and Institutional Development")->where("status","completed")->count(),
                                        "onhold"     => MasterData::where("sector","like","Governance and Institutional Development")->where("status","on-hold")->count(),
                                    ],
                        "infra" => [
                                        "pipeline"   => MasterData::where("sector","like","infrastructure")->where("status","pipeline")->count(),
                                        "ongoing"    => MasterData::where("sector","like","infrastructure")->where("status","on-going")->count(),
                                        "completed"  => MasterData::where("sector","like","infrastructure")->where("status","completed")->count(),
                                        "onhold"     => MasterData::where("sector","like","infrastructure")->where("status","on-hold")->count(),
                                    ],
                        "srcd"  => [
                                        "pipeline"   => MasterData::where("sector","like","Social Reform and Community Development")->where("status","pipeline")->count(),
                                        "ongoing"    => MasterData::where("sector","like","Social Reform and Community Development")->where("status","on-going")->count(),
                                        "completed"  => MasterData::where("sector","like","Social Reform and Community Development")->where("status","completed")->count(),
                                        "onhold"     => MasterData::where("sector","like","Social Reform and Community Development")->where("status","on-hold")->count(),
                                    ],
                        ]; 

        return response()->json($collection);
    }

    function number_of_projects(Request $req) {
        $collection = DB::select("select 
                                    CASE WHEN region < 9 THEN 'Other' 
                                        WHEN region = 'barmm' THEN 'barmm' 
                                        WHEN region = 'nationwide' then 'nationwide' 
                                        WHEN region >= 9 THEN 'Mindanao Specific' 
                                    END as theregion, 
                                    sum(projectamountpersite) as total from master__data 
                                    join financetbls on master__data.masterid = financetbls.masterid 
                                    join geolocation on financetbls.fid = geolocation.md_projectsid
                                    where master__data.type_of_financing = '{$req->input('type_of_financing')}'
                                    GROUP by theregion");

        return response()->json($collection);
    }

    function sum_of_projects_per_region(Request $req) {
        // $collection = DB::select("SELECT region, projectamount, projectamountpersite 
        //                           FROM financetbls 
        //                           JOIN geolocation ON financetbls.fid = geolocation.md_projectsid 
        //                           GROUP BY region");

        $collection    = DB::select("SELECT region, sum(projectamountpersite) as totalprojects 
                                     FROM financetbls 
                                     JOIN geolocation ON financetbls.fid = geolocation.md_projectsid 
                                     JOIN master__data on financetbls.masterid = master__data.masterid
                                     where master__data.type_of_financing = '{$req->input('type_of_financing')}'
                                     GROUP BY region");
        
        return response()->json($collection);
    }

    function loan_grants() {
        $collection = DB::select("SELECT sum(projectamountpersite)/1000000 as total, UPPER(type_of_financing) as type_of_financing
                                  FROM financetbls 
                                  join master__data on financetbls.masterid = master__data.masterid 
                                  where master__data.type_of_financing = 'loan' or master__data.type_of_financing = 'grant'
                                  GROUP BY type_of_financing");
        
        return response()->json($collection);
    }

    function getfundingperyear() { // financial
        $collection = DB::select("select 
                                    YEAR(project_start) as theyear, 
                                    sum(projectamountpersite) as total from 
                                    master__data join financetbls on master__data.masterid = financetbls.masterid 
                                    join geolocation on financetbls.fid = geolocation.md_projectsid 
                                    where master__data.type_of_financing = 'grant' 
                                    GROUP by YEAR(project_start)");
        return response()->json($collection);
    }
}
