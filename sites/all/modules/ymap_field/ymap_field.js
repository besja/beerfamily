/**
 *  This script supports Yandex Map Field 
 */

(function ($) {
  var yMap;
  var searchCollection;
  var balloonText;
  
  Drupal.behaviors.ymap_field = {
    attach: function (context, settings) {
      $('body').once(function () {
        //initializing the ymap api
        ymaps.ready(initYandexMap);
        //bind map search to the search form
        if (Drupal.settings.ymap_field.edit_form) {
          $('#ymap-search-results').before('<form id="map-search-form"><input type="text" value="' + Drupal.settings.ymap_field.address + '" style="width: 720px;"/><input type="submit" value="' + Drupal.t('Search') + '"/></form>');
          //add button to fixate the center
          $('#ymap-search-results').before('<input id="ymap-set-coords-button" type="button" value="'+Drupal.t("Set Center")+'"/>');
          $("#ymap-set-coords-button").click( function() {
            coords = yMap.getCenter();
            ymapPlacemark = new ymaps.Placemark(coords, {
              balloonContentBody: balloonText 
            });
            //add mark
            yMap.geoObjects.add(ymapPlacemark);
            var search_query = $('#map-search-form').find('input:first').val();
            storeNewAddress(search_query, coords, yMap.getZoom());
            return false;
          });
          $('#map-search-form').submit(searchYMap);
        }
      });
    }
  };
  
  //map initialization
  function initYandexMap() {
    yMap = new ymaps.Map('yandexmap', {
      center: Drupal.settings.ymap_field.coords.split(","), //we split it because we store coords in 1 string
      zoom: Drupal.settings.ymap_field.zoom
    });
    yMap.controls
      .add('zoomControl')
      .add('typeSelector')
      .add('smallZoomControl', { right: 5, top: 75 })
      .add('mapTools');
    searchCollection = new ymaps.GeoObjectCollection();
    //create mark at saved address
    if (Drupal.settings.ymap_field.edit_form) {
      //we have different balloon text settings for edit form and for field display
      balloonText = Drupal.settings.ymap_field.address;
      //if we're in form, we have to save user changes in zoom
      yMap.events.add('boundschange', saveZoomChange);
    } else {
      balloonText = Drupal.settings.ymap_field.balloon_text;
    }
    ymapPlacemark = new ymaps.Placemark(Drupal.settings.ymap_field.coords.split(","), {
      balloonContentBody: balloonText});
    //add mark
    yMap.geoObjects.add(ymapPlacemark);
    //init hide and show
    $("#edit-field-ymap-und-0-ymap-show").click(hideShowYMap);
    hideShowYMap();
  }
  
  //function to process search
  function searchYMap() {
    var search_query = $('#map-search-form').find('input:first').val();
    ymaps.geocode(search_query, {results: 10}).then(function (res) {
      //get search results and put 'em to the map
      searchCollection.removeAll();
      searchCollection = res.geoObjects;
      if (searchCollection.getLength()) {
        yMap.geoObjects.add(searchCollection);
        //show the first result on the map
        setupMapCenter(res.geoObjects.get(0).geometry.getCoordinates());
        fillSearchBox(res.geoObjects.get(0).properties.get('text'));
        storeNewAddress(res.geoObjects.get(0).properties.get('text'), res.geoObjects.get(0).geometry.getCoordinates(),yMap.getZoom());
        //process results to build user info so he can scroll through them
        $('#ymap-search-results').empty();
        $('#ymap-search-results').append('<ol id="ymap-search-result-list"></ol>');
        var i=0;
        res.geoObjects.each( function(geoObject) {
          var coords = geoObject.geometry.getCoordinates();
          var address = geoObject.properties.get('text');
          //add link and store data there
          $('#ymap-search-result-list').append('<li><a id="ymap-search-result-' + i + '">' + address + '</a></li>');
          $('#ymap-search-result-' + i).click(selectSearchResult);
          $('#ymap-search-result-' + i).data('address', address);
          $('#ymap-search-result-' + i).data('coords', coords);
          i ++;
        });
        $('#ymap-search-results').append('</ol>');
      } else {
        //no results
        $('#ymap-search-results').empty();
        $('#ymap-search-results').append(Drupal.t('No results found. Try to widen your search.'));
      }
    });
    return false;
  }
  
  //function to process user selection of search result
  function selectSearchResult() {
    //move to position
    setupMapCenter($(this).data('coords'));
    //fill the search box
    fillSearchBox($(this).data('address'));
    //save user choice to hidden values
    storeNewAddress($(this).data('address'), $(this).data('coords'), yMap.getZoom());
  }
  
  //saves user choice to hidden values
  function storeNewAddress(address, coords, zoom) {
    $('input[name*="ymap_address"]').val(address);
    $('input[name*="ymap_coords"]').val(coords);
    $('input[name*="ymap_zoom"]').val(zoom);
  }

  //sets up map center
  function setupMapCenter(coords) {
    //adjust zoom so that we won't be over max
    var zoom;
    yMap.zoomRange.get(coords).then(function (zoomRange) {
      zoom = zoomRange[1];
    });
    if (zoom > 14) zoom = 14;
    yMap.setCenter(coords, zoom, {checkZoomRange: true});
  }
  
  //fill the search box
  function fillSearchBox(address) {
    $('#map-search-form').find('input:first').val(address);
  }
  
  //saves zoom changes
  function saveZoomChange(event) {
    if (event.get('oldZoom') != event.get('newZoom')) { //act only if we have difference in old and new zoom
      $('input[name*="ymap_zoom"]').val(event.get('newZoom'));
    }
  }
  
  //hide and show YMap
  function hideShowYMap() {
    if ($("#edit-field-ymap-und-0-ymap-show").is(':checked')) {
      //show
      $("#edit-field-ymap-und-0-search-results-wrapper").show();
      $("#edit-field-ymap-und-0-ymap-wrapper").show();
    } else {
      //hide
      $("#edit-field-ymap-und-0-search-results-wrapper").hide();
      $("#edit-field-ymap-und-0-ymap-wrapper").hide();
    }
  };
  
})(jQuery);
