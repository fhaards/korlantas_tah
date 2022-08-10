var pageDetail = $("#page-detail");
var pageDetailId = pageDetail.find(".this-id").val();
var titleName = "lokasi";
var titleName2 = "laka";

var basedApi = BASEURL + "api/" + titleName;
var basedApi2 = BASEURL + "api/" + titleName2;

var formAdd = $("#form-add-" + titleName2);
var formEdit = $("#form-edit-" + titleName2);
var modalAdd = $("#modal-add-" + titleName2);
var modalEdit = $("#modal-edit-" + titleName2);
var selLokasi = modalAdd.find(".pilih-lokasi");
var setEditId = formEdit.find(".set-edit-id");

$.getJSON(basedApi + "/show/" + pageDetailId, function (response) {
	var nmLokasi = pageDetail
		.find(".page-detail-title")
		.html(response.data[0].nm_lokasi);
	var alamatLokasi = pageDetail
		.find(".page-sub-title")
		.html(response.data[0].alamat_lokasi);
});

var thisTable = $(`#table-${titleName}-detail`).DataTable({
	ajax: {
		url: basedApi2 + "/show-by-lokasi/" + pageDetailId,
	},
	columns: [
		{ data: "id_laka", name: "id_laka" },
		{ data: "nm_lokasi", name: "nm_lokasi" },
		{ data: "tgl_insiden", name: "tgl_insiden" },
		{ data: "tipe_laka", name: "tipe_laka" },
		{ data: "korban_meninggal", name: "korban_meninggal" },
		{ data: "korban_luka", name: "korban_luka" },
		{ data: "korban_total", name: "korban_total" },
		{ data: "", name: "" },
	],
	columnDefs: [
		{
			targets: 0,
			render: function (data, type, row, meta) {
				var detailUri = BASEURL + titleName2 + "/detail/" + row.id_laka;
				var location = "";
				location += `<a href="${detailUri}" class="" >${row.id_laka}</a>`;
				return location;
			},
		},
		{
			targets: 2,
			render: function (data, type, row, meta) {
				var createdAt = new Date(row.tgl_insiden);
				return moment(createdAt).format("YYYY / MM / DD -  h : mm");
			},
		},
		{
			targets: 1,
			render: function (data, type, row, meta) {
				var nmLokasi = row.nm_lokasi;
				if (nmLokasi.length > 20) {
					return nmLokasi.substring(0, 21) + "...";
				} else {
					return nmLokasi;
				}
			},
		},
		{
			targets: 7,
			render: function (data, type, row, meta) {
				var getId = row.id_laka;
				var buttons = "";
				buttons += `<div class="btn-icon-list d-flex justify-content-center">`;
				buttons += `<button class="btn rounded-10 btn-xs btn-danger btn-icon deleteBtn" data-table="${titleName2}" data-id="${getId}"><i class="bx bx-trash"></i></button>`;
				buttons += `<button class="btn rounded-10 btn-sm btn-primary btn-icon editBtn" data-toggle="modal" data-target="#modal-edit-${titleName2}" data-id="${getId}"><i class="bx bx-edit"></i></button>`;
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

// EDIT
thisTable.on("click", ".editBtn", function (e) {
	e.preventDefault();
	var editId = $(this).data("id");
	var edit1 = modalEdit.find(".edit1");
	var edit2 = modalEdit.find(".edit2");
	var edit3 = modalEdit.find(".edit3");
	var edit4 = modalEdit.find(".edit4");

	$.getJSON(basedApi2 + "/detail/" + editId, function (response) {
		edit1.val(response[0].tgl_insiden);
		edit2.val(response[0].tipe_laka);
		edit3.val(response[0].korban_meninggal);
		edit4.val(response[0].korban_luka);
		editLokasi(response[0].id_lokasi);
	});
	setEditId.val(editId);
});

formEdit.on("submit", function (e) {
	e.preventDefault();
	var formValues = formEdit.serialize();
	var sendId = setEditId.val();
	console.log(sendId);
	$.post(basedApi2 + `/update/` + sendId, formValues, function (data) {
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

function editLokasi(idlokasi = "") {
	var edtLokasi = modalEdit.find(".edit-pilih-lokasi");
	$.getJSON(BASEURL + "api/lokasi", function (data) {
		$.each(data, function (index) {
			var thisData = data[index];
			var optEdit = "";
			for (let i = 0; i < thisData.length; i++) {
				optEdit += `<option value="${thisData[i].id_lokasi}">${thisData[i].nm_lokasi}</option>`;
			}
			edtLokasi.html(optEdit);
			edtLokasi.val(idlokasi);
		});
	});
}

// DELETE
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
				url: basedApi2 + "/delete/" + deleteId,
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

// INSERT
formAdd.on("submit", function (e) {
	e.preventDefault();
	var formValues = formAdd.serialize();
	$.post(basedApi2 + `/add`, formValues, function (data) {
		var dataResult = JSON.parse(data);
		if (dataResult.statusCode == 200) {
			successMsg("Update Success");
			formAdd.find("input").val("");
			modalAdd.modal("hide");
			thisTable.ajax.reload();
		} else if (dataResult.statusCode == 201) {
			alert("Error occured !");
		}
	});
});

$.getJSON(BASEURL + "api/lokasi", function (data) {
	$.each(data, function (index) {
		var thisData = data[index];
		var option = "";
		for (let i = 0; i < thisData.length; i++) {
			option += `<option value="${thisData[i].id_lokasi}">${thisData[i].nm_lokasi}</option>`;
		}
		selLokasi.append(option);
		selLokasi.val(pageDetailId);
	});
});
