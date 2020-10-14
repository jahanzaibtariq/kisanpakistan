<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Kisan Pakistan</title>
    <link rel="icon" href="{{ asset('backend/images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('backend/images/favicon/apple-touch-icon-152x152.png') }}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{ asset('backend/images/favicon/mstile-144x144.png') }}">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->    
    <link href="{{ asset('backend/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('backend/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{ asset('backend/css/custom/custom-style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ asset('backend/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('backend/js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('backend/js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('backend/js/plugins/prism/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('backend/js/plugins/dropify/css/dropify.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
</head>
<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Welcome to Kisan Pakistan." readonly />
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"  data-activates="translation-dropdown"><img src="{{ asset('backend/images/flag-icons/Pakistan.png') }}" alt="Pakistan" /></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                    </ul>
                    <!-- translation-button -->
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">
            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <?php $sql = DB::table('admins')->first(); ?>
                        <img src="{{ asset('images/') }}/{{$sql->image}}" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="{{ url('/admin/profile') }}"><i class="mdi-action-face-unlock"></i> Profile</a>
                            </li>
                            <li><a href=" {{ url('/logout') }} "><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            </li>
                        </ul>
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{$sql->name}}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <p class="user-roal">Administrator</p>
                    </div>
                </div>
            </li>
                @if(Session::get('page') == "admin") 
                    <?php $active = "active" ?>
                @else
                    <?php $active = "" ?>
                @endif
                <li class="bold {{ $active }} "><a href=" {{ url('/admin') }} " class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Menu</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        @if(Session::get('page') == "crop") 
                            <?php $active = "active" ?>
                        @else
                            <?php $active = "" ?>
                        @endif
                        <li class="bold {{ $active }}"><a href="{{ url('/admin/crop') }}"><i class="mdi-action-invert-colors"></i>Crop Details</a>
                        </li>
                        @if(Session::get('page') == "fertilizer") 
                            <?php $active = "active" ?>
                        @else
                            <?php $active = "" ?>
                        @endif
                        <li class="bold {{ $active }} "><a href="/admin/fertilizer"><i class="mdi-image-palette"></i>Recommended Fertilizer</a>
                        @if(Session::get('page') == "harvesting") 
                            <?php $active = "active" ?>
                        @else
                            <?php $active = "" ?>
                        @endif
                        <li class="bold {{ $active }} "><a href="/admin/harvesting"><i class="mdi-image-palette"></i>Harvesting Schedule</a>
                        @if(Session::get('page') == "cultivation") 
                            <?php $active = "active" ?>
                        @else
                            <?php $active = "" ?>
                        @endif
                        <li class="bold {{ $active }} "><a href="/admin/cultivation"><i class="mdi-image-palette"></i>Cultivation Schedule</a>
                        </li>
                        @if(Session::get('page') == "disease") 
                            <?php $active = "active" ?>
                        @else
                            <?php $active = "" ?>
                        @endif
                        <li class="bold {{ $active }} "><a href="/admin/disease"><i class="mdi-av-queue"></i>Disease Cure & Prevention</a>
                        @if(Session::get('page') == "land") 
                            <?php $active = "active" ?>
                        @else
                            <?php $active = "" ?>
                        @endif
                        <li class="bold {{ $active }} "><a href="/admin/land/preparation" class="waves-effect waves-cyan"><i class="mdi-editor-border-all"></i> Land Preparation </a>
                        </li>
                        @if(Session::get('page') == "watering") 
                            <?php $active = "active" ?>
                        @else
                            <?php $active = "" ?>
                        @endif
                        <li class="bold {{ $active }} "><a href="/admin/watering" class="waves-effect waves-cyan"><i class="mdi-editor-border-all"></i> Watering Support </a>
                        </li>
                        @if(Session::get('page') == "pest") 
                            <?php $active = "active" ?>
                        @else
                            <?php $active = "" ?>
                        @endif
                        <li class="bold {{ $active }}"><a href="/admin/pesticides" class="waves-effect waves-cyan"><i class="mdi-editor-border-all"></i> Pest Control </a>
                        </li>
                        </li>
                        <!-- <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-account-circle"></i> User</a>
                            <div class="collapsible-body">
                                <ul>     
                                    <li><a href="">List of Users</a>
                                    </li>                                   
                                </ul>
                            </div>
                        </li> -->
                    </ul>
                </li>
                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">MORE</p></li>
                <!-- <li><a href="/admin/kisan"><i class="mdi-action-verified-user"></i> Kisan News </a></li> -->
                @if(Session::get('page') == "weed") 
                    <?php $active = "active" ?>
                @else
                    <?php $active = "" ?>
                @endif
                <li class="bold {{ $active }}"><a href="/admin/weed"><i class="mdi-action-verified-user"></i> Weed Eradication
                </li>
                <!-- <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">User Registered</p></li>
                <li class="li-hover">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="sample-chart-wrapper">                            
                                <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                            </div>
                        </div>
                    </div>
                </li> -->
            </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
            @yield('content')
            <!-- END CONTENT -->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START RIGHT SIDEBAR NAV-->
            <!-- LEFT RIGHT SIDEBAR NAV-->
        </div>
        <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright" style="margin-top: 700px;">
            <div class="container">
                All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="https://www.facebook.com/Kisan-Pakistan-108846323982210/">KP Team</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery-1.11.2.min.js') }}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{ asset('backend/js/materialize.js') }}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- chartist -->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/chartist-js/chartist.min.js') }}"></script>   
    <!-- chartjs -->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/chartjs/chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/chartjs/chart-script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dropify/js/dropify.min.js') }}"></script>
    <!-- sparkline -->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/sparkline/sparkline-script.js') }}"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('backend/js/plugins.js') }}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ asset('backend/js/custom-script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/data-tables/data-tables-script.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove:  'Supprimer',
                    error:   'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('.dropify-event').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.filename + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });
        });
    </script>
    <script type="text/javascript">
        $('.humidity').on('change keyup blur', function(e) {
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            var fullPay = $('#min_humidity').val();
            var advancePay = $('#max_humidity').val();
            if ($(this).val() < parseInt(fullPay)) {
                e.preventDefault();
                $(this).val(fullPay);
            }
        });
        $('.PH').on('change keyup blur', function(e) {
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            var fullPay = $('#min_PH').val();
            var advancePay = $('#max_PH').val();
            if ($(this).val() < parseInt(fullPay)) {
                e.preventDefault();
                $(this).val(fullPay);
            }
        });
        $('.tempurature').on('change keyup blur', function(e) {
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            var fullPay = $('#min_temp').val();
            var advancePay = $('#max_temp').val();
            if ($(this).val() < parseInt(fullPay)) {
                e.preventDefault();
                $(this).val(fullPay);
            }
        });

    </script>
    <script>
        var msg = '{{Session::get('added')}}';
        var exist = '{{Session::has('added')}}';
        var not_msg = '{{ Session::get('not_added') }}';
        var not_exist = '{{ Session::get('not_added') }}';
        var update_msg = '{{ Session::get('update') }}';
        var update_exist = '{{ Session::get('update') }}';
        var dlete = '{{ Session::get('dlete') }}';
        var delete_exist = '{{ Session::get('dlete') }}';
        if(exist){
          alert(msg);
        }else if(not_exist){
            alert(not_msg);
        }else if(update_exist){
            alert(update_msg);
        }else if(delete_exist){
            alert(dlete);
        }
      </script>
</body>
</html>