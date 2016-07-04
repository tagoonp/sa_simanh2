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
                        					Postnatal information
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
                                  <h4>Postnatal information</h4>
                              </div>
                              <div class="card-block" style="padding-top: 30px;">
                                <h3>Complications in postpartum information</h3>
                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Postpartum haemorrhage</label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-pph" id="radio-pph1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-pph" id="radio-pph2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Postpartum eclampsia </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-ppe" id="radio-ppe1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-ppe" id="radio-ppe2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Postpartum sepsis </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-pps" id="radio-pps1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-pps" id="radio-pps2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <h3>Family planning</h3>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Sterilisation </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-ster" id="radio-ster1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-ster" id="radio-ster2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Oral contraception </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-oral" id="radio-oral1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-oral" id="radio-oral2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Medroxyprogesterone </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-medrox" id="radio-medrox1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-medrox" id="radio-medrox2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Norethisterone enanthate </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-nore" id="radio-nore1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-nore" id="radio-nore2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Condoms </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-condom" id="radio-condom1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-condom" id="radio-condom2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">IUCD inserted </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-iucd" id="radio-iucd1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-iucd" id="radio-iucd2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Subdermal implant </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-subderm" id="radio-subderm1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-subderm" id="radio-subderm2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <h3>Marternal separation</h3>


                                <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px;">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                        <input class="js-datepicker form-control" type="text" id="txt-Date34" name="txt-Date34" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="">
                                        <label for="example-datepicker4">Date of separation</label>
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12" style="margin-top: 0px; padding-top: 0px;">
                                    <label for="material-text">Separated by discharged </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-sepbydist" id="radio-sepbydist1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-sepbydist" id="radio-sepbydist2" value="1" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Separated by transfer out </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-sepbytrans" id="radio-sepbytrans1" checked onclick="toggle_value('radio-sepbytrans', 0);" value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-sepbytrans" id="radio-sepbytrans2" value="1" onclick="toggle_value('radio-sepbytrans', 1);" /><span></span> Yes
                                          </label>
                                      </div>
                                </div>

                                <div class="separateOption" style="display:none;">
                                  <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px;">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="txt-transtfacility" name="txt-transtfacility" placeholder="Enter name of facility" />
                                            <label for="material-text">Transfer facility &nbsp;&nbsp;&nbsp;&nbsp;
                                              <button class="btn btn-xs btn-app-teal-outline" data-toggle="modal" data-target="#modal-top" type="button" onclick="fillMedalData('txt-transtfacility')"><i class="ion-android-arrow-dropdown"></i> Choose</button>
                                            </label>
                                        </div>
                                    </div>
                                  </div>
                                </div>


                                <div class="form-group">
                                  <div class="col-xs-12">
                                    <label for="material-text">Separated by maternal death </label><br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-sepbymdeath" id="radio-sepbymdeath1" checked value="0" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-sepbymdeath" id="radio-sepbymdeath2" value="1" /><span></span> Yes
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

        <!-- Apps Modal -->
        <?php
        include "componants/medal.php";
        ?>

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
        <script src="../dist/page/postnatal/js/custom-code.js"></script>
        <script src="../dist/plugin/js/facility.js"></script>
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
