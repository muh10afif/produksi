<style>
    input[type="checkbox"] {
        zoom: 1.4;
    }
</style>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <input type="hidden" name="id_permohonan" id="id_permohonan" value="<?= $id_permohonan ?>">
                    <a href="<?= base_url('Kredit/Kredit_non_konsumtif/') ?>"><button class="btn btn-success btn-sm float-right"  type="button"><i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
                    <h5 id="judul">List Dokumen Persyaratan</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover" id="tabel_dokumen_persyaratan" width="100%" cellspacing="0">
                        <thead class="bg-success">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Dokumen</th>
                                <th>Nomor Dokumen</th>
                                <th>Tanggal Berakhir <br> Dokumen</th>
                                <th>Aksi</th>
                                <th>Dokumen</th>
                                <th>Kelengkapan</th>
                                <th>Validasi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer btn_simpan">
                    <mark>*Tulisan Merah Tidak wajib diisi.</mark>
                    <?php if ($id_dok_khusus['id_jenis_dokumen_persyaratan'] == 14) : ?>
                        <br><mark>*Harap isi jenis jaminan pada data permohonan, untuk persyaratan dokumen khusus!</mark>
                    <?php endif; ?>
                    <button class="btn btn-success btn-sm float-right" id="simpan_dokumen_persyaratan" type="button"><i class="fa fa-floppy-o mr-2"></i>Simpan</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- modal dokumen persyaratan -->
