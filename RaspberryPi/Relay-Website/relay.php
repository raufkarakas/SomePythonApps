<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Röle Kontrol</title>
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<center>
	<form id="relay" action="relay.php" method="GET">
	<table>
		<th colspan="6" class="mainHeader">Kontrol etmek istediğiniz cihazı seçiniz.</th>
		<tr>
			<td colspan="6"><button type="button" class="bigButton" id="submitTumTavan" onclick=tumTavan()>Tüm Tavan</button></td>
		</tr>
		<tr>
			<td colspan="2"><button type="button" class="smallButton" id="submitKuzeyLed" onclick=guneyLed()>Kuzey Led</button></td>
			<td colspan="2"><button type="button" class="smallButton" id="submitKlavyeLed" onclick=klavyeLed()>Klavye Led</button></td>
			<td colspan="2"><button type="button" class="smallButton" id="submitGuneyLed" onclick=kuzeyLed()>Güney Led</button></td>
		</tr>
		<tr>
			<td colspan="6"><button type="button" class="bigButton" id="submitPerdeLed" onclick=perdeLed()>Perde Led</button></td>
		</tr>
		<tr>
			<td colspan="6"><button type="button" class="bigButton" id="submitRole" onclick=role()>Avize</button></td>
		</tr>
		<tr>
			<td colspan="3"><button type="button" class="regularButton" id="submitPCOn" onclick=PCOn()>PC Aç</button></td>
			<td colspan="3"><button type="button" class="regularButton" id="submitPCOff" onclick=PCOff()>PC Kapat</button></td>
		</tr>
		<tr>
			<td colspan="3"><button type="button" class="regularButton" id="submitTempHumOut" onclick=tempHumOut()>Dış Sensör</button></td>
			<td colspan="3"><button type="button" class="regularButton" id="submitTempHum" onclick=tempHum()>İç Sensör</button></td>
		</tr>
		<tr>
			<td colspan="6"><button type="button" class="bigButton" id="submitRapor" onClick="rapor()">Rapor</button></td>
		</tr>
	</table>
	<input type="hidden" name="total" id="total" value="">
	</form>
	</center>
</body>

