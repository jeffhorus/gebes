<?php
	$idteam = $_GET["idteam"];
	$jenkel = $_GET["jenkel"];
	//echo $team;
	
    global $wpdb;
	$result = $wpdb->get_row("SELECT * FROM " . $jenkel . " WHERE Nama_Team='" . $idteam."' LIMIT 1",ARRAY_A);
	//fetch
	if($result){
		$row = $result;
		?>

        <!-- INI DICOPAS AJA SEMUANYA LING -->
            <div id="datatim">
            <?php $upload_dir = wp_upload_dir(); ?>
            <?php $src= get_bloginfo('template_url')."/logohimpunan/".strtolower($idteam).".jpg";
			?>
            <img src="<?php echo $src;?>">
				<h2>Profil Tim</h2>
            <div id="data">
        <?php
		$jenis;
		if(endsWith($jenkel,"cowo")) $jenis = "Putra";
		else $jenis = "Putri";
		echo 'Nama : ' . $row['Nama_Team'] . " - " . $jenis . '<br/>';
		echo 'Divisi : ' . $row['Divisi'] . '<br/>';
		echo 'Grup : ' . $row['Grup'] . '<br/>';
		echo 'Tanding : ' . $row['Games'] . '<br/>';
		echo '</div><div id="data" ';
		echo 'Menang : ' . $row['Win'] . '<br/>';
		echo 'Kalah : ' . $row['Lose'] . '<br/>';
		echo 'Poin : ' . $row['Points'] . '<br/>';
		echo 'GA : ' . $row['GA'] . '<br/>';
		echo 'GF : ' . $row['GF'] . '<br/>';
		?>
		</div>
		<div id="daftarpemain">
			<?php
            $argjenkel;
            if(endsWith($jenkel,'cewe')) $argjenkel='cewe';
            else $argjenkel='cowo';
            get_daftar_pemain($idteam, $argjenkel);
            ?>
        </div>
	<?php
	}
	else{?>
		<div id="classmentfull">
        <h1>Daftar Tim</h1>
        <table id="klasementabelfull" style="width:100%;">
            <tr>
                <td>
                    <h2>Laki-Laki</h2>
                    Divisi : <span id="cowdiv">1</span><div id="buttcow">
                    <button id="cow1" onClick="buttCow1()"  style="font-weight:900; background-color:#fd0000;">1</button>
                    <button id="cow2" onClick="buttCow2()">2</button><br>
                    </div>
                    Grup : <span id="cowgrup">A</span><div id="listcow1">
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
                </td>
                <td>
                    <h2>Perempuan</h2>
                    Grup : <span id="cewgrup">A</span><div id="listcew1">
                    <button id="cew1" onClick="buttCew1()" style="font-weight:900; background-color:#fd0000;">A</button>
                    <button id="cew2" onClick="buttCew2()">B</button>
                    <button id="cew3" onClick="buttCew3()">C</button>
                    <button id="cew4" onClick="buttCew4()">D</button><br>
                    <button id="cew5" onClick="buttCew5()">E</button>
                    <button id="cew6" onClick="buttCew6()">F</button>
                    <button id="cew7" onClick="buttCew7()">G</button>
                    <button id="cew8" onClick="buttCew8()">H</button><br>.
                    </div>
                </td>
            </tr>
        <tr>
        <?php get_simple_classment(3); ?>
        </tr>
        </table>
        </div>
	<?php }
	?>
	</div>