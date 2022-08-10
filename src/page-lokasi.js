var titleName = "lokasi";
var basedApi = BASEURL + "api/" + titleName;
// var formAdd = $("#form-add-" + titleName);
var formEdit = $("#form-edit-" + titleName);
var modalAdd = $("#modal-add-" + titleName);
var modalEdit = $("#modal-edit-" + titleName);
var setEditId = formEdit.find(".set-edit-id");

var thisTable = $("#table-" + titleName).DataTable({
	ajax: {
		url: basedApi,
	},
	columns: [
		{ data: "", name: "" },
		{ data: "nm_lokasi", name: "nm_lokasi" },
		{ data: "alamat_lokasi", name: "alamat_lokasi" },
		{ data: "latitude", name: "latitude" },
		{ data: "longitude", name: "longitude" },
		{ data: "created_at", name: "created_at" },
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
			targets: 1,
			render: function (data, type, row, meta) {
				var nmLokasi = row.nm_lokasi;
				if (nmLokasi.length > 20) {
					var setNewNmLokasi = nmLokasi.substring(0, 30) + " ...";
				} else {
					var setNewNmLokasi = nmLokasi;
				}

				var detailUri = BASEURL + titleName + "/detail/" + row.id_lokasi;
				var location = "";
				location += `<a href="${detailUri}" class="" >${setNewNmLokasi}</a>`;
				return location;
			},
		},
		{
			targets: 2,
			render: function (data, type, row, meta) {
				var alamat = row.alamat_lokasi;
				if (alamat.length > 20) {
					return alamat.substring(0, 30) + " ...";
				} else {
					return alamat;
				}
			},
		},
		{
			targets: 5,
			render: function (data, type, row, meta) {
				var createdAt = new Date(row.created_at);
				return moment(createdAt).format("YYYY / MM / DD -  h : mm");
			},
		},
		{
			targets: 6,
			render: function (data, type, row, meta) {
				var getId = row.id_lokasi;
				var buttons = "";
				buttons += `<div class="btn-icon-list d-flex justify-content-center">`;
				buttons += `<button class="btn rounded-10 btn-xs btn-danger btn-icon deleteBtn" data-table="${titleName}" data-id="${getId}"><i class="bx bx-trash"></i></button>`;
				buttons += `<button class="btn rounded-10 btn-sm btn-primary btn-icon editBtn" data-toggle="modal" data-target="#modal-edit-${titleName}" data-id="${getId}"><i class="bx bx-edit"></i></button>`;
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
				url: basedApi + "/delete/" + deleteId,
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

// UPDATE
thisTable.on("click", ".editBtn", function (e) {
	e.preventDefault();
	var editId = $(this).data("id");
	var edit1 = modalEdit.find(".edit1");
	var edit2 = modalEdit.find(".edit2");
	var edit3 = modalEdit.find(".edit3");
	var edit4 = modalEdit.find(".edit4");

	$.getJSON(basedApi + "/show/" + editId, function (response) {
		edit1.val(response.data[0].nm_lokasi);
		edit2.val(response.data[0].latitude);
		edit3.val(response.data[0].longitude);
		edit4.val(response.data[0].alamat_lokasi);
	});
	setEditId.val(editId);
});

formEdit.on("submit", function (e) {
	e.preventDefault();
	var formValues = formEdit.serialize();
	var sendId = setEditId.val();
	$.post(basedApi + `/update/` + sendId, formValues, function (data) {
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

// INSERT
// formAdd.on("submit", function (e) {
// 	e.preventDefault();
// 	var formValues = formAdd.serialize();
// 	$.post(basedApi + `/add`, formValues, function (data) {
// 		var dataResult = JSON.parse(data);
// 		if (dataResult.statusCode == 200) {
// 			successMsg("Update Success");
// 			formAdd.find("input").val("");
// 			modalAdd.modal("hide");
// 			thisTable.ajax.reload();
// 		} else if (dataResult.statusCode == 201) {
// 			alert("Error occured !");
// 		}
// 	});
// });
