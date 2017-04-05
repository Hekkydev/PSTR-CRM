<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Menus</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
               <?php echo $this->session->flashdata('message');?>
                <p><a class="btn btn-default" href="<?php echo site_url('admin/menus/add')?>">New menu</a></p>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Parent</th>
                        <th>Position</th>
                        <th>status</th>
                        <th style="width: 120px">Action</th>
                    </tr>
                    <?php if ($menus): ?>
                        <?php foreach ($menus as $menu): ?>
                            <tr>
                                <td><?php echo $menu['name']; ?></td>
                                <td><a href="<?php echo $link_site_url.'/'.$menu['url']; ?>" target="_blank"><?php echo limit_url_slug($menu['url'],25); ?></a></td>
                                <td><?php echo $menusList[$menu['parent_id']]; ?></td>
                                <td>
                                    <?php if ($this->general->isExistPrevMenu($menu['position']) == TRUE): ?>
                                        <?php echo anchor('admin/menus/up/' . $menu['position'], '<span class="btn btn-primary btn-xs"><i class="fa fa-angle-up"></i></span>') ?> 
                                    <?php else: ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php endif; ?>
                                    | 
                                    <?php if ($this->general->isExistNextMenu($menu['position']) == TRUE): ?>
                                        <?php echo anchor('admin/menus/down/' . $menu['position'], '<span class="btn btn-primary btn-xs"><i class="fa fa-angle-down"></i></span>') ?>
                                    <?php else: ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $status[$menu['status']]; ?></td>
                                <td class="actions">
                                    <a href="<?php echo site_url('admin/menus/edit/'.$menu['id'])?>"><span class="badge bg-primary">Edit</span></a>
                                    <a href="<?php echo site_url('admin/menus/delete/'.$menu['id'])?>" onclick="return confirm('Are you sure?')"><span class="badge bg-red">Delete</span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else:?>
                        <tr><td colspan="5">No record found</td></tr>
                    <?php endif; ?>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>