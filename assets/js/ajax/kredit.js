$(document).ready(function() {


  /*=======================================
  =            Transaksi CAC              =
  =======================================*/

  if (PAGE == "Transaksi CAC") {
    tampil_data_tr_cac();
    var edit = 'kosong';

    // FUNGSI CREATE TR CAC
    $(btnTambah).on('click', function() {
      var isi_asr = `<option value="">--</option>`;
      $.each(data_asuransi, function(e, i) {
        isi_asr += `<option value="${i.id_asuransi}">${i.nama_asuransi}</option>`;
      });
      var isi_cb = `<option value="">--</option>`;
      $.each(data_cabang, function(e, i) {
        isi_cb += `<option value="${i.id_cabang_asuransi}" data-chained="${i.id_asuransi}" >${i.nama_cabang}</option>`;
      });
      var isi_bank = `<option value="">--</option>`;
      $.each(data_bank, function(e, i) {
        isi_bank += `<option value="${i.id_bank}">${i.nama_bank}</option>`;
      });


      var isi_header = `<i class="fa fa-plus"></i> Tambah Transaksi CAC`;
      var isi_body = `
            <div class="form-row">
              <div class="col-md-12 ">
                <label for="validationServer01">Asuransi</label>
                <select name="nama_asr" id="nama_asr" class="form-control" required="required">
                ${isi_asr}
                </select>
              </div>
              <div class="col-md-12">
                <label for="validationServer01">Cabang Asuransi</label>
                <select name="nama_cb" id="nama_cb" class="form-control" required="required">
                ${isi_cb}
                </select>
              </div>
              <div class="col-md-12 ">
                <label for="validationServer01">Bank</label>
                <select name="nama_bank" id="nama_bank" class="form-control" required="required">
                ${isi_bank}
                </select>
              </div>
              <div class="col-md-12 ">
                <label for="validationServer01">Periode</label>
                <input  class="form-control datepicker" name="periode" id="periode" autocomplete="off">
              </div>
              <div class="col-md-12 ">
                <label for="validationServer01">Plafond</label>
                <input type="text" class="form-control numb" name="plafond" id="plafond" autocomplete="off">
              </div>
              <div class="col-md-12 ">
                <label for="validationServer01">NOA</label>
                <input type="text" class="form-control numb1" name="noa" id="noa" autocomplete="off">
              </div>
              <div class="col-md-12 ">
                <label for="validationServer01">Premi</label>
                <input type="text" class="form-control numb2" name="premi" id="premi" autocomplete="off"> 
              </div>
            </div>
      `;
      var isi_footer = `<button class="btn btn-primary mt-2" id="btn_simpan_trcac">Simpan</button>`;

      $('.modal-title').html(isi_header);
      $('.modal-body').html(isi_body);
      $('.modal-footer').html(isi_footer);
      $('#modal-add').modal();
      $('#nama_asr').on('change', function() {
        if (edit == "ada") {
          pilihChained();
        }
      });
      currency('plafond');
      currency('premi');
      datePicker('periode');
      datePicker('periode');
      if (edit == 'kosong') {
        $("#nama_cb").chained("#nama_asr");
      }


      $('#btn_simpan_trcac').on('click', function() {

        ($(nama_asr).val() == "") ? kosong('nama_asr', 'Asuransi'):
          ($(nama_cb).val() == "") ? kosong('nama_cb', 'Cabang Asuransi') :
          ($(nama_bank).val() == "") ? kosong('nama_bank', 'Bank') :
          ($(periode).val() == "") ? kosong('periode', 'Periode') :
          ($(plafond).val() == "") ? kosong('plafond', 'Plafond') :
          ($(noa).val() == "") ? kosong('noa', 'NOA') :
          ($(premi).val() == "") ? kosong('premi', 'Premi') :

          $.ajax({
            type: "POST",
            url: "Kredit_konsumtif/simpan",
            data: {
              id_asuransi: $('#nama_asr').val(),
              id_cabang_asuransi: $('#nama_cb').val(),
              id_bank: $('#nama_bank').val(),
              waktu: $('#periode').val(),
              plafond: $('#plafond').val(),
              noa: $('#noa').val(),
              premi: $('#premi').val(),
              add_by: id_pengguna
            },
            success: function(data) {
              if (data = "Sukses") {
                $('#modal-add').modal('hide');
                Swal.fire({
                  type: 'success',
                  title: 'Data berhasil di tambahkan',
                  showConfirmButton: false,
                  timer: 1500
                })
                tampil_data_tr_cac();
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Gagal',
                  showConfirmButton: false,
                  timer: 2000
                })
              }
            }
          });;

        OnEdited('nama_asr', 'input');
        OnEdited('nama_cb', 'input');
        OnEdited('periode', 'change');
        OnEdited('plafond', 'input');
        OnEdited('noa', 'input');
        OnEdited('premi', 'input');
      });
    });

    $('#modal-add').on('hidden.bs.modal', function(e) {
      $(this)
        .find("input,textarea,select")
        .val('')
        .end();
      edit = 'kosong';
    })

    // FUNGSI CREATE TR CAC END
    function tampil_data_tr_cac() {
      $(tr_cac).DataTable().clear();
      $(tr_cac).DataTable().destroy();

      $.ajax({
        type: 'ajax',
        url: 'Kredit_konsumtif/json',
        dataType: 'json',
        success: function(data) {
          var html = '';
          $.each(data, function(i) {
            html += ` 
              <tr>
              <td> ${(i + 1)}</td>
              <td>  ${data[i].nama_asuransi}</td>
              <td> ${data[i].nama_cabang}</td>
              <td> ${data[i].nama_bank}</td>
              <td> ${data[i].waktu}</td>
              <td> Rp.${number_format(data[i].plafond)}</td>
              <td> ${number_format(data[i].noa)}</td>
              <td> Rp.${number_format(data[i].premi)}</td>
              <td class="text-center">
                <div class="btn-group" role="group">
                  <button class="btn btn-info btn-xs trcac_edit" data="${ data[i].id_tr_cac }"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-danger btn-xs trcac_hapus" data="${ data[i].id_tr_cac }"><i class="fa fa-trash"></i></button>
                </div>
              </td>
              </tr>`;
          });

          $('#show_data_trcac').html(html);
          var DataTable = $('#tr_cac').DataTable({
            scrollX: true,
            scrollCollapse: false
          });
        }
      });
    }

    //GET UPDATE
    $('#show_data_trcac').on('click', '.trcac_edit', function() {
      edit = 'ada';
      var id_tr_cac = $(this).attr('data');

      $.ajax({
        type: "POST",
        url: "Kredit_konsumtif/edit",
        dataType: "JSON",
        data: {
          id_tr_cac: id_tr_cac
        },
        success: function(dat) {
          data = dat[0];
          $(btnTambah).click();
          $('.modal-title').html(`<i class="fa fa-edit"></i> Update Transaksi CAC`);
          $('.modal-footer').html(`<button class="btn btn-primary mt-2" id="btn_update_trcac">Update</button>`);
          $(nama_bank).val(data.id_bank);
          $(nama_asr).val(data.id_asuransi);
          $(nama_cb).val(data.id_cabang_asuransi);
          $(periode).val(data.waktu);
          $(plafond).val(number_format(data.plafond));
          $(noa).val(data.noa);
          $(premi).val(number_format(data.premi));

          $('#btn_update_trcac').on('click', function() {
            ($(nama_asr).val() == "") ? kosong('nama_asr', 'Asuransi'):
              ($(nama_cb).val() == "") ? kosong('nama_cb', 'Cabang Asuransi') :
              ($(nama_bank).val() == "") ? kosong('nama_bank', 'Bank') :
              ($(periode).val() == "") ? kosong('periode', 'Periode') :
              ($(plafond).val() == "") ? kosong('plafond', 'Plafond') :
              ($(noa).val() == "") ? kosong('noa', 'NOA') :
              ($(premi).val() == "") ? kosong('premi', 'Premi') :

              $.ajax({
                type: "POST",
                url: "Kredit_konsumtif/update",
                data: {
                  id_tr_cac: id_tr_cac,
                  id_asuransi: $('#nama_asr').val(),
                  id_cabang_asuransi: $('#nama_cb').val(),
                  id_bank: $('#nama_bank').val(),
                  waktu: $('#periode').val(),
                  plafond: $('#plafond').val(),
                  noa: $('#noa').val(),
                  premi: $('#premi').val(),
                  add_by: id_pengguna
                },
                success: function(update) {
                  if (update = "Sukses") {
                    $('#modal-add').modal('hide');
                    Swal.fire({
                      type: 'success',
                      title: 'Data berhasil di update',
                      showConfirmButton: false,
                      timer: 1500
                    })
                    tampil_data_tr_cac();
                  } else {
                    Swal.fire({
                      type: 'error',
                      title: 'Gagal',
                      showConfirmButton: false,
                      timer: 2000
                    })
                  }
                }
              });;
          });
        }
      });
    });

    //   //GET HAPUS
    $('#show_data_trcac').on('click', '.trcac_hapus', function() {
      var id_tr_cac = $(this).attr('data');
      Swal.fire({
        title: 'Anda yain akan menghapus?',
        text: "Data yang terhapus tidak bisa di kembalikan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#c82333",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "POST",
            url: "Kredit_konsumtif/hapus",
            data: {
              id_tr_cac: id_tr_cac
            },
            success: function(data) {
              if (data == "Sukses") {
                Swal.fire({
                  type: 'success',
                  title: 'Berhasil!',
                  text: 'Data dihapus!',
                  showConfirmButton: false,
                  timer: 1000
                }).then(tampil_data_tr_cac());
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Gagal',
                  showConfirmButton: false,
                  timer: 2000
                })
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                type: 'error',
                title: 'Gagal',
              })
            }
          });
        }
      })
    });



    // TR CAC END

  } else if (PAGE == "Pelaporan") {

    var isi_asuransi = ``;
    // GET ASURANSI
    $.ajax({
      url: 'get_data/asuransi',
      type: 'POST',
      dataType: 'json',
      success: function(asuransi) {
        isi_asuransi += `<option value="">-- Pilih Asuransi --</option>`;
        $.each(asuransi, function(index, i) {
          isi_asuransi += `<option data="${i.id_asuransi}" value="${i.id_asuransi}">${i.nama_asuransi}</option>`;
        });
        $(s_asuransi).html(isi_asuransi);
      }
    });

    dateRange('start');
    dateRange('end');

    $('.card-body').each(function() {
      if ($(this).find(':input').is(':checked')) {
        console.log('semua');
        $(select_all).prop('checked', true);
      } else {
        $(select_all).prop('checked', false);
      }
    });

    $(select_all).on('change', function() {
      if ($(select_all).is(':checked')) {
        $('.card-body').each(function() {
          $(this).find(':input').prop('checked', true);
        });
      } else {
        $('.card-body').each(function() {
          $(this).find(':input').prop('checked', false);
        });
      }
    });

    $('.parent').on('change', function() {
      $(select_all).prop('checked', false);
      var id = $(this).val()
      if ($(this).is(':checked') && !$(select_all).is(':checked')) {
        $('div#collapse' + id).collapse('show');
        $('div#collapse' + id).each(function() {
          $(this).find(':input').prop('checked', true);
        });
      } else {
        $('div#collapse' + id).collapse('hide');
        $('div#collapse' + id).each(function() {
          $(this).find(':input').prop('checked', false);
        });
      }
    });

    $('#export').on('click', function() {
      ($('select[name="id_asuransi"]').val() == "") ? kosong('s_asuransi', 'Asuransi'):
        $.ajax({
          url: 'excel',
          type: 'POST',
          data: {
            id_asuransi: $('select[name="id_asuransi"]').val(),
            id_cabang_asuransi: $('input[name="id_cabang_asuransi[]"]').val(),
            id_bank: $('input[name="id_bank"]').val(),
            start: $(start).val(),
            end: $(end).val(),
          },
        });;
    });
    OnEdited('s_asuransi', 'change');

    $(reset).on('click', function() {
      $(':checkbox').prop('checked', false);
      $('.datepicker').val("");
      $(s_asuransi).val("");
    });


  } else if (PAGE == "Bank Garansi") {

    /*====================================
    =            Bank Garansi            =
    ====================================*/
    tampil_data_bg();

    $("#cb_as").chained("#nama_asr");

    function tampil_data_bg() {
      $(bg).DataTable().clear();
      $(bg).DataTable().destroy();
      $.ajax({
        type: 'ajax',
        url: 'join_permohonan_bank_garansi',
        dataType: 'json',
        success: function(data) {
          var html = '';
          $.each(data, function(i) {
            html += ` 
              <tr>
              <td> ${(i + 1)}</td>
              <td> ${data[i].nama_principal}</td>
              <td> ${data[i].nama_oblige}</td>
              <td> ${data[i].nomor_surat_permohonan}</td>
              <td> ${data[i].nama_asuransi}</td>
              <td> ${data[i].nama_bank}</td>
              <td> ${data[i].no_ppk}</td>
              <td> ${data[i].tgl_ppk}</td>
              <td> ${data[i].status_permohonan}</td>
              <td class="text-center">
                <button class="btn btn-success btn-xs bg_det" data="${data[i].id_permohonan}"><i class="fa fa-info-circle"></i></button>
                <button class="btn btn-secondary btn-xs bg_dok" data="${data[i].id_permohonan}"><i class="fa fa-file"></i></button>
                <button class="btn btn-info btn-xs bg_edit" data="${data[i].id_permohonan}" ><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger btn-xs bg_hapus" data="${data[i].id_permohonan}" ><i class="fa fa-trash"></i></button>
              </td>
              <td>
                <button class="btn btn-primary btn-xs lihat" data="${data[i].id_permohonan}" ><i class="fa fa-eye"></i></button>
              </td>
              </tr>`;
          });
          $('#show_data_bg').html(html);
          $('#bg').DataTable({
            scrollX: true,
            scrollCollapse: false
          });
        }
      });
    }

    AjaxOption('get_data/asuransi', 'Pilih Asuransi', 'id_asuransi', 'nama_asuransi', 'asuransi_permohonan')
    AjaxOption('get_data/cabang_asuransi', 'Pilih Cabang Asuransi', 'id_cabang_asuransi', 'nama_cabang', 'cabang_asuransi_permohonan')
    AjaxOption('get_data/bank', 'Pilih Bank', 'id_bank', 'nama_bank', 'bank_permohonan')
    AjaxOption('get_data/cabang_bank', 'Pilih Cabang Bank', 'id_cabang_bank', 'cabang_bank', 'cabang_bank_permohonan')

    $(btnTambah).on('click', function() {
      $(tambah).collapse('show');
      $(tampil).collapse('hide');
    });

    $(btnClose).on('click', function() {
      $(tampil).collapse('show');
      $(tambah).collapse('hide');
      $(detail).collapse('hide');
    });

    isiPrincipal();

    function isiPrincipal() {
      AjaxOption('get_data/principal', 'Pilih Principal', 'id_principal', 'nama_principal', 'pilihPrincipal');
      $(pilihPrincipal).on('change', function() {
        if ($(this).val() == "") {
          $('.form-control').removeAttr('readonly');
          $('.form-control').val('');
        } else {
          $.ajax({
            url: 'get_data/principal',
            type: 'POST',
            dataType: 'json',
            data: {
              id_principal: $(pilihPrincipal).val(),
            },
            success: function(data) {
              var i = data[0];
              $(alamat_principal).val(i.alamat_principal);
              $(alamat_principal).attr('readonly', 'readonly');
              $(nama_PIC1_principal).val(i.pic1);
              $(nama_PIC1_principal).attr('readonly', 'readonly');
              $(jabatan_PIC1_principal).val(i.jabatan_pic1);
              $(jabatan_PIC1_principal).attr('readonly', 'readonly');
              $(nik_PIC1_principal).val(i.nik_pic1);
              $(nik_PIC1_principal).attr('readonly', 'readonly');
              $(nama_PIC2_principal).val(i.pic2);
              $(nama_PIC2_principal).attr('readonly', 'readonly');
              $(jabatan_PIC2_principal).val(i.jabatan_pic2);
              $(jabatan_PIC2_principal).attr('readonly', 'readonly');
              $(nik_PIC2_principal).val(i.nik_pic2);
              $(nik_PIC2_principal).attr('readonly', 'readonly');
              $(akta_principal).val(i.akta_principal);
              $(akta_principal).attr('readonly', 'readonly');
              $(nomor_akta_principal).val(i.nomor_akta_principal);
              $(nomor_akta_principal).attr('readonly', 'readonly');
            }
          });
        }
      });
    }

    $('#show_data_bg').on('click', '.bg_det', function() {
      var id_bg = $(this).attr('data');
      $(detail).collapse('toggle');
      $(tampil).collapse('hide');
      $.ajax({
        url: 'get_data/bank_garansi',
        type: 'POST',
        dataType: 'json',
        data: {
          id_bg: id_bg
        },
        success: function(data) {
          var i = data[0];
          $(nama_principal_detail).html(i.principal);
          $(alamat_principal_detail).html(i.alamat_principal);
          $(nama_pic1_detail).html("Kosong");
          $(jabatan_pic1_detail).html("Kosong");
          $(nik_pic1_detail).html("Kosong");
          $(nama_pic2_detail).html("Kosong");
          $(jabatan_pic2_detail).html("Kosong");
          $(nik_pic2_detail).html("Kosong");
          $(akta_principal_detail).html("Kosong");
          $(nomor_akta_principal_detail).html("Kosong");

          $(nomor_registrasi_detail).html(i.no_regis);
          $(bank_detail).html(i.id_bank);
          $(tanggal_registrasi_detail).html(i.tgl_regis);
          $(cabang_bank_detail).html(i.id_cabang_bank);
          $(nomor_surat_permohonan_detail).html(i.no_srt_permohonan);
          $(nama_oblige_detail).html(i.nama_obligee);
          $(tanggal_surat_permohonan_detail).html(i.tgl_srt_permohonan);
          $(alamat_oblige_detail).html(i.alamat_obligee);
          $(nomor_surat_undangan_detail).html(i.no_surat);
          $(nama_pekerjaan_detail).html(i.nama_pekerjaan);
          $(tanggal_surat_undangan_detail).html("Kosong");
          $(nilai_kontrak_detail).html(i.nilai_kontrak);
          $(asuransi_detail).html(i.id_asuransi);
          $(nilai_jaminan_detail).html(i.nilai_jaminan);
          $(cabang_asuransi_detail).html(i.id_cabang_asuransi);

        }
      });
    });

    $(tambahPersetujuan).on('click', function() {
      var isiModal = `<div class="form-group row">
                <label for="nomor_persetujuan" class="col-sm-4 col-form-label">Nomor Persetujuan</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="nomor_persetujuan">
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_persetujuan" class="col-sm-4 col-form-label">Tanggal Persetujuan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control datepicker" id="tanggal_persetujuan">
                </div>
              </div>
              <div class="form-group row">
                <label for="upload_persetujuan" class="col-sm-4 col-form-label">Upload Dokumen IP/KONTRA</label>
                <div class="col-sm-8">
                  <input type="file" class="custom-file-input" id="upload_persetujuan">
                  <label class="custom-file-label mx-3" for="upload_persetujuan">Choose file...</label>
                </div>
              </div>`;
      $('.modal-title').html(`Tambah Data Persetujuan Asuransi`);
      $('.modal-body').html(isiModal);
      $('.modal-footer').html(`<button type="button" class="btn btn-success" id="simpan_persetujuan_asuransi">Simpan</button>`);
      $(modalAdd).modal();
      Uploader('upload_persetujuan');
    });

    $(tambahBankGaransi).on('click', function() {
      var isiModal = `<div class="form-group row">
                <label for="nomor_bank_garansi" class="col-sm-4 col-form-label">Nomor Bank Garansi</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="nomor_bank_garansi">
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_bank_garansi" class="col-sm-4 col-form-label">Tanggal Bank Garansi</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control datepicker" id="tanggal_bank_garansi">
                </div>
              </div>
              <div class="form-group row">
                <label for="upload_bank_garansi" class="col-sm-4 col-form-label">Upload Dokumen IP/KONTRA</label>
                <div class="col-sm-8">
                  <input type="file" class="custom-file-input" id="upload_bank_garansi">
                  <label class="custom-file-label mx-3" for="upload_bank_garansi">Choose file...</label>
                </div>
              </div>`;
      $('.modal-title').html(`Tambah Data Bank Garansi`);
      $('.modal-body').html(isiModal);
      $('.modal-footer').html(`<button type="button" class="btn btn-success" id="simpan_bank_garansi">Simpan</button>`);
      $(modalAdd).modal();
      Uploader('upload_bank_garansi');
    });


    $('.btnBG').on('click', function() {
      $(tampil).collapse('show');
      $(tambah).collapse('close');
      $(detail).collapse('close');
    });


    $(tampil).on('shown.bs.collapse', function() {
      $('.breadcrumb').html(`
        <li class="breadcrumb-item"><a href="#" class="text-success">Kredit Non Konsumtif</a></li>
        <li class="breadcrumb-item active">Bank Garansi</li>
      `);
    })

    $(tambah).on('shown.bs.collapse', function() {
      $('.breadcrumb').html(`
        <li class="breadcrumb-item"><a href="#" class="text-success">Kredit Non Konsumtif</a></li>
        <li class="breadcrumb-item"><a style="cursor: pointer;" onClick="$(btnClose).click()" class="text-success btnBG">Bank Garansi</a></li>
        <li class="breadcrumb-item active">Tambah Data</li>
      `);
      $(buatPrincipal).on('click', function() {
        $('.addPrincipal').addClass('buat');
        $('.form-control').removeAttr('readonly');
        $('.form-control').val('');
        $('.addPrincipal').html(`
        <input type="text" class="form-control form-control-sm" id="nama_principal">
        <div class="invalid-feedback" id="_erNama">Kolom Nama Principal harus di isi</div>`)
      });

    });

    $(tambah).on('hidden.bs.collapse', function() {
      sessionStorage.removeItem("id_permohonan");
      if ($('.addPrincipal').hasClass('buat')) {
        $('.addPrincipal').html(`
            <div class="row">
            <div class="col">
              <select class="form-control form-control-sm" id="pilihPrincipal"></select>
            </div>
            <div class="col-0 mr-3">
              <button class="btn btn-sm rounded-circle btn-success" id="buatPrincipal"><i class="fa fa-plus"></i></button>
            </div>
            </div>`);
        $('.addPrincipal').removeClass('buat');
      }
      $('.form-control').removeAttr('readonly');
      $('.form-control').val('');
    })

    $(detail).on('shown.bs.collapse', function() {
      $('.breadcrumb').html(`
        <li class="breadcrumb-item"><a href="#" class="text-success">Kredit Non Konsumtif</a></li>
        <li class="breadcrumb-item"><a style="cursor: pointer;" onClick="$(btnClose).click()" class="text-success btnBG">Bank Garansi</a></li>
        <li class="breadcrumb-item active">Detail</li>
      `);
    })

    $(dokumen).on('shown.bs.collapse', function() {
      // Dokumen Persyaratan START
      tampil_data_dp();

      function tampil_data_dp() {
        $(dp).DataTable().clear();
        $(dp).DataTable().destroy();
        $.ajax({
          type: 'ajax',
          url: 'get_data/dokumen_persyaratan',
          dataType: 'json',
          success: function(data) {
            var html = '';
            $.each(data, function(i) {
              html += ` 
              <tr>
              <td> ${(i + 1)}</td>
              <td>  ${data[i].dokumen_persyaratan}</td>
              <td> ${(data[i].nomor = "undefined") ? 'None' : data[i].nomor}</td>
              <td> ${(data[i].tgl_akhir = "undefined") ? 'None' : data[i].tgl_akhir}</td>
              <td class="text-center">
                <button class="btn btn-success btn-xs dp_det" data="${data[i].id_dp}"><i class="fa fa-edit"></i></button>
              </td>
              <td class="text-center">
                <button class="btn btn-light btn-xs"><i class="fa fa-file"></i></button>
              </td>
              <td> ${(data[i].kelengkapan = 1) ? '<span class="badge badge-pill badge-success">Lengkap</span>' : '<span class="badge badge-pill badge-danger">Tidak Lengkap</span>'}</td>
              <td> ${(data[i].valid = 1) ? '<span class="badge badge-pill badge-success">Valid</span>' : '<span class="badge badge-pill badge-danger">Tidak Valid</span>'}</td>
              </tr>`;
            });
            $('#show_data_dp').html(html);
            var DataTable = $('#dp').DataTable({
              scrollX: true,
              scrollCollapse: false
            });
          }
        });
      }
      // Dokumen Persyaratan END
    });
    // ON SHOWN END

    $(btnSimpan).on('click', function() {
      if ($(nav_data_principal).hasClass('active')) {
        if ($('.addPrincipal').hasClass('buat')) {
          ($(nama_principal).val() == "") ? kosong2('nama_principal'):
            ($(alamat_principal).val() == "") ? kosong2('alamat_principal') :
            ($(nama_PIC1_principal).val() == "") ? kosong2('nama_PIC1_principal') :
            ($(jabatan_PIC1_principal).val() == "") ? kosong2('jabatan_PIC1_principal') :
            ($(nik_PIC1_principal).val() == "") ? kosong2('nik_PIC1_principal') :
            ($(nama_PIC2_principal).val() == "") ? kosong2('nama_PIC2_principal') :
            ($(jabatan_PIC2_principal).val() == "") ? kosong2('jabatan_PIC2_principal') :
            ($(nik_PIC2_principal).val() == "") ? kosong2('nik_PIC2_principal') :
            ($(akta_principal).val() == "") ? kosong2('akta_principal') :
            ($(nomor_akta_principal).val() == "") ? kosong2('nomor_akta_principal') :

            $.ajax({
              url: 'save_permohonanPrincipal',
              type: 'POST',
              dataType: 'json',
              data: {
                id_principal: Math.floor(100000 + Math.random() * 900000),
                nama_principal: $(nama_principal).val(),
                alamat_principal: $(alamat_principal).val(),
                pic1: $(nama_PIC1_principal).val(),
                jabatan_pic1: $(jabatan_PIC1_principal).val(),
                nik_pic1: $(nik_PIC1_principal).val(),
                pic2: $(nama_PIC2_principal).val(),
                jabatan_pic2: $(jabatan_PIC2_principal).val(),
                nik_pic2: $(nik_PIC2_principal).val(),
                akta_principal: $(akta_principal).val(),
                nomor_akta_principal: $(nomor_akta_principal).val(),
              },
              success: function(data) {
                if (data.hasil == "Sukses") {
                  Swal.fire({
                    type: 'success',
                    title: 'Data berhasil di tambahkan',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  $('.form-control').val("")
                  $('.addPrincipal').html(`<div class="row">
                                            <div class="col">
                                              <select class="form-control form-control-sm" id="pilihPrincipal"></select>
                                            </div>
                                            <div class="col-0 mr-3">
                                              <button class="btn btn-sm rounded-circle btn-success" id="buatPrincipal"><i class="fa fa-plus"></i></button>
                                            </div>
                                            </div>`);
                  $('.addPrincipal').removeClass('buat');
                  isiPrincipal();
                  $('.btn_data_permohonan').click();
                }
                sessionStorage.setItem("id_permohonan", data.id_permohonan);
              }
            });;
        } else {
          var id_permohonan = Math.floor(100000 + Math.random() * 900000);
          $.ajax({
            url: 'save/permohonan_bank_garansi',
            type: 'POST',
            data: {
              id_permohonan: id_permohonan,
              id_principal: $(pilihPrincipal).val(),
            },
            success: function(data) {
              if (data == "Sukses") {
                $('.form-control').val("")
                Swal.fire({
                  type: 'success',
                  title: 'Data berhasil di tambahkan',
                  showConfirmButton: false,
                  timer: 1500
                })
                sessionStorage.setItem("id_permohonan", id_permohonan);
                $('.btn_data_permohonan').click();
              }
            }
          });
        }
      } else if ($(nav_data_permohonan).hasClass('active')) {

        ($(nomor_registrasi_permohonan).val() == "") ? kosong2('nomor_registrasi_permohonan'):
          ($(tanggal_registrasi_permohonan).val() == "") ? kosong2('tanggal_registrasi_permohonan') :
          ($(nomor_surat_permohonan).val() == "") ? kosong2('nomor_surat_permohonan') :
          ($(tanggal_surat_permohonan).val() == "") ? kosong2('tanggal_surat_permohonan') :
          ($(nomor_surat_undangan).val() == "") ? kosong2('nomor_surat_undangan') :
          ($(tanggal_surat_undangan).val() == "") ? kosong2('tanggal_surat_undangan') :
          ($(asuransi_permohonan).val() == "") ? kosong2('asuransi_permohonan') :
          ($(cabang_asuransi_permohonan).val() == "") ? kosong2('cabang_asuransi_permohonan') :
          ($(bank_permohonan).val() == "") ? kosong2('bank_permohonan') :
          ($(cabang_bank_permohonan).val() == "") ? kosong2('cabang_bank_permohonan') :
          ($(nama_oblige).val() == "") ? kosong2('nama_oblige') :
          ($(alamat_oblige).val() == "") ? kosong2('alamat_oblige') :
          ($(nama_pekerjaan).val() == "") ? kosong2('nama_pekerjaan') :
          ($(nilai_kontrak).val() == "") ? kosong2('nilai_kontrak') :
          ($(nilai_jaminan).val() == "") ? kosong2('nilai_jaminan') :

          $.ajax({
            url: 'Update1/permohonan_bank_garansi',
            type: 'POST',
            data: {
              id_permohonan: sessionStorage.getItem("id_permohonan"),
              nomor_registrasi: $(nomor_registrasi_permohonan).val(),
              nomor_surat_permohonan: $(nomor_surat_permohonan).val(),
              tgl_surat_permohonan: $(tanggal_surat_permohonan).val(),
              no_surat_undangan: $(nomor_surat_undangan).val(),
              tgl_surat_undangan: $(tanggal_surat_undangan).val(),
              id_cabang_asuransi: $(asuransi_permohonan).val(),
              nama_oblige: $(nama_oblige).val(),
              alamat_oblige: $(alamat_oblige).val(),
              nama_pekerjaan: $(nama_pekerjaan).val(),
              nilai_kontrak: $(nilai_kontrak).val(),
              nilai_jaminan: $(nilai_jaminan).val(),
              tgl_registrasi: $(tanggal_registrasi_permohonan).val(),
            },
            success: function(data) {
              if (data == "Sukses") {
                $('.form-control').val("")
                Swal.fire({
                  type: 'success',
                  title: 'Data berhasil di update',
                  showConfirmButton: false,
                  timer: 1500,
                })
                $('.btn_legalitas').click();
              }
            }
          });;
      } else if ($(nav_legalitas).hasClass('active')) {
        ($(nama_notaris).val() == "") ? kosong2('nama_notaris'):
          ($(alamat_notaris).val() == "") ? kosong2('alamat_notaris') :
          ($(nomor_ktp).val() == "") ? kosong2('nomor_ktp') :
          ($(pengadilan).val() == "") ? kosong2('pengadilan') :
          ($(alamat_pengadilan).val() == "") ? kosong2('alamat_pengadilan') :
          ($(pasal).val() == "") ? kosong2('pasal') :

          $.ajax({
            url: 'save/legalitas_permohonan',
            type: 'POST',
            data: {
              id_legalitas: Math.floor(100000 + Math.random() * 900000),
              id_permohonan: sessionStorage.getItem("id_permohonan"),
              nama_notaris: $(nama_notaris).val(),
              alamat_notaris: $(alamat_notaris).val(),
              no_ktp: $(nomor_ktp).val(),
              pengadilan: $(pengadilan).val(),
              alamat_pengadilan: $(alamat_pengadilan).val(),
              pasal: $(pasal).val(),
              add_by: id_pengguna,
            },
            success: function(data) {
              if (data == "Sukses") {
                $('.form-control').val("")
                Swal.fire({
                  type: 'success',
                  title: 'Data berhasil di tambahkan',
                  showConfirmButton: false,
                  timer: 1500
                })
              }
            }
          });;
      }
    });

    OnEdited2('.form-control', 'input');

    // $(proses).stepMaker({
    //   steps: ['Permohonan Jaminan', 'Pengantar Asuransi', 'Persetujuan Asuransi', 'Pengantar Bank', 'Bank Garansi', 'Penagihan Komisi'],
    //   currentStep: 4
    // });



    //  //GET UPDATE
    $('#show_data_bg').on('click', '.bg_edit', function() {
      var id_permohonan = $(this).attr('data');
      $.ajax({
        type: "POST",
        url: `join_permohonan_bank_garansi`,
        dataType: "JSON",
        data: {
          id_permohonan: id_permohonan
        },
        success: function(data) {
          var i = data[0];
          console.log(i);
          $(btnTambah).click();
          $(pilihPrincipal).val(i['id_principal']);
          $(alamat_principal).val(i['alamat_principal']);
          $(pic1).val(i['pic1']);

        }
      });
    });

    // FUNGSI DELETE BANK GARANSI
    $('#show_data_bg').on('click', '.bg_hapus', function() {
      var id_permohonan = $(this).attr('data');
      Swal.fire({
        title: 'Anda yain akan menghapus?',
        text: "Data yang terhapus tidak bisa di kembalikan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#c82333",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "hapus",
            type: 'POST',
            data: {
              id_permohonan: id_permohonan
            },
            success: function(data) {
              if (data == "Sukses") {
                Swal.fire({
                  type: 'success',
                  title: 'Berhasil!',
                  text: 'Data dihapus!',
                  showConfirmButton: false,
                  timer: 1000
                }).then(tampil_data_bg());
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Gagal',
                  showConfirmButton: false,
                  timer: 2000
                })
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                type: 'error',
                title: 'Gagal',
              })
            }
          });
        }
      })
    });
    // FUNGSI DELETE BANK GARANSI END


    //button-simpan
    $('#btn_simpan_bg').on('click', function(e) {
      e.preventDefault();
      var asuransi = $('#nama_asr').val();
      var cb_as = $('#cb_as').val();
      var nama_bank = $('#nama_bank').val();
      var no_regis = $('#no_regis').val();
      var tgl_regis = $('#tgl_regis').val();
      var no_srt_perm = $('#no_srt_perm').val();
      var tgl_srt_perm = $('#tgl_srt_perm').val();
      var no_ppk = $('#no_ppk').val();
      var tgl_ppk = $('#tgl_ppk').val();
      var sumber_bis = $('#sumber_bis').val();
      var nama_pri = $('#nama_pri').val();
      var alamat_pri = $('#alamat_pri').val();
      var no_surat = $('#no_surat').val();
      var tgl_surat = $('#tgl_surat').val();
      var jenis_bg = $('#jenis_bg').val();
      var tgl_awal = $('#tgl_awal').val();
      var tgl_akhir = $('#tgl_akhir').val();
      var n_jaminan = $('#n_jaminan').val();
      var n_pekerjaan = $('#n_pekerjaan').val();
      var na_obligee = $('#na_obligee').val();
      var al_obligee = $('#al_obligee').val();
      var n_kontrak = $('#n_kontrak').val();
      var n_premi = $('#n_premi').val();
      var p_asuransi = $('#p_asuransi').val();
      var p_bank = $('#p_bank').val();
      var p_komisi = $('#p_komisi').val();
      var no_bg = $('#no_bg').val();
      var tgl_bg = $('#tgl_bg').val();
      var ket_bg = $('#ket_bg').val();
      var bk_bayar = $('#bk_bayar').val();
      var no_s_tagih = $('#no_s_tagih').val();
      var tgl_s_tagih = $('#tgl_s_tagih').val();
      var tgl_m_tagih = $('#tgl_m_tagih').val();
      var keterangan = $('#keterangan').val();
      if (asuransi == "") {
        Swal.fire('Form tidak boleh kosong!', '', 'warning');
      } else {
        $.ajax({
          type: "POST",
          url: "simpan",
          dataType: "JSON",
          data: {
            no_regis: no_regis,
            tgl_regis: tgl_regis,
            no_srt_perm: no_srt_perm,
            tgl_srt_perm: tgl_srt_perm,
            alamat_pri: alamat_pri,
            al_obligee: al_obligee,
            n_kontrak: n_kontrak,
            asuransi: asuransi,
            cb_as: cb_as,
            nama_bank: nama_bank,
            no_ppk: no_ppk,
            tgl_ppk: tgl_ppk,
            sumber_bis: sumber_bis,
            nama_pri: nama_pri,
            no_surat: no_surat,
            tgl_surat: tgl_surat,
            jenis_bg: jenis_bg,
            tgl_awal: tgl_awal,
            tgl_akhir: tgl_akhir,
            n_jaminan: n_jaminan,
            na_obligee: na_obligee,
            n_pekerjaan: n_pekerjaan,
            n_premi: n_premi,
            p_asuransi: p_asuransi,
            p_bank: p_bank,
            p_komisi: p_komisi,
            no_bg: no_bg,
            tgl_bg: tgl_bg,
            ket_bg: ket_bg,
            bk_bayar: bk_bayar,
            no_s_tagih: no_s_tagih,
            tgl_s_tagih: tgl_s_tagih,
            tgl_m_tagih: tgl_m_tagih,
            keterangan: keterangan
          },
          success: function(data) {
            // $('[name="nama_asr"]').val("");
            // $('[name="nama_bank"]').val("");
            $('[name="no_regis"]').val("");
            $('[name="tgl_regis"]').val("");
            $('[name="no_srt_perm"]').val("");
            $('[name="tgl_srt_perm"]').val("");
            $('[name="no_ppk"]').val("");
            $('[name="tgl_ppk"]').val("");
            $('[name="sumber_bis"]').val("");
            $('[name="nama_pri"]').val("");
            $('[name="alamat_pri"]').val("");
            $('[name="no_surat"]').val("");
            $('[name="tgl_surat"]').val("");
            $('[name="tgl_awal"]').val("");
            $('[name="tgl_akhir"]').val("");
            $('[name="n_jaminan"]').val("");
            $('[name="na_obligee"]').val("");
            $('[name="al_obligee"]').val("");
            $('[name="n_pekerjaan"]').val("");
            $('[name="n_kontrak"]').val("");
            $('[name="n_premi"]').val("");
            $('[name="p_asuransi"]').val("");
            $('[name="p_bank"]').val("");
            $('[name="p_komisi"]').val("");
            $('[name="no_bg"]').val("");
            $('[name="tgl_bg"]').val("");
            $('[name="ket_bg"]').val("");
            $('[name="bk_bayar"]').val("");
            $('[name="no_s_tagih"]').val("");
            $('[name="tgl_s_tagih"]').val("");
            $('[name="tgl_m_tagih"]').val("");
            $('[name="keterangan"]').val("");
            tampil_data_bg();
            Swal.fire({
              type: 'success',
              title: 'Data berhasil di tambahkan',
              showConfirmButton: false,
              timer: 1500
            })
          }
        });
      }
    });

    // //Update 
    $('#btn_update_bg').on('click', function() {
      var id_bg = $('#id_bg').val();
      var asuransi = $('#nama_asr').val();
      var cb_as = $('#cb_as').val();
      var nama_bank = $('#nama_bank').val();
      var no_regis = $('#no_regis').val();
      var tgl_regis = $('#tgl_regis').val();
      var no_srt_perm = $('#no_srt_perm').val();
      var tgl_srt_perm = $('#tgl_srt_perm').val();
      var no_ppk = $('#no_ppk').val();
      var tgl_ppk = $('#tgl_ppk').val();
      var sumber_bis = $('#sumber_bis').val();
      var nama_pri = $('#nama_pri').val();
      var alamat_pri = $('#alamat_pri').val();
      var no_surat = $('#no_surat').val();
      var tgl_surat = $('#tgl_surat').val();
      var jenis_bg = $('#jenis_bg').val();
      var tgl_awal = $('#tgl_awal').val();
      var tgl_akhir = $('#tgl_akhir').val();
      var n_jaminan = $('#n_jaminan').val();
      var n_pekerjaan = $('#n_pekerjaan').val();
      var na_obligee = $('#na_obligee').val();
      var al_obligee = $('#al_obligee').val();
      var n_kontrak = $('#n_kontrak').val();
      var n_premi = $('#n_premi').val();
      var p_asuransi = $('#p_asuransi').val();
      var p_bank = $('#p_bank').val();
      var p_komisi = $('#p_komisi').val();
      var no_bg = $('#no_bg').val();
      var tgl_bg = $('#tgl_bg').val();
      var ket_bg = $('#ket_bg').val();
      var bk_bayar = $('#bk_bayar').val();
      var no_s_tagih = $('#no_s_tagih').val();
      var tgl_s_tagih = $('#tgl_s_tagih').val();
      var tgl_m_tagih = $('#tgl_m_tagih').val();
      var keterangan = $('#keterangan').val();
      $.ajax({
        type: "POST",
        url: "update",
        dataType: "JSON",
        data: {
          id_bg: id_bg,
          no_regis: no_regis,
          tgl_regis: tgl_regis,
          no_srt_perm: no_srt_perm,
          tgl_srt_perm: tgl_srt_perm,
          alamat_pri: alamat_pri,
          al_obligee: al_obligee,
          n_kontrak: n_kontrak,
          asuransi: asuransi,
          cb_as: cb_as,
          nama_bank: nama_bank,
          no_ppk: no_ppk,
          tgl_ppk: tgl_ppk,
          sumber_bis: sumber_bis,
          nama_pri: nama_pri,
          no_surat: no_surat,
          tgl_surat: tgl_surat,
          jenis_bg: jenis_bg,
          tgl_awal: tgl_awal,
          tgl_akhir: tgl_akhir,
          n_jaminan: n_jaminan,
          na_obligee: na_obligee,
          n_pekerjaan: n_pekerjaan,
          n_premi: n_premi,
          p_asuransi: p_asuransi,
          p_bank: p_bank,
          p_komisi: p_komisi,
          no_bg: no_bg,
          tgl_bg: tgl_bg,
          ket_bg: ket_bg,
          bk_bayar: bk_bayar,
          no_s_tagih: no_s_tagih,
          tgl_s_tagih: tgl_s_tagih,
          tgl_m_tagih: tgl_m_tagih,
          keterangan: keterangan
        },
        success: function(data) {
          $('[href="#home"]').tab('show');
          tampil_data_bg();
          Swal.fire('Data Berhasil Diupdate!', '', 'success');
        }
      });
    });


    $('.datepicker').datepicker({
      autoclose: true,
      format: "yyyy-m-d",
    });

    /*=====  End of Bank Garansi  ======*/

  } else if (PAGE == "Case By Case") {

    /*====================================
    =            Case By Case            =
    ====================================*/
    tampil_data_cbc();

    var isi_asr = ``;
    isi_asr += `<option value="">-- Pilih Asuransi --</option>`;
    $.each(data_asuransi, function(index, i) {
      isi_asr += `<option value="${i.id_asuransi}">${i.nama_asuransi}</option>`
    });
    $(nama_asr).html(isi_asr);

    var isi_bank = ``;
    isi_bank += `<option value="">-- Pilih Bank --</option>`;
    $.each(data_bank, function(index, i) {
      isi_bank += `<option value="${i.id_bank}">${i.nama_bank}</option>`
    });
    $(nama_bank).html(isi_bank);

    // FUNGSI CREATE CBC
    $('#btn_simpan_cbc').on('click', function() {
      ($(nama_asr).val() == "") ? kosong('nama_asr', 'Asuransi'):
        ($(nama_bank).val() == "") ? kosong('nama_bank', 'Bank') :
        ($(no_ssm).val() == "") ? kosong('no_ssm', 'Nomor SSM') :

        $.ajax({
          type: "POST",
          url: "simpan_cbc",
          data: {
            surat_tagih_sm: $('#no_ssm').val(),
            tgl_tagih_sm: $('#tgl_ssm').val(),
            id_bank: $('#nama_bank').val(),
            pembawa_bisnis: $('#sumber_bis').val(),
            principal: $('#nama_pri').val(),
            no_surat_bank: $('#no_surat').val(),
            tgl_surat_bank: $('#tgl_surat').val(),
            nilai_pertanggungan: $('#nilai_per').val(),
            nilai_premi: $('#nilai_pre').val(),
            potensi_komisi: $('#pot_komisi').val(),
            no_npp: $('#no_npp').val(),
            tgl_npp: $('#tgl_npp').val(),
            no_surat_tagih: $('#srt_penagihan').val(),
            tgl_surat_tagih: $('#tgl_s_pen').val(),
            jumlah_tagih: $('#jml_tagihan').val(),
            tanggal_masuk_tagih: $('#tgl_masuk_tagih').val(),
            ket: $('#keterangan').val(),
            bukti_bayar: $('#bukti_byr').val(),
            id_asuransi: $('#nama_asr').val(),
            no_polis: $('#no_polis').val(),
            tgl_polis: $('#tgl_polis').val(),
            bb_premi: $('#bb_premi').val(),
          },
          success: function(data) {
            if (data == "Sukses") {
              $('.form-control').val("")
              Swal.fire({
                type: 'success',
                title: 'Data berhasil di update',
                showConfirmButton: false,
                timer: 1500
              })
              $('.btnHome').click();
              tampil_data_cbc();
            }
          }
        });;
    });
    // FUNGSI CREATE CBC  END

    currency('nilai_per');
    currency('nilai_pre');
    currency('pot_komisi');
    currency('jml_tagihan');
    OnEdited('nama_asr', 'input');
    OnEdited('nama_bank', 'input');
    OnEdited('no_ssm', 'input');

    // FUNGSI READ CBC
    function tampil_data_cbc() {
      $(cbc).DataTable().clear();
      $(cbc).DataTable().destroy();
      $.ajax({
        type: 'ajax',
        url: 'json_cbc',
        dataType: 'json',
        success: function(data) {
          var html = '';
          $.each(data, function(i) {
            var d = new Date(data[i].tgl_tagih_sm);
            var tgl_tagih_sm =
              ("0" + d.getDate()).slice(-2) + "-" +
              ("0" + (d.getMonth() + 1)).slice(-2) + "-" +
              d.getFullYear();
            html += `<tr>
              <td>${i + 1}</td>
              <td>${data[i].nama_asuransi}</td>
              <td>${data[i].surat_tagih_sm}</td>
              <td>${tgl_tagih_sm}</td>
              <td class="text-center">
              <button class="btn btn-success btn-xs cbc_detail" data="${data[i].id_cbc}"><i class="fa fa-info-circle"></i></button>
              <button class="btn btn-info btn-xs cbc_edit" data="${data[i].id_cbc}"><i class="fa fa-edit"></i></button>
              <button class="btn btn-danger btn-xs cbc_hapus" data="${data[i].id_cbc}"><i class="fa fa-trash"></i></button>
              </td>
              </tr>`;
          });
          $('#show_data_cbc').html(html);
          $('#cbc').DataTable({
            scrollX: true,
          });
        }
      });
    }
    // FUNGSI READ CBC END

    // FUNGSI UPDATE CBC
    $('#show_data_cbc').on('click', '.cbc_edit', function() {
      var id_cbc = $(this).attr('data');
      $.ajax({
        type: "POST",
        url: "edit_cbc",
        dataType: "JSON",
        data: {
          id_cbc: id_cbc
        },
        success: function(data) {

          $('[href="#tambah"]').tab('show');
          $('[href="#tambah"]').html(`<i class="fa fa-edit"> Update</i>`);
          $('.tombol_group').html(`<button class="btn btn-success mt-2" id="btn_update_cbc">Update</button>`);

          $(id_cbc).val(data.id_cbc);
          $(nama_asr).val(data.id_asuransi);
          $(nama_bank).val(data.id_bank);
          $(no_ssm).val(data.surat_tagih_sm);
          $(tgl_ssm).val(data.tgl_surat_tagih);
          $(sumber_bis).val(data.pembawa_bisnis);
          $(nama_pri).val(data.principal);
          $(no_surat).val(data.no_surat_bank);
          $(tgl_surat).val(data.tgl_surat_bank);
          $(nilai_per).val(number_format(data.nilai_pertanggungan));
          $(nilai_pre).val(number_format(data.nilai_premi));
          $(pot_komisi).val(number_format(data.potensi_komisi));
          $(no_npp).val(data.no_npp);
          $(tgl_npp).val(data.tgl_npp);
          $(bb_premi).val(data.bb_premi);
          $(no_polis).val(data.no_polis);
          $(tgl_polis).val(data.tgl_polis);
          $(srt_penagihan).val(data.no_surat_tagih);
          $(tgl_s_pen).val(data.tgl_surat_tagih);
          $(jml_tagihan).val(number_format(data.jumlah_tagih));
          $(tgl_masuk_tagih).val(data.tanggal_masuk_tagih);
          $(keterangan).val(data.ket);
          $(bukti_byr).val(data.bukti_bayar);


          $('#btn_update_cbc').on('click', function() {
            $.ajax({
              type: "POST",
              url: "update_cbc",
              data: {
                id_cbc: data.id_cbc,
                surat_tagih_sm: $('#no_ssm').val(),
                tgl_tagih_sm: $('#tgl_ssm').val(),
                id_bank: $('#nama_bank').val(),
                pembawa_bisnis: $('#sumber_bis').val(),
                principal: $('#nama_pri').val(),
                no_surat_bank: $('#no_surat').val(),
                tgl_surat_bank: $('#tgl_surat').val(),
                nilai_pertanggungan: $('#nilai_per').val(),
                nilai_premi: $('#nilai_pre').val(),
                potensi_komisi: $('#pot_komisi').val(),
                no_npp: $('#no_npp').val(),
                tgl_npp: $('#tgl_npp').val(),
                no_surat_tagih: $('#srt_penagihan').val(),
                tgl_surat_tagih: $('#tgl_s_pen').val(),
                jumlah_tagih: $('#jml_tagihan').val(),
                tanggal_masuk_tagih: $('#tgl_masuk_tagih').val(),
                ket: $('#keterangan').val(),
                bukti_bayar: $('#bukti_byr').val(),
                id_asuransi: $('#nama_asr').val(),
                no_polis: $('#no_polis').val(),
                tgl_polis: $('#tgl_polis').val(),
                bb_premi: $('#bb_premi').val(),
              },
              success: function(data) {
                if (data == "Sukses") {
                  $('.form-control').val("")
                  Swal.fire({
                    type: 'success',
                    title: 'Data berhasil di update',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  $('.btnHome').click();
                  tampil_data_cbc();
                }
              }
            });
          });


          $('.btnHome').on('click', function() {
            $('[href="#tambah"]').html(`<i class="fa fa-plus"> Tambah</i>`);
            $('.form-control').val("");
            $('.tombol_group').html(`<button class="btn btn-primary mt-2" id="btn_simpan_cbc">Simpan</button>`);
          });

        }
      });

    });

    // SHOW DETAIL CBC
    $('#show_data_cbc').on('click', '.cbc_detail', function() {
      var id_cbc = $(this).attr('data');
      $.ajax({
        type: "POST",
        url: "edit_cbc",
        dataType: "JSON",
        data: {
          id_cbc: id_cbc
        },
        success: function(data) {

          var ttm = formatDate(data.tgl_tagih_sm);
          var tsb = formatDate(data.tgl_surat_bank);
          var tn = formatDate(data.tgl_npp);
          var tp = formatDate(data.tgl_polis);
          var tst = formatDate(data.tgl_surat_tagih);
          var tmt = formatDate(data.tanggal_masuk_tagih);

          $('#Modal-detail').modal('show');
          $(nama_asr_detail).text(data.nama_asuransi);
          $(nama_bank_detail).text(data.nama_bank);
          $(no_ssm_detail).text(data.surat_tagih_sm);
          $(tgl_ssm_detail).text(ttm);
          $(sumber_bis_detail).text(data.pembawa_bisnis);
          $(nama_pri_detail).text(data.principal);
          $(no_surat_detail).text(data.no_surat_bank);
          $(tgl_surat_detail).text(tsb);
          $(nilai_per_detail).text('Rp.' + number_format(data.nilai_pertanggungan));
          $(nilai_pre_detail).text('Rp.' + number_format(data.nilai_premi));
          $(pot_komisi_detail).text('Rp.' + number_format(data.potensi_komisi));
          $(no_npp_detail).text(data.no_npp);
          $(tgl_npp_detail).text(tn);
          $(bb_premi_detail).text(data.bb_premi);
          $(no_polis_detail).text(data.no_polis);
          $(tgl_polis_detail).text(tp);
          $(srt_penagihan_detail).text(data.no_surat_tagih);
          $(tgl_s_pen_detail).text(tst);
          $(jml_tagihan_detail).text('Rp.' + number_format(data.jumlah_tagih));
          $(tgl_masuk_tagih_detail).text(tmt);
          $(keterangan_detail).text(data.ket);
          $(bukti_byr_detail).text(data.bukti_bayar);

        }
      });
    });
    // SHOW DETAIL CBC END


    // FUNGSI DELETE CBC
    $('#show_data_cbc').on('click', '.cbc_hapus', function() {
      var id_cbc = $(this).attr('data');
      Swal.fire({
        title: 'Anda yain akan menghapus?',
        text: "Data yang terhapus tidak bisa di kembalikan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#c82333",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",

      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "POST",
            url: "hapus_cbc",
            data: {
              id_cbc: id_cbc
            },
            success: function(data) {
              if (data == "Sukses") {
                Swal.fire({
                  type: 'success',
                  title: 'Berhasil!',
                  text: 'Data dihapus!',
                  showConfirmButton: false,
                  timer: 1000
                }).then(tampil_data_cbc());
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Gagal',
                  showConfirmButton: false,
                  timer: 2000
                })
                tampil_data_cbc();
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                type: 'error',
                title: 'Gagal',
              })
              console.log(XMLHttpRequest);
              console.log(textStatus);
              console.log(errorThrown);
              tampil_data_cbc();
            }
          });
        }
      })
    });
    // FUNGSI DELETE CBC END


    $('#s_asuransi').on('change', function() {
      var id_asr = $(this).val();
      $.ajax({
        type: "POST",
        url: "get_cabang_by_id",
        dataType: "JSON",
        data: {
          id_asr: id_asr
        },
        success: function(data) {
          for ($i; $i < data.length; $i++) {
            $('[name="id_cabang_asuransi[]"]').val(data.id_cabang_asuransi);
            $('[id="lbl"]').text(data.nama_cabang);
          }
        }
      });
    });
    /*=====  End of Cash By Cash  ======*/

  } else if (PAGE == "ASUM") {

    /*============================
      =            ASUM            =
      ============================*/

    tampil_data_asum();

    // FUNGSI CREATE ASUM
    $('#btn_simpan_asum').on('click', function() {

      if ($('#tertanggung').val() == "") {
        Swal.fire('Form tidak boleh kosong!', '', 'warning');
      } else {
        $.ajax({
          type: "POST",
          url: "simpan_asum",
          data: {
            tertanggung: $('#tertanggung').val(),
            produk: $('#produk').val(),
            no_polis: $('#no_polis').val(),
            tgl_polis: $('#tgl_polis').val(),
            premi: $('#premi').val(),
            no_surat_penagihan: $('#no_s_penagihan').val(),
            tgl_penagihan: $('#tgl_penagihan').val(),
            komisi: $('#komisi').val(),
            keterangan: $('#keterangan').val()
          },
          success: function(data) {
            if (data = "Sukses") {
              Swal.fire({
                type: 'success',
                title: 'Data berhasil di tambahkan',
                showConfirmButton: false,
                timer: 1500
              })
              tampil_data_asum();
              $('#modal-add').modal('toggle');
              $('.form-control').val("");
            } else {
              Swal.fire({
                type: 'error',
                title: 'Gagal',
                showConfirmButton: false,
                timer: 2000
              })
            }
          }
        });
      }
    });
    // FUNGSI CREATE ASUM END


    // FUNGSI READ ASUM
    function tampil_data_asum() {
      $(tbl_asum).DataTable().clear();
      $(tbl_asum).DataTable().destroy();
      $.ajax({
        type: 'ajax',
        url: 'json_asum',
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += `<tr>
              <td>${(i + 1)}</td>
              <td>${data[i].tertanggung}</td>
              <td>${data[i].no_polis}</td>
              <td>${data[i].tgl_polis}</td>
              <td>Rp. ${number_format(data[i].premi)}</td>
              <td>Rp. ${number_format(data[i].komisi)}</td>
              <td>${data[i].keterangan}</td>
              <td class="text-center">
              <button  class="btn btn-info btn-xs asum_edit" data=" ${data[i].id_asum}"><i class="fa fa-edit"></i></button>
              <button " class="btn btn-danger btn-xs asum_hapus" data=" ${data[i].id_asum}"><i class="fa fa-trash"></i></button>
              </td>
              </tr>`;
          }
          $('#show_data_asum').html(html);
          var DataTable = $(tbl_asum).DataTable({
            scrollX: true,
            scrollCollapse: false,
          });
        }
      });
    }
    // FUNGSI READ ASUM END


    // FUNGSI UPDATE ASUM
    $('#show_data_asum').on('click', '.asum_edit', function() {
      var id_asum = $(this).attr('data');
      $.ajax({
        type: "POST",
        url: "edit_asum",
        dataType: "JSON",
        data: {
          id_asum: id_asum
        },
        success: function(dat) {
          var data = dat[0];
          $('#modal-add').modal('show');
          $('.modal-title').html('<i class="fa fa-edit"></i> Update Data Cash By Cash');
          $('.modal-footer').html('<button class="btn btn-success mt-2" id="btn_update_asum">Update</button>');

          $(tertanggung).val(data.tertanggung);
          $(produk).val(data.produk);
          $(no_polis).val(data.no_polis);
          $(tgl_polis).val(data.tgl_polis);
          $(premi).val(number_format(data.premi));
          $(no_s_penagihan).val(data.no_surat_penagihan);
          $(tgl_penagihan).val(data.tgl_penagihan);
          $(komisi).val(number_format(data.komisi));
          $(keterangan).val(data.keterangan);
          $('#modal-add').on('hidden.bs.modal', function() {
            $('.form-control').val("");
            $('.modal-title').html('<i class="fa fa-plus"></i> Tambah Data Cash By Cash');
            $('.modal-footer').html('<button class="btn btn-primary mt-2" id="btn_simpan_asum">Simpan</button>');
          })

          $('#btn_update_asum').on('click', function() {
            $.ajax({
              type: "POST",
              url: "update_asum",
              data: {
                id_asum: data.id_asum,
                tertanggung: $('#tertanggung').val(),
                produk: $('#produk').val(),
                no_polis: $('#no_polis').val(),
                tgl_polis: $('#tgl_polis').val(),
                premi: $('#premi').val(),
                no_surat_penagihan: $('#no_s_penagihan').val(),
                tgl_penagihan: $('#tgl_penagihan').val(),
                komisi: $('#komisi').val(),
                keterangan: $('#keterangan').val()
              },
              success: function(data) {
                if (data = "Sukses") {
                  Swal.fire({
                    type: 'success',
                    title: 'Data berhasil di update',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  tampil_data_asum();
                  $('#modal-add').modal('toggle');
                  $('.form-control').val("");
                } else {
                  Swal.fire({
                    type: 'error',
                    title: 'Gagal',
                    showConfirmButton: false,
                    timer: 2000
                  })
                }
              }
            });
          });

        }
      });
    });
    // FUNGSI UPDATE ASUM END


    // FUNGSI DELETE ASUM END
    $('#show_data_asum').on('click', '.asum_hapus', function() {
      var id_asum = $(this).attr('data');
      Swal.fire({
        title: 'Anda yain akan menghapus?',
        text: "Data yang terhapus tidak bisa di kembalikan",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#c82333",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "POST",
            url: "hapus_asum",
            data: {
              id_asum: id_asum
            },
            success: function(data) {
              if (data == "Sukses") {
                Swal.fire({
                  type: 'success',
                  title: 'Berhasil!',
                  text: 'Data dihapus!',
                  showConfirmButton: false,
                  timer: 1000
                }).then(tampil_data_asum());
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Gagal',
                  showConfirmButton: false,
                  timer: 2000
                })
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                type: 'error',
                title: 'Gagal',
              })
            }
          });
        }
      })
    });


    /*=====  End of ASUM  ======*/
  }
});

