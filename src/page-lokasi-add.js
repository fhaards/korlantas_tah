var titleName = "lokasi";
var basedApi = BASEURL + "api/" + titleName;
var formAdd = $("#form-add-" + titleName);
var addLatInput = formAdd.find(".add-latitude");
var addLongInput = formAdd.find(".add-longitude");

var markerAdd;

var mapAdd = L.map("map-add").setView([-6.151155, 106.733343], 13);
var tiles = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
	maxZoom: 19,
	center: [0, 0],
	attribution:
		'&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(mapAdd);

// POLYGON LOCATION
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

var poly = L.polygon(polygonPoints).addTo(mapAdd);
poly.setStyle({ fillColor: "#bfdbfe" });

// MARKER
var markerAddIcons = L.icon({
	iconUrl: BASEURL + "assets/img/logo-app/pinmarker-sm-add.png",
	iconAnchor: [15, 30],
});

var markerOnMaps = L.icon({
	iconUrl: BASEURL + "assets/img/logo-app/pinmarker-sm.png",
	// iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
	popupAnchor: [15, -15],
});

mapAdd.on("click", function (e) {
	if (markerAdd) {
		mapAdd.removeLayer(markerAdd);
	}
	markerAdd = new L.Marker(e.latlng, { icon: markerAddIcons });
	markerAdd.addTo(mapAdd);
	addLatInput.val(e.latlng.lat);
	addLongInput.val(e.latlng.lng);
});

formAdd.on("submit", function (e) {
	e.preventDefault();
	var formValues = formAdd.serialize();
	$.post(basedApi + `/add`, formValues, function (data) {
		var dataResult = JSON.parse(data);
		if (dataResult.statusCode == 200) {
			successMsg("Update Success");
			Swal.fire({
				title: "Loading..",
				text: "Submittin Location",
				allowEscapeKey: false,
				allowOutsideClick: false,
				timer: 2000,
				didOpen: () => {
					Swal.showLoading();
				},
			}).then(() => {
				return (window.location.href = BASEURL + `lokasi`);
			});
		} else if (dataResult.statusCode == 201) {
			alert("Error occured !");
		}
	});
});

fetch(BASEURL + "api/lokasi")
	.then((res) => res.json())
	.then((data) => getLokasi(data))
	.catch((err) => console.log("Error:", err));

function getLokasi(getLoc) {
	lokasiMark = getLoc.data;
	var address, latitude, longitude, lokname;
	for (let i = 0; i < lokasiMark.length; i++) {
		latitude = lokasiMark[i].latitude;
		longitude = lokasiMark[i].longitude;
		lokname = lokasiMark[i].nm_lokasi;
		address = lokasiMark[i].alamat_lokasi;

		var markerHave = new L.marker([latitude, longitude], {
			icon: markerOnMaps,
		}).addTo(mapAdd);

		markerHave.myID = i;
		markerHave
			.bindPopup("<b>" + lokname + "</b><br/>" + address)
			.on("click", function (e) {
				var i = e.target.myID;
				getLakaData(lokasiMark[i].id_lokasi);
			});
		mapAdd.addLayer(markerHave);
	}
}
