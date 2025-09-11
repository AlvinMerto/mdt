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
            <div class="col-md-5 thebgdiv_" style="padding: 0px;position: relative;z-index: 9999999999999; display:none;">

                <div class="wrap-flex flex-column height-100 px-20 thecolorbg_">
                    <div class="logodiv">
                        <img src="{{asset('images/mdt_logo.png')}}" style="width: 215px;" />
                    </div>
                    <!-- <div class="maindiv row" style="flex:4;">

                    </div> -->
                </div>
            </div>
            <div class="col-md-12 thebgblack_ thebgdiv" style="padding: 0px;position: relative;z-index: 9999999999999;">
                <div class="wrap-flex flex-column height-100 centerall container-fluid">
                    <div class="wrap-flex flex-row gap-5 navdiv pagenavs pt-25">
                        <img class="mdtlogo" src="{{asset('images/mdt_logo.png')}}"/>
                        <img class='' src="{{asset('images/partners/minda_small.png')}}" />
                        <img class='' src="{{asset('images/partners/bagongpil_small.png')}}" />
                    </div>
                    <div class="flex-column thenavigation wrap-flex pl-20">
                        <div class='centertext'>
                            <h1 class='white-it big-ma-text bold-it'> MDT </h1>
                            <h4 class='white-it' style="text-shadow: 0px 1px 2px #000;"> MINDANAO DEVELOPMENT TRACKER </h4> 
                        </div>
                        <div class="w-80-p auto-marg">
                            <p>
                               The Mindanao Development Tracker is your all-in-one platform for monitoring and contributing 
                               to Mindanao's development. This system integrates agenda tracking, project management, 
                               and stakeholder engagement to transform data into actionable insights. This innovative platform is the 
                               flagship initiative of the Mindanao Development Authority (MinDA), 
                                designed to centralize tracking, monitoring, and collaboration across all development efforts in 
                                the region. As the Philippine government's primary coordinating body for Mindanao's socioeconomic 
                                development, MinDA has created this comprehensive system to ensure transparent implementation of 
                                the Mindanao Agenda while fostering meaningful partnerships among government agencies, development 
                                partners, local stakeholders, and communities. The tracker represents MinDA's commitment to 
                                data-driven decision-making and inclusive development that addresses the unique needs and 
                                opportunities across Mindanao's diverse landscape. <small class='pop_window_btn' data-window="aboutwindow"> Read More </small>
                            </p>
                        </div>
                        <h5 class='white-it centertext mt-10' style="text-shadow: 0px 1px 2px #000;"> THE MINDANAO AGENDA <small class='pop_window_btn' data-window="aboutma"> Read More </small></h5> 
                        <ul class='thelogo_small centertext'>
                            <?php
                            if (count($agenda) > 0) {
                                $count = 1;
                                foreach ($agenda as $a) { ?>
                                    <li class="row">
                                        <div class="col-md-12" style="text-align: right;">
                                            <?php $image = asset('storage/images/ma_icons/') . "/" . $a->thelogo; ?>
                                            <img style="width:65px;" data-imgcnt="<?php echo $count; ?>" class='theagendalogo the_agenda_logo<?php echo $count; ?>' src="<?php echo $image; ?>" />
                                        </div>
                                        <div class="agenda_dets_marker <?php echo "the_agenda" . $count; ?>" style="position:absolute; display:none;">
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
                    <div class="flex-column pl-20">
                         <h5 class='white-it centertext mt-10' style="text-shadow: 0px 1px 2px #000;"> THE IMPLIMENTING PARTNERS </h5> 
                        <div class='wrap-flex flex-row gap_3 centerall'>
                            <div class="d-flex sponsors-img theagendalogo">
                                <img class='' src="{{asset('images/partners/eu_small.jpg')}}" />
                                <img class='' src="{{asset('images/partners/gizcoop_small.png')}}" />
                                <img class='' src="{{asset('images/partners/giz_small.png')}}" />
                                <img class="" src="{{asset('images/partners/usaid_small.png')}}" />
                            </div>
                        </div>
                        <div style="margin-top:30px;">
                            <ul class='btn_navigation'>
                                <li class="thesystembtn"> 
                                    <i class="bi bi-arrow-right-short"></i>
                                    <a href="{{url('tracker/rbme')}}"> Mindanao Agenda Tracker </a> 
                                </li>
                                <li class="thesystembtn"> 
                                    <i class="bi bi-arrow-right-short"></i> 
                                    <a href="{{url('tracker/mpap')}}"> Mindanao Programs and Projects </a> 
                                </li>
                                <li class="thesystembtn"> 
                                    <i class="bi bi-arrow-right-short"></i> 
                                    <a href="{{route('dashboard')}}"> Minda Connect </a> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pop_window" id="aboutwindow">
        <h2> Mindanao Development Tracker <i class="bi bi-x-lg closewindow" data-window='aboutwindow' style="float: right;"></i></h2>

        <h4> Welcome to the Future of Regional Development </h4>

        <p>
           The Mindanao Development Tracker represents a new approach to monitoring, collaborating, and advancing development initiatives across Mindanao. We at the Mindanao Development Authority (MinDA) have designed this platform to serve as the central nervous system for all development activities in the region, embodying our commitment to coordinated regional progress.
        </p>

        <h5> Our Journey </h5>
        <p>
            Established in 2023 as a response to the growing need for coordinated development tracking, the Mindanao Development Tracker evolved from a simple monitoring tool into an integrated ecosystem. By bringing together government agencies, development partners, local stakeholders, and communities on a single platform, we've created a powerful engine for positive change.
            The Mindanao Development Tracker's evolution has been significantly strengthened through strategic partnerships with international development organizations. Our collaboration with the Deutsche Gesellschaft für Internationale Zusammenarbeit (GIZ) has provided technical expertise in digital monitoring systems, while funding from the German Federal Ministry for Economic Cooperation and Development (BMZ) and the European Union (EU) has enabled platform expansion and capacity-building initiatives across stakeholder groups. These partnerships exemplify our commitment to international best practices and sustainable development approaches for Mindanao.
        </p>

        <h5> What We Offer </h5>
        <p>
            The Mindanao Development Tracker goes beyond traditional monitoring systems by providing a comprehensive, user-friendly interface that transforms complex data into clear, actionable insights. Through our three integrated pillars, we're revolutionizing how development work happens in Mindanao.
        </p>

        <h5> Our Three Pillars </h5>
        <ul>
            <li>
                <strong> Mindanao Agenda Tracker:</strong> A visualization tool that displays Mindanao's development goals, tracks progress, and shows project implementation across different regions.
            </li>
            <li>
                <strong> Program & Project Database:</strong> A searchable database of development projects in Mindanao. Find projects by location, focus area, or partners. Includes project timelines and impact data.
            </li>
            <li>
                <strong> Mindanao Connect:</strong> A secure platform where users can update project information, share stories, and find partners. Features a gamification system that rewards active contributors while maintaining data quality.
            </li>
        </ul>

        <h5>Join Our Development Journey </h5>
        <p>
            Your voice matters in shaping Mindanao's future. We invite you to explore the platform, contribute your insights, and share your feedback. By participating actively, you help create a more transparent, efficient, and impactful development ecosystem across Mindanao.
Experience the difference today — because better data leads to better decisions, and better decisions create a better Mindanao for all.
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