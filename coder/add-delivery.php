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
                        					Delivery information
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
                                  <h4>Delivery</h4>
                              </div>
                              <div class="card-block" style="padding-top: 30px;">
                                <h3>Delivery information</h3>

                                <div class="form-group" style="padding-top: 20px;">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                          <input class="form-control" type="text" id="txt-gaadm" name="txt-gaadm" placeholder="Enter GA at admission or Unknown" />
                                          <label for="material-text">Gestational age at delivery&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_unknown('txt-gaadm')"><i class="ion-android-arrow-dropdown"></i> Unknown</button></label></label>
                                      </div>
                                  </div>
                                </div>

                                <div class="row" style="padding-top: 5px;">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                          <div class="form-material">
                                            <input class="js-datepicker form-control" type="text" id="txt-dateadm" name="txt-dateadm" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print date('Y-m-d');?>">
                                            <label for="example-datepicker4">Date of delivery <span style="color: red;">**</span></label>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                          <div class="form-material">
                                              <input class="form-control" type="time" id="txt-timeadm" name="txt-timeadm" placeholder="Please enter time of admission" value="<?php print date('H:m'); ?>" />
                                              <label for="material-text">Time of delivery <span style="color: red;">**</span></label>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                                <div class="form-group">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                          <select class="form-control" name="txt_moddel" id="txt_moddel">
                                            <option value="1" selected="selected">Normal delivery</option>
                                            <option value="2">V/E</option>
                                            <option value="3">F/E</option>
                                            <option value="4">Caesarean section</option>
                                            <option value="5">Vaginal breach</option>
                                          </select>

                                          <label for="material-text">Mode of delivery</label>
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                          <select class="form-control" name="txt-typeba" id="txt-typeba">
                                            <option value="99" selected="selected">No data</option>
                                            <option value="1">Midwife</option>
                                            <option value="2">Professional Nurse</option>
                                            <option value="3">Medical student</option>
                                            <option value="4">Medical officer</option>
                                            <option value="5">Registrar</option>
                                            <option value="6">Obstetrician</option>
                                          </select>

                                          <label for="material-text">Type of birth attendant</label>
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group" style="padding-top: 20px;">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                          <input class="form-control" type="text" id="txt-gaadm" name="txt-gaadm" placeholder="Enter GA at admission or Unknown" />
                                          <label for="material-text">Name of birth attendant&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_unknown('txt-gaadm')"><i class="ion-android-arrow-dropdown"></i> Choose</button></label></label>
                                      </div>
                                  </div>
                                </div>


                                <h3>Delivery information</h3>

                                <div class="form-group" style="padding-top: 20px;">
                                  <div class="col-xs-12">
                                    <label for="material-text">Perineum</label>&nbsp;&nbsp;&nbsp;<br>
                                    <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                      <input type="radio" name="radio-perineum" id="radio-perineum1" value="0" onclick="toggle_value('txtPerineum', 0);" checked /><span></span> Infact
                                    </label>&nbsp;&nbsp;
                                    <label class="css-input css-radio css-radio-lg css-radio-success">
                                      <input type="radio" name="radio-perineum" id="radio-perineum2" value="1" onclick="toggle_value('txtPerineum', 1);" /><span></span> Episiotomy
                                    </label>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Degree tear</label>&nbsp;&nbsp;&nbsp;<br>
                                    <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                      <input type="radio" name="radio-degree" id="radio-degree1" value="0" onclick="toggle_value('txtDtear', 0);" checked /><span></span> No
                                    </label>
                                    <label class="css-input css-radio css-radio-lg css-radio-success">
                                      <input type="radio" name="radio-degree" id="radio-degree2" value="1" onclick="toggle_value('txtDtear', 1);" /><span></span> 1
                                    </label>&nbsp;&nbsp;
                                    <label class="css-input css-radio css-radio-lg css-radio-success">
                                      <input type="radio" name="radio-degree" id="radio-degree3" value="2" onclick="toggle_value('txtDtear', 2);" /><span></span> 2
                                    </label>&nbsp;&nbsp;
                                    <label class="css-input css-radio css-radio-lg css-radio-success">
                                      <input type="radio" name="radio-degree" id="radio-degree4" value="3" onclick="toggle_value('txtDtear', 3);" /><span></span> 3
                                    </label>
                                  </div>
                                </div>

                                <h3>ART</h3>

                                <div class="form-group" style="padding-top: 20px;">
                                  <div class="col-xs-12">
                                    <label for="material-text">Antenatal client on AZT before labour</label>&nbsp;&nbsp;&nbsp;<br>
                                    <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                      <input type="radio" name="radio-azt" id="radio-azt1" value="0" onclick="toggle_value('txtAzt', 0);" checked /><span></span> No
                                    </label>&nbsp;&nbsp;
                                    <label class="css-input css-radio css-radio-lg css-radio-success">
                                      <input type="radio" name="radio-azt" id="radio-azt2" value="1" onclick="toggle_value('txtAzt', 1);" /><span></span> Yes
                                    </label>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Antenatal client Nevirapine taken during labour</label><br>
                                    <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                      <input type="radio" name="radio-act" id="radio-act1" value="0" onclick="toggle_value('txtAct', 0);" checked /><span></span> No
                                    </label>&nbsp;&nbsp;
                                    <label class="css-input css-radio css-radio-lg css-radio-success">
                                      <input type="radio" name="radio-act" id="radio-act2" value="1" onclick="toggle_value('txtAct', 1);" /><span></span> Yes
                                    </label>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Truvada given to woman after delivery</label><br>
                                    <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                      <input type="radio" name="radio-tvd" id="radio-tvd1" value="0" onclick="toggle_value('txtTvd', 0);" checked /><span></span> No
                                    </label>&nbsp;&nbsp;
                                    <label class="css-input css-radio css-radio-lg css-radio-success">
                                      <input type="radio" name="radio-tvd" id="radio-tvd2" value="1" onclick="toggle_value('txtTvd', 1);" /><span></span> Yes
                                    </label>
                                  </div>
                                </div>

                                <h3>Maternal separation</h3>

                                <div class="form-group" style="padding-top: 20px;">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                        <input class="js-datepicker form-control" type="text" id="txt-dateadm" name="txt-dateadm" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print date('Y-m-d');?>">
                                        <label for="example-datepicker4">Transfer date <span style="color: red;">**</span></label>
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Transfer out</label><br>
                                    <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                      <input type="radio" name="radio-mt" id="radio-mt1" value="0" onclick="toggle_value('txtMatrans', 0);" checked /><span></span> No
                                    </label>&nbsp;&nbsp;
                                    <label class="css-input css-radio css-radio-lg css-radio-success">
                                      <input type="radio" name="radio-mt" id="radio-mt2" value="1" onclick="toggle_value('txtMatrans', 1);" /><span></span> Yes
                                    </label>
                                  </div>
                                </div>

                                <div class="matersepinfo" style="display:none; padding-top: 20px;">
                                  <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="txt-mt-facility" name="txt-mt-facility" placeholder="Name of transfer facility" />
                                            <label for="material-text">Transfer facility&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_unknown('txt-mt-facility')"><i class="ion-android-arrow-dropdown"></i> Unknown</button></label></label>
                                        </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Maternal death</label><br>
                                    <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                      <input type="radio" name="radio-mdeath" id="radio-mdeath1" value="0" onclick="toggle_value('txtMadeath', 0);" checked /><span></span> No
                                    </label>&nbsp;&nbsp;
                                    <label class="css-input css-radio css-radio-lg css-radio-success">
                                      <input type="radio" name="radio-mdeath" id="radio-mdeath2" value="1" onclick="toggle_value('txtMadeath', 1);" /><span></span> Yes
                                    </label>
                                  </div>
                                </div>





                                <div class="row narrow-gutter">
                                    <div class="col-xs-12 text-right">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-app-teal">Save</button>
                                    </div>
                                    <div class="col-xs-6">

                                    </div>
                                </div>
                                <!-- End referCondition -->



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
        <script src="../dist/page/delivery/js/custom-code.js"></script>
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
