<?php

namespace App\Http\Controllers;

use App\Models\master_data_projects;
use App\Models\MasterData;

use App\Models\DevPartners;
use App\Models\TheAgenda;
use App\Models\TheOutput;
use App\Models\TheOutcome;
use App\Models\TheValues;
use App\Models\the_deep_values;
use App\Models\MacroIndicators;

use App\Models\master__data;
use App\Models\geolocation;
use App\Models\additioninfotbl;
use App\Models\contacttbl;
use App\Models\financetbl;
use App\Models\implementingtbl;
use App\Models\scoretbl;
use App\Models\thrusttbl;
use App\Models\theprojectsupdates;

use App\Models\sectortbl;
use App\Models\sub_financing;
use App\Models\sub_sectortbl;

use App\Models\UniversalFunction;

use Illuminate\Http\Request;

use DB;
use Auth;
use Carbon\Carbon;

class Dashboard extends Controller
{
    //
    function index(Request $req)
    {
        $projects = []; // master__data::all();
        $macro    = MacroIndicators::all();

        if ($req->isMethod('post')) {
            $theindicator   = $req->input("theindicator");
            $ma_value       = $req->input("ma_value");
            $smalltext      = $req->input("smalltext");
            $trend          = $req->input("trend");
            $theyear        = $req->input("theyear");

            $ma                 = new MacroIndicators();
            $ma->theindicator   = $theindicator;
            $ma->ma_value       = $ma_value;
            $ma->smalltext      = $smalltext;
            $ma->trend          = $trend;
            $ma->theyear        = $theyear;
            $ma->status         = 1;
            $saved              = $ma->save();

            return redirect()->back()->with('success', 'Post saved successfully!');
        }

        return view("backend.dashboard")->with(["projects" => $projects, "macro" => $macro]);
    }

