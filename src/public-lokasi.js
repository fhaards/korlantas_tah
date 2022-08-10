// Initialize Api
var titleName = "lokasi";
var apiLokasi = "api/lokasi";
var apiLaka = "api/laka";

// Initialize Class From View
var lokasiDetail = $("#lokasi-detail");
var lokasiName = lokasiDetail.find(".lokasi-nama").html("Titik Lokasi");
var lokasiAlmt = lokasiDetail.find(".lokasi-almt").html("Alamat");
var totalKorban = lokasiDetail.find(".total-korban");
var totalInsiden = lokasiDetail.find(".total-insiden");
var korbanMati = lokasiDetail.find(".korban-mati");
var korbanLuka = lokasiDetail.find(".korban-luka");
var btnSeeAll = lokasiDetail.find(".btn-see-all");

totalKorban.html("");
totalInsiden.html("");
korbanMati.html("");
korbanLuka.html("");

// Initialize MAP
var map = L.map("map").setView([-6.151155, 106.733343], 13);
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
	popupAnchor: [15, -15],
});

var polygonPoints = [
	[-6.119889, 106.724584],
	[-6.121938, 106.720979],
	[-6.131325, 106.718061],
	[-6.15522, 106.715829],
	[-6.173455, 106.70787],
	[-6.177143, 106.700572],
	[-6.189496, 106.716566],
	[-6.18451, 106.724304],
	[-6.175961, 106.73061],
	[-6.16556, 106.747951],
	[-6.158008, 106.748094],
	[-6.160288, 106.766581],
	[-6.141622, 106.776183],
	[-6.121674, 106.731757],
	[-6.123241, 106.727027],
];

var poly = L.polygon(polygonPoints).addTo(map);
poly.setStyle({ fillColor: "#bfdbfe" });

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
	btnSeeAll.attr("href", BASEURL + "lokasi/detail/" + id);
	btnSeeAll.removeClass("d-none");

	$.getJSON(BASEURL + apiLokasi + "/show/" + id, function (response) {
		// console.log(response.data[0].nm_lokasi);
		lokasiName.html(response.data[0].nm_lokasi);
		lokasiAlmt.html(response.data[0].alamat_lokasi);
	});

	$.getJSON(BASEURL + apiLokasi + "/show-counter/" + id, function (response) {
		totalKorban.html(response.data[0].korban_total);
		totalInsiden.html(response.data[0].total_insiden);
		korbanMati.html(response.data[0].korban_mati);
		korbanLuka.html(response.data[0].korban_luka);
	});
}
