<div id="main-nav-container" class="grid-container">
    <div id="main-nav" class="grid-90 prefix-5 tablet-grid-90 tablet-prefix-5 mobile-grid-90 mobile-prefix-5">
    
        <ul id="main-menu">
            <li><a href="<?php echo site_url()?>">Back to Main Site</a></li>
        </ul>
    </div>
</div>

<div class="uk-vertical-align uk-text-center uk-height-1-1">

    <div class="uk-vertical-align-middle" >
        <div id="home-recent-reports"class="padded-v big-wrapper">
        <div class="align-center">
            <h2>Reports Matching Your Search</h2>
        </div>
        <div class="grid-container search-results">
                <?php $count=0;?>
                <?php foreach($results as $report):?>
                <div class="report-container">

                    <?php if($count==0):?>

                    <div class="report-header">
                        <div class="report-plate-number">
                            <style>
                                .vehicle-icon{
                                    position: relative;
                                    display: inline-block;
                                }
                            </style>
                            <?php if($report->vehicle_type=="Taxi"):?>
                                <img width="60px" class="vehicle-icon"src="<?php echo base_url('assets/images/taxi-icon.png');?>"></img>
                            <?php elseif($report->vehicle_type=="Bus"):?>
                                <img width="60px" class="vehicle-icon" src="<?php echo base_url('assets/images/bus-icon.png');?>"></img>
                            <?php elseif($report->vehicle_type=="Jeep"):?>
                                <img width="60px" class="vehicle-icon" src="<?php echo base_url('assets/images/jeepney-icon.png');?>"></img>
                            <?php endif?>  <br>
                        <?php echo $report->plate_number?></div>
                        
                    </div>
                    <?php endif?>
                    <div class="report-content">
                        <br>
                        <div class="report-tags">
                            <li><?php echo $report->incident_type;?></li>
                        </div>
                        <p class="report-location" style="padding-right:0px"><?php $time=strtotime($report->date_incident); 
                            echo date('D M d, Y ',$time); ?><br>
                            <i class="fa fa-map-marker"></i> <?php echo $report->location?> </p>
                       
                        <p><?php echo $report->description?></p>
                          
                         
                    </div>
                   


                </div>
                <?php if($count<sizeof($results)-1):?>
                <div class="report-divider">
                </div>
                <?php endif?>
                <?php $count=$count+1;?>
                <?php endforeach?>
                    <div class="align-center">
                        <div
                            class="fb-like"
                            data-send="true"
                            data-width="200"
                            data-show-faces="true">
                        </div>
                    </div>
                </div>

        </div>
    </div>
   </div>
</div>

