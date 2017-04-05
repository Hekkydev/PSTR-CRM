<div class="row">
    <div class="col-md-12">
         <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit slider</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/slider/update')?>" method="post">
                <input type="hidden" name="id" value="<?php echo $slider['id_slider_posts']?>">
                <div class="box-body">
                    <?php echo message_box(validation_errors(),'danger'); ?>
                   
                   <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                        <label for="post_name">Title slider <small>(small title)</small></label>
                        <input type="text" name="title_small" class="form-control" id="title_small" placeholder="Title" value="<?php echo set_value('title_small', isset($slider['title_small']) ? $slider['title_small'] : '') ?>" required>
                    </div>
                     <div class="form-group">
                        <label for="post_name">Subject Title  <small>(large title)</small></label>
                        <input type="text" name="title_large" class="form-control" id="title_large" placeholder="Title" value="<?php echo set_value('title_large', isset($slider['title_large']) ? $slider['title_large'] : '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="post_name">Create Links  <small>(url description)</small></label>
                        <input type="text" name="link_url" class="form-control" id="link_url" placeholder="Title" value="<?php echo set_value('title_small', isset($slider['title_small']) ? $slider['title_small'] : '') ?>" required>
                    </div>
                   <div class="form-group">
                        <label for="post_body">Body</label>
                        <textarea name="description" class="form-control txteditor" id="post_body" placeholder="Body" rows="10"><?php echo set_value('description', isset($slider['description']) ? $slider['description'] : '') ?></textarea>
                    </div>
                    </div>
                    <div class="col-lg-3">
                    
                         <div class="form-group">
                        <label for="slider_status">Featured Image</label>
                        <input type="hidden" name="featured_image" value="<?php echo set_value('featured_image', isset($slider['path']) ? $slider['path'] : '') ?>" id="featured_image">
                        <div class="preview_featured_image">
                            <?php if(!empty($slider['path'])):?>
                                <img src="<?php echo BASE_URI.$slider['path']?>" class="img-responsive thumbnail" onclick="removeFeaturedImage()" style="width:150px;height:150px;cursor:pointer">
                            <?php endif;?>
                        </div>
                        <div class="set_featured_image">
                            <a type="button" style="cursor:pointer" class="btnShowAssets" data-toggle="modal" data-target="#assetsModal">Set Featured Image</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slider_name">Publish Date</label>
                        <input type="text" name="published_at" class="form-control datepicker"  data-date-format="yyyy-mm-dd" id="slider_name" placeholder="Publish Date" value="<?php echo set_value('published_at', isset($slider['created']) ? $slider['created'] : '') ?>">
                    </div>
                      <div class="form-group">
                        <label for="post_name">Button Links  <small>(button name)</small></label>
                        <input type="text" name="link_button" class="form-control" id="link_button" placeholder="Title" value="<?php echo set_value('link_button', isset($slider['slug_button']) ? $slider['slug_button'] : '') ?>">
                    </div>
                    <?php if($this->ion_auth->is_admin()):?>
                    <div class="form-group">
                        <label for="slider_status">Status</label>
                        <?php
                            echo form_dropdown('status',$post_status, set_value('status', isset($slider['status']) ? $slider['status'] : ''),array('class' => 'form-control'));
                        ?>
                    </div>
                    <?php endif;?>
                    </div>

                   </div>                    
                   
                    
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button> 
                    <button type="button" class="btn btn-default" onclick="javascript:history.back()">Back</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="assetsModal" tabindex="-1" role="dialog" aria-labelledby="assetsModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="assetsModalLabel">Assets Manager</h4>
      </div>
        <div class="modal-body">
            <div class="row">
            <ul class="thumbnails padding-top list-unstyled" id="assetsList">

            </ul>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
  </div>
</div>
<!-- Line Control WYSIWYG -->
<script src="<?php echo $base_assets_url;?>plugins/line_control_editor/editor.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("button:submit").click(function(){
        $('.txteditor').text($('.txteditor').Editor("getText"));
    });

    var editor = $(".txteditor").Editor();
    $('.txteditor').Editor("setText", "<?php echo !empty($slider['description']) ? addslashes($slider['description']) :'';?>");        
})
    
</script>
