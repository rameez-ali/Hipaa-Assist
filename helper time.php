<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<span id="minutes"></span>:<span id="seconds"></span>

<script type="text/javascript">
    var sec = 0;
    function pad ( val ) { return val > 9 ? val : "0" + val; }
    setInterval( function(){
        $("#seconds").html(pad(++sec%60));
        $("#minutes").html(pad(parseInt(sec/60,10)));
    }, 1000);
</script>

https://stackoverflow.com/questions/5517597/plain-count-up-timer-in-javascript

var now = <?php echo time() ?> * 1000;