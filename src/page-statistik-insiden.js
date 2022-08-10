$(function () {
	"use strict";

	// YEAR CHANGED
	var filterId = $("#statistik-insiden-year");
	var filterYear = filterId.find(".get-statistik-insiden-year");
	var currentYear = moment().years();
	var setYear = currentYear;
	var getValMax = 0;

	//CHART 1
	var chartLines1 = $("#chartLine1");
	var chartLines2 = $("#chartLine2");
	var chartBar = $("#chartBar");
	var chartDonut = $("#chartDonut");

	loadYear();

	function setupMaximumValue(a, b) {
		var combineFirstChartLine = [];
		combineFirstChartLine = [...a, ...b];
		var getMax = Math.max(...combineFirstChartLine);
		for (let index = 0; index < combineFirstChartLine.length; index++) {
			if (combineFirstChartLine[index] === getMax) {
				getValMax = combineFirstChartLine[index] + 11;
			}
		}
		return getValMax;
	}

	// CHART JS LINE
	function loadChartLine(getYears = "") {
		var setupLabelName = [];
		var firstLineData1 = [];
		var firstLineData2 = [];
		var secondLineData1 = [];
		var secondLineData2 = [];
		if (getYears !== "") {
			setYear = getYears;
		}

		$.ajax({
			type: "ajax",
			url: BASEURL + `api/statistik/insiden/tahun/${setYear}`,
			async: true,
			dataType: "json",
			beforeSend: function (xhr) {
				setLoader($(".chart-js-line"), "");
			},
			success: function (data) {
				var i;
				for (i = 0; i < data.length; i++) {
					setupLabelName.push(data[i].bulan);
					firstLineData1.push(data[i].total_korban);
					firstLineData2.push(data[i].total_insiden);
					secondLineData1.push(data[i].dead);
					secondLineData2.push(data[i].injury);
				}

				var chart1Max = setupMaximumValue(firstLineData1, firstLineData2);
				var chart2Max = setupMaximumValue(secondLineData1, secondLineData2);

				new Chart(chartLines1, {
					type: "line",
					data: {
						labels: setupLabelName,
						datasets: [
							{
								label: "Total Korban",
								data: firstLineData1,
								backgroundColor: "#1e3a8a",
								borderColor: "#1e3a8a",
								borderWidth: 1,
								fill: false,
							},
							{
								label: "Total Insiden",
								data: firstLineData2,
								backgroundColor: "#93c5fd",
								borderColor: "#93c5fd",
								borderWidth: 1,
								fill: false,
							},
						],
					},
					options: {
						maintainAspectRatio: false,
						title: {
							display: true,
							position: "top",
							text: "STATISTIK : TOTAL KECELAKAAN",
							fontSize: 15,
							padding: 20,
							lineHeight: 3,
						},
						legend: {
							display: true,
							position: "bottom",
							labels: {
								fontColor: "#111827",
							},
						},
						tooltips: {
							mode: "index",
							intersect: false,
						},
						scales: {
							yAxes: [
								{
									ticks: {
										beginAtZero: true,
										fontSize: 10,
										max: chart1Max,
									},
								},
							],
							xAxes: [
								{
									ticks: {
										beginAtZero: true,
										fontSize: 11,
									},
								},
							],
						},
					},
				});

				new Chart(chartLines2, {
					type: "line",
					data: {
						labels: setupLabelName,
						datasets: [
							{
								label: "Korban Meninggal",
								data: secondLineData1,
								backgroundColor: "#b91c1c",
								borderColor: "#b91c1c",
								borderWidth: 1,
								fill: false,
							},
							{
								label: "Korban Luka",
								data: secondLineData2,
								backgroundColor: "#facc15",
								borderColor: "#facc15",
								borderWidth: 1,
								fill: false,
							},
						],
					},
					options: {
						maintainAspectRatio: false,
						title: {
							display: true,
							position: "top",
							text: "STATISTIK : JUMLAH KORBAN",
							fontSize: 15,
							padding: 20,
							lineHeight: 3,
						},
						legend: {
							display: true,
							position: "bottom",
							labels: {
								fontColor: "#111827",
							},
						},
						tooltips: {
							mode: "index",
							intersect: false,
						},
						scales: {
							yAxes: [
								{
									ticks: {
										beginAtZero: true,
										fontSize: 10,
										max: chart2Max,
									},
								},
							],
							xAxes: [
								{
									ticks: {
										beginAtZero: true,
										fontSize: 11,
									},
								},
							],
						},
					},
				});
			},
			error: function (request, status, error) {
				setLoader($(".chart-js-line"), "Request API : " + request.statusText);
			},
		});
	}

	// CHART JS BAR
	function loadChartBar(getYears = "") {
		var setupChartBarLabel = [];
		var setData1 = [];
		var setData2 = [];
		var setData3 = [];
		var setData4 = [];
		var setDataLabel = [];

		var getValData = [];
		var setupMonth = [];
		if (getYears !== "") {
			setYear = getYears;
		}
		$.ajax({
			type: "ajax",
			url: BASEURL + `api/statistik/insiden/jenis-laka-by-month/${setYear}`,
			async: true,
			dataType: "json",
			beforeSend: function (xhr) {
				setLoader($(".chart-js-bar"), "");
			},
			success: function (data) {
				$.each(data, function (index, value) {
					getValData.push(value);
				});
				setupMonth = getValData[5];

				$.each(setupMonth, function (index, value) {
					setupChartBarLabel.push(value.bulan);
					setData1.push(value.j1_count);
					setData2.push(value.j2_count);
					setData3.push(value.j3_count);
					setData4.push(value.j4_count);
				});

				var newChartBarDataset = [
					{
						label: getValData[1],
						data: setData1,
						backgroundColor: "#ef4444",
					},
					{
						label: getValData[2],
						data: setData2,
						backgroundColor: "#3b82f6",
					},
					{
						label: getValData[3],
						data: setData3,
						backgroundColor: "#22c55e",
					},
					{
						label: getValData[4],
						data: setData4,
						backgroundColor: "#f59e0b",
					},
				];

				var chartBarSet = new Chart(chartBar, {
					type: "bar",
					data: {
						labels: setupChartBarLabel,
						datasets: newChartBarDataset,
					},
					options: {
						maintainAspectRatio: false,
						title: {
							display: true,
							position: "top",
							text: "STATISTIK : BERDASARKAN JENIS KECELAKAAN",
							fontSize: 15,
							padding: 20,
							lineHeight: 3,
						},
						legend: {
							display: true,
							position: "bottom",
							labels: {
								fontColor: "#111827",
							},
						},
						scales: {
							yAxes: [
								{
									ticks: {
										beginAtZero: true,
										fontSize: 11,
									},
								},
							],
							xAxes: [
								{
									ticks: {
										beginAtZero: true,
										fontSize: 11,
									},
								},
							],
						},
					},
				});
			},
			error: function (request, status, error) {
				setLoader($(".chart-js-bar"), "Request API : " + request.statusText);
			},
		});
	}

	function loadChartDonut(getYears = "") {
		var setDataPieLabel = [];
		var setDataPie = [];
		if (getYears !== "") {
			setYear = getYears;
		}
		$.ajax({
			type: "ajax",
			url: BASEURL + `api/statistik/insiden/jenis-laka-all/${setYear}`,
			async: true,
			dataType: "json",
			beforeSend: function (xhr) {
				setLoader($(".chart-js-donut"), "");
			},
			success: function (data) {
				console.log(data);
				$.each(data, function (index, value) {
					setDataPieLabel.push(
						value.j1_name,
						value.j2_name,
						value.j3_name,
						value.j4_name
					);
					setDataPie.push(
						value.j1_count,
						value.j2_count,
						value.j3_count,
						value.j4_count
					);
				});
				var datapie = {
					labels: setDataPieLabel,
					datasets: [
						{
							data: setDataPie,
							backgroundColor: ["#ef4444", "#3b82f6", "#22c55e", "#f59e0b"],
						},
					],
				};

				var optionpie = {
					maintainAspectRatio: false,
					responsive: true,
					title: {
						display: true,
						position: "top",
						text: "STATISTIK : JENIS KECELAKAAN PERTAHUN",
						fontSize: 15,
						padding: 20,
						lineHeight: 3,
					},
					legend: {
						display: true,
						position: "right",
						labels: {
							fontColor: "#111827",
						},
					},
					animation: {
						animateScale: true,
						animateRotate: true,
					},
				};
				var chartDonuts = new Chart(chartDonut, {
					type: "pie",
					data: datapie,
					options: optionpie,
				});
			},
			error: function (request, status, error) {
				setLoader($(".chart-js-donut"), "Request API : " + request.statusText);
			},
		});
	}
	// CHANGE YEARS
	function loadYear() {
		var startOfYear = moment().subtract(10, "years");
		var endOfYear = moment().endOf("year");
		var years = [];
		var year = startOfYear;
		var optionYear = "";
		while (year <= endOfYear) {
			years.push(year.format("YYYY"));
			year = year.clone().add(1, "Y");
		}
		optionYear += `<option value="${currentYear}">-- Select Year -- </option>`;
		$.each(years, function (key, value) {
			optionYear += `<option>${years[key]}</option>`;
		});
		filterYear.html(optionYear);
	}

	filterYear.on("change", function (e) {
		e.preventDefault();
		loadChartLine(this.value);
		loadChartBar(this.value);
		loadChartDonut(this.value);
	});

	loadChartLine();
	loadChartBar();
	loadChartDonut();
});

