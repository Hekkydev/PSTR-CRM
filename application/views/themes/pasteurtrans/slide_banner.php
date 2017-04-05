<?php if($this->general->get_slider() == TRUE ):?>

<section id="banner">
    <div class="container-fluid">
        <div class="row">
            <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:550px;">
                <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:550px;height:550px;">
                    <ul>
                      
                      <?php foreach($this->general->get_slider() as $slider):?>
                        <!-- SLIDE  1-->
                        <li data-transition="slideoverright" data-slotamount="7" data-masterspeed="300" data-thumb="<?php echo $slider->path; ?>" data-saveperformance="off" data-title="Slide">
                            <!-- MAIN IMAGE -->
                            <img src="<?php echo $slider->path; ?>" alt="portfolio-6-1140x760" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                            <!-- LAYERS -->
                             <!--LAYER NR. 1-->
                            <div class="tp-caption large_bold_black sft tp-resizeme" data-x="88" data-y="100" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;"><?php echo $slider->title_small; ?>
                            </div> 

                             <!--LAYER NR. 3-->
                            <div class="tp-caption smalltext sfr tp-resizeme" data-x="88" data-y="170" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;"><?php echo $slider->title_large; ?>
                            </div> 
                             <!--LAYER NR. 3-->
                            <div class="tp-caption medium_text sfr tp-resizeme" data-x="88" data-y="280" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
                            <div style="width:500px;margin-top:10px;"><?php echo $this->general->cutText(strip_tags($slider->description),16);?>.</div>
                            </div> 
                             <!--LAYER NR. 2 -->
                            <div class="tp-caption medium_text sfb tp-resizeme" data-x="88" data-y="380" data-speed="300" data-start="500" data-easing="Sine.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap; margin-right:15px;"><a href='index.html#' class='sppb-btn sppb-btn-default sppb-btn-'><?php echo $slider->slug_button?></a>
                            </div>
                             <!--LAYER NR. 4 -->
                            <div class="tp-caption medium_text sfb tp-resizeme" data-x="244" data-y="380" data-speed="300" data-start="500" data-easing="Sine.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap; margin-left:15px;"><a href='index.html#' class='sppb-btn sppb-btn-primary sppb-btn-'>Read more</a>
                            </div>
                        </li>
                      <?php endforeach;?>
                    </ul>
                    <div class="tp-bannertimer"></div>
                </div>

            </div>
            <!-- END REVOLUTION SLIDER -->
        </div>
    </div>
</section>
<?php endif;?>