<html>

<head>

</head>
<body>
fsd<canvas id="myCanvas" width="800" height="300" style="border:1px solid #000000;">
</canvas>

<script>
var c = document.getElementById("myCanvas");
var m = false;

var centerX = c.width/2;
var centerY = c.height/2; 


var prevX = 0;
var prevY = 0;

c.addEventListener("mousemove", moving,false);
c.addEventListener("mouseup", released,false);
c.addEventListener("mouseout",released,false   );
c.addEventListener("mousedown",pressed ,false);

draw(0,0);
function moving(e) {
    if (!m)
        return;
    centerX += e.x - prevX;
    centerY += e.y - prevY;

    prevX = e.x;
    prevY = e.y;

    draw();
}

function pressed(e) {
    m = true;
    prevX = e.x;
    prevY = e.y;
}

function released(e) {
    m = false;
    if (e.x >=10 && e.x <= 95 && e.y >= 10 && e.y <= 30) {
        centerX = c.width/2;
        centerY = c.height/2;
        draw();
       // location.href = "http://example.com";
    }
}

function draw() {
    var ctx = c.getContext("2d");
    ctx.clearRect(0, 0, c.width, c.height);
    var size = 20;
    
    var w = size*2;
    var h = Math.sqrt(3)/2 * w;

    ctx.beginPath();
    ctx.moveTo(centerX - w/2,centerY);
    ctx.lineTo(centerX - w/4,centerY - h/2);
    ctx.lineTo(centerX + w/4,centerY - h/2);
    ctx.lineTo(centerX + w/2,centerY);
    ctx.lineTo(centerX + w/4,centerY + h/2);
    ctx.lineTo(centerX - w/4,centerY + h/2);
    ctx.lineTo(centerX - w/2,centerY);   
    ctx.stroke();

    ctx.clearRect(10, 10, 85, 20);
    ctx.strokeRect(10,10,85,20 );
    ctx.font = "12px Arial";
    ctx.fillText("Center to base",12,25);
}


</script>
</body>
</html>