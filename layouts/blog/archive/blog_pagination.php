<div class="clearfix"></div>
<?php
$range = 2;
global $paged;
$pages = '';
               $showitems = ($range * 2)+1;
                if(empty($paged)) {
                    $paged = 1;
                }

                if($pages == '') {
                    global $wp_query;
                    $pages = $wp_query->max_num_pages;
                    if(!$pages) {
                        $pages = 1;
                    }
                }

                $extraClass = "";
                $output = "";
                if(1 != $pages) {
                    $output.= '<div class="text-center '.$extraClass.'"><ul class="post-navigation pagination">';
                    $output.= ($paged > 1 )? '<li><a href="' . get_pagenum_link($paged - 1) . '">&lsaquo;</a></li>' : '<li class="disabled"><a>&lsaquo;</a></li>';

                    for($i=1; $i <= $pages; $i++) {
                        if(1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                            $output.= ($paged == $i) ? '<li class="active"><span class="current">' . $i . '</span></li>' : '<li><a href="' . get_pagenum_link($i) . '" class="inactive">' . $i . '</a></li>';
                        }
                    }

                    $output.= ($paged < $pages)? "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>": "<li class='disabled'><a>&rsaquo;</a></li>";
                    $output.= "</ul></div>\n";
                }
echo $output;