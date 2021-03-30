<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ANTRIAN</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/template/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/template/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/template/vendor/jquery/jquery.min.js')?>"></script>
    <style type="text/css">

    *{
      padding: 0;margin: 0;
    }
    html, 
    body {
        height: 100% !important;
        padding: 0;
        min-height: 100% !important;
        /* background-color: #F8339F; */
        background-color:#ddddff;
    }
    marquee {
      margin-top: 5px;
      width: 100%;
    }

    .runtext-container {
    /* background-color:#ddddff; */
    /* background-color: black; */
    background-color: #F8339F;
    /**background-color:#ccf;*/
    /*background-image:-moz-linear-gradient(top,#ccf,#fff);
    background-image:-webkit-gradient(linear,0 0,0 100%,from(#ccf),to(#fff));
    background-image:-webkit-linear-gradient(top,#ccf,#fff);
    background-image:-o-linear-gradient(top,#ccf,#fff);*/
    /*background-image:linear-gradient(to bottom,#ccf,#fff);*/
    /*background-repeat:repeat-x;*/
      /*border: 4px solid #000000;*/
      /*box-shadow:0 5px 20px rgba(0, 0, 0, 0.9);*/

    width: 100%;
    overflow-x: hidden;
    overflow-y: visible;
    /*margin: 0 60px 0 30px;*/
    padding:0 3px 0 3px;
    }

    .main-runtext {margin: 0 auto;
    overflow: visible;
    position: relative;
    /* height: 50px; */
    }

    .runtext-container .holder {
    position: relative;
    overflow: visible;
    display:inline;
    float:left;

    }

    .runtext-container .holder .text-container {
      display:inline;
    }

    .runtext-container .holder a{
      text-decoration: none;
      font-weight: bold;
      color:#ffff;
      text-shadow:0 -1px 0 rgba(0,0,0,0.25);
      line-height: -0.5em;
      font-size:24px;
    }

    .runtext-container .holder a:hover{
      text-decoration: none;
      color:#ffff;
    }
    </style>

