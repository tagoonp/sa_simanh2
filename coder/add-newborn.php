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
                        					Newborn charecteristics
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
                        <div class="col-sm-12">
                          <div class="card">
                            <ul class="nav nav-tabs" data-toggle="tabs">
                                <li class="active">
                                    <a href="#btabs-static-home">Add new baby</a>
                                </li>
                                <li>
                                    <a href="#btabs-static-profile">Baby list</a>
                                </li>
                            </ul>
                            <div class="card-block tab-content">
                                <div class="tab-pane active" id="btabs-static-home">
                                  <form class="js-validation-obstetric form-horizontal m-t-sm"  method="post" action="controller/insert-obstetric.php">

                                      <h3>Newborn information</h3>

                                      <div class="form-group" style="padding-top: 20px;">
                                        <div class="col-xs-12">
                                          <label for="material-text">Gender <span style="color:red;">**</span></label>&nbsp;&nbsp;&nbsp;<br>
                                          <div class="" checked style="display:none;" >
                                            <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                              <input type="radio" name="radio-gender" id="radio-gender0" value="0" /><span></span>
                                            </label>&nbsp;&nbsp;
                                          </div>

                                          <label class="css-input css-radio css-radio-lg css-radio-success m-r-sm">
                                            <input type="radio" name="radio-gender" id="radio-gender1" value="1"  /><span></span> Male
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-gender" id="radio-gender2" value="2"  /><span></span> Female
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group" style="padding-top: 10px;">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <select class="form-control" name="txt_moddel" id="txt_moddel">
                                                  <option value="1" selected="selected">Normal delivery</option>
                                                  <option value="2">V/E</option>
                                                  <option value="3">F/E</option>
                                                  <option value="4">Caesarean section</option>
                                                  <option value="5">Vaginal breach</option>
                                                </select>
                                                <label for="material-text">Mode of birth</label>
                                            </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <label for="material-text">Alive</label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-alive" id="radio-alive1" value="0" onclick="toggle_value('radio-alive', 0);"  /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-alive" id="radio-alive2" value="1" onclick="toggle_value('radio-alive', 1);" checked /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="aliveCondition1" style="display:none;">
                                        <div class="form-group" style="padding-top: 10px;">
                                          <div class="col-xs-12">
                                            <label for="material-text">Stillbirth type <span style="color:red;">**</span></label>&nbsp;&nbsp;&nbsp;<br>
                                            <div class="" checked style="display:none;" >
                                              <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                                <input type="radio" name="radio-alivecon" id="radio-alivecon0" value="0" checked /><span></span>
                                              </label>&nbsp;&nbsp;
                                            </div>
                                            <label class="css-input css-radio css-radio-lg css-radio-success m-r-sm">
                                              <input type="radio" name="radio-alivecon" id="radio-alivecon1" value="1"  /><span></span> Fresh
                                            </label>&nbsp;&nbsp;
                                            <label class="css-input css-radio css-radio-lg css-radio-success">
                                              <input type="radio" name="radio-alivecon" id="radio-alivecon2" value="2"  /><span></span> Macerated
                                            </label>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-xs-6">
                                          <div class="form-group" style="padding-top: 10px;">
                                            <div class="col-sm-12">
                                                <div class="form-material">
                                                    <select class="form-control" name="txt_moddel" id="txt_moddel">
                                                      <option value="99" selected="selected">Unknown</option>
                                                      <option value="0">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                      <option value="6">6</option>
                                                      <option value="7">7</option>
                                                      <option value="8">8</option>
                                                      <option value="9">9</option>
                                                      <option value="10">10</option>
                                                    </select>
                                                    <label for="material-text">Apgar score 5 min</label>
                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-xs-6">
                                          <div class="form-group" style="padding-top: 10px;">
                                            <div class="col-sm-12">
                                                <div class="form-material">
                                                    <select class="form-control" name="txt_moddel" id="txt_moddel">
                                                      <option value="99" selected="selected">Unknown</option>
                                                      <option value="0">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                      <option value="6">6</option>
                                                      <option value="7">7</option>
                                                      <option value="8">8</option>
                                                      <option value="9">9</option>
                                                      <option value="10">10</option>
                                                    </select>
                                                    <label for="material-text">Apgar score 10 min</label>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <label for="material-text">Resuscitate bag & mask</label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-resus" id="radio-resus1" value="0" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-resus" id="radio-resus2" value="1"  /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-bw" name="txt-bw" placeholder="Enter birth weight (g.)" />
                                                <label for="material-text">Birth weight </label></label>
                                            </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-hc" name="txt-hc" placeholder="Enter head circumference (cm), If no data enter 0" />
                                                <label for="material-text">Head circumference (cm) </label></label>
                                            </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-fl" name="txt-fl" placeholder="Enter fetal length (cm), If no data enter 0" />
                                                <label for="material-text">Fetal length (cm) </label></label>
                                            </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <label for="material-text">Birth defects found</label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-bdf" id="radio-bdf1" value="0" checked onclick="toggle_value('radio-bdf', 0);" /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-bdf" id="radio-bdf2" value="1" onclick="toggle_value('radio-bdf', 1);" /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="bdfCondition1" style="display: none;">
                                        <div class="form-group">
                                          <div class="col-sm-12">
                                              <div class="form-material">
                                                  <textarea name="txt-bdfindentift" id="txt-bdfindentift" class="form-control" rows="4" cols="40" placeholder="Enter identify, please see http://www.birthregister.co.za/documentation"></textarea>
                                                  <label for="material-text">Identify </label></label>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-xs-12">
                                            <label for="material-text">Birth defects notified</label>&nbsp;&nbsp;&nbsp;<br>
                                            <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                              <input type="radio" name="radio-bdn" id="radio-bdn1" value="0" checked /><span></span> No
                                            </label>&nbsp;&nbsp;
                                            <label class="css-input css-radio css-radio-lg css-radio-success">
                                              <input type="radio" name="radio-bdn" id="radio-bdn2" value="1"  /><span></span> Yes
                                            </label>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <label for="material-text">Live birth to HIV positive woman</label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-lbhiv" id="radio-lbhiv" value="0" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-lbhiv" id="radio-lbhiv" value="1"  /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <label for="material-text">Exclusive breast feeding within 1 hour</label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-ebf" id="radio-ebf1" value="0" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-ebf" id="radio-ebf2" value="1"  /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <label for="material-text">Breast feeding </label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-bf" id="radio-bf1" value="0" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-bf" id="radio-bf2" value="1"  /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <label for="material-text">Formular feeding  </label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-ff" id="radio-ff1" value="0" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-ff" id="radio-ff2" value="1"  /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <label for="material-text">Skin to Skin contact  </label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-s2s" id="radio-s2s1" value="0" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-s2s" id="radio-s2s2" value="1"  /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <h3>Newborn information</h3>

                                      <div class="form-group" style="padding-top: 20px;">
                                        <div class="col-xs-12">
                                          <label for="material-text">Newborn admitted </label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-na" id="radio-na1" value="0" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-na" id="radio-na2" value="1"  /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="row" style="padding-top: 20px; margin-bottom: 0px;">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material">
                                                  <input class="js-datepicker form-control" type="text" id="txt-dateadm" name="txt-dateadm" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"  value="">
                                                  <!-- <input class="form-control" type="date" id="txt-timeadm" name="txt-timeadm" placeholder="Please enter time of admission" value="" /> -->
                                                  <label for="example-datepicker4">Date of separation <span style="color: red;">**</span></label>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-material">
                                                    <input class="form-control" type="time" id="txt-timeadm" name="txt-timeadm" placeholder="Please enter time of admission" value=""  />
                                                    <label for="material-text">Time of separation <span style="color: red;">**</span></label>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group" style="padding-top: 0px;">
                                        <div class="col-xs-12">
                                          <label for="material-text">Separated by early neonatal death < 7days </label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-neo7" id="radio-neo71" value="0" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-neo7" id="radio-neo72" value="1"  /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group" style="padding-top: 0px;">
                                        <div class="col-xs-12">
                                          <label for="material-text">Separated by late neonatal death 7 - 28 days </label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-neo28" id="radio-neo281" value="0" onclick="toggle_value('radio-neo28', 0);" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-neo28" id="radio-neo282" value="1" onclick="toggle_value('radio-neo28', 1);" /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="form-group" style="padding-top: 0px;">
                                        <div class="col-xs-12">
                                          <label for="material-text">Separated by transfer out </label>&nbsp;&nbsp;&nbsp;<br>
                                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                            <input type="radio" name="radio-sep" id="radio-sep1" value="0" onclick="toggle_value('radio-sep', 0);" checked /><span></span> No
                                          </label>&nbsp;&nbsp;
                                          <label class="css-input css-radio css-radio-lg css-radio-success">
                                            <input type="radio" name="radio-sep" id="radio-sep2" value="1" onclick="toggle_value('radio-sep', 1);" /><span></span> Yes
                                          </label>
                                        </div>
                                      </div>

                                      <div class="transOption" style="display:none;">
                                        <div class="form-group" style="padding-top: 0px;">
                                          <div class="col-sm-12">
                                              <div class="form-material">
                                                  <input class="form-control" type="text" id="txt-tranfac" name="txt-tranfac" placeholder="Enter name of transfer facility" />
                                                  <label for="material-text">Transfer facility &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button class="btn btn-xs btn-app-teal-outline" data-toggle="modal" data-target="#modal-top" type="button" onclick="fillMedalData('txt-tranfac')"><i class="ion-android-arrow-dropdown"></i> Choose</button></label>
                                                  </label>
                                              </div>
                                          </div>
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
                                  </form>
                                </div>
                                <div class="tab-pane" id="btabs-static-profile">
                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft
                                        beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica
                                        VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester
                                        stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                                </div>
                            </div>
                          </div>
                          <!-- End Card Tabs Default Style -->
                        </div>
                        <!-- End col-sm-12 -->

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
        <script src="../dist/page/newborn/js/custom-code.js"></script>
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
