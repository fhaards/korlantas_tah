$(function () {
	"use strict";

	// Datepicker found in left sidebar of the page
	var highlightedDays = [
		"2018-5-10",
		"2018-5-11",
		"2018-5-12",
		"2018-5-13",
		"2018-5-14",
		"2018-5-15",
		"2018-5-16",
	];
	var date = new Date();

	$(".fc-datepicker").datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		dateFormat: "yy-mm-dd",
		beforeShowDay: function (date) {
			var m = date.getMonth(),
				d = date.getDate(),
				y = date.getFullYear();
			for (var i = 0; i < highlightedDays.length; i++) {
				if ($.inArray(y + "-" + (m + 1) + "-" + d, highlightedDays) != -1) {
					return [true, "ui-date-highlighted", ""];
				}
			}
			return [true];
		},
	});

	var plot1 = $.plot(
		"#flotChart",
		[
			{
				data: flotSampleData5,
				color: "#6610f2",
			},
			{
				data: flotSampleData3,
				color: "#00cccc",
			},
		],
		{
			series: {
				shadowSize: 0,
				lines: {
					show: true,
					lineWidth: 2,
					fill: true,
					fillColor: {
						colors: [
							{
								opacity: 0,
							},
							{
								opacity: 0.2,
							},
						],
					},
				},
			},
			grid: {
				borderWidth: 0,
				borderColor: "#969dab",
				labelMargin: 5,
				markings: [
					{
						xaxis: {
							from: 10,
							to: 20,
						},
						color: "#f7f7f7",
					},
				],
			},
			yaxis: {
				show: false,
				color: "#ced4da",
				tickLength: 10,
				min: 0,
				max: 110,
				font: {
					size: 11,
					color: "#969dab",
				},
				tickFormatter: function formatter(val, axis) {
					return val + "k";
				},
			},
			xaxis: {
				show: false,
				position: "top",
				color: "rgba(0,0,0,0.1)",
			},
		}
	);

	var mqSM = window.matchMedia("(min-width: 576px)");
	var mqSMMD = window.matchMedia("(min-width: 576px) and (max-width: 991px)");
	var mqLG = window.matchMedia("(min-width: 992px)");

	function screenCheck() {
		if (mqSM.matches) {
			plot1.getAxes().yaxis.options.show = true;
			plot1.getAxes().xaxis.options.show = true;
		} else {
			plot1.getAxes().yaxis.options.show = false;
			plot1.getAxes().xaxis.options.show = false;
		}

		if (mqSMMD.matches) {
			var tick = [
				[0, "<span>Oct</span><span>10</span>"],
				[20, "<span>Oct</span><span>12</span>"],
				[40, "<span>Oct</span><span>14</span>"],
				[60, "<span>Oct</span><span>16</span>"],
				[80, "<span>Oct</span><span>18</span>"],
				[100, "<span>Oct</span><span>19</span>"],
				[120, "<span>Oct</span><span>20</span>"],
				[140, "<span>Oct</span><span>23</span>"],
			];

			plot1.getAxes().xaxis.options.ticks = tick;
		}

		if (mqLG.matches) {
			var tick = [
				[10, "<span>Oct</span><span>10</span>"],
				[20, "<span>Oct</span><span>11</span>"],
				[30, "<span>Oct</span><span>12</span>"],
				[40, "<span>Oct</span><span>13</span>"],
				[50, "<span>Oct</span><span>14</span>"],
				[60, "<span>Oct</span><span>15</span>"],
				[70, "<span>Oct</span><span>16</span>"],
				[80, "<span>Oct</span><span>17</span>"],
				[90, "<span>Oct</span><span>18</span>"],
				[100, "<span>Oct</span><span>19</span>"],
				[110, "<span>Oct</span><span>20</span>"],
				[120, "<span>Oct</span><span>21</span>"],
				[130, "<span>Oct</span><span>22</span>"],
				[140, "<span>Oct</span><span>23</span>"],
			];

			plot1.getAxes().xaxis.options.ticks = tick;
		}
	}

	screenCheck();
	mqSM.addListener(screenCheck);
	mqSMMD.addListener(screenCheck);
	mqLG.addListener(screenCheck);

	plot1.setupGrid();
	plot1.draw();

	$.plot(
		"#flotPie",
		[
			{
				label: "Interested",
				data: [[1, 25]],
				color: "#6f42c1",
			},
			{
				label: "Going",
				data: [[1, 38]],
				color: "#007bff",
			},
			{
				label: "Maybe",
				data: [[1, 20]],
				color: "#00cccc",
			},
			{
				label: "Not Going",
				data: [[1, 15]],
				color: "#969dab",
			},
		],
		{
			series: {
				pie: {
					show: true,
					radius: 1,
					innerRadius: 0.5,
					label: {
						show: true,
						radius: 3 / 4,
						formatter: labelFormatter,
					},
				},
			},
			legend: {
				show: false,
			},
		}
	);

	function labelFormatter(label, series) {
		return (
			'<div style="font-size:11px; font-weight:500; text-align:center; padding:2px; color:white;">' +
			Math.round(series.percent) +
			"%</div>"
		);
	}

	$("#sparkline").sparkline(
		[
			15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15,
			15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15,
		],
		{
			type: "bar",
			height: 100,
			barWidth: 7,
			barColor: "#e9ecef",
			barSpacing: 5,
			chartRangeMin: 0,
			chartRangeMax: 15,
			disableTooltips: true,
			disableHighlight: true,
		}
	);

	$("#sparkline").sparkline(
		[
			1, 2, 4, 4, 7, 5, 9, 10, 6, 4, 4, 7, 5, 9, 10, 5, 9, 10, 6, 4, 4, 7, 5, 9,
			10, 9, 10, 6, 4, 4, 7, 5, 6, 4, 3, 4,
		],
		{
			composite: true,
			type: "bar",
			barWidth: 7,
			barSpacing: 5,
			height: 100,
			barColor: "#6f42c1",
			chartRangeMin: 0,
			chartRangeMax: 15,
			disableTooltips: true,
			disableHighlight: true,
		}
	);
});