$('.datepicker').datepicker({
  autoclose: true,
  format: "yyyy-m-d",
});

function kosong(field, kolom) {
  $(`#${field}`).addClass('is-invalid');
  $(`#${field}`).focus();
  $(`#${field}`).after(`<div class="invalid-feedback m-2">Kolom ${kolom} harus di isi</div>`);
}

function kosong2(field) {
  $(`#${field}`).addClass('is-invalid');
  $(`#${field}`).focus();
}

function OnEdited(field, act) {
  $(`#${field}`).on(act, function() {
    $(this).removeClass('is-invalid');
  });
}

function OnEdited2(field, act) {
  $(field).on(act, function() {
    $(this).removeClass('is-invalid');
  });
}

function currency(field) {
  $(`#${field}`).mask('000.000.000.000.000', {
    reverse: true
  });
}

function datePicker(field) {
  $(`#${field}`).datepicker({
    autoclose: true,
    format: "yyyy-m-d",
  });
}

function pilihChained() {
  $.ajax({
    url: 'Kredit_konsumtif/get_data/cabang_asuransi',
    type: 'POST',
    dataType: 'json',
    data: {
      id_asuransi: $('#nama_asr').val()
    },
    success: function(data) {
      var isi = `<option value="">--</option>`;
      $.each(data, function(e, i) {
        isi += `<option value="${i.id_cabang_asuransi}" data-chained="${i.id_asuransi}" >${i.nama_cabang}</option>`;
      });
      $(nama_cb).html(isi);
    }
  });
}

