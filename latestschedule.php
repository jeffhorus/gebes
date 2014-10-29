<?php //periode
date_default_timezone_set("Asia/Jakarta");
$today = date("Y-m-d H:i:s");
$range = x_week_range($today);
//echo $range[0];

//bikin list
global $wpdb;
$queryco="SELECT * FROM `jadwal_cowo` WHERE (Tanggal BETWEEN '".$range[0]."' AND '".$range[1]."')";
$queryce="SELECT * FROM `jadwal_cewe` WHERE (Tanggal BETWEEN '".$range[0]."' AND '".$range[1]."')";
//echo $query;
$resultsco = $wpdb->get_results($queryco);
$resultsce = $wpdb->get_results($queryce);
//foreach ($results as $res) {
	//echo $res->Team_1;
//}
?>

<div class="subheader">
	<div id="weekschedule-inner">
		<?php
		$days = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
		for($i=0 ; $i<7 ; $i++){ ?>
		<div class="dayschedule <?php if($i==6) echo 'schlast'; ?>">
			<h3 class="days"><?php echo $days[$i] . ", " . date("d F y", strtotime($range[0] . ("+" . $i . " day")));?></h3>
			<?php
			$j=0;
			foreach ($resultsco as $res){
				//echo $res->Tanggal . " lala " . strtotime($range[0]) . ("+" . $i . " day");
				if(strtotime($res->Tanggal) == strtotime($range[0] . ("+" . $i . " day"))){
					if($j==0){
						echo "<b>Putra</b><br>"; $j=1;
					}
					$vsresult ="";
					$timeorfinished = "Selesai";
					if($res->score_1 == null && $res->score_2 == null){
						$vsresult = ' vs ';
						$timeorfinished = '<p>' . date("H:i",strtotime($res->Jam)) . '</p>' . PHP_EOL;
					} 
					else {
						$vsresult = ' ' . $res->score_1 . ' - ' . $res->score_2 . ' ';
					}
					echo '<a href="'. get_home_url() . '/schedule?id=' . $res->Id_Jadwal .  '&jenkel=cowo#stat"><p>' 	. $res->Team_1 . $vsresult 
								. $res->Team_2 . '</a></p>' . PHP_EOL;
					echo $timeorfinished;
				}
			}
			$k=0;
			foreach ($resultsce as $res){
				//echo $res->Tanggal . " lala " . strtotime($range[0]) . ("+" . $i . " day");
				if(strtotime($res->Tanggal) == strtotime($range[0] . ("+" . $i . " day"))){
					if($k==0){
						echo "<b>Putri</b><br>"; $k=1;
					}
					$vsresult =""; $timeorfinished = "Selesai";
					if($res->score_1 == null && $res->score_2 == null){
						$vsresult = ' vs ';
						$timeorfinished = '<p>' . date("H:i",strtotime($res->Jam)) . '</p>' . PHP_EOL;
					} 
					else {
						$vsresult = ' ' . $res->score_1 . ' - ' . $res->score_2 . ' ';
					}
					echo '<a href="'. get_home_url() . '/schedule?id=' . $res->Id_Jadwal .  '&jenkel=cewe#stat"><p>' 	. $res->Team_1 . $vsresult 
								. $res->Team_2 . '</a></p>' . PHP_EOL;
					echo $timeorfinished;
				}
			}
			if ($k==0 && $j==0) echo '&mdash;';
			?>
		</div>
		<?php } ?>
	</div>
	<div class="butt_subh"><a href='<?php echo get_home_url() . "/schedule"; ?>'>Hasil Pertandingan</a> | <a href='<?php echo get_home_url() . "/schedule"; ?>'>Jadwal Lengkap</a></div>
</div>