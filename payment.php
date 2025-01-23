<?php
ob_start();
session_start();
$page_title = "Payment for Service";
$provider_page = true;
include('includes/header.php');
include('includes/navbar.php');
include('dbcon.php');

// Check if user is logged in
if (!isset($_SESSION['authenticated'])) {
    $_SESSION['message'] = "Please login to book a service";
    header('Location: login.php');
    ob_end_flush();
    exit();
}

// Get user ID from email
$user_email = $_SESSION['auth_user']['email'];
$user_query = "SELECT id FROM users WHERE email = '$user_email'";
$user_result = mysqli_query($con, $user_query);
$user = mysqli_fetch_assoc($user_result);

if (!$user) {
    die('User not found in database');
}

$user_id = $user['id'];

// Get service provider details
$provider_type = $_GET['type'] ?? '';
$provider_id = mysqli_real_escape_string($con, $_GET['id'] ?? '');

if (empty($provider_type) || empty($provider_id)) {
    $_SESSION['message'] = "Invalid service request";
    header('Location: index.php');
    exit();
}

switch($provider_type) {
    case 'battery':
        $query = "SELECT * FROM battery_services WHERE id = '$provider_id'";
        $result = mysqli_query($con, $query);
        $provider = mysqli_fetch_assoc($result);
        $rate_type = 'per service';
        $rate_field = 'price_per_service';
        break;
    case 'locksmith':
        $query = "SELECT * FROM locksmiths WHERE id = '$provider_id'";
        $result = mysqli_query($con, $query);
        $provider = mysqli_fetch_assoc($result);
        $rate_type = 'per service';
        $rate_field = 'price_per_service';
        break;
    case 'packer_mover':
        $query = "SELECT * FROM packers_movers WHERE id = '$provider_id'";
        $result = mysqli_query($con, $query);
        $provider = mysqli_fetch_assoc($result);
        $rate_type = 'per hour';
        $rate_field = 'price_per_hour';
        break;
    default:
        $_SESSION['message'] = "Invalid service type";
        header('Location: index.php');
        exit();
}

// Check if provider exists and has a valid price
if (!$provider || !isset($provider[$rate_field]) || empty($provider[$rate_field])) {
    $_SESSION['message'] = "Invalid service provider or price information";
    header('Location: index.php');
    exit();
}

// Stripe configuration
require_once __DIR__ . '/vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51QLLqbJcVq5mfW9UcfkUMQE5rZ1Co5Q3wPMA2NoD1XtkdHze6oJvVq9l7VDs0lKLcxupPq54Q2fpM9U9XC09zxrU00FDoeS8g6');

