<html>
<head>
    <title>ISUZU</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/style.css?v=3" />

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="css/ie8.css?v=1" />
    <![endif]-->

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/useragent.js"></script>
    <script type="text/javascript" src="js/isdevice.js"></script>

    <!-- KRPANO -->
    <script type="text/javascript" src="js/embedpano.js"></script>
    <script type="text/javascript" src="js/krpano_1_18_2.js"></script>


    <!-- PRELOAD CSS IMAGE -->
    <script type="text/javascript" src="js/preloadCssImages.js"></script>
    <!-- LIQUID SLIDER -->
    <link rel="stylesheet" href="css/liquidslider/liquid-slider.css" />
    <script type="text/javascript" src="js/liquidslider/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/liquidslider/jquery.liquid-slider.min.js"></script>

    <!-- PROGRESS BAR -->
    <link type="text/css" rel="stylesheet" href="js/skins/jquery-ui-like/progressbar.css" />
    <script type="text/javascript" src="js/progressbar.js"></script>

    <script type="text/javascript" src="js/jquery.panzoom.js"></script>
    <script type="text/javascript" src="js/jquery.reel.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
    <script src="https://npmcdn.com/draggabilly@2.1/dist/draggabilly.pkgd.min.js"></script>
    <script type="text/javascript" src="js/config.js"></script>
    <script type="text/javascript" src="js/config-my-16.js"></script>
    <script type="text/javascript" src="js/app.js?v=2"></script>
    <script type="text/javascript" src="js/interior.js"></script>
    <script>
        $(function() {

        })
    </script>
</head>

<body>

<style>
    .menu-model {
        bottom: 10px;
    }

    .menu-color {
        bottom: 80px;
    }

    .menu-bg {
        bottom: 185px;
    }

    .menu-hotspot {
        bottom: 255px;
    }

    div[class*="menu-"] {
        width: 540px;
        position: absolute;
        z-index: 9999;
        display: none;
    }

    div[class*="menu-"]::after {
        /*

        content: " ";
        background-color: #000;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        position: absolute;
        top: 0;
        z-index: -1;
*/
    }

    div[class*="menu-"] ul {
        padding: 0;
        margin: 0;
    }

    div[class*="menu-"] ul li {
        display: inline;
    }

    div[class*="menu-"] ul li a {
        width: 120px;
        font-size: 12px;
        display: inline-block;
        text-align: center;
        margin: 5px;
        /*
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
*/
        height: 25px;
    }

    div[id^="text-"] {
        background-repeat: no-repeat;
        text-indent: -9999px;
        position: absolute;
    }

    .hotspot {
        /*
        position: absolute;
        z-index: 99;
        background-image: url('img/hotspot.png');
        background-position: center;
        width: 32px;
        height: 32px;
        text-indent: -9999px;
*/
    }

    .hotspot.pure-button-active {
        border: 1px solid red;
    }
</style>
<div class="container screen">
    <div class="freez"></div>
    <div id="progressBar" style="display:none;" class="jquery-ui-like">
        <div></div>
    </div>


    <section id="car">
        <div class="liquid-slider" id="slider-ex-in">
            <div class="screen-exterior   screen-active">
                <h2 class="title">ISUZU 360 EXTERIOR</h2>
                <div id="monitor" class="monitor-active">
                    <img id="image" class="reel reel-mode" src="img/GEXP_LHD_CREW_RBD/GEXP_LHD_CREW_RBD_RedSpinel_BG_B/normal/23.jpg" />
                </div>
            </div>
            <div class="screen-interior">
                <h2 class="title">ISUZU 360 INTERIOR</h2>
                <div id="pano"></div>
            </div>
        </div>
    </section>


    <!-- NEXT & BACK BUTTON -->
    <section id="btn-rotate" style="display:none;">
        <div id="ctrl-next" class="img-ctrl"></div>
        <div id="ctrl-back" class="img-ctrl"></div>
    </section>

    <!-- MENU SWITCH -->
    <section id="menu" style="display:none;">
        <div id="ctrl-switch-exin" class="img-ctrl switch-close">
            <img src="css/images/btn_ex_close.png" id="img-button-switch" class="select-ex" width="100%" />
            <div id="btn-switch" href="javascript:void(0);"></div>
            <div id="btn-ex" href="#1" data-liquidslider-ref="slider-ex-in"></div>
            <div id="btn-in" href="#2" data-liquidslider-ref="slider-ex-in"></div>
        </div>
    </section>

    <!-- BUTTON CAB -->
    <section id="cap" style="display:none;">
        <div data-index="0" data-folder="crew" id="ctrl-cab-crew" class="img-ctrl show-cap active-cap"> </div>
        <div data-index="1" data-folder="extended" id="ctrl-cab-extended" class="img-ctrl hide-cap "> </div>
        <div data-index="2" data-folder="regular" id="ctrl-cab-single" class="img-ctrl hide-cap"> </div>
    </section>

    <!-- TEXT -->
    <section id="text" style="display:none;">
        <div id="text-loading" class="img-ctrl">Loading...</div>
        <div id="text-logo" class="img-ctrl">ISUZU D-MAX</div>
        <div id="text-detail" class="img-ctrl text-detail-crew-ls">DETAIL</div>
        <div id="text-color" class="img-ctrl">COLOR</div>
        <div id="text-hotspot" class="img-ctrl img-button-hotspot-on">
            <div id="btn-hotspot-on" onclick="showHotspot(this);">On</div>
            <div id="btn-hotspot-off" onclick="hideHotspot(this);">Off</div>
        </div>
        <div id="text-grade" class="img-ctrl img-button-grade-ls" data-folder="ls">
            <div id="btn-grade-starndard" onClick="showGradeStandard(this);">On</div>
            <div id="btn-grade-ls" onClick="showGradeLs(this);">Off</div>
        </div>

        <!-- MENU COLOR -->
        <div id="ctrl-color" class="img-ctrl">
            <ul>
                <!-- color -->
                <li>
                    <a href="javascript:void(0);" data-folder="ObsidianGray" class="obsidian-gray" title="Obsidian Gray mica"></a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-folder="TitaniumSilver" class="titanium-silver" title="Titanium Silver met"></a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-folder="CosmicBlack" class="cosmic-black" title="Cosmic Black mica"></a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-folder="SplashWhite" class="splash-white" title="Splash White"></a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-folder="GalenaGray" class="tundra-green" title="Galena Gray"></a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-folder="RedSpinel" class="vanatian-red active-color" title="Red Spinel"></a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-folder="SapphireBlue" class="fjord-blue" title="Sapphire Blue"></a>
                </li>
            </ul>
        </div>
        <div id="wallpaper" class="img-ctrl bg-warehouse show-wallpaper">
            <div id="btn-wallpaper"></div>
        </div>
    </section>
