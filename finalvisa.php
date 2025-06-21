<?php
// Static data for visa types
get_header();

// Define the booking options
$bookingOptions = [
    [
        'id' => 'hotel',
        'icon' => 'fa-hotel',
        'text' => 'Book Hotel',
        'action' => 'popup',
        'target' => 'hotel'
    ],
    [
        'id' => 'flight',
        'icon' => 'fa-plane',
        'text' => 'Book Flight',
        'action' => 'popup',
        'target' => 'flight'
    ],
    [
        'id' => 'car',
        'icon' => 'fa-car',
        'text' => 'Car Hire',
        'action' => 'popup',
        'target' => 'car'
    ],
    [
        'id' => 'trip',
        'icon' => 'fa-route',
        'text' => 'Plan Trip',
        'action' => 'redirect',
        'target' => 'https://chat.saathi.app',
        'new_window' => true
    ]
];

$visa_types = [
    [
        'type' => '48 Hours Transit Visa',
        "ideal_for" => "Indian passport holders who want to visit Kuwait for tourism, sightseeing or leisure",
        'processing_time' => 'Upto 5 days',
        'stay_period' => '2 days',
        'validity' => '30 days',
        'entry' => 'Single',
        'fees' => 'INR 1,999/-'
    ],
    [
        'type' => '30 Days Tourist Visa',
        "ideal_for" => "Indian passport holders who want to visit Kuwait for tourism, sightseeing or leisure",
        'processing_time' => 'Upto 5 days',
        'stay_period' => '30 days',
        'validity' => '58 days',
        'entry' => 'Single',
        'fees' => 'INR 7,799/-'
    ],
    [
        'type' => '30 Days Family Tourist Visa',
        'ideal_for' => '(Includes 2 Adults + 1 Child)',
        'processing_time' => 'Upto 5 days',
        'stay_period' => '30 days',
        'validity' => '58 days',
        'entry' => 'Single',
        'fees' => 'INR 19,499/-'
    ],
    [
        'type' => '96 Hours Transit Visa',
        'ideal_for' => 'Indian passport holders wishing to enter Somalia for tourism, business, short visits etc',
        'processing_time' => 'Upto 5 days',
        'stay_period' => '4 days',
        'validity' => '30 days',
        'entry' => 'Single',
        'fees' => 'INR 2,999/-'
    ],
    [
        'type' => '14 Days Tourist Visa',
        'processing_time' => 'Upto 5 days',
        'stay_period' => '14 days',
        'validity' => '58 days',
        'entry' => 'Single',
        'fees' => 'INR 7,499/-'
    ],
    [
        'type' => '30 Days Tourist Visa (Express)',
        'processing_time' => 'Upto 48 hours',
        'stay_period' => '30 days',
        'validity' => '58 days',
        'entry' => 'Single',
        'fees' => 'INR 8,999/-'
    ],
    [
        'type' => '60 Days Tourist Visa',
        'processing_time' => 'Upto 5 days',
        'stay_period' => '60 days',
        'validity' => '58 days',
        'entry' => 'Single',
        'fees' => 'INR 13,499/-'
    ],
    [
        'type' => '30 Days Multiple Entry Tourist Visa',
        'processing_time' => 'Upto 5 days',
        'stay_period' => '30 days',
        'validity' => '58 days',
        'entry' => 'Multiple',
        'fees' => 'INR 17,999/-'
    ]
];

// Documents required
$documents = [
    "must_have" => [
        "Scanned colour copy of first and last page of your valid Passport",
        "Scanned colour copy of your passport size photograph with white background",
        "Confirmed return air ticket (required for Ok to Board processing)"
    ],
    "supporting_documents" => [
        [
            "title" => "1. If Employed:",
            "items" => [
                "Leave Sanctioned Certificate: with company seal providing approval for leave",
                "Salary Slips: of last 3 months"
            ]
        ],
        [
            "title" => "2. If Self-Employed:",
            "items" => [] // Example: empty items
        ]
    ]
];

// Process steps
$steps = [
    "Pay online via our secure payment gateway",
    "Upload your documents",
    "We verify and submit your documents",
    "Receive your Visa"
];


