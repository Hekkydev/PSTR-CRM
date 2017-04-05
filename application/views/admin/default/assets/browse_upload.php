
<div class="row" style="margin-left:10%;">
  <?php if (!empty($asset)): ?>
    <?php foreach ($asset as $asset): ?>
        <div class="col-lg-2" style="background:#FFF; padding:5px; margin:5px;">
          <img src="<?php echo base_url().$asset->path ?>" class="img-responsive" style="margin-bottom:5px;">
		  <a class="btn btn-default btn-xs btn-block" onclick="get_link('<?php echo $asset->id; ?>')">link</a>
		  <a class="btn btn-primary btn-xs btn-block" onclick="remove('<?php echo $asset->id; ?>')">Remove</a>
        </div>
    <?php endforeach; ?>
	
	
  <?php endif; ?>
</div>

<?php if($current_page > 1):?>
<a href="javascript:browseAsset(<?php echo $current_page-1?>)" class="pull-left btn btn-primary">Prev</a>
<?php endif;?>
<?php if($current_page < $total_pages):?>
<a href="javascript:browseAsset(<?php echo $current_page+1?>)" class="pull-right btn btn-primary">Next</a>
<?php endif;?>


