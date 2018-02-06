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
    var x = e.x + c.clientLeft;
    var y = e.y + c.clientTop;
    
    if (x >=10 && x <= 95 && y >= 10 && y <= 30) {
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
    for (x = -3; x < 3; x++) { 
        for (y = -3; y < 3; y++) { 
            a = centerX + x*3/4*w;
            b = centerY + y*h + Math.abs(x)%2 * 1/2*h;


            ctx.moveTo(a - w/2,b);
            ctx.lineTo(a - w/4,b - h/2);
            ctx.lineTo(a + w/4,b - h/2);
            ctx.lineTo(a + w/2,b);
            ctx.lineTo(a + w/4,b + h/2);
            ctx.lineTo(a - w/4,b + h/2);
            ctx.lineTo(a - w/2,b);           
        }
    }
    ctx.stroke();

    
    
    

    ctx.clearRect(10, 10, 85, 20);
    ctx.strokeRect(10,10,85,20 );
    ctx.font = "12px Arial";
    ctx.fillText("Center to base",12,25);
}


</script>
</body>
</html>