// FAQs
$faqs = [
    [
        'question' => 'Do I need Tourist visa for `Country` from India?',
        'answer' => 'Yes, all Indian passport holders require a visa to visit `Country`. A `Country` tourist visa for is most appropriate for Indians travelling to the UAE for recreational purposes such as holidaying, sightseeing, or even short family visits. The type of `Country` visa for Indians will depend on several factors such as nationality, purpose of your planned visit and duration. Indian passport holders travelling to UAE for tourist purposes can apply for `Country` visa online. Once your tourist visa for `Country` from India is approved, you will receive the approved visa copy via email.'
    ],
    [
        'question' => 'Can I get `Country` Visa on Arrival?',
        'answer' => 'No, Indian passport holders cannot get a visa on arrival in `Country`. You must apply for and receive your visa before traveling to `Country`.'
    ],
    [
        'question' => 'How do I get a `Country` Visa for Indians?',
        'answer' => 'You can apply for a `Country` visa online through our website. Select the appropriate visa type, fill in the required details, upload the necessary documents, and make the payment. Once approved, you will receive your visa via email.'
    ],
    [
        'question' => 'What are the `Country` Visa requirements for Indians?',
        'answer' => 'The basic requirements include a valid passport with at least 6 months validity, passport-sized photographs with white background, confirmed return air tickets, and completed application form.'
    ],
    [
        'question' => 'What is the eligibility criteria for getting a Tourist Visa for `Country` from India?',
        'answer' => 'To be eligible for a `Country` tourist visa, you must have a valid passport with at least 6 months validity, confirmed return tickets, and sufficient funds to support your stay in `Country`.'
    ],
    [
        'question' => 'What is the `Country` Visa price?',
        'answer' => 'The `Country` visa price varies depending on the type and duration of the visa. For example, a 30-day tourist visa costs INR 7,799/-, while a 14-day tourist visa costs INR 7,499/-. Please check our visa types section for detailed pricing.'
    ]
];

// Get active tab from URL parameter or default to 'types-of-visas'
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'types-of-visas';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>`Country` Visa for Indians</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    </noscript>
    <meta name="description" content="Apply online for your `Country` visa from India with ease. We ensure you get your visa on time through a quick and simple application process, fast approvals, and reliable support." />
    <meta name="keywords" content="`Country`,apply `Country` visa online,how to apply for `Country` visa,`Country` visa requirements,`Country` tourist" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="`Country` Visa for Indians: Fees, Requirements, and Process" />
    <meta property="og:description" content="Apply online for your `Country` visa from India with ease. We ensure you get your visa on time through a quick and simple application process, fast approvals, and reliable support." />
    <meta property="og:type" content="article" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="`Country` Visa for Indians: Fees, Requirements, and Process" />
    <meta name="twitter:description" content="Apply online for your `Country` visa from India with ease. We ensure you get your visa on time through a quick and simple application process, fast approvals, and reliable support." />
</head>

