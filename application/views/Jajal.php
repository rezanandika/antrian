<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jajal</title>
</head>
<body>
    <audio id="antrian" src="<?php echo base_url('audio/Audio/'.substr($awal, -1,1).'.wav'); ?>"></audio>
    <button id="play" onclick="mainkan()">Panggil</button>

    <script src="<?php echo base_url('assets/template/vendor/jquery/jquery.min.js')?>"></script>

    <script>
        function mainkan() {
            var suara = $('#antrian');
            console.log('suara', suara);
            suara.play();
        }
    </script>
</body>
</html>