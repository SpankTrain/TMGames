<style>
* {
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: -moz-none;
    -o-user-select: none;
    user-select: none;
}

#tile_wrapper, #info {
  text-align: center;
  border: solid 3px black;
  display: none;
}

#info {
  border-top: solid 3px black;
  border-left: solid 3px black;
  border-right: solid 3px black;
  padding: 5px;
}

.tile {
	width: 30px;
	height: 30px;
  font-size: 27px;
}

#options {
  border: solid 1px black;
  display: table;
  padding: 5px;
}

#play {
  float: right;
  width: 100%;
  font-weight: bold;
}

.mine.revealed {
  background-color: red;
}

#minesRemaining {
  width: 5em;
}

.mineCount1, .mineCount2, .mineCount3, .mineCount4, .mineCount5, .mineCount6, .mineCount7, .mineCount8 {
  font-weight: bold;
}

.mineCount1 {
  color: #0000FF;
}
.mineCount2 {
  color: #008000;
}
.mineCount3 {
  color: #ff0000;
}
.mineCount4 {
  color: #00008B;
}
.mineCount5 {
  color: #A52A2A;
}
.mineCount6 {
  color: #00FFFF;
}
.mineCount7 {
  color: #000000;
}
.mineCount8 {
  color: #808080;
}
.revealed {
  background-color: #CCC;
  border: solid 2px #bdbdbd;
}


.timer_container {
  display: table;
  margin-bottom: 10px;
  width: 100%;
  text-align: center;
}

.timer, .mineCounter, .smile_pic {
	padding: 10px;
	background: linear-gradient(top, #222, #444);
	overflow: hidden;
	display: inline-block;
	border: 7px solid #efefef;
	border-radius: 5px;
	position: relative;
	box-shadow:
		inset 0 -2px 10px 1px rgba(0, 0, 0, 0.75),
		0 5px 20px -10px rgba(0, 0, 0, 1);
}

.timer {
  float: left;
}

.mineCounter {
  float: right;
}

.cell {
	width: 0.60em;
	height: 40px;
	font-size: 50px;
	overflow: hidden;
	position: relative;
	float: left;
}

.numbers {
	width: 0.6em;
	line-height: 40px;
	font-family: digital, arial, verdana;
	text-align: center;
	color: black;
	position: absolute;
	top: 0;
	left: 0;
	text-shadow: 0 0 5px rgba(255, 255, 255, 1);
}

#timer_controls {
	margin-top: -5px;
}
#timer_controls label {
	cursor: pointer;
	padding: 5px 10px;
	background: #efefef;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	border-radius: 0 0 3px 3px;
  display: none;
}
input[name="controls"] {display: none;}

/*Control code*/
#stop:checked~.timer .numbers {animation-play-state: paused;}
#start:checked~.timer .numbers {animation-play-state: running;}
#reset:checked~.timer .numbers {animation: none;}

.moveten {
	animation: moveten 1s steps(10, end) infinite;
	animation-play-state: paused;
}

.second {animation-duration: 10s;}
.tensecond {animation-duration: 100s;} /*100 times .second*/
.hundredsecond {animation-duration: 1000s;} /*100 times .tensecond*/
.thousandsecond {animation-duration: 10000s;} /*100 times .hundredsecond*/

@keyframes moveten {
	0% {top: 0;}
	100% {top: -400px;}
}

@keyframes movesix {
	0% {top: 0;}
	100% {top: -240px;}
}
@font-face {
	font-family: 'digital';
	src: url('http://thecodeplayer.com/uploads/fonts/DS-DIGI.TTF');
}

</style>

<div id="options">
  <b><u>Difficulty</u></b><br>
  <input type="radio" name="difficulty" value="beginner" checked="checked"> Beginner (10 mines - 9x9 grid)<br>
  <input type="radio" name="difficulty" value="intermediate"> Intermediate (40 mines - 16x16 grid)<br>
  <input type="radio" name="difficulty" value="advanced"> Advanced (99 mines - 16x30 grid)<br><br>
  <button id="play">Play</button>
</div>