    function mpapbackend(Request $req)
    {
        // $projects = master__data::select("development_partner","title","masterid")->groupBy(["development_partner","title","masterid"])->get(); //all(); // 
        // $devparts    = DevPartners::all();

        $devparts    = DB::select("select count(masterid) as prjcnt, devpartner, logo, id
                                    from master__data join dev_partners on 
                                    master__data.development_partner = dev_partners.id 
                                    group by devpartner, logo, id");
        $projects    = [];
        return view("backend.mpapback")->with(["panel" => "all", "projects" => $projects,"devparts" => $devparts]);
    }

    function prjsunderdevpart(Request $req) {
        $devpartner = $req->input("devpart");

        $projects   = master__data::where("development_partner", $devpartner)->get();
        $html       = view("backend.modals.prjsunderdevpart")->with(["projects" => $projects])->render();
        return response()->json($html);
    }

    function mpapadd(Request $req)
    {
        // projectitle
        // projectdesc

        // use App\Models\master__data;
        // use App\Models\geolocation;
        // use App\Models\additioninfotbl;
        // use App\Models\contacttbl;
        // use App\Models\financetbl;
        // use App\Models\implementingtbl;
        // use App\Models\scoretbl;
        // use App\Models\thrusttbl;
        // use App\Models\theprojectsupdates;

        if ($req->isMethod("post")) {
            $title = $req->input("projectitle");
            $desc  = $req->input("projectdesc");

            // save to master data 
            $md              = new master__data();
            $md->title       = $title;
            $md->description = $desc;
            $save            = $md->save();

            // save to additioninfotbls
            $ai              = new additioninfotbl();
            $ai->masterid    = $md->id;
            $save            = $ai->save();

            // save to contacttbls
            $ctbl            = new contacttbl();
            $ctbl->masterid  = $md->id;
            $save            = $ctbl->save();

            // // save to financetbl
            // $fd              = new financetbl();
            // $fd->masterid    = $md->id;
            // $save            = $fd->save();

            // // save to geolocation 
            // $geo                    = new geolocation();
            // $geo->md_projectsid     = $fd->id;
            // $save                   = $fd->save();

            // save to implementingtbl
            $itbl            = new implementingtbl();
            $itbl->masterid  = $md->id;
            $save            = $itbl->save();

            // save to scoretbl 
            $sctbl           = new scoretbl();
            $sctbl->masterid = $md->id;
            $save            = $sctbl->save();

            // save to thrusttbl
            $ttbl            = new thrusttbl();
            $ttbl->masterid  = $md->id;
            $save            = $ttbl->save();

            // save to theprojectsupdates
            $tpu             = new theprojectsupdates();
            $tpu->masterid   = $md->id;
            $save            = $tpu->save();

            if ($save) {
                // return redirect()->url("/dashboard/mpap/edit/{$md->id}");
                return redirect()->route("mpapedit", ["id" => $md->id]);
            }
        }

        return view("backend.mpapback")->with(["panel" => "add"]);
    }

    function edit(Request $req, $id)
    {
        // master data
        if ($req->isMethod("post")) {
            // columnplace
            // exactaddr
            // brgy
            // muni_city
            // province
            // region
            // lat
            // lng

            $fd                       = new financetbl();
            $fd->masterid             = $id;
            $fd->amountdisbursed      = null;
            $fd->costtogender         = null;
            $fd->projectamount        = null;
            $fd->projectamountpersite = null;
            $fd->save();

            $geoloc                 = new geolocation();
            $geoloc->md_projectsid  = $fd->id;
            $geoloc->columnplace    = $req->input("columnplace");
            $geoloc->typeofobj      = $req->input("obj");
            $geoloc->exactaddr      = $req->input("exactaddr");
            $geoloc->brgy           = $req->input("brgy");
            $geoloc->muni_city      = $req->input("muni_city");
            $geoloc->province       = $req->input("province");
            $geoloc->region         = $req->input("region");
            $geoloc->lat            = $req->input("lat");
            $geoloc->lng            = $req->input("lng");
            $geoloc->save();
        }

        $collection         = master__data::where(["masterid" => $id])->get();
        $allmasterdata      = master__data::select("masterid", "title", "layertype")->get();

        // geolocation and financials
        $geolocation_and_fd = DB::select("SELECT * from financetbls 
                                                 join geolocation on financetbls.fid = geolocation.md_projectsid 
                                                 where masterid = '{$id}'");

        // development partners
        $devparts           = DevPartners::all();

        // sector 
        $sector             = sectortbl::all();

        // sub sector     
        $sub_sector         = sub_sectortbl::all();

        // sub financing
        $sub_financing      = sub_financing::all();

        // thrust 
        // $thrust          = thrusttbl::all();

        // mindanao agenda
        $ma                 = TheAgenda::all();

        // contacts 
        $contacts           = contacttbl::where(["masterid" => $id])->get();

        // implimenting partners
        $ip                 = implementingtbl::where(["masterid" => $id])->get();

        if (count($collection) == 0) {
            die("ID not found");
        }

        return view("backend.editprogproj")->with([
            "collection"      => $collection,
            "allmasterdata"  => $allmasterdata,
            "contacts"       => $contacts,
            "geo_finance"    => $geolocation_and_fd,
            "devparts"       => $devparts,
            "sector"         => $sector,
            "sub_sector"     => $sub_sector,
            "sub_financing"  => $sub_financing,
            "implimentingps" => $ip,
            "ma"             => $ma
        ]);
    }

    function savelocation(Request $request)
    {
        // $request->validate([
        //     'thecsvfile' => ['required', 'file', 'mimes:csv'],
        // ]);

        $path = $request->file('file')->getRealPath();
        $id   = $request->input("masteridhide");

        $rows   = [];
        $save   = true;
        if (($handle = fopen($path, 'r')) !== false) {
            $header = fgetcsv($handle, 0, ','); // first row as header
            while (($data = fgetcsv($handle, 0, ',')) !== false) {
                // $rows[] = array_combine($header, $data);
                // $rows[$header] = $data;
                // $rows[] = $data[0];

                $fd                       = new financetbl();
                $fd->masterid             = $id;
                $fd->amountdisbursed      = null;
                $fd->costtogender         = null;
                $fd->projectamount        = null;
                $fd->projectamountpersite = null;
                $save                     = $fd->save();

                $geoloc                 = new geolocation();
                $geoloc->md_projectsid  = $fd->id;
                $geoloc->columnplace    = $data[3]. ", ". $data[4];
                $geoloc->typeofobj      = $data[0];
                $geoloc->exactaddr      = $data[1];
                $geoloc->brgy           = $data[2];
                $geoloc->muni_city      = $data[3];
                $geoloc->province       = $data[4];
                $geoloc->region         = $data[5];
                $geoloc->lat            = $data[6];
                $geoloc->lng            = $data[7];
                $save                   = $geoloc->save();
            }

            fclose($handle);
        }

        // Do something with $rows (e.g., save to DB)
        // Example: return to view for debugging
        return response()->json($save);
    }

    function saveupdate(Request $req)
    {
        $theupdate          = $req->input("theupdate");
        $masterid           = $req->input("masterid");

        $update             = new theprojectsupdates();
        $update->updatefrom = Auth::id();
        $update->theupdate  = $theupdate;
        $update->masterid   = $masterid;
        $save               = $update->save();

        return response()->json($save);
    }

    function getupdates(Request $req)
    {
        $masterid   = $req->input("masterid");

        $updatest   = theprojectsupdates::select("users.name", "theprojectsupdates.*")
            ->join("users", "users.id", "=", "theprojectsupdates.updatefrom")
            ->where(["masterid" => $masterid])
            ->get();

        $view       = view("backend.dashboard_modals.theupdates", compact("updatest"))->render();

        return response()->json($view);
    }

    function logframe()
    {
        $collection = TheValues::select()
            ->join("the_outputs", "the_outputs.outputid", "=", "the_values.fkoutputid")
            ->join("the_outcomes", "the_outputs.fkoutcomeid", "=", "the_outcomes.outcomeid")
            ->join("the_agendas", "the_outcomes.fkagendaid", "=", "the_agendas.agendaid")
            ->where("the_agendas.agendaid", 1)
            ->get();

        return view("backend.logframe")->with(["collection" => $collection]);
    }

    function rbme()
    {
        $agenda = TheAgenda::all();

        return view("backend.rbme")->with(["agenda" => $agenda]);
    }

    function editrbme($edit)
    {
        $agendaid   = $edit;

        // $collection = DB::select("SELECT the_outcomes.theoutcome,the_outcomes.outcomeid, the_outcomes.thevalue 
        //                           FROM `the_outcomes` WHERE the_outcomes.fkagendaid = {$agendaid}
        //                           group by the_outcomes.theoutcome, the_outcomes.thevalue, the_outcomes.outcomeid");

        $collection = DB::select("SELECT the_outcomes.theoutcome,the_outcomes.outcomeid, the_outcomes.thevalue, count(the_outputs.outputid) as nokpi 
                                    FROM `the_outcomes` 
                                    left join the_outputs on the_outcomes.outcomeid = the_outputs.fkoutcomeid 
                                    WHERE the_outcomes.fkagendaid = {$agendaid}
                                    group by the_outcomes.theoutcome, the_outcomes.thevalue, the_outcomes.outcomeid");

        $agenda     = TheAgenda::where("agendaid", $agendaid)->get();
        return view("backend.editrbme")->with(["outcomes" => $collection, "agenda" => $agenda, "agendaid" => $agendaid]);
    }

    function get_kpi_window(Request $req)
    {
        $outcomeid    = $req->input("outcomeid");

        $collection   = TheOutput::where("fkoutcomeid", $outcomeid)->get();

        $html         = view("backend.modals.indicator", compact("collection"))->render();

        return response()->json(["indicators" => $html]);
        // return response()->json($collection);
    }

    function outcomefld(Request $req)
    {
        $outcomeid    = $req->input("outcomeid");
        $outcomedets  = TheOutcome::where("outcomeid", $outcomeid)->get();
        $outcomefield = view("backend.modals.outcometxtfield", compact("outcomedets"))->render();

        return response()->json(["outcomefld" => $outcomefield]);
    }

    function uploadlogo(Request $request)
    {
        if ($request->hasFile('file')) {
            $agendaid = $request->input('aid');

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images/ma_icons', $filename, 'public'); // stored in storage/app/public/uploads

            if ($path) {
                $save = TheAgenda::where(["agendaid" => $agendaid])->update(["thelogo" => $filename]);
            }

            return response()->json(['filename' => $filename, 'path' => $path]);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }

    function maidetails(Request $req)
    {
        $maid       = $req->input("mid");

        $collection = "new";

        if ($maid != null) {
            $collection = MacroIndicators::where("ma_id", $maid)->get();
        }

        $html       = view("backend.modals.ma_kpi", compact("collection"))->render();

        return response()->json($html);
    }

    function disagg(Request $req)
    {
        $kpiid          = $req->input("kpiid"); // output id
        $outcomeid      = $req->input("outcomeid");

        // $disaggregation = the_deep_values::select("the_values.valuesid","the_deep_values.thedisaggregation")
        //                                     ->join("the_values","the_values.fkdeepvalueid","=","the_deep_values.dv_id")
        //                                     ->where(["the_deep_values.fkoutputid" => $kpiid])
        //                                     ->groupBy("the_deep_values.dv_id")
        //                                     ->get();

        // $disaggregation = DB::select("select the_values.valuesid,the_deep_values.thedisaggregation, the_deep_values.dv_id from the_deep_values 
        //                               join the_values on the_values.fkdeepvalueid = the_deep_values.dv_id 
        //                               where the_deep_values.fkoutputid = '{$kpiid}' group by the_deep_values.dv_id, the_deep_values.thedisaggregation");

        // $disaggregation = the_deep_values::where(["the_deep_values.fkoutputid" => $kpiid])->get();
        $disaggregation = TheValues::where(["the_values.fkoutputid" => $kpiid])->get();

        $html           = view("backend.modals.disaggregation", compact("disaggregation", "outcomeid"))->render();

        return response()->json($html);
    }

    function disagg_details(Request $req)
    {
        $val_id         = $req->input("val_id");
        $outcomeid      = $req->input("outcomeid");

        // $collection = TheValues::select("the_deep_values.dv_id","the_deep_values.thedisaggregation","the_deep_values.baseline","the_deep_values.target")
        //                                     ->join("the_deep_values","the_values.fkdeepvalueid","=","the_deep_values.dv_id")
        //                                     ->where(["the_deep_values.dv_id" => $val_id])
        //                                     ->get();

        // $collection    = the_deep_values::where(["the_deep_values.dv_id" => $val_id])->get();

        $collection    = TheValues::where(["the_values.valuesid" => $val_id])->get();

        $outcome_years = TheOutcome::where(["outcomeid" => $outcomeid])->get(["yearstart", "yearend"]);

        $html       = view("backend.modals.disagg_details", compact("collection", "outcome_years"))->render();

        return response()->json($html);
    }

    function get_year_val(Request $req)
    {
        $val_id     = $req->input("val_id");
        $theyear    = $req->input("theyear");
        $location   = $req->input("thelocation");

        $collection = TheValues::where(["valuesid" => $val_id, "theyear" => $theyear, "thelocation" => $location])->get();

        $html       = view("backend.modals.currenttxtfld", compact("collection"))->render();

        return response()->json($html);
    }

    function savenew_year(Request $req)
    {
        $theyear        = $req->input("theyear");
        $thelocation    = $req->input("thelocation");
        $val_id         = $req->input("val_id");
        $thecurrent     = $req->input("thecurrent");

        $tv                 = new TheValues();
        $tv->fkdeepvalueid  = $val_id;
        $tv->current        = $thecurrent;
        $tv->theyear        = $theyear;
        $tv->thelocation    = $thelocation;
        $saved              =  $tv->save();

        return response()->json($saved);
    }

    function new_disagg()
    {
        $html   = view("backend.modals.new_disagg")->render();
        return response()->json($html);
    }

    function savenewdisagg(Request $req)
    {
        $disaggtxt      = $req->input("disaggtxt");
        $baselinetxt    = $req->input("baselinetxt");
        $targettxt      = $req->input("targettxt");
        $fkoutputid     = $req->input("fkoutputid");

        $tdv                        = new the_deep_values();
        $tdv->fkoutputid            = $fkoutputid;
        $tdv->thedisaggregation     = $disaggtxt;
        $tdv->baseline              = $baselinetxt;
        $tdv->target                = $targettxt;
        $tdv->thestatus             = 1;
        $save                       = $tdv->save();

        return response()->json($save);
    }

    function savenewoutcome(Request $req)
    {
        $agendaid  = $req->input("agendaid");
        $thename   = $req->input("thename");
        $yearstart = $req->input("yearstart");
        $yearend   = $req->input("yearend");
        $weight    = $req->input("weight");

        $outcomes             = new TheOutcome();
        $outcomes->fkagendaid = $agendaid;
        $outcomes->theoutcome = $thename;
        $outcomes->thevalue   = $weight;
        $outcomes->yearstart  = $yearstart;
        $outcomes->yearend    = $yearend;
        $save                 = $outcomes->save();

        return response()->json($save);
    }

    function saveindicator(Request $req)
    {
        $no                     = new TheOutput();
        $no->fkoutcomeid        = $req->input("theoutcome_");
        $no->kpi                = $req->input("indicatorname");
        $no->theweight          = $req->input('weightoutput');
        $no->frequency          = $req->input('frequencyoutcome');
        $no->thetype            = $req->input('typeofoutcome');
        $no->definition         = $req->input("indicatordefinition");
        $no->source             = $req->input("datasource");
        $save                   = $no->save();

        return response()->json($save);
    }

    function show_location(Request $req)
    {

        $id         = $req->input("loc_id");

        $isnew      = false;

        $collection = [];

        if ($req->input("new")) {
            $isnew = true;
        } else {
            $collection = geolocation::where(["geolocationid" => $id])->get();
        }

        $view       = view("backend.dashboard_modals.location", compact("collection", "isnew"))->render();

        return response()->json($view);
    }

    function show_financials(Request $req)
    {
        $id         = $req->input("geolocationid");

        $collection = DB::select("SELECT * from geolocation 
                                  join financetbls on financetbls.fid = geolocation.md_projectsid 
                                  where geolocationid = '{$id}'");

        $view       = view("backend.dashboard_modals.financing", compact("collection"))->render();

        return response()->json($view);
    }

    function deleterbme(Request $req) {
        $uf = new UniversalFunction();
        
        $tbl  = $req->input("tbl");
        $kid  = $req->input("kid");
        $kfld = $req->input("kfld");

        $deleted = false;
        $sql  = "Delete from {$tbl} where {$kfld} = {$kid}";
        if ($uf->canEdit()) {
            $deleted = DB::delete($sql);
            return response()->json($deleted);
        }
    }

    function deleteOutcome($id) {

    }

    function deleteKpis($id) {

    }
}