<style>
    /* Reset and Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
        scroll-padding-top: 150px;
    }

    body {
        background-color: #f8fcfd;
        color: #333;
    }

     .country-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        padding-right: 320px;
    }
    .container{
        padding: 0px 0px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 0;
        position: relative;
        flex-wrap: wrap;
        /* important for responsiveness */
    }

    .header-content,
    .header-image {
        flex: 1 1 50%;
        /* grow-shrink-basis */
        padding: 10px;
        box-sizing: border-box;
    }

    .header-content {
        max-width: 600px;
    }

    .header-image {
        text-align: right;
    }

    .header-image img {
        width: 100%;
        max-width: 500px;
        /* control max width on large screens */
        height: auto;
        border-radius: 8px;
    }

    .title {
        font-size: 36px;
        color: #222;
        margin-bottom: 20px;
    }

    .badge {
        background-color: #A093FF;
        color: white;
        padding: 8px 15px;
        border-radius: 50px;
        display: inline-block;
        margin-bottom: 20px;
        position: relative;
        font-size: 14px;
    }

    .badge img {
        margin-right: 8px;
    }

    /* .badge::after {
        content: '';
        position: absolute;
        right: -15px;
        top: 0;
        width: 0;
        height: 0;
        border-top: 17px solid transparent;
        border-bottom: 17px solid transparent;
        border-left: 15px solid #A093FF;
    } */

    .info-box {
        margin-bottom: 15px;
    }

    .info-label {
        color: #777;
        font-size: 14px;
    }

    .info-value {
        font-size: 24px;
        font-weight: bold;
        color: #6a5acd;
    }

    /* Responsive Design for Mobile */
    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            text-align: center;
        }

        .header-content,
        .header-image {
            flex: 1 1 100%;
            max-width: 100%;
        }

        .header-image {
            text-align: center;
        }

        .title {
            font-size: 28px;
        }

        .header-image img {
            width: 90%;
            max-width: 300px;
            margin-top: 20px;
        }

        .badge {
            font-size: 12px;
        }
    }

    /* Tabs Navigation */
    .tabs {
        display: flex;
        background-color: #f0f2f5;
        border-bottom: 2px solid #A093FF;
        overflow-x: auto;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
        position: sticky;
        top: 77px;
        z-index: 100;
        padding: 0 20px;
    }

    .tab {
        padding: 15px 20px;
        text-decoration: none;
        color: #333;
        font-weight: 500;
        position: relative;
        transition: all 0.3s ease;
    }

    .tab.active {
        color: #6a5acd;
        border-bottom: 3px solid #6a5acd;
    }

    .tab:hover {
        background-color: #e9ecef;
    }

    /* Content Section */
    .content {
        padding: 20px 0;
    }

    .section {
        padding: 40px 0;
        border-bottom: 1px solid #ddd;
    }

    .section:last-child {
        border-bottom: none;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #6a5acd;
        padding-left: 20px;
    }

    /* Types of Visas Section */
    .visa-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 0 20px;
    }

    .visa-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        position: relative;
        overflow: hidden;
        border: 1px solid #A093FF;
    }

    .popular-tag {
        position: absolute;
        top: 10px;
        right: -30px;
        background-color: #7c7cff;
        color: white;
        padding: 5px 30px;
        transform: rotate(45deg);
        font-size: 12px;
        font-weight: bold;
    }

    .visa-card h3 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #6a5acd;
    }

    .subtitle {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
    }

    .visa-details {
        margin-top: 15px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .detail-label {
        color: #666;
    }

    .detail-value {
        font-weight: 500;
        color: #333;
    }

    .fees {
        margin-top: 10px;
    }

    .fees .detail-value {
        color: #6a5acd;
        font-weight: bold;
        font-size: 18px;
    }

    /* Documents Section */
    .documents-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 0 20px;
        border: 1px solid #A093FF;
    }

    .document-box h3 {
        font-size: 18px;
        margin-bottom: 15px;
        color: #6a5acd;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    .document-list {
        list-style-type: none;
    }

    .document-list li {
        padding: 10px 0;
        position: relative;
        padding-left: 25px;
    }

    .document-list li:before {
        content: "•";
        color: #8077f3;
        font-size: 20px;
        position: absolute;
        left: 0;
        top: 8px;
    }

    /* Timeline Styles */
    .process-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
    }

    .timeline-sidebar {
        width: 80px;
        background-color: #f0f2f5;
        border-radius: 15px;
        padding: 20px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .timeline-content {
        flex: 1;
        padding: 20px 0 20px 20px;
    }

    .timeline-item {
        display: flex;
        margin-bottom: 50px;
        position: relative;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        z-index: 2;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .timeline-icon.active {
        background-color: #6a5acd;
        color: white;
    }

    .timeline-icon.completed {
        background-color: #8077f3;
        color: white;
    }

    .timeline-line {
        position: absolute;
        top: 50px;
        left: 25px;
        width: 2px;
        height: calc(100% + 50px);
        background-color: #A093FF;
        z-index: 1;
    }

    .timeline-item:last-child .timeline-line {
        display: none;
    }

    .timeline-text {
        padding-left: 30px;
        padding-top: 10px;
    }

    .timeline-text h3 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #222;
    }

    .timeline-text p {
        color: #555;
        line-height: 1.5;
    }

    .timeline-date {
        color: #6a5acd;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .receive-visa h3 {
        color: #8077f3;
    }

    .receive-visa p {
        color: #8077f3;
    }

    /* FAQs Section */
    .faqs-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 0 20px;
        border: 1px solid #A093FF;
    }

    .faq-item {
        border-bottom: 1px solid #eee;
    }

    .faq-question {
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        font-weight: 500;
    }

    .toggle-btn {
        background: none;
        border: none;
        color: #6a5acd;
        font-size: 16px;
        cursor: pointer;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .faq-answer {
        padding: 0 20px 20px;
        display: none;
        line-height: 1.6;
        color: #666;
    }

    .faq-item.active .faq-answer {
        display: block;
    }

    .apply-online-modal {
        position: fixed;
        top: 100px;
        right: 20px;
        width: 300px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        border: 1px solid #A093FF;
    }

    .timer-badge {
        background-color: #7c7cff;
        color: white;
        padding: 10px;
        border-radius: 8px 8px 0 0;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
    }

    .timer-badge i {
        font-size: 18px;
    }

    .apply-form-container {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .form-header h3 {
        color: #6a5acd;
        font-size: 18px;
    }

    .toggle-form-btn {
        background: none;
        border: none;
        color: #6a5acd;
        cursor: pointer;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #A093FF;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-group.price {
        text-align: right;
        font-size: 18px;
        font-weight: bold;
        color: #6a5acd;
    }

    .apply-now-btn {
        width: 100%;
        padding: 12px;
        background-color: #6a5acd;
        color: white;
        border: none;
        border-radius: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-btn {
        background: #8077f3;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 15px;
        border-radius: 25px;
        background: linear-gradient(225.06deg, #6a5acd 0%, #8077f3 100%);
        height: auto !important;
        padding: 6px 30px !important;
        line-height: 39px !important;
        border: none;
    }

    .apply-now-btn:hover {
        background-color: #8077f3;
    }

    .call-us-section {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .call-us-btn {
        width: 100%;
        padding: 10px;
        background: none;
        border: 1px solid #A093FF;
        border-radius: 4px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        color: #6a5acd;
    }

    .contact-options {
        padding: 15px;
        background-color: #6a5acd;
        color: white;
        border-radius: 0 0 8px 8px;
    }

    .whatsapp-option,
    .call-option,
    .timing {
        margin-bottom: 10px;
    }

    .whatsapp-option span,
    .call-option span,
    .timing span:first-child {
        display: block;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .whatsapp-option a,
    .call-option a {
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .whatsapp-option i,
    .call-option i {
        font-size: 18px;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
         .country-container {
            padding-right: 0;
        }

        .apply-online-modal {
            position: static;
            width: 100%;
            margin: 20px;
            width: calc(100% - 40px);
        }

        .visa-cards {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }

        .process-steps {
            flex-direction: column;
            align-items: flex-start;
            gap: 30px;
        }

        .process-step {
            width: 100%;
            flex-direction: row;
            text-align: left;
            gap: 20px;
        }

        .step-connector {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .tabs {
            flex-wrap: nowrap;
            overflow-x: auto;
        }

        .tab {
            padding: 10px 15px;
            font-size: 14px;
        }

        .visa-cards {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    }



    .floating-buttons-container {
        position: fixed;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 1000;
    }

    .floating-button {
        display: flex;
        align-items: center;
        background-color: #6a5acd;
        color: white;
        border-radius: 50px;
        padding: 12px;
        text-decoration: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        overflow: hidden;
        width: 50px;
        height: 50px;
        cursor: pointer;
    }

    .button-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 26px;
        height: 26px;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    .button-text {
        white-space: nowrap;
        opacity: 0;
        max-width: 0;
        transition: all 0.3s ease;
        margin-left: 0;
        font-weight: 500;
    }

    .floating-button:hover {
        width: auto;
        padding: 12px 20px;
        transform: scale(1.05);
        background-color: #8077f3;
    }

    .floating-button:hover .button-icon {
        margin-right: 10px;
    }

    .floating-button:hover .button-text {
        opacity: 1;
        max-width: 150px;
        margin-left: 5px;
    }

    .floating-button:active {
        transform: scale(0.95);
    }

    /* Custom colors for each button */
    #hotel-btn {
        background-color: #6a5acd;
    }

    #flight-btn {
        background-color: #7c7cff;
    }

    #trip-btn {
        background-color: #A093FF;
    }

    /* Popup Styles */
    .booking-popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 2000;
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background-color: white;
        width: 90%;
        max-width: 800px;
        max-height: 90vh;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
    }

    .popup-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background-color: #6a5acd;
        color: white;
    }

    .popup-header h3 {
        margin: 0;
        font-size: 18px;
    }

    .close-popup {
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        padding: 0;
        line-height: 1;
    }

    .popup-body {
        padding: 20px;
        overflow-y: auto;
        flex-grow: 1;
        max-height: calc(90vh - 60px);
    }

    /* Animation for popup */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .booking-popup.active {
        display: flex;
        animation: fadeIn 0.3s ease-out;
    }

    .booking-popup.active .popup-content {
        animation: slideIn 0.3s ease-out;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .floating-buttons-container {
            left: 10px;
        }

        .floating-button {
            width: 45px;
            height: 45px;
            padding: 10px;
        }

        .button-icon {
            font-size: 16px;
        }

        .popup-content {
            width: 95%;
            max-height: 95vh;
        }

        .popup-body {
            max-height: calc(95vh - 60px);
        }
    }

    .floating-button.hovered {
        width: auto;
        padding: 12px 20px;
        transform: scale(1.05);
        background-color: #8077f3;
    }

    .floating-button.hovered .button-icon {
        margin-right: 10px;
    }

    .floating-button.hovered .button-text {
        opacity: 1;
        max-width: 150px;
        margin-left: 5px;
    }
</style>

<body>

    <!-- Add this HTML code right after the opening <body> tag -->
    <!-- Add this HTML code right after the opening <body> tag -->
    <div class="floating-buttons-container">
        <?php foreach ($bookingOptions as $option): ?>
            <a href="javascript:void(0);"
                class="floating-button"

                id="<?php echo $option['id']; ?>-btn"
                data-action="<?php echo $option['action']; ?>"
                data-target="<?php echo $option['target']; ?>"
                <?php if (isset($option['new_window']) && $option['new_window']): ?>
                data-new-window="true"
                <?php endif; ?>>
                <div class="button-icon">
                    <i class="fas <?php echo $option['icon']; ?>"></i>
                </div>
                <div class="button-text">
                    <?php echo $option['text']; ?>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Popup for Skyscanner Widget -->
    <div id="booking-popup" class="booking-popup">
        <div class="popup-content">
            <div class="popup-header">
                <h3 id="popup-title">Get Best Deals</h3>
                <button class="close-popup">&times;</button>
            </div>
            <div class="popup-body">
                <!-- Skyscanner Widget will be loaded here -->
                <div id="skyscanner-widget-container">
                    <div
                        data-skyscanner-widget="MultiVerticalWidget"
                        data-locale="en-GB"
                        data-market="IN"
                        data-currency="INR"
                        data-media-partner-id="6181006"
                        data-utm-term="saathivisa"
                        data-button-colour="#6A5ACD"
                        data-z-index="500"
                        data-responsive="true"
                        data-verticals-default-tab="flights"
                        data-origin-geo-lookup="true"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="country-container">
        <!-- Header Section -->
        <div class="header">
            <div class="header-content">
                <h1 class="title">`Country` Visa Online</h1>
                <div class="badge">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgZmlsbD0iI2ZmZiIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBkPSJNMTAuOTcgNC45N2EuNzUuNzUgMCAwIDEgMS4wNyAxLjA1bC0zLjk5IDQuOTlhLjc1Ljc1IDAgMCAxLTEuMDguMDJMNC4zMjQgOC4zODRhLjc1Ljc1IDAgMSAxIDEuMDYtMS4wNmwyLjA5NCAyLjA5MyAzLjQ3My00LjQyNWEuNzY3Ljc2NyAwIDAgMSAuMDItLjAyMnoiLz48L3N2Zz4=" alt="Check" style="width: 16px; height: 16px; vertical-align: middle;">
                    `Random`% visas Approved before Time
                </div>

                <div class="info-box">
                    <div class="info-label">Processing time</div>
                    <div class="info-value">`ProcessingTime`</div>
                </div>

                <div class="info-box">
                    <div class="info-label">Starting from</div>
                    <div class="info-value">`Price`</div>
                </div>
            </div>

            <div class="header-image">
                <?php
                $imageUrl = "https://images-storage234.s3.ap-south-1.amazonaws.com/thumbnails/`image_url`";
                $defaultImage = "https://images-storage234.s3.ap-south-1.amazonaws.com/images/France.jpg"; // Replace with your actual default image URL

                echo '<img src="' . $imageUrl . '" alt="`Country` Skyline" onerror="this.onerror=null;this.src=\'' . $defaultImage . '\';">';
                ?>
            </div>
        </div>
        <!-- Navigation Tabs -->
        <div class="tabs" id="tabs">
            <a href="#types-of-visas" class="tab active" data-section="types-of-visas">Types Of Visas</a>
            <a href="#documents" class="tab" data-section="documents">Documents</a>
            <a href="#process" class="tab" data-section="process">Process</a>
            <a href="#faqs" class="tab" data-section="faqs">FAQs</a>
        </div>

        <!-- Content Section -->
        <div class="content">
            <!-- Apply Online Modal (Fixed) -->
            <div class="apply-online-modal">
                <div class="timer-badge">
                    <i class="fas fa-clock"></i>
                    <span>It takes less than 2 minutes to Apply</span>
                </div>
                <div class="apply-form-container">
                    <div class="form-header">
                        <h3>Apply Online</h3>
                        <button class="toggle-form-btn">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>

                    <div class="apply-form">
                        <form id="applyForm" action="#" method="post">
                            <div class="form-group">
                                <input type="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email ID" required>
                            </div>
                            <div class="form-group">
                                <input type="number" name="contact" placeholder="Contact No" required>
                            </div>
                            <div class="form-group">
                                <select name="visa_type" required>
                                    <option value="" disabled selected>Visa type</option>
                                    <?php foreach ($visa_types as $visa): ?>
                                        <option value="<?php echo $visa['type']; ?>"><?php echo $visa['type']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="travelers" required>
                                    <option value="" disabled selected>Travellers</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submitBtn" class="apply-now-btn">APPLY NOW</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="call-us-section">
                    <button class="call-us-btn">
                        <span>Let us Call You</span>
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="contact-options">
                    <div class="whatsapp-option">
                        <span>Visa on whatsapp</span>
                        <a href="https://wa.me/+919148879226">
                            <i class="fab fa-whatsapp"></i>
                            +91 9148879226
                        </a>
                    </div>
                    <div class="call-option">
                        <span>Call us on</span>
                        <a href="tel:+919148879226">
                            <i class="fas fa-phone"></i>
                            +91 9148879226
                        </a>
                    </div>
                    <div class="timing">
                        <span>Timing</span>
                        <span>9am to 9pm</span>
                    </div>
                </div>
            </div>
            <!-- Types of Visas Section -->
            <div class="section" id="types-of-visas">
                <h2>Types of `Country` Visas for Indians</h2>
                <div class="visa-cards">
                    <?php foreach ($visa_types as $visa): ?>
                        <div class="visa-card">
                            <h3><?php echo $visa['type']; ?></h3>
                            <?php if (isset($visa['ideal_for'])): ?>
                                <p class="subtitle"><?php echo $visa['ideal_for']; ?></p>
                            <?php endif; ?>
                            <div class="visa-details">
                                <div class="detail-row">
                                    <span class="detail-label">Processing time:</span>
                                    <span class="detail-value"><?php echo $visa['processing_time']; ?></span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Stay period:</span>
                                    <span class="detail-value"><?php echo $visa['stay_period']; ?></span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Validity:</span>
                                    <span class="detail-value"><?php echo $visa['validity']; ?></span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Entry:</span>
                                    <span class="detail-value"><?php echo $visa['entry']; ?></span>
                                </div>
                                <div class="detail-row fees">
                                    <span class="detail-label">Fees:</span>
                                    <span class="detail-value"><?php echo $visa['fees']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Documents Section -->
            <!-- Documents Section -->
            <div class="section" id="documents">
                <h2>Documents required for `Country` Visa for Indians</h2>
                <div class="documents-container">

                    <!-- Must Have Documents -->
                    <div class="document-box">
                        <h3>Must Have Documents for `Country` Tourist Visa:</h3>
                        <ul class="document-list">
                            <?php foreach ($documents['must_have'] as $document): ?>
                                <li><?php echo htmlspecialchars($document); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Supporting Documents -->
                    <?php
                    $hasSupportingDocuments = false;

                    // First check: does at least one support item have non-empty 'items'?
                    if (!empty($documents['supporting_documents'])) {
                        foreach ($documents['supporting_documents'] as $supporting) {
                            if (!empty($supporting['items'])) {
                                $hasSupportingDocuments = true;
                                break;
                            }
                        }
                    }
                    ?>

                    <?php if ($hasSupportingDocuments): ?>
                        <div class="document-box" style="margin-top: 30px;">
                            <h3>Supporting Documents:</h3>

                            <?php foreach ($documents['supporting_documents'] as $supporting): ?>
                                <?php if (!empty($supporting['items'])): ?>
                                    <h4 style="font-size: 16px; color: #1d2b45; margin-top: 20px;"><?php echo htmlspecialchars($supporting['title']); ?></h4>
                                    <ul class="document-list">
                                        <?php foreach ($supporting['items'] as $item): ?>
                                            <li><?php echo htmlspecialchars($item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <!-- Process Section -->
            <!-- Process Section -->
            <div class="section" id="process">
                <h2>Applying for `Country` Tourist Visa through us is this simple</h2>
                <div class="process-container">

                    <!-- Timeline Sidebar for steps numbering -->
                    <div class="timeline-sidebar">
                        <?php foreach ($steps as $index => $step): ?>
                            <div class="timeline-icon <?php echo ($index === count($steps) - 1) ? 'completed' : ''; ?>">
                                <?php echo $index + 1; ?>
                            </div>
                            <?php if ($index < count($steps) - 1): ?>
                                <div style="flex-grow: 1; width: 2px; background-color: #A093FF; margin: 5px 0;"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <!-- Timeline Content for steps title and description -->
                    <div class="timeline-content">
                        <?php foreach ($steps as $index => $step): ?>
                            <div class="timeline-item <?php echo ($index === count($steps) - 1) ? 'receive-visa' : ''; ?>">
                                <div class="timeline-text">
                                    <h3>Step <?php echo $index + 1; ?></h3>
                                    <p><?php echo htmlspecialchars($step); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

            <!-- FAQs Section -->
            <div class="section" id="faqs">
                <h2>`Country` Visa FAQs</h2>
                <div class="faqs-container">
                    <?php foreach ($faqs as $index => $faq): ?>
                        <div class="faq-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="faq-question">
                                <span><?php echo $faq['question']; ?></span>
                                <button class="toggle-btn">
                                    <i class="fas <?php echo $index === 0 ? 'fa-minus' : 'fa-plus'; ?>"></i>
                                </button>
                            </div>
                            <div class="faq-answer" <?php echo $index === 0 ? 'style="display: block;"' : ''; ?>>
                                <p><?php echo $faq['answer']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Other sections would go here -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab Navigation
            const tabs = document.querySelectorAll('.tab');

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));

                    // Add active class to clicked tab
                    this.classList.add('active');

                    // Get the target section
                    const targetId = this.getAttribute('href');
                    const targetSection = document.querySelector(targetId);

                    // Scroll to the target section
                    if (targetSection) {
                        targetSection.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Highlight active tab on scroll
            window.addEventListener('scroll', function() {
                const sections = document.querySelectorAll('.section');
                const scrollPosition = window.scrollY + 100; // Add offset for the sticky header

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    const sectionId = section.getAttribute('id');

                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        // Remove active class from all tabs
                        tabs.forEach(tab => tab.classList.remove('active'));

                        // Add active class to the corresponding tab
                        const activeTab = document.querySelector(`.tab[href="#${sectionId}"]`);
                        if (activeTab) {
                            activeTab.classList.add('active');
                        }
                    }
                });
            });

            // FAQ Toggle
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const questionBtn = item.querySelector('.faq-question');
                const toggleBtn = item.querySelector('.toggle-btn');

                questionBtn.addEventListener('click', function() {
                    // Toggle active class on the clicked item
                    item.classList.toggle('active');

                    // Update the icon
                    const icon = toggleBtn.querySelector('i');
                    if (item.classList.contains('active')) {
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus');
                    } else {
                        icon.classList.remove('fa-minus');
                        icon.classList.add('fa-plus');
                    }

                    // Toggle display of answer
                    const answer = item.querySelector('.faq-answer');
                    if (item.classList.contains('active')) {
                        answer.style.display = 'block';
                    } else {
                        answer.style.display = 'none';
                    }
                });
            });

            // Apply Form Toggle
            const toggleFormBtn = document.querySelector('.toggle-form-btn');
            const applyForm = document.querySelector('.apply-form');

            if (toggleFormBtn && applyForm) {
                toggleFormBtn.addEventListener('click', function() {
                    const isVisible = applyForm.style.display !== 'none';
                    applyForm.style.display = isVisible ? 'none' : 'block';

                    const icon = toggleFormBtn.querySelector('i');
                    if (isVisible) {
                        icon.classList.remove('fa-minus');
                        icon.classList.add('fa-plus');
                    } else {
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus');
                    }
                });
            }

            // Call Us Button Toggle
            const callUsBtn = document.querySelector('.call-us-btn');
            const callUsForm = document.createElement('div');
            callUsForm.className = 'call-us-form';
            callUsForm.innerHTML = `
                <form>
                    <div class="form-group">
                        <input type="text" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" placeholder="Your Phone Number" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="submit-btn">Submit</button>
                    </div>
                </form>
            `;
            callUsForm.style.display = 'none';

            if (callUsBtn) {
                const callUsSection = document.querySelector('.call-us-section');
                callUsSection.appendChild(callUsForm);

                callUsBtn.addEventListener('click', function() {
                    const isVisible = callUsForm.style.display !== 'none';
                    callUsForm.style.display = isVisible ? 'none' : 'block';

                    const icon = callUsBtn.querySelector('i');
                    if (isVisible) {
                        icon.classList.remove('fa-minus');
                        icon.classList.add('fa-plus');
                    } else {
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus');
                    }
                });
            }

            // Fixed Apply Online Modal on Scroll
            const applyOnlineModal = document.querySelector('.apply-online-modal');

            if (applyOnlineModal && window.innerWidth > 992) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 100) {
                        applyOnlineModal.style.top = '20px';
                    } else {
                        applyOnlineModal.style.top = (100 - window.scrollY) + 'px';
                    }
                });
            }
        });

        document.getElementById('applyForm').addEventListener('submit', async function(e) {
            e.preventDefault(); // Prevent normal form submission

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Applying...';

            // Get form values
            const name = this.name.value;
            const email = this.email.value;
            const phone = this.contact.value;
            const visaType = this.visa_type.value;
            const numberTravellers = this.travelers.value;
            const pathParts = window.location.pathname.split('/');
            const countryFromURL = pathParts.filter(p => p.trim() !== '').pop();

            const body = JSON.stringify({
                name: name,
                email: email,
                phone: phone,
                number_travellers: parseInt(numberTravellers),
                travel_reason: visaType,
                country: countryFromURL
            });

            try {
                const response = await fetch('https://saathi-visa-backend.vercel.app/submit', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: body,
                });

                if (response.ok) {
                    console.log("Application submitted successfully!");
                    console.log(await response.text());
                    submitBtn.textContent = 'Applied';
                } else {
                    alert("Failed to submit application.");
                    console.error(await response.text());
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Apply';
                }
            } catch (error) {
                console.error("Error submitting application:", error);
                submitBtn.disabled = false;
                submitBtn.textContent = 'Apply';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Existing code...

            // Floating buttons functionality
            const floatingButtons = document.querySelectorAll('.floating-button');
            const bookingPopup = document.getElementById('booking-popup');
            const popupTitle = document.getElementById('popup-title');
            const closePopupBtn = document.querySelector('.close-popup');
            let skyscanner_script_loaded = false;

            // Function to load Skyscanner script
            function loadSkyscannerScript() {
                if (!skyscanner_script_loaded) {
                    const script = document.createElement('script');
                    script.src = 'https://widgets.skyscanner.net/widget-server/js/loader.js';
                    script.async = true;
                    document.body.appendChild(script);
                    skyscanner_script_loaded = true;
                }
            }

            // Function to open popup
            function openPopup(target, id_value) {
                // Set the default tab based on which button was clicked
                const widgetContainer = document.getElementById('skyscanner-widget-container');
                const widgetDiv = widgetContainer.querySelector('[data-skyscanner-widget]');

                // Remove any previously loaded Skyscanner script
                const existingScript = document.querySelector('script[src*="skyscanner"]');
                if (existingScript) {
                    existingScript.remove();
                }
                if (widgetDiv) {
                    widgetDiv.setAttribute('data-verticals-default-tab', id_value.concat("s"));
                }
                const widgetElement = widgetContainer.querySelector('[data-skyscanner-widget]');


                // Load Skyscanner script if not already loaded
                loadSkyscannerScript();

                // Show popup with animation
                bookingPopup.classList.add('active');

                // Prevent body scrolling
                document.body.style.overflow = 'hidden';
            }

            // Function to close popup
            function closePopup() {
                bookingPopup.classList.remove('active');
                document.body.style.overflow = '';
                skyscanner_script_loaded = false;
            
            }

            // Add event listeners to buttons
            floatingButtons.forEach(button => {
                const id_value = button.attributes.id.nodeValue.split("-")[0];
                // console.log(button.attributes.id.nodeValue.split("-")[0])
                button.addEventListener('click', function() {
                    // Add click animation
                    this.style.transform = 'scale(0.95)';

                    const action = this.getAttribute('data-action');
                    const target = this.getAttribute('data-target');
                    const newWindow = this.getAttribute('data-new-window');

                    setTimeout(() => {
                        this.style.transform = 'scale(1)';

                        if (action === 'popup') {
                            openPopup(target, id_value);
                        } else if (action === 'redirect') {
                            if (newWindow === 'true') {
                                window.open(target, '_blank');
                            } else {
                                window.location.href = target;
                            }
                        }
                    }, 200);
                });

                button.addEventListener('mouseenter', function() {
                    floatingButtons.forEach(btn => {
                        btn.classList.add('hovered');
                    });
                });

                button.addEventListener('mouseleave', function() {
                    floatingButtons.forEach(btn => {
                        btn.classList.remove('hovered');
                    });
                });

            });

            // Close popup when clicking the close button
            closePopupBtn.addEventListener('click', closePopup);

            // Close popup when clicking outside the content
            bookingPopup.addEventListener('click', function(e) {
                if (e.target === bookingPopup) {
                    closePopup();
                }
            });

            // Close popup when pressing Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && bookingPopup.classList.contains('active')) {
                    closePopup();
                }
            });
        });
    </script>
    `FAQ_SCHEMA`
</body>

</html>
<?php
?>
<?php
get_footer();
?>