<div id='tile_wrapper'>
  <table class="timer_container">
    <tr>
      	<input id="start" name="controls" type="radio" />
      	<input id="stop" name="controls" type="radio" />
      	<input id="reset" name="controls" type="radio" />
      	<div class="timer">
          <div class="cell"><div class="numbers thousandsecond moveten">0 1 2 3 4 5 6 7 8 9</div></div>
          <div class="cell"><div class="numbers hundredsecond moveten">0 1 2 3 4 5 6 7 8 9</div></div>
      		<div class="cell"><div class="numbers tensecond moveten">0 1 2 3 4 5 6 7 8 9</div></div>
      		<div class="cell"><div class="numbers second moveten">0 1 2 3 4 5 6 7 8 9</div></div>
      	</div>
        <div class="smile_pic"><img id="smile" src='happy_smile.jpg' height='40px' width='40px'></img></div>
        <div class="mineCounter">
          <div class="cell"><div class="numbers tenmines" id="tenmines">0</div></div>
          <div class="cell"><div class="numbers onemines" id="onemines">0</div></div>
        </div>
    </tr>
  </table>
  <div id="board"></div>
</div>

<script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
count = 1;
tileIDs = [];
exploded = false;
win = false;
mines = 0;
h = 0;
w = 0;
difficulty = "";
String.prototype.firstNumber = function () {return this.match(/\d+\.?\d*/)}

$("#play").click(function()
{
  if(difficulty == "")
  {
    difficulty = $("#options input[type='radio']:checked").val();
  }
  printTiles(difficulty);
  $("#options").hide();
  $("#tile_wrapper").css("display","table");
  clearValues();
  updateMineCount();
  $("#start").click();
});

$("#smile").click(function()
{
  $("#reset").click();
  mines = 0;
  exploded = false;
  win = false;
  count = 1;
  tileIDs = [];
  $("#smile").attr("src","happy_smile.jpg");
  $("#play").click();
});

function printTiles(diff)
{
  var m = 0;
  if(diff == "beginner")
  {
    h = 9;
    w = 9;
    m = 10;
  }
  else if(diff == "intermediate")
  {
    h = 16;
    w = 16;
    m = 40;
  }
  else
  {
    h = 16;
    w = 30;
    m = 99;
  }
  mines = m;
  var tileString = "";
  for(var i = 0; i < h; i++)
  {
    for(var j = 0; j < w; j++)
    {
      var tile = "r"+i+"-c"+j;
      tileIDs.push(tile);
      tileString += "<input type='button' class='tile' id='"+tile+"' name='"+tile+"' value=''>";
      count++;
    }
    tileString += "<br>";
  }
  tileString += "<br>";
  $("#board").html(tileString);
  generateMines(h,w,m);
  generateNumbers(h,w);
}

function generateMines(h,w,m)
{
  var r = '';
	while(m > 0)
	{
		r = Math.floor((Math.random() * (h*w)));
		var tileID = tileIDs[r];
		if($('#'+tileID).val() != 'b')
		{
			$('#'+tileID).val('b');
      $('#'+tileID).addClass("mine");
			m--;
		}
	}
}

function generateNumbers(h,w)
{
  $.each(tileIDs, function( index, value ) {
    var id = value;
    if($("#"+id).val() != 'b')
    {
      var mineCount = getNumber(id);
      $("#"+id).val(mineCount);
      $("#"+id).addClass("mineCount"+mineCount);
    }
  });
}

function getBlock(id)
{
  var rcNums = id.split('-');
  var r = Number(rcNums[0].firstNumber());
  var c = Number(rcNums[1].firstNumber());

  var up = "r" + (r - 1) + "-c" + c;
  var down = "r" + (r + 1) + "-c" + c;
  var left = "r" + r + "-c" + (c - 1);
  var right = "r" + r + "-c" + (c + 1);
  var leftDown = "r" + (r - 1) + "-c" + (c - 1);
  var rightDown = "r" + (r - 1) + "-c" + (c + 1);
  var leftUp = "r" + (r + 1) + "-c" + (c - 1);
  var rightUp = "r" + (r + 1) + "-c" + (c + 1);

  var block = [up,down,left,right,leftDown,rightDown,leftUp,rightUp];
  return block;
}

function getNumber(id)
{
  var block = getBlock(id);
  var mineCount = 0;
  $.each(block, function( index, value ) {
      var tID = value;
      if($("#"+tID).val() == 'b')
      {
        mineCount++;
      }
  });
  return mineCount;
}

