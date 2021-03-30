<input type="hidden" id="hdnSession" value="<?= $this->session->userdata('nomorloket'); ?>" />

<!-- <audio id="suara" src=""></audio> -->
<audio id="suarabel" src="<?php echo base_url('audio/Audio/dingdong.wav'); ?>" ></audio>
<audio id="suarabelnomorurut" src="" ></audio> 
<audio id="diloket" src="" ></audio>
<audio id="abjadxx" src="" ></audio>
<audio id="antrianxx" src="" ></audio>
<audio id="urutanloketxx" src="" ></audio>
<audio id="antrian1xx" src="" ></audio>
<audio id="antrian2xx" src="" ></audio>
<audio id="sepuluh" src="" ></audio>
<audio id="sebelas" src="" ></audio>
<audio id="seratus" src="" ></audio>
<audio id="belas" src="" ></audio>
<audio id="puluh" src="" ></audio>
<audio id="ratus" src="" ></audio>


<script type="text/javascript">
		function panggil(){

			var kode = $('#pilihabjad').val();
			var urutanloket = $('#urutanloket').val();
			var loket = $('#pilihloket').val();
			var namaloket = $('#namaloket').val();
			$.post(
              "<?php echo base_url().'AntrianPanggilan/insert_panggil/'; ?>",
              {kode: kode, loket: loket, urutanloket: urutanloket, namaloket: namaloket},function(data){
                // $("#a").html(data);
                // $("#urutanloket").val(data);
				// $("#nomorantrian").val(data);
            });

	
				// isPaused = true;
				mainkan();
				setTimeout(() => {
					updateselesai();
			}, 13000);
				
			// setTimeout(() => {
			// 	// alert();
			// }, 13000);
			

		function mainkan(){

			document.getElementById("suarabel").pause();
			document.getElementById("suarabel").currentTime=0;
			document.getElementById("suarabel").play();

			var urutantrian = document.getElementById("urutanloket").value;
			var pilihloket =  document.getElementById("pilihloket").value;
			var varantrian =  urutantrian.substr(1);
			var antrianz = parseInt(varantrian);
			var belasan = urutantrian.substr(-1,1);
			var puluhan = varantrian.substr(2,1);
			var puluhanb = varantrian.substr(-1,1);
			var ratusan = varantrian.substr(-2,1);
			var ratusand = varantrian.substr(1,1);

			var totalwaktu = 8568.163;
			var abjad = document.getElementById("pilihabjad").value;

			totalWaktu = document.getElementById("suarabel").duration*1000;

			//playnomerurutnya
			setTimeout(function(){
				$('#suarabelnomorurut').attr('src', '<?= base_url(); ?>audio/Audio/NOANTRIAN.wav');
				document.getElementById("suarabelnomorurut").pause()
				;document.getElementById("suarabelnomorurut").currentTime=0;
				document.getElementById("suarabelnomorurut").play();
			}, totalWaktu);
			totalWaktu=totalWaktu+2000;
			
			if(abjad == 'A'){ 
				$('#abjadxx').attr('src', '<?= base_url(); ?>audio/Audio/A.wav');
				setTimeout(function(){
					document.getElementById("abjadxx").pause();
					document.getElementById("abjadxx").currentTime=0;
					document.getElementById("abjadxx").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			}
			else if(abjad == 'B'){ 
				setTimeout(function(){
				$('#abjadxx').attr('src', '<?= base_url(); ?>audio/Audio/B.wav');
					document.getElementById("abjadxx").pause();
					document.getElementById("abjadxx").currentTime=0;
					document.getElementById("abjadxx").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			}

			if(antrianz < 10){
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+antrianz+'.wav');
				setTimeout(function(){
					document.getElementById("antrianxx").pause();
					document.getElementById("antrianxx").currentTime=0;
					document.getElementById("antrianxx").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			}
			
			else if(antrianz == 10){
				setTimeout(function(){
					$('#sepuluh').attr('src', '<?= base_url(); ?>audio/Audio/SEPULUH.wav');
					document.getElementById("sepuluh").pause();
					document.getElementById("sepuluh").currentTime=0;
					document.getElementById("sepuluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			}

			else if(antrianz == 11){
				setTimeout(function(){
					$('#sebelas').attr('src', '<?= base_url(); ?>audio/Audio/SEBELAS.wav');
					document.getElementById("sebelas").pause();
					document.getElementById("sebelas").currentTime=0;
					document.getElementById("sebelas").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			
			}

			else if(antrianz > 11 && antrianz < 20){ 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+belasan+'.wav');
				setTimeout(function(){
					document.getElementById("antrianxx").pause();
					document.getElementById("antrianxx").currentTime=0;
					document.getElementById("antrianxx").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;

				setTimeout(function(){
					$('#belas').attr('src', '<?= base_url(); ?>audio/Audio/BELAS.wav');
					document.getElementById("belas").pause();
					document.getElementById("belas").currentTime=0;
					document.getElementById("belas").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
			
			}
			
			if(antrianz == 20){ 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhan+'.wav');
				setTimeout(function(){
					document.getElementById("antrianxx").pause();
					document.getElementById("antrianxx").currentTime=0;
					document.getElementById("antrianxx").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					$('#puluh').attr('src', '<?= base_url(); ?>audio/Audio/PULUH.wav');
					document.getElementById("puluh").pause();
					document.getElementById("puluh").currentTime=0;
					document.getElementById("puluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;
			
			}
			if(antrianz > 20 && antrianz < 100){ 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhan+'.wav');
				setTimeout(function(){
					document.getElementById("antrianxx").pause();
					document.getElementById("antrianxx").currentTime=0;
					document.getElementById("antrianxx").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;

				setTimeout(function(){
					$('#puluh').attr('src', '<?= base_url(); ?>audio/Audio/PULUH.wav');
					document.getElementById("puluh").pause();
					document.getElementById("puluh").currentTime=0;
					document.getElementById("puluh").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+1000;

				 if(puluhanb == 0){
					
				 }else{
					$('#antrian1xx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhanb+'.wav');
				setTimeout(function(){
					document.getElementById("antrian1xx").pause();
					document.getElementById("antrian1xx").currentTime=0;
					document.getElementById("antrian1xx").play();
				}, totalWaktu);
				totalWaktu=totalWaktu+800;
				 }
			}
			else if(antrianz == 100){

					setTimeout(function(){
						$('#seratus').attr('src', '<?= base_url(); ?>audio/Audio/SERATUS.wav');
						document.getElementById("seratus").pause();
						document.getElementById("seratus").currentTime=0;
						document.getElementById("seratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			}
			else if (antrianz > 100 && antrianz < 110) { 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhanb+'.wav');
					setTimeout(function(){
						$('#seratus').attr('src', '<?= base_url(); ?>audio/Audio/SERATUS.wav');
						document.getElementById("seratus").pause();
						document.getElementById("seratus").currentTime=0;
						document.getElementById("seratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					setTimeout(function(){
						document.getElementById("antrianxx").pause();
						document.getElementById("antrianxx").currentTime=0;
						document.getElementById("antrianxx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			}
			else if(antrianz == 110){ 

					setTimeout(function(){
						$('#seratus').attr('src', '<?= base_url(); ?>audio/Audio/SERATUS.wav');
						document.getElementById("seratus").pause();
						document.getElementById("seratus").currentTime=0;
						document.getElementById("seratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			
					setTimeout(function(){
						$('#sepuluh').attr('src', '<?= base_url(); ?>audio/Audio/SEPULUH.wav');
						document.getElementById("sepuluh").pause();
						document.getElementById("sepuluh").currentTime=0;
						document.getElementById("sepuluh").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			
			}
			else if(antrianz == 111){ 

					setTimeout(function(){
						$('#seratus').attr('src', '<?= base_url(); ?>audio/Audio/SERATUS.wav');
						document.getElementById("seratus").pause();
						document.getElementById("seratus").currentTime=0;
						document.getElementById("seratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			
					setTimeout(function(){
						$('#sebelas').attr('src', '<?= base_url(); ?>audio/Audio/SEBELAS.wav');
						document.getElementById("sebelas").pause();
						document.getElementById("sebelas").currentTime=0;
						document.getElementById("sebelas").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			
			}
			else if(antrianz > 111 && antrianz < 120){ 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhanb+'.wav');

					setTimeout(function(){
						$('#seratus').attr('src', '<?= base_url(); ?>audio/Audio/SERATUS.wav');
						document.getElementById("seratus").pause();
						document.getElementById("seratus").currentTime=0;
						document.getElementById("seratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
					
					setTimeout(function(){
						document.getElementById("antrianxx").pause();
						document.getElementById("antrianxx").currentTime=0;
						document.getElementById("antrianxx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					setTimeout(function(){
						$('#belas').attr('src', '<?= base_url(); ?>audio/Audio/BELAS.wav');
						document.getElementById("belas").pause();
						document.getElementById("belas").currentTime=0;
						document.getElementById("belas").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			
			}
			else if(antrianz > 119 && antrianz < 200){ 
			$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+ratusan+'.wav');
					setTimeout(function(){
						$('#seratus').attr('src', '<?= base_url(); ?>audio/Audio/SERATUS.wav');
						document.getElementById("seratus").pause();
						document.getElementById("seratus").currentTime=0;
						document.getElementById("seratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					setTimeout(function(){
						document.getElementById("antrianxx").pause();
						document.getElementById("antrianxx").currentTime=0;
						document.getElementById("antrianxx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					// setTimeout(function(){
					// 	document.getElementById("antrian1").pause();
					// 	document.getElementById("antrian1").currentTime=0;
					// 	document.getElementById("antrian1").play();
					// }, totalWaktu);
					// totalWaktu=totalWaktu+800;

					setTimeout(function(){
						$('#puluh').attr('src', '<?= base_url(); ?>audio/Audio/PULUH.wav');
						document.getElementById("puluh").pause();
						document.getElementById("puluh").currentTime=0;
						document.getElementById("puluh").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
				if(puluhanb == 0){
				
				}else{
					$('#antrian1xx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhanb+'.wav');
					setTimeout(function(){
						document.getElementById("antrian1xx").pause();
						document.getElementById("antrian1xx").currentTime=0;
						document.getElementById("antrian1xx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
				}
			
			}
			else if(antrianz > 199 && antrianz < 210){ 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+ratusand+'.wav');
					setTimeout(function(){
						document.getElementById("antrianxx").pause();
						document.getElementById("antrianxx").currentTime=0;
						document.getElementById("antrianxx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					setTimeout(function(){
						$('#ratus').attr('src', '<?= base_url(); ?>audio/Audio/RATUS.wav');
						document.getElementById("ratus").pause();
						document.getElementById("ratus").currentTime=0;
						document.getElementById("ratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					if(puluhanb == 0){
				
					}else{
					setTimeout(function(){
					$('#antrian1xx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhanb+'.wav');
						document.getElementById("antrian1xx").pause();
						document.getElementById("antrian1xx").currentTime=0;
						document.getElementById("antrian1xx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
					}
			
			}
			else if(antrianz == 210){ 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+ratusand+'.wav');
					setTimeout(function(){
						document.getElementById("antrianxx").pause();
						document.getElementById("antrianxx").currentTime=0;
						document.getElementById("antrianxx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					setTimeout(function(){
						$('#ratus').attr('src', '<?= base_url(); ?>audio/Audio/RATUS.wav');
						document.getElementById("ratus").pause();
						document.getElementById("ratus").currentTime=0;
						document.getElementById("ratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					setTimeout(function(){
						$('#sepuluh').attr('src', '<?= base_url(); ?>audio/Audio/SEPULUH.wav');
						document.getElementById("sepuluh").pause();
						document.getElementById("sepuluh").currentTime=0;
						document.getElementById("sepuluh").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			
			}
			else if(antrianz == 211 || antrianz == 311 || antrianz == 411 || antrianz == 511 || antrianz == 611 || antrianz == 711 || antrianz == 811 || antrianz == 911 ){ 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+ratusand+'.wav');
					setTimeout(function(){
						document.getElementById("antrianxx").pause();
						document.getElementById("antrianxx").currentTime=0;
						document.getElementById("antrianxx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			
					setTimeout(function(){
						$('#ratus').attr('src', '<?= base_url(); ?>audio/Audio/RATUS.wav');
						document.getElementById("ratus").pause();
						document.getElementById("ratus").currentTime=0;
						document.getElementById("ratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					setTimeout(function(){
						$('#sebelas').attr('src', '<?= base_url(); ?>audio/Audio/SEBELAS.wav');
						document.getElementById("sebelas").pause();
						document.getElementById("sebelas").currentTime=0;
						document.getElementById("sebelas").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			
			}
			else if(antrianz > 211 && antrianz < 220){ 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+ratusand+'.wav');
					setTimeout(function(){
						document.getElementById("antrianxx").pause();
						document.getElementById("antrianxx").currentTime=0;
						document.getElementById("antrianxx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
					
					setTimeout(function(){
						$('#ratus').attr('src', '<?= base_url(); ?>audio/Audio/RATUS.wav');
						document.getElementById("ratus").pause();
						document.getElementById("ratus").currentTime=0;
						document.getElementById("ratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					$('#antrian1xx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhanb+'.wav');
					setTimeout(function(){
						document.getElementById("antrian1xx").pause();
						document.getElementById("antrian1xx").currentTime=0;
						document.getElementById("antrian1xx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

					setTimeout(function(){
						$('#belas').attr('src', '<?= base_url(); ?>audio/Audio/BELAS.wav');
						document.getElementById("belas").pause();
						document.getElementById("belas").currentTime=0;
						document.getElementById("belas").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
			
			}
			else if(antrianz > 219 && antrianz < 1000){ 
				$('#antrianxx').attr('src', '<?= base_url(); ?>audio/Audio/'+ratusand+'.wav');
					setTimeout(function(){
						document.getElementById("antrianxx").pause();
						document.getElementById("antrianxx").currentTime=0;
						document.getElementById("antrianxx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
					
					setTimeout(function(){
						$('#ratus').attr('src', '<?= base_url(); ?>audio/Audio/RATUS.wav');
						document.getElementById("ratus").pause();
						document.getElementById("ratus").currentTime=0;
						document.getElementById("ratus").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;

				if(puluhan != 1){
					$('#antrian1xx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhan+'.wav');
					setTimeout(function(){
						document.getElementById("antrian1xx").pause();
						document.getElementById("antrian1xx").currentTime=0;
						document.getElementById("antrian1xx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
					setTimeout(function(){
						$('#puluh').attr('src', '<?= base_url(); ?>audio/Audio/PULUH.wav');
						document.getElementById("puluh").pause();
						document.getElementById("puluh").currentTime=0;
						document.getElementById("puluh").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
				}
				if(puluhanb == 0){

				}else{
					$('#antrian2xx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhanb+'.wav');
					setTimeout(function(){
						document.getElementById("antrian2xx").pause();
						document.getElementById("antrian2xx").currentTime=0;
						document.getElementById("antrian2xx").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
				}

				if(puluhan == 1){
					$('#antrian1xx').attr('src', '<?= base_url(); ?>audio/Audio/'+puluhan+'.wav');
					setTimeout(function(){
						$('#belas').attr('src', '<?= base_url(); ?>audio/Audio/BELAS.wav');
						document.getElementById("belas").pause();
						document.getElementById("belas").currentTime=0;
						document.getElementById("belas").play();
					}, totalWaktu);
					totalWaktu=totalWaktu+800;
				}
			}
		

			totalwaktu=totalWaktu+1000;
			setTimeout(function() {
				$('#diloket').attr('src', '<?= base_url(); ?>audio/Audio/MENUJULOKET.wav');
							document.getElementById('diloket').pause();
							document.getElementById('diloket').currentTime=0;
							document.getElementById('diloket').play();
						}, totalwaktu);
			
			totalwaktu=totalwaktu+2000;

			if(pilihloket == 0){
				$('#urutanloketxx').attr('src', '<?= base_url(); ?>audio/Audio/1.wav');
			setTimeout(function() {
							document.getElementById('urutanloketxx').pause();
							document.getElementById('urutanloketxx').currentTime=0;
							document.getElementById('urutanloketxx').play();
						}, totalwaktu);	
			}
			else if(pilihloket == 1){
				$('#urutanloketxx').attr('src', '<?= base_url(); ?>audio/Audio/2.wav');
			setTimeout(function() {
							document.getElementById('urutanloketxx').pause();
							document.getElementById('urutanloketxx').currentTime=0;
							document.getElementById('urutanloketxx').play();
						}, totalwaktu);	
			}
		}

		function updateselesai(){
			$.ajax({
			type:"POST",
			dataType: 'json',
			url: "<?php echo site_url('AntrianPanggilan/update_selesai/'); ?>",
			data: "antrian="+urutanloket,
			success:function(data){ 

				}
			})
		}
			
	
		}

	</script>