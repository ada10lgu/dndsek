<html>

<head>

</head>
<body>
<br/>
fsdfsdfsddfds<canvas id="myCanvas" width="800" height="300" style="border:1px solid #000000;">
</canvas>

<script>
var c = document.getElementById("myCanvas");
var m = false;

var centerX = c.width/2;
var centerY = c.height/2; 

var prevX = 0;
var prevY = 0;

var size = 20;
var width = 15;
var height = 5;

var mouseX = 0;
var mouseY = 0;

c.addEventListener("mousemove", moving,false);
c.addEventListener("mouseup", released,false);
c.addEventListener("mouseout",released,false   );
c.addEventListener("mousedown",pressed ,false);

draw(0,0);
function moving(e) {
    var rect = c.getBoundingClientRect();
    mouseX = Math.round(e.x - rect.left);
    mouseY = Math.round(e.y - rect.top);

    if (m) {
        centerX += e.x - prevX;
        centerY += e.y - prevY;

        prevX = e.x;
        prevY = e.y;
    }
    draw();
}

function pressed(e) {
    m = true;
    prevX = e.x;
    prevY = e.y;
}

function released(e) {
    m = false;
    var rect = c.getBoundingClientRect();
    var x = e.x - rect.left;
    var y = e.y - rect.top;
    
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
    
    
    var w = size*2;
    var h = Math.sqrt(3)/2 * w;

    ctx.beginPath();
    for (x = -width; x <= width; x++) { 
        for (y = -height; y <= height; y++) { 
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

    
       
    {
        xx = 10;
        yy = 10;
        ww = 85;
        hh = 20;
        ctx.clearRect(xx,yy,ww,hh);
        ctx.strokeRect(xx,yy,ww,hh);
        ctx.font = "12px Arial";
        ctx.fillText("Center to base",xx+2,yy+hh-5);
    }
    {
        xx = 10;
        yy = c.height - 30;
        ww = 85;
        hh = 20;
        ctx.clearRect(xx,yy,ww,hh);
        ctx.strokeRect(xx,yy,ww,hh);
        ctx.font = "12px Arial";
        ctx.fillText("x: " + (mouseX-centerX) + " y: " + (mouseY-centerY),xx+2,yy+hh-5);
    }
    


   

}


</script>
</body>
</html>