<script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 0.8359277234674408, lng:  37.819817382812516},
            zoom: 5
        });

        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            document.getElementById("location_latitude").value = latitude;
            document.getElementById("location_longitude").value = longitude;

            infowindowContent.children['place-icon'].src = place.icon;
            infowindowContent.children['place-name'].textContent = place.name;
            infowindowContent.children['place-address'].textContent = address;
            infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            radioButton.addEventListener('click', function() {
                autocomplete.setTypes(types);
            });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
                console.log('Checkbox clicked! New state=' + this.checked);
                autocomplete.setOptions({strictBounds: this.checked});
            });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl4aIlFAoe3n72_4uPUWeuzE3jx2w16ZY&libraries=places&callback=initMap"
        async defer></script>

<script>
    $('input[type=number]').on('mousewheel', function(e) {
        $(e.target).blur();
    });
</script>




<script type="text/javascript" src="{{ url('public/js/app.js') }}"></script>

<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>

{{--<script src="{{ asset('assets/js/pages/custom/user/list-datatable.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/pages/crud/ktdatatable/base/html-table.js') }}"></script>--}}
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/datatables/advanced/column-visibility.js') }}"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js') }}"></script>


<!--end::Page Scripts-->
@isset($chat)
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['{{$label1}}', '{{$label2}}', '{{$label3}}', '{{$label4}}', '{{$label5}}', '{{$label6}}'],
                datasets: [{
                    label: 'Pending Orders',
                    backgroundColor: 'rgb(255,255,255)',
                    borderColor: 'rgb(255,255,255)',
                    data: [{{$pending_6 }}, {{ $pending_5 }}, {{ $pending_4 }}, {{ $pending_3 }}, {{ $pending_2 }}, {{ $pending_1 }}]
                },
                    {
                        label: 'Cancelled Orders',
                        backgroundColor: 'rgb(139,197,255)',
                        borderColor: 'rgb(139,197,255)',
                        data: [{{$cancelled_6 }}, {{ $cancelled_5 }}, {{ $cancelled_4 }}, {{ $cancelled_3 }}, {{ $cancelled_2 }}, {{ $cancelled_1 }}]
                    },
                    {
                        label: 'Delivered Orders',
                        backgroundColor: 'rgb(157,255,96)',
                        borderColor: 'rgb(157,255,96)',
                        data: [{{$delivered_6 }}, {{ $delivered_5 }}, {{ $delivered_4 }}, {{ $delivered_3 }}, {{ $delivered_2 }}, {{ $delivered_1 }}]
                    },
                    {
                        label: 'Total Orders',
                        backgroundColor: 'rgb(255,244,33)',
                        borderColor: 'rgb(255,244,33)',
                        data: [{{$total_6 }}, {{ $total_5 }}, {{ $total_4 }}, {{ $total_3 }}, {{ $total_2 }}, {{ $total_1 }}]

                    }

                ]
            },

            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display:false
                        },
                        ticks: {
                            fontColor: "#ffffff", // this here
                        },
                    }],
                    yAxes: [{
                        gridLines: {
                            display:false
                        },
                        ticks: {
                            fontColor: "#ffffff", // this here
                        },
                    }]
                },
                legend: {
                    labels: {
                        fontColor: '#ffffff'
                    }
                }
            }
        });
    </script>
@endisset


