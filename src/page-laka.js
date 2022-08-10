var titleName = "laka";
var basedApi = BASEURL + "api/" + titleName;

var formAdd = $(`#form-add-${titleName}`);
var formEdit = $(`#form-edit-${titleName}`);
var modalEdit = $("#modal-edit-" + titleName);
var modalAdd = $("#modal-add-" + titleName);
var selLokasi = modalAdd.find(".pilih-lokasi");
var setEditId = formEdit.find(".set-edit-id");

var filterData = $(`#filter-${titleName}`);
var setFIlterDates = filterData
	.find(".filter-date")
	.val(moment().format("YYYY-MM-DD"));

var setFilterTipe = filterData.find(".filter-tipe");
var setFilterTotal = filterData.find(".filter-total");

var thisTable = $("#table-" + titleName).DataTable({
	ajax: {
		url: basedApi + "/show",
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
				var detailUri = BASEURL + titleName + "/detail/" + row.id_laka;
				var location = "";
				location += `<a href="${detailUri}" class="" >${row.id_laka}</a>`;
				return location;
			},
		},
		{
			targets: 2,
			render: function (data, type, row, meta) {
				var createdAt = new Date(row.tgl_insiden);
				return moment(createdAt).format("DD/MM/YYYY -  h : mm");
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

// INSERT
formAdd.on("submit", function (e) {
	e.preventDefault();
	var formValues = formAdd.serialize();
	$.post(basedApi + `/add`, formValues, function (data) {
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

// EDIT
thisTable.on("click", ".editBtn", function (e) {
	e.preventDefault();
	var editId = $(this).data("id");
	var edit1 = modalEdit.find(".edit1");
	var edit2 = modalEdit.find(".edit2");
	var edit3 = modalEdit.find(".edit3");
	var edit4 = modalEdit.find(".edit4");

	$.getJSON(basedApi + "/detail/" + editId, function (response) {
		edit1.val(response[0].tgl_insiden);
		edit2.val(response[0].tipe_laka);
		edit3.val(response[0].korban_meninggal);
		edit4.val(response[0].korban_luka);
		editLokasi(response[0].id_lokasi);
	});
	setEditId.val(editId);
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

formEdit.on("submit", function (e) {
	e.preventDefault();
	var formValues = formEdit.serialize();
	var sendId = setEditId.val();
	console.log(sendId);
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

$.getJSON(BASEURL + "api/lokasi", function (data) {
	$.each(data, function (index) {
		var thisData = data[index];
		var option = "";
		for (let i = 0; i < thisData.length; i++) {
			option += `<option value="${thisData[i].id_lokasi}">${thisData[i].nm_lokasi}</option>`;
		}
		selLokasi.append(option);
	});
});

// /* ------------------ FILTERING TABLE ------------------*/

// var setFilterStatus = filterTables.find(".filter-status");

setFilterTipe.change(function (e) {
	e.preventDefault();
	var getValStatus = $(this).val();
	if (getValStatus === "All") {
		thisTable.columns(3).search("").draw();
	} else {
		thisTable.columns(3).search(getValStatus).draw();
	}
});

setFilterTotal.change(function (e) {
	e.preventDefault();
	var getValStatus = $(this).val();
	var qualSearch = [];
	var qualSearch2 = [];
	if (getValStatus === "1") {
		thisTable.columns(6).search("0").draw();
	} else if (getValStatus === "10") {
		for (var i = 0; i < getValStatus; i++) {
			qualSearch.push("\\b" + parseInt(i) + "\\b");
		}
		thisTable.columns(6).search(qualSearch.join("|"), true, false, true).draw();
	} else if (getValStatus === "100") {
		for (var x = 11; x < getValStatus; x++) {
			qualSearch2.push("\\b" + parseInt(x) + "\\b");
		}
		thisTable
			.columns(6)
			.search(qualSearch2.join("|"), true, false, true)
			.draw();
	} else {
		thisTable.columns(6).search("").draw();
	}
});

setFIlterDates.change(function (e) {
	e.preventDefault();
	var dateVal = this.value;
	var newDate = moment(dateVal).format("DD/MM/YYYY");
	thisTable.columns(2).search(newDate).draw();
});

// /* ------------------ SELECTING TABLE ------------------*/

// $("#" + saranaTitles + "-selecting-table").on("submit", function (e) {
// 	e.preventDefault();
// 	var getSelectedNames = $(this).find(".select-table-names").val();
// 	var getSelectedTimes = $(this).find(".select-times").val();
// 	return (window.location.href =
// 		WEB_URL + "/" + getSelectedNames + "/show/" + getSelectedTimes);
