<x-admin-layout>
    <div class="flex flex-wrap">
        <div class="w-full px-4">
            <div class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-white rounded shadow-lg">
                <div id="map-canvas"
                    class="relative w-full rounded h-600-px"
                    data-lat="40.748817"
                    data-lng="-73.985428"></div>
            </div>
        </div>
    </div>
    @push('script')

        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
        <script type="text/javascript">
            /* Make dynamic date appear */
            (function() {
                if (document.getElementById("get-current-year")) {
                    document.getElementById(
                        "get-current-year"
                    ).innerHTML = new Date().getFullYear();
                }
            })();
            /* Sidebar - Side navigation menu on mobile/responsive mode */
            function toggleNavbar(collapseID) {
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("bg-white");
                document.getElementById(collapseID).classList.toggle("m-2");
                document.getElementById(collapseID).classList.toggle("py-3");
                document.getElementById(collapseID).classList.toggle("px-6");
            }
            /* Function for dropdowns */
            function openDropdown(event, dropdownID) {
                let element = event.target;
                while (element.nodeName !== "A") {
                    element = element.parentNode;
                }
                Popper.createPopper(element, document.getElementById(dropdownID), {
                    placement: "bottom-start",
                });
                document.getElementById(dropdownID).classList.toggle("hidden");
                document.getElementById(dropdownID).classList.toggle("block");
            }

            (function() {
                /* Map initialisation */
                let google = window.google;
                let map = document.getElementById("map-canvas");
                let lat = map.getAttribute("data-lat");
                let lng = map.getAttribute("data-lng");

                const myLatlng = new google.maps.LatLng(lat, lng);
                const mapOptions = {
                    zoom: 12,
                    scrollwheel: false,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: [{
                            featureType: "administrative",
                            elementType: "labels.text.fill",
                            stylers: [{
                                color: "#444444"
                            }],
                        },
                        {
                            featureType: "landscape",
                            elementType: "all",
                            stylers: [{
                                color: "#f2f2f2"
                            }],
                        },
                        {
                            featureType: "poi",
                            elementType: "all",
                            stylers: [{
                                visibility: "off"
                            }],
                        },
                        {
                            featureType: "road",
                            elementType: "all",
                            stylers: [{
                                saturation: -100
                            }, {
                                lightness: 45
                            }],
                        },
                        {
                            featureType: "road.highway",
                            elementType: "all",
                            stylers: [{
                                visibility: "simplified"
                            }],
                        },
                        {
                            featureType: "road.arterial",
                            elementType: "labels.icon",
                            stylers: [{
                                visibility: "off"
                            }],
                        },
                        {
                            featureType: "transit",
                            elementType: "all",
                            stylers: [{
                                visibility: "off"
                            }],
                        },
                        {
                            featureType: "water",
                            elementType: "all",
                            stylers: [{
                                color: "#fbb6ce"
                            }, {
                                visibility: "on"
                            }],
                        },
                    ],
                };

                map = new google.maps.Map(map, mapOptions);

                const marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    title: "Hello World!",
                });

                const contentString =
                    '<div class="info-window-content"><h2>Notus JS</h2>' +
                    "<p>A beautiful UI Kit and Admin for Tailwind CSS. It is Free and Open Source.</p></div>";

                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });

                google.maps.event.addListener(marker, "click", function() {
                    infowindow.open(map, marker);
                });
            })();

        </script>
    @endpush
</x-admin-layout>
