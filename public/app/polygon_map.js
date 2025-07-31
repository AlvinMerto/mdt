var boxes  = [];

function region9() {
        region9_map(false,"#ef3828");
        map.on("click","region9", (e) => {
            alert("hi")
        });

        map.on("mouseover", "region9", (e) => {
            map.setPaintProperty("region9","fill-color","#ef3828");
        });

        map.on("mouseout", "region9", (e) => {
            map.setPaintProperty("region9","fill-color","#ef3828");
        });

        var box = create_box(false, function() {
            alert("hi")
        }, false, false, "region9", "8.036337612352998" , "121.84098282334618" );

        const m = new mapboxgl.Marker(box).setLngLat([121.84098282334618, 8.036337612352998]).addTo(map);

        boxes.push(m);
}


