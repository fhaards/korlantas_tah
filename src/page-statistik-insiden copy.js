$(function () {
	"use strict";
	var filterId = $("#statistik-insiden-year");
	var filterYear = filterId.find(".get-statistik-insiden-year");

	var chartLines1 = $("#chartLine1");
	var chartLines2 = $("#chartLine2");
	var currentYear = moment().years();
	var setYear = currentYear;

	loadYear();
	loadChartLine();

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
		optionYear += `<option value="All">-- Select Year -- </option>`;
		$.each(years, function (key, value) {
			optionYear += `<option>${years[key]}</option>`;
		});
		filterYear.html(optionYear);
	}

	filterYear.on("change", function (e) {
		e.preventDefault();
		loadChartLine(this.value);
	});

	function loadChartLine(getYears = "") {
		$(".load-progress").show();
		if (getYears !== "") {
			setYear = getYears;
		}

		var getChartLine = $.getJSON(
			BASEURL + `api/statistik/insiden/tahun/${setYear}`,
			function (data) {
				var getLabelforLine = [];
				var firstLineData1 = [];
				var firstLineData2 = [];
				var secondLineData1 = [];
				var secondLineData2 = [];
				var combineFirstChartLine = [];
				var combineSecondChartLine = [];

				$.each(data, function (key) {
					getLabelforLine.push(data[key].bulan);
					firstLineData1.push(data[key].total_korban);
					firstLineData2.push(data[key].total_insiden);
					secondLineData1.push(data[key].dead);
					secondLineData2.push(data[key].injury);
				});

				combineFirstChartLine = [...firstLineData1, ...firstLineData2];
				var getMax1 = Math.max(...combineFirstChartLine);
				var getValMax1 = 0;
				for (let index = 0; index < combineFirstChartLine.length; index++) {
					if (combineFirstChartLine[index] === getMax1) {
						getValMax1 = combineFirstChartLine[index] + 10;
					}
				}

				combineSecondChartLine = [...secondLineData1, ...secondLineData2];
				var getMax2 = Math.max(...combineSecondChartLine);
				var getValMax2 = 0;
				for (let index = 0; index < combineSecondChartLine.length; index++) {
					if (combineSecondChartLine[index] === getMax2) {
						getValMax2 = combineSecondChartLine[index] + 10;
					}
				}

				// CHART INSIDEN
				new Chart(chartLines1, {
					type: "line",
					data: {
						labels: getLabelforLine,
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
							text: "Data Statistik Insiden",
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
										max: getValMax1,
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

				// CHART KORBAN
				new Chart(chartLines2, {
					type: "line",
					data: {
						labels: getLabelforLine,
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
							text: "Data Statistik Korban",
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
										max: getValMax2,
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
			}
		);
		setTimeout(function () {
			getChartLine.abort();
		}, 2000);
	}
});

// var morrisData = [];
// $.getJSON(url, function (data) {
// 	$.each(data, function (key) {
// 		morrisData.push({
// 			y: data[key].bulan,
// 			a: parseFloat(data[key].dead),
// 			b: data[key].injury,
// 			c: data[key].total,
// 		});
// 	});
// 	new Morris.Line({
// 		element: "morrisLine1",
// 		data: morrisData,
// 		xkey: "y",
// 		ykeys: ["a", "b", "c"],
// 		labels: ["Dead", "Injury", "Total"],
// 		lineColors: ["#560bd0", "#007bff", "#dc2626"],
// 		lineWidth: 1,
// 		gridTextSize: 16,
// 		hideHover: "auto",
// 		resize: false,
// 	});
// });
