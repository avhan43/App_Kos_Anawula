<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="#">Avhan</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./Wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- jsgrid -->
<script src="plugins/jsgrid/jsgrid.min.css"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="jamServer.js"></script>

<script>
    // document.body.requestFullscreen();

    $(function() {
        $("#jsGrid1").jsGrid({
            height: "100%",
            width: "100%",

            sorting: true,
            paging: true,


        });
    });
    // Function ini dijalankan ketika Halaman ini dibuka pada browser
    $(document).ready(function() {
        function clock() {
            var now = new Date();
            var secs = ('0' + now.getSeconds()).slice(-2);
            var mins = ('0' + now.getMinutes()).slice(-2);
            var hr = now.getHours();
            var Time = hr + ":" + mins + ":" + secs;
            document.getElementById("watch").innerHTML = Time;
            requestAnimationFrame(clock);
        }

        requestAnimationFrame(clock);
        // Set the date we're counting down to
        var countDownDate = new Date("<?= $batas; ?>").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            // document.getElementById("time").innerHTML = days + " Hari " + hours + " : " +
            // minutes + " : " + seconds + " ";
            document.getElementById("hari").innerHTML = days + " Hari";
            document.getElementById("jam").innerHTML = hours;
            document.getElementById("menit").innerHTML = minutes;
            document.getElementById("detik").innerHTML = seconds;

            // If the count down is finished, write some text
            // if (distance < 0) {
            //     clearInterval(x);
            //     document.getElementById("demo").innerHTML = "EXPIRED";
            // }
        }, 1000);

        $('#berakhir').load('berakhir.php');

    });
</script>
</body>

</html>