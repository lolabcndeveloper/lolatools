<?php
//jquery.form
//$xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
?>

<?php if ($idBody != 'createForm') { ?>
<h2><?= $name; ?></h2>
<?php } else { ?>
<h2>Create project</h2>
<?php } ?>

<form action="<?= site_url(FRONT_SLUG.'/project/save'); ?>" id="formProject" class="formBig" name="create" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id; ?>" />
    <div class="cajaInputs">
        <label class="cajaForm">
            <p>
                Client*
            </p>
            <input type="text" id="client" name="client" class="formInput" placeholder="Client" value="<?= $client; ?>" />
        </label><!--label-->

        <label class="cajaForm">
            <p>
                Project Name*
            </p>
            <input type="text" id="name" name="name" class="formInput" placeholder="Project Name" value="<?= $name; ?>" />
        </label><!--label-->

        <label class="cajaForm">
            <p>
                Media*
            </p>
            <input type="text" id="media" name="media" class="formInput" placeholder="Media" value="<?= $media; ?>" />
        </label><!--label-->

        <label class="cajaForm">
            <p>
                Client Owner*
            </p>
            <input type="email" id="client_owner" name="client_owner" class="formInput" placeholder="clientOwner@email.com" value="<?= $client_owner ?>" />
        </label><!--label-->

        <label class="cajaForm">
            <p>
                LOLA Production Owner*
            </p>
            <input type="email" id="production_owner" name="production_owner" class="formInput" placeholder="productionOwner@hello-lola.com" value="<?= $production_owner ?>" />
        </label><!--label-->

        <label class="cajaForm">
            <p>
                LOLA Account Owner*
            </p>
            <input type="email" id="account_owner" name="account_owner" class="formInput" placeholder="accountOwner@hello-lola.com" value="<?= $account_owner ?>" />
        </label><!--label-->

    </div><!--cajaInputs-->

    <div class="thumbCalendars">

        <!--[START] thumbContainer tb se utiliza en listProjects.php con la misma estructura-->
        <span class="thumbContainer categoria1">
        <?php if ($file == '') { ?>

            <input type="file" id="tumbFileInput" name="file" />

        <?php } else { ?>

            <?php
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
            ?>
                <img src="<?= base_url(UPLOADS_SLUG.'/'.$file); ?>" />

            <?php } else { ?>

                <video src="<?= base_url(UPLOADS_SLUG.'/'.$file); ?>"></video>

            <?php } ?>


            <span class="categoria"><?= $media ?></span>

            <span class="over">
                <span class="icon"></span>
            </span><!--over-->

        <?php } ?>
        </span><!--ThumbContainer-->

        <!--[END] thumbContainer tb se utiliza en listProjects.php con la misma estructura-->



        <!--
        <div class="calendars">

         <div class="lineCalendars">
           <label>
             <p>
               From
             </p>
             <input id="form1" class="dateStyle" type="text" placeholder="yyyy-mm-dd" />
           </label>

           <label>
             <p>To</p>
             <input id="to1" class="dateStyle" type="text" placeholder="yyyy-mm-dd" />
           </label>
         </div><!--lineCalendars-->
        <!--
         <div class="lineCalendars">
           <label>
             <p>
               From
             </p>
             <input id="form2" class="dateStyle" type="text" placeholder="yyyy-mm-dd" />
           </label>

           <label>
             <p>To</p>
             <input id="to2" class="dateStyle" type="text" placeholder="yyyy-mm-dd" />
           </label>
         </div><!--lineCalendars-->
        <!--
        <div class="lineCalendars">
          <label>
            <span class="button buttonBigForm view">
              Finish
            </span>
          </label>

          <label>
            <span class="button buttonBigForm view">
              Update
            </span>
          </label>
        </div><!--lineCalendars-->
        <!--
         </div>
        -->

    </div><!--thumbCalendar-->

    <span class="button" id="createProjectButton">
        <?php if($idBody == 'createForm') { ?>
            Create
        <?php } else { ?>
            Update
        <?php } ?>
    </span>

</form>
<!--createForm-->

