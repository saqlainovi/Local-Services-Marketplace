<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Get the raw POST data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!isset($data['message'])) {
    echo json_encode(['response' => 'Error: No message provided']);
    exit;
}

$message = strtolower(trim($data['message']));

// Define knowledge base
$knowledge = [
    // General information
    'hello' => 'Hello! How can I assist you with our local service provider platform?',
    'hi' => 'Hi there! How can I help you today?',
    'hey' => 'Hey! What can I help you with?',
    'bye' => 'Goodbye! Feel free to come back if you have more questions.',
    
    // About the platform
    'what is this' => 'This is a Local Service Provider platform where you can find and hire various service professionals like painters, plumbers, electricians, and more.',
    'how does it work' => 'You can browse available service providers, view their profiles, check their ratings and reviews, and hire them directly through our platform.',
    'about' => 'We are a platform connecting skilled service providers with customers who need their services. Our providers are verified and rated by real customers.',
    
    // Services
    'services' => 'We offer various services including painting, plumbing, electrical work, carpentry, cleaning, and more. What service are you looking for?',
    'painter' => 'Our platform has qualified painters with various experience levels. You can view their profiles, check their availability, and hire them based on your needs.',
    'plumber' => 'We have experienced plumbers available. You can check their profiles, reviews, and hire them instantly.',
    'electrician' => 'Need an electrician? Our platform has verified electricians with proper certifications.',
    
    // Booking process
    'how to book' => 'To book a service: 1. Browse available providers 2. Check their profiles and reviews 3. Click "Hire Now" 4. Fill in your requirements 5. Confirm the booking',
    'booking' => 'Booking is easy! Just find a service provider you like, click "Hire Now", and follow the simple booking process.',
    'payment' => 'We accept various payment methods. Payment is processed securely through our platform after the service is completed.',
    
    // Account related
    'create account' => 'To create an account, click on the "Login" button and select "Register". Fill in your details to get started.',
    'login' => 'You can login using your email and password. If you don\'t have an account, you can easily create one.',
    'register' => 'Registration is free! Click the Login button and choose Register to create your account.',
    
    // Reviews and ratings
    'reviews' => 'Each service provider has reviews and ratings from previous customers. This helps you make an informed decision.',
    'rating' => 'You can rate and review service providers after the service is completed. This helps other users make better choices.',
    
    // Support
    'help' => 'I can help you with finding services, booking process, account management, and general information. What do you need help with?',
    'contact' => 'For additional support, you can reach our team through the contact form or email at support@localservice.com',
    'support' => 'Need help? You can contact our support team 24/7 through email or the contact form.',
    
    // Pricing
    'price' => 'Prices vary depending on the service provider and the scope of work. Each provider lists their rates on their profile.',
    'cost' => 'Service costs vary by provider. You can view detailed pricing on each provider\'s profile page.',
    'how much' => 'Each service provider sets their own rates. You can find detailed pricing information on their individual profiles.',
];

// Function to find best matching response
function findResponse($message, $knowledge) {
    $bestMatch = null;
    $highestScore = 0;
    
    // First, check for exact matches
    if (isset($knowledge[$message])) {
        return $knowledge[$message];
    }
    
    // Then check for partial matches
    foreach ($knowledge as $key => $response) {
        // Check if message contains the key
        if (strpos($message, $key) !== false) {
            return $response;
        }
        
        // Calculate similarity
        similar_text(strtolower($message), $key, $percent);
        if ($percent > $highestScore) {
            $highestScore = $percent;
            $bestMatch = $response;
        }
    }
    
    // If no good match found (threshold at 50%)
    if ($highestScore < 50) {
        return "I'm not sure about that. Could you please rephrase your question? You can ask about our services, booking process, or how to find service providers.";
    }
    
    return $bestMatch;
}

// Get response
$response = findResponse($message, $knowledge);

// Return JSON response
echo json_encode(['response' => $response]);
?> 