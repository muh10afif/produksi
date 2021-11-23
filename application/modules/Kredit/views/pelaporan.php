<div class="container">
	<?= $this->session->flashdata('msg'); ?>	
 <form method="POST" action="<?= base_url('Kredit/Kredit_konsumtif/excel'); ?>" autocomplete="off">
		<table>
			<tr>
				<td style="width: 250px;height: 40px;">Periode</td>
				<td><input class="form-control" id="start" name="start"></td>
				<td><input class="form-control" id="end" name="end"></td>
			</tr>
			<tr>
				<td style="width: 250px;height: 80px;">Asuransi</td>
				<td colspan="3">
					<select name="id_asuransi" id="s_asuransi" class="form-control" name="id_asuransi"></select>
				</td>
			</tr>
			<tr>
				<td style="width: 250px;height: 80px;"></td>
				<td colspan="3">
					<div class="form-group">
						<div class="card">
							<div class="card-header">
								<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="select_all">
							    <label class="form-check-label" for="select_all">Pilih Semua</label>
							  </div>	
							</div>
							<div class="card-body">
								<?php $i = 1 ?>
								<?php foreach ($data_cabang as $cb) {?>
								<div class="form-check">
									<input type="checkbox" name="id_cabang_asuransi[]" class="form-check-input parent" id="check<?= $cb->id_cabang_asuransi ?>" value="<?= $cb->id_cabang_asuransi ?>">
									<label class="form-check-label" for="check<?= $cb->id_cabang_asuransi ?>"><?= $cb->nama_cabang;?></label>
								</div>
								<div class="collapse" id="collapse<?= $cb->id_cabang_asuransi ?>">
									<div class="card card-body">
										<?php foreach ($data_bank as $b) { ?>
											<div class="form-check">
												<input  type="checkbox" class="form-check-input" name="id_bank[]" value="<?= $b->id_bank ?>" id="<?= $b->id_bank ?>">
												<label class="form-check-label" for="<?= $b->id_bank ?>"><?= $b->nama_bank ?></label>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php $i++; }; ?>
							</div>
						</div>
						<button class="btn btn-success float-right" type="submit">Export</button>
						<button class="btn btn-primary float-right mr-2" id="reset">Reset</button>
					</div>
				</td>
			</tr>
		</table>
	</form>
</div>

<!-- <div class="container">
	<?= $this->session->flashdata('msg'); ?>	
	<form method="POST" action="<?= base_url('Kredit/Kredit_konsumtif/excel'); ?>" autocomplete="off">
		<table>
			<tr>
				<td style="width: 250px;height: 40px;">Periode</td>
				<td><input  class="form-control datepicker" id="start"></td>
				<td><input  class="form-control datepicker" id="end"></td>
			</tr>
			<tr>
				<td style="width: 250px;height: 80px;">Asuransi</td>
				<td colspan="3">
					<select name="id_asuransi" id="s_asuransi" class="form-control" name="id_asuransi" required="required">
						<option data="NULL" value="NULL">-- Pilih Asuransi --</option>
						<?php foreach ($data_asuransi as $asr) {?>
						<option data="<?= $asr->id_asuransi;?>" value="<?= $asr->id_asuransi;?>"><?= $asr->nama_asuransi;?></option>
						<?php }; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="width: 250px;height: 80px;"></td>
				<td colspan="3">
					<div class="form-group">
						<div class="card">
							<div class="card-header">
								<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="select_all">
							    <label class="form-check-label" for="select_all">Pilih Semua</label>
							  </div>	
							</div>
							<div class="card-body">
								<?php $i = 1 ?>
								<?php foreach ($data_cabang as $cb) {?>
								<div class="form-check">
									<input  type="checkbox" name="id_cabang_asuransi" class="form-check-input"  data-toggle="collapse" id="exampleCheck1" href="#collapseExample<?= $i ?>"  aria-expanded="false" aria-controls="collapseExample" value="<?= $cb->id_cabang_asuransi ?>" id="<?= $cb->id_cabang_asuransi ?>">
									<label class="form-check-label" for="exampleCheck1"><?= $cb->nama_cabang;?></label>
								</div>
								<div class="collapse" id="collapseExample<?= $i ?>">
									<div class="card card-body">
										<?php foreach ($data_bank as $b) { ?>
											<div class="form-check">
												<input  type="checkbox" class="form-check-input" name="id_bank[]" value="<?= $b->id_bank ?>">
												<label class="form-check-label" for="exampleCheck1"><?= $b->nama_bank ?></label>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php $i++; }; ?>
							</div>
						</div>
						<button type="submit" class="btn btn-success float-right">Export</button>
						<a href="<?= base_url('Kredit/Kredit_konsumtif/pelaporan') ?>" class="btn btn-primary float-right mr-2">Reset</a>
					</div>
				</td>
			</tr>
		</table>
	</form>
</div>

 -->