// $(document).ajaxStart(function () {
// 	startAjaxLoad();
// });

// $(document).ajaxComplete(function (event, request, settings) {
// 	endAjaxLoad();
// });

// loadYear();
// loadChartLine();

// function loadYear() {
// 	var startOfYear = moment().subtract(10, "years");
// 	var endOfYear = moment().endOf("year");
// 	var years = [];
// 	var year = startOfYear;
// 	var optionYear = "";
// 	while (year <= endOfYear) {
// 		years.push(year.format("YYYY"));
// 		year = year.clone().add(1, "Y");
// 	}
// 	optionYear += `<option value="All">-- Select Year -- </option>`;
// 	$.each(years, function (key, value) {
// 		optionYear += `<option>${years[key]}</option>`;
// 	});
// 	filterYear.html(optionYear);
// }

// filterYear.on("change", function (e) {
// 	e.preventDefault();
// 	loadChartLine(this.value);
// });

// function loadChartLine(getYears = "") {
// 	$(".load-progress").show();
// 	if (getYears !== "") {
// 		setYear = getYears;
// 	}

// 	var getChartLine = $.getJSON(
// 		BASEURL + `api/statistik/insiden/tahun/${setYear}`,
// 		function (data) {
// 			var getLabelforLine = [];
// 			var firstLineData1 = [];
// 			var firstLineData2 = [];
// 			var secondLineData1 = [];
// 			var secondLineData2 = [];
// 			var combineFirstChartLine = [];
// 			var combineSecondChartLine = [];

