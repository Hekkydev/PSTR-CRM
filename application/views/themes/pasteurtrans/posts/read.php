<div class="col-sm-8 blog-base">
                        <div class="col-sm-12 no-padding">
                           <article class="col-sm-12 no-padding blog-block">
                                <?php if($post['featured_image'] == TRUE):?>
                                <img src="<?php echo BASE_URI.$post['featured_image'];?>" alt="" class="img-responsive">
                                <?php endif;?>
                                <div class="blog-content">
                                    <div class="icon pull-left">
                                        <i class="fa fa-thumb-tack"></i>
                                    </div>
                                    <div class="blog-info">
                                        <ul class="meta">
                                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Written by">
                                                <i class="fa fa-user"></i>Super User
                                            </li>
                                            <li>
                                                <a data-toggle="tooltip" data-placement="top" title="" href="single-blog.html#" data-original-title="Article Category">
                                                    <i class="fa fa-folder-open-o"></i>Capital</a>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Published date">
                                                <i class="fa fa-calendar-o"></i>02 February 2016
                                            </li>
                                        </ul>
                                        <h2><a href="<?php echo site_url('read/'.$post['slug']) ?>"><?php echo $post['title']?></a> </h2>
                                    </div>
                                    
                                    <?php echo $post['body']?>

                                </div>
                                <ul class="tags">
                                <?php if($this->general->getTags_find_id($post['id']) == TRUE):?>
                                    <li><span>Tags: </span></li>
                                   
                                    <?php foreach($this->general->getTags_find_id($post['id']) as $tags):?>
                                            <li><a href="<?php echo base_url().'tag/'.$tags['slug']?>" class="label label-info" rel="tag" target="_parent"><?php echo $tags['name']?></a></li>
                                    <?php endforeach;?>
                                 <?php endif;?>   
                                </ul>

                                <ul class="pager pagenav">
                                    <li class="previous">
                                        <a href="http://themecanyon.org/" rel="prev" target="_parent">
                                            <span class="icon-chevron-left"></span> Prev</a>
                                    </li>
                                    <li class="next">
                                        <a href="http://themecanyon.org/" rel="next" target="_parent">
										Next <span class="icon-chevron-right"></span></a>
                                    </li>
                                </ul>

                                
                                <div class="sp-social-share clearfix">
                                    <ul>
                                        <li>
                                            <iframe src="http://www.facebook.com/plugins/like.php?href=http://demo.themecanyon.org/brickpress/news/16-often-lost-by-deliberating&amp;layout=button_count&amp;show_faces=false&amp;width=105&amp;action=like&amp;colorscheme=light&amp;height=21"></iframe>
                                        </li>
                                        <li><a href="http://twitter.com/share" class="twitter-share-button" data-url="http://demo.themecanyon.org/brickpress/news/16-often-lost-by-deliberating" data-text="often lost by deliberating. " data-lang="en">tweet</a>
                                            <script>
                                            ! function(d, s, id) {
                                                var js, fjs = d.getElementsByTagName(s)[0];
                                                if (!d.getElementById(id)) {
                                                    js = d.createElement(s);
                                                    js.id = id;
                                                    js.src = "//platform.twitter.com/widgets.js";
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }
                                            }(document, "script", "twitter-wjs");
                                            </script>
                                        </li>
                                        <li>
                                            <div class="g-plusone" data-size="medium" data-href=""></div>
                                            <script type='text/javascript'>
                                            (function() {
                                                var po = document.createElement('script');
                                                po.type = 'text/javascript';
                                                po.async = true;
                                                po.src = '//apis.google.com/js/plusone.js';
                                                var s = document.getElementsByTagName('script')[0];
                                                s.parentNode.insertBefore(po, s);
                                            })();
                                            </script>
                                        </li>
                                        <li>
                                            <a href="http://pinterest.com/pin/create/button/?url=" class="pin-it-button"><img border="0" src="http://assets.pinterest.com/images/PinExt.png" alt="Pin It" /></a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
