<div class="d-flex gap-1 mb-2" style="justify-content: space-around;">
    <div class='w-100 bg-white p-5 rounded-xl border border-gray-200 shadow-sm'>
        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Location / Region</label>
        <select class='form-select fieldtext w-full appearance-none px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 input-focus cursor-pointer thelocation' id="thelocation">
            <option value="0"> -- Select </option>
            <option value='9'> 9 </option>
            <option value='10'> 10 </option>
            <option value='11'> 11 </option>
            <option value='12'> 12 </option>
            <option value='13'> 13 </option>
            <option value='barmm'> BARMM </option>
        </select>
    </div>
</div>

<div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm hideit" id="disagg_box">
    <span id="addinfo_display"></span>

    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
        <ul class='flex items-center justify-between gap-1 tabindex_year'>
            <?php
            for ($i = $outcome_years[0]->yearend; $i >=  $outcome_years[0]->yearstart; $i--) {
                echo "<li class='flex items-center justify-between gap-1 form-control fieldtext w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 input-focus' data-dvid='{$collection[0]->dv_id}' data-theval='{$i}'> 
                        <svg xmlns='http://www.w3.org/2000/svg' 
                           fill='none' 
                           viewBox='0 0 24 24' 
                           stroke-width='1.5' 
                           stroke='currentColor' 
                           class='w-6 h-6 text-gray-600'>
                           
                        <path stroke-linecap='round' stroke-linejoin='round'
                          d='M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M4.5 6.75h15A1.5 1.5 0 0121 8.25v10.5A1.5 1.5 0 0119.5 20.25h-15A1.5 1.5 0 013 18.75V8.25A1.5 1.5 0 014.5 6.75z'/>
                      </svg> {$i}</li>";
            }
            ?>
        </ul>
        <div class="thedisplaydiv">
            <span id="currentextfld"> </span>
        </div>

        <button class='flex items-center gap-2 text-red-500 hover:text-red-700 font-medium text-sm transition-colors deletethis'
            data-tbl="the_deep_values"
            data-keyid="<?php echo $collection[0]->dv_id; ?>"
            data-keyfld="dv_id"
            data-remove="#deepvals_<?php echo $collection[0]->dv_id; ?>"
            data-clean="#disagg_details"
            style="margin-top:10px; margin-left: 10px;"> <i class="fa-solid fa-circle-minus"></i> Remove Disaggregation </button>
    </div>
</div>