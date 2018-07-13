$(document).ready(function(){

// Method 1 - uses 'data-toggle' to initialize
$('[data-toggle="myToolTip"]').tooltip();

/* - - - - - - - - - - - - - - - - - - - */

// Method 2 - uses the id, class or native tag, could use .btn as class

$('button').tooltip();

// options set in JS by class
    $(".tip-top").tooltip({
        placement : 'top'
    });
    $(".tip-right").tooltip({
        placement : 'right'
    });
    $(".tip-bottom").tooltip({
        placement : 'bottom'
    });
    $(".tip-left").tooltip({
        placement : 'left',
        html : true
    });

    $(".tip-auto").tooltip({
        placement : 'auto',
        html : true
    });

});
