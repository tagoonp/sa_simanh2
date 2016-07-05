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
        <form class="js-validation-delivery form-horizontal m-t-sm"  method="post" action="">
          <div class="col-xs-12">
            <!-- Add card -->
            <div class="card">
              <div class="card-header bg-teal bg-inverse">
                  <h4>Delivery information</h4>
              </div>
              <div class="card-block" style="padding-top: 30px;">
                <h3 style="font-weight: 400; color: teal;">General information</h3>

                <div class="form-group" style="padding-top: 20px;">
                  <div class="col-sm-12">
                      <div class="form-material">
                          <input class="form-control" type="text" id="txt-gadel" name="txt-gadel" placeholder="Enter GA at delivery or Unknown" />
                          <label for="material-text">Gestational age at delivery&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_unknown('txt-gadel')"><i class="ion-android-arrow-dropdown"></i> Unknown</button> <span style="color: red;">**</span></label>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                      <div class="form-material">
                        <input class="js-datepicker form-control" type="text" id="txt-datedel" name="txt-datedel" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="">
                        <label for="example-datepicker4">Date of delivery <span style="color: red;">**</span></label>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                      <div class="form-material">
                          <input class="form-control" type="time" id="txt-timedel" name="txt-timedel" placeholder="Please enter time of admission" value="" />
                          <label for="material-text">Time of delivery <span style="color: red;">**</span></label>
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

                <div class="modeCondition" style="display:none;">
                  <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material">
                            <select class="form-control" name="inditation" id="inditation">
                              <option value="" selected="">-- Please select inditation --</option>
                            </select>

                            <label for="material-text">Indication</label>
                        </div>
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
                          <input class="form-control" type="text" id="txt-mt-ba" name="txt-mt-ba" placeholder="Please choose birth attendant" />
                          <label for="material-text">Name of birth attendant&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-xs btn-app-teal-outline" data-toggle="modal" data-target="#modal-ba" type="button" onclick="fillMedalData2('txt-mt-ba')"><i class="ion-android-arrow-dropdown"></i> Choose</button>
                          </label>
                      </div>
                  </div>
                  <div class="col-sm-12" style="display:none;">
                    <div class="form-material">
                        <input class="form-control" type="text" id="txt-mt-ba-id" name="txt-mt-ba-id" placeholder="ID of birth attendant" readonly />
                    </div>
                  </div>
                </div>


                <h3 style="font-weight: 400; color: teal;">Delivery information</h3>

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

                <h3 style="font-weight: 400; color: teal;">ART</h3>

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

                <h3 style="font-weight: 400; color: teal;">Maternal separation</h3>

                <div class="form-group" style="padding-top: 20px;">
                  <div class="col-sm-12">
                      <div class="form-material">
                        <input class="js-datepicker form-control" type="text" id="txt-dateadm" name="txt-dateadm" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print date('Y-m-d');?>">
                        <label for="example-datepicker4">Transfer date </label>
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
                            <label for="material-text">Transfer facility&nbsp;&nbsp;&nbsp;&nbsp;
                              <button class="btn btn-xs btn-app-teal-outline" data-toggle="modal" data-target="#modal-top" type="button" onclick="fillMedalData('txt-mt-facility')"><i class="ion-android-arrow-dropdown"></i> Choose</button>
                              <button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_unknown('txt-mt-facility')"><i class="ion-android-arrow-dropdown"></i> Unknown</button></label>
                            </label>
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
