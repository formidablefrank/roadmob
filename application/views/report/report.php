
<div id="main-nav-container" class="grid-container">
    <div id="main-nav" class="grid-90 prefix-5 tablet-grid-90 tablet-prefix-5 mobile-grid-90 mobile-prefix-5">
        <ul id="brand-logo">
            <li><a href="<?php echo site_url();?>"><img id="road-mob-logo-main" style="width:60px !important" src="<?php echo base_url('assets/images/road-mob-logo.png');?>"></img></a></li>
        </ul>
        <ul id="main-menu">
            <li><a href="<?php echo site_url()?>">Back to Main Site</a></li>
        </ul>
    </div>
</div>
<div class="jumbotron uk-vertical-align uk-text-center uk-height-1-1" >

    <div class="uk-vertical-align-middle" style="margin-top:70px; margin-bottom:50px;">


    
    <form style="font-size:16px;line-height:32px;" action="acceptReport" id="results-form" class="uk-form uk-panel uk-panel-box" method="post">
        <h1 style="font-weight:bold">Create a Report</h1>
        <fieldset data-uk-margin>
            <div class="uk-form-row" >
                <div style="display:block;position:relative">
                <input name="plate_number" type="text" data-bind="valueUpdate: 'input', value:to_search, event:{focus:resetInput, blur:validateOnBlur}" class="uk-width-1-1 uk-form-large" placeholder="Type Plate Number"></input>
                </div>
            </div>
          
            <div class="uk-form-row">
                <input id="autocomplete" type="text" class="uk-width-1-1 uk-form-large" name="location" placeholder="Location" onFocus="geolocate()"></br>
            </div>
            

            <div>
              <input id="lat" type="hidden" name="lat"></input>
            </div>

             <div>
              <input id="lon" type="hidden" name="lon"></input>
            </div>
            
            
            <div class="uk-form-row">      
                <label style="text-align:left"class="uk-float-left uk-form-label uk-width-4-10" for="vehicle_list"> Vehicle Type: </label>
                
                <select class="uk-width-6-10" name="vehicle_type" id="vehicle_list">    
                    <option value="Taxi">Taxi</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Bus">Bus</option>
                    <option value="Fx">Fx</option>
                    <option value="Others">Others</option>
                </select>
                
            </div>
            
            
            <div class="uk-form-row">
                <label style="text-align:left" class="uk-float-left uk-form-label uk-width-4-10" for="incident_list"> Incident Type: </label>
                
                <select class="uk-width-6-10" name="incident_type" id="incident_list">    
                    <option value="Theft">Theft</option>
                    <option value="Overcharging">Overcharging</option>
                    <option value="Violation of Traffic Laws">Violation of Traffic Laws</option>
                    <option value="Harassment">Harassment</option>
                </select>
            </div>
            
            <div class="uk-form-row">
                <label style="text-align:left" class="uk-float-left uk-form-label uk-width-4-10" for="date_incident"> Date of Incident: </label>
                <input class="uk-width-6-10" name="date_incident" type="date">
            </div>
            
            
            
            <div class="uk-form-row" style="text-align:left"> 
                <label  class="uk-width-1-1"> Description/Comments: </label>
                <textarea class="uk-width-1-1 uk-form-large" cols="20" rows="5" placeholder="Give a more detailed description of the incident..." name="description"></textarea>
            </div>
            
            
            
            <input type="submit" class="btn uk-width-1-1 btn-green" data-href="<?php echo site_url('search')?>" data-bind="click:search"></input>
            
            
        </fieldset>

    </form>
    
    
   

    </div>

</div>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/results.ko.js"></script>
<script>
    
    $(function(){
        var resultsModel = new ResultsModel();
        ko.applyBindings(resultsModel, document.getElementById('results-form'));

    });

</script>

<?php $this->load->view('includes/footer'); ?>

