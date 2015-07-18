window.onload = function()
{ 
 button1 = document.getElementById('submitTumTavan');
 button1.onClick = tumTavan;
 
 button2 = document.getElementById('submitGuneyLed');
 button2.onClick = guneyLed;
 
 button3 = document.getElementById('submitPerdeLed');
 button3.onClick = perdeLed;
 
 button4 = document.getElementById('submitKuzeyLed');
 button4.onClick = kuzeyLed;
 
 button5 = document.getElementById('submitKlavyeLed');
 button5.onClick = klavyeLed;
 
 button7 = document.getElementById('submitPCOn');
 button7.onClick = PCOn;
 
 button8 = document.getElementById('submitPCOff');
 button8.onClick = PCOff;
 
 button9 = document.getElementById('submitRole');
 button9.onClick = role;
 
 button10 = document.getElementById('submitRapor');
 button10.onClick = rapor;
 
 button11 = document.getElementById('submitTempHum');
 button11.onClick = tempHum;

 button12 = document.getElementById('submitTempHumOut');
 button12.onClick = tempHum;
}

function tumTavan()
{
 hidden = document.getElementById("total");
 hidden.value = "tumTavan";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function guneyLed()
{
 hidden = document.getElementById("total");
 hidden.value = "guneyLed";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function perdeLed()
{
 hidden = document.getElementById("total");
 hidden.value = "perdeLed";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function kuzeyLed()
{
 hidden = document.getElementById("total");
 hidden.value = "kuzeyLed";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function klavyeLed()
{
 hidden = document.getElementById("total");
 hidden.value = "klavyeLed";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function PCOn()
{
 hidden = document.getElementById("total");
 hidden.value = "PCOn";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function PCOff()
{
 hidden = document.getElementById("total");
 hidden.value = "PCOff";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function tempHum()
{
 hidden = document.getElementById("total");
 hidden.value = "tempHum";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function tempHumOut()
{
 hidden = document.getElementById("total");
 hidden.value = "tempHumOut";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function role()
{
 hidden = document.getElementById("total");
 hidden.value = "role";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}

function rapor()
{
 hidden = document.getElementById("total");
 hidden.value = "rapor";
 
 form = document.getElementById("relay");
 form.method = "GET";
 form.action = "relay.php";
 form.submit();
}