<?php
	exec("gpio mode 0 out"); # Kuzey Led
	exec("gpio mode 1 out"); # Perde Led
	exec("gpio mode 2 out"); # Guney Led
	exec("gpio mode 3 out"); # PC
	exec("gpio mode 4 out"); # Klavye Led
	exec("gpio mode 5 out"); # Avize
	exec("gpio mode 7 out"); # PSU
	
	$state = $_GET["total"];
	
	if ($state == "tumTavan")
	{
		if (exec("gpio read 1") == 1 || exec("gpio read 0") == 1 || exec("gpio read 2") == 1)
		{
			exec("gpio write 7 0");
			exec("gpio write 1 0");
			exec("gpio write 0 0");
			exec("gpio write 2 0");
		}
		else if (exec("gpio read 4") == 0)
		{
			exec("gpio write 1 1");
			exec("gpio write 0 1");
			exec("gpio write 2 1");
		}
		else
		{
			exec("gpio write 7 1");
			exec("gpio write 1 1");
			exec("gpio write 0 1");
			exec("gpio write 2 1");
		}
	}
	
	if ($state == "kuzeyLed")
	{
		if (exec("gpio read 2") == 1)
		{
			exec("gpio write 7 0");
			exec("gpio write 2 0");
		}
		else if (exec("gpio read 1") == 0 || exec("gpio read 0") == 0 || exec("gpio read 4") == 0)
		{
			exec("gpio write 2 1");
		}
		else
		{
			exec("gpio write 7 1");
			exec("gpio write 2 1");
		}
	}
	
	if ($state == "perdeLed")
	{
		if (exec("gpio read 1") == 1)
		{
			exec("gpio write 7 0");
			exec("gpio write 1 0");
		}
		else if (exec("gpio read 2") == 0 || exec("gpio read 0") == 0 || exec("gpio read 4") == 0)
		{
			exec("gpio write 1 1");
		}
		else
		{
			exec("gpio write 7 1");
			exec("gpio write 1 1");
		}
	}
	
	if ($state == "guneyLed")
	{
		if (exec("gpio read 0") == 1)
		{
			exec("gpio write 7 0");
			exec("gpio write 0 0");
		}
		else if (exec("gpio read 1") == 0 || exec("gpio read 2") == 0 || exec("gpio read 4") == 0)
		{
			exec("gpio write 0 1");
		}
		else
		{
			exec("gpio write 7 1");
			exec("gpio write 0 1");
		}
	}
	
	if ($state == "klavyeLed")
	{
		if (exec("gpio read 4") == 1)
		{
			exec("gpio write 7 0");
			exec("gpio write 4 0");
		}
		else if (exec("gpio read 1") == 0 || exec("gpio read 0") == 0 || exec("gpio read 2") == 0)
		{
			exec("gpio write 4 1");
		}
		else
		{
			exec("gpio write 7 1");
			exec("gpio write 4 1");
		}
	}
		
	if ($state == "PCOn")
	{
		exec("gpio write 3 0");
		sleep(1);
		exec("gpio write 3 1");
	}
	
	if ($state == "PCOff")
	{
		exec("gpio write 3 0");
		sleep(6);
		exec("gpio write 3 1");
	}
	
	if ($state == "role")
	{
		if (exec("gpio read 5") == 0)
		{
			exec("gpio write 5 1");
		}
		else if (exec("gpio read 5") == 1)
		{
			exec("gpio write 5 0");
		}
	}
		
	if ($state == "rapor")
	{
		if (exec("gpio read 7") == 0){$psu = "<span style='color:green;'>Açık</span>";} else{$psu = "<span style='color:red;'>Kapalı</span>";}
		if (exec("gpio read 2") == 0){$guneyLed = "<span style='color:green;'>Açık</span>";} else{$guneyLed = "<span style='color:red;'>Kapalı</span>";}
		if (exec("gpio read 1") == 0){$perdeLed = "<span style='color:green;'>Açık</span>";} else{$perdeLed = "<span style='color:red;'>Kapalı</span>";}
		if (exec("gpio read 0") == 0){$kuzeyLed = "<span style='color:green;'>Açık</span>";} else{$kuzeyLed = "<span style='color:red;'>Kapalı</span>";}
		if (exec("gpio read 4") == 0){$klavyeLed = "<span style='color:green;'>Açık</span>";} else{$klavyeLed = "<span style='color:red;'>Kapalı</span>";}

		$cmdOut = exec("ping -c 2 192.168.1.100 | grep '2 packets transmitted'");
		if (strpos($cmdOut, "100% packet loss")){$pcState = "<span style='color:red;'>Kapalı</span>";} else{$pcState = "<span style='color:green;'>Açık</span>";}
		
		$format = "<center><h2>PSU: %s, <br/>Güney Led: %s, Perde Led: %s, Kuzey Led: %s, <br/>Klavye Led: %s, PC: %s</h2></center>";
		print(sprintf($format, $psu, $guneyLed, $perdeLed, $kuzeyLed, $klavyeLed, $pcState));
	}
	
	if ($state == "tempHum")
	{
		$outPut = shell_exec("sudo /home/pi/Adafruit_Python_DHT/examples/AdafruitDHT.py 2302 12 | grep 'T'");
		$format = "<center><h2> %s </h2></center>";
		print(sprintf($format, $outPut));

	}

	if ($state == "tempHumOut")
	{
		$outPut = shell_exec("sudo /home/pi/Adafruit_Python_DHT/examples/AdafruitDHT.py 2302 5 | grep 'T'");
		$format = "<center><h2> %s </h2></center>";
		print(sprintf($format, $outPut));
	}
?>
</html>


