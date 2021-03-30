<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ANTRIAN</title>
    <link href="<?php echo base_url('assets/template/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/template/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/template/vendor/jquery/jquery.min.js')?>"></script>
	<style>
	#kotakantrian {
	/* height: 100px;
	width: 200px; */
	position: fixed;
	bottom: 10px;
	right: -150px;
	width: 200px;
	/* width: 5%; */
	/* display: inline-block */
	}

	.active {
	/* width: 75%; */
	width: 200px;
	right: 10px !important;
	}
	.nonactive {
	/* width: 10%; */
	width: 200px;
	}
	#kotakantrian,
	.active,
	.nonactive {
	-webkit-transition: width 1s ease-in-out;
	-moz-transition: width 1s ease-in-out;
	-o-transition: width 1s ease-in-out;
	transition: width 1s ease-in-out;
	}

	</style>
</head>

<div class="row" style="margin-left: 0; margin-right: 0;">
<!-- <div class="col-xl-2 col-lg-5" style=" margin: auto; width: 200px !important; " id="kotakantrian"> -->
<div id="kotakantrian">
<div class="row">
	<div style="margin: auto; margin-right : 0px;">
		<button class="btn btn-md btn-primary" id="toggle"><i class="fas fa-angle-double-left"></i></button>
	</div>
    <div class="card shadow mb-4">
    	<div class="loket">
        <!-- Card Header - Dropdown -->
       <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <div class="dropdown center" style="width: 100%; display: block;" >
            	<select class="form-control" id="pilihloket">
            		<option value="" selected>Pilih Loket</option>
				    <option <?php if($this->session->userdata('nomorloket') == '0'){echo 'selected';}?> value="0">LOKET 1</option>
				    <option value="1" <?php if($this->session->userdata('nomorloket') == '1'){echo 'selected';}?>>LOKET 2</option>
				</select>
            </div>
			<input type="hidden" id="namaloket" value="<?php if($this->session->userdata('nomorloket') == 0){ echo 'LOKET 1';}else if($this->session->userdata('nomorloket') == 1){echo 'LOKET 2';}?>"/>
        </div>
        <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        	<?php if($this->session->userdata('sessionabjad') == 'A'){ ?>
        	<a href="#" class="btn btn-danger btn-circle" data-value="A" id="abjadA"><b>A</b>
            </a>
            <a href="#" class="btn btn-primary btn-circle" data-value="B" id="abjadB"><b>B</b></a>
            <input type="hidden" name="pilihabjad" id="pilihabjad" value="A"/>
        	<?php }elseif($this->session->userdata('sessionabjad') == 'B'){?>
        	<a href="#" class="btn btn-primary btn-circle" data-value="A" id="abjadA"><b>A</b>
            </a>
        	<a href="#" class="btn btn-danger btn-circle" data-value="B" id="abjadB"><b>B</b>
            </a>
            <input type="hidden" name="pilihabjad" id="pilihabjad" value="B"/>
        	<?php }elseif($this->session->userdata('sessionabjad') == ''){?>
            <a href="#" class="btn btn-primary btn-circle" data-value="A" id="abjadA"><b>A</b>
            </a>
            <a href="#" class="btn btn-primary btn-circle" data-value="B" id="abjadB"><b>B</b>
            </a>
            <input type="hidden" name="pilihabjad" id="pilihabjad"/>
        	<?php }?>
            
        </div>
    	</div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="card-body">
             
               <div class="agenda">
				<h3 id="a" style="text-align: center;"><?= $antrian->AWAL;?></h3>
				<input type="hidden" name="nomerantrian" id="nomerantrian" value="">
				<input type="hidden" name="urutanloket" id="urutanloket" value="<?= $antrian->AWAL;?>">
					<br>
						<center>
							<div>
								<button type="button" style="width: 100%;" class="btn btn-md btn-primary" onclick="panggil()" id="panggil"><span class="text">Ulang</span></button>  	
							</div>
							<p></p>
							<div>
							<button type="button" id="antrianselanjutnya" class="btn selanjutnya btn btn-warning btn-md" style="width: 100%;">Panggil</button>
							</div>
							
						</center>
					<br>
				</div>
            </div>
            <div class="text-center ">
					<div>
					<p>Sisa antrian: <span id="sisaantrian"></span></p>
					</div>
					
					<div>
						<a href="<?php echo base_url('AntrianPanggilan/destroy');?>" class=" btn btn-danger btn-md" style="width: 100%;"><i class="fas fa-sync-alt"></i>
						RESET</a>
					</div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
$('#toggle').click(function() {
  $(this)
    // get div 
	.parent()
    .parent()
	.parent()
    // remove nonactive class from clicked element
    .removeClass('nonactive')
    // toggle active class
    .toggleClass('active')
    // get sibling divs
    .siblings()
    // remove active class from siblings
    .removeClass('active')
    // toggle nonactive class based on the clicked element 
    .toggleClass('nonactive', $(this).parent().is('.active'));
})
</script>
<script>
		$('#pilihloket').on('change', function() {
		    var src = $(this).val();
		    $.post("<?php echo base_url();?>/AntrianPanggilan/set_session/", {"nomor": src});

			if(src == 0){
				$('#namaloket').val('LOKET 1');
			}else if(src == 1){
				$('#namaloket').val('LOKET 2');
			}
		});
</script>
<script>
        $('#abjadA').on('click', function() {
        	var abjad = $(this).data("value");
			$("#pilihabjad").val(abjad);
			$("#abjadA").attr('class', 'btn btn-danger btn-circle');
			$("#abjadB").attr('class', 'btn btn-primary btn-circle');
			$.post("<?php echo base_url();?>/AntrianPanggilan/set_session_abjad/", {"nomorabjad": abjad});
		});
        $('#abjadB').on('click', function() {
        	var abjad = $(this).data("value");
			$("#pilihabjad").val(abjad);
			$("#abjadB").attr('class', 'btn btn-danger btn-circle');
			$("#abjadA").attr('class', 'btn btn-primary btn-circle');
			$.post("<?php echo base_url();?>/AntrianPanggilan/set_session_abjad/", {"nomorabjad": abjad});
        });
</script>
	<script>
		$('#antrianselanjutnya').on('click', function() {
		    var loket = $('#pilihloket').val();
		    var abjadx = $('#pilihabjad').val();
			
		    $.get(
              "<?php echo base_url().'AntrianPanggilan/antrian_selanjutnya/'; ?>",
              {abjad: abjadx, loket: loket},function(data){
				//console.log(JSON.parse(data));
                $("#a").html(JSON.parse(data));
                $("#urutanloket").val(JSON.parse(data));
				$("#nomorantrian").val(JSON.parse(data));
            });
			$.get(
              "<?php echo base_url().'AntrianPanggilan/get_sisa_antrian/'; ?>",
              {abjad: abjadx, loket: loket},function(data){

				setTimeout(() => {
                $("#sisaantrian").html(JSON.parse(data));
				}, 200);
            });
			setTimeout(() => {
				panggil();
				// doSomethingElse();
			}, 500);
			// panggil.callback();
		});
</script>
<script src="<?php echo base_url('assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?php echo base_url('assets/template/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
<script src="<?php echo base_url('assets/template/js/sb-admin-2.min.js')?>"></script>

</body>

</html>