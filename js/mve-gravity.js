/* Custom JQuery for Gravity Forms*/

jQuery(document).ready(function( $ ) {

    /*$('.gravity-breadcrumb-container').find('.gravity-breadcrumb').eq(0).addClass('active');
    $(document).bind('gform_page_loaded', function(event, form_id, current_page){
        console.log('current_page = ' + current_page);
        if(current_page)
            $('.gravity-breadcrumb-container').find('.gravity-breadcrumb').removeClass('active').eq(current_page-1).addClass('active');
    });

    setTimeout(function(){
        $('.gravity-breadcrumb-container').addClass('active');
    },300);*/
});

/*********************************************/

var mapConstructor = function(name,domId,mapOptions){
    var mapConstructor = this;
    this.name = name;
    this.lat = 48.856638;
    this.lng = 2.352241;
    this.domId = domId;
    this.gmapLatLng = new google.maps.LatLng(mapConstructor.lat, mapConstructor.lng);
    this.mapOptions = mapOptions;
}

mapConstructor.prototype = {

    setOriginLocation : function(){
        var mapConstructor = this,
            options = {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
            };

        function success(pos) {
            var crd = pos.coords;
            mapConstructor.lat = crd.latitude;
            mapConstructor.lng = crd.longitude;
            mapConstructor.gmapLatLng = new google.maps.LatLng(crd.latitude, crd.longitude);
            if(mapConstructor.gMap != null)
                mapConstructor.gMap.setCenter(mapConstructor.gmapLatLng);
            if(mapConstructor.marker != null)
                mapConstructor.marker.setPosition(mapConstructor.gmapLatLng);
        };

        function error(err) {
            console.warn("ERROR(" + err.code + " : "  + err.message);
        };

        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success, error, options);
        }

        return mapConstructor;
    },

    loadMap : function(){
        var mapConstructor = this;
        var extendedOptions = {
            center: mapConstructor.gmapLatLng
        };

        var thisMapOptions = jQuery.extend({}, mapConstructor.mapOptions, extendedOptions);

        mapConstructor.gMap = new google.maps.Map(document.getElementById(mapConstructor.domId), thisMapOptions);

        return mapConstructor;
    },

    setMarker : function(title){
        var mapConstructor = this;
        mapConstructor.marker = new google.maps.Marker({
            draggable: true,
            position: mapConstructor.gmapLatLng,
            map: mapConstructor.gMap,
            title: title
        });

        return mapConstructor;
    },

    setInfoWindow: function(content){
        var mapConstructor = this;
        mapConstructor.infowindow = new google.maps.InfoWindow({
            content: content
        });

        return mapConstructor;
    },

    dragWatch: function(latID,lngID){
        var mapConstructor = this;
        google.maps.event.addListener(mapConstructor.marker, 'dragend', function (event) {
            document.getElementById(latID).value = event.latLng.lat();
            document.getElementById(lngID).value = event.latLng.lng();
            mapConstructor.infowindow.setContent('Coordonnées GPS :<br/>Latitude : ' + event.latLng.lat() + '<br/>Longitude : ' + event.latLng.lng());
            mapConstructor.infowindow.open(mapConstructor.gMap, mapConstructor.marker);
        });

        return mapConstructor;
    },

    initMap : function(){
        var mapConstructor = this;
        mapConstructor
            .loadMap()
            .setMarker("La position de votre exploitation")
            .setInfoWindow()
            .dragWatch('input_1_17','input_1_18')
            .setOriginLocation();
    },

}

/****************************************/

var formMapOptions_1 = {
    zoom:8,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    panControl:true,
    zoomControl:true,
    mapTypeControl:false,
    scaleControl:true,
    streetViewControl:false,
    overviewMapControl:true,
    rotateControl:true
};

var formMapObj_1 = new mapConstructor("formMap1","map_canvas",formMapOptions_1);
google.maps.event.addDomListener(window, "load",formMapObj_1.initMap());


