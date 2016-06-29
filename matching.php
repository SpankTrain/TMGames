<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<style>
#cards {
  text-align: center;
  margin: auto;
}

.card {
	text-align: center;
	width: 50px;
	height: 50px;
	font-weight: bold;
	font-size: 20px;
}

</style>

<script>
count = 1;
numRC = 0;
cardIds = [];
colors = [];
pairs = [];
getHeightAndWidth();
shuffle(cardIds);
setColors();
console.log(pairs);
firstClick = '';
secondClick = '';
function getHeightAndWidth()
{
  var x = -1;
  while(x < 0)
  {
    var num=prompt("Enter an even number between 2 and 10","2");
    if (num!=null && Number(num) >= 2 && Number(num) <= 10 && Number(num)%2 == 0)
    {
      x = Number(num);
      numRC = x;
      printCards(x);
      generateColors(x);
    }
  }
}

function printCards(num)
{
  document.write("<div id='cards'>")
  for(var i = 0; i < num; i++)
  {
    for(var j = 0; j < num; j++)
    {
      var card = "r"+i+"c"+j;
      cardIds.push(card);
      document.write("<input type='button' class='card' id='"+card+"' name='"+card+"' value='"+count+"'>");
      count++;
    }
    document.write("<br>");
  }
  document.write("</div>");
}

function generateColors(x)
{
  var n = (x*x)/2;
  for(var i = 0; i < n; i++)
  {
    var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
    if(colors.indexOf(randomColor) < 0)
    {
      colors.push(randomColor);
    }
  }
}

function setColors()
{
  var cardCount = 0;
  for(var i = 0; i < colors.length; i++)
  {
    var card1 = cardIds[cardCount];
    var color = colors[i];
    $("#"+cardIds[cardCount]).css("background-color",colors[i]);
    cardCount++;
    var card2 = cardIds[cardCount];
    $("#"+cardIds[cardCount]).css("background-color",colors[i]);
    cardCount++;

    var pair = {
      "card1":card1,
      "card2":card2,
      "color":color
    }
    pairs.push(pair);
  }
}

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }
  return array;
}

setTimeout(function(){
  $.each(pairs, function( index, value ) {
    var pair = value;
    var c1 = value["card1"];
    var c2 = value["card2"];
    $("#"+c1).css('background-color', 'transparent');
    $("#"+c2).css('background-color', 'transparent');
  });
},5000);

$('.card').click(function() {
  if(firstClick == '')
  {
    firstClick = $(this).attr('id');
  }
  else if(secondClick == '')
  {
    secondClick = $(this).attr('id');
    if(firstClick == secondClick)
    {
      secondClick = '';
    }
    if(secondClick != '')
    {
      if(checkMatch(firstClick,secondClick))
      {
        firstClick = '';
        secondClick = '';
      }
      else
      {
        alert("You Lose!");
      }
    }
  }
});

function checkMatch(a,b)
{
  var isMatch = false;
  $.each(pairs, function( index, value ) {
    var pair = value;
    var c1 = value["card1"];
    var c2 = value["card2"];
    var color = value["color"];
    if((a == c1 || a == c2) && (b == c1 || b == c2))
    {
      $("#"+c1).css("background-color",color);
      $("#"+c2).css("background-color",color);
      isMatch = true;
    }
  });
  return isMatch;
}
</script>