$(document).on('mousedown', ".tile", function(event) {
  e = window.event;
  switch (e.which)
  {
   case 1:
    {
      revealValue($(this).attr('id'));
      break; //left
    }
   case 2:
   {
     break;
   }//middle
   case 3:
   {
     makeFlag($(this).attr('id'));
     break;
   }//right
  }
  checkWin();
  if(exploded || win)
  {
    $("#stop").click();
    if(exploded)
    {
      $("#smile").attr("src","dead_smile.jpg");
    }
    else
    {
      $("#smile").attr("src","happier_smile.jpg");
    }
  }
});

$('*').contextmenu( function() {
    return false;
});

function clearValues()
{
  $.each(tileIDs, function( index, value )
  {
    var id = value;
    $("#"+id).val("");
  });
}

function revealValue(id)
{
  if($("#"+id).hasClass("mineCount0"))
  {
    addValueClass(id);
    var block = getBlock(id);
    $.each(block, function( index, value ) {
        var tID = value;
        if(!$("#"+tID).hasClass("revealed"))
        {
          revealValue(tID);
        }
    });
  }
  else {
    addValueClass(id);
  }
}

function addValueClass(id)
{
  if(!$("#"+id).hasClass("flagged") && !$("#"+id).hasClass("revealed"))
  {
    if($("#"+id).hasClass("mine"))
    {
      revealAllMines();
    }
    else if($("#"+id).hasClass("mineCount0"))
    {
      $("#"+id).val("");
    }
    else if($("#"+id).hasClass("mineCount1"))
    {
      $("#"+id).val("1");
    }
    else if($("#"+id).hasClass("mineCount2"))
    {
      $("#"+id).val("2");
    }
    else if($("#"+id).hasClass("mineCount3"))
    {
      $("#"+id).val("3");
    }
    else if($("#"+id).hasClass("mineCount4"))
    {
      $("#"+id).val("4");
    }
    else if($("#"+id).hasClass("mineCount5"))
    {
      $("#"+id).val("5");
    }
    else if($("#"+id).hasClass("mineCount6"))
    {
      $("#"+id).val("6");
    }
    else if($("#"+id).hasClass("mineCount7"))
    {
      $("#"+id).val("7");
    }
    else if($("#"+id).hasClass("mineCount8"))
    {
      $("#"+id).val("8");
    }
    $("#"+id).addClass("revealed");
  }
}

function makeFlag(id)
{
  if(!$("#"+id).hasClass("revealed"))
  {
    if($("#"+id).hasClass("flagged"))
    {
      $("#"+id).val("");
      $("#"+id).css('background-image','');
      $("#"+id).css("background-size","");
      $("#"+id).removeClass("flagged");
    }
    else
    {
      $("#"+id).val("");
      $("#"+id).css('background-image','url(flag.png)');
      $("#"+id).css("background-size","cover");
      $("#"+id).addClass("flagged");
    }
  }
  updateMineCount();
}

function revealAllMines()
{
  $.each(tileIDs, function( index, value )
  {
    var id = value;
    if($("#"+id).hasClass("mine"))
    {
      $("#"+id).val("");
      $("#"+id).css('background-image','url(mine.png)');
      $("#"+id).css("background-size","cover");
      $("#"+id).addClass("revealed");
    }
    $("#"+id).attr("disabled","disabled");
  });
  exploded = true;
}

function updateMineCount()
{
  var numFlags = 0;
  $.each(tileIDs, function( index, value )
  {
    if($("#"+value).hasClass("flagged"))
    {
      numFlags++;
    }
  });
  var mineCount = mines - numFlags;
  var s = mineCount.toString();
  if(s.length == 1)
  {
    $("#tenmines").html("0");
    $("#onemines").html(s.charAt(0));
  }
  else
  {
    $("#tenmines").html(s.charAt(0));
    $("#onemines").html(s.charAt(1));
  }
}

function checkWin()
{
  var numFlags = 0;
  var revealed = 0;
  $.each(tileIDs, function( index, value )
  {
    if($("#"+value).hasClass("flagged"))
    {
      numFlags++;
    }
    else if($("#"+value).hasClass("revealed"))
    {
      revealed++;
    }
  });
  if((revealed + numFlags == (h*w)) && numFlags == mines)
  {
    win = true;
  }
}
</script>
