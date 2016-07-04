<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";
include "../dist/function/patientsession.inc.php";
include "../dist/function/patienthistoryinfo.inc.php";
?>
<!DOCTYPE html>

<html class="app-ui">

    <head>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <!-- Document title -->
        <title>Welcome to SIMANH</title>

        <meta name="description" content="AppUI - Admin Dashboard Template & UI Framework" />
        <meta name="author" content="rustheme" />
        <meta name="robots" content="noindex, nofollow" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="../assets/img/favicons/apple-touch-icon.png" />
        <link rel="icon" href="../assets/img/favicons/favicon.ico" />

        <!-- Google fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="../assets/js/plugins/slick/slick.min.css" />
        <link rel="stylesheet" href="../assets/js/plugins/slick/slick-theme.min.css" />
        <link rel="stylesheet" href="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css" />

        <!-- AppUI CSS stylesheets -->
        <link rel="stylesheet" id="css-font-awesome" href="../assets/css/font-awesome.css" />
        <link rel="stylesheet" id="css-ionicons" href="../assets/css/ionicons.css" />
        <link rel="stylesheet" id="css-bootstrap" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" id="css-app" href="../assets/css/app.css" />
        <link rel="stylesheet" id="css-app-custom" href="../assets/css/app-custom.css" />
        <link rel="stylesheet" type="text/css" href="../library/sweetalert/dist/sweetalert.css">
        <!-- End Stylesheets -->
    </head>

    <body class="app-ui layout-has-drawer layout-has-fixed-header">
        <div class="app-layout-canvas">
            <div class="app-layout-container">

                <!-- Drawer -->
                <aside class="app-layout-drawer">

                    <!-- Drawer scroll area -->
                    <div class="app-layout-drawer-scroll">
                        <!-- Drawer logo -->
                        <div id="logo" class="drawer-header">
                            <a href="index.html"><img class="img-responsive" src="../assets/img/logo/logo-backend.png" title="AppUI" alt="AppUI" /></a>
                        </div>

                        <!-- Drawer navigation -->
                        <?php include "componants/menu-3.php"; ?>
                        <!-- End drawer navigation -->

                        <div class="drawer-footer">
                            <p class="copyright">AppUI Template &copy;</p>
                            <a href="https://shapebootstrap.net/item/1525731-appui-admin-frontend-template/?ref=rustheme" target="_blank" rel="nofollow">Purchase a license</a>
                        </div>
                    </div>
                    <!-- End drawer scroll area -->
                </aside>
                <!-- End drawer -->

                <!-- Header -->
                <header class="app-layout-header">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                        					<span class="sr-only">Toggle navigation</span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        				</button> -->
                                <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                        					<span class="sr-only">Toggle drawer</span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        				</button>
                                <span class="navbar-page-title">
                        					Complications information
                        				</span>
                            </div>

                            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                                <!-- Header search form -->


                                <!-- .navbar-left -->
                                <?php include "componants/nav-left.php"; ?>
                                <!-- .navbar-right -->

                            </div>
                        </div>
                        <!-- .container-fluid -->
                    </nav>
                    <!-- .navbar-default -->
                </header>
                <!-- End header -->

                <main class="app-layout-content">

                  <!-- Page Content -->
                  <div class="container-fluid p-y-md">
                      <!-- Stats -->
                      <div class="row">
                        <div class="col-sm-6 text-left">
                          <h3 style="margin-top: 0px;">Patient's ID : <?php print $_SESSION[$sessionName.'PID']; ?></h3>
                        </div>
                        <div class="col-sm-6 text-right">
                          <button type="button" class="btn btn-app-red" onclick="xpl_custom_function.common_redirect('close_session.php')">Close session</button>
                        </div>
                      </div>
                      <div class="row">
                        <form class="js-validation-obstetric form-horizontal m-t-sm"  method="post" action="controller/insert-obstetric.php">
                          <div class="col-xs-12">
                            <!-- Add card -->
                            <div class="card">
                              <div class="card-header bg-teal bg-inverse">
                                  <h4>Complications in labour / delivery</h4>
                              </div>
                              <div class="card-block" style="padding-top: 30px;">
                                <div class="row">
                                  <div class="col-sm-12">
                                     <div class="table-responsive">
                                       <table class="table table-striped table-bordered">
                                         <thead>
                                           <tr>
                                             <th>
                                               Complication
                                             </td>
                                             <th>
                                               Status
                                             </td>
                                             <th>
                                               Remark
                                             </td>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <td>
                                               Induction of labour
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-induc" id="radio-induc1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-induc" id="radio-induc2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Antepartum haemorrhage
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-ante" id="radio-ante1" value="0" onclick="toggle_value('radio-ante', 0);" checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-ante" id="radio-ante2" value="1" onclick="toggle_value('radio-ante', 1);" /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>

                                           <tr class="anteOption" style="display:none;">
                                             <td>
                                               AP : Abruptio placenta
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-ap" id="radio-ap1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-ap" id="radio-ap2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>

                                           <tr class="anteOption" style="display:none;">
                                             <td>
                                               PP : Placenta previa
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-pp" id="radio-pp1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-pp" id="radio-pp2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>

                                           <tr>
                                             <td>
                                               Postpartum haemorrhage
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-post" id="radio-post1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-post" id="radio-post2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Eclampsia
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-eclm" id="radio-eclm1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-eclm" id="radio-eclm2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Prolonged rupture of membranes
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-prm" id="radio-prm1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-prm" id="radio-prm2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Ruptured uterus
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-rup" id="radio-rup1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-rup" id="radio-rup2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Sepsis
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-sep" id="radio-sep1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-sep" id="radio-sep2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Obstructed or prolonged labour
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-opl" id="radio-opl1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-opl" id="radio-opl2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Retained placenta
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-rp" id="radio-rp1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-rp" id="radio-rp2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Manual removal of placenta
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-mrp" id="radio-mrp1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-mrp" id="radio-mrp2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Maternal death
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-mater" id="radio-mater1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-mater" id="radio-mater2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Stillbirth
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-still" id="radio-still1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-still" id="radio-still2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Neonatal death
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-neo" id="radio-neo1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-neo" id="radio-neo2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Preterm birth
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-pt" id="radio-pt1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-pt" id="radio-pt2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                               Low birth weight
                                             </td>
                                             <td>
                                               <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                 <input type="radio" name="radio-lbw" id="radio-lbw1" value="0"  checked /><span></span> No
                                               </label>&nbsp;&nbsp;
                                               <label class="css-input css-radio css-radio-lg css-radio-success">
                                                 <input type="radio" name="radio-lbw" id="radio-lbw2" value="1"  /><span></span> Yes
                                               </label>
                                             </td>
                                             <td>

                                             </td>
                                           </tr>
                                         </tbody>
                                       </table>
                                     </div>
                                  </div>
                                </div>


                              </div>
                            </div>
                            <!-- End card -->
                          </div>
                        </form>
                      </div>
                      <!-- End row -->
                  </div>


                </main>

            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->
        <div class="app-ui-mask-modal"></div>


        <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="../assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="../assets/js/core/jquery.placeholder.min.js"></script>
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/app-custom.js"></script>

        <!-- Page JS Plugins -->
       <script src="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
       <script src="../library/sweetalert/dist/sweetalert.min.js"></script>
       <script src="../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <!-- <script src="../dist/page/obstetric/js/base_forms_validation.js"></script> -->
        <script src="../dist/page/complication/js/custom-code.js"></script>
        <script src="../library/xpl/js/xpl.js"></script>
        <script>
        $(function()
        {
            // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
            App.initHelpers(['datepicker']);
        });
        </script>

    </body>

</html>
