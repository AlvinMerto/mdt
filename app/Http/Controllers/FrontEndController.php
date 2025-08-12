<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\master_data_projects;
use App\Models\MasterData;
use App\Models\master__data;
use App\Models\DevPartners;
use App\Models\financetbl;
use App\Models\Theregion_polys;
use App\Models\TheAgenda;
use App\Models\MacroIndicators;
use App\Models\sectortbl;

use App\Http\Controllers\GenerateGraphs;
use DB;

class FrontEndController extends Controller
{
    //
    function main_window() {
        $agenda = TheAgenda::all();

        return view("main")->with(["agenda" => $agenda]);
    }

    function front() {
        // $collection = DevPartners::all();
        
        // $numofprojs = master__data::all()->count(); "numofprojs" => $numofprojs,
        $ma         = TheAgenda::all();
        $macro      = MacroIndicators::all();

        return view("front.mpap.mpapfront")->with(["ma" => $ma,"macro" => $macro]);
    }

    function mpap_front(Request $req) {
        
        $getgraph         = new GenerateGraphs();
        $gfpy             = $getgraph->getfundingperyear()->getContent();
        $gfpy             = json_decode($gfpy, true);

        $sectors          = sectortbl::all();
        $devparts         = DevPartners::all();
       
        return view("front.mpap_real.mpap_main")->with(["allprojects"      => 0, 
                                                        "loangrant"        => 0, 
                                                        "loangrant_amount" => 0,
                                                        "gfpy"             => $gfpy,
                                                        "sector"           => $sectors,
                                                        "devparts"         => $devparts,
                                                        "alllocs"          => 0]);   
    }

    function allprojects(Request $req) {
        $where = null;

        if (null != $req->input("year")) {
            $where = ["year(master__data.project_start)" => $req->input('year'), "layertype" => 1 ];
        } else {
            $where = ["layertype" => 1];
        }

        $allprojects      = master__data::where($where)->count();

        $alllocs          = master__data::where($where)
                                        ->join("financetbls","financetbls.masterid","=","master__data.masterid")
                                        ->join("geolocation","geolocation.md_projectsid","=","financetbls.fid")
                                        ->count();

        return response()->json(['allprojects' => $allprojects, "alllocs" => $alllocs]);
    }

