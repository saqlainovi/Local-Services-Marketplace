<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Get the search query and clean it
$search_query = isset($_GET['query']) ? trim(mysqli_real_escape_string($con, $_GET['query'])) : '';

// Bangladesh locations with common misspellings
$bd_locations = [
    'dhaka' => ['dhaka', 'dhakka', 'dacca', 'dhaaka'],
    'chittagong' => ['chittagong', 'chattogram', 'chattagam', 'chitagong', 'chittagaong' , 'ctg'],
    'sylhet' => ['sylhet', 'silet', 'sillet', 'silhet'],
    'rajshahi' => ['rajshahi', 'rajsahi', 'rajshahi', 'rajsahi'],
    'khulna' => ['khulna', 'kulna', 'khulnaa'],
    'barisal' => ['barisal', 'barishal', 'borishal'],
    'rangpur' => ['rangpur', 'rongpur', 'rangpoor'],
    'mymensingh' => ['mymensingh', 'mymensingh', 'moimonsingho']
];

// Service types with common misspellings
$service_types = [
    'painter' => ['painter', 'paynter', 'paintar'],
    'plumber' => ['plumber', 'plumer', 'plamber'],
    'electrician' => ['electrician', 'electricean', 'electrisian'],
    'car mechanic' => ['car mechanic', 'car macanic', 'car mechanik'],
    'tv repair' => ['tv repair', 'tv repar', 'television repair'],
    'locksmith' => ['locksmith', 'locksmit', 'lock smith'],
    'battery' => ['battery', 'batery', 'batterry'],
    'packers' => ['packers', 'packer', 'movers', 'mover']
];

// Function to find closest match
function findClosestMatch($input, $possibilities) {
    $input = strtolower($input);
    $closest = '';
    $highest_similarity = 0;

    foreach ($possibilities as $correct => $variations) {
        foreach ($variations as $variant) {
            $similarity = similar_text($input, $variant, $percent);
            if ($percent > $highest_similarity) {
                $highest_similarity = $percent;
                $closest = $correct;
            }
        }
    }

    return $highest_similarity > 60 ? $closest : false;
}

$results = [];
$search_type = '';
$corrected_term = '';

if (!empty($search_query)) {
    // Check if it's a location search
    $location_match = findClosestMatch($search_query, $bd_locations);
    
    // Check if it's a service search
    $service_match = findClosestMatch($search_query, $service_types);

    // If location found
    if ($location_match) {
        $search_type = 'location';
        $corrected_term = $location_match;
        
        // Search in all service tables for this location
        $tables = [
            'painters', 'plumbers', 'electricians', 'car_mechanics', 
            'tv_repair_technicians', 'locksmiths', 'battery_services', 'packers_movers'
        ];

        foreach ($tables as $table) {
            $sql = "SELECT *, '$table' as service_type FROM $table 
                   WHERE LOWER(location) LIKE LOWER(?)";
            
            $stmt = mysqli_prepare($con, $sql);
            $search_param = "%$location_match%";
            mysqli_stmt_bind_param($stmt, "s", $search_param);
            mysqli_stmt_execute($stmt);
            $query_result = mysqli_stmt_get_result($stmt);
            
            while ($row = mysqli_fetch_assoc($query_result)) {
                $results[] = $row;
            }
        }
    }
    // If service found
    elseif ($service_match) {
        $search_type = 'service';
        $corrected_term = $service_match;
        
        // Map service to table name
        $table_map = [
            'painter' => 'painters',
            'plumber' => 'plumbers',
            'electrician' => 'electricians',
            'car mechanic' => 'car_mechanics',
            'tv repair' => 'tv_repair_technicians',
            'locksmith' => 'locksmiths',
            'battery' => 'battery_services',
            'packers' => 'packers_movers'
        ];

        if (isset($table_map[$service_match])) {
            $table = $table_map[$service_match];
            $sql = "SELECT *, '$table' as service_type FROM $table";
            $query_result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query_result)) {
                $results[] = $row;
            }
        }
    }
    // If neither found, might be foreign location
    else {
        $search_type = 'foreign';
    }
}
?>

