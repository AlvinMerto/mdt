<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\UniversalUse;
use App\Http\Controllers\GenerateGraphs;
use App\Http\Controllers\TheAgendaController;

use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

Route::get('/', [FrontEndController::class,"main_window"])->name("main_window");
// Route::get('/', function() {
//     return redirect()->route("main_window");
// });

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
Route::get("/programs",[FrontEndController::class,"programs"])->name("programs");
Route::get("/default", [FrontEndController::class,"getpins"])->name("default");
Route::get("/getdetails",[FrontEndController::class,"get_details"])->name("getdetails");
Route::get("/numberofprojects", [FrontEndController::class,"numberofprojects"])->name("numberofprojects");
Route::get('/get_polygons',[FrontEndController::class,"get_polygons"])->name("get_polygons");
Route::get("/details_tobox",[FrontEndController::class,"details_tobox"])->name("details_tobox");
Route::get("/get_projects",[FrontEndController::class,"get_projects"])->name("get_projects");
Route::get("/the_projects",[FrontEndController::class,"the_projects"])->name("the_projects");

Route::middleware("auth")->group(function() {
    Route::get("/dashboard",[Dashboard::class,"index"])->name("dashboard");
    Route::post("/dashboard", [Dashboard::class,"index"])->name("dashboard");
    // Route::match(['get', 'post'],"/edit/{db?}/{id?}", [Dashboard::class,"edit"])->name("edit");
    Route::get("/logframe",[Dashboard::class,"logframe"])->name("logframe");
    Route::get("/dashboard/rbme", [Dashboard::class,"rbme"])->name("rbme");
    Route::get("/dashboard/rbme/{edit?}", [Dashboard::class,"editrbme"])->name("editrbme");
    Route::get('/dashboard/mpap', [Dashboard::class,"mpapbackend"])->name("mpapbackend");
    Route::match(["get","post"],"/dashboard/mpap/edit/{id?}",[Dashboard::class,"edit"])->name("mpapedit");
    Route::match(["get","post"],"/dashboard/mpap/add",[Dashboard::class,"mpapadd"])->name("mpapadd");

    Route::get("/get_kpi_window",[Dashboard::class,"get_kpi_window"])->name("get_kpi_window");
    Route::get("/disagg",[Dashboard::class,"disagg"])->name("disagg");
    Route::get("/disagg_details", [Dashboard::class,"disagg_details"])->name("disagg_details");
    Route::post("/savefunc", [UniversalUse::class,"savefunc"])->name("savefunc");
    Route::post("/savenew_year",[Dashboard::class,"savenew_year"])->name("savenew_year");
    Route::post('/savenewdisagg',[Dashboard::class,"savenewdisagg"])->name("savenewdisagg");
    Route::post("/uploadlogo",[Dashboard::class,"uploadlogo"])->name("uploadlogo");
    Route::get("/maidetails", [Dashboard::class,"maidetails"])->name("maidetails");
    Route::get("/outcomefld", [Dashboard::class,"outcomefld"])->name("outcomefld");
    Route::get("/new_disagg",[Dashboard::class,"new_disagg"])->name("new_disagg");
    Route::get("/get_year_val", [Dashboard::class,"get_year_val"])->name("get_year_val");
    Route::post("/savenewoutcome", [Dashboard::class,"savenewoutcome"])->name("savenewoutcome");
    Route::post("/saveindicator", [Dashboard::class,"saveindicator"])->name("saveindicator");
    Route::post("/saveupdate",[Dashboard::class,"saveupdate"])->name("saveupdate");
    Route::get("/getupdates",[Dashboard::class,"getupdates"])->name("getupdates");
    Route::post("/savelocation",[Dashboard::class,"savelocation"])->name("savelocation");

    Route::get("/prjsunderdevpart",[Dashboard::class,"prjsunderdevpart"])->name("prjsunderdevpart");
});

Route::get("/get_agenda", [TheAgendaController::class,"get_agenda"])->name("get_agenda");
Route::get("/get_agenda_details",[TheAgendaController::class,"get_agenda_details"])->name("get_agenda_details");
Route::get("/get_kpis", [TheAgendaController::class,"get_kpis"])->name("get_kpis");
Route::get("/get_kpi_info", [TheAgendaController::class,"get_kpi_info"])->name("get_kpi_info");
Route::get("/ma_status",[TheAgendaController::class,"ma_status"])->name("ma_status");
Route::get("/avg_allregion_peragenda",[TheAgendaController::class,"avg_allregion_peragenda"])->name('avg_allregion_peragenda');
Route::get("/trend",[TheAgendaController::class,"trend"])->name("trend");

// the graphs
Route::get("/progress_status",[GenerateGraphs::class,"progress_status"])->name("progress_status");
Route::get("/number_of_projects",[GenerateGraphs::class,"number_of_projects"])->name("number_of_projects");
Route::get("/sum_of_projects_per_region",[GenerateGraphs::class,"sum_of_projects_per_region"])->name("sum_of_projects_per_region");
Route::get("/loan_grants",[GenerateGraphs::class,"loan_grants"])->name('loan_grants');

Route::get("/show_location", [Dashboard::class,"show_location"])->name('show_location');
Route::post("/show_location",[Dashboard::class,"show_location"])->name("show_location");
Route::get("/show_financials",[Dashboard::class,"show_financials"])->name('show_financials');
Route::get("/thesearchresults", [FrontEndController::class,"thesearchresults"])->name("thesearchresults");
Route::get("/searchresults",[FrontEndController::class,"searchresults"])->name("searchresults");
Route::get("/filter_it", [FrontEndController::class,"filter_it"])->name("filter_it");
Route::get("/generatereport", [FrontEndController::class,"generatereport"])->name("generatereport");

// widgets 
Route::get("/allprojects", [FrontEndController::class,"allprojects"])->name('allprojects');
Route::get("/getodagrant_figures", [FrontEndController::class,"getodagrant_figures"])->name("getodagrant_figures");
require __DIR__.'/auth.php';
