function deleteIdGlobal(deleteId, deleteTable) {
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
			return (window.location.href =
				BASEURL + deleteTable + "/delete/" + deleteId);
		}
	});
}

function successMsg(succMessages) {
	swal.fire({
		icon: "success",
		text: succMessages,
		showConfirmButton: false,
		timer: 1500,
	});
}

function setLoader(loadPages, status = "") {
	var contentPages = $(loadPages).children();
	$(loadPages).addClass("loader");
	contentPages.hide();
	if (status !== "") {
		setTimeout(() => {
			$(loadPages).removeClass("loader");
			$(loadPages).append(
				`<div class='d-flex w-100 text-center justify-content-center'>${status}</div>`
			);
		}, 1000);
		contentPages.addClass("d-none");
	} else {
		setTimeout(() => {
			$(loadPages).removeClass("loader");
			contentPages.show();
		}, 1000);
	}
}

$(".progress-bar").animate(
	{
		width: "100%",
	},
	2500
);
