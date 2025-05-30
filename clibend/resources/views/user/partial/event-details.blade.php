<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details | Plantation Portal</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    @vite(['resources/css/event-details.css'])
</head>
<body>

    <div class="container">
        <section id="event-view" class="page">
            <div class="page-header">
                <div class="header-content">
                    <h1>{{ $event->event_title }}</h1>
                    <span class="event-type-badge {{ $event->event_type }}">{{ ucfirst($event->event_type) }} Event</span>
                </div>
                <div class="header-actions">
                    <a href="{{ route('user') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
                </div>
            </div>
            
            <div class="event-content">
                <div class="event-main">
                    <div class="event-image-container">
                        <img src="{{ asset('event_images/' . $event->event_image) }}" alt="{{ $event->event_title }}" class="event-cover-image">
                        <span class="status-badge large {{ strtolower($event->status) }}">{{ ucfirst($event->status) }}</span>
                    </div>
                    
                    <div class="event-info-section">
                        <h2 class="section-title"><i class="fas fa-info-circle"></i> Event Details</h2>
                        <div class="info-content">
                            <div class="event-description">
                                <p>{{ $event->event_description }}</p>
                            </div>
                            
                            <div class="event-meta">
                                <div class="meta-item">
                                    <i class="fas fa-users"></i>
                                    <div>
                                        <span class="label">Expected Participants</span>
                                        <span class="value">{{ $event->expected_participants }}</span>
                                    </div>
                                </div>
                                
                                <div class="meta-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <div>
                                        <span class="label">Event Date</span>
                                        <span class="value">{{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}</span>
                                    </div>
                                </div>
                                
                                <div class="meta-item">
                                    <i class="fas fa-clock"></i>
                                    <div>
                                        <span class="label">Start Time</span>
                                        <span class="value">{{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}</span>
                                    </div>
                                </div>
                                
                                <div class="meta-item">
                                    <i class="fas fa-hourglass-half"></i>
                                    <div>
                                        <span class="label">Duration</span>
                                        <span class="value">{{ $event->duration }} hours</span>
                                    </div>
                                </div>
                                
                                <div class="meta-item">
                                    <i class="fas fa-calendar-check"></i>
                                    <div>
                                        <span class="label">Registration Deadline</span>
                                        <span class="value">{{ \Carbon\Carbon::parse($event->registration_deadline)->format('F d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- for map -->
                    <div class="event-info-section">
                        <h2 class="section-title"><i class="fas fa-map-marker-alt"></i> Location Details</h2>
                        <div class="info-content">
                            <div class="location-details">
                                <div class="location-text">
                                    <p><strong>Region:</strong> {{ ucfirst($event->region) }} District</p>
                                    <p><strong>Specific Location:</strong> {{ $event->location_detail }}</p>
                                </div>     
                                <div class="location-map">
                                    <div id="map" class="event-map">
                                        @if($event->latitude && $event->longitude)
                                            <div class="map-placeholder" data-lat="{{ $event->latitude }}" data-lng="{{ $event->longitude }}">
                                                <span>Map Loading...</span>
                                            </div>
                                        @else
                                            <div class="no-map-placeholder">
                                                <i class="fas fa-map-marked-alt"></i>
                                                <span>No map location available</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                    
            <div class="event-info-section">
                <h2 class="section-title"><i class="fas fa-tree"></i> Tree Types</h2>
                <div class="info-content">
                    <div class="tree-types-container">
                    @php
                        $treeTypes = is_array($event->tree_types)
                            ? $event->tree_types
                            : json_decode($event->tree_types, true) ?? explode(',', $event->tree_types);

                        $imagePath = public_path('images/');
                    @endphp

                    @if(count($treeTypes) > 0)
                        @foreach($treeTypes as $tree)
                            @php
                                $treeName = trim($tree);
                                $formattedName = ucfirst($treeName);

                                // Try jpg first, then webp fallback
                                $imageUrl = file_exists($imagePath . $treeName . '.jpg')
                                            ? asset('images/' . $treeName . '.jpg')
                                            : (file_exists($imagePath . $treeName . '.webp')
                                                ? asset('images/' . $treeName . '.webp')
                                                : null);
                            @endphp

                            <div class="tree-type-item">
                                @if($imageUrl)
                                    <img src="{{ $imageUrl }}" alt="{{ $formattedName }} Tree">
                                @else
                                    <div class="no-image">No image</div>
                                @endif
                                <span>{{ $formattedName }} Trees</span>
                            </div>
                        @endforeach
                    @else
                        <p class="no-trees-message">No specific tree types selected for this event.</p>
                    @endif 

                    </div>
                </div>
            </div>

                </div>
                
                <div class="event-sidebar">
                    <div class="sidebar-section">
                        <h3><i class="fas fa-calendar"></i> Event Timeline</h3>
                        <div class="event-timeline">
                            <div class="timeline-item past">
                                <div class="timeline-icon">
                                    <i class="fas fa-plus-circle"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Event Created</h4>
                                    <p>{{ \Carbon\Carbon::parse($event->created_at)->format('M d, Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item {{ \Carbon\Carbon::parse($event->registration_deadline)->isPast() ? 'past' : 'future' }}">
                                <div class="timeline-icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Registration Deadline</h4>
                                    <p>{{ \Carbon\Carbon::parse($event->registration_deadline)->format('M d, Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item {{ \Carbon\Carbon::parse($event->event_date)->isPast() ? 'past' : 'future' }}">
                                <div class="timeline-icon">
                                    <i class="fas fa-seedling"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Plantation Day</h4>
                                    <p>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
                </div>
            </div>
        </section>
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const mapContainer = document.querySelector('.map-placeholder');
        if (mapContainer) {
            const lat = parseFloat(mapContainer.dataset.lat);
            const lng = parseFloat(mapContainer.dataset.lng);
            const mapDiv = document.getElementById('map');

            if (!isNaN(lat) && !isNaN(lng)) {
                // Clear placeholder
                mapDiv.innerHTML = "";

                // Set map size
                mapDiv.style.height = "350px";
                mapDiv.style.width = "100%";

                // Create map
                const map = L.map(mapDiv).setView([lat, lng], 13);

                // Add OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                // Add marker
                L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup("{{ $event->location_detail }}")
                    .openPopup();
            }
        }
    });
</script>

</body>
</html>