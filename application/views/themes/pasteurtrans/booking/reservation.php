<style>
@import url('https://fonts.googleapis.com/css?family=Josefin+Sans');

.title-booking{
font-family: 'Josefin Sans', sans-serif;
font-weight:300;
color:#FFF;
}
.form-reservation{
    margin-bottom:30px;
}
select.form-control{
    background:#FFF;
    border-radius:1px;
    cursor:pointer;
}

.btn.btn-primary-search{
    border-radius:1px !important;
    background:#723988;
    color:#fff;
    border:1px solid #fff;
}

.btn.btn-primary-search :hover{
    background:#FF9900 !important;
    color:#fff;
}

.label-form{
    font-family: 'Josefin Sans', sans-serif;
    color:white;
}


  @media only screen and (max-width:768px){
      #img-shuttle{
          display:none;
      }
 }
</style>
<div class="col-lg-12">

        <div class="row form-reservation">
            <div class="col-lg-6" style="padding:5px;">
                <h3 class="title-booking">Online Booking Shuttle Tiket</h3>

                <div class="row">
                    <div class="col-lg-6" style="margin:0px" >    
                        <div class="form-group">
                            <p class="label-form">Keberangkatan: </p>
                            <select class="form-control">

                                <option> Pilih Kota</option>
                                <?php foreach($kota as $kota):?>

                                    <?php if($this->reservation->get_find_cabang($kota->uuid_kota) == TRUE):?>
                                        <optgroup label="<?php echo $kota->nama_kota;?>">
                                            <?php foreach($this->reservation->get_find_cabang($kota->uuid_kota) as $cabang ):?>

                                                    <option><?php echo $cabang->nama_cabang;?></option>

                                            <?php endforeach;?>
                                        </optgroup>
                                      <?php endif;?>  

                                <?php endforeach;?>
                            </select>    

                        </div>
                       
                   </div>  
                   <div class="col-lg-6">    
                        <div class="form-group">
                            <p  class="label-form">Kedatangan: </p>
                            <select class="form-control">

                                <option> Pilih Tujuan</option>

                            </select>    

                        </div>
                   </div>  
                  </div> 

                  <div class="row">
                    <div class="col-lg-6" style="margin:0px">    
                        <div class="form-group">
                            <p  class="label-form">Tanggal Berangkat: </p>
                            <select class="form-control">

                               
                            </select>    

                        </div>
                       
                   </div>  
                   <div class="col-lg-6">    
                        <div class="form-group">
                            <p  class="label-form">Tanggal Kembali: </p>
                            <select class="form-control">

                                <option> Pilih Tujuan</option>

                            </select>    

                        </div>
                   </div>  
                  </div> 


                   <div class="row">
                     <div class="col-lg-offset-6 col-lg-6">
                        <button class="btn btn-primary-search btn-md pull-right"><i class="fa fa-search"></i> Cari Keberangkatan</button>     
                    </div>    

                   </div>    

            </div> 
            <div class="col-lg-6" align="center" id="img-shuttle"><img  class="img-responsive" src="<?php echo $base_assets_url ; ?>/images/online-booking-shuttle.jpg" style="width:500px;"></div> 
        </div>    

</div>
