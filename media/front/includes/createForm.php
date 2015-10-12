<!--createForm-->
<h2>
  Project Name
</h2>
<form action="#" id="create" name="create" method="post" class="formBig">
  <div class="cajaInputs">
    <label class="cajaForm">
      <p>
        Client
      </p>
      <input type="text" id="client" name="client" class="formInput" placeholder="Cliente" />
    </label><!--label-->
    
    <label class="cajaForm">
      <p>
        Project Name
      </p>
      <input type="text" id="project" name="project" class="formInput" placeholder="Project Name" />
    </label><!--label-->
    
    <label class="cajaForm">
      <p>
        Media
      </p>
      <input type="text" id="media" name="media" class="formInput" placeholder="Media" />
    </label><!--label-->
    
    <label class="cajaForm">
      <p>
        Client Owner
      </p>
      <input type="email" id="clientOwner" name="clientOwner" class="formInput" placeholder="client@mail.es" />
    </label><!--label-->

    <label class="cajaForm">
      <p>
        LOLA Production Owner
      </p>
      <input type="email" id="lolaProductionOwner" name="lolaProductionOwner" class="formInput" placeholder="LolaProductionOwner@hello-lola.com" />
    </label><!--label-->
    
    <label class="cajaForm">
      <p>
        LOLA Account Owner
      </p>
      <input type="email" id="lolaAccountOwner" name="lolaAccountOwner" class="formInput" placeholder="LolaAccountOwner@hello-lola.com" />
    </label><!--label-->
    <!--
    <label class="cajaForm">
      <p>
        Production House
      </p>
      <input type="text" id="productionHouse" name="productionHouse" class="formInput" placeholder="Production House" />
    </label><!--label-->
    <!--
    <label class="cajaForm">
      <p>
        Talent House
      </p>
      <input type="text" id="talentHouse" name="talentHouse" class="formInput" placeholder="Talent House" />
    </label><!--label-->
    <!--
    <label class="cajaForm">
      <p>
        Music House
      </p>
      <input type="text" id="musicHouse" name="musicHouse" class="formInput" placeholder="Music House" />
    </label><!--label-->
    <!--
    <label class="cajaForm">
      <p>
        Reference File
      </p>
      <input type="file" id="" name="mediaReference" class="fileNice" />
    </label><!--label-->
    <!--
    <label class="cajaForm">
      <p>
        Created By
      </p>
      
      <span class="readOnly">
        loremipsum@hello-lola.com on XX/XX/XXXX
      </span>
      
    </label><!--label-->
    <!--
    <label class="cajaForm">
      <p>
        Countries Rights
      </p>
      
      <ul class="countries">
        <li class="flag">
          <img src="./img/flags/fr.jpg" alt="fr" />
        </li>
        
        <li class="flag">
          <img src="./img/flags/it.jpg" alt="it" />
        </li>
        
        <li class="flag">
          <img src="./img/flags/uk.jpg" alt="uk" />
        </li>
        
        <li class="flag">
          <img src="./img/flags/pt.jpg" alt="pt" />
        </li>
        
        <li class="flag">
          <img src="./img/flags/ir.jpg" alt="ir" />
        </li>
        
        
        <li class="flag">
          <img src="./img/flags/fr.jpg" alt="fr" />
        </li>
        
        <li class="flag">
          <img src="./img/flags/it.jpg" alt="it" />
        </li>
        
        <li class="flag">
          <img src="./img/flags/uk.jpg" alt="uk" />
        </li>
        
        <li class="flag">
          <img src="./img/flags/pt.jpg" alt="pt" />
        </li>
        
        <li class="flag">
          <img src="./img/flags/ir.jpg" alt="ir" />
        </li>
      </ul>
      
      <span class="button buttonBigForm view">
        View
      </span>
      
    </label><!--label-->
    
  </div><!--cajaInputs-->

  <div class="thumbCalendars">
    <!--[START] thumbContainer tb se utiliza en listProjects.php con la misma estructura-->
    <span class="thumbContainer categoria1">
    <input type="file" id="tumbFileInput" />
    <!--
    <img src="./img/projects/project001.jpg" />
    <span class="categoria ">TVC</span>
    
    <span class="over">
     <span class="icon"></span>
    </span><!--over-->
    
   </span><!--ThumbContainer-->
   <!--[END] thumbContainer tb se utiliza en listProjects.php con la misma estructura-->
   <!--
   <div class="calendars">
    
    <div class="lineCalendars">
      <label>
        <p>
          From
        </p>
        <input id="form1" class="dateStyle" type="text" placeholder="XX/XX/XX" />
      </label>
      
      <label>
        <p>To</p>
        <input id="to1" class="dateStyle" type="text" placeholder="XX/XX/XX" />
      </label>
    </div><!--lineCalendars-->
   <!-- 
    <div class="lineCalendars">
      <label>
        <p>
          From
        </p>
        <input id="form2" class="dateStyle" type="text" placeholder="XX/XX/XX" />
      </label>
      
      <label>
        <p>To</p>
        <input id="to2" class="dateStyle" type="text" placeholder="XX/XX/XX" />
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
  
