//load platform
var platform = new H.service.Platform({
    'app_id': 'wScDqULZdhwRKBl6uT56',
    'app_code': 'OHzXFtZctm12TKOqE5i1Bg'
});

//load map layer
var defaultLayers = platform.createDefaultLayers();

//load map in div and styles
var map = new H.Map(
    document.getElementById('mapContainer'),
    defaultLayers.normal.map,
    { zoom: 14, center: { lat: 14.65, lng: 121.05 }}
);

//Create default UI
var ui = H.ui.UI.createDefault(map, defaultLayers);

//bind map events to map
var mapEvents = new H.mapevents.MapEvents(map);

// //add event listener to map
// map.addEventListener('tap', function(evt){
//     console.log(evt.type, evt.currentPointer.type);
// });

//add default behavior of map
var behavior = new H.mapevents.Behavior(mapEvents);