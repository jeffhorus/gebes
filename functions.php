<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Home right sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}
function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

function get_daftar_pemain($idtim, $jenkel){
	global $wpdb;
	$result = $wpdb->get_results("SELECT Nama_Pemain, NIM FROM pemain_" . $jenkel . " WHERE Nama_Team='" . $idtim . "'", ARRAY_A);
		
	echo "
	<table class='pemain'>
	<tr>
	<th>Nama Pemain</th>
	<th>NIM</th>
	</tr>";
	
	foreach ($result as $row) {
		# code...
	//}($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . "<a href='" . get_home_url() . "/player?nim=" . $row['NIM'] . "&jenkel=" . $jenkel . "'>" . $row['Nama_Pemain'] . "</a></td>";
		echo "<td>" . "<a href='" . get_home_url() . "/player?nim=" . $row['NIM'] . "&jenkel=" . $jenkel . "'>" . $row['NIM'] . "</a></td>";
		echo "</tr>";
	}
	
	echo "</table>";
}

function digits_to_letters($input) {
    return strtr($input, "0123456789", "ABCDEFGHIJ");
}

function get_classment($argjenkel, $argdivisi, $argpool, $type) {
	$divisi="";
	$jenkel="";
	if(endsWith($argjenkel,'cowo')){
		$divisi .= " Divisi=" . $argdivisi . " AND ";
		$jenkel = "cowo";
	}
	else $jenkel = "cewe";
	echo PHP_EOL."<table class='klasemen'>
	<tr>
	<th>Peringkat</th>
	<th>Himpunan</th>";
	if($type == 2){
		echo "<th>Main</th><th>Menang</th><th>Kalah</th><th>GA</th><th>GF</th>";
	}
	echo "<th>Poin</th>
	</tr>";
	
	$i = 1;

	$sql = "SELECT * FROM " . $argjenkel . " WHERE " . $divisi . " Grup=" . $argpool . " ORDER BY Points DESC";
	global $wpdb;
	$results = $wpdb->get_results($sql) or die(mysql_error());    
	if (count($results) > 0) {
	    $display_row = null;
	    foreach ($results as $res) {
			echo "<tr";
			if($i==1) echo " class='peringkat".$i."'";
			else if($i==2 && $argdivisi==1) echo " class='peringkat".$i."'";
			echo ">";
			echo "<td>" . $i . "</td>";
			echo "<td>" . "<a href='" . get_home_url() . "/team?idteam=" . $res->Nama_Team . "&jenkel=" . $argjenkel . "'>" . $res->Nama_Team . "</a></td>";
			if($type == 2){
				echo "<td>" . $res->Games . "</td>";
				echo "<td>" . $res->Win . "</td>";
				echo "<td>" . $res->Lose . "</td>";
				echo "<td>" . $res->GA . "</td>";
				echo "<td>" . $res->GF . "</td>";
			}
			echo "<td>" . $res->Points . "</td>";
			echo "</tr>";
			$i++;
		}
	}
	
	echo "</table>";
}

