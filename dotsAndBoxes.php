<style>
   .box {
     width: 50px;
     height: 50px;
     float: left;
     border: 5px solid #CCC;
     margin-left: -5px;
     margin-bottom: -5px;
   }
   .row > .box:nth-last-child(2) {
     border-right:none;
   }
   .row > .box:last-child {
      border-top: none;
      border-right: none;
      border-bottom: none;
      height: 60px;
    }
    #grid:last-child > .row {
      display: none;
    }
    #grid {
      width: 600px;
      margin-left: 100px;
      margin-top: 100px;
    }
    #defaultBox{
      border-bottom: solid 5px #ccc;
      width: 100px;
      height: 100px;
      display: none;
    }
    #row10 > .box
    {
      border-left: none;
      border-right: none;
      border-bottom: none;
      width: 60px;
    }
    #r10-c9
    {
      width: 50px !important;
    }
    #currentColor
    {
      background-color: blue;
      color: white;
      font-size: 50px;
      position:absolute;
      top:0;
      left:0;
    }
    #scores
    {
      position:absolute;
      top:60px;
    }
    #defaultRed {
      display: none;
      background-color: red;
    }
    #defaultBlue {
      display: none;
      background-color: blue;
    }
</style>
<div id="defaultBox"></div>
<div id="defaultRed"></div>
<div id="defaultBlue"></div>
<b id="currentColor">Current Color</b>
<div id="grid">
  <?php
    for($i = 0; $i < 11; $i++)
    {
      echo "<div class='row' id='row$i'>";
      for($j = 0; $j < 11; $j++)
      {
        $id = "r".$i."-c".$j;
        echo "<div class='box' id='$id'></div>";
      }
      echo "</div>";
    }
  ?>
</div>
<div id="scores">
<b><u>Score</u></b><br>
<b style="color: blue">Blue: </b><b id="blueScore">0</b><br>
<b style="color: red">Red: &nbsp;</b><b id="redScore">0</b>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
var currentColor = "blue";

String.prototype.firstNumber = function () {return this.match(/\d+\.?\d*/)}

$('.box').click(function(e){
  var id = $(this).attr('id');
  var rcNums = id.split('-');
  var row = Number(rcNums[0].firstNumber());
  var col = Number(rcNums[1].firstNumber());
  var b = "none";

  if(e.offsetY <= parseInt($(this).css('borderTopWidth'))){
     $(this).css('border-top-color',"black");
     b = "top";
  }
  else if(e.offsetX <= parseInt($(this).css('borderLeftWidth'))){
     $(this).css('border-left-color',"black");
     b = "left";
  }
  checkSurroundingBoxes(row,col,b);
  updateScores();
});

function checkSurroundingBoxes(row, col, b)
{
  var thisBox = "r"+row+"-c"+col;
  var top = "r"+(row-1)+"-c"+col;
  var bottom = "r"+(row+1)+"-c"+col;
  var right = "r"+row+"-c"+(col+1);
  var left = "r"+row+"-c"+(col-1);
  var arr = [thisBox,top,bottom,right,left];
  var defaultColor = $("#defaultBox").css('border-bottom-color');
  var defaultColorBG = $("#defaultBox").css('background-color');
  var filled = false;

  if($("#"+thisBox).css('border-left-color') != defaultColor)
  {
    $("#"+left).css('border-right-color',$("#"+thisBox).css('border-left-color'));
  }
  if($("#"+thisBox).css('border-top-color') != defaultColor)
  {
    $("#"+top).css('border-bottom-color',$("#"+thisBox).css('border-top-color'));
  }
  if($("#"+bottom).css('border-top-color') != defaultColor)
  {
    $("#"+thisBox).css('border-bottom-color',$("#"+bottom).css('border-top-color'));
  }

  $.each(arr, function( index, value ) {
    var thisTopColor = $("#"+value).css('border-top-color');
    var thisBottomColor = $("#"+value).css('border-bottom-color');
    var thisLeftColor = $("#"+value).css('border-left-color');
    var thisRightColor = $("#"+value).css('border-right-color');
    var thisBGColor = $("#"+value).css('background-color');
    if(thisTopColor != defaultColor  && thisBottomColor != defaultColor && thisRightColor != defaultColor && thisLeftColor != defaultColor && thisBGColor == defaultColorBG)
    {
      var zz = value.split('-');
      var r = Number(zz[0].firstNumber());
      var c = Number(zz[1].firstNumber());
      if(r != 10 && c != 10)
      {
        $("#"+value).css('background-color',currentColor);
        filled = true;
      }
    }
  });
  if(b != "none" && !filled)
  {
    if(currentColor == "blue")
    {
      currentColor = "red";
    }
    else {
      currentColor = "blue";
    }
    $("#currentColor").css('background-color',currentColor);
  }
}

function updateScores()
{
  var blueScore = 0;
  var redScore = 0;
  $(".box").each(function()
  {
    if($(this).css('background-color') == $("#defaultBlue").css("background-color"))
    {
      blueScore++;
    }
    else if($(this).css('background-color') == $("#defaultRed").css("background-color"))
    {
      redScore++;
    }
    $("#blueScore").html(blueScore);
    $("#redScore").html(redScore);
  });
}
</script>
