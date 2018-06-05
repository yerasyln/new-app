
//alert(JSON.stringify(arr, null, 4));

AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "date",
					"dataDateFormat": "YYYY-MM-DD",
					"plotAreaBorderColor": "#34495e",
					"colors": [
						"#34495e",
						"#26b99a",
						"#7cb5ec"
						
					],
					"categoryAxis": {
						"parseDates": true
					},
					"chartCursor": {
						"enabled": true
					},
					"chartScrollbar": {
						"enabled": true
					},
					"trendLines": [],
					"graphs": [
						{
							"fillAlphas": 0.7,
							"id": "AmGraph-1",
							"lineAlpha": 0,
							"title": "Call-center",
							"valueField": "column-1"
						},
						{
							"fillAlphas": 0.7,
							"id": "AmGraph-2",
							"lineAlpha": 0,
							"title": "Техподдержка",
							"valueField": "column-2"
						},
						{
                                                    	"fillAlphas": 0.4,
							"id": "AmGraph-3",
                                                        "lineAlpha": 0,
							"title": "Офис продаж",
							"valueField": "column-3"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "NPS"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Точка взаимодействия в динамике"
						}
					],
					"dataProvider": arr
				}
			);