<div class="container mt-4">
    <?php if ($search_type == 'foreign'): ?>
        <div class="alert alert-info">
            <h4>Service Not Available</h4>
            <p>We currently provide services only in Bangladesh. Please search for locations within Bangladesh.</p>
            <p>Available cities: Dhaka, Chittagong, Sylhet, Rajshahi, Khulna, Barisal, Rangpur, Mymensingh</p>
        </div>

    <?php elseif (!empty($search_query)): ?>
        <?php if ($corrected_term != strtolower($search_query)): ?>
            <div class="alert alert-info">
                Showing results for: <strong><?php echo ucfirst($corrected_term); ?></strong>
                <br>Original search: "<?php echo htmlspecialchars($search_query); ?>"
            </div>
        <?php endif; ?>

        <h2 class="mb-4">
            <?php if ($search_type == 'location'): ?>
                Available Service Providers in <?php echo ucfirst($corrected_term); ?>
            <?php else: ?>
                Available <?php echo ucfirst($corrected_term); ?>s
            <?php endif; ?>
        </h2>

        <?php if (!empty($results)): ?>
            <!-- Filter Section -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="GET" class="row g-3">
                        <!-- Keep the original search query -->
                        <input type="hidden" name="query" value="<?php echo htmlspecialchars($search_query); ?>">
                        
                        <div class="col-md-3">
                            <label class="form-label">Location</label>
                            <select name="location" class="form-select">
                                <option value="">All Locations</option>
                                <?php
                                $locations = array();
                                foreach ($results as $provider) {
                                    if (!in_array($provider['location'], $locations)) {
                                        $locations[] = $provider['location'];
                                    }
                                }
                                sort($locations);
                                foreach ($locations as $loc) {
                                    $selected = ($_GET['location'] ?? '') == $loc ? 'selected' : '';
                                    echo "<option value='{$loc}' {$selected}>{$loc}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Availability</label>
                            <select name="availability" class="form-select">
                                <option value="">All</option>
                                <option value="1" <?php echo ($_GET['availability'] ?? '') == '1' ? 'selected' : ''; ?>>Available Now</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Sort By Price</label>
                            <select name="price_sort" class="form-select">
                                <option value="">Default</option>
                                <option value="low_high" <?php echo ($_GET['price_sort'] ?? '') == 'low_high' ? 'selected' : ''; ?>>Low to High</option>
                                <option value="high_low" <?php echo ($_GET['price_sort'] ?? '') == 'high_low' ? 'selected' : ''; ?>>High to Low</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-primary d-block">Apply Filters</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            // Apply filters to results
            if (!empty($_GET['location'])) {
                $location = $_GET['location'];
                $filtered_results = array_filter($results, function($provider) use ($location) {
                    return strcasecmp(trim($provider['location']), trim($location)) === 0;
                });
                $results = array_values($filtered_results);
            }

            if (!empty($_GET['availability'])) {
                $filtered_results = array_filter($results, function($provider) {
                    return isset($provider['availability']) && intval($provider['availability']) === 1;
                });
                $results = array_values($filtered_results);
            }

            // Sort by price
            if (!empty($_GET['price_sort'])) {
                usort($results, function($a, $b) {
                    // Get the price values from different possible columns
                    $price_a = 0;
                    $price_b = 0;
                    
                    // Check each possible price column
                    $price_columns = ['price_per_service', 'price_per_hour', 'price_per_day', 'service_charge'];
                    foreach ($price_columns as $column) {
                        if (isset($a[$column]) && !empty($a[$column])) {
                            $price_a = floatval($a[$column]);
                        }
                        if (isset($b[$column]) && !empty($b[$column])) {
                            $price_b = floatval($b[$column]);
                        }
                    }
                    
                    return $_GET['price_sort'] === 'low_high' ? 
                           ($price_a - $price_b) : 
                           ($price_b - $price_a);
                });
            }
            ?>

            <!-- Results count -->
            <div class="mb-4">
                <p class="text-muted">Found <?php echo count($results); ?> service providers</p>
            </div>

            <!-- Display filtered results -->
            <div class="row">
                <?php if (empty($results)): ?>
                    <div class="col-12">
                        <div class="alert alert-warning">
                            No service providers found matching your filter criteria.
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($results as $provider): ?>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo isset($provider['image']) ? $provider['image'] : '../img/default-profile.jpg'; ?>" 
                                                 class="img-fluid rounded-circle mb-3" 
                                                 alt="<?php echo $provider['name']; ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="card-title"><?php echo $provider['name']; ?></h5>
                                            <div class="mb-2">
                                                <span class="badge <?php echo $provider['availability'] ? 'bg-success' : 'bg-danger'; ?>">
                                                    <?php echo $provider['availability'] ? 'Available' : 'Not Available'; ?>
                                                </span>
                                                <span class="badge bg-primary">
                                                    <?php echo $provider['work_experience']; ?> Years Experience
                                                </span>
                                            </div>
                                            <p class="card-text">
                                                <i class="fa fa-map-marker text-danger"></i> 
                                                <?php echo $provider['location']; ?><br>
                                                <i class="fa fa-money text-success"></i> 
                                                ৳<?php echo $provider['price_per_service'] ?? $provider['price_per_hour'] ?? $provider['price_per_day']; ?><br>
                                                <i class="fa fa-phone text-primary"></i> 
                                                <?php echo $provider['contact_number']; ?>
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="rating">
                                                    <?php
                                                    $rating = $provider['rating'] ?? 0;
                                                    for($i = 1; $i <= 5; $i++) {
                                                        if($i <= $rating) {
                                                            echo '<i class="fa fa-star text-warning"></i>';
                                                        } else {
                                                            echo '<i class="fa fa-star-o text-warning"></i>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <a href="<?php echo str_replace('s', '', $provider['service_type']) ?>_info.php?id=<?php echo $provider['id']; ?>" 
                                                   class="btn btn-primary">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="alert alert-info">
            <h4>Search Tips:</h4>
            <ul>
                <li>Search by location (e.g., "Dhaka", "Chittagong")</li>
                <li>Search by service (e.g., "Painter", "Plumber")</li>
                <li>We provide services in all major cities of Bangladesh</li>
            </ul>
        </div>
    <?php endif; ?>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.badge {
    padding: 8px 12px;
    margin-right: 5px;
}
</style>

<?php include('includes/footer.php'); ?> 