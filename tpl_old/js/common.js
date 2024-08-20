jQuery(document).ready(function() {
  setEqualHeight(jQuery(".carousel-mime .thumbnail"));
  window.onresize = function() {
    jQuery(".carousel-mime .thumbnail").css({'height': 'auto'});
    jQuery(".carousel-mime .thumbnail .carousel-slide").css({'height': 'auto'});
    setEqualHeight(jQuery(".carousel-mime .thumbnail"));
  };
  setEqualHeight(jQuery("#node-52 .media-title"));
});

if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
  var msViewportStyle = document.createElement("style");
  msViewportStyle.appendChild(
    document.createTextNode(
      "@-ms-viewport{width:auto!important}"
    )
  );
  document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
}

function setEqualHeight(columns) {
    var tallestcolumn = 0;
    columns.each(function() {
        currentHeight = jQuery(this).outerHeight();
        if (currentHeight > tallestcolumn) {
            tallestcolumn = currentHeight;
        }
    });
    columns.height(tallestcolumn);
}