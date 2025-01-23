var transparentDemo = true;
var fixedTop = false;

$(window).scroll(function(e) {
    oVal = ($(window).scrollTop() / 170);
    console.log("Opacity value for blur is "+oVal)
    $(".blur").css("opacity", oVal);
    // $(".blur").css("filter", "blur("+oVal+")");
    
});