function get_simple_classment($isclass){
	//COWOK
	?>
    <div class="over">
    <table id="klasementabel1">
        <tr>
            <td>
            	<?php 
            		$style = 'style="font-weight:900; background-color:#fd0000;"';
            		if(isset($_GET['grup']) && isset($_GET['jenkel']) && isset($_GET['divisi']))
            		{
            			if($_GET['jenkel']=='cowo'){
            				echo '<h2>Putra Divisi <span id="cowdiv">' . $_GET['divisi'] . '</span> Grup <span id="cowgrup">' . digits_to_letters($_GET['grup']-1) . '</span></h2>';
            				echo '<div id="buttcow">';
            				for($i=1 ; $i<=2 ; $i++){
            					echo '<button id="cow'.$i.'" onClick="buttCow'.$i.'()" ';
            					if($i==$_GET['divisi']) echo $style;
            					echo '>'.$i.'</button> ';
            				}
            				echo '<br></div>';

            				for($j=1 ; $j<=2 ; $j++){
	            				echo '<div id="listcow' . $j .'" ';
	            				if($j!=$_GET['divisi']) echo 'style="display:none"';
	            				echo ' >';
	            				for($i=1 ; $i<=4;  $i++){
	            					echo ' <button id="cow' . $j . $i . '" onClick="buttCow' . $j . $i . '()" ';
	            					if($j==$_GET['divisi'] && $i==$_GET['grup']) echo $style;
	            					echo '>'.digits_to_letters($i-1).'</button> ';
	            				}
	            				echo '</div>';
	            			}
	            			echo '<br>';
            			}
            		}
            		else {
	            	?>
		                <h2>Putra Divisi <span id="cowdiv">1</span> Grup <span id="cowgrup">A</span></h2>
		                <div id="buttcow">
		                <button id="cow1" onClick="buttCow1()"  style="font-weight:900; background-color:#fd0000;">1</button>
		                <button id="cow2" onClick="buttCow2()">2</button><br>
		                </div>
		                <div id="listcow1">
		                <button id="cow11" onClick="buttCow11()" style="font-weight:900; background-color:#fd0000;">A</button>
		                <button id="cow12" onClick="buttCow12()">B</button>
		                <button id="cow13" onClick="buttCow13()">C</button>
		                <button id="cow14" onClick="buttCow14()">D</button>
		                </div>
		                <div id="listcow2" style="display:none">
		                <button id="cow21" onClick="buttCow21()">A</button>
		                <button id="cow22" onClick="buttCow22()">B</button>
		                <button id="cow23" onClick="buttCow23()">C</button>
		                <button id="cow24" onClick="buttCow24()">D</button>
		                </div>
		                <br>
	                <?php
                		echo
                		'<script>
                			$( document ).ready(function() {
            					buttCow11()
            				});
                		</script>'; 
            		} ?>
            </td>
        </tr>
        <tr>
    		<td><?php
	for($div=1;$div<=2;$div++)
	{?>
    	<script>
			function buttCow<?php echo $div;?>(){
				document.getElementById("cowdiv").innerHTML = "<?php echo $div;?>";
				document.getElementById("cow<?php echo $div;?>").style.fontWeight = "900";
				document.getElementById("cow<?php echo $div;?>").style.backgroundColor = "#fd0000";
				document.getElementById("cow<?php if ($div==2) echo 1; else echo 2;?>").style.fontWeight = "normal";
				document.getElementById("cow<?php if ($div==2) echo 1; else echo 2;?>").style.backgroundColor = "";
				document.getElementById("listcow<?php echo $div;?>").style.display = "block";
				document.getElementById("listcow<?php if ($div==2) echo 1; else echo 2;?>").style.display = "none";
				document.getElementById("cowgrup").innerHTML = "A";
				//document.getElementById("cow<?php echo $div.'1';?>").style.backgroundColor = "#fd0000";
				<?php 
				for($k=1;$k<=2;$k++){
					for($j=1;$j<=4;$j++){
						echo 'document.getElementById("tabelCow'.$k.$j.'")';
						if($k==$div && $j==1) echo '.style.display = "block";'.PHP_EOL;
						else echo '.style.display = "none";'.PHP_EOL;
						echo 'document.getElementById("cow'.$k.$j.'")';
						echo '.style.fontWeight = "normal";'.PHP_EOL;
						echo 'document.getElementById("cow'.$k.$j.'")';
						if($k==$div && $j==1) echo '.style.backgroundColor = "#fd0000";'.PHP_EOL;
						else echo '.style.backgroundColor = "";'.PHP_EOL;
						if($k==$div && $j==1) echo 'document.getElementById("cow'.$k.$j.'").style.fontWeight = "900";'.PHP_EOL;
					}
				}
				?>
			}
		</script>
        <div id= "classmentc<?php echo $div;?>">
            <?php
				for($i=1;$i<=4;$i++)
				{
					echo '<div id="tabelCow'.$div.$i.'" ';
					if(($i!=$_GET['grup'] || $div!=$_GET['divisi']) && $isclass>0) echo " style='display:none' ";
					echo ' >';
					get_classment('team_cowo',$div,$i,$isclass);
					if($isclass!=2) echo '<a href="' . get_home_url() . '/classment?jenkel=cowo&divisi='.$div.'&grup=' . $i . '">Full Classment</a><br>';
					echo '</div>';
					?>
					<script>
						function buttCow<?php echo $div.$i;?>(){
							<?php
							echo 'document.getElementById("cowgrup").innerHTML = "'.digits_to_letters($i-1).'";';
							for($k=1;$k<=2;$k++){
								for($j=1;$j<=4;$j++){
									echo 'document.getElementById("tabelCow'.$k.$j.'")';
									if($j==$i && $k==$div) echo '.style.display = "block";'.PHP_EOL;
									else echo '.style.display = "none";'.PHP_EOL;
									echo 'document.getElementById("cow'.$k.$j.'")';
									if($j==$i && $k==$div) echo '.style.fontWeight = "900";'.PHP_EOL;
									else echo '.style.fontWeight = "normal";'.PHP_EOL;
									echo 'document.getElementById("cow'.$k.$j.'")';
									if($j==$i && $k==$div) echo '.style.backgroundColor = "#fd0000";'.PHP_EOL;
									else echo '.style.backgroundColor = "";'.PHP_EOL;
								}
							}
							?>
						}
					</script>
					<?php
				}
            ?>
        </div>
     <?php } 
	 //CEWEK ?>
     </td>
     </tr>
     </table>
     </div>
     <div class="over">
     <table id="klasementabel2">
       	<tr>
        	<td>
        		<?php 
            		$style = 'style="font-weight:900; background-color:#fd0000;"';
            		if(isset($_GET['grup']) && isset($_GET['jenkel']) && $_GET['jenkel']=='cewe'){
            				echo '<h2>Putri Grup <span id="cewgrup">' . digits_to_letters($_GET['grup']-1) . '</span></h2>';
            				echo '<div id="listcew1">';
            				for($i=1 ; $i<=8;  $i++){
            					echo ' <button id="cew' . $i . '" onClick="buttCew' . $i . '()" ';
            					if($i==$_GET['grup']) echo $style;
            					echo '>'.digits_to_letters($i-1).'</button> ';
            					if($i==4 || $i==8) echo '<br>';
            				}
            				echo '<br></div>';
            		}
            		else{
            		?>
		                <h2>Putri Grup <span id="cewgrup">A</span></h2>
		                <div id="listcew1">
		                <button id="cew1" onClick="buttCew1()" style="font-weight:900; background-color:#fd0000;">A</button>
		                <button id="cew2" onClick="buttCew2()">B</button>
		                <button id="cew3" onClick="buttCew3()">C</button>
		                <button id="cew4" onClick="buttCew4()">D</button><br>
		                <button id="cew5" onClick="buttCew5()">E</button>
		                <button id="cew6" onClick="buttCew6()">F</button>
		                <button id="cew7" onClick="buttCew7()">G</button>
		                <button id="cew8" onClick="buttCew8()">H</button><br>.
		                </div>
                	<?php 
                		echo
                		'<script>
                			$( document ).ready(function() {
            					buttCew1()
            				});
                		</script>'; 
                	} ?>
            </td>
        </tr>
        <tr>
        	<td>
        <div id= "classmentcw">
            <?php
				for($i=1;$i<=8;$i++)
				{
					echo '<div id="tabelCew'.$i.'" ';
					if($_GET['jenkel']=='cewe'){
						if($i!=$_GET['grup'] && $isclass>0) echo " style='display:none' ";
					}else
						if($i>1 && $isclass>0) echo " style='display:none' ";
					echo ' >';
                	get_classment('team_cewe',1,$i,$isclass);
					if($isclass!=2) echo '<a href="' . get_home_url() . '/classment?jenkel=cewe&grup=' . $i . '">Full Classment</a><br>';
					?>
					<script>
						function buttCew<?php echo $i;?>(){
							<?php
							echo 'document.getElementById("cewgrup").innerHTML = "'.digits_to_letters($i-1).'";';
							for($j=1;$j<=8;$j++){
								echo 'document.getElementById("tabelCew'.$j.'")';
								if($j==$i) echo '.style.display = "block";'.PHP_EOL;
								else echo '.style.display = "none";'.PHP_EOL;
								echo 'document.getElementById("cew'.$j.'")';
								if($j==$i) echo '.style.fontWeight = "900";'.PHP_EOL;
								else echo '.style.fontWeight = "normal";'.PHP_EOL;
								echo 'document.getElementById("cew'.$j.'")';
								if($j==$i) echo '.style.backgroundColor = "#fd0000";'.PHP_EOL;
								else echo '.style.backgroundColor = "";'.PHP_EOL;
							}
							?>
						}
					</script>
					<?php
					echo '</div>';
				}
            ?>
        </div>
        </td>
        </tr>
        </table>
        </div>
<?php }

