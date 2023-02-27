<?php
include('authentication.php');
$userProperties = $_SESSION['userProperties'];

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Dashboard</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="./css/style3.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">


        <link rel="shortcut icon" type="image/x-icon" href="./svg.png">


        <!-- Font Icon Styles -->
        <link rel="stylesheet" href="./newDashboard_files/icons.css">
        <!-- /font icon Styles -->
        <!-- Load Styles -->
        <link rel="stylesheet" href="./newDashboard_files/bootstrap-formhelpers.min.css">
        <link rel="stylesheet" href="./newDashboard_files/flag-icon.min.css">
        <link rel="stylesheet" href="./newDashboard_files/chartist.min.css">
        <link rel="stylesheet" href="./newDashboard_files/style.min.css">
        <!-- /load styles -->
        <!-- include summernote css/js -->
        <link href="./newDashboard_files/summernote-bs4.css" rel="stylesheet">
        <link rel="stylesheet" href="./newDashboard_files/intlTelInput.css">
        <link rel="stylesheet" href="./css/dash1.css">


        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    </head>

    <body class="container-fluid">

        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fas fa-arrow-left"></i>
                </div>

                <!-- <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div> -->

                <ul class="list-unstyled components">
                    <p>Navigation</p>
                    <li class="dt-side-nav__item selected">
                        <a href="newDashboard.php" class="dt-side-nav__link dt-active" title="Dashboard">
                            <i><img src="dashboard.png" width="20" height="20" alt=""></i>
                            <span class="dt-side-nav__text">Dashboard</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item ">
                        <a href="index.php" class="dt-side-nav__link" title="Home">
                            <i><img src="home.png" width="20" height="20" alt=""></i>
                            <span class="dt-side-nav__text">HOME</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item ">
                        <a href="depositPackages.php" class="dt-side-nav__link" title="Deposits">
                            <i><img src="deposit.png" width="20" height="20" alt=""></i>
                            <span class="dt-side-nav__text">Deposits</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item ">
                        <a href="newWithdrawals.php" class="dt-side-nav__link" title="withdrawable Requests">
                            <i><img src="withdraw.png" width="20" height="20" alt=""></i>
                            <span class="dt-side-nav__text">Withdrawable Funds</span>
                        </a>
                    </li>
<!--
                    <li class="dt-side-nav__item ">
                        <a href="Usage.php" class="dt-side-nav__link" title="withdrawable Requests">
                            <i><img src="expenditure.png" width="20" height="20" alt=""></i>
                            <span class="dt-side-nav__text">MyExpenditure</span>
                        </a>
                    </li>
