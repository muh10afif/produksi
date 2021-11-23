$(document).ready(function() {

	if (PAGE == "User") {
		/*================================
		=            Pengguna            =
		================================*/
		tampil_data_pengguna();

		// FUNGSI CREATE PENGGUNA
		$(btnTambah).on('click', function() {
			$.ajax({
				type: 'POST',
				url: 'Auth/json/level',
				dataType: 'json',
				success: function(data) {
					var isi_level = `<option value="">Pilih Level</option>`;
					$.each(data, function(i) {
						isi_level += `<option value="${data[i].id_level}">${data[i].level}</option>`;
					});

					var isi_modal = `
            <div class="form-row">
              <div class="col-md-12 ">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control form-control-sm" name="nama" id="nama" autocomplete="off">
                <div class="invalid-feedback" id="_erNama"></div>
              </div>
              <div class="col-md-12 ">
                <label for="username">Username</label>
                <input type="text" class="form-control form-control-sm" id="username" name="username" autocomplete="off">
                <div class="invalid-feedback" id="_erUsername"></div>
              </div>
              <div class="col-md-12 ">
                <label for="password">Password</label>
                <input type="Password" class="form-control form-control-sm" id="password" name="password" autocomplete="off"> 
                <div class="invalid-feedback" id="_erPassword"></div>
              </div>
              <div class="col-md-12 ">
                <label>Level</label>
                <select name="level" id="level" class="form-control form-control-sm">
                </select>
                <div class="invalid-feedback" id="_erLevel"></div>
              </div>
              <div class="col-md-12 ">
                <label for="nik">NIK</label>
                <input type="number" class="form-control form-control-sm" id="nik" name="nik" autocomplete="off">
                <div class="invalid-feedback" id="_erNik"></div>
              </div>
              <div class="col-md-12 ">
                <label for="alamat" class="col-form-label">Alamat</label>
                <textarea class="form-control form-control-sm" id="alamat"></textarea>
                <div class="invalid-feedback" id="_erAlamat"></div>
              </div>
              <div class="col-md-12 ">
                <label for="telpon" class="col-form-label">No Telpon</label>
                <input type="number" class="form-control form-control-sm" id="telpon" autocomplete="off">
                <div class="invalid-feedback" id="_erTelepon"></div>
              </div>
              <div class="col-md-12 ">
                <label for="email" class="col-form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="email" autocomplete="off">
                <div class="invalid-feedback" id="_erEmail"></div>
              </div>
            </div>
          `;

					$('#modal-add .modal-title').html(`<i class="fa fa-user-plus"></i> Tambah User`);
					$('#modal-add .modal-body').html(isi_modal);
					$('#modal-add .modal-footer').html(`<button class="btn btn-primary mt-2" id="btn_simpan">Register</button>`);

					$(level).html(isi_level);
					$("#modal-add").modal();

					//button-simpan
					$('#btn_simpan').on('click', function() {
						if ($(nama).val() == "") {
							kosong('nama', '_erNama', 'Nama');
						} else if ($(username).val() == "") {
							kosong('username', '_erUsername', 'Username');
						} else if ($(password).val() == "") {
							kosong('password', '_erPassword', 'Password');
						} else if ($(level).val() == "") {
							kosong('level', '_erLevel', 'Level');
						} else if ($(nik).val() == "") {
							kosong('nik', '_erNik', 'NIK');
						} else if ($(alamat).val() == "") {
							kosong('alamat', '_erAlamat', 'Alamat');
						} else if ($(telpon).val() == "") {
							kosong('telpon', '_erTelepon', 'Telepon');
						} else if ($(email).val() == "") {
							kosong('email', '_erEmail', 'Email');
						} else {
							$.ajax({
								type: "POST",
								url: "Auth/register_proses",
								dataType: "JSON",
								data: {
									nama_lengkap: $(nama).val(),
									username: $(username).val(),
									password: $(password).val(),
									id_level: $(level).val(),
									nik: $(nik).val(),
									alamat: $(alamat).val(),
									no_telp: $(telpon).val(),
									email: $(email).val(),
								},
								success: function(data) {
									$('#modal-add').modal('hide');
									Swal.fire({
										type: 'success',
										title: 'Data berhasil di tambahkan',
										showConfirmButton: false,
										timer: 1500
									})
									tampil_data_pengguna();
								}
							});
						}
					});
					OnEdited('nama', 'input');
					OnEdited('username', 'input');
					OnEdited('password', 'input');
					OnEdited('level', 'input');
					OnEdited('nik', 'input');
					OnEdited('alamat', 'input');
					OnEdited('telpon', 'input');
					OnEdited('email', 'input');
				}
			});
		});
		// FUNGSI CREATE PENGGUNA END

		// FUNGSI READ PENGGUNA
		function tampil_data_pengguna() {
			$('#pengguna').DataTable().clear();
			$('#pengguna').DataTable().destroy();
			$.ajax({
				type: 'ajax',
				url: 'Auth/json_join',
				dataType: 'json',
				success: function(data) {
					var html = '';
					$.each(data, function(i) {
						html += '<tr>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].nama_lengkap + '</td>' +
							'<td>' + data[i].nik + '</td>' +
							'<td>' + data[i].level + '</td>' +
							'<td class="text-center">' +
							'<button  class="btn btn-info btn-xs item_edit" data="' + data[i].id_pengguna + '"><i class="fa fa-edit"></i></button>' + ' ' +
							'<button " class="btn btn-danger btn-xs item_hapus" data="' + data[i].id_pengguna + '"><i class="fa fa-trash"></i></button>' +
							'</td>' +
							'</tr>';
					});
					$('#show_data').html(html);
					$('#pengguna').DataTable({
						scrollX: true,
					});
				}
			});
		}
		// FUNGSI READ PENGGUNA END

		// FUNGSI UPDATE PENGGUNA
		$('#show_data').on('click', '.item_edit', function() {
			var Isi_id_pengguna = $(this).attr('data');
			$('#btnTambah').click();
			$.ajax({
				type: "POST",
				url: "Auth/json/pengguna",
				dataType: "JSON",
				data: {
					id_pengguna: Isi_id_pengguna
				},
				success: function(data) {
					var dat = data[0];

					$('#modal-add .modal-title').html(` <i class="fa fa-edit"></i> Update User`);
					$('#modal-add .modal-footer').html(`<button class="btn btn-primary mt-2" id="btn_update">Update</button>`);
					$(nama).val(dat.nama_lengkap);
					$(username).val(dat.username);
					$(level).val(dat.id_level);
					$(nik).val(dat.nik);
					$(alamat).val(dat.alamat);
					$(telpon).val(dat.no_telp);
					$(email).val(dat.email);

					$('#btn_update').on('click', function() {
						if ($(nama).val() == "") {
							kosong('nama', '_erNama', 'Nama');
						} else if ($(username).val() == "") {
							kosong('username', '_erUsername', 'Username');
						} else if ($(password).val() == "") {
							kosong('password', '_erPassword', 'Password');
						} else if ($(level).val() == "") {
							kosong('level', '_erLevel', 'Level');
						} else if ($(nik).val() == "") {
							kosong('nik', '_erNik', 'NIK');
						} else if ($(alamat).val() == "") {
							kosong('alamat', '_erAlamat', 'Alamat');
						} else if ($(telpon).val() == "") {
							kosong('telpon', '_erTelepon', 'Telepon');
						} else if ($(email).val() == "") {
							kosong('email', '_erEmail', 'Email');
						} else {
							$.ajax({
								url: "Auth/update_pengguna",
								type: "POST",
								dataType: "JSON",
								data: {
									id_pengguna: Isi_id_pengguna,
									nama_lengkap: $(nama).val(),
									username: $(username).val(),
									password: $(password).val(),
									id_level: $(level).val(),
									nik: $(nik).val(),
									alamat: $(alamat).val(),
									no_telp: $(telpon).val(),
									email: $(email).val(),
								},
								success: function(data) {
									$('#modal-add').modal('hide');
									Swal.fire({
										type: 'success',
										title: 'Data berhasil di update',
										showConfirmButton: false,
										timer: 1500
									})
									tampil_data_pengguna();
								}
							});
						}
					});
				}
			});
		});
		// FUNGSI UPDATE PENGGUNA END


		// FUNGSI DELETE PENGGUNA
		$('#show_data').on('click', '.item_hapus', function() {
			var id_pengguna = $(this).attr('data');
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
						url: 'Auth/hapus_pengguna',
						type: 'POST',
						data: {
							id_pengguna: id_pengguna
						},
						success: function(data) {
							if (data == "Sukses") {
								Swal.fire({
									type: 'success',
									title: 'Berhasil!',
									text: 'Data dihapus!',
									showConfirmButton: false,
									timer: 1000
								}).then(tampil_data_pengguna());
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
		// FUNGSI DELETE PENGGUNA END

		/*=====  End of Pengguna  ======*/


	} else if (PAGE == "Asuransi") {

		/*================================
		=            Asuransi            =
		================================*/

		tampil_data_asuransi();

		// FUNGSI CREATE ASURANSI
		$('#btn_simpan_asr').on('click', function() {
			var nama_asuransi = $('#nama_asuransi').val();
			if (nama_asuransi == "") {
				Swal.fire({
					type: 'warning',
					title: 'Silahkan isi Nama Asuransi sebelum menyimpan',
					showConfirmButton: false,
					timer: 1500
				})
			} else {
				$.ajax({
					type: "POST",
					url: "Asuransi/simpan",
					dataType: "JSON",
					data: {
						nama_asuransi: nama_asuransi,
						add_by: id_pengguna

					},
					success: function(data) {
						$('#nama_asuransi').val("");
						Swal.fire({
							type: 'success',
							title: 'Data berhasil di disimpan',
							showConfirmButton: false,
							timer: 1000
						})
						tampil_data_asuransi();
					}
				});
			}
		});
		// FUNGSI CREATE ASURANSI END


		// FUNGSI READ ASURANSI
		function tampil_data_asuransi() {
			$('#asuransi').DataTable().clear();
			$('#asuransi').DataTable().destroy();
			$.ajax({
				type: 'ajax',
				url: 'Asuransi/json',
				dataType: 'json',
				success: function(data) {
					var html = '';
					$.each(data, function(i) {
						html += '<tr>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].nama_asuransi + '</td>' +
							'<td class="text-center">' +
							'<button  class="btn btn-info btn-xs asuransi_edit" data="' + data[i].id_asuransi + '"><i class="fa fa-edit"></i></button>' + ' ' +
							'<button " class="btn btn-danger btn-xs asuransi_hapus" data="' + data[i].id_asuransi + '"><i class="fa fa-trash"></i></button>' +
							'</td>' +
							'</tr>';
					});
					$('#show_data_asr').html(html);
					$('#asuransi').DataTable({
						scrollX: true,
					});
				}
			});
		}
		// FUNGSI READ ASURANSI END

		// FUNGSI UPDATE ASURANSI
		$('#show_data_asr').on('click', '.asuransi_edit', function() {
			var id_asuransi = $(this).attr('data');
			$.ajax({
				type: "POST",
				url: "Asuransi/edit",
				dataType: "JSON",
				data: {
					id_asuransi: id_asuransi
				},
				success: function(data) {
					$('#ModalEdit').modal('show');
					$('#ModalEdit .modal-body').html(`
            <div class="form-row">
              <div class="col-md-12 ">
                <input type="hidden" name="id_asuransi_edit" id="id_asuransi" value="${data.id_asuransi}">
                <label for="validationServer01">Nama Asuransi</label>
                <input type="text" class="form-control" name="nama_asuransi_edit" id="nama2" value="${data.nama_asuransi}">
              </div>
            </div>
          `);

				}
			});
		});

		//Update asuransi
		$('#btn_update_asr').on('click', function() {
			$.ajax({
				type: "POST",
				url: "Asuransi/update",
				dataType: "JSON",
				data: {
					id_asuransi: $('#id_asuransi').val(),
					nama_asuransi: $('#nama2').val(),
					add_by: id_pengguna
				},
				success: function(data) {
					$('#ModalEdit').modal('hide');
					Swal.fire({
						type: 'success',
						title: 'Data berhasil di update',
						showConfirmButton: false,
						timer: 1500
					})
					tampil_data_asuransi();
				}
			});
		});
		// FUNGSI UPDATE ASURANSI END

		// FUNGSI DELETE ASURANSI
		$('#show_data_asr').on('click', '.asuransi_hapus', function() {
			var id_asuransi = $(this).attr('data');
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
						url: "Asuransi/hapus",
						type: 'POST',
						data: {
							id_asuransi: id_asuransi
						},
						success: function(data) {
							if (data == "Sukses") {
								Swal.fire({
									type: 'success',
									title: 'Berhasil!',
									text: 'Data dihapus!',
									showConfirmButton: false,
									timer: 1000
								}).then(tampil_data_asuransi());
							} else {
								Swal.fire({
									type: 'error',
									title: 'Gagal',
									showConfirmButton: false,
									timer: 2000
								})
								tampil_data_asuransi();
							}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							Swal.fire({
								type: 'error',
								title: 'Gagal',
							})
							tampil_data_asuransi();
						}
					});
				}
			})
		});
		// FUNGSI DELETE ASURANSI END

		/*=====  End of Asuransi  ======*/


	} else if (PAGE == "Cabang Asuransi") {

		/*=======================================
		=            Cabang Asuransi            =
		=======================================*/

		tampil_data_cabang_asuransi();
		var isi_cabang = `<option value="">Pilih Level</option>`;
		$.each(data_asuransi, function(i) {
			isi_cabang += `<option value="${data_asuransi[i].id_asuransi}">${data_asuransi[i].nama_asuransi}</option>`;
		});

		// FUNGSI CREATE CABANG ASURANSI
		$(btnTambah).on('click', function() {
			$('#modal-add .modal-title').html(`<i class="fa fa-plus"></i> Tambah Data Cabang Asuransi`);
			$('#modal-add .modal-body').html(`
        <div class="form-row">
          <div class="col-md-12 ">
            <label>Asuransi</label>
            <select name="nama_asr" id="nama_asr" class="form-control">
            </select>
            <div class="invalid-feedback" id="_erAsr"></div>
          </div>
           <div class="col-md-12 ">
            <label for="validationServer01">Nama Cabang Asuransi</label>
            <input type="text" class="form-control" name="nama_cabang" id="nama_cabang">
            <div class="invalid-feedback" id="_erCabang"></div>
          </div>
           <div class="col-md-12 ">
            <label for="validationServer01">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat"></textarea>
            <div class="invalid-feedback" id="_erAlamat"></div>
          </div>
           <div class="col-md-12 ">
            <label for="validationServer01">Telepon</label>
          <input type="text" class="form-control" name="telepon" id="telepon">
            <div class="invalid-feedback" id="_erTelepon"></div>
          </div>
            <div class="col-md-12 ">
            <label for="validationServer01">Email</label>
          <input type="text" class="form-control" name="email" id="email">
            <div class="invalid-feedback" id="_erEmail"></div>
          </div>
        </div>
      `);
			$('#modal-add .modal-footer').html(`<button class="btn btn-primary mt-2" id="btn_simpan_cbasr" type="submit">Simpan</button>`);
			$(nama_asr).html(isi_cabang)
			$('#modal-add').modal();

			//button-simpan
			$('#btn_simpan_cbasr').on('click', function() {
				if ($(nama_asr).val() == "") {
					kosong('nama_asr', '_erAsr', 'Asuransi');
				} else if ($(nama_cabang).val() == "") {
					kosong('nama_cabang', '_erCabang', 'Nama Cabang');
				} else if ($(alamat).val() == "") {
					kosong('alamat', '_erAlamat', 'Alamat');
				} else if ($(telepon).val() == "") {
					kosong('telepon', '_erTelepon', 'Telepon');
				} else if ($(email).val() == "") {
					kosong('email', '_erEmail', 'Email');
				} else {
					$.ajax({
						type: "POST",
						url: "Cabang_asuransi/simpan",
						dataType: "JSON",
						data: {
							id_asuransi: $(nama_asr).val(),
							nama_cabang: $(nama_cabang).val(),
							alamat: $(alamat).val(),
							telepon: $(telepon).val(),
							email: $(email).val(),
							add_by: id_pengguna
						},
						success: function(data) {
							$('#modal-add').modal('hide');
							Swal.fire({
								type: 'success',
								title: 'Data berhasil di tambahkan',
								showConfirmButton: false,
								timer: 1500
							})
							tampil_data_cabang_asuransi();
						}
					});
				}
			});
			OnEdited('nama_asr', 'input');
			OnEdited('nama_cabang', 'input');
			OnEdited('alamat', 'input');
			OnEdited('telepon', 'input');
			OnEdited('email', 'input');
		});
		// FUNGSI CREATE CABANG ASURANSI END


		// FUNGSI READ CABANG ASURANSI
		function tampil_data_cabang_asuransi() {
			$('#cb_asuransi').DataTable().clear();
			$('#cb_asuransi').DataTable().destroy();
			$.ajax({
				type: 'ajax',
				url: 'Cabang_asuransi/json',
				dataType: 'json',
				success: function(data) {
					var html = '';
					$.each(data, function(i) {
						html += '<tr>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].asuransi + '</td>' +
							'<td>' + data[i].nama_cabang + '</td>' +
							'<td>' + data[i].alamat + '</td>' +
							'<td>' + data[i].telepon + '</td>' +
							'<td>' + data[i].email + '</td>' +
							'<td class="text-center">' +
							'<button  class="btn btn-info btn-xs cb_asuransi_edit" data="' + data[i].id_cabang_asuransi + '"><i class="fa fa-edit"></i></button>' + ' ' +
							'<button " class="btn btn-danger btn-xs cb_asuransi_hapus" data="' + data[i].id_cabang_asuransi + '"><i class="fa fa-trash"></i></button>' +
							'</td>' +
							'</tr>';
					});
					$('#show_data').html(html);
					$('#cb_asuransi').DataTable();
				}

			});
		}
		// FUNGSI READ CABANG ASURANSI END

		//FUNGSI UPDATE CABANG ASURANSI
		$('#show_data').on('click', '.cb_asuransi_edit', function() {
			var id_cabang_asuransi = $(this).attr('data');
			$('#btnTambah').click();
			$.ajax({
				type: "POST",
				url: "Cabang_asuransi/getData/cabang_asuransi",
				dataType: "JSON",
				data: {
					id_cabang_asuransi: id_cabang_asuransi
				},
				success: function(dat) {
					var data = dat[0];

					$('#modal-add .modal-title').html(` <i class="fa fa-edit"></i> Update Cabang Asuransi`);
					$('#modal-add .modal-footer').html(`<button class="btn btn-primary mt-2" id="btn_update">Update</button>`);
					$(nama_asr).val(data.id_asuransi);
					$(nama_cabang).val(data.nama_cabang);
					$(alamat).val(data.alamat);
					$(telepon).val(data.telepon);
					$(email).val(data.email);


					$('#btn_update').on('click', function() {
						if ($(nama_asr).val() == "") {
							kosong('nama_asr', '_erAsr', 'Asuransi');
						} else if ($(nama_cabang).val() == "") {
							kosong('nama_cabang', '_erCabang', 'Nama Cabang');
						} else if ($(alamat).val() == "") {
							kosong('alamat', '_erAlamat', 'Alamat');
						} else if ($(telepon).val() == "") {
							kosong('telepon', '_erTelepon', 'Telepon');
						} else if ($(email).val() == "") {
							kosong('email', '_erEmail', 'Email');
						} else {
							$.ajax({
								url: "Cabang_asuransi/update",
								type: "POST",
								dataType: "JSON",
								data: {
									id_cabang_asuransi: id_cabang_asuransi,
									nama_cabang: $(nama_cabang).val(),
									id_asuransi: $(nama_asr).val(),
									alamat: $(alamat).val(),
									telepon: $(telepon).val(),
									email: $(email).val(),
									add_by: id_pengguna
								},
								success: function(data) {
									$('#modal-add').modal('hide');
									Swal.fire({
										type: 'success',
										title: 'Data berhasil di update',
										showConfirmButton: false,
										timer: 1500
									})
									tampil_data_cabang_asuransi();
								}
							});
						}
					});
				}
			});
		});
		// FUNGSI UPDATE CABANG ASURANSI END


		// FUNGSI DELETE CABANG ASURANSI
		$('#show_data').on('click', '.cb_asuransi_hapus', function() {
			var id_cabang_asuransi = $(this).attr('data');
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
						url: 'Cabang_asuransi/hapus',
						type: 'POST',
						data: {
							id_cabang_asuransi: id_cabang_asuransi
						},
						success: function(data) {
							if (data == "Sukses") {
								Swal.fire({
									type: 'success',
									title: 'Berhasil!',
									text: 'Data dihapus!',
									showConfirmButton: false,
									timer: 1000
								}).then(tampil_data_cabang_asuransi());
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
		// FUNGSI DELETE CABANG ASURANSI END
		/*=====  End of Cabang Asuransi  ======*/


	} else if (PAGE == "Jenis Kredit") {


		/*================================
		=            Jenis Kredit            =
		================================*/
		tampil_data_jenis_kredit();

		// FUNGSI CREATE JENIS KREDIT
		$('#btn_simpan_jk').on('click', function() {
			var jenis_kredit = $('#jenis_kredit').val();
			if (jenis_kredit == "") {
				Swal.fire({
					type: 'warning',
					title: 'Silahkan isi Jenis Kredit sebelum menyimpan',
					showConfirmButton: false,
					timer: 1500
				})
			} else {
				$.ajax({
					type: "POST",
					url: "Jenis_kredit/simpan",
					dataType: "JSON",
					data: {
						jenis_kredit: jenis_kredit,
						add_by: id_pengguna
					},
					success: function(data) {
						$('#jenis_kredit').val("");
						Swal.fire({
							type: 'success',
							title: 'Data berhasil di disimpan',
							showConfirmButton: false,
							timer: 1000
						})
						tampil_data_jenis_kredit();
					}
				});
			}
		});
		// FUNGSI CREATE JENIS KREDIT END

		// FUNGSI READ JENIS KREDIT
		function tampil_data_jenis_kredit() {
			$.ajax({
				type: 'ajax',
				url: 'Jenis_kredit/json',
				dataType: 'json',
				success: function(data) {
					var html = '';
					$.each(data, function(i) {
						html += '<tr>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].jenis_kredit + '</td>' +
							'<td class="text-center">' +
							'<button  class="btn btn-info btn-xs jk_edit" data="' + data[i].id_jenis_kredit + '"><i class="fa fa-edit"></i></button>' + ' ' +
							'<button " class="btn btn-danger btn-xs jk_hapus" data="' + data[i].id_jenis_kredit + '"><i class="fa fa-trash"></i></button>' +
							'</td>' +
							'</tr>';
					});
					$('#j_kredit').DataTable().clear();
					$('#j_kredit').DataTable().destroy();
					$('#show_data_jk').html(html);
					$('#j_kredit').DataTable({
						scrollX: true,
					});
				}

			});
		}
		// FUNGSI READ JENIS KREDIT END


		// FUNGSI UPDATE JENIS KREDIT
		$('#show_data_jk').on('click', '.jk_edit', function() {
			var id_jenis_kredit = $(this).attr('data');
			$.ajax({
				type: "POST",
				url: "Jenis_kredit/edit",
				dataType: "JSON",
				data: {
					id_jenis_kredit: id_jenis_kredit
				},
				success: function(data) {
					$('#ModalEdit').modal('show');
					$('#ModalEdit .modal-body').html(`
            <div class="form-row">
              <div class="col-md-12 ">
                <input type="hidden" name="id_jenis_kredit_edit" id="id_jenis_kredit" value="${data.id_jenis_kredit}">
                <label for="validationServer01">Jenis Kredit</label>
                <input type="text" class="form-control" name="jenis_kredit_edit" id="jenis_kredit2" value="${data.jenis_kredit}">
              </div>
            </div>
          `);
				}
			});
		});

		// //Update asuransi
		$('#btn_update_jk').on('click', function() {
			var id_jenis_kredit = $('#id_jenis_kredit').val();
			var jenis_kredit = $('#jenis_kredit2').val();
			$.ajax({
				type: "POST",
				url: "Jenis_kredit/update",
				dataType: "JSON",
				data: {
					id_jenis_kredit: id_jenis_kredit,
					jenis_kredit: jenis_kredit,
					add_by: id_pengguna
				},
				success: function(data) {
					$('#ModalEdit').modal('hide');
					Swal.fire({
						type: 'success',
						title: 'Data berhasil di update',
						showConfirmButton: false,
						timer: 1500
					})
					tampil_data_jenis_kredit();
				}
			});
		});
		// FUNGSI UPDATE JENIS KREDIT END

		// FUNGSI DELETE JENIS KREDIT
		$('#show_data_jk').on('click', '.jk_hapus', function() {
			var id_jenis_kredit = $(this).attr('data');
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
						url: "Jenis_kredit/hapus",
						data: {
							id_jenis_kredit: id_jenis_kredit
						},
						success: function(data) {
							if (data == "Sukses") {
								Swal.fire({
									type: 'success',
									title: 'Berhasil!',
									text: 'Data dihapus!',
									showConfirmButton: false,
									timer: 1000
								}).then(tampil_data_jenis_kredit());
							} else {
								Swal.fire({
									type: 'error',
									title: 'Gagal',
									showConfirmButton: false,
									timer: 2000
								})
								tampil_data_jenis_kredit();
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
							tampil_data_jenis_kredit();
						}
					});
				}
			})
		});
		// FUNGSI DELETE JENIS KREDIT END

		/*=====  End of Jenis Kredit ======*/


	} else if (PAGE == "Bank") {

		/*============================
		=            Bank            =
		============================*/
		tampil_data_bank();

		// FUNGSI CREATE BANK
		$('#btn_simpan_bank').on('click', function() {
			var nama_bank = $('#nama_bank').val();
			if (nama_bank == "") {
				Swal.fire({
					type: 'warning',
					title: 'Silahkan isi Nama Bank sebelum menyimpan',
					showConfirmButton: false,
					timer: 1500
				})
			} else {
				$.ajax({
					type: "POST",
					url: "bank/simpan",
					dataType: "JSON",
					data: {
						nama_bank: nama_bank,
						add_by: id_pengguna
					},
					success: function(data) {
						$('#nama_bank').val("");
						Swal.fire({
							type: 'success',
							title: 'Data berhasil di disimpan',
							showConfirmButton: false,
							timer: 1000
						})
						tampil_data_bank();
					}
				});
			}
		});
		// FUNGSI CREATE BANK END


		// FUNGSI READ BANK
		function tampil_data_bank() {
			$('#bank').DataTable().clear();
			$('#bank').DataTable().destroy();
			$.ajax({
				type: 'ajax',
				url: 'bank/json',
				dataType: 'json',
				success: function(data) {
					var html = '';
					$.each(data, function(i) {
						html += '<tr>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].nama_bank + '</td>' +
							'<td class="text-center">' +
							'<button  class="btn btn-info btn-xs bank_edit" data="' + data[i].id_bank + '"><i class="fa fa-edit"></i></button>' + ' ' +
							'<button " class="btn btn-danger btn-xs bank_hapus" data="' + data[i].id_bank + '"><i class="fa fa-trash"></i></button>' +
							'</td>' +
							'</tr>';
					});
					$('#show_data_bank').html(html);
					$('#bank').DataTable({
						scrollX: true,
					});
				}

			});
		}
		// FUNGSI READ BANK END


		// FUNGSI UPDATE BANK
		$('#show_data_bank').on('click', '.bank_edit', function() {
			var id_bank = $(this).attr('data');
			$.ajax({
				type: "POST",
				url: "bank/edit",
				dataType: "JSON",
				data: {
					id_bank: id_bank
				},
				success: function(data) {
					$('#ModalEdit').modal('show');
					$('#ModalEdit .modal-body').html(`
            <div class="form-row">
              <div class="col-md-12 ">
                <input type="hidden" name="id_bank_edit" id="id_bank" value="${data.id_bank}">
                <label for="validationServer01">Nama Bank</label>
                <input type="text" class="form-control" name="nama_bank_edit" id="nama2" value="${data.nama_bank}">
              </div>
            </div>
          `);

				}
			});
		});

		//Update bank
		$('#btn_update_bank').on('click', function() {
			$.ajax({
				type: "POST",
				url: "bank/update",
				dataType: "JSON",
				data: {
					id_bank: $('#id_bank').val(),
					nama_bank: $('#nama2').val(),
					add_by: id_pengguna
				},
				success: function(data) {
					$('#ModalEdit').modal('hide');
					Swal.fire({
						type: 'success',
						title: 'Data berhasil di update',
						showConfirmButton: false,
						timer: 1500
					})
					tampil_data_bank();
				}
			});
		});
		// FUNGSI UPDATE BANK END


		// FUNGSI DELETE BANK
		$('#show_data_bank').on('click', '.bank_hapus', function() {
			var id_bank = $(this).attr('data');
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
						url: "bank/hapus",
						data: {
							id_bank: id_bank
						},
						success: function(data) {
							if (data == "Sukses") {
								Swal.fire({
									type: 'success',
									title: 'Berhasil!',
									text: 'Data dihapus!',
									showConfirmButton: false,
									timer: 1000
								}).then(tampil_data_bank());
							} else {
								Swal.fire({
									type: 'error',
									title: 'Gagal',
									showConfirmButton: false,
									timer: 2000
								})
								tampil_data_bank();
							}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							Swal.fire({
								type: 'error',
								title: 'Gagal',
							})
							tampil_data_bank();
						}
					});
				}
			})
		});
		// FUNGSI DELETE BANK END

		/*=====  End of Bank  ======*/


	} else if (PAGE == "Jenis BG") {

		/*============================
		=            Jenis BG            =
		============================*/

		tampil_data_jenis_bg();


		// FUNGSI CREATE JENIS BG
		$('#btn_simpan_jenis_bg').on('click', function() {

			var jenis_bg = $('#jenis_bg').val();
			if (jenis_bg == "") {
				Swal.fire({
					type: 'warning',
					title: 'Silahkan isi Nama Asuransi sebelum menyimpan',
					showConfirmButton: false,
					timer: 1500
				})
			} else {
				$.ajax({
					type: "POST",
					url: "jenis_bg/simpan",
					dataType: "JSON",
					data: {
						jenis_bg: jenis_bg,
						add_by: id_pengguna
					},
					success: function(data) {
						$('#jenis_bg').val("");
						Swal.fire({
							type: 'success',
							title: 'Data berhasil di disimpan',
							showConfirmButton: false,
							timer: 1000
						})
						tampil_data_jenis_bg();
					}
				});
			}
		});
		// FUNGSI CREATE JENIS BG END

		// FUNGSI READ JENIS BG
		function tampil_data_jenis_bg() {
			$('#tbl_jenis_bg').DataTable().clear();
			$('#tbl_jenis_bg').DataTable().destroy();
			$.ajax({
				type: 'ajax',
				url: 'jenis_bg/json',
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					$.each(data, function(i) {
						html += '<tr>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].jenis_bg + '</td>' +
							'<td class="text-center">' +
							'<button  class="btn btn-info btn-xs jenis_bg_edit" data="' + data[i].id_jenis_bg + '"><i class="fa fa-edit"></i></button>' + ' ' +
							'<button " class="btn btn-danger btn-xs jenis_bg_hapus" data="' + data[i].id_jenis_bg + '"><i class="fa fa-trash"></i></button>' +
							'</td>' +
							'</tr>';
					});
					$('#show_data_jenis_bg').html(html);
					$('#tbl_jenis_bg').DataTable({
						scrollX: true,
					});
				}
			});
		}
		// FUNGSI READ JENIS BG END

		//FUNGSI UPDATE JENIS BG
		$('#show_data_jenis_bg').on('click', '.jenis_bg_edit', function() {
			var id_jenis_bg = $(this).attr('data');
			$.ajax({
				type: "POST",
				url: "jenis_bg/edit",
				dataType: "JSON",
				data: {
					id_jenis_bg: id_jenis_bg
				},
				success: function(data) {
					$('#ModalEdit').modal('show');
					$('#ModalEdit .modal-body').html(`
            <div class="form-row">
              <div class="col-md-12 ">
                <input type="hidden" name="id_jenis_bg_edit" id="id_jenis_bg" value="${data.id_jenis_bg}">
                <label for="nama2">Jenis BG</label>
                <input type="text" class="form-control" name="jenis_bg_edit" id="jenis_bg2" value="${data.jenis_bg}">
              </div>
            </div>
          `);
				}
			});
		});

		//Update jenis_bg
		$('#btn_update_jenis_bg').on('click', function() {
			$.ajax({
				type: "POST",
				url: "jenis_bg/update",
				dataType: "JSON",
				data: {
					id_jenis_bg: $('#id_jenis_bg').val(),
					jenis_bg: $('#jenis_bg2').val(),
					add_by: id_pengguna
				},
				success: function(data) {
					$('#ModalEdit').modal('hide');
					Swal.fire({
						type: 'success',
						title: 'Data berhasil di update',
						showConfirmButton: false,
						timer: 1500
					})
					tampil_data_jenis_bg();
				}
			});
		});
		//FUNGSI UPDATE JENIS BG END

		//FUNGSI DELETE JENIS BG
		//GET HAPUS
		$('#show_data_jenis_bg').on('click', '.jenis_bg_hapus', function() {
			var id_jenis_bg = $(this).attr('data');
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
						url: "jenis_bg/hapus",
						data: {
							id_jenis_bg: id_jenis_bg
						},
						success: function(data) {
							if (data == "Sukses") {
								Swal.fire({
									type: 'success',
									title: 'Berhasil!',
									text: 'Data dihapus!',
									showConfirmButton: false,
									timer: 1000
								}).then(tampil_data_jenis_bg());
							} else {
								Swal.fire({
									type: 'error',
									title: 'Gagal',
									showConfirmButton: false,
									timer: 2000
								})
								tampil_data_jenis_bg();
							}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							Swal.fire({
								type: 'error',
								title: 'Gagal',
							})
							tampil_data_jenis_bg();
						}
					});
				}
			})
		});
		//FUNGSI DELETE JENIS BG END

		/*=====  End of Jenis BG  ======*/


	} else if (PAGE == "Cabang Bank") {

		/*===================================
		=            Cabang Bank            =
		===================================*/

		tampil_cabang_bank();
		var isi_cabang = `<option value="">Pilih Bank</option>`;
		$.each(cabang_bank, function(i) {
			isi_cabang += `<option value="${cabang_bank[i].id_bank}">${cabang_bank[i].nama_bank}</option>`;
		});


		// FUNGSI CREATE CABANG BANK
		$(btnTambah).on('click', function() {
			$('#modal-add .modal-title').html(`<i class="fa fa-plus"></i> Tambah Data Cabang Asuransi`);
			$('#modal-add .modal-body').html(`
        <div class="form-row">
          <div class="col-md-12 ">
            <label>Nama Bank</label>
            <select name="nama_bank" id="nama_bank" class="form-control" required="required">
            </select>
            <div class="invalid-feedback" id="_erBank"></div>
          </div>
           <div class="col-md-12 ">
            <label for="validationServer01">Cabang Bank</label>
            <input type="text" class="form-control" name="cb_bank" id="cb_bank" placeholder="Cabang Bank">
            <div class="invalid-feedback" id="_erCabang"></div>
          </div>
        </div>
      `);
			$('#modal-add .modal-footer').html(`<button class="btn btn-primary mt-2" id="btn_simpan_cb_bank">Simpan</button>`);
			$(nama_bank).html(isi_cabang)
			$('#modal-add').modal();

			$('#btn_simpan_cb_bank').on('click', function() {
				if ($(nama_bank).val() == "") {
					kosong('nama_bank', '_erBank', 'Nama Bank');
				} else if ($(cb_bank).val() == "") {
					kosong('cb_bank', '_erCabang', 'Nama Cabang');
				} else {
					$.ajax({
						type: "POST",
						url: "Cabang_bank/simpan",
						data: {
							id_bank: $(nama_bank).val(),
							cabang_bank: $(cb_bank).val(),
							add_by: id_pengguna
						},
						success: function(data) {
							console.log(data);

							$('#modal-add').modal('hide');
							Swal.fire({
								type: 'success',
								title: 'Data berhasil di tambahkan',
								showConfirmButton: false,
								timer: 1500
							})
							tampil_cabang_bank();
						}
					});
				}
			});
			OnEdited('nama_bank', 'input');
			OnEdited('cb_bank', 'input');
		});
		// FUNGSI CREATE CABANG BANK END


		// FUNGSI READ CABANG BANK
		function tampil_cabang_bank() {
			$('#tbl_cabang_bank').DataTable().clear();
			$('#tbl_cabang_bank').DataTable().destroy();
			$.ajax({
				type: 'ajax',
				url: 'Cabang_bank/json',
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					$.each(data, function(i) {
						html += '<tr>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].nama_bank + '</td>' +
							'<td>' + data[i].cabang_bank + '</td>' +
							'<td class="text-center">' +
							'<button  class="btn btn-info btn-xs cb_bank_edit" data="' + data[i].id_cabang_bank + '"><i class="fa fa-edit"></i></button>' + ' ' +
							'<button " class="btn btn-danger btn-xs cb_bank_hapus" data="' + data[i].id_cabang_bank + '"><i class="fa fa-trash"></i></button>' +
							'</td>' +
							'</tr>';
					});
					$('#show_data_cabang_bank').html(html);
					$('#tbl_cabang_bank').DataTable({
						scrollX: true,
					});
				}
			});
		}
		// FUNGSI READ CABANG BANK END


		// FUNGSI UPDATE CABANG BANK
		$('#show_data_cabang_bank').on('click', '.cb_bank_edit', function() {
			$('#btnTambah').click();
			var id_cabang_bank = $(this).attr('data');
			$.ajax({
				type: "POST",
				url: "Cabang_bank/edit",
				dataType: "JSON",
				data: {
					id_cabang_bank: id_cabang_bank
				},
				success: function(data) {
					$('#modal-add .modal-title').html(`<i class="fa fa-edit"></i> Edit Cabang Bank`);
					$('#modal-add .modal-footer').html(`<button class="btn btn-primary mt-2" id="btn_update_cb_bank" type="submit">Update</button>`);
					$(nama_bank).val(data.bank);
					$(cb_bank).val(data.cabang_bank);

					$('#btn_update_cb_bank').on('click', function() {
						console.log('a');
						if ($(nama_bank).val() == "") {
							kosong('nama_bank', '_erBank', 'Nama Bank');
						} else if ($(cb_bank).val() == "") {
							kosong('cb_bank', '_erCabang', 'Nama Cabang');
						} else {
							$.ajax({
								type: "POST",
								url: "Cabang_bank/update",
								dataType: "JSON",
								data: {
									id_cabang_bank: id_cabang_bank,
									id_bank: $(nama_bank).val(),
									cabang_bank: $(cb_bank).val(),
									add_by: id_pengguna
								},
								success: function(data) {
									$('#modal-add').modal('hide');
									Swal.fire({
										type: 'success',
										title: 'Data berhasil di update',
										showConfirmButton: false,
										timer: 1500
									})
									tampil_cabang_bank();
								}
							});
						}
					});
				}
			});
		});
		// FUNGSI UPDATE CABANG BANK END


		// FUNGSI UPDATE CABANG BANK END
		$('#show_data_cabang_bank').on('click', '.cb_bank_hapus', function() {
			var id_cabang_bank = $(this).attr('data');
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
						url: "cabang_bank/hapus",
						data: {
							id_cabang_bank: id_cabang_bank
						},
						success: function(data) {
							if (data == "Sukses") {
								Swal.fire({
									type: 'success',
									title: 'Berhasil!',
									text: 'Data dihapus!',
									showConfirmButton: false,
									timer: 1000
								}).then(tampil_cabang_bank());
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

		/*=====  End of Cabang Bank  ======*/

	} else if (PAGE == "Principal") {

		/*===================================
		=            Principal            =
		===================================*/

		tampil_data_principal();

		// FUNGSI CREATE PRINCIPAL
		$(btnTambah).on('click', function() {
			$('.modal-dialog').addClass('modal-lg');
			$('#modal-add .modal-title').html(`Tambah Data <?= $title?>`);

			$('#modal-add .modal-body').html(`
        <div class="form-group row">
            <div class="col-3">
              <label for="input_nama" class="col-form-label">Nama Principal</label>
            </div>
            <div class="col">
              <input type="text" class="form-control form-control-sm" id="input_nama">
              <div class="invalid-feedback" id="_erNama"></div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">
              <label for="input_alamat" class="col-form-label">Alamat Principal</label>
            </div>
            <div class="col">
              <textarea class="form-control form-control-sm" id="input_alamat"></textarea>
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-3">
              <label for="input_nama_PIC1" class="col-form-label">Nama Pengurus 1 Principal</label>
            </div>
            <div class="col">
              <input type="text" class="form-control form-control-sm" id="input_nama_PIC1">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">
              <label for="input_jabatan_PIC1" class="col-form-label">Jabatan Pengurus 1 Principal</label>
            </div>
            <div class="col">
              <input type="text" class="form-control form-control-sm" id="input_jabatan_PIC1">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">
              <label for="input_nik_PIC1" class="col-form-label">NIK Pengurus 1 Principal</label>
            </div>
            <div class="col">
              <input type="number" class="form-control form-control-sm" id="input_nik_PIC1">
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-3">
              <label for="input_nama_PIC2" class="col-form-label">Nama Pengurus 2 Principal</label>
            </div>
            <div class="col">
              <input type="text" class="form-control form-control-sm" id="input_nama_PIC2">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">
              <label for="input_jabatan_PIC2" class="col-form-label">Jabatan Pengurus 2 Principal</label>
            </div>
            <div class="col">
              <input type="text" class="form-control form-control-sm" id="input_jabatan_PIC2">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-3">
              <label for="input_nik_PIC2" class="col-form-label">NIK Pengurus 2 Principal</label>
            </div>
            <div class="col">
              <input type="number" class="form-control form-control-sm" id="input_nik_PIC2">
            </div>
          </div>
          <hr>
		  <div class="form-group row">
				<div class="col-3">
				<label for="akta_principal" class="col-form-label">Akta Principal</label>
				</div>
				<div class="col">
					<input type="text" class="form-control form-control-sm" id="input_akta_principal">
				</div>
			</div>
          <div class="form-group row">
            <div class="col-3">
              <label for="input_nomor_akta_principal" class="col-form-label">Nomor Akta Principal</label>
            </div>
            <div class="col">
              <input type="number" class="form-control form-control-sm" id="input_nomor_akta_principal">
            </div>
		  </div>
		  <div class="form-group row">
				<div class="col-3">
				<label for="nomor_akta_principal" class="col-form-label">Tanggal Akta Principal</label>
				</div>
				<div class="col">
				<input type="text" class="form-control form-control-sm datepicker3" name="tgl_akta_principal" id="tgl_akta_principal">
				</div>
			</div>
      `);
			$('#modal-add .modal-footer').html(`<button class="btn btn-primary mt-2" id="btn_simpan_cbasr">Simpan</button>`);
			$('#modal-add').modal();

			//button-simpan
			$('#btn_simpan_cbasr').on('click', function() {
				if ($(input_nama).val() == "") {
					kosong('input_nama', '_erNama', 'Nama Principal');
				} else {
					$.ajax({
						type: "POST",
						url: "Principal/simpan",
						data: {
							nama_principal: $(input_nama).val(),
							alamat_principal: $(input_alamat).val(),
							pic1: $(input_nama_PIC1).val(),
							jabatan_pic1: $(input_jabatan_PIC1).val(),
							nik_pic1: $(input_nik_PIC1).val(),
							pic2: $(input_nama_PIC2).val(),
							jabatan_pic2: $(input_jabatan_PIC2).val(),
							nik_pic2: $(input_nik_PIC2).val(),
							akta_principal: $(input_akta_principal).val(),
							nomor_akta_principal: $(input_nomor_akta_principal).val(),
							tgl_akta_principal: $(tgl_akta_principal).val()
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
								tampil_data_principal();
							}
						}
					});
				}
			});
			OnEdited('nama_asr', 'input');
			OnEdited('nama_cabang', 'input');
			OnEdited('alamat', 'input');
			OnEdited('telepon', 'input');
			OnEdited('email', 'input');
		});
		// FUNGSI CREATE PRINCIPAL END


		// FUNGSI READ PRINCIPAL
		function tampil_data_principal() {
			$('#tbPrincipal').DataTable().clear();
			$('#tbPrincipal').DataTable().destroy();
			$.ajax({
				type: 'ajax',
				url: 'Principal/json',
				dataType: 'json',
				success: function(data) {
					var html = '';
					$.each(data, function(i) {
						html += '<tr>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].nama_principal + '</td>' +
							'<td>' + data[i].pic1 + '</td>' +
							'<td>' + data[i].pic2 + '</td>' +
							'<td>' + data[i].nomor_akta_principal + '</td>' +
							'<td class="text-center">' +
							'<button  class="btn btn-info btn-xs principal_edit" data="' + data[i].id_principal + '"><i class="fa fa-edit"></i></button>' + ' ' +
							'<button " class="btn btn-danger btn-xs principal_hapus" data="' + data[i].id_principal + '"><i class="fa fa-trash"></i></button>' +
							'</td>' +
							'</tr>';
					});
					$('#show_data').html(html);
					$('#tbPrincipal').DataTable();
				}

			});
		}
		// FUNGSI READ PRINCIPAL END

		//FUNGSI UPDATE PRINCIPAL
		$('#show_data').on('click', '.principal_edit', function() {
			var id_principal = $(this).attr('data');
			$('#btnTambah').click();
			$.ajax({
				type: "POST",
				url: "Principal/getData/principal",
				dataType: "JSON",
				data: {
					id_principal: id_principal
				},
				success: function(dat) {
					var data = dat[0];

					$('#modal-add .modal-title').html(` <i class="fa fa-edit"></i> Update Cabang Asuransi`);
					$('#modal-add .modal-footer').html(`<button class="btn btn-primary mt-2" id="btn_update">Update</button>`);
					$(input_nama).val(data.nama_principal);
					$(input_alamat).val(data.alamat_principal);
					$(input_nama_PIC1).val(data.pic1);
					$(input_jabatan_PIC1).val(data.jabatan_pic1);
					$(input_nik_PIC1).val(data.nik_pic1);
					$(input_nama_PIC2).val(data.pic2);
					$(input_jabatan_PIC2).val(data.jabatan_pic2);
					$(input_nik_PIC2).val(data.nik_pic2);
					$(input_akta_principal).val(data.akta_principal);
					$(input_nomor_akta_principal).val(data.nomor_akta_principal);


					$('#btn_update').on('click', function() {
						if ($(input_nama).val() == "") {
							kosong('input_nama', '_erNama', 'Nama Principal');
						} else {
							$.ajax({
								url: "Principal/update",
								type: "POST",
								data: {
									id_principal: id_principal,
									nama_principal: $(input_nama).val(),
									alamat_principal: $(input_alamat).val(),
									pic1: $(input_nama_PIC1).val(),
									jabatan_pic1: $(input_jabatan_PIC1).val(),
									nik_pic1: $(input_nik_PIC1).val(),
									pic2: $(input_nama_PIC2).val(),
									jabatan_pic2: $(input_jabatan_PIC2).val(),
									nik_pic2: $(input_nik_PIC2).val(),
									akta_principal: $(input_akta_principal).val(),
									nomor_akta_principal: $(input_nomor_akta_principal).val(),
								},
								success: function(data) {
									if (data = "Sukses") {
										$('#modal-add').modal('hide');
										Swal.fire({
											type: 'success',
											title: 'Data berhasil di update',
											showConfirmButton: false,
											timer: 1500
										})
										tampil_data_principal();
									}
								}
							});
						}
					});
				}
			});
		});
		// FUNGSI UPDATE PRINCIPAL END


		// FUNGSI DELETE PRINCIPAL
		$('#show_data').on('click', '.principal_hapus', function() {
			var id_principal = $(this).attr('data');
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
						url: 'Principal/hapus',
						type: 'POST',
						data: {
							id_principal: id_principal
						},
						success: function(data) {
							if (data == "Sukses") {
								Swal.fire({
									type: 'success',
									title: 'Berhasil!',
									text: 'Data dihapus!',
									showConfirmButton: false,
									timer: 1000
								}).then(tampil_data_principal());
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
		// FUNGSI DELETE PRINCIPAL END


		/*=====  End of Principal  ======*/
	}
});


function kosong(field, is_invalid, kolom) {
	$(`#${field}`).addClass('is-invalid');
	$(`#${field}`).focus();
	$(`#${is_invalid}`).html(`Kolom ${kolom} harus di isi`);
}

function OnEdited(field, act) {
	$(`#${field}`).on(act, function() {
		$(this).removeClass('is-invalid');
	});
}