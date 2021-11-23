
    <input type="hidden" name="id_bg" id="id_bg">
    <div class="form-row">
<!--kolom 1-->
      <div class="col-md-6 ">
        
        <select name="nama_asr" id="nama_asr" class="form-control" required="required">
          <option disabled="disabled" selected="selected">-- Pilih Asuransi --</option>
            <?php foreach ($data_asuransi as $asr) {?>
          <option value="<?= $asr->id_asuransi;?>"><?= $asr->nama_asuransi ?></option>
            <?php } ?>
        </select>
        <select name="cb_as" id="cb_as" class="form-control" required="required">
          <option value="">-- Pilih Cabang Asuransi --</option>
            <?php foreach ($data_cabang as $cb) {?>
          <option value="<?= $cb->id_cabang_asuransi;?>" data-chained="<?= $cb->id_asuransi ?>"><?= $cb->nama_cabang ?></option>
            <?php } ?>
        </select>
        <select name="nama_bank" id="nama_bank" class="form-control" required="required">
            <?php foreach ($data_bank as $bank) {?>
          <option value="<?= $bank->id_bank;?>"><?= $bank->nama_bank ?></option>
            <?php } ?>
        </select>
        <input type="text" class="form-control" name="no_regis" id="no_regis" placeholder="Nomor Registrasi">
        <input  class="form-control datepicker" name="tgl_regis" id="tgl_regis" placeholder="Tanggal Registrasi">
        <input type="text" class="form-control" name="no_srt_perm" id="no_srt_perm" placeholder="Nomor Surat Permohonan">
        <input  class="form-control datepicker" name="tgl_srt_perm" id="tgl_srt_perm" placeholder="Tanggal Surat Permohonan">
        <input type="text" class="form-control" name="no_ppk" id="no_ppk" placeholder="No IP">
        <input  class="form-control datepicker" name="tgl_ppk" id="tgl_ppk" placeholder="Tanggal IP" >
        <input type="text" class="form-control" name="sumber_bis" id="sumber_bis" placeholder="Sumber Bisnis">
        <input type="text" class="form-control" name="nama_pri" id="nama_pri" placeholder="Nama Principal">
        <textarea class="form-control" name="alamat_pri" id="alamat_pri" placeholder="Alamat Principal"></textarea>
        <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat">         
        <input  class="form-control datepicker" name="tgl_surat" id="tgl_surat" placeholder="Tanggal Surat">
        <select name="jenis_bg" id="jenis_bg" class="form-control" required="required">
          <option value=""></option>
          <?php foreach ($data_jenis_bg as $jenis_bg) {?>
          <option value="<?= $jenis_bg->id_jenis_bg;?>"><?= $jenis_bg->jenis_bg ?></option>
          <?php } ?>
        </select>
        <div class="input-group mb-3">
          <input class="form-control datepicker" name="tgl_awal" id="tgl_awal" placeholder="Tgl Awal">
        <div class="input-group-prepend">
          <span class="input-group-text mt-2" id="basic-addon1" style="height:45px;">s/d</span>
        </div>
        <input class="form-control datepicker" name="tgl_akhir" id="tgl_akhir" placeholder="Tgl Akhir" aria-describedby="basic-addon1">
        </div>

        <input type="text" class="form-control numb" name="n_jaminan" id="n_jaminan" placeholder="Nilai Jaminan">
    </div>

        <!--kolom 2-->
        <div class="col-md-6">
        <textarea class="form-control" name="na_obligee" id="na_obligee" placeholder="Nama Oblige"></textarea>
        <textarea class="form-control" name="al_obligee" id="al_obligee" placeholder="Alamat Oblige"></textarea>
        <textarea class="form-control" name="n_pekerjaan" id="n_pekerjaan" placeholder="Nama Pekerjaan"></textarea>
        <input type="text" class="form-control numb5" name="n_kontrak" id="n_kontrak" placeholder="Nilai Kontrak">
      

        <input type="text" class="form-control numb1" name="n_premi" id="n_premi" placeholder="Nilai Premi">
        <input type="text" class="form-control numb2" name="p_asuransi" id="p_asuransi" placeholder="Premi Asuransi">
        <input type="text" class="form-control numb3" name="p_bank" id="p_bank" placeholder="Premi Bank">
        <input type="text" class="form-control numb4" name="p_komisi" id="p_komisi" placeholder="Potensi Komisi">
        <input type="text" class="form-control" name="no_bg" id="no_bg" placeholder="No BG">
        <input  class="form-control datepicker" name="tgl_bg" id="tgl_bg" placeholder="Tanggal BG">
        <input type="text" class="form-control" name="ket_bg" id="ket_bg" placeholder="Keterangan BG">
        <input type="text" class="form-control" name="bk_bayar" id="bk_bayar" placeholder="Bukti Bayar">
        <input type="text" class="form-control" name="no_s_tagih" id="no_s_tagih" placeholder="No Surat Tagih">
        <input  class="form-control datepicker" name="tgl_s_tagih" id="tgl_s_tagih" placeholder="Tanggal Surat Tagih">
        <input  class="form-control datepicker" name="tgl_m_tagih" id="tgl_m_tagih" placeholder="Tanggal Masuk Tagih">
        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
        
      </div>
    </div>
    <button class="btn btn-primary mt-2 mb-4" id="btn_simpan_bg" type="button">Simpan</button>
    <button class="btn btn-success mt-2 mb-4" id="btn_update_bg" type="button">Update</button>
  <!-- <div class="tab-pane container" id="menu2">...</div> -->