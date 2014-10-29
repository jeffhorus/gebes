<?php
	$nim = $_GET["nim"];
	$jenkel = $_GET["jenkel"];
	//echo $team;
?>
<div id="datapemain">
<?php
	global $wpdb;
	$row = $wpdb->get_row("SELECT * FROM pemain_" . $jenkel . " WHERE NIM='" . $nim."' LIMIT 1",ARRAY_A);
	//fetch
	if($row){
		echo '<div class="pure-g"';
			echo '<div class="pure-u-1-1">';
				echo '<div class="pure-u-1-5"> Foto 100x150px </div>';
				echo '<div class="pure-u-1-5">';
	  				echo '<table class="pemainstat"> <tbody>';
						echo '<tr> <td> Field Goal : ' . $row['Field_Goal'] .  ' </td></tr>';
						echo '<tr> <td> 3-Points : ' . $row['3PT'] .  ' </td></tr>';
						echo '<tr> <td> Free Throw : ' . $row['FT'] .  ' </td></tr>';
						echo '<tr> <td> Rebound : ' . $row['Rebound'] .  ' </td></tr>';
						echo '<tr> <td> Assist : ' . $row['Assist'] .  ' </td></tr>';
					echo '</tbody> </table>';
				echo '</div>';
				echo '<div class="pure-u-1-5">';
				echo '<table class="pemainstat";> <tbody>';
						echo '<tr> <td> Steal : ' . $row['Steal'] . ' </td></tr>';
						echo '<tr> <td> Block : ' . $row['Block'] . ' </td></tr>';
						echo '<tr> <td> Turnover : ' . $row['Turnover'] . ' </td></tr>';
						echo '<tr> <td> Personal Foul : ' . $row['Personal_Foul'] . ' </td></tr>';
						echo '<tr> <td> Total Point : ' . $row['Total_Point'] . ' </td></tr>';
					echo '</tbody> </table>';
				echo '</div>';
			echo '</div>';
			echo '<div class="pure-u-3-5">';
				echo '<table class="pemainstatnama"> <tbody>';
	  				echo '<tr><td>Nama : ' . $row['Nama_Pemain'] . '</td></tr>';
					echo '<tr><td>NIM : ' . $row['NIM'] . '</td></tr>';
					echo '<tr><td>Tim : ' . '<a href="'. get_home_url() . "/team?idteam=" . $row['Nama_Team'] . "&jenkel=team_" . $jenkel . '">' . $row['Nama_Team'] . '</a></td></tr>';
				echo '</tbody> </table>';
			echo '</div>';
		echo '</div>';
	}
	else{
		echo '<h2>Tim Laki-laki Divisi 1</h2>';
		get_classment('team_cowo', '1');
		echo '<h2>Tim Laki-laki Divisi 2</h2>';
		get_classment('team_cowo', '2');
		echo '<h2>Tim Perempuan</h2>';
		get_classment('team_cewe', '1');
	}
?>
</div>