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
        <form class="js-validation-register form-horizontal m-t-sm"  method="post" action="controller/update-register.php">
          <div class="col-xs-12">
            <!-- Add card -->
            <div class="card">
              <div class="card-header bg-teal bg-inverse">
                  <h4>View delivery information</h4>
                  <ul class="card-actions">
                    <li>
                        <!-- To toggle card fullscreen, add the following properties to your button: data-toggle="card-action" data-action="fullscreen_toggle" -->
                        <button type="button" data-toggle="card-action" data-action="fullscreen_toggle"></button>
                    </li>
                  </ul>
              </div>
              <div class="card-block" style="padding-top: 30px;">
                <!-- End geolocation input div -->
                <h3 style="font-weight: 400; color: teal;">Delivery information</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Gestational age at delivery
                          </td>
                          <td>
                            <?php print $result[0]['ga_del']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date - Time of delivery
                          </td>
                          <td>
                            <?php if($result[0]['date_del']!='0000-00-00') print $result[0]['date_del']; ?>
                            <?php print " ".$result[0]['time_del']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Mode of delivery
                          </td>
                          <td>
                            <?php print $result[0]['point_no']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Indication
                          </td>
                          <td>
                            <?php
                            switch($result[0]['refer_in_status']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Other indication
                          </td>
                          <td>
                            <?php print $result[0]['refer_in_facility']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Type of birth attendant
                          </td>
                          <td>
                            <?php
                            switch($result[0]['refer_in_status']){
                              case '1': print "Stable"; break;
                              case '2': print "Unstable"; break;
                              case '3': print "Coma"; break;
                              default: print "N/A";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Birth attendant
                          </td>
                          <td>
                            <?php print $result[0]['refer_in_facility']; ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End row -->

                <!-- End geolocation input div -->
                <h3 style="font-weight: 400; color: teal;">Perineum</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Intact
                          </td>
                          <td>
                            <?php
                            switch($result[0]['intact']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Episiotomy
                          </td>
                          <td>
                            <?php
                            switch($result[0]['episiotomy']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Degree tear
                          </td>
                          <td>
                            <?php
                            switch($result[0]['degree_tear']){
                              case '1': print "1"; break;
                              case '2': print "2"; break;
                              case '3': print "3"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End row -->

                <h3 style="font-weight: 400; color: teal;">ART</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Antenatal client on AZT before labour
                          </td>
                          <td>
                            <?php print $result[0]['pid']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Antenatal client Nevirapine taken during labour
                          </td>
                          <td>
                            <?php print $result[0]['p_fname']." ".$result[0]['p_mname']." ".$result[0]['p_lname']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Truvada given to woman after delivery
                          </td>
                          <td>
                            <?php print $result[0]['p_address']; ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End row -->

                <h3 style="font-weight: 400; color: teal;">Maternal separation</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date of separation
                          </td>
                          <td>
                            <?php print $result[0]['pid']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Separated by transfer out
                          </td>
                          <td>
                            <?php print $result[0]['p_fname']." ".$result[0]['p_mname']." ".$result[0]['p_lname']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Transfer facility
                          </td>
                          <td>
                            <?php print $result[0]['p_address']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Separated by maternal death
                          </td>
                          <td>
                            <?php print $result[0]['p_address']; ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End row -->

              </div>
            </div>
            <!-- End card -->
          </div>
        </form>
      </div>
      <!-- End row -->
  </div>


</main>