function dateRange(field) {
  $(`#${field}`).dateRangePicker({
    separator: ' sampai ',
    autoClose: true,
    language: 'id',
    getValue: function() {
      if ($(start).val() && $(end).val())
        return $(start).val() + ' to ' + $(end).val();
      else
        return '';
    },
    setValue: function(s, s1, s2) {
      $(start).val(s1);
      $(end).val(s2);
    }
  });
}

function formatDate(date) {
  var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;

  return [day, month, year].join('-');
}

function Uploader(field) {
  $(`#${field}`).on('change', function() {
    var path = $(this).val();
    var fileName = path.split(`C:\\fakepath\\`);
    $('.custom-file-label').html(fileName[1]);
    if ($(this).val() != "") {
      $(this).addClass('is-valid');
    }
  });
}

function AjaxOption(url, def, id, view, field) {
  $.ajax({
    url: url,
    type: 'POST',
    dataType: 'json',
    success: function(data) {
      var isi = `<option value="">-- ${def} --</option>`;
      if (data.length > 0) {

        $.each(data, function(index, i) {
          isi += `<option value="${i[id]}">${i[view]}</option>`
        });
        $(`#${field}`).html(isi);
      } else {
        $(`#${field}`).html(`<option value="">Data masih kosong</option>`);
      }
    }
  });
};