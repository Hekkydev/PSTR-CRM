<style>
.well{
	border-radius:0px !important;
	background-color:#ccc !important;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">File Upload</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
               <?php echo $this->session->flashdata('message');?>

               <div class="row">

                <div class="col-lg-3">

					<form method="post" action="<?php echo site_url('admin/assets/upload')?>" enctype="multipart/form-data" id="imageUploadForm" name="photo">
                                <div class="input-group">
                                     <input type="file" class="btn btn-md btn-default" name="file" placeholder="Upload file">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-md"><i class="fa fa-upload"></i>
                                        </button>
                                    </span>
                                </div>
								
								<br>
								<div class="progress" style="display:none;"><div style="width: 0%; height:50px;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" id="imageProgressBar" class="progress-bar"></div></div></div>
              
								
					</form>			

                </div>
				
               <div class="row">
                 <div class="col-lg-12">
                   <br>
				   <div class="alert-box"></div>
                   <div id="imageList" class=" well"></div>
                 </div>
               </div>



            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>




<script type="text/javascript">

$(document).ready(function(){
		load_image();
});
	
    function load_image(){
		 
	$.ajax({
          type : 'GET',
          url : SERVER + 'admin/assets/filemanager_list',
          success : function (images){
          $('#imageList').html(images);
          }
       });
	   
	   
	}
	
	function browseAsset(page)
	{
		$.ajax({
          type : 'GET',
          url : SERVER + 'admin/assets/filemanager_list',
		  data:{page:page},
          success : function (images){
          $('#imageList').html(images);
          }
       });
	}
	
	$('#imageUploadForm').on('submit',(function(e) {
		e.preventDefault();
		var formData = new FormData(this);
		var imageProgressBar = $("#imageProgressBar");
		var file_input = $('input[name=file]').val();
		
		if(file_input == null || file_input == ""){
			alert("Not File");
		}else{	
		var progress = $(".progress").show();
		$.ajax({
			type:'POST',
			url: $(this).attr('action'),
			data:formData,
			cache:false,
			contentType: false,
			processData: false,
			xhr: function(){
							var xhr = new window.XMLHttpRequest();
							//Upload progress
							xhr.upload.addEventListener("progress", function(event){
								if (event.lengthComputable) {
									var percentComplete = Math.round(event.loaded / event.total * 100);
									//Do something with upload progress
									imageProgressBar.html(percentComplete + "%").css("width", percentComplete + "%");
								}
							}, false);
							//Download progress
							xhr.addEventListener("progress", function(event){
								if (event.lengthComputable) {
									var percentComplete =  Math.round(event.loaded / event.total * 100);
									//Do something with download progress
									imageProgressBar.html(percentComplete + "%").css("width", percentComplete + "%");
								}
							}, false);
							return xhr;
			},
			beforeSend:function() {
				
				imageProgressBar.css("width", "0").html("");
			},
			success:function(image)
			{
				if(image == "error") {
								alert("It's not possible to retrieve the image.");
							} else 
							if(image == "failed") {
								alert("Image upload failed.");
							} else {		
								var image = eval("(" + image  + ")");	
								
								$('.alert-box').html("<div class = 'alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button>" + image["name"] + " successfully upload!. </div>");
								imageProgressBar.css("width", "0").html("");
								$('input[name=file]').val('');
								var progress = $(".progress").hide();
                                load_image();
							}
			},
			error: function(image){
				alert("Error in server comunication");
				var progress = $(".progress").hide();
			}
		});
		}
	}));
	
	function remove(id)
	{
		$.ajax({
          type : 'GET',
          url : SERVER + 'admin/assets/filemanager_remove?file_id='+id,
          success : function (){		  
			$('.alert-box').html("<div class = 'alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>  successfully removed!. </div>");						
			load_image();
          }
       });
	}
	
	function get_link(id)
	{
		$.ajax({
          type : 'GET',
          url : SERVER + 'admin/assets/filemanager_get_link?file_id='+id,
          success : function (result){		  
			$('.alert-box').html("<div class = 'alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button> "+result+". </div>");						
			load_image();
          }
       });
	}
</script>