    function getodagrant_figures(Request $req) {
        $where = null;

        if (null != $req->input("year")) {
            $where = "where year(master__data.project_start) = '{$req->input('year')}' and layertype = 1";
        } else {
            $where = "where layertype = 1";
        }

        $loangrant        = DB::select("SELECT count(masterid) as thecount, type_of_financing FROM `master__data` {$where} group by type_of_financing");
        $loangrant_amount = DB::select("SELECT ROUND(sum(projectamountpersite),2) as amount, type_of_financing 
                                        FROM `master__data` join financetbls on master__data.masterid = financetbls.masterid 
                                        {$where} 
                                        group by type_of_financing");

        return response()->json(["loangrant" => $loangrant, "loangrant_amount" => $loangrant_amount]);
    }

    function thesearchresults(Request $req) {
        $keyword     = $req->input("keyword");

        $sql         = "SELECT `master__data`.*, `geolocation`.`lat`, `geolocation`.`columnplace`,`geolocation`.`lng`, `dev_partners`.`pin`, 
                                    `dev_partners`.`logo`, `dev_partners`.`abbr` 
                                    from `master__data` 
                                    inner join `financetbls` on `master__data`.`masterid` = `financetbls`.`masterid`
                                    inner join `geolocation` on `financetbls`.`fid` = `geolocation`.`md_projectsid` 
                                    inner join `dev_partners` on `master__data`.`development_partner` = `dev_partners`.`id`
                                    where title like '%{$keyword}%' or description like '%{$keyword}%'
                                    or columnplace like '%{$keyword}%'
                                    or exactaddr like '%{$keyword}%'
                                    or brgy like '%{$keyword}%'
                                    or muni_city like '%{$keyword}%'
                                    or province like '%{$keyword}%'
                                    or region like '%{$keyword}%'";

        $collection  = DB::select($sql);
        $view        = view("front.mpap.searchresult", compact("collection"))->render();
        return response()->json($view);
    }

    function searchresults(Request $req) {
        $filters = (array) $req->input("filters");

        $where_string = "";
        $and          = " where ";

        $count = 0;
        if (count($filters) > 0) {
            $where_string = " where ";
            foreach($filters as $key => $value) {
                $where_string .= $key ."='".$value."'";

                if ($count != count($filters)-1) {
                    $where_string .= " and ";
                }

                $count++;
            }
            $and = " and ";
            // $where_string = " where ".implode(" and ", $filters);
        }  

        $level = 1;
        $where_string = " {$where_string} {$and} master__data.layertype = '{$level}'";

        $sql           = "SELECT `master__data`.*, `geolocation`.`lat`, `geolocation`.`columnplace`,`geolocation`.`lng`, `dev_partners`.`pin`, 
                                    `dev_partners`.`logo`, `dev_partners`.`abbr` 
                                    from `master__data` 
                                    inner join `financetbls` on `master__data`.`masterid` = `financetbls`.`masterid`
                                    inner join `geolocation` on `financetbls`.`fid` = `geolocation`.`md_projectsid` 
                                    inner join `dev_partners` on `master__data`.`development_partner` = `dev_partners`.`id` 
                                    {$where_string}";

        $collection          = DB::select($sql);

        $view        = view("front.mpap.searchresult", compact("collection"))->render();
        return response()->json($view);
    }

    function programs(Request $req) {
        $id         = $req->input("id");
        $collection = MasterData::where("development_partner",$id)->get(["title","masterid"]);

        $pins       = MasterData::select("master_data.*","geolocation.lat","geolocation.lng","dev_partners.pin","dev_partners.logo","dev_partners.abbr")
                                    ->join("geolocation","master_data.masterid","=","geolocation.md_projectsid")
                                    ->join("dev_partners","master_data.development_partner","=","dev_partners.id")
                                    ->where("master_data.development_partner",$id)
                                    ->get();

        // return response()->json([$pins,$collection]);
    }

    function getpins(Request $req) {
        // $id         = $req->input("id");
        $status        = $req->input("status");
        $devpart       = $req->input("devpart");
        
        $connector     = "";

        $values        = [];

        $where_string  = null;

        // if ($status == "all") {
        //     $where      = "";
        //     $connector  = "";
        // } else {
        //     $where      = " where master__data.status = '{$status}'";
        //     $connector  = " and ";
        // }

        // if ($devpart != null || $devpart != NULL) {
        //     $where    .= " {$connector} master__data.development_partner = '{$devpart}'";
        // }

        if (null !== $req->input("status")) {
            if ($req->input("status") != "all") {
                array_push($values, "master__data.status = '{$status}'");
            }
        }

        if (null !== $req->input("devpart")) {
            array_push($values, "master__data.development_partner = '{$devpart}'");
            // $where    .= " {$connector} master__data.development_partner = '{$devpart}'";
        }

        if (null !== $req->input("id")) {
            array_push($values, "master__data.masterid = '{$req->input('id')}'");
            // $where    .= " {$connector} master__data.development_partner = '{$devpart}' and master__data.masterid = '{$req->input('id')}'";
        }

        if (null !== $req->input("theyear")) {
            // $where    .= " {$connector} where year(master__data.project_start) = '{$req->input('theyear')}'";
            array_push($values,"year(master__data.project_start) = '{$req->input('theyear')}'");
        }

        // if (null !== $req->input("sector")) {
        if (null !== $req->input("sector")) {
            array_push($values, "master__data.sector = '{$req->input('sector')}'");
            // $where     .= " {$connector} where sector = '{$req->input('sector')}'";
        }

        $level     = 1;

        $and       = " where ";
        $add_where = null;

        if (count($values) > 0) {
            $where_string = " where ".implode(" and ", $values);    
            $and          = " and ";
        }

        $where_string = " {$where_string} {$and} master__data.layertype = '{$level}'";

        $pins          = DB::select("SELECT `master__data`.*, `geolocation`.`lat`, `geolocation`.`lng`, `dev_partners`.`pin`, `geolocation`.`typeofobj`,
                                    `dev_partners`.`logo`, `dev_partners`.`abbr` 
                                    from `master__data` 
                                    inner join `financetbls` on `master__data`.`masterid` = `financetbls`.`masterid`
                                    inner join `geolocation` on `financetbls`.`fid` = `geolocation`.`md_projectsid` 
                                    inner join `dev_partners` on `master__data`.`development_partner` = `dev_partners`.`id` 
                                    {$where_string}");
      
        return response()->json([$pins, $where_string]);
    }

    function filter_it(Request $req) {
        $filters = (array) $req->input("filters");

        $where_string = "";
        $and          = " where ";

        $count = 0;
        if (count($filters) > 0) {
            $where_string = " where ";
            foreach($filters as $key => $value) {
                $where_string .= $key ."='".$value."'";

                if ($count != count($filters)-1) {
                    $where_string .= " and ";
                }

                $count++;
            }
            $and = " and ";
            // $where_string = " where ".implode(" and ", $filters);
        }  

        $level = 1;
        $where_string = " {$where_string} {$and} master__data.layertype = '{$level}'";

        $sql           = "SELECT `master__data`.*,`geolocation`.`region`, `geolocation`.`lat`, `geolocation`.`lng`, `dev_partners`.`pin`, `geolocation`.`typeofobj`,
                                    `dev_partners`.`logo`, `dev_partners`.`abbr` 
                                    from `master__data` 
                                    inner join `financetbls` on `master__data`.`masterid` = `financetbls`.`masterid`
                                    inner join `geolocation` on `financetbls`.`fid` = `geolocation`.`md_projectsid` 
                                    inner join `dev_partners` on `master__data`.`development_partner` = `dev_partners`.`id` 
                                    {$where_string}";

        $pins          = DB::select($sql);
        
        // return response()->json([$pins]);
        return response()->json([$pins, $sql]);
    }

    function the_projects(Request $req) {
        $agendaid   = $req->input("agendaid");

        $pins       = master__data::select("master__data.*","geolocation.lat","geolocation.lng","dev_partners.pin","dev_partners.logo","dev_partners.abbr")
                                    ->join("geolocation","master__data.masterid","=","geolocation.md_projectsid")
                                    ->join("dev_partners","master__data.development_partner","=","dev_partners.id")
                                    ->where("master__data.ma_thrust",$agendaid)
                                    ->get();

        return response()->json(["pins" => $pins]);
    }

    function get_details(Request $req) {
        $id         = $req->input("ii");

        // $collection = MasterData::where(["masterid"=>$id])->get();
        $collection = master__data::select("master__data.*","sectortbls.thesector","financetbls.*","dev_partners.devpartner")
                                ->join("dev_partners","master__data.development_partner","=","dev_partners.id")
                                ->join("sectortbls","master__data.sector","=","sectortbls.sectorid")
                                ->join("financetbls","master__data.masterid","=","financetbls.masterid")
                                ->where(["master__data.masterid" => $id])->get();

        $geolocation = financetbl::select("geolocation.*", "financetbls.*")
                                ->join("geolocation","financetbls.fid","=","geolocation.md_projectsid")
                                ->where("financetbls.masterid",$id)->get();

        return response()->json([$collection,$geolocation]);
    }

    function numberofprojects() { // number of projects per region
        $collection = DB::select("select region, count('masterid') as numprojs from master__data group by region");

        return response()->json($collection);
    }

    function get_polygons() {
        $collection = Theregion_polys::all();
        return response()->json($collection);
    }

    function details_tobox() {
        $html = view("front/mpap/box_details")->render();

        return response()->json($html);
    }

    function get_projects(Request $req) {
        $region = $req->input("region");
        $year   = $req->input("year");

        $where  = "";

        if (null !== $region) {
            $where = "where region = '{$region}'";
        }

        if ($year != null) {
            
            if (null !== $region) {
                $where .= " and ";
            } else {
                $where .= " where ";
            }

            $where .= " year(project_start) = {$year}";
        }

        $collection = DB::select("select region, count('masterid') as numprojs from master__data {$where} group by region");

        return response()->json($collection);
    }
}