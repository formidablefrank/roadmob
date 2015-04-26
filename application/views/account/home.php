
<div id="main-banner" class="grid-container">
    <div id="jumbotron">
        <a class="back-to-top" href="#main-banner"></a>
        <img id="road-mob-logo-main" width="240px;" src="<?php echo base_url('assets/images/road-mob-logo.png');?>"></img>
        <p style="font-weight:bold">Road and ride safety is our priority.</p>
        <p style="margin-top:0px;margin-bottom:15px; padding:0px 15px; ">A crowdsourcing platform for reporting abusive and irresponsible PUV drivers</p>
       

        <div style="padding:20px 0px;padding-bottom:70px; margin:20px 0px;margin-bottom:0px;background:#607378;position:relative">

        <p style="color:#fff;padding:10px 10px;">Submit or check reports on taxis, buses, jeepneys and other PUVs</p>
        <div style="display:inline-block;position:relative" class="submit-box">
            <button onclick="location.href='<?php echo site_url('home/showForm');?>'" class="submit-report">Submit a Report</button>
        </div>
        <div style="display:inline-block;position:relative">
        <input name="plate_number" type="text" data-bind="valueUpdate: 'afterkeydown',
        enterkey: search,value:to_search,event:{focus:resetInput}" class="right-bordered-radius" placeholder="Type Plate No."></input>
        </div>
        <div style="display:inline-block">
        <button id="submit-search" data-href="<?php echo site_url('search')?>" data-bind="click:search" class="btn-green left-bordered-radius">Check</button>
        </div>

        </div>
        <img class="car-moving" style="position:absolute;bottom:0px;left:15%; margin-left:-80px; "src="<?php echo base_url('assets/images/bus.png');?>"></img>
        <img class="taxi-moving" style="position:absolute;bottom:0px;left:50%; margin-left:-80px; "src="<?php echo base_url('assets/images/car.png');?>"></img>
        <img class="jeep-moving" style="position:absolute;bottom:0px;left:80%; margin-left:-80px; "src="<?php echo base_url('assets/images/jeep.png');?>"></img>
    </div>
    </div>
    <div id="recent-reports"class="padded-v big-wrapper">
        

        <div class="grid-container">
            <div class="grid-40 prefix-30 reports-inner-container">
                <div class="align-center">
                    <img width="190px;" src="<?php echo base_url('assets/images/recent-report.png');?>"></img>
                    <h2>Recent Reports</h2>
                </div>
                <?php $count=0;?>
                <?php foreach($reports as $report):?>
                <div class="report-container">

                    <div class="report-header">
                        <div class="report-plate-number">
                            <?php if($report->vehicle_type=="Taxi"):?>
                                <img width="60px" class="vehicle-icon" src="<?php echo base_url('assets/images/taxi-icon.png');?>"></img>
                            <?php elseif($report->vehicle_type=="Bus"):?>
                                <img width="60px" class="vehicle-icon" src="<?php echo base_url('assets/images/bus-icon.png');?>"></img>
                            <?php elseif($report->vehicle_type=="Jeep"):?>
                                <img width="60px" class="vehicle-icon" src="<?php echo base_url('assets/images/jeepney-icon.png');?>"></img>
                            <?php endif?>
                        <a href="<?php echo site_url('search?plate_number=').$report->plate_number;?>"><?php echo $report->plate_number?></a></div>

                    </div>
                    <div class="report-content">
                        <p class="report-location"><i class="fa fa-map-marker"></i> <?php echo $report->location?></p>
                        <p><?php echo $report->description?></p>
                          <div class="report-time">
                            <?php $time=strtotime($report->date_incident);
                            echo date('D M d, Y ',$time); ?>
                        </div>
                    </div>
                    <div class="report-tags">
                        <li><?php echo $report->incident_type;?></li>
                    </div>


                </div>
                <?php if($count<sizeof($reports)-1):?>
                <div class="report-divider">
                </div>
                <?php endif?>
                <?php $count=$count+1;?>
                <?php endforeach?>
            </div>

        </div>
    </div>
     <div id="trend"class="big-wrapper">
        <?php $this->load->view('account/map'); ?>

    </div>
</div>
<div id="signup-modal" class="uk-modal" >

    <div class="uk-modal-dialog">

        <a class="btn btn-block btn-social btn-facebook" id="fbLogin">
            <i class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;&nbsp;Sign up with Facebook
        </a>
        <p id="or"><span class="horz-center">OR</span></p>
        <a class="btn btn-block btn-social btn-email" href="homepage/viewmap/1">
            <i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp;Sign up with Email
        </a>

        <p id="already-member-link"class="align-left">Already a member? <a>Log in</a> </p>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/search.ko.js"></script>
<script>

    $(function(){
        var searchModel = new SearchModel();
        ko.applyBindings(searchModel, document.getElementById('main-banner'));
        $('a').click(function(){
            $('html, body').animate({
                scrollTop: $( $.attr(this, 'href') ).offset().top
            }, 500);
            return false;
        });

        $(window).scroll(function(){
            if($(window).scrollTop()>400){
                $("a.back-to-top").css('opacity','1');
            }else{
                $("a.back-to-top").css('opacity','0');
            }
        })

    });

</script>