</head>
<body>
<div id="content-wrapper" class="d-flex flex-column" style="height: 100%;">

            <!-- Main Content -->
    <div id="content" style="height: 95%;">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="height: 10%;">
                    <div class="col-lg-12" style="text-align: center; margin: auto;">
                   <!--  <h2>RS PANTI NUGROHO PURBALINGGA</h2>
                    <p>Jl. Soekarno Hatta No.18b, Karangmanyar, Kalikabong, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53321</p> -->
                    <h2>JAJAL RSMS</h2>
                    <p>Jl. Dr. Gumbreg No.1 Purwokerto</p>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="height: 85%; padding: 0 15px 0 15px;">

                    <div class="row" style="height: 100%;">

                        <div class="col-lg-6" style="height: 100%; padding: 5px;">

                            <div class="card shadow mb-2" style="height: 70%;">
                                <!-- konten video -->
                                <iframe style = "height: 100%; width: 100%;" class="responsive-iframe" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                            </div>

                            <div class="card shadow mb-1" id="kotakloket1" style="height: 30%;">
                                <div class="card-header py-3" style="text-align: center;">
                                    <h2 class="m-0 font-weight-bold"><b>LOKET 1</b></h2>
                                </div>
                            
                                <div class="card-body" style="text-align: center; margin: auto !important; color: #ffff;">
                                    <p id="loket1"></p>
                                    <input type="hidden" name="antrianloket1" id="antrianloket1">
                                <?php
                                foreach ($loket as $row) { ?>
                                    <script type="text/javascript">
                                      setInterval(function(){
                                      // var lok = <?php echo $row['NOURUT']; ?>;
                                      var antrianloket1 = $("#antrianloket1").val();
                                      var antrianini = $('#antrianini').val();

                                      var lok = '0';
                                          $.ajax({
                                          type:"POST",
                                          dataType: 'json',
                                          url: "<?php echo site_url('Antrian/get_antri/'); ?>",
                                          data: "nourut="+lok,
                                          success:function(data){ 
                                            $("#loket1").html(data);
                                            $("#antrianloket1").val(data);
                                             }
                                        });
                                   
                                        if(antrianloket1 == antrianini){
                                          $("#loket1").attr('style',  'color:red; font-size: 58px; margin: auto;');
                                        }else{
                                          $("#loket1").attr('style',  'color:black; font-size: 58px; margin: auto;');
                                        }

                                         }, 1000);
                                      </script>
                                <?php }?>
                                </div>
                            </div>

                        </div>


                        <div class="col-lg-6" style="height: 100%; padding: 5px;">

                            <div class="card shadow mb-1" style="height: 15%; text-align: center;">
                              <div style="margin: auto;">
                              <div id="tanggal" style="font-size: 32px; font-style: bold;"></div>
                              <div id="waktu" style="font-size: 26px;"></div>
                              </div>
                              <script type="text/javascript">
                              function showTime() {
                                  var a_p = "";
                                  var today = new Date();
                                  var curr_hour = today.getHours();
                                  var curr_minute = today.getMinutes();
                                  var curr_second = today.getSeconds();
                                  if (curr_hour < 12) {
                                      a_p = "AM";
                                  } else {
                                      a_p = "PM";
                                  }
                                  if (curr_hour == 0) {
                                      curr_hour = 12;
                                  }
                                  if (curr_hour > 12) {
                                      curr_hour = curr_hour - 12;
                                  }
                                  curr_hour = checkTime(curr_hour);
                                  curr_minute = checkTime(curr_minute);
                                  curr_second = checkTime(curr_second);
                               document.getElementById('waktu').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                                  }
                           
                              function checkTime(i) {
                                  if (i < 10) {
                                      i = "0" + i;
                                  }
                                  return i;
                              }
                              setInterval(showTime, 500);
                              //-->
                              </script>
                           
                              <!-- Menampilkan Hari, Bulan dan Tahun -->
                              <br>
                              <script type='text/javascript'>
                                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                                var date = new Date();
                                var day = date.getDate();
                                var month = date.getMonth();
                                var thisDay = date.getDay(),
                                    thisDay = myDays[thisDay];
                                var yy = date.getYear();
                                var year = (yy < 1000) ? yy + 1900 : yy;
                                var tanggal = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
                                $('#tanggal').html(tanggal);
                                //-->
                              </script>
                           
                            </div>
                            <div class="card shadow mb-1" style="height: 55%; text-align: center;">
                                <!-- konten video -->
                              <div style="padding-top: 15px;">
                               <h1>ANTRIAN SAAT INI : </h1>
                              </div>
                               <p style="font-size: 90px; margin: auto; color: red;" id="saatini"></p>
                               <input type="hidden" name="antrianini" id="antrianini" value="">
                                
                                    <script type="text/javascript">
                                      setInterval(function(){
                                          $.ajax({
                                          type:"POST",
                                          dataType: 'json',
                                          url: "<?php echo site_url('Antrian/get_antri_ini/'); ?>",
                                          success:function(data){ 
                                             //$("#saatini").html(data);
                                             $("#antrianini").val(data);
                                             }
                                        })
                                          $.ajax({
                                          type:"POST",
                                          dataType: 'json',
                                          url: "<?php echo site_url('Antrian/get_antri_loket/'); ?>",
                                          success:function(data){ 
                                             $("#saatini").html(data);
                                             // $("#antrianini").val(data);
                                             }
                                        })
                                         }, 1000);
                                      </script>
                            
                            </div>

                            <div class="card shadow mb-1" style="height: 30%;">
                                <div class="card-header py-3" style="text-align: center;">
                                    <h2 class="m-0 font-weight-bold" style="text-align: center;"><b>LOKET 2</b></h2>
                                </div>
                          
                                <div class="card-body" style="text-align: center; margin: auto; color: #ffff;" >
                                    <p id="loket2"></p>
                                     <input type="hidden" name="antrianloket2" id="antrianloket2">
                                <?php
                                foreach ($loket as $row) { ?>
                                    <script type="text/javascript">
                                      setInterval(function(){
                                      var antrianloket2 = $("#antrianloket2").val();
                                      var antrianini = $('#antrianini').val();

                                      var lok = '1';
                                          $.ajax({
                                          type:"POST",
                                          dataType: 'json',
                                          url: "<?php echo site_url('Antrian/get_antri/'); ?>",
                                          data: "nourut="+lok,
                                          success:function(data){ 
                                             $("#loket2").html(data);
                                             $("#antrianloket2").val(data);
                                             }
                                        })
                                           
                                        if(antrianloket2 == antrianini){
                                          $("#loket2").attr('style',  'color:red; font-size: 58px; margin: auto;');
                                        }else{
                                          $("#loket2").attr('style',  'color:black; font-size: 58px; margin: auto;');
                                        }

                                         }, 1000);
                                      </script>
                                <?php }?>
                                </div>
                            
                            </div>

                        </div>

                    </div>

                </div>

    </div>

    <div class="col-md-12 runtext-container" style="position: fixed; bottom: 0; left: 0; height: 5%;">
      <div class="main-runtext">
      <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">
        <div class="holder">

        <div class="text-container">
        <a>Selamat datang di RSMS PURWOKERTO</a>
        </div>

        <div class="text-container">
        &nbsp; &nbsp; 
        <a>Selamat datang di RSMS PURWOKERTO</a>
        </div>

        <div class="text-container">
        &nbsp; &nbsp; 
        <a>Selamat datang di RSMS PURWOKERTO</a>
        </div>

        <div class="text-container">
        &nbsp; &nbsp; 
        <a>Selamat datang di RSMS PURWOKERTO</a>
        </div>

        <div class="text-container">
        &nbsp; &nbsp; 
        <a>Selamat datang di RSMS PURWOKERTO</a>
        </div>

        </div>

      </marquee>
      </div>

    </div>
            <!-- End of Footer -->

</div>
</body>
</html>