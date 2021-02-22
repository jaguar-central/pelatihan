<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p20">
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-2">Pelatihan LPJ</h2>
					</div>
				</div>
			</div>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#detail_pelatihan">Detail Pengajuan
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"></path>
						</svg></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#inputan_kehadiran">Inputan Kehadiran
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"></path>
						</svg></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#inputan_lpj">Inputan Lpj
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"></path>
						</svg></a>
				</li>
			</ul>


			<div class="tab-content">

				<?php $this->load->view("pelatihan/lpj/detail_pelatihan"); ?>
				<?php $this->load->view("pelatihan/lpj/inputan_kehadiran"); ?>
				<?php $this->load->view("pelatihan/lpj/inputan_lpj"); ?>

			</div>



		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->