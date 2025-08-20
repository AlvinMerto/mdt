<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindanao Development Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="{{url('style/mainpage.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="wrapper">
        <div class="row height-100">
            <div class="col-md-12 " style="position:absolute; z-index:0;height: 100%;width: 100%;">
                <ul class='bigpix_ul'>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/ma.JPG')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda1.JPG')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda2.JPG')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda3.png')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda4.jpg')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda5.JPG')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda6.png')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda7.jpg')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda8.png')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda9.JPG')}}')"> </div>
                    </li>
                    <li>
                        <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda10.JPG')}}')"> </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 thebgdiv_" style="padding: 0px;position: relative;z-index: 9999999999999;">

                <div class="wrap-flex flex-column height-100 px-20 thecolorbg_">
                    <div class="logodiv">
                        <img src="{{asset('images/mdt_logo.png')}}" style="width: 215px;" />
                        <!-- <p style="font-weight: bold;color: #fff;text-shadow: 0px 1px 1px #000;"> Mindanao Development Tracker </p> -->
                    </div>
                    <div class="maindiv row" style="flex:4;">
                        <!-- <h1 class="thetitle mt-40"> The Mindanao Agenda </h1> -->
                        <!-- <div class="col-md-6">
                            <div class="ma_holder">
                                <img src="{{asset('storage/images/the_ma.jpg')}}" style="width: 350px;"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p> hello world </p>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-7 thebgblack_ thebgdiv" style="padding: 0px;position: relative;z-index: 9999999999999;">
                <div class="wrap-flex flex-column height-100 ">
                    <div class="wrap-flex flex-row gap-5 navdiv pagenavs pt-25">
                        <a class='thenavlink pop_window_btn' data-window="aboutwindow"> ABOUT MDT </a>
                        <a class='thenavlink pop_window_btn' data-window="aboutma"> THE MINDANAO AGENDA </a>
                        <a class='thenavlink pop_window_btn' data-window="report_window"> REPORTS </a>
                    </div>
                    <div class="maindiv thenavigation wrap-flex flex-column pl-20" style="position: relative;">
                        <div>
                            <h6 class='white-it' style="font-size: 22px;text-shadow: 0px 1px 2px #000;"> THE </h6>
                            <h1 class='white-it big-ma-text bold-it'> MINDANAO AGENDA <small style="font-size: 1.9rem !important;"> 2023-2028 </small> </h1>
                        </div>
                        <ul class='thelogo_small'>
                            <?php
                            if (count($agenda) > 0) {
                                $count = 1;
                                foreach ($agenda as $a) { ?>
                                    <li class="row">
                                        <div class="col-md-12" style="text-align: right;">
                                            <?php $image = asset('storage/images/ma_icons/') . "/" . $a->thelogo; ?>
                                            <img style="width:65px;" data-imgcnt="<?php echo $count; ?>" class='theagendalogo the_agenda_logo<?php echo $count; ?>' src="<?php echo $image; ?>" />
                                        </div>
                                        <div class="col-md-12 agenda_dets_marker <?php echo "the_agenda" . $count; ?>" style="position:absolute; display:none;">
                                            <p> <?php echo $a->agendatitle; ?> </p>
                                            <h6 class="lh-25 theagendaname_small"> <?php echo $a->agendaname; ?> </h6>
                                            <p> <?php echo $a->thegoal; ?> </p>
                                        </div>
                                    </li>
                                <?php $count++;
                                } ?>
                            <?php } ?>
                        </ul>
                        <!-- <div>
                            <a href="{{url('mpap')}}"> <p class='thebutton_div'> PROGRAMS AND PROJECTS <i class="bi bi-arrow-right"></i> </p> </a>
                            <a href="{{url('rbme')}}"> <p class='thebutton_div'> EXPLORE DATA <i class="bi bi-arrow-right"></i> </p> </a>
                            <a href="#"> <p class='thebutton_dixv'> MINDANAO CONNECT <i class="bi bi-arrow-right"></i> </p> </a>
                        </div> -->
                    </div>
                    <div class="logodetailsdiv pl-20" style="flex:4;">
                        <!-- <h6 class='mb-20 theagenda'> The Mindanao Agenda </h6>  classname = agendalist -->

                        <div class='wrap-flex flex-row gap_3 prevnextbtn'>
                            <div class="d-flex sponsors-img">
                                <img class='' src="{{asset('images/partners/minda_small.png')}}" />
                                <img class='' src="{{asset('images/partners/bagongpil_small.png')}}" />
                                <img class='' src="{{asset('images/partners/eu_small.png')}}" />
                                <img class='' src="{{asset('images/partners/gizcoop_small.png')}}" />
                                <img class='' src="{{asset('images/partners/giz_small.png')}}" />
                                <img class="" src="{{asset('images/partners/usaid_small.png')}}" />
                            </div>
                            <!-- <ul class='thelogo_small'>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/minda_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/bagongpil_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/eu_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/gizcoop_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/giz_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/usaid_small.png')}}"/> </li>
                            </ul> -->
                            <!-- <button id='prevbtn' class='prevnext_btn'> <i class="bi bi-chevron-compact-left"></i> Previous </button>
                            <button id='nextbtn' class='prevnext_btn'> Next <i class="bi bi-chevron-compact-right"></i>  </button> -->
                        </div>
                        <div style="margin-top:30px;">
                            <p class="thesystembtn"> 
                                <i class="bi bi-arrow-right-short"></i>
                                <a href="{{url('tracker/rbme')}}"> Digital Results-based Monitoring and Evaluation System </a> 
                            </p>
                            <p class="thesystembtn"> 
                                <i class="bi bi-arrow-right-short"></i> 
                                <a href="{{url('tracker/mpap')}}"> Mindanao Programs and Projects </a> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pop_window" id="aboutwindow">
        <h2> Mindanao Development Tracker <i class="bi bi-x-lg closewindow" data-window='aboutwindow' style="float: right;"></i></h2>

        <h4> Rationale </h4>

        <p>
            Mindanao is a region rich in natural resources, cultural diversity, and economic potential. It serves as a vital driver of national growth, with its vast agricultural base, emerging industries, and its strategic role in regional integration through BIMP-EAGA. However, despite its promise, Mindanao continues to face development challenges that hinder its full participation in the country’s progress.
            These challenges include the uneven distribution of development opportunities, weak infrastructure connectivity, limited access to quality education and social services, inadequate preparedness for natural disasters and climate-related risks, and the persistent burden of armed conflict and fragility in certain areas. Such conditions have perpetuated cycles of poverty and underdevelopment, widening the gap between Mindanao and the rest of the country.
            In this regard, the Mindanao Development Authority (MinDA) has crafted the Mindanao Agenda, a strategic framework designed to align Mindanao’s development priorities with the Philippine Development Plan (PDP) under the Marcos Jr. Administration. This Agenda underscores the region’s role as a key partner in achieving national development goals while ensuring that growth is inclusive, sustainable, and peace-promoting.
            As part of this effort, MinDA is introducing the Mindanao Development Tracker (MDT), which integrates two major components:
        </p>

        <p>
            1. Digital Results-Based Monitoring and Evaluation (RBME) System - This component ensures that the Mindanao Agenda is systematically monitored and assessed. Each agenda is broken down into measurable outcomes, which are further tracked through specific indicators. The RBME system computes the achievement percentage of each indicator by comparing the baseline, current, and target values, providing a clear, evidence-based measure of progress.
        </p>

        <p>
            To effectively communicate and display results, the system generates a choropleth map that visually illustrates the level of progress across regions. This allows stakeholders to quickly see disparities, monitor development performance, and better appreciate how Mindanao’s development is unfolding spatially.
        </p>

        <p>
            The system also allows agenda holders to update the values of their indicators directly, ensuring that data remains timely, accurate, and reflective of on-the-ground realities. This dynamic updating feature strengthens accountability and supports more informed decision-making.
        </p>

        <p>
            2. Mindanao Programs and Projects (MPAP) Database - This component consolidates data on Official Development Assistance (ODA) and government-funded programs and projects across Mindanao. It provides both a financial lens and a project management perspective, showing where investments are directed, how resources are utilized, and which areas remain underserved. By mapping initiatives geographically and thematically, the MPAP becomes a vital tool for coordinating interventions, avoiding overlaps, and identifying priority areas for future support. Moreover, with the introduction of a new data-sharing framework with partners such as the Bangsamoro Planning and Development Authority (BPDA), the system makes data sharing seamless, efficient, and optimized. This ensures that stakeholders operate from a single source of truth, and that development information remains transparent, consistent, and actionable. The framework also makes it easier to update datasets and monitor programs and projects in real time, strengthening accountability and enabling MinDA and its partners to respond more quickly to emerging needs and opportunities.
            Ultimately, the Mindanao Development Tracker is more than just a monitoring tool—it is a platform for transparency, collaboration, and informed decision-making. By integrating performance tracking through the RBME system and investment mapping through the MPAP database, the MDT enables MinDA, government agencies, development partners, and local stakeholders to work from a common foundation of reliable data. In doing so, it strengthens accountability, ensures resources are strategically directed, and accelerates the realization of a more inclusive, resilient, and prosperous Mindanao that contributes fully to national development.
        </p>
    </div>

    <div class="pop_window" id="aboutma">
        <h2> Introduction <i class="bi bi-x-lg closewindow" data-window='aboutma' style="float: right;"></i> </h2>

        <h3 style="margin: 25px 0px;text-align: left;"> Overview of Mindanao's Current Trends, Patterns and Challenges </h3>

        <h4> Context, Demographic Trends and Patterns </h4>

        <p>
            Mindanao is the second-largest island in the Philippines, comprising 34% of the country's land area. It plays a crucial role in the economic development and investment of the country due to its abundant natural resources, strategic location, and skilled workforce.
            Mindanao is the major food producer of the country. 36% of the country's farm area is from Mindanao, and it also accounts for 43% of the country’s food needs while contributing 30% of the country’s food trade. More impressive is that it accounts for 60% of the country’s total agricultural exports. Mindanao continues to be the leading supplier of major crops such as rubber, corn, pineapple, bananas, coffee, cassava, and coconut among others.
            Mindanao has rich natural resources and major river basins. It hosts eight major river basins that provide water for domestic, agricultural, and industrial use. It is home to several major protected areas such as watershed forests and wildlife sanctuaries.
        </p>

        <p>
            Further, Mindanao is rich in cultural diversity and vibrant communities. The demographic trends and patterns in Mindanao paint a dynamic picture of a distinct area undergoing rapid population growth, urbanization, and cultural diversity.
        </p>

        <p>
            The island has experienced significant population growth over the past decades, driven by high fertility rates and internal migration. According to data from the Philippine Statistics Authority (PSA), Mindanao's population reached approximately 27.8 million in 2020, making up about a quarter of the country's total population. The average annual population growth rate in Mindanao over the past decade has been consistently higher than the national average, fueled by factors such as natural increase and migration from other parts of the Philippines.
        </p>

        <p>
            Urbanization is a prominent demographic trend in Mindanao, as rural residents migrate to urban centers in search of better economic opportunities and improved living standards. Cities like Davao, Cagayan de Oro, Zamboanga and General Santos have experienced rapid urbanization, leading to the expansion of urban areas and the emergence of metropolitan regions. The urban population in Mindanao accounted for around 44% of the total population in 2020, reflecting the ongoing urbanization trend in the whole island which is almost the same with other regions in Mindanao based on Philippine Statistical Authority (PSA) data. This is in line with national trends, where urbanization is also accelerating as people move to cities for jobs, education, and healthcare.
        </p>

        <p>
            The age structure of Mindanao's population is characterized by a youthful demographic profile, with a significant proportion of the population under the age of 25. Around 35% of Mindanao's population was below 15 years old in 2020, while the working-age population (15-64 years old) comprised approximately 60% of the total population. This youthful age structure presents both opportunities and challenges for social and economic development, including the need to provide quality education, healthcare, and employment opportunities for the youth. Nationally, the Philippines also has a young population, although the proportion of youth in Mindanao is slightly higher, which accentuates the region's demographic uniqueness.
        </p>

        <p>
            Mindanao is known for its cultural and ethnic diversity, with various indigenous groups, Muslim communities, and settlers from other parts of the Philippines coexisting on the island. The Lumad, Bangsamoro, and Christian communities are among the major ethnic groups in Mindanao, each with its own distinct cultural heritage and traditions. Ethnic diversity adds richness to Mindanao's social fabric but also presents challenges related to cultural integration, social cohesion, and political representation. Mindanao is proximate with to neighboring Indonesia, Malaysia and Brunei which posted great opportunities for tourism, trade and cultural exchanges. Nationally, the Philippines is also diverse, but Mindanao's unique blend of cultures and ethnicities stands out, contributing to both the region's vibrancy and its complexity.
            However, Mindanao also faces several challenges that hinder its progress and development, including poverty, political instability, armed conflict, and natural disasters. To address these challenges, the Philippine government has identified Mindanao as a priority area for development and has been implementinged various initiatives and programs that promote sustainable and inclusive growth in the region. Some of the major challenges include:
            Uneven distribution of development opportunities and resources, leading to pockets of poverty and inequality;
        </p>
        <p>
            Weak infrastructure and connectivity, hindering the movement of goods, services, and people within and outside Mindanao;
        </p>
        <p>
            Limited access to education, health, and other basic services, particularly in remote and conflict-affected areas;
        </p>
        <p>
            Inadequate preparedness and resilience to natural disasters and climate change impacts, exacerbating the vulnerability of communities; and
            Persistent armed conflict and violence, affecting peace and security and deterring investments and development activities.
        </p>
        <p>
            In this regard, the Mindanao Development Authority (MinDA) with the support and in collaboration of the Mindanao stakeholders and development partners crafted the Mindanao Agenda 2023-2028 and its accompanying Results Matrix and Investment Program. The Mindanao Agenda aligns development strategies and programs with the Philippine Development Plan (PDP) of the new Marcos administration, particularly the Mindanao development priorities, in the post-COVID-19 pandemic socio-economic landscape of Mindanao.
            The Mindanao Agenda focuses on nine (9) Mindanao Priority Agendas which represent the key sectors critical to the overall development of Mindanao.
        </p>

        <h3> Agenda 1: People's Well-Being </h3>
        <p>
            “Improve the overall welfare of individuals in Mindanao by enhancing their access to high-quality healthcare, education, essential services , and employment prospects, promoting unity among communities and tackle tackling socio-economic and gender-based gaps effectively”
        </p>

        <h3>Agenda 2: Water-Energy-Food Nexus </h3>
        <p>
            “Ensure the sustainable handling of interconnected food, water, and energy systems in Mindanao by boosting agricultural efficiency, guaranteeing fair access to and efficient use of clean water sources, and promoting renewable energy alternatives to bolster socio-economic progress while safeguarding the environment's well-being”
        </p>
        <h3> Agenda 3: Trade and Industry Development </h3>
        <p>
            “Promote the growth of trade and industry in Mindanao by cultivating a favorable business atmosphere, improving infrastructure, easing market entry, and encouraging innovation to draw investments, generate employment opportunities, and propel economic integration within the area”
        </p>
        F Agenda 4: BIMP-EAGA and International Partnerships </h3>
        <p>
            “Enhance global alliances and cooperation under the BIMP-EAGA framework to advance sustainable development, economic cohesion, and regional connectivity in Mindanao”
        </p>

        <h3>Agenda 5: Transport, Logistics, and Connectivity </h3>

        <p>
            “Improve the connectivity infrastructure and accessibility across Mindanao by upgrading transportation systems, digital connectivity, and physical mobility to stimulate economic progress, foster physical mobility, and enhance the whole island’s integration, ultimately unleashing the island's capabilities and facilitating sustainable development”
        </p>

        <h3>Agenda 6: Digital Transformation and Innovation </h3>
        <p>
            “Leverage modern technology and innovative practices to drive positive change, economic prosperity, social advancement, and inclusive development”
        </p>

        <h3> Agenda 7: Ecological Integrity </h3>
        <p>
            “Protect and revitalize the ecological balance in Mindanao through the implementation of conservation strategies, sustainable land management techniques, and efforts to safeguard biodiversity to preserve ecosystems, counter environmental decline, and bolster resilience against climate change”
        </p>

        <h3>Agenda 8: Preparedness and Resiliency</h3>
        <p>
            “Boost readiness and fortitude in Mindanao through the reinforcement of disaster risk reduction tactics, the execution of climate adaptation plans, and the enhancement of community capabilities to alleviate the effects of natural calamities to promote resilience against disasters, protecting lives, livelihoods, and infrastructure amidst escalating climate-related threats and uncertainties”
        </p>
        <h3>Agenda 9: Peace, Governance, and Institutions</h3>
        <p>
            “Promote peace, effective governance, and institutional integrity in Mindanao through dialogue promotion, democratic institution reinforcement, and improved transparency and accountability in governance procedures for sustainable development, social harmony, and inclusive prosperity across all communities in the region”
        </p>
    </div>

    <div class="pop_window" id="report_window">
        <p> No reports found <i class="bi bi-x-lg closewindow" data-window='report_window' style="float: right;"></i> </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{url('app/landingpage.js')}}"> </script>
</body>

</html>