</div>





<div class="menu-model">
    <span class="pure-menu-heading"><i class="fa fa-car" aria-hidden="true"></i> Model</span>
    <ul>

        <li><a href="javascript:void(0);" data-index="0" class="pure-button  pure-button-active" data-folder="GEXP_LHD_CREW_RBD">
                GEXP_LHD_CREW_RBD</a></li>

        <li><a href="javascript:void(0);" data-index="1" class="pure-button" data-folder="GEXP_LHD_CREW_RBA">
                GEXP_LHD_CREW_RBA</a></li>


        <li><a href="javascript:void(0);" data-index="2" class="pure-button" data-folder="GEXP_LHD_EXTENDED_RBD">
                GEXP_LHD_EXTENDED_RBD</a></li>

        <li><a href="javascript:void(0);" data-index="3" class="pure-button" data-folder="GEXP_LHD_REGULAR_RBA">
                GEXP_LHD_REGULAR_RBA</a></li>
    </ul>
</div>


<div class="menu-color">
    <span class="pure-menu-heading"><i class="fa fa-paint-brush" aria-hidden="true"></i> Color</span>
    <ul>
        <!-- color -->
        <li>
            <a href="javascript:void(0);" data-folder="ObsidianGray"  class="pure-button" >Obsidian Gray mica</a>
        </li>
        <li>
            <a href="javascript:void(0);" data-folder="TitaniumSilver"  class="pure-button" >Titanium Silver met</a>
        </li>
        <li>
            <a href="javascript:void(0);" data-folder="CosmicBlack"  class="pure-button" >Cosmic Black mica</a>
        </li>
        <li>
            <a href="javascript:void(0);" data-folder="SplashWhite"  class="pure-button" >Splash White</a>
        </li>
        <li>
            <a href="javascript:void(0);" data-folder="GalenaGray"  class="pure-button" >Galena Gray</a>
        </li>
        <li>
            <a href="javascript:void(0);" data-folder="RedSpinel"  class="pure-button pure-button-active" >Red Spinel</a>
        </li>
        <li>
            <a href="javascript:void(0);" data-folder="SapphireBlue"  class="pure-button" >Sapphire Blue</a>
        </li>
    </ul>
</div>

<div class="menu-bg">
    <span class="pure-menu-heading"><i class="fa fa-television" aria-hidden="true"></i> Background</span>
    <ul>
        <li><a href="javascript:void(0);" class="pure-button" data-folder="BG_A" data-index="0">BG_A</a></li>
        <li><a href="javascript:void(0);" class="pure-button pure-button-active" data-folder="BG_B" data-index="1">BG_B</a></li>

    </ul>
</div>


<div class="menu-hotspot">
    <span class="pure-menu-heading"><i class="fa fa-television" aria-hidden="true"></i> Hotspot</span>
    <ul>
        <li><a href="javascript:void(0);" class="pure-button hotspot-add-btn">Add</a></li>
        <li><a href="javascript:void(0);" class="pure-button hotspot-remove-btn">Remove</a></li>
        <li><a href="javascript:void(0);" class="pure-button hotspot-getcode-btn">View Code</a></li>
    </ul>
</div>
</body>
</html>