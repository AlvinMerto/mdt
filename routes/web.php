<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\UniversalUse;
use App\Http\Controllers\GenerateGraphs;
use App\Http\Controllers\TheAgendaController;

use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

Route::get('/tracker', [FrontEndController::class,"main_window"])->name("main_window");
Route::get('/', function() {
    return redirect()->route("main_window");
});

Route::get("/test", function(){
    // $name = "Alvin";

    // for($i=strlen($name)-1;$i>=0;$i--) {
    //     echo $name[$i];
    // }

    $thearr = ["devpart.id='1'","hello='2'"];

    print_r( implode(" and ", $thearr) );
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get("/mpap/{panel?}",[FrontEndController::class,"front"])->name("mpap.front");
Route::get("/tracker/mpap",[FrontEndController::class,"mpap_front"])->name("mpap.front");
Route::get("/tracker/rbme",[FrontEndController::class,"front"])->name("rbme.front");
Route::get("/tracker/programs",[FrontEndController::class,"programs"])->name("programs");
Route::get("/tracker/default", [FrontEndController::class,"getpins"])->name("default");
Route::get("/tracker/getdetails",[FrontEndController::class,"get_details"])->name("getdetails");
Route::get("/tracker/numberofprojects", [FrontEndController::class,"numberofprojects"])->name("numberofprojects");
Route::get('/tracker/get_polygons',[FrontEndController::class,"get_polygons"])->name("get_polygons");
Route::get("/tracker/details_tobox",[FrontEndController::class,"details_tobox"])->name("details_tobox");
Route::get("/tracker/get_projects",[FrontEndController::class,"get_projects"])->name("get_projects");
Route::get("/tracker/the_projects",[FrontEndController::class,"the_projects"])->name("the_projects");

Route::middleware("auth")->group(function() {
    Route::get("/tracker/dashboard",[Dashboard::class,"index"])->name("dashboard");
    Route::post("/tracker/dashboard", [Dashboard::class,"index"])->name("dashboard");
    // Route::match(['get', 'post'],"/edit/{db?}/{id?}", [Dashboard::class,"edit"])->name("edit");
    Route::get("/tracker/logframe",[Dashboard::class,"logframe"])->name("logframe");
    Route::get("/tracker/dashboard/rbme", [Dashboard::class,"rbme"])->name("rbme");
    Route::get("/tracker/dashboard/rbme/{edit?}", [Dashboard::class,"editrbme"])->name("editrbme");
    Route::get('/tracker/dashboard/mpap', [Dashboard::class,"mpapbackend"])->name("mpapbackend");
    Route::match(["get","post"],"/tracker/dashboard/mpap/edit/{id?}",[Dashboard::class,"edit"])->name("mpapedit");
    Route::match(["get","post"],"/tracker/dashboard/mpap/add",[Dashboard::class,"mpapadd"])->name("mpapadd");

    Route::get("/tracker/get_kpi_window",[Dashboard::class,"get_kpi_window"])->name("get_kpi_window");
    Route::get("/tracker/disagg",[Dashboard::class,"disagg"])->name("disagg");
    Route::get("/tracker/disagg_details", [Dashboard::class,"disagg_details"])->name("disagg_details");
    Route::post("/tracker/savefunc", [UniversalUse::class,"savefunc"])->name("savefunc");
    Route::post("/tracker/savenew_year",[Dashboard::class,"savenew_year"])->name("savenew_year");
    Route::post('/tracker/savenewdisagg',[Dashboard::class,"savenewdisagg"])->name("savenewdisagg");
    Route::post("/tracker/uploadlogo",[Dashboard::class,"uploadlogo"])->name("uploadlogo");
    Route::get("/tracker/maidetails", [Dashboard::class,"maidetails"])->name("maidetails");
    Route::get("/tracker/outcomefld", [Dashboard::class,"outcomefld"])->name("outcomefld");
    Route::get("/tracker/new_disagg",[Dashboard::class,"new_disagg"])->name("new_disagg");
    Route::get("/tracker/get_year_val", [Dashboard::class,"get_year_val"])->name("get_year_val");
    Route::post("/tracker/savenewoutcome", [Dashboard::class,"savenewoutcome"])->name("savenewoutcome");
    Route::post("/tracker/saveindicator", [Dashboard::class,"saveindicator"])->name("saveindicator");
    Route::post("/tracker/saveupdate",[Dashboard::class,"saveupdate"])->name("saveupdate");
    Route::get("/tracker/getupdates",[Dashboard::class,"getupdates"])->name("getupdates");
    Route::post("/tracker/savelocation",[Dashboard::class,"savelocation"])->name("savelocation");

    Route::get("/tracker/prjsunderdevpart",[Dashboard::class,"prjsunderdevpart"])->name("prjsunderdevpart");
});

Route::get("/tracker/get_agenda", [TheAgendaController::class,"get_agenda"])->name("get_agenda");
Route::get("/tracker/get_agenda_details",[TheAgendaController::class,"get_agenda_details"])->name("get_agenda_details");
Route::get("/tracker/get_kpis", [TheAgendaController::class,"get_kpis"])->name("get_kpis");
Route::get("/tracker/get_kpi_info", [TheAgendaController::class,"get_kpi_info"])->name("get_kpi_info");
Route::get("/tracker/ma_status",[TheAgendaController::class,"ma_status"])->name("ma_status");
Route::get("/tracker/avg_allregion_peragenda",[TheAgendaController::class,"avg_allregion_peragenda"])->name('avg_allregion_peragenda');
Route::get("/tracker/trend",[TheAgendaController::class,"trend"])->name("trend");

// the graphs
Route::get("/tracker/progress_status",[GenerateGraphs::class,"progress_status"])->name("progress_status");
Route::get("/tracker/amount_per_projects",[GenerateGraphs::class,"amount_per_projects"])->name("amount_per_projects");
Route::get("/tracker/sum_of_projects_per_region",[GenerateGraphs::class,"sum_of_projects_per_region"])->name("sum_of_projects_per_region");
Route::get("/tracker/countOfProjects", [GenerateGraphs::class,"countOfProjects"])->name("countOfProjects");
Route::get("/tracker/loan_grants",[GenerateGraphs::class,"loan_grants"])->name('loan_grants');
Route::get("/tracker/generate",[GenerateGraphs::class,"generateData"])->name("generateData");

Route::get("/tracker/show_location", [Dashboard::class,"show_location"])->name('show_location');
Route::post("/tracker/show_location",[Dashboard::class,"show_location"])->name("show_location");
Route::get("/tracker/show_financials",[Dashboard::class,"show_financials"])->name('show_financials');
Route::get("/tracker/thesearchresults", [FrontEndController::class,"thesearchresults"])->name("thesearchresults");
Route::get("/tracker/searchresults",[FrontEndController::class,"searchresults"])->name("searchresults");
Route::get("/tracker/filter_it", [FrontEndController::class,"filter_it"])->name("filter_it");
Route::get("/tracker/generatereport", [FrontEndController::class,"generatereport"])->name("generatereport");
Route::get("/tracker/topoda", [FrontEndController::class,"topoda"])->name("topoda");

// widgets 
Route::get("/tracker/allprojects", [FrontEndController::class,"allprojects"])->name('allprojects');
Route::get("/tracker/getodagrant_figures", [FrontEndController::class,"getodagrant_figures"])->name("getodagrant_figures");
require __DIR__.'/auth.php';