<!--countriesRights-->
<div class="countriesRights">
    <h2>
        Countries Rights
    </h2>

    <div class="countriesSelectContainer">
        <label>Country:</label>
        <select id="selectCountries">
            <option value="">Select a country</option>
            <?php
            foreach ($countries as $country) {
                echo '<option value="'.$country->id.'">'.$country->countries.'</option>';
            }
            ?>
        </select>
        <!--<span class="button" id="selectCountriesButton">View</span>-->
    </div>


    <span class="button" id="addCountriesButton">
        Add specific rights
        <span class="arrowWhite rightArrow"></span>
    </span>
    <div class="countriesFormContainer hide">
        <form action="<?= site_url(FRONT_SLUG.'/right/save'); ?>" id="formCountry" name="formAddCountries" method="post" class="">

            <input type="hidden" name="right_id" value="" />
            <input type="hidden" name="project_id" value="<?= $id ?>" />

            <div class="generalData">
                <label>
                    <p>Country or countries*</p>
                    <input type="text" id="country" class="formInput generalInputBox" name="countries" />
                </label>
                <label>
                    <p>Media covered*</p>
                    <textarea id="mediaCovered" class="formInput generalInputBox" name="description"></textarea>
                </label>
            </div><!--generalData-->

            <div class="detailsCountries">

                <div id="productionHouse" class="countryBox left">
                    <h3>
                        Production House
                    </h3>
                    <input type="text" class="longInput formInput" id="nameProductionHouse" name="production_email" placeholder="productionHouse@email.com" />

                    <div class="calendars">
                        <div class="lineCalendars">
                            <label>
                                <p>From</p>
                                <input id="fromProductionHouse" class="dateStyle" type="text" placeholder="yyyy-mm-dd" name="production_from" />
                            </label>

                            <label>
                                <p class="secondInput">To</p>
                                <input id="toProductionHouse" class="dateStyle right" type="text" placeholder="yyyy-mm-dd" name="production_to" />
                            </label>
                        </div><!--lineCalendars-->
                    </div><!--calendars-->
                    <div class="filesCountries">
                        <div id="budgetProductionHouse">
                            <p>Budget</p>

                            <div class="createContainer">
                                <input type="file" class="mediumInput" name="production_budget" />
                            </div>


                            <div class="fileContainer hide">
                                <div class="viewContainer">
                                    <a class="buttonSmall" href="#" target="_blank">View</a>
                                </div>

                                <div class="approveContainer">
                                    <p>Approve</p>
                                    <input type="checkbox" name="production_budget_approved" class="approve" />
                                </div>
                                <div class="updateContainer">
                                    <input type="file" class="mediumInput" name="production_budget_update" />
                                    <a class="buttonSmall hide">Update</a>
                                </div>
                            </div>

                        </div>

                        <div id="contractProductionHouse">
                            <p>Contract</p>
                            <!--
                            <input type="file" id="contractProductionHouse" class="mediumInput" name="production_contract" />
                            <span class="button hide" id="updateContractProductionHouse">Update</span>
                            -->
                            <!--
                            <p class="fileUp pdf">
                                documentoDeLaMovida.pdf <span class="icon"></span>
                            </p>
                            -->
                            <div class="createContainer">
                                <input type="file" class="mediumInput" name="production_contract" />
                            </div>


                            <div class="fileContainer hide">
                                <div class="viewContainer">
                                    <a class="buttonSmall" href="#" target="_blank">View</a>
                                </div>

                                <div class="approveContainer">
                                    <p>Approve</p>
                                    <input type="checkbox" class="approve" name="production_contract_approved"  />
                                </div>
                                <div class="updateContainer">
                                    <input type="file" class="mediumInput" name="production_contract_update" />
                                    <a class="buttonSmall hide">Update</a>
                                </div>
                            </div>


                        </div>

                    </div><!--filesCountries-->
                </div><!--countryBox-->

                <div id="contractHouse" class="countryBox right">
                    <h3>
                        Contract House
                    </h3>
                    <input type="text" class="longInput formInput" id="nameContractHouse" name="contract_email" placeholder="contractHouse@email.com" />

                    <div class="calendars">
                        <div class="lineCalendars">
                            <label>
                                <p>From</p>
                                <input id="fromContractHouse" class="dateStyle" type="text" placeholder="yyyy-mm-dd" name="contract_from" />
                            </label>

                            <label>
                                <p class="secondInput">To</p>
                                <input id="toContractHouse" class="dateStyle right" type="text" placeholder="yyyy-mm-dd" name="contract_to" />
                            </label>
                        </div><!--lineCalendars-->
                    </div><!--calendars-->
                    <div class="filesCountries">
                        <div id="budgetContractHouse">
                            <p>Budget</p>
                            <!--
                            <input type="file" id="budgetContractHouse" class="mediumInput" name="contract_budget" />
                            <span class="button hide" id="updateContractnHouse">Update</span>
                            -->
                            <div class="createContainer">
                                <input type="file" class="mediumInput" name="contract_budget" />
                            </div>


                            <div class="fileContainer hide">
                                <div class="viewContainer">
                                    <a class="buttonSmall" href="#" target="_blank">View</a>
                                </div>

                                <div class="approveContainer">
                                    <p>Approve</p>
                                    <input type="checkbox" name="contract_budget_approved" class="approve" />
                                </div>
                                <div class="updateContainer">
                                    <input type="file" class="mediumInput" name="contract_budget_update" />
                                    <a class="buttonSmall hide">Update</a>
                                </div>
                            </div>
                        </div>

                        <div id="contractContractHouse">
                            <p>Contract</p>
                            <input type="file" id="contractContractHouse" class="mediumInput" name="contract_contract" />
                            <span class="button hide" id="updateContractContractHouse">Update</span>
                        </div>
                    </div><!--filesCountries-->
                </div><!--countryBox-->

                <div id="musicHouse" class="countryBox left">
                    <h3>
                        Music House
                    </h3>
                    <input type="text" class="longInput formInput" id="nameProductionHouse" name="music_email" placeholder="musicHouse@email.com" />

                    <div class="calendars">
                        <div class="lineCalendars">
                            <label>
                                <p>From</p>
                                <input id="fromProductionHouse" class="dateStyle" type="text" placeholder="yyyy-mm-dd" name="music_from" />
                            </label>

                            <label>
                                <p class="secondInput">To</p>
                                <input id="toProductionHouse" class="dateStyle right" type="text" placeholder="yyyy-mm-dd" name="music_to" />
                            </label>
                        </div><!--lineCalendars-->
                    </div><!--calendars-->
                    <div class="filesCountries">
                        <div id="budgetMusicHouse">
                            <p>Budget</p>

                            <div class="createContainer">
                                <input type="file" class="mediumInput" name="music_budget" />
                            </div>

                            <div class="fileContainer hide">
                                <div class="viewContainer">
                                    <a class="buttonSmall" href="#" target="_blank">View</a>
                                </div>

                                <div class="approveContainer">
                                    <p>Approve</p>
                                    <input type="checkbox" name="music_budget_approved" class="approve" />
                                </div>
                                <div class="updateContainer">
                                    <input type="file" class="mediumInput" name="music_budget_update" />
                                    <a class="buttonSmall hide">Update</a>
                                </div>
                            </div>
                        </div>

                        <div id="contractMusicHouse">
                            <p>Contract</p>

                            <div class="createContainer">
                                <input type="file" class="mediumInput" name="music_contract" />
                            </div>

                            <div class="fileContainer hide">
                                <div class="viewContainer">
                                    <a class="buttonSmall" href="#" target="_blank">View</a>
                                </div>

                                <div class="approveContainer">
                                    <p>Approve</p>
                                    <input type="checkbox" name="music_contract_approved" class="approve" />
                                </div>
                                <div class="updateContainer">
                                    <input type="file" class="mediumInput" name="music_contract_update" />
                                    <a class="buttonSmall hide">Update</a>
                                </div>
                            </div>
                        </div>

                    </div><!--filesCountries-->
                </div><!--countryBox-->

                <div id="others" class="countryBox right">
                    <h3>
                        Others
                    </h3>
                    <input type="text" class="longInput formInput" id="nameOthers" name="others_email" placeholder="others@email.com" />

                    <div class="calendars">
                        <div class="lineCalendars">
                            <label>
                                <p>From</p>
                                <input id="fromOthers" class="dateStyle" type="text" placeholder="yyyy-mm-dd" name="others_from" />
                            </label>

                            <label>
                                <p class="secondInput">To</p>
                                <input id="toOthers" class="dateStyle right" type="text" placeholder="yyyy-mm-dd" name="others_to" />
                            </label>
                        </div><!--lineCalendars-->
                    </div><!--calendars-->
                    <div class="filesCountries">
                        <div id="budgetOthersHouse">
                            <p>Budget</p>

                            <div class="createContainer">
                                <input type="file" class="mediumInput" name="others_budget" />
                            </div>

                            <div class="fileContainer hide">
                                <div class="viewContainer">
                                    <a class="buttonSmall" href="#" target="_blank">View</a>
                                </div>

                                <div class="approveContainer">
                                    <p>Approve</p>
                                    <input type="checkbox" name="others_budget_approved" class="approve" />
                                </div>
                                <div class="updateContainer">
                                    <input type="file" class="mediumInput" name="others_budget_update" />
                                    <a class="buttonSmall hide">Update</a>
                                </div>
                            </div>
                        </div>

                        <div id="contractOthersHouse">
                            <p>Contract</p>

                            <div class="createContainer">
                                <input type="file" class="mediumInput" name="others_contract" />
                            </div>

                            <div class="fileContainer hide">
                                <div class="viewContainer">
                                    <a class="buttonSmall" href="#" target="_blank">View</a>
                                </div>

                                <div class="approveContainer">
                                    <p>Approve</p>
                                    <input type="checkbox" name="others_contract_approved" class="approve" />
                                </div>
                                <div class="updateContainer">
                                    <input type="file" class="mediumInput" name="others_contract_update" />
                                    <a class="buttonSmall hide">Update</a>
                                </div>
                            </div>
                        </div>

                    </div><!--filesCountries-->
                </div><!--countryBox-->

            </div><!--detailCountries-->

            <div class="actionRightsButtons">
                <span class="button" id="createCountriesButton">Create</span>
                <span class="button" id="cancelCountriesButton">Cancel</span>
            </div>

        </form>
    </div><!--countriesFormContainer-->

</div>
<!--countriesRights-->