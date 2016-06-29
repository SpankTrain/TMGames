<style>
#cards {
    text-align: center;
	margin: auto;
	position: relative;
	top: 50%;
}

.card {
	text-align: center;
	width: 50px;
	height: 50px;
	font-weight: bold;
	font-size: 20px;
}

</style>

<div id='cards'>
    <input type="button" class='card' id="r1c1" name="r1c1" value='1'><input type="button" class='card' id="r1c2" name="r1c2" value='2'><br>
    <input type="button" class='card' id="r2c1" name="r2c1" value='3'><input type="button" class='card' id="r2c2" name="r2c2" value='4'><br>
    <input type="button" class='card' id="r3c1" name="r3c1" value='5'><input type="button" class='card' id="r3c2" name="r3c2" value='6'>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
var cardClick = 0;
var randomNum1 = Math.floor((Math.random() * 3) + 1);
var randomNum2 = Math.floor((Math.random() * 3) + 1);
$('#r' + randomNum1 + 'c1').css('background-color', 'red');
var color1 = '#r' + randomNum1 + 'c1';
$('#r' + randomNum2 + 'c2').css('background-color', 'red');
var color2 = '#r' + randomNum2 + 'c2';
var randomNum3 = randomNum1;
var randomNum4 = randomNum2;
while(randomNum3 == randomNum1)
{
	randomNum3 = Math.floor((Math.random() * 3) + 1);
}
while(randomNum4 == randomNum2)
{
	randomNum4 = Math.floor((Math.random() * 3) + 1);
}
$('#r' + randomNum3 + 'c1').css('background-color', 'blue');
var color3 = '#r' + randomNum3 + 'c1';
$('#r' + randomNum4 + 'c2').css('background-color', 'blue');
var color4 = '#r' + randomNum4 + 'c2';
var randomNum5 = randomNum3;
var randomNum6 = randomNum4;
while(randomNum5 == randomNum3 || randomNum5 == randomNum1)
{
	randomNum5 = Math.floor((Math.random() * 3) + 1);
}
while(randomNum6 == randomNum4 || randomNum6 == randomNum2)
{
	randomNum6 = Math.floor((Math.random() * 3) + 1);
}
$('#r' + randomNum5 + 'c1').css('background-color', 'green');
var color5 = '#r' + randomNum5 + 'c1';
$('#r' + randomNum6 + 'c2').css('background-color', 'green');
var color6 = '#r' + randomNum6 + 'c2';

setTimeout(function(){
$('#r1c1').css('background-color', 'transparent');
$('#r1c2').css('background-color', 'transparent');
$('#r2c1').css('background-color', 'transparent');
$('#r2c2').css('background-color', 'transparent');
$('#r3c1').css('background-color', 'transparent');
$('#r3c2').css('background-color', 'transparent');
},5000);

var color = '';
var currentColor = '';
var first = '';
var total = 0;

$('#r1c1').click(function() {
	if('#r1c1' == color1)
	{
		color = 'red';
	}
	else if('#r1c1' == color2)
	{
		color = 'red';
	}
	else if('#r1c1' == color3)
	{
		color = 'blue';
	}
	else if('#r1c1' == color4)
	{
		color = 'blue';
	}
	else if('#r1c1' == color5)
	{
		color = 'green';
	}
	else if('#r1c1' == color6)
	{
		color = 'green';
	}
	$('#r1c1').css('background-color', color);
	if(first == '')
	{
		first = 1;
		currentColor = color;
	}
	else if(first == 1)
	{
		if(color == currentColor)
		{
			alert("Match found");
		}
		else
		{
			alert("YOU LOST!");
			total = 0;
		}
		first = '';
	}
	total++;
	if(total == 6)
	{
		alert("YOU FOUND ALL THE MATCHES!");
	}
});

