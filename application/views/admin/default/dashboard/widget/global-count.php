 <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-primary" style="background:#723988; padding:20px;">
                                    <div class="widget-user-image">
                                        <img class="img-responsive" src="<?php echo $base_assets_url ?>svg/graphic.svg" alt="Dashboard" style="width:50px;">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username" style="color:#FFF;">Dashboard</h3>
                                    <h5 class="widget-user-desc" style="color:#FFF;">administrator</h5>
                                    </div>
                                    <div class="box-footer no-padding">
                                    <ul class="nav nav-stacked">
                                        <li><a href="<?php echo site_url('admin/posts')?>">Post Article <span class="pull-right badge bg-blue"><?php echo $dashboard_count->post; ?></span></a></li>
                                        <li><a href="<?php echo site_url('admin/categories')?>">Category <span class="pull-right badge bg-aqua"><?php echo $dashboard_count->category; ?></span></a></li>
                                        <li><a href="<?php echo site_url('admin/pages')?>">Static Pages <span class="pull-right badge bg-green"><?php echo $dashboard_count->pages; ?></span></a></li>
                                    </ul>
                                    </div>
                                </div>
                                <!-- /.widget-user -->