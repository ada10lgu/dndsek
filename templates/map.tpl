<svg id="color-fill" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="300" xmlns:xlink="http://www.w3.org/1999/xlink">
  
  <polygon class="hex" points="300,150 225,280 75,280 0,150 75,20 225,20"></polygon>
  
</svg>

<h1>Color Fill with anchor</h1>

<svg id="color-fill-anchor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="300" xmlns:xlink="http://www.w3.org/1999/xlink">
  
  <a xlink:href="http://viget.com">
    <polygon class="hex" points="300,150 225,280 75,280 0,150 75,20 225,20" fill="#fa5"></polygon>
  </a>
  
</svg>

<h1>Image Fill</h1>

<svg id="image-fill" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="300" xmlns:xlink="http://www.w3.org/1999/xlink">

  <defs>
     <pattern id="image-bg" x="0" y="0" height="300" width="300" patternUnits="userSpaceOnUse">
       <image width="300" height="300" xlink:href="http://placekitten.com/306/306"></image>
    </pattern>
  </defs>
  
  <polygon class="hex" points="300,150 225,280 75,280 0,150 75,20 225,20" fill="url('#image-bg')"></polygon>
  
</svg>
