<!DOCTYPE html>
<html>
<head>
	<title>Vigilo Troyes - Carte des signalements</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<style>
   	html, body, #map {
      	height:100%;
      	width:100%;
      	padding:0px;
      	margin:0px;
   	} 
   	#vigilo {
   		max-width: 100%;
   		max-height: %;
   		height: auto;
   		width: auto\9;
   	}
   	.leaflet-popup {
   		max-width: 400px;
   		width: 400px;
   	}
   	.leaflet-popup-content {
		width:auto !important;
		height:auto !important;
	}
   </style>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
  integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
  crossorigin=""/>
  <link rel="stylesheet" href="./leaflet-beautify-marker-icon.css">
  <link rel="stylesheet" href="./MarkerCluster.css">
  <link rel="stylesheet" href="./MarkerCluster.Default.css">
  
	<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
  integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
  crossorigin=""></script>
  <script src="./leaflet-beautify-marker-icon.js"></script>
  <script src="./leaflet.markercluster.js"></script>
  <script src="./leaflet.permalink.min.js"></script>
</head>
<body>
	<div id="map"></div>

	<script>

		const URL_VIGILO = "http://api.vigilo.troyesenselle.fr"

		var mapbox = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoiem91YmlkZGFhYSIsImEiOiItbk16UXlNIn0.DVKhF_zYdBhplHVSK_R71w', {
			maxZoom: 22,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		});
		
		var ign = L.tileLayer('http://wxs.ign.fr/{key}/wmts/?SERVICE=WMTS&REQUEST=GetTile&VERSION=1.0.0&LAYER=ORTHOIMAGERY.ORTHOPHOTOS&STYLE=normal&TILEMATRIXSET=PM&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}&FORMAT=image%2Fjpeg', {
			maxZoom: 19,
			attribution: 'IGN',
			key: '375kd8qpf3tpnzyagv9oqlpn'
		});

		var icon2 = L.BeautifyIcon.icon({
			icon: 'exclamation',
			iconShape: 'marker',
			borderColor: 'red',
			textColor: 'red',
			spin: true,
		})

		var icon3 = L.BeautifyIcon.icon({
			icon: 'child',
			iconShape: 'marker',
			borderColor: 'blue',
			textColor: 'blue'
		})

		var icon4 = L.BeautifyIcon.icon({
			icon: 'quidditch',
			iconShape: 'marker',
			borderColor: 'brown',
			textColor: 'brown'
		})

		var icon5 = L.BeautifyIcon.icon({
			icon: 'parking',
			iconShape: 'marker',
			borderColor: 'green',
			textColor: 'green'
		})

		var icon6 = L.BeautifyIcon.icon({
			icon: 'paint-roller',
			iconShape: 'marker',
			borderColor: 'grey',
			textColor: 'grey'
		})

		var icon7 = L.BeautifyIcon.icon({
			icon: 'car-crash',
			iconShape: 'marker',
			borderColor: 'black',
			textColor: 'black'
		})

		var icon8 = L.BeautifyIcon.icon({
			icon: 'pencil-ruler',
			iconShape: 'marker',
			borderColor: 'orange',
			textColor: 'orange'
		})

		var icon9 = L.BeautifyIcon.icon({
			icon: 'ambulance',
			iconShape: 'marker',
			borderColor: 'red',
			textColor: 'red'
		})

		var icon100 = L.BeautifyIcon.icon({
			icon: 'box-open',
			iconShape: 'marker',
			borderColor: 'mauve',
			textColor: 'mauve'
		})

		var markers2 = L.markerClusterGroup({
			disableClusteringAtZoom: 16,
			/*iconCreateFunction: function (cluster) {
					return L.divIcon({html: '<div class="map-label redborder"><div class="map-label-content">'+cluster.getChildCount()+'</div><div class="map-label-arrow"></div></div>'});
			}*/
		});
		var markers3 = L.markerClusterGroup({disableClusteringAtZoom: 16});
		var markers4 = L.markerClusterGroup({disableClusteringAtZoom: 16});
		var markers5 = L.markerClusterGroup({disableClusteringAtZoom: 16});
		var markers6 = L.markerClusterGroup({disableClusteringAtZoom: 16});
		var markers7 = L.markerClusterGroup({disableClusteringAtZoom: 16});
		var markers8 = L.markerClusterGroup({disableClusteringAtZoom: 16});
		var markers9 = L.markerClusterGroup({disableClusteringAtZoom: 16});
		var markers100 = L.markerClusterGroup({disableClusteringAtZoom: 16});
	
		getData(2, icon2, markers2);
		getData(3, icon3, markers3);
		getData(4, icon4, markers4);
		getData(5, icon5, markers5);
		getData(6, icon6, markers6);
		getData(7, icon7, markers7);
		getData(8, icon8, markers8);
		getData(9, icon9, markers9);
		getData(100, icon100, markers100);

		function getData(categorie, icon, cluster){
		var geojson = {
					type: "FeatureCollection",
					features: [],
				};
		let url = URL_VIGILO+"/get_issues.php?c="+categorie;
		var xhr = new XMLHttpRequest();
		xhr.open('GET', url);
		xhr.onload = function () {
		    if (xhr.status === 200) {
				var data = xhr.responseText;
				var jsonResponse = JSON.parse(data);
				for (i = 0; i < jsonResponse.length; i++) {
					var ele = jsonResponse[i];
					geojson.features.push({
						"type": "Feature",
						"geometry": {
							"type": "Point",
							"coordinates": [ele.coordinates_lon, ele.coordinates_lat]
						},
						"properties": {
							"token": ele.token,
							"address": ele.address,
							"comment": ele.comment,
							"explanation": ele.explanation,
							"time": ele.time,
							"group": ele.group,
							"categorie": ele.categorie,
							"approved": ele.approved
						}
					});

				}
				if(jsonResponse.length>>100){

					cluster.addLayer(L.geoJSON(geojson, {
						pointToLayer: function (feature, latlng) {
						return L.marker(latlng, {icon: icon});
						},
						onEachFeature: onEachFeature
						})
					);
					map.addLayer(cluster);
				} else {
					L.geoJSON(geojson, {
						pointToLayer: function (feature, latlng) {
						return L.marker(latlng, {icon: icon});
						},
					onEachFeature: onEachFeature
					}).addTo(map);
				}

			}
	    };
	   	xhr.send();
	   }
	
		function onEachFeature(feature, layer) {
		var popupContent = "<p>Référence: " + feature.properties.token + "</br>" +
				"<img id='vigilo' src='http://api.vigilo.troyesenselle.fr/generate_panel.php?s=1024&token=" + feature.properties.token + "'/></br>"+
				"<a href='https://twitter.com/search?q=#TCM_" + feature.properties.token + "'>Rechercher sur Twitter</a>"
				"</p>";

		if (feature.properties && feature.properties.popupContent) {
			popupContent += feature.properties.popupContent;
		}

		var customOptions = {
			'keepInView': true
		}

		layer.bindPopup(popupContent,customOptions);
	}

		var mappos = L.Permalink.getMapLocation();

		var map = L.map('map',{
			center: mappos.center,
			zoom: mappos.zoom,
			maxZoom: 20,
			minZoom: 12,
			layers: [mapbox]
			});
			
		var baseMaps = {
			"Orthophoto IGN": ign,
			"MapBox": mapbox
		};

		var overlays = {
			"Véhicule ou objet gênant (gcum)": markers2,
			"Aménagement mal conçu": markers3,
			"Défaut d'entretien": markers4,
			"Absence d'arceaux de stationnement": markers5,
			"Signalisation, marquage": markers6,
			"Incivilité récurrente sur la route": markers7,
			"Absence d'aménagement": markers8,
			"Accident, chute, incident": markers9,
			"Autre": markers100
		};

		L.control.layers(baseMaps, overlays).addTo(map);
		L.Permalink.setup(map);
	</script>


</body>
</html>