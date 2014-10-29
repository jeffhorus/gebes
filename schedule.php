<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/jadwal_list.css" />

<?php
//set indonesia
date_default_timezone_set("Asia/Jakarta");
if(isset($_GET["id"]) && isset($_GET["jenkel"]))
{
	get_template_part('latestschedule');
	echo '<br><br><br>';
	$idjadwal = $_GET["id"];
	$jenkel = $_GET["jenkel"];
	$query = 'SELECT * FROM jadwal_'.$jenkel.' WHERE Id_Jadwal='.$idjadwal;
	global $wpdb;
	$row = $wpdb->get_row($query,ARRAY_A);
	?>
		<div class="fullstat" id="stat">
			<div class="stathead">
				<?php
				$tgl = strtotime($row['Tanggal'] . " " . $row['Jam']);
				echo date("l, d F Y ", $tgl);
				echo "| ";
				echo date("H:i", $tgl); 
				?>
			</div>
			<div class="stat">
				<div class="logoteam logo1" style="background-image:url(<?php echo get_bloginfo('template_url') . '/logohimpunan/' .strtolower($row['Team_1']) . '.jpg'?>);"></div>
				<table class ="statistik team1">
					<tr>
						<td class="team">
							<a href="<?php 
								echo get_home_url() . "/team?idteam=" . $row['Team_1'] . "&jenkel=team_" . $_GET['jenkel']; ?> ">
								<?php echo $row['Team_1'];?></a>
						</td>
						<td class="score scoreR"><?php
							if($row['score_1'] == null) echo '-';
							else echo $row['score_1'];
						?></td>
					</tr>
				</table>

				<div class="logoteam logo2" style="background-image:url(<?php echo get_bloginfo('template_url') . '/logohimpunan/' .strtolower($row['Team_2']) . '.jpg'?>);"></div>
				<table class ="statistik team2">
					<tr>
						<td class="score scoreL"><?php
							if($row['score_2'] == null) echo '-';
							else echo $row['score_2'];
						?></td>
						<td class="team">
							<a href="<?php 
								echo get_home_url() . "/team?idteam=" . $row['Team_2'] . "&jenkel=team_" . $_GET['jenkel']; ?> ">
								<?php echo $row['Team_2'];?></a>
						</td>
					</tr>
				</table>
				<span class="vs">VS</span>
				<div class="expand">
					+
				</div>
			</div>
			<div class = "kategorigame">Kategori <?php
			if($_GET['jenkel']=="cowo") echo "Putra";
			else if($_GET['jenkel']=="cewe") echo "Putri";
			?></div>
		</div>
		<div style="text-align:center; font-size=20px;"><a href="<?php echo get_home_url();?>/schedule#stat">back to schedule list</a></div>
	<?php
}
else
{
	get_template_part('gradientsubheader');
	echo '<h1 style="text-align:center; margin-top:0px;"> Jadwal Lengkap dan Hasil Pertandingan </h1>';
	date_default_timezone_set("Asia/Jakarta");
	$today = date("Y-m-d H:i:s");
	//$range1 = x_week_range($today);
	//echo $range[0];

	//bikin list
	global $wpdb;
	$qmonth;
	$qyear;
	if(isset($_GET['bulan']) && isset($_GET['tahun'])){
		$qmonth = $_GET['bulan'];
		$qyear = $_GET['tahun'];
	}
	else {
		$qmonth = date("n");
		$qyear = date("Y");
	}
	$queryco="SELECT * FROM `jadwal_cowo` WHERE (Month(Tanggal) = " . $qmonth . ") AND (Year(Tanggal) = " . $qyear . ")";
	$queryce="SELECT * FROM `jadwal_cewe` WHERE (Month(Tanggal) = " . $qmonth . ") AND (Year(Tanggal) = " . $qyear . ")";
	//echo $queryco;
	$resultsco = $wpdb->get_results($queryco);
	$resultsce = $wpdb->get_results($queryce);
	//foreach ($results as $res) {
		//echo $res->Team_1;
	//}
	?>
	<?php
	$days = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
	$firstdayofmonth = $qyear.'-'.$qmonth.'-1';
	?> <div class="sch_cont" id="stat"> 

	<?php
	$nextmonth; $prevmonth;
	if(isset($_GET['bulan']) && isset($_GET['tahun'])) {
		$nextmonth = new DateTime($_GET['tahun'] . '-' . $_GET['bulan'] . '-1');
		$prevmonth = new DateTime($_GET['tahun'] . '-' . $_GET['bulan'] . '-1');
	}
	else{
		$nextmonth = new DateTime(date('y') . '-' . date('n') . '-1');
		$prevmonth = new DateTime(date('y') . '-' . date('n') . '-1');
	}
	$nextmonth->modify( 'first day of next month' );
	$prevmonth->modify( 'first day of last month' );
	echo '<br>';
	echo '<a href="' . get_home_url() . "/schedule?bulan=" . $prevmonth->format('n') . "&tahun=" . $prevmonth->format('Y') . '#stat">Previous Month</a>';
	echo ' &nbsp;|&nbsp; ';
	echo '<a href="' . get_home_url() . "/schedule?bulan=" . $nextmonth->format('n') . "&tahun=" . $nextmonth->format('Y') . '#stat">Next Month</a><hr>';
	for($i=0 ; $i<cal_days_in_month(CAL_GREGORIAN,date("n",$firstdayofmonth),date("Y",$firstdayofmonth)) ; $i++){
		//echo 'month '.date("n",$firstdayofmonth) . ' year ' .  date("Y",$firstdayofmonth) . ' date ' . $i;
	?>
		<?php
		$j=0;
		$print = '<table class="sch_tab" width="100%">
		<tbody>
			<tr>
				<th class="head">' . $days[$i%7] . ", " . date("d/m/y", strtotime($firstdayofmonth . ("+" . $i . " day"))) . ' | ' .  date("H:i",strtotime($res->Jam)) . '</th>
				<th class="empty"></th>
			</tr>';
		foreach ($resultsco as $res){
			//echo $res->Tanggal . " lala " . strtotime($range[0]) . ("+" . $i . " day");
			if(strtotime($res->Tanggal) == strtotime($firstdayofmonth . ("+" . $i . " day"))){
				if($j==0){
					$print .=  "<tr class='cowok'><td>Putra</td>"; $j=1;
				}
				else $print .= "<tr class='cowok'><td></td>";
				$vsorstripe ="";
				$timeorfinished = "<td>Selesai</td>";
				if($res->score_1 == null && $res->score_2 == null){
					$vsorstripe = '<td class="small center"> vs </td>';
				} 
				else {
					$vsorstripe = '<td class="small center"> - </td>';
				}
				$print .=  '<td class="namahimp left">' . '<a href="' . get_home_url() . '/team?idteam=' . $res->Team_1 . '&jenkel=team_cowo' . '">' . '<img src="' . get_bloginfo('template_url') . '/logohimpunan/' .  strtolower($res->Team_1) . '.jpg"> &nbsp;' . $res->Team_1 . '</a></td>' .
							 '<td class="small left">'. $res->score_1 . '</td>'. 
							 $vsorstripe .
							 '<td class="small">'. $res->score_2 . '</td>' .
							 '<td class="namahimp">' . '<a href="' . get_home_url() . '/team?idteam=' . $res->Team_2 . '&jenkel=team_cowo' . '">' . $res->Team_2  . ' &nbsp;<img src="' . get_bloginfo('template_url') . '/logohimpunan/' .  strtolower($res->Team_2) . '.jpg"> '. '</a></td>' ;
				$print .=  '<td><a href="'. get_home_url() . '/schedule?id=' . $res->Id_Jadwal .  '&jenkel=cowo#stat"><img style="margin:-10px;" src= "' . get_bloginfo('template_url') . "/img/rightarrow.png" .'" /></a></td></tr>';
			}
		}
		$k=0;
		$print2 = '<table class="sch_tab" width="100%">
		<tbody>
			<tr>
				<th class="head">' . $days[$i%7] . ", " . date("d/m/y", strtotime($firstdayofmonth . ("+" . $i . " day"))) . ' | ' .  date("H:i",strtotime($res->Jam)) . '</th>
				<th class="empty"></th>
			</tr>';
		foreach ($resultsce as $res){
			//echo $res->Tanggal . " lala " . strtotime($range[0]) . ("+" . $i . " day");
			if(strtotime($res->Tanggal) == strtotime($firstdayofmonth . ("+" . $i . " day"))){
				if($k==0){
					$print2 .=  "<tr class='cewek'><td>Putri</td>"; $k=1;
				}
				else $print2 .= "<tr class='cewek'><td></td>";
				$vsorstripe ="";
				$timeorfinished = "<td>Selesai</td>";
				if($res->score_1 == null && $res->score_2 == null){
					$vsorstripe = '<td class="small center"> vs </td>';
				} 
				else {
					$vsorstripe = '<td class="small center"> - </td>';
				}
				$print2 .=  '<td class="namahimp left">' . '<a href="' . get_home_url() . '/team?idteam=' . $res->Team_1 . '&jenkel=team_cewe' . '">' . '<img src="' . get_bloginfo('template_url') . '/logohimpunan/' . strtolower($res->Team_1) . '.jpg"> &nbsp;' . $res->Team_1 . '</a></td>' .
							 '<td class="small left">'. $res->score_1 . '</td>'. 
							 $vsorstripe .
							 '<td class="small">'. $res->score_2 . '</td>' .
							 '<td class="namahimp">' . '<a href="' . get_home_url() . '/team?idteam=' . $res->Team_2 . '&jenkel=team_cewe' . '">' . $res->Team_2  . ' &nbsp;<img src="' . get_bloginfo('template_url') . '/logohimpunan/' .  strtolower($res->Team_2) . '.jpg"> '. '</a></td>' ;
				$print2 .=  '<td><a href="'. get_home_url() . '/schedule?id=' . $res->Id_Jadwal .  '&jenkel=cewe#stat"><img title="lihat statistik" style="margin:-10px;" src= "' . get_bloginfo('template_url') . "/img/rightarrow.png" .'" /></a></td></tr>';
			}
		}
		
		if ($j!=0)// && $k!=0)
			echo $print.'</tbody></table><br>';
		if ($k!=0)// && $k!=0)
			echo $print2.'</tbody></table><br>';
		?>
		
	<?php 
	}
		echo '<hr>';
		echo '<a href="' . get_home_url() . "/schedule?bulan=" . $prevmonth->format('n') . "&tahun=" . $prevmonth->format('Y') . '#stat">Previous Month</a>';
		echo ' &nbsp;|&nbsp; ';
		echo '<a href="' . get_home_url() . "/schedule?bulan=" . $nextmonth->format('n') . "&tahun=" . $nextmonth->format('Y') . '#stat">Next Month</a>';
	?>
	</div>
<?php 
} ?>