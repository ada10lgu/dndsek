/*! Splitshot by perry! 2018-01-23 */
var dividers = document.getElementsByClassName("divider");
for (var i=0; i < dividers.length; i++) {
	var divider = dividers[i];
  (function(d) { 
    d.isDragging = false;
    d.addEventListener('mousedown', function(e) {
      d.isDragging = true;
    })
    var outer = d.parentElement;
    window.addEventListener('mousemove', function(e) {
      if (d.isDragging) {
        var rect = outer.getBoundingClientRect();
        var el = outer.children[0];
        el.style.width = (100*(e.pageX - rect.left)/rect.width) + '%';
      }
    })
    window.addEventListener('mouseup', function(e) {
      d.isDragging = false;
    });
  })(divider);
}