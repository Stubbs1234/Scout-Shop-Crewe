<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/stylesign.css">
    <meta charset="utf-8">
    <title>Signature</title>
    <meta name="description" content="Signature Pad - HTML5 canvas based smooth signature drawing using variable width spline interpolation.">



    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

</head>
<body onselectstart="return false">
<form action="" method="post" id="urlForm" name="urlForm">
    <input type="hidden" name="url" id="url" value="" /><input type="hidden" name="urlForm" value="true"/>
</form>
<div id="signature-pad" class="m-signature-pad">
    <div class="m-signature-pad--body">
        <canvas></canvas>
    </div>
    <div class="m-signature-pad--footer">
        <div class="description">Please Sign above</div>
        <div class="left">
            <button type="button" id="clear" class="btn btn-primary btn-lg" data-action="clear">Clear</button>
        </div>
        <div class="right">

            <button type="button" id="save" class="btn btn-primary btn-lg" data-action="save-png">Save</button>
        </div>
    </div>
</div>

<!--<script src="js/signature_pad.js"></script>-->
<script type="text/javascript">
    var str;
    var wrapper = document.getElementById("signature-pad"),
        clearButton = wrapper.querySelector("[data-action=clear]"),
        savePNGButton = wrapper.querySelector("[data-action=save-png]"),
        saveSVGButton = wrapper.querySelector("[data-action=save-svg]"),
        canvas = wrapper.querySelector("canvas"),
        signaturePad;

    // Adjust canvas coordinate space taking into account pixel ratio,
    // to make it look crisp on mobile devices.
    // This also causes canvas to be cleared.
    function resizeCanvas() {
        // When zoomed out to less than 100%, for some very strange reason,
        // some browsers report devicePixelRatio as less than 1
        // and only part of the canvas is cleared then.
        var ratio =  Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }

    window.onresize = resizeCanvas;
    resizeCanvas();

    signaturePad = new SignaturePad(canvas);

    clearButton.addEventListener("click", function (event) {
        signaturePad.clear();
    });

    savePNGButton.addEventListener("click", function (event) {
        if (signaturePad.isEmpty()) {
            alert("Please provide signature first.");
        } else {
            str = signaturePad.toDataURL();

            sessionStorage.setItem("sign", str);

            $("#url").val(str);
            $( "#urlForm" ).submit();
        }

    });

</script>
</body>
</html>

