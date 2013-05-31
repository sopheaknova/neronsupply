<?php
	// Load product information meta box
	require_once (TEMPLATEPATH . '/includes/product-meta-box.php');	
	
	//insert number of people view product
	
	#SET TIMEZONE OFFSET (UTC/GMT).  To know your timezone, visit http://www.timeanddate.com/worldclock/ and click on the appropriate city.  If you live in the Philippines, the offset is +8.
	$OFFSET = 0;
	#If you wish to exclude posts or pages from being tracked, type the post/page id's below, separated by comma (,). Example: $EXCLUDE = "1,2,3,4,5";
	$EXCLUDE = '';
	
	
	$table_name = $wpdb->prefix . "cp_ad_pop_daily";
	$table_name_all = $wpdb->prefix . "cp_ad_pop_total";
	$table_posts = $wpdb->prefix . "posts";
	$exc = $EXCLUDE ? explode(",", $EXCLUDE) : 0;
	
	
	function cp_ad_views_today($postnum, $visited, $times, $sofar, $unique, $show) {
		global $wpdb;
		global $table_name_all;
		global $EXCLUDE;
		$viewed = '';
	
		if ($unique) {
			$viewed = cp_has_viewed($postnum,1);
		}
		$checkpost = $wpdb->get_row("SELECT id, postnum, postcount FROM $table_name_all WHERE postnum = '$postnum'");
		$postid = $checkpost->id;
		$postnumb = $checkpost->postnum;
		$postcount = $checkpost->postcount;
		$excludepost = $EXCLUDE ? cp_excheck($postnumb) : 0;
	
		if ($excludepost != 1) {
			if (!$postid) {
				$wpdb->query("INSERT INTO $table_name_all (postnum, postcount) VALUES ($postnum, 1)");
				$show_overall = __('Visited 1 time', 'cp');
				$show_today = cp_todays_count($postnum, $unique);
			}
			else {
				if (!$viewed) {
					$wpdb->query("UPDATE $table_name_all SET postcount = postcount+1 WHERE postnum = '$postnum'");
					$postcount_ap = $postcount+1;
				} else {
					$postcount_ap = $postcount;
				}
				$show_today = cp_todays_count($postnum, $unique);
				if ($postcount_ap>0) {
					$show_overall = "$visited $postcount_ap $times";
					if ($show_today) {
						$show_overall .= ", $show_today $sofar";
					}
				}
			}
			if ($show != 'noshow') {
				echo $show_overall;
			}
		}
	}
	
	function cp_todays_date() {
		global $OFFSET;
		$format = 'Y-m-d';
		if ($OFFSET) {
			$nowtime = gmdate($format, time() + 3600*$OFFSET);
		} else {
			$nowtime = date_i18n($format, time());
		}
		return $nowtime;
	}
	
	function cp_has_viewed($postno, $all) {
		if ($all == 1) {
			$temp = explode("&", $_SESSION["a"]);
			if(!in_array($postno, $temp)) {
				$_SESSION["a"] .= $postno."&";
				return 0;
			} else {
				return 1;
			}
		}
	   else if ($all == 2) {
	   $temp = explode("&", $_SESSION["n"]);
			if(!in_array($postno, $temp)){
			$_SESSION["n"] .= $postno."&";
			return 0;
			} else {
			return 1;
		}
	   }
	}
	
	function cp_excheck($postno) {
		global $exc;
		if (is_array($exc)) {
			if (in_array($postno,$exc)) {
				return 1;
			}
		}
	}
	
	function cp_excql() {
		global $exc;
		if (is_array($exc)) {
			foreach ($exc as $chomp) {
				$sqland .= "and postnum != '$chomp'";
			}
			return $sqland;
		}
	}
	
	function cp_todays_count($postnum, $unique) {
		global $wpdb;
		global $table_name;
		global $EXCLUDE;
		$viewed = '';
	
		if ($unique) {
			$viewed = cp_has_viewed($postnum,2);
		}
		$nowisnow = cp_todays_date();
		$checkpost = $wpdb->get_row("SELECT id, postnum, time, postcount FROM $table_name WHERE postnum = '$postnum'");
		$postid = $checkpost->id;
		$postnumb = $checkpost->postnum;
		$posttime = $checkpost->time;
		$postcount = $checkpost->postcount;
		$excludepost = $EXCLUDE ? cp_excheck($postnumb) : 0;
	
		if ($excludepost != 1) {
			if (!$postid) {
				$wpdb->query("INSERT INTO $table_name (time, postnum, postcount) VALUES ('$nowisnow', $postnum, 1)");
			}
			else if ($posttime == $nowisnow) {
				if (!$viewed) {
					$wpdb->query("UPDATE $table_name SET postcount = postcount+1, time = '$nowisnow'	WHERE postnum = '$postnum'");
				}
			}
			else {
				if (!$viewed) {
					$wpdb->query("UPDATE $table_name SET postcount = 1, time = '$nowisnow'	WHERE postnum = '$postnum'");
				}
			}
			$post_c = $wpdb->get_var("SELECT postcount FROM $table_name WHERE postnum = '$postnum'");
			return $post_c;
		}
	}
	
	
	//Register Thickbox for uploading Image 
	function my_admin_scripts() {
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_register_script('my-upload', get_bloginfo('template_url') . '/js/my-scripts.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('my-upload');
	}
	function my_admin_styles() {
		wp_enqueue_style('thickbox');
	}
	add_action('admin_print_scripts', 'my_admin_scripts');
	add_action('admin_print_styles', 'my_admin_styles');
	 
	//limited the title character
	function limit_title_word($title){
		$max_len = 18;
		$len_title = strlen($title);
		if ($len_title >= $max_len) {
			echo substr($title, 0, $max_len) . '...'; 
		} else {
			echo $title;
		}
		
	}
	
	//limited the product code character
	function limit_code_num($code){
		$max_len = 20;
		$len_code = strlen($code);
		if ($len_code >= $max_len) {
			echo substr($code, 0, $max_len) . '...'; 
		} else {
			echo $code;
		}
		
	}
	
	//Check product item is in stock or not
	function get_instock($item){
		if ( $item == '' ) {
			echo '';
		} else {
			
			if ( strtolower($item) == 'no' ) {
				echo 'In Stock: <strong class="red">' . ucfirst($item) . '</strong>';
			} else {
				echo 'In Stock: <strong class="green">' . ucfirst($item) . '</strong>';
			}
		}
	}
	
	//Check Prodcut price is set or not
	function get_price_items($price){
		if( $price == '' ) {
			echo '&nbsp;';
		} else {
			echo 'Price:<span class="prices"> ' . $price . '</span><br />' ;
		}
	}
	
	//Check Original Prodcut price is set or not
	function get_original_price_items($org_price){
		if( $org_price == '' ) {
			echo '&nbsp;';
		} else {
			echo 'Original: <span class="prices">' . $org_price . '</span>';
		}
	}
	
?>
