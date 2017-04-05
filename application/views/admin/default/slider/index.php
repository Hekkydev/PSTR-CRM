<div class="row">
	<div class="col-md-12">
		<div class="box">
            <div class="box-header">
                <h3 class="box-title">Slider</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            	<?php echo $this->session->flashdata('message');?>
            	<p><a class="btn btn-default" href="<?php echo site_url('admin/slider/add')?>">Upload Slider</a></p>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                         <th style="width: 120px">Image</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Published</th>
                        <th>Status</th>
                       
                        <th style="width: 100px">Action</th>
                    </tr>
                  <tbody>
                  
                  <?php $no=1; foreach($slider as $s):?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
                                <div style="background:#ddd; padding:5px;"><img class="img-responsive" src="<?php echo base_url().$s->path?>" style="width:100px;"></div>
                             </td>
                            <td><?php echo $s->title_small; ?></td>
                            <td><?php echo $s->title_large; ?></td>
                            <td><?php echo $s->created; ?></td>
                            <td><?php echo $post_status[$s->status]?></td>
                             
                             <td>
                             <a class="btn btn-xs btn-primary" href="<?php echo site_url('admin/slider/edit/'.$s->id_slider_posts.'') ?>"><i class="fa fa-edit"></i></a>
                             <a class="btn btn-xs btn-warning" href="<?php echo site_url('admin/slider/remove?sid='.$s->id_slider_posts.''); ?>"><i class="fa fa-trash-o"></i></a>
                             </td>
                        </tr>
                  <?php $no++; endforeach;?>
                  </tbody>
                </table>
            </div><!-- /.box-body -->
             <div class="box-footer clearfix">
                <?php echo $pagination ?>
            </div>
        </div><!-- /.box -->
	</div>
</div>