// 			$.each(data, function (key) {
// 				getLabelforLine.push(data[key].bulan);
// 				firstLineData1.push(data[key].total_korban);
// 				firstLineData2.push(data[key].total_insiden);
// 				secondLineData1.push(data[key].dead);
// 				secondLineData2.push(data[key].injury);
// 			});

// 			combineFirstChartLine = [...firstLineData1, ...firstLineData2];
// 			var getMax1 = Math.max(...combineFirstChartLine);
// 			var getValMax1 = 0;
// 			for (let index = 0; index < combineFirstChartLine.length; index++) {
// 				if (combineFirstChartLine[index] === getMax1) {
// 					getValMax1 = combineFirstChartLine[index] + 10;
// 				}
// 			}

// 			combineSecondChartLine = [...secondLineData1, ...secondLineData2];
// 			var getMax2 = Math.max(...combineSecondChartLine);
// 			var getValMax2 = 0;
// 			for (let index = 0; index < combineSecondChartLine.length; index++) {
// 				if (combineSecondChartLine[index] === getMax2) {
// 					getValMax2 = combineSecondChartLine[index] + 10;
// 				}
// 			}

// 			// CHART INSIDEN
// 			new Chart(chartLines1, {
// 				type: "line",
// 				data: {
// 					labels: getLabelforLine,
// 					datasets: [
// 						{
// 							label: "Total Korban",
// 							data: firstLineData1,
// 							backgroundColor: "#1e3a8a",
// 							borderColor: "#1e3a8a",
// 							borderWidth: 1,
// 							fill: false,
// 						},
// 						{
// 							label: "Total Insiden",
// 							data: firstLineData2,
// 							backgroundColor: "#93c5fd",
// 							borderColor: "#93c5fd",
// 							borderWidth: 1,
// 							fill: false,
// 						},
// 					],
// 				},
// 				options: {
// 					maintainAspectRatio: false,
// 					title: {
// 						display: true,
// 						position: "top",
// 						text: "Data Statistik Insiden",
// 					},
// 					legend: {
// 						display: true,
// 						position: "bottom",
// 						labels: {
// 							fontColor: "#111827",
// 						},
// 					},
// 					tooltips: {
// 						mode: "index",
// 						intersect: false,
// 					},
// 					scales: {
// 						yAxes: [
// 							{
// 								ticks: {
// 									beginAtZero: true,
// 									fontSize: 10,
// 									max: getValMax1,
// 								},
// 							},
// 						],
// 						xAxes: [
// 							{
// 								ticks: {
// 									beginAtZero: true,
// 									fontSize: 11,
// 								},
// 							},
// 						],
// 					},
// 				},
// 			});

// 			// CHART KORBAN
// 			new Chart(chartLines2, {
// 				type: "line",
// 				data: {
// 					labels: getLabelforLine,
// 					datasets: [
// 						{
// 							label: "Korban Meninggal",
// 							data: secondLineData1,
// 							backgroundColor: "#b91c1c",
// 							borderColor: "#b91c1c",
// 							borderWidth: 1,
// 							fill: false,
// 						},
// 						{
// 							label: "Korban Luka",
// 							data: secondLineData2,
// 							backgroundColor: "#facc15",
// 							borderColor: "#facc15",
// 							borderWidth: 1,
// 							fill: false,
// 						},
// 					],
// 				},
// 				options: {
// 					maintainAspectRatio: false,
// 					title: {
// 						display: true,
// 						position: "top",
// 						text: "Data Statistik Korban",
// 					},
// 					legend: {
// 						display: true,
// 						position: "bottom",
// 						labels: {
// 							fontColor: "#111827",
// 						},
// 					},
// 					tooltips: {
// 						mode: "index",
// 						intersect: false,
// 					},
// 					scales: {
// 						yAxes: [
// 							{
// 								ticks: {
// 									beginAtZero: true,
// 									fontSize: 10,
// 									max: getValMax2,
// 								},
// 							},
// 						],
// 						xAxes: [
// 							{
// 								ticks: {
// 									beginAtZero: true,
// 									fontSize: 11,
// 								},
// 							},
// 						],
// 					},
// 				},
// 			});
// 		}
// 	);
// 	setTimeout(function () {
// 		getChartLine.abort();
// 	}, 2000);
// }
