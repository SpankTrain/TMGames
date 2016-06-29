<style>
#board {
	display: inline-block;
	text-align: center;
	margin: auto;
	position: relative;
	background: black;
	box-shadow: 0 4px 24px rgba(0, 0, 0, 0.5), 0 4px 16px rgba(0, 0, 0, 0.5);
}
.boardSpot {
	width: 50px;
	height: 50px;
	float: left;
	margin: 1px;
	border: none;
}
.boardSpotRed {
	background-color: red;
}
.boardSpotBlack {
	background-color: black;
}
.checker {
	width: 50px;
	height: 50px;
	border-radius: 25px;
	font-weight: bold;
}
.redChecker {
	background-color: red;
	color: black;
}
.blackChecker {
	background-color: black;
	color: white;
}
#dummyred {
	background-color: red;
	display:none;
}
#pieces {
	height: 414px;
	width: 50px;
	border: none;
	display: inline-block;
	float: left;
	margin-right: 25px;
}
#redPieces {
	height: 200px;
}
#blackPieces {
	height: 200px;
}
#pieceSeperator {
	height: 14px;
}
.jumped {
	position: relative;
}
</style>
<div id='dummyred'></div>
<div id='board'>
<?php
	$count = 0;
	$boardSpotCount = 0;
	$redCheckerCount = 0;
	$blackCheckerCount = 0;
	for($i=0; $i<8; $i++)
	{
		for($j=0; $j<8; $j++)
		{
			if($count%2 == 0)
			{
				$colorClass = "boardSpotRed";
			}
			else {
					$colorClass = "boardSpotBlack";
			}
      echo "<div class='boardSpot $colorClass' id='boardSpot$boardSpotCount' name='boardSpot'>";
				if($i == 0 || $i == 1 || $i == 2)
				{
					if($colorClass == "boardSpotBlack")
					{
						echo"<input type='button' id='redChecker$redCheckerCount' class='redChecker checker' value=''>";
						$redCheckerCount++;
					}
				}
				else if($i == 7 || $i == 6 || $i == 5)
				{
					if($colorClass == "boardSpotBlack")
					{
						echo"<input type='button' id='blackChecker$blackCheckerCount' class='blackChecker checker' value=''>";
						$blackCheckerCount++;
					}
				}
			echo "</div>";
			$count++;
			$boardSpotCount++;
		}
		$count++;
    echo"<br>";
	}
?>
</div>
<div id="pieces">
	<div id="redPieces"></div>
	<div id="pieceSeperator"></div>
	<div id="blackPieces"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
checkerClick = false;
boardSpotClick = false;
selectedChecker = null;
selectedBoardSpot = null;
currentLocation = null;

$('.checker').click(function(){
	checkerClick = true;
	selectedChecker = $(this).attr('id');
	currentLocation = $(this).parent().attr('id');
});

$('.boardSpot').click(function(){
	if($(this).children().length == 0)
	{
		if(checkerClick)
		{
			selectedBoardSpot = $(this).attr('id');
			if(isValidColorMove() && !isBackwards() && isValidDistance())
			{
				$("#"+selectedChecker).appendTo("#"+selectedBoardSpot);
				kingMe();
			}
			else
			{
				resetTurn();
				//alert("invalid move");
			}
		}
	}
});

function resetTurn()
{
	checkerClick = false;
	boardSpotClick = false;
	selectedChecker = null;
	selectedBoardSpot = null;
	currentLocation = null;
}

String.prototype.firstNumber = function () {return this.match(/\d+\.?\d*/)}

function isBackwards()
{
	var curr = Number(currentLocation.firstNumber());
	var sel = Number(selectedBoardSpot.firstNumber());
	if($("#"+selectedChecker).val() == "K")
	{
		return false;
	}
	if($("#"+selectedChecker).hasClass("redChecker"))
	{
		if(curr > sel)
		{
			return true;
		}
	}
	else
	{
		if(curr < sel)
		{
			return true;
		}
	}
	return false;
}

function isValidColorMove()
{
	var spotColor = $("#"+selectedBoardSpot).css("background-color");
	var checkerColor = $("#"+selectedChecker).css("background-color");
	if(spotColor == $("#dummyred").css("background-color"))
	{
		return false;
	}
	return true;
}

function isValidDistance()
{
	var curr = Number(currentLocation.firstNumber());
	var sel = Number(selectedBoardSpot.firstNumber());
	var topLeft = curr - 9;
	var botRight = curr + 9;
	var topRight = curr - 7;
	var botLeft = curr + 7;
	if(isJump(sel, topLeft, botRight, topRight, botLeft, topLeft - 9,botRight + 9,topRight - 7,botLeft + 7))
	{
		return false;
	}
	else if(sel != topLeft && sel != botRight && sel != topRight && sel != botLeft)
	{
		return false;
	}
	return true;
}

function isJump(s, tl,br,tr,bl,jtl,jbr,jtr,jbl)
{
	if(s == jtl)
	{
		if(isOpponent(tl, jtl))
		{
			return true;
		}
	}
	else if(s == jbr)
	{
		if(isOpponent(br, jbr))
		{
			return true;
		}
	}
	else if(s == jtr)
	{
		if(isOpponent(tr, jtr))
		{
			return true;
		}
	}
	else if(s == jbl)
	{
		if(isOpponent(bl, jbl))
		{
			return true;
		}
	}
	return false;
}

function isOpponent(id, loc)
{
	if($("#boardSpot"+id).children().length != 0)
	{
		if($("#boardSpot"+id).children(".checker").css("background-color") != $("#"+selectedChecker).css("background-color"))
		{
			jump($("#boardSpot"+id).children(".checker").attr("id"),id, loc);
			return true;
		}
	}
	return false;
}

function jump(jumpee, boardSpotId, loc)
{
	$("#"+jumpee).addClass("jumped");
	if($("#"+jumpee).hasClass("redChecker"))
	{
		$("#"+jumpee).appendTo("#redPieces");
	}
	else
	{
		$("#"+jumpee).appendTo("#blackPieces");
	}
	$("#"+selectedChecker).appendTo($("#boardSpot"+loc));
	kingMe();
	stackPieces();
}

function stackPieces()
{
	var topPX = 0;
	$('.checker', $('#blackPieces')).each(function ()
	{
    $(this).css('top',topPX+'px');
		topPX = topPX - 35;
	});
	topPX = 0;
	$('.checker', $('#redPieces')).each(function ()
	{
    $(this).css('top',topPX+'px');
		topPX = topPX - 35;
	});
}

function kingMe()
{
	var sel = Number(selectedBoardSpot.firstNumber());
	if($("#"+selectedChecker).hasClass("redChecker"))
	{
		if(sel >= 56)
		{
			$("#"+selectedChecker).val('K');
		}
	}
	else
	{
		if(sel <= 7)
		{
			$("#"+selectedChecker).val('K');
		}
	}
}
</script>
