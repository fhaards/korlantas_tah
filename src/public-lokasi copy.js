// Initialize Api
var titleName = "lokasi";
var apiLokasi = "api/lokasi";
var apiLaka = "api/laka";

// Initialize Class From View
var lokasiDetail = $("#lokasi-detail");
var lokasiName = lokasiDetail.find(".lokasi-nama").html("Titik Lokasi");
var lokasiAlmt = lokasiDetail.find(".lokasi-almt").html("Alamat");

// Initialize MAP
var map = L.map("map").setView([-6.151155, 106.733343], 12);
let lokasiMark;
var tiles = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
	maxZoom: 19,
	center: [0, 0],
	attribution:
		'&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

var pinMarkers = L.icon({
	iconUrl: BASEURL + "assets/img/logo-app/pinmarker-sm.png",
	// iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
	popupAnchor: [10, -10], // point from which the popup should open relative to the iconAnchor
});

fetch(BASEURL + "api/lokasi")
	.then((res) => res.json())
	.then((data) => getLokasi(data))
	.catch((err) => console.log("Error:", err));

function getLokasi(getHalte) {
	lokasiMark = getHalte.data;
	var address, latitude, longitude, lokname;
	for (let i = 0; i < lokasiMark.length; i++) {
		latitude = lokasiMark[i].latitude;
		longitude = lokasiMark[i].longitude;
		lokname = lokasiMark[i].nm_lokasi;
		address = lokasiMark[i].alamat_lokasi;

		var marker = new L.marker([latitude, longitude], {
			icon: pinMarkers,
		}).addTo(map);

		marker.myID = i;
		marker
			.bindPopup("<b>" + lokname + "</b><br/>" + address)
			.on("click", function (e) {
				var i = e.target.myID;
				getLakaData(lokasiMark[i].id_lokasi);
			});
		map.addLayer(marker);
	}
}

function getLakaData(id) {
	// var lokasiData = lokasiDetail.find(".lokasi-data tbody").html("");

	$.getJSON(BASEURL + apiLokasi + "/show/" + id, function (response) {
		// console.log(response.data[0].nm_lokasi);
		lokasiName.html(response.data[0].nm_lokasi);
		lokasiAlmt.html(response.data[0].alamat_lokasi);
	});

	$.getJSON(BASEURL + apiLokasi + "/show-counter/" + id, function (response) {
		var totalKorban = lokasiDetail.find(".total-korban");
		var totalInsiden = lokasiDetail.find(".total-insiden");
		var korbanMati = lokasiDetail.find(".korban-mati");
		var korbanLuka = lokasiDetail.find(".korban-luka");

		totalKorban.html(response.data[0].korban_total);
		totalInsiden.html(response.data[0].total_insiden);
		korbanMati.html(response.data[0].korban_mati);
		korbanLuka.html(response.data[0].korban_luka);
	});

	// $.getJSON(BASEURL + apiLaka + "/show/" + id, function (data) {
	// 	$.each(data, function (index) {
	// 		var thisData = data[index];
	// 		var option = "";
	// 		for (let i = 0; i < thisData.length; i++) {
	// 			option += `<tr>`;
	// 			option += `<td>${thisData[i].tgl_insiden}</td>`;
	// 			option += `<td>${thisData[i].korban_total}</td>`;
	// 			option += `<td>${thisData[i].korban_meninggal}</td>`;
	// 			option += `<td>${thisData[i].korban_luka}</td>`;
	// 			option += `</tr>`;
	// 		}
	// 		console.log(option);
	// 		lokasiData.html(option);
	// 	});
	// });
}

// $.getJSON(BASEURL + apiLokasi + "/show-counter/" + id, function (response) {
// 	var dtMati = parseInt(response.data[0].korban_mati);
// 	var dtLuka = parseInt(response.data[0].korban_luka);
// 	var dtTotal = parseInt(response.data[0].korban_total);
// 	var dtTotalInsiden = parseInt(response.data[0].total_insiden);

// 	var datapie = {
// 		labels: ["Total Insiden", "Total Korban", "Meninggal", "Luka"],
// 		datasets: [
// 			{
// 				data: [dtTotalInsiden, dtTotal, dtMati, dtLuka],
// 				backgroundColor: ["#6f42c1", "#007bff", "#17a2b8", "#00cccc"],
// 			},
// 		],
// 	};

// 	var optionpie = {
// 		maintainAspectRatio: false,
// 		responsive: true,
// 		legend: {
// 			display: false,
// 		},
// 		animation: {
// 			animateScale: true,
// 			animateRotate: true,
// 		},
// 	};

// 	// For a doughnut chart
// 	var ctxpie = document.getElementById("chartDonut");
// 	var myPieChart6 = new Chart(ctxpie, {
// 		type: "doughnut",
// 		data: datapie,
// 		options: optionpie,
// 	});
// 	return false;
// });