-->
                    <li class="dt-side-nav__item ">
                        <a href="tradingChart.php" class="dt-side-nav__link" title="withdrawable Requests">
                            <i><img src="chart.png" width="20" height="20" alt=""></i>
                            <span class="dt-side-nav__text">TradingChart</span>
                        </a>
                    </li>

                    <?php
                
                if(isset($_SESSION['verifiedSuperAdmin'])){


                    ?>
                        <li class="dt-side-nav__item ">
                            <a href="claims.php" class="dt-side-nav__link" title="Revoke claims">
                                <i><img src="claims.png" width="20" height="20" alt=""></i>
                                <span class="dt-side-nav__text">Claims</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item ">
                            <a href="paid.php" class="dt-side-nav__link" title="Admin Operations">
                                <i><img src="admin.png" width="20" height="20" alt=""></i>
                                <span class="dt-side-nav__text">Admin</span>
                            </a>
                        </li>

                        <li class="dt-side-nav__item ">
                            <a href="adminpaidReview.php" class="dt-side-nav__link" title="Paid users list">
                                <i><img src="paidlist.png" width="20" height="20" alt=""></i>
                                <span class="dt-side-nav__text">PaidUsersList</span>
                            </a>
                        </li>

                        <li class="dt-side-nav__item ">
                            <a href="userPayinfo.php" class="dt-side-nav__link" title="userPay Information">
                                <i><img src="payinfo.png" width="20" height="20" alt=""></i>
                                <span class="dt-side-nav__text">UserPayInfo</span>
                            </a>
                        </li>

                        <?php
                }
                elseif(isset($_SESSION['verifiedAdmin'])){


                    ?>
                            <li class="dt-side-nav__item ">
                                <a href="paid.php" class="dt-side-nav__link" title="Admin">
                                    <i><img src="admin.png" width="20" height="20" alt=""></i>
                                    <span class="dt-side-nav__text">Admin</span>
                                </a>
                            </li>

                            <li class="dt-side-nav__item ">
                                <a href="adminpaidReview.php" class="dt-side-nav__link" title="PaidUsersList">
                                    <i><img src="paidlist.png" width="20" height="20" alt=""></i>
                                    <span class="dt-side-nav__text">PaidUsersList</span>
                                </a>
                            </li>

                            <li class="dt-side-nav__item ">
                                <a href="userPayinfo.php" class="dt-side-nav__link" title="user payment Information">
                                    <i><img src="payinfo.png" width="20" height="20" alt=""></i>
                                    <span class="dt-side-nav__text">UserPayInfo</span>
                                </a>
                            </li>

                            <?php

                }else{

                    ?>
                                <li class="dt-side-nav__item ">
                                    <a href="profile.php" class="dt-side-nav__link" title="UserProfile">
                                        <i><img src="user.png" width="20" height="20" alt=""></i>
                                        <span class="dt-side-nav__text">User</span>
                                    </a>
                                </li>

                                <?php
                }


                 ?>




                                    <li class="dt-side-nav__item ">
                                        <a href="changepassword.php" class="dt-side-nav__link " title="Security">
                                            <i><img src="security.png" width="20" height="20" alt=""></i>
                                            <span class="dt-side-nav__text">Security</span>
                                        </a>
                                    </li>

                                    <li class="dt-side-nav__item ">
                                        <a href="helpDesk.php" class="dt-side-nav__link" title="help desk">
                                            <i><img src="helpdesk.png" width="20" height="20" alt=""></i>
                                            <span class="dt-side-nav__text">Help Desk</span>
                                        </a>
                                    </li>
                                    <li class="dt-side-nav__item ">
                                        <a href="logout.php" class="dt-side-nav__link" title="Logout">
                                            <i><img src="logout.png" width="20" height="20" alt=""></i>
                                            <span class="dt-side-nav__text">Logout</span>
                                        </a>
                                    </li>
                </ul>
            </nav>

            <!-- Page Content  -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i><img src="profile2.png" width="20" height="20" alt=""></i>

                    </button>

                        <div class="collapse navbar-collapse disp" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <i><img src="user.png" width="20" height="20" alt=""><a class="nav-link" href="profile.php">Profile</a></i>

                                </li>
                                <li class="nav-item">
                                    <p></p>
                                    <i><img src="logout.png" width="20" height="20" alt=""><a class="nav-link" href="logout.php">logout</a></i>

                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>



                <div class="col-xl-12 col-12 col-md-12">
                    <!-- Grid Item -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container mb-1-5m" style="width: 100%; height: 46px;">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0" src="./newDashboard_files/saved_resource.html" style="box-sizing: border-box; height: 46px; width: 100%;"></iframe>

                        <style>
                            .tradingview-widget-copyright {
                                font-size: 13px !important;
                                line-height: 32px !important;
                                text-align: center !important;
                                vertical-align: middle !important;
                                /* @mixin sf-pro-display-font; */
                                font-family: -apple-system, BlinkMacSystemFont, 'Trebuchet MS', Roboto, Ubuntu, sans-serif !important;
                                color: #9db2bd !important;
                            }
                            
                            .tradingview-widget-copyright .blue-text {
                                color: #2962FF !important;
                            }
                            
                            .tradingview-widget-copyright a {
                                text-decoration: none !important;
                                color: #9db2bd !important;
                            }
                            
                            .tradingview-widget-copyright a:visited {
                                color: #9db2bd !important;
                            }
                            
                            .tradingview-widget-copyright a:hover .blue-text {
                                color: #1E53E5 !important;
                            }
                            
                            .tradingview-widget-copyright a:active .blue-text {
                                color: #1848CC !important;
                            }
                            
                            .tradingview-widget-copyright a:visited .blue-text {
                                color: #2962FF !important;
                            }
                        </style>
                    </div>
                    <!-- TradingView Widget END -->
                </div>

                <?php

                                if (isset($_SESSION['status']))
                                echo"<h5 class='alert alert-success bg-red'>".$_SESSION['status']."</h5>";
                                unset($_SESSION['status']);


                                ?> 




                <!-- Page Header -->
                <div class="dt-page__header">
                    <h1 class="dt-page__title text-capitalize">Dashboard ->status:{
                        <?=$userProperties['status']?>}</h1>
                    <div class="dt-entry__header">
                        <!-- Entry Heading -->
                        <div class="dt-entry__heading">
                        </div>
                        <!-- /entry heading -->
                    </div>
                </div>
                <!-- /page header -->



                <div class="col-md-6 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Card -->
                            <div class="dt-card">
                                <!-- Card Body -->
                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4 dt-card bg-dark text-white">
                                    <span class="badge badge-secondary badge-top-right">Account Balance</span>
                                    <!-- Media -->
                                    <div class="media iso" id="medbod">

                                        <i><img src="totalearned.png" width="40" height="50" alt=""></i>
                                        <!-- Media Body -->
                                        <div class="media-body">
                                            <p></p>
                                            <p class="mb-1 h1 text-white">
                                                USD <?=$userProperties['earnedTotal']?>

                                        </div>
                                        <!-- /media body -->
                                    </div>
                                    <!-- /media -->
                                </div>
                                <!-- /card body -->
                            </div>
                            <!-- /card -->
                        </div>

                        <div class="col-md-6">
                            <!-- Card -->
                            <div class="dt-card">
                                <!-- Card Body -->
                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4 dt-card bg-dark text-white">
                                    <span class="badge badge-secondary badge-top-right">Active deposits</span>
                                    <!-- Media -->
                                    <div class="media iso" id="medbod">
                                        <i><img src="accountbalance.png" width="40" height="50" alt=""></i>
                                        <!-- Media Body -->
                                        <div class="media-body">
                                            <p></p>
                                            <p class="mb-1 h1 text-white">
                                                USD <?=$userProperties['accBal']?> </p>

                                        </div>
                                        <!-- /media body -->
                                    </div>
                                    <!-- /media -->
                                </div>
                                <!-- /card body -->
                            </div>
                            <!-- /card -->
                        </div>

                        <div class="col-md-6">
                            <!-- Card -->
                            <div class="dt-card">
                                <!-- Card Body -->
                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4 dt-card bg-dark text-white">
                                    <span class="badge badge-secondary badge-top-right">Active Bonus</span>
                                    <!-- Media -->
                                    <div class="media iso" id="medbod">
                                        <i><img src="bonus.png" width="30" height="35" alt=""></i>
                                        <!-- Media Body -->

                                        <div class="media-body">
                                            <p></p>
                                            <p class="mb-1 h1 text-white">
                                                USD <?=$userProperties['bonus']?> </p>

                                        </div>
                                        <!-- /media body -->
                                    </div>
                                    <!-- /media -->
                                </div>
                                <!-- /card body -->
                            </div>
                            <!-- /card -->
                        </div>

                        <div class="col-md-6">
                            <!-- Card -->
                            <div class="dt-card">
                                <!-- Card Body -->
                                <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4 dt-card bg-dark text-white">
                                    <span class="badge badge-secondary badge-top-right">Active Withdrawal</span>
                                    <!-- Media -->
                                    <div class="media iso" id="medbod">
                                        <i><img src="totalearned.png" width="40" height="50" alt=""></i>
                                        <!-- Media Body -->
                                        <p></p>
                                        <div class="media-body">
                                            <p></p>
                                            <p class="mb-1 h1 text-white">
                                                USD <?=$userProperties['withdrawal']?> </p>

                                        </div>
                                        <!-- /media body -->
                                    </div>
                                    <!-- /media -->
                                </div>
                                <!-- /card body -->
                            </div>
                            <!-- /card -->
                        </div>



                    </div>





                    <div class="col-md-5 col-sm-6 col-12">
                        <div class="row">
                            <div class="col-md-12">


                                <div class="dt-card dt-card bg-image-v6 bg-overlay overlay-opacity-0_8 bg-gradient-blue--after text-white">

                                    <!-- Overlay Content -->
                                    <div class="bg-overlay__inner mt-auto">

                                        <!-- Card Body -->
                                        <div class="dt-card__body">


                                            <!-- TradingView Widget BEGIN -->
                                            <div class="tradingview-widget-container chart2">
                                                <div id="tradingview_ac9b0"></div>
                                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP" rel="noopener" target="_blank"><span class="blue-text">Bitcoin chart</span></a> by TradingView</div>
                                                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                                <script type="text/javascript">
                                                    new TradingView.widget({
                                                        "width": 400,
                                                        "height": 600,
                                                        "symbol": "BITSTAMP:BTCUSD",
                                                        "interval": "D",
                                                        "timezone": "Africa/Nairobi",
                                                        "theme": "Dark",
                                                        "style": "1",
                                                        "locale": "en",
                                                        "toolbar_bg": "#f1f3f6",
                                                        "enable_publishing": false,
                                                        "withdateranges": true,
                                                        "hide_side_toolbar": false,
                                                        "allow_symbol_change": true,
                                                        "calendar": true,
                                                        "studies": [
                                                            "LinearRegression@tv-basicstudies",
                                                            "RSI@tv-basicstudies",
                                                            "Stochastic@tv-basicstudies"
                                                        ],
                                                        "container_id": "tradingview_ac9b0"
                                                    });
                                                </script>
                                            </div>
                                            <!-- TradingView Widget END -->



                                        </div>
                                        <!-- /card body -->

                                    </div>
                                    <!-- /overlay content -->

                                </div>
                                <!-- /card -->
                            </div>

                        </div>


                    </div>






                    <footer>
                        Copyright 24hrfx Trading Org © 2023 Version :3.7
                    </footer>





                </div>
            </div>

            <div class="overlay"></div>

            <!-- jQuery CDN - Slim version (=without AJAX) -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <!-- Popper.JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
            <!-- jQuery Custom Scroller CDN -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $("#sidebar").mCustomScrollbar({
                        theme: "minimal"
                    });

                    $('#dismiss, .overlay').on('click', function() {
                        $('#sidebar').removeClass('active');
                        $('.overlay').removeClass('active');
                    });

                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').addClass('active');
                        $('.overlay').addClass('active');
                        $('.collapse.in').toggleClass('in');
                        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                    });
                });
            </script>
    </body>

    </html>