try {
    // Make sure we have a valid amount
    $raw_amount = $provider[$rate_field];
    $amount = (float) str_replace(',', '', (string)$raw_amount);
    
    if ($amount <= 0) {
        throw new Exception("Invalid service amount");
    }

    // Convert to smallest currency unit (cents/paisa)
    $stripe_amount = (int) round($amount * 100);

    $intent = \Stripe\PaymentIntent::create([
        'amount' => $stripe_amount,
        'currency' => 'bdt',
        'payment_method_types' => ['card'],
        'metadata' => [
            'provider_type' => $provider_type,
            'provider_id' => $provider_id,
            'user_id' => $user_id
        ]
    ]);
} catch(\Exception $e) {
    die('Payment setup error: ' . $e->getMessage());
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Payment Details</h3>
                    
                    <!-- Service Summary -->
                    <div class="service-summary mb-4 p-3 bg-light rounded">
                        <h5 class="border-bottom pb-2">Service Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Service Provider:</span>
                            <strong><?php echo htmlspecialchars($provider['name']); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Service Type:</span>
                            <strong><?php echo ucwords(str_replace('_', ' ', $provider_type)); ?></strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Service Date:</span>
                            <strong id="selected-date" class="text-primary">Select date below</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Rate:</span>
                            <strong class="text-success">৳<?php echo number_format($provider[$rate_field], 2); ?> 
                                <?php echo $rate_type; ?>
                            </strong>
                        </div>
                    </div>

                    <!-- Date Selection -->
                    <div class="form-group mb-4">
                        <label for="booking_date" class="form-label">Select Service Date:</label>
                        <input type="date" id="booking_date" class="form-control" 
                               min="<?php echo date('Y-m-d'); ?>" required>
                    </div>

                    <!-- Payment Form -->
                    <form id="payment-form">
                        <div class="mb-4">
                            <label class="form-label">Card Information:</label>
                            <div id="card-element" class="form-control">
                                <!-- Stripe Card Element will be inserted here -->
                            </div>
                            <div id="card-errors" class="text-danger mt-2 small"></div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100" id="submit-button">
                            <i class="fa fa-lock me-2"></i>Pay ৳<?php echo number_format($provider[$rate_field], 2); ?>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Test Card Info -->
            <div class="card mt-3 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-muted">Test Card Information</h6>
                    <p class="card-text small mb-0">
                        Card Number: 4242 4242 4242 4242<br>
                        Expiry: Any future date<br>
                        CVC: Any 3 digits
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>

<script>
// Initialize Stripe
const stripe = Stripe('pk_test_51QLLqbJcVq5mfW9UuULwTh36xX4C0tEYKKVp7W4AF7RbPCR46NHHcVR9N5LrGmh5zcWnQukTdFXMQl0v867TdrqQ00ZDiRsvQ3');

// Create an instance of Elements
const elements = stripe.elements();

// Create the card Element
const cardElement = elements.create('card', {
    style: {
        base: {
            fontSize: '16px',
            color: '#32325d',
        },
    }
});

// Add an instance of the card Element into the `card-element` <div>
cardElement.mount('#card-element');

// Handle form submission
const form = document.getElementById('payment-form');
const submitButton = document.getElementById('submit-button');
const errorElement = document.getElementById('card-errors');

form.addEventListener('submit', async (event) => {
    event.preventDefault();
    submitButton.disabled = true;
    errorElement.textContent = '';

    const bookingDate = document.getElementById('booking_date').value;
    if (!bookingDate) {
        errorElement.textContent = 'Please select a service date';
        submitButton.disabled = false;
        return;
    }

    try {
        const result = await stripe.confirmCardPayment('<?php echo $intent->client_secret; ?>', {
            payment_method: {
                card: cardElement,
                billing_details: {
                    name: '<?php echo htmlspecialchars($_SESSION['auth_user']['username'], ENT_QUOTES); ?>'
                }
            }
        });

        if (result.error) {
            // Handle error
            errorElement.textContent = result.error.message;
            submitButton.disabled = false;
        } else if (result.paymentIntent.status === 'succeeded') {
            // Payment successful
            const paymentData = {
                payment_intent_id: result.paymentIntent.id,
                provider_id: '<?php echo $provider_id; ?>',
                provider_type: '<?php echo $provider_type; ?>',
                amount: <?php echo $amount; ?>,
                booking_date: bookingDate
            };

            try {
                const response = await fetch('process_payment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(paymentData)
                });

                let data;
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    data = await response.json();
                } else {
                    // If response is not JSON, get the text and show error
                    const text = await response.text();
                    console.error('Invalid response:', text);
                    throw new Error('Invalid server response');
                }
                
                if (data.success) {
                    window.location.href = 'payment_success.php?id=' + data.payment_id;
                } else {
                    throw new Error(data.message || 'Payment processing failed');
                }
            } catch (error) {
                console.error('Payment error:', error);
                errorElement.textContent = error.message || 'Error processing payment. Please try again.';
                submitButton.disabled = false;
            }
        } else {
            errorElement.textContent = 'Payment processing failed. Please try again.';
            submitButton.disabled = false;
        }
    } catch (error) {
        errorElement.textContent = error.message || 'Error processing payment. Please try again.';
        submitButton.disabled = false;
    }
});

// Handle real-time validation errors on the card Element
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        errorElement.textContent = event.error.message;
    } else {
        errorElement.textContent = '';
    }
});
</script>

<style>
.card {
    border: none;
    border-radius: 15px;
}

.service-summary {
    background: #f8f9fa;
}

#card-element {
    padding: 12px;
    border: 1px solid #ced4da;
    border-radius: 8px;
}

.btn-lg {
    padding: 12px 24px;
    font-size: 16px;
    border-radius: 8px;
}

.form-control {
    padding: 12px;
    border-radius: 8px;
}

.form-label {
    font-weight: 500;
    color: #495057;
}
</style>

<?php 
include('includes/footer.php');
ob_end_flush();
?>