// MAIN VAR
var mainName = "laka";
var secName = "korban";
var basedApi = BASEURL + `api/${secName}/`;

// DETAIL VAR
var detailPage = $(`#detail-${mainName}`);
var getid = detailPage.find(".getid").val();
var detailUrl = BASEURL + `api/${mainName}/detail/` + getid;

// FORM
var modalAdd = $(`#modal-add-${secName}`);
var modalEdit = $(`#modal-edit-${secName}`);
var formAddKorban = $(`#form-add-${secName}`);
var formEdit = $(`#form-edit-${secName}`);

$.getJSON(detailUrl, function (data) {
	var idLaka = detailPage.find(".idLaka").html(data[0].id_laka);
	var nmlokasi = detailPage.find(".nmLokasi").html(data[0].nm_lokasi);
	var nmAlamat = detailPage.find(".nmAlamat").html(data[0].alamat_lokasi);
	var korban1 = detailPage.find(".korban1").html(data[0].korban_meninggal);
	var korban2 = detailPage.find(".korban2").html(data[0].korban_luka);
	var korban3 = detailPage.find(".korban3").html(data[0].korban_total);
});

var thisTable = $(`#table-${mainName}-${secName}`).DataTable({
	ajax: {
		url: BASEURL + `api/${secName}/show/` + getid,
	},
	columns: [
		{ data: "", name: "" },
		{ data: "nama", name: "nama" },
		{ data: "umur", name: "umur" },
		{ data: "jenis_kelamin", name: "jenis_kelamin" },
		{ data: "kondisi", name: "kondisi" },
		{ data: "", name: "" },
	],
	columnDefs: [
		{
			targets: 0,
			render: function (data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			},
		},
		{
			targets: 3,
			render: function (data, type, row, meta) {
				var jkelamin = row.jenis_kelamin;
				var jkelaminResult = "";
				if (jkelamin == 1) {
					jkelaminResult = "Laki Laki";
				} else if (jkelamin == 2) {
					jkelaminResult = "Perempuan";
				} else {
					jkelaminResult = " - ";
				}
				return jkelaminResult;
			},
		},
		{
			targets: 4,
			render: function (data, type, row, meta) {
				var kondisi = row.kondisi;
				var kondisiResult = "";
				if (kondisi == 1) {
					kondisiResult = "Korban Luka";
				} else {
					kondisiResult = "Korban Meninggal";
				}
				return kondisiResult;
			},
		},
		{
			targets: 5,
			render: function (data, type, row, meta) {
				var getId = row.id_korban;
				var buttons = "";
				buttons += `<div class="btn-icon-list d-flex justify-content-center">`;
				buttons += `<button class="btn rounded-10 btn-xs btn-danger btn-icon deleteBtn" data-id="${getId}"><i class="bx bx-trash"></i></button>`;
				buttons += `<button class="btn rounded-10 btn-sm btn-primary btn-icon editBtn" data-toggle="modal" data-target="#modal-edit-${secName}" data-id="${getId}"><i class="bx bx-edit"></i></button>`;
				buttons += `</div>`;
				return buttons;
			},
		},
	],
	pageLength: 10,
	responsive: true,
	language: {
		searchPlaceholder: "Search...",
		sSearch: "",
		lengthMenu: "_MENU_ items/page",
	},
});

//===========  ADD
formAddKorban.on("submit", function (e) {
	e.preventDefault();
	// var btnSave = formAddKorban.find(".submit-form").prop("disabled", true);
	var idlak = getid;
	var nama = formAddKorban.find(".nama").val();
	var umur = formAddKorban.find(".umur").val();
	var jk = formAddKorban.find(".jk").val();
	var kondisi = formAddKorban.find(".kondisi").val();

	$.ajax({
		url: BASEURL + `api/${secName}/add`,
		type: "POST",
		data: {
			idlak: idlak,
			nama: nama,
			umur: umur,
			jk: jk,
			kondisi: kondisi,
		},
		cache: false,
		success: function (dataResult) {
			var dataResult = JSON.parse(dataResult);
			if (dataResult.statusCode == 200) {
				formAddKorban.find("input").val("");
				successMsg();
				modalAdd.modal("hide");
			} else if (dataResult.statusCode == 201) {
				alert("Error occured !");
			}
			thisTable.ajax.reload();
		},
	});
});

//===========  DELETE
thisTable.on("click", ".deleteBtn", function (e) {
	e.preventDefault();
	var deleteId = $(this).data("id");
	Swal.fire({
		title: "Apakah anda yakin ?",
		text: "Data mungkin tidak akan kembali!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#ef4444",
		cancelButtonColor: "#cbd5e1",
		confirmButtonText: "Yes, delete it!",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: basedApi + "delete/" + deleteId,
				type: "POST",
				cache: false,
				data: {
					id: deleteId,
				},
				success: function (dataResult) {
					var dataResult = JSON.parse(dataResult);
					if (dataResult.statusCode == 200) {
						successMsg("Deleted Success");
					}
					thisTable.ajax.reload();
				},
			});
		}
	});
});

//===========  Edit
var editId = "";
thisTable.on("click", ".editBtn", function (e) {
	e.preventDefault();
	editId = $(this).data("id");
	var edit1 = formEdit.find(".nama");
	var edit2 = formEdit.find(".umur");
	var edit3 = formEdit.find(".jk");
	var edit4 = formEdit.find(".kondisi");

	$.getJSON(basedApi + "/show-korban/" + editId, function (response) {
		edit1.val(response.data[0].nama);
		edit2.val(response.data[0].umur);
		edit3.val(response.data[0].jenis_kelamin);
		edit4.val(response.data[0].kondisi);
	});
});

formEdit.on("submit", function (e) {
	e.preventDefault();
	var formValues = formEdit.serialize();
	$.post(basedApi + `update/` + editId, formValues, function (data) {
		// Display the returned data in browser
		var dataResult = JSON.parse(data);
		if (dataResult.statusCode == 200) {
			successMsg("Update Success");
			formEdit.find("input").val("");
			modalEdit.modal("hide");
			thisTable.ajax.reload();
		} else if (dataResult.statusCode == 201) {
			alert("Error occured !");
		}
	});
});