<div id="modal_dokumen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title text-dark" id="judul_modal">Ubah Data Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            
            <div class="modal-body">

                <form id="form_dokumen_syarat" autocomplete="off">

                <input type="hidden" id="id_dokumen_syarat" name="id_dokumen_syarat">
                
                <div class="row d-flex justify-content-center mt-3 mb-2">
                    <div class="col-md-10 mb-3 fm_no_dokumen">
                        <div class="row">
                            <label class="col-md-4 control-label col-form-label">Nomor Dokumen</label>
                            <div class="col-md-8">
                                <input type="text" id="nomor_dokumen" name="nomor_dokumen" class="form-control" placeholder="Masukkan Nomor Dokumen">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mb-3 fm_tgl_berakhir">
                        <div class="row">
                            <label class="col-md-4 control-label col-form-label">Tanggal Berakhir Dokumen</label>
                            <div class="col-md-8">
                            <input type="text" class="form-control datepicker2" id="tgl_berakhir_dok" name="tgl_berakhir_dok" placeholder="Masukkan Tanggal Berakhir" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 mb-3 fm_dokumen">
                        <div class="row">
                            <label class="col-md-4 control-label col-form-label">Dokumen</label>
                            <div class="col-md-8">
                                
                                <input type="file" name="dokumen_persyaratan" id="dokumen_persyaratan" accept="application/pdf" class="form-control mb-2">
                                <mark id="ket_upload">Upload file bertipe .pdf !</mark>

                            </div>
                        </div>
                    </div>
                </div>

                </form>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="simpan_dokumen">Simpan</button>
                <button type="button" class="btn btn-warning" id="data_menyusul">Data Menyusul</button>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        
        // 23-03-2020

            // menampilkan data dokumen persyaratan
            var tabel_dokumen_persyaratan  = $('#tabel_dokumen_persyaratan').DataTable({
                "processing"    : true,
                "ajax"          : "<?= base_url("kredit/kredit_non_konsumtif/tampil_dok_syarat/$id_permohonan") ?>",
                stateSave       : true,
                "order"         : [],
                "paging"        : false,
                "info"          : false,
                "columnDefs"     : [{
                    "targets"       : [4,5,6,7],
                    "orderable"     : false
                }]
            })

            // aksi menampilkan modal ubah data dokumen
            $('#tabel_dokumen_persyaratan').on('click', '.edit-dokumen', function () {
                var id_dokumen_syarat   = $(this).data('id');
                var id_jenis_dok        = $(this).data('id_jenis_dok');

                $('#form_dokumen_syarat').find('input, select, textarea').not("#id_dokumen_syarat").val('');

                $.ajax({
                    url         : "<?= base_url('Kredit/kredit_non_konsumtif/ambil_data_dokumen') ?>",
                    method      : "POST",
                    beforeSend  : function () {
                        swal({
                            title   : 'Menunggu',
                            html    : 'Memproses Data',
                            onOpen  : () => {
                                swal.showLoading();
                            }
                        })
                    },
                    data        : {id_dokumen_syarat:id_dokumen_syarat, id_jenis_dok:id_jenis_dok},
                    dataType    : "JSON",
                    success     : function (data) {

                        swal.close();

                        if (id_jenis_dok == 1 || id_jenis_dok == 4 || id_jenis_dok == 11 || id_jenis_dok == 12 || id_jenis_dok == 13 || id_jenis_dok == 14) {
                            $('.fm_no_dokumen').attr('hidden', true);
                            $('.fm_tgl_berakhir').attr('hidden', true);
                        } else {
                            if (id_jenis_dok == 8 || id_jenis_dok == 9) {
                                $('.fm_tgl_berakhir').attr('hidden', true);
                                $('.fm_no_dokumen').removeAttr('hidden');
                            } else {
                                $('.fm_no_dokumen').removeAttr('hidden');
                                $('.fm_tgl_berakhir').removeAttr('hidden');
                            }
                        }
                        
                        $('#id_dokumen_syarat').val(id_dokumen_syarat);
                        $('#modal_dokumen').modal('show');

                        $('#nomor_dokumen').val(data.nomor_dokumen);

                        var tgl_bra = data.tgl_berakhir_dok;

                        if (tgl_bra == null) {
                            $("#tgl_berakhir_dok").val('');
                        } else {
                            var tgl = $.datepicker.formatDate('dd-M-yy', new Date(tgl_bra));

                            $("#tgl_berakhir_dok").datepicker("setDate", new Date(tgl));
                        }

                        console.log(data.dokumen_persyaratan);

                    },
                    error       : function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }

                })

                return false;
                
            })

            // aksi simpan dokumen
            $('#simpan_dokumen').on('click', function () {

                var im_form = document.querySelector("#form_dokumen_syarat");

                var form = new FormData(im_form);

                $.ajax({
                    url         : "<?= base_url('Kredit/kredit_non_konsumtif/simpan_data_jenis_dokumen') ?>",
                    method      : "POST",
                    data        : form,
                    processData : false,
                    contentType : false,
                    cache       : false,
                    async       : false,
                    dataType    : "JSON",
                    success     : function (data) {

                        if (data.hasil == 0) {
                            swal({
                                title               : 'Upload Berkas',
                                text                : 'Data Tidak Berhasil Diupload',
                                buttonsStyling      : false,
                                confirmButtonClass  : "btn btn-danger",
                                type                : 'error',
                                showConfirmButton   : false,
                                timer               : 1000
                            }); 

                            return false;
                        } else if (data.hasil == 'berhasil') {
                            
                            tabel_dokumen_persyaratan.ajax.reload(null, false);

                            swal({
                                title               : 'Berhasil',
                                text                : 'Data Berhasil Disimpan',
                                buttonsStyling      : false,
                                confirmButtonClass  : "btn btn-success",
                                type                : 'success',
                                showConfirmButton   : false,
                                timer               : 1000
                            }); 

                            $('#modal_dokumen').modal('hide');
                        }

                    },
                    error       : function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }

                })

                return false;
            })

        // Akhir 23-03-2020

        // 24-03-2020

            // aksi bila checkbox kelengkapan di checklis
            $('#tabel_dokumen_persyaratan').on('click', '.kelengkapan', function () {

                var id = $(this).data('id');

                if($('#kelengkapan'+id).is(':checked')) {
                    $('.valid'+id).removeAttr('hidden');
                    $('.valid'+id).prop('checked', false); 
                } else {
                    $('.valid'+id).attr('hidden', true);
                    $('.valid'+id).prop('checked', false);
                }

            })

            // aksi simpan dokumen persyaratan
            $('#simpan_dokumen_persyaratan').on('click', function () {

                var kelengkapan = $('input[name="kelengkapan[]"]:checked').map(function () {
                    return $(this).attr('id_dok_syarat');
                }).get();

                var kelengkapan_id_jns_dok = $('input[name="kelengkapan[]"]:checked').map(function () {
                    return $(this).attr('id_jenis_dok_syarat');
                }).get();

                var valid       = $('input[name="valid[]"]:checked').map(function () {
                    return $(this).attr('id_dok_syarat');
                }).get();

                var valid_id_jns_dok       = $('input[name="valid[]"]:checked').map(function () {
                    return $(this).attr('id_jenis_dok_syarat');
                }).get();

                var id_permohonan = $('#id_permohonan').val();

                console.log(valid_id_jns_dok.length);

                var jml_kl = kelengkapan.length;
                var jml_vl = valid.length;

                swal({
                    title       : 'Konfirmasi',
                    text        : 'Yakin akan simpan data',
                    type        : 'warning',

                    buttonsStyling      : false,
                    confirmButtonClass  : "btn btn-info",
                    cancelButtonClass   : "btn btn-danger mr-3",

                    showCancelButton    : true,
                    confirmButtonText   : 'Kirim Data',
                    confirmButtonColor  : '#d33',
                    cancelButtonColor   : '#3085d6',
                    cancelButtonText    : 'Batal',
                    reverseButtons      : true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url         : "<?= base_url('kredit/kredit_non_konsumtif/simpan_dokumen_persyaratan') ?>",
                            method      : "POST",
                            beforeSend  : function () {
                                swal({
                                    title   : 'Menunggu',
                                    html    : 'Memproses Data',
                                    onOpen  : () => {
                                        swal.showLoading();
                                    }
                                })
                            },
                            data        : {kelengkapan:kelengkapan, valid:valid, id_permohonan:id_permohonan, jml_kelengkapan:jml_kl, jml_valid:jml_vl, kelengkapan_id_jns_dok:kelengkapan_id_jns_dok, valid_id_jns_dok:valid_id_jns_dok},
                            dataType    : "JSON",
                            success     : function (data) {

                                tabel_dokumen_persyaratan.ajax.reload(null, false);

                                swal({
                                    title               : 'Berhasil',
                                    text                : 'Data Berhasil Disimpan',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-success",
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 

                                // if (jml_kl == 15 && jml_vl == 15) {
                                //     $('.btn_simpan').attr('hidden', true);
                                // }
                                
                            },
                            error       : function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                            }

                        })

                        return false;
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        swal({
                            title               : 'Batal',
                            text                : 'Anda Membatalkan Simpan Dokumen Persyaratan',
                            buttonsStyling      : false,
                            confirmButtonClass  : "btn btn-info",
                            type                : 'error',
                            showConfirmButton   : false,
                            timer               : 1000
                        }); 
                    }
                })

            })

        // Akhir 24-03-2020

        // 12-04-2020

            // aksi data menyusul
            $('#data_menyusul').on('click', function () {

                var id_dokumen_syarat = $('#id_dokumen_syarat').val();
                
                $.ajax({
                    url     : "<?= base_url('Kredit/kredit_non_konsumtif/simpan_data_menyusul') ?>",
                    type    : "POST",
                    data    : {id_dokumen_syarat:id_dokumen_syarat},
                    success : function (data) {

                        tabel_dokumen_persyaratan.ajax.reload(null, false);
                        
                        swal({
                            title               : 'Berhasil',
                            text                : 'Data Berhasil Disimpan',
                            buttonsStyling      : false,
                            confirmButtonClass  : "btn btn-success",
                            type                : 'success',
                            showConfirmButton   : false,
                            timer               : 1000
                        }); 

                        $('#modal_dokumen').modal('hide');

                    }
                })

            })

        // Akhir 12-04-2020

    })

</script>