<style>
.tictactoebox {
  width: 250px;
  height: 250px;
  text-align: center;
  font-size: 150px;
  font-weight: bold;
  border: none;
}
#tictactoe {
  text-align: center;
  margin: auto;
  position: relative;
  top: 50%;
  transform: translateY(-50%);
}

#r1c2 {
  border-left: solid 1px black;
  border-right: solid 1px black;
}
#r2c2 {
  border: solid 1px black;
}
#r3c2 {
  border-left: solid 1px black;
  border-right: solid 1px black;
}
#r2c1, #r2c3 {
  border-top: solid 1px black;
  border-bottom: solid 1px black;
}
#winner {
  font-size: 100px;
  position: absolute;
  top: 0;
  left: 0;
}
</style>
<b id="winner"></b>
<div id="tictactoe">
  <input type="text" class='tictactoebox' id="r1c1" name="r1c1"><input type="text" class='tictactoebox' id="r1c2" name="r1c2"><input type="text" class='tictactoebox' id="r1c3" name="r1c3"><br>
  <input type="text" class='tictactoebox' id="r2c1" name="r2c1"><input type="text" class='tictactoebox' id="r2c2" name="r2c2"><input type="text" class='tictactoebox' id="r2c3" name="r2c3"><br>
  <input type="text" class='tictactoebox' id="r3c1" name="r3c1"><input type="text" class='tictactoebox' id="r3c2" name="r3c2"><input type="text" class='tictactoebox' id="r3c3" name="r3c3">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
var currentLetter = "X";
$( ".tictactoebox" ).click(function() {
  $(this).val(currentLetter);
  if(currentLetter == "X")
  {
    currentLetter = "O";
  }
  else {
    currentLetter = "X";
  }
  $(this).trigger("change");
});
$( ".tictactoebox" ).change(function() {
  var ids = ["r1c1","r1c2","r1c3","r2c1","r2c2","r2c3","r3c1","r3c2","r3c3"];
  var winningCombinations = [
    //horizontal
    [0,1,2],[3,4,5],[6,7,8],
    //vertical
    [0,3,6],[1,4,7],[2,5,8],
    //diagonal
    [0,4,8],[2,4,6]
  ]
  var thisValue = $(this).val();
  if(thisValue != "x" && thisValue != "o" && thisValue != "O" && thisValue != "X")
  {
    alert("You must input 'x' or 'o'");
    $(this).val("");
  }
  else {
    $(this).val($(this).val().toUpperCase());
    if(checkCatsGame(ids))
    {
      $("#winner").html("Cat's Game!");
    }
    else {
      var winningLetter = checkWinner(ids,winningCombinations);
      if(winningLetter != "none")
      {
        $("#winner").html(winningLetter.toUpperCase() + "'s Win!");
      }
    }
  }
});

function checkCatsGame(ids)
{
  var filled = 0;
  $.each(ids, function( index, value )
  {
    if($("#"+value).val() != "")
    {
      filled++;
    }
  });
  if(filled == 9)
  {
    return true;
  }
  else {
    return false;
  }
}

function checkWinner(ids,winningCombinations)
{
  var winningLetter = "none";
  for(var i = 0; i < winningCombinations.length; i++)
  {
    var x = $("#"+ids[winningCombinations[i][0]]).val();
    var y = $("#"+ids[winningCombinations[i][1]]).val();
    var z = $("#"+ids[winningCombinations[i][2]]).val();
    if(x == y && x == z && y == z && x != "")
    {
      return(x);
    }
  }
  return(winningLetter);
}
</script>