$('#r2c1').click(function() {
	if('#r2c1' == color1)
	{
		color = 'red';
	}
	else if('#r2c1' == color2)
	{
		color = 'red';
	}
	else if('#r2c1' == color3)
	{
		color = 'blue';
	}
	else if('#r2c1' == color4)
	{
		color = 'blue';
	}
	else if('#r2c1' == color5)
	{
		color = 'green';
	}
	else if('#r2c1' == color6)
	{
		color = 'green';
	}
	$('#r2c1').css('background-color', color);
	if(first == '')
	{
		first = 1;
		currentColor = color;
	}
	else if(first == 1)
	{
		if(color == currentColor)
		{
			alert("Match found");
		}
		else
		{
			alert("YOU LOST!");
			total = 0;
		}
		first = '';
	}
	total++;
	if(total == 6)
	{
		alert("YOU FOUND ALL THE MATCHES!");
	}
});

$('#r3c1').click(function() {
	if('#r3c1' == color1)
	{
		color = 'red';
	}
	else if('#r3c1' == color2)
	{
		color = 'red';
	}
	else if('#r3c1' == color3)
	{
		color = 'blue';
	}
	else if('#r3c1' == color4)
	{
		color = 'blue';
	}
	else if('#r3c1' == color5)
	{
		color = 'green';
	}
	else if('#r3c1' == color6)
	{
		color = 'green';
	}
	$('#r3c1').css('background-color', color);
	if(first == '')
	{
		first = 1;
		currentColor = color;
	}
	else if(first == 1)
	{
		if(color == currentColor)
		{
			alert("Match found");
		}
		else
		{
			alert("YOU LOST!");
			total = 0;
		}
		first = '';
	}
	total++;
	if(total == 6)
	{
		alert("YOU FOUND ALL THE MATCHES!");
	}
});

$('#r1c2').click(function() {
	if('#r1c2' == color1)
	{
		color = 'red';
	}
	else if('#r1c2' == color2)
	{
		color = 'red';
	}
	else if('#r1c2' == color3)
	{
		color = 'blue';
	}
	else if('#r1c2' == color4)
	{
		color = 'blue';
	}
	else if('#r1c2' == color5)
	{
		color = 'green';
	}
	else if('#r1c2' == color6)
	{
		color = 'green';
	}
	$('#r1c2').css('background-color', color);
	if(first == '')
	{
		first = 1;
		currentColor = color;
	}
	else if(first == 1)
	{
		if(color == currentColor)
		{
			alert("Match found");
		}
		else
		{
			alert("YOU LOST!");
			total = 0;
		}
		first = '';
	}
	total++;
	if(total == 6)
	{
		alert("YOU FOUND ALL THE MATCHES!");
	}
});

$('#r2c2').click(function() {
	if('#r2c2' == color1)
	{
		color = 'red';
	}
	else if('#r2c2' == color2)
	{
		color = 'red';
	}
	else if('#r2c2' == color3)
	{
		color = 'blue';
	}
	else if('#r2c2' == color4)
	{
		color = 'blue';
	}
	else if('#r2c2' == color5)
	{
		color = 'green';
	}
	else if('#r2c2' == color6)
	{
		color = 'green';
	}
	$('#r2c2').css('background-color', color);
	if(first == '')
	{
		first = 1;
		currentColor = color;
	}
	else if(first == 1)
	{
		if(color == currentColor)
		{
			alert("Match found");
		}
		else
		{
			alert("YOU LOST!");
			total = 0;
		}
		first = '';
	}
	total++;
	if(total == 6)
	{
		alert("YOU FOUND ALL THE MATCHES!");
	}
});

$('#r3c2').click(function() {
	if('#r3c2' == color1)
	{
		color = 'red';
	}
	else if('#r3c2' == color2)
	{
		color = 'red';
	}
	else if('#r3c2' == color3)
	{
		color = 'blue';
	}
	else if('#r3c2' == color4)
	{
		color = 'blue';
	}
	else if('#r3c2' == color5)
	{
		color = 'green';
	}
	else if('#r3c2' == color6)
	{
		color = 'green';
	}
	$('#r3c2').css('background-color', color);
	if(first == '')
	{
		first = 1;
		currentColor = color;
	}
	else if(first == 1)
	{
		if(color == currentColor)
		{
			alert("Match found");
		}
		else
		{
			alert("YOU LOST!");
			total = 0;
		}
		first = '';
	}
	total++;
	if(total == 6)
	{
		alert("YOU FOUND ALL THE MATCHES!");
	}
});
</script>