function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<p>');
                $excerpt_length = 20;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '[...]');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

function get_latest_news(){
		$args = array( "showposts" => 5 );                  
		query_posts($args);
	
		$content = "";
	
		if( have_posts() ) : 
	
			while( have_posts() ) :
	
				the_post();
				$link = get_permalink();
				$title = get_the_title();
				$date = get_the_date();                              
	
				$content .= "<div class='newsshort'>";
				$content .= "<h3><a href='$link' target='_top'>$title</a></h3>\n";
				$content .= $date;
				$content .= "<p class='excerpt'>" . get_the_excerpt() . "</p>";
				$content .= "</div>";
	
			endwhile;
	
			wp_reset_query();
	
		endif;
	
		// Leave one line commented out depending on usage
		echo $content;   // For use as widget
		//return $content; // for use as shortcode     
}

function get_firstimage() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment&post_mime_type=image');
  if($files){
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', false);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $thumb=wp_get_attachment_url($num);
    return $thumb;
  }
  else {
	  return get_bloginfo('template_url').'/img/default_nonews.jpg';
  }
}

function get_schedule ($jenkel, $limit){
			?>
			 <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider<?php echo $jenkel; ?>_container" style="position: relative; top: 0px; left: 0px; width: 670px; height: 70px; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?php echo get_bloginfo('template_url'); ?>/img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 670px; height: 70px; overflow: hidden;">
        	<div><img u="image" src="<?php echo get_bloginfo('template_url');?>/img/<?php echo $jenkel; ?>.jpg" /></div>
        <?php
		//fetch

        global $wpdb;
		$sql = "SELECT * FROM jadwal_".$jenkel." ORDER BY Tanggal ASC LIMIT ".$limit;
		$results = $wpdb->get_results($sql) or die(mysql_error());    
		if (count($results) > 0) {
		    $display_row = null;
		    foreach ($results as $res) {
				echo '<div style="width:300px;">';
				$nilai1 = $wpdb->get_row("SELECT Score FROM statistik_".$jenkel." WHERE Id_Statistik='".$res->Id_statistik_1."'");
				if($nilai1 != null) $nilai1 = '_';
				else $nilai1 = $nilai1->Score;
				$nilai2 = $wpdb->get_row("SELECT Score FROM statistik_".$jenkel." WHERE Id_Statistik='".$res->Id_statistik_2."'");
				if($nilai2 != null) $nilai2 = '_';
				else $nilai2 = $nilai2->Score;
				echo "<a href='".get_home_url()."/schedule?id=". $res->Id_Jadwal."&jenkel=".$jenkel."'>".$res->Team_1 . " " . $nilai1 . "-"  . $nilai2 . ' ' . $res->Team_2. "<br>" .$res->Tanggal;
				echo "<br><a href='".$res->coverage."'>"."Ulasan"."</a>";
				echo "</a><br>";
				//echo $query1 . '<br>';
				echo '</div>';
			}
		}?>
        </div>
        
        <!-- bullet navigator container -->
        <!--<div u="navigator" class="jssorb03" style="position: absolute; bottom: 4px; right: 6px;">
            <!-- bullet navigator item prototype -->
            <!--<div u="prototype" style="position: absolute; width: 21px; height: 21px; text-align:center; line-height:21px; color:white; font-size:12px;"><NumberTemplate></NumberTemplate></div>-->
        <!--</div>
        <!-- Bullet Navigator Skin End -->
        
        
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 123px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">javascript image slider</a>
    </div>
    <!-- Jssor Slider End --> <?php
}

function get_simple_schedule(){
	echo "<div id='schedulecewe'>";
	get_schedule("cewe", 3);
	echo "</div>".PHP_EOL;
	echo "<div id='schedulecowo'>";
	get_schedule("cowo", 3);
	echo "</div>".PHP_EOL;
}

function x_week_range($date) {
	date_default_timezone_set("Asia/Jakarta");
	//echo date('d-m-Y h:i:s');
    $ts = strtotime($date);
    $start = (date('w', $ts) == 1) ? $ts : strtotime('last monday', $ts);
    return array(date('Y-m-d', $start),
                 date('Y-m-d', strtotime('next sunday', $start)));
}

?>