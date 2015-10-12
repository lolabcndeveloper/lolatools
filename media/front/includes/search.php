<!--search-->
<h2>
  Search
</h2>
<form action="#" id="search" name="search" method="post" class="formStyle">
  
  <select id="clientSelect" name="client" tabindex="1">
    <option value="client">Client</option>
    <option value=""></option>
  </select>
  
  <select id="mediaSelect" name="media" tabindex="2">
    <option value="media">Media</option>
    <option value=""></option>
  </select>
  
  <input type="text" placeholder="Keyword" />
  
  <div class="calendars">
    
    <div class="lineCalendars">
      <label>
        <p>
          From
        </p>
        <input id="form1" class="dateStyle" type="text" placeholder="XX/XX/XX" />
      </label>
      
      <label>
        <p class="secondInput">To</p>
        <input id="to1" class="dateStyle" type="text" placeholder="XX/XX/XX" />
      </label>
    </div><!--lineCalendars-->

   </div><!--calendars-->

  <span class="button search">
    SEARCH
  </span>
  
</form>
<!--search-->