</form>
<!--createForm-->

<!--countriesRights-->
<div class="countriesRights">
  <h2>
    Countries Rights
  </h2>
  
  <span class="button" id="addCountriesButton">
    Add specific rights
    <span class="arrowWhite rightArrow"></span>
  </span>
  <div class="countriesFormContainer hide">
    <form action="#" id="formAddCountries" name="formAddCountries" method="post" class="">
      <div class="generalData">
        <label>
          <p>Country or contries</p>
          <input type="text" id="country"  class="formInput generalInputBox" />
        </label>
        <label>
          <p>Media covered</p>
          <textarea id="mediaCovered" class="formInput generalInputBox"></textarea>
        </label>
      </div><!--generalData-->
      <div class="detailsCountries">
        <div id="productionHouse" class="countryBox left">
          <h3>
            Production House
          </h3>
          <input type="text" class="longInput formInput" id="nameProductionHouse" />
          
          <div class="calendars">
            <div class="lineCalendars">
              <label>
                <p>
                  From
                </p>
                <input id="fromProductionHouse" class="dateStyle" type="text" placeholder="XX/XX/XX" />
              </label>
              
              <label>
                <p class="secondInput">To</p>
                <input id="toProductionHouse" class="dateStyle right" type="text" placeholder="XX/XX/XX" />
              </label>
            </div><!--lineCalendars-->
          </div><!--calendars-->
          <div class="filesCountries">
            <div>
              <p>
                Budget
              </p>
              <p class="fileUp pdf">
                documentoDeLaMovida.pdf <span class="icon"></span>
              </p>
              <div class="approveContainer">
                <p>
                  Approve
                </p>
                
                <input type="checkbox" id="approveContract" name="approveContract" class="approve" />
              </div>
            </div>
            
            <div>
              <p>
                Contract
              </p>
              <p class="fileUp pdf">
                documentoDeLaMovida.pdf <span class="icon"></span>
              </p>
            </div>
            
          </div><!--filesCountries-->
        </div><!--countryBox-->
        <div id="productionHouse" class="countryBox right">
          <h3>
            Production House
          </h3>
          <input type="text" class="longInput formInput" id="nameProductionHouse" />
          
          <div class="calendars">
            <div class="lineCalendars">
              <label>
                <p>
                  From
                </p>
                <input id="fromProductionHouse" class="dateStyle" type="text" placeholder="XX/XX/XX" />
              </label>
              
              <label>
                <p class="secondInput">To</p>
                <input id="toProductionHouse" class="dateStyle right" type="text" placeholder="XX/XX/XX" />
              </label>
            </div><!--lineCalendars-->
          </div><!--calendars-->
          <div class="filesCountries">
            <div>
              <p>
                Budget
              </p>
              <input type="file" id="budgetProductionHouse" class="mediumInput" />
              <span class="button" id="updateProductionHouse">
                Update
              </span>
            </div>
            
            <div>
              <p>
                Contract
              </p>
              <input type="file" id="ContractProductionHouse" class="mediumInput" />
              <span class="button" id="updateContractProductionHouse">
                Update
              </span>
            </div>
          </div><!--filesCountries-->
        </div><!--countryBox-->
        
        <div id="productionHouse" class="countryBox left">
          <h3>
            Production House
          </h3>
          <input type="text" class="longInput formInput" id="nameProductionHouse" />
          
          <div class="calendars">
            <div class="lineCalendars">
              <label>
                <p>
                  From
                </p>
                <input id="fromProductionHouse" class="dateStyle" type="text" placeholder="XX/XX/XX" />
              </label>
              
              <label>
                <p class="secondInput">To</p>
                <input id="toProductionHouse" class="dateStyle right" type="text" placeholder="XX/XX/XX" />
              </label>
            </div><!--lineCalendars-->
          </div><!--calendars-->
          <div class="filesCountries">
            <div>
              <p>
                Budget
              </p>
              <p class="fileUp pdf">
                documentoDeLaMovida.pdf <span class="icon"></span>
              </p>
              <div class="approveContainer">
                <p>
                  Approve
                </p>
                
                <span class="ok"></span>
              </div>
            </div>
            
            <div>
              <p>
                Contract
              </p>
              <p class="fileUp pdf">
                documentoDeLaMovida.pdf <span class="icon"></span>
              </p>
            </div>
            
          </div><!--filesCountries-->
        </div><!--countryBox-->
      </div><!--detailCountries-->
      <span class="button" id="createCountriesButton">
        Create
      </span>
      
    </form>
  </div><!--countriesFormContainer-->
  
</div>
<!--countriesRights-->