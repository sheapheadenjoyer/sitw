<!DOCTYPE html>

<html dir="rtl" lang="fa">
<head>

<meta name="description" content="بوست MMR و بهبود رفتار در Dota 2 با خدمات حرفه‌ای، تضمین بازگشت وجه و پشتیبانی شبانه‌روزی.">
<meta name="keywords" content="Dota 2, بوست, MMR, Behaviour Score, دوتا 2, خرید بوست, رفع Low Priority">
<meta property="og:title" content="Dota 2 Rush | خدمات حرفه‌ای دوتا 2">
<meta property="og:image" content="https://uploadkon.ir/uploads/eb6710_25photo19655862447.jpg">
<meta property="og:description" content="بهترین خدمات بوست MMR، رفتار و رفع لو پرایوریتی با پشتیبانی واقعی.">

<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Dota 2 Rush | MMR Boost و رفتار حرفه‌ای</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
        }
        
        :root {
    scroll-behavior: smooth;

            --primary-color: #FFD700;
            --secondary-color: #0D1B2A;
            --bg-light: #1A2A3A;
            --text-color: #fff;
            --border-radius: 10px;
            --box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            --transition: all 0.3s ease;
        }
        
        body {
            background: #0D1B2A url('images/dota-bg.webp') no-repeat center center fixed;
            background-size: cover;
            color: white;
            min-height: 100vh;
        }

        /* Header Styles */
        
.header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 9999;
  padding: 2.5rem 2rem;
  background: linear-gradient(135deg, rgba(13, 27, 42, 0.95), rgba(26, 42, 58, 0.95));
  backdrop-filter: blur(5px);
  border-bottom: 2px solid #FFD700;
}

        
        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo img {
            height: 85px;
            border-radius: 50%;
        }
        
        .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .nav-links {
            display: flex;
            gap: 1.5rem;
        }
        
        .nav-links a {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
        }
        
        .nav-links a:hover {
            background: rgba(255, 215, 0, 0.1);
            color: var(--primary-color);
        }
        
        .nav-links a.active {
            background: linear-gradient(to right, #FF6B6B, #9D50BB);
            color: white;
        }

        /* Main Container */
        
.container {
    animation: fadeInSection 0.7s ease;

  max-width: 1200px;
  margin: 160px auto 0 auto;
  background: rgba(13, 27, 42, 0.9);
  min-height: 100vh;
  border-radius: 0;
  padding: 20px;
  border: 1px solid #1A2A3A;
  backdrop-filter: blur(5px);
}


        /* User Profile Styles */
        .user-profile-container {
            position: absolute;
            left: 1.5rem;
            top: 1.5rem;
            z-index: 100;
        }
        
        .user-profile-wrapper {
            position: relative;
            display: inline-block;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
            transition: var(--transition);
            padding: 0.5rem;
            border-radius: 25px;
        }
        
        .user-profile:hover {
            background: rgba(255,215,0,0.1);
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--bg-light);
            border: 2px solid var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .user-avatar i {
            font-size: 1.2rem;
            color: var(--primary-color);
        }
        
        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .user-name {
            font-weight: 500;
            color: var(--primary-color);
            margin-left: 0.5rem;
        }
        
        .user-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--secondary-color);
            border: 1px solid var(--primary-color);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 200px;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            transform: translateY(10px);
            z-index: 100;
        }
        
        .user-profile-wrapper.active .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-item {
            padding: 0.8rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            color: var(--text-color);
            text-decoration: none;
            transition: var(--transition);
            border-bottom: 1px solid rgba(255,215,0,0.1);
        }
        
        .dropdown-item:last-child {
            border-bottom: none;
        }
        
        .dropdown-item:hover {
            background: rgba(255,215,0,0.1);
            color: var(--primary-color);
        }
        
        .dropdown-item i {
            width: 20px;
            text-align: center;
        }
        
        /* Page Content Styles */
        .page-title {
            text-align: center;
            margin: 20px 0 40px;
            color: #FFD700;
            font-size: 2.5rem;
            text-shadow: 0 0 10px rgba(255,215,0,0.5);
        }
        
        /* Service Tabs */
        .service-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .service-tab {
            padding: 12px 30px;
            background: #1A2A3A;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            border: 2px solid transparent;
        }
        
        .service-tab:hover {
            border-color: #FFD700;
        }
        
        .service-tab.active {
            background: linear-gradient(to right, #FF6B6B, #9D50BB);
            box-shadow: 0 0 15px rgba(157,80,187,0.5);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* MMR Boost Section */
        .mmr-selection {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .mmr-box {
            background: rgba(26,42,58,0.7);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #2A3A4A;
        }
        
        .mmr-title {
            text-align: center;
            margin-bottom: 15px;
            color: #4ECDC4;
            font-size: 1.2rem;
        }
        
        .mmr-input-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .mmr-input {
            flex: 1;
            background: #1A2A3A;
            border: 1px solid #2A3A4A;
            border-radius: 5px;
            padding: 10px;
            color: white;
            text-align: center;
        }
        
        .mmr-slider-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .mmr-slider {
            flex: 1;
            -webkit-appearance: none;
            height: 10px;
            background: #1A2A3A;
            border-radius: 5px;
            outline: none;
        }
        
        .mmr-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #FFD700;
            cursor: pointer;
        }
        
        .mmr-value {
            width: 80px;
            text-align: center;
            font-weight: bold;
        }
        
        .rank-display {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 15px;
            gap: 10px;
        }
        
        .rank-icon {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }
        
        .rank-name {
            font-size: 1.1rem;
            color: #FFD700;
        }
        
        /* Boost Type Selection */
        .boost-type {
            background: rgba(26,42,58,0.7);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            border: 1px solid #2A3A4A;
        }
        
        .boost-type h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFD700;
        }
        
        .boost-options {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .boost-option {
            background: rgba(26,42,58,0.7);
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s;
            border: 2px solid transparent;
            flex: 1;
            min-width: 200px;
            max-width: 250px;
        }
        
        .boost-option:hover {
            border-color: #FFD700;
        }
        
        .boost-option.selected {
            background: linear-gradient(to right, #FF6B6B, #9D50BB);
            box-shadow: 0 0 15px rgba(157,80,187,0.5);
            border-color: transparent;
        }
        
        .boost-option i {
            font-size: 2rem;
            color: #4ECDC4;
            margin-bottom: 10px;
        }
        
        .boost-option h4 {
            margin-bottom: 5px;
            color: white;
        }
        
        .boost-option p {
            font-size: 0.9rem;
            color: #aaa;
        }
        
        .price-tag {
            font-size: 0.8rem;
            color: #FFD700;
            margin-top: 5px;
            font-weight: bold;
        }
        
        /* Role Selection */
        .role-selection {
            background: rgba(26,42,58,0.7);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            border: 1px solid #2A3A4A;
        }
        
        .role-selection h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFD700;
        }
        
        .role-options {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .role-option {
            background: rgba(26,42,58,0.7);
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s;
            border: 2px solid transparent;
            flex: 1;
            min-width: 150px;
            max-width: 200px;
        }
        
        .role-option:hover {
            border-color: #FFD700;
        }
        
        .role-option.selected {
            background: linear-gradient(to right, #FF6B6B, #9D50BB);
            box-shadow: 0 0 15px rgba(157,80,187,0.5);
            border-color: transparent;
        }
        
        .role-option i {
            font-size: 2rem;
            color: #4ECDC4;
            margin-bottom: 10px;
        }
        
        .role-option h4 {
            margin-bottom: 5px;
            color: white;
        }
        
        /* Behaviour Boost Section */
        .behaviour-options {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .behaviour-option {
            background: rgba(26,42,58,0.7);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #2A3A4A;
        }
        
        .behaviour-option h3 {
            text-align: center;
            margin-bottom: 15px;
            color: #FFD700;
        }
        
        .behaviour-option i {
            font-size: 1.8rem;
            color: #4ECDC4;
            margin-bottom: 10px;
            display: block;
            text-align: center;
        }
        
        /* Video Container */
        .video-container-small {
            margin: 20px auto;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            max-width: 400px;
        }
        
        .video-container-small video {
            width: 100%;
            border-radius: 10px;
            border: 2px solid #FFD700;
        }
        
        /* Extra Options */
        .extra-options {
            background: rgba(26,42,58,0.7);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid #2A3A4A;
            position: relative;
        }
        
        .option-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #2A3A4A;
        }
        
        .option-item:last-child {
            border-bottom: none;
        }
        
        .option-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .option-info i {
            color: #9D50BB;
            font-size: 1.2rem;
        }
        
        .option-text h4 {
            margin-bottom: 3px;
            color: #FFD700;
        }
        
        .option-text p {
            font-size: 0.85rem;
            color: #aaa;
        }
        
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #1A2A3A;
            transition: .4s;
            border-radius: 24px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: #9D50BB;
        }
        
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        
        /* Price Box */
        .price-box {
            background: linear-gradient(135deg, #1A2A3A 0%, #2A3A4A 100%);
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #FFD700;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .price-amount {
            font-size: 2.5rem;
            color: #FFD700;
            margin: 10px 0;
        }
        
        .price-note {
            color: #4ECDC4;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        
        .buy-button {
            background: linear-gradient(to right, #FF6B6B, #9D50BB);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            width: 100%;
        }
        
        .buy-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255,107,107,0.4);
        }
        
        /* LP Remove Section */
        .lp-option {
            background: rgba(26,42,58,0.7);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid #2A3A4A;
        }
        
        .lp-option h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #FFD700;
        }
        
        /* Benefits List */
        .benefits-list {
            margin: 20px 0;
            padding-right: 20px;
        }
        
        .benefits-list li {
            margin-bottom: 10px;
            position: relative;
            padding-right: 25px;
        }
        
        .benefits-list li:before {
            content: "✓";
            color: #4ECDC4;
            position: absolute;
            right: 0;
            font-weight: bold;
        }
        
        /* Footer */
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #2A3A4A;
            flex-wrap: wrap;
        }
        
        .footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 20px;
        }
        
        .footer-section h3 {
            color: #FFD700;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section ul li {
            margin-bottom: 8px;
        }
        
        .footer-section ul li a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-section ul li a:hover {
            color: #4ECDC4;
        }
        
        /* Payment Badge */
        .payment-badge {
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            background: rgba(26,42,58,0.7);
            border-radius: 10px;
            border: 1px solid #FFD700;
        }
        
        /* Contact Bubble */
        .contact-bubble {
    animation: bounceIn 0.5s ease;
    border: 2px solid #FFD700;
    box-shadow: 0 0 15px rgba(255,215,0,0.4);

            position: fixed;
            bottom: 20px;
            left: 20px;
            background: linear-gradient(to right, #9D50BB, #FF6B6B);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            z-index: 1000;
        }
        
        .contact-bubble i {
            font-size: 1.5rem;
            color: white;
        }
        
        .contact-modal {
    animation: slideUp 0.4s ease;
    border-radius: 15px;
    border: 2px solid #FFD700;
    box-shadow: 0 0 20px rgba(255,215,0,0.3);

            display: none;
            position: fixed;
            bottom: 90px;
            left: 20px;
            width: 300px;
            background: rgba(26,42,58,0.95);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.5);
            z-index: 1000;
            border: 1px solid #FFD700;
        }
        
        .contact-modal h3 {
            color: #FFD700;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .contact-modal textarea {
            width: 100%;
            background: #1A2A3A;
            border: 1px solid #2A3A4A;
            border-radius: 5px;
            padding: 10px;
            color: white;
            margin-bottom: 15px;
            min-height: 100px;
        }
        
        .contact-modal button {
            background: linear-gradient(to right, #FF6B6B, #9D50BB);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            cursor: pointer;
            width: 100%;
        }
        
        /* FAQ Section */
        .faq-item {
            margin-bottom: 15px;
            border-bottom: 1px solid #2A3A4A;
            padding-bottom: 15px;
        }
        
        .faq-question {
            color: #FFD700;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .faq-answer {
            color: #aaa;
            padding-top: 10px;
            display: none;
        }
        
        .faq-answer.show {
            display: block;
        }
        
        /* استایل‌های چت آنلاین */
        .live-chat {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
        }

        .chat-toggle {
            background: linear-gradient(135deg, #4CAF50 0%, #388E3C 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .chat-toggle:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #81C784 0%, #4CAF50 100%);
        }

        .chat-modal {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 350px;
            background: #2E7D32;
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(0,0,0,0.6);
            z-index: 1000;
            border: 1px solid #4CAF50;
            overflow: hidden;
        }

        .chat-header {
            background: linear-gradient(to right, #4CAF50, #388E3C);
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header h3 {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
        }

        .chat-status {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #8BC34A;
        }

        .close-chat {
            cursor: pointer;
            font-size: 20px;
            color: rgba(255,255,255,0.7);
            transition: color 0.3s;
        }

        .close-chat:hover {
            color: white;
        }

        .chat-messages {
            height: 300px;
            overflow-y: auto;
            padding: 15px;
            background: #1B5E20;
        }

        .chat-messages::-webkit-scrollbar {
            width: 5px;
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: #4CAF50;
            border-radius: 5px;
        }

        .user-message, .admin-message {
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            position: relative;
            max-width: 80%;
            word-wrap: break-word;
            animation: fadeIn 0.3s ease-out;
        }

        .user-message {
            background: #4CAF50;
            margin-left: auto;
            border-bottom-right-radius: 0;
        }

        .admin-message {
            background: #2E7D32;
            margin-right: auto;
            border-bottom-left-radius: 0;
            border-left: 3px solid #4CAF50;
        }

        .message-time {
            display: block;
            font-size: 0.7em;
            opacity: 0.7;
            margin-top: 5px;
            text-align: left;
            color: #E0E0E0;
        }

        .chat-input-container {
            display: flex;
            padding: 10px;
            background: #2E7D32;
            border-top: 1px solid #388E3C;
        }

        .chat-input {
            flex: 1;
            padding: 10px 15px;
            background: #1B5E20;
            border: 1px solid #388E3C;
            color: white;
            border-radius: 20px;
            outline: none;
            transition: all 0.3s ease;
        }

        .chat-input:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        .send-button {
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
            cursor: pointer;
            transition: background 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .send-button:hover {
            background: #388E3C;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* نسخه موبایل */
        @media (max-width: 768px) {
            .chat-modal {
                width: calc(100% - 40px);
                right: 20px;
                bottom: 70px;
            }
            
            .chat-toggle {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-links {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .user-profile-container {
                position: static;
                margin-bottom: 1rem;
                display: flex;
                justify-content: flex-end;
            }
            
            .user-name {
                display: none;
            }
            
            .user-dropdown {
                left: auto;
                right: 0;
            }
            
            .boost-options, .service-tabs, .role-options {
                flex-direction: column;
                align-items: center;
            }
            
            .behaviour-options {
                grid-template-columns: 1fr;
            }
            
            .footer-section {
                min-width: 100%;
            }
            
            .contact-modal {
    animation: slideUp 0.4s ease;
    border-radius: 15px;
    border: 2px solid #FFD700;
    box-shadow: 0 0 20px rgba(255,215,0,0.3);

                width: calc(100% - 40px);
                left: 20px;
            }
            
            .mmr-input-container {
                flex-direction: column;
            }
            
            .mmr-input {
                width: 100%;
            }
        }
    
    .neon-link {
      color: #FFD700;
      text-shadow: 0 0 5px #FFD700, 0 0 10px #FFD700, 0 0 20px #FFA500;
      transition: all 0.3s ease-in-out;
    }
    .neon-link:hover {
      color: white;
      text-shadow: 0 0 10px #fff, 0 0 20px #FFD700, 0 0 30px #FFA500;
      transform: scale(1.05);
    }
    
    .fancy-title {
      font-size: 1.5rem;
      color: #FFD700;
      text-shadow: 0 0 8px #FFD700, 0 0 16px #FFA500;
      padding-bottom: 5px;
      margin-bottom: 10px;
      text-align: center;
    }
    
    .styled-select {
      background: linear-gradient(to right, #1A2A3A, #0D1B2A);
      color: #FFD700;
      border: 2px solid #FFD700;
      padding: 10px 15px;
      border-radius: 12px;
      font-size: 1rem;
      box-shadow: 0 0 8px rgba(255, 215, 0, 0.4);
      transition: 0.3s ease;
      width: 100%;
    }
    .styled-select:focus {
      outline: none;
      border-color: #FFA500;
      box-shadow: 0 0 12px #FFA500;
      background: #0D1B2A;
    }
    
    .styled-select:hover {
      transform: scale(1.02);
      box-shadow: 0 0 12px #FFD700;
    }
    .label-box {
      background: rgba(255, 215, 0, 0.1);
      padding: 10px 15px;
      color: #FFD700;
      border-radius: 10px;
      font-weight: bold;
      margin-bottom: 10px;
      font-size: 1.2rem;
      text-align: center;
      box-shadow: 0 0 8px rgba(255, 215, 0, 0.3);
    }
    .mmr-progress-bar {
      width: 100%;
      height: 14px;
      background: #1A2A3A;
      border-radius: 7px;
      margin: 10px 0 20px;
      overflow: hidden;
      box-shadow: inset 0 0 5px #000;
    }
    .mmr-progress-bar-fill {
      height: 100%;
      background: linear-gradient(to right, #FFD700, #FFA500);
      width: 0%;
      transition: width 0.6s ease-in-out;
    }
    
/* آواتار پیام‌ها */
.contact-modal .message-bubble {
  background: #1A2A3A;
  color: white;
  padding: 10px 14px;
  border-radius: 15px;
  margin-bottom: 10px;
  max-width: 85%;
  line-height: 1.6;
  position: relative;
  animation: fadeIn 0.3s ease-in-out;
}

.contact-modal .message-bubble.user {
  background: #4CAF50;
  align-self: flex-end;
  border-bottom-right-radius: 0;
}

.contact-modal .message-bubble.admin {
  background: #2E7D32;
  align-self: flex-start;
  border-bottom-left-radius: 0;
}

.contact-modal .quick-replies {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 15px;
}

.contact-modal .quick-replies button {
  background: #FFD700;
  color: #0D1B2A;
  border: none;
  border-radius: 20px;
  padding: 6px 12px;
  cursor: pointer;
  transition: background 0.3s;
  font-weight: bold;
}

.contact-modal .quick-replies button:hover {
  background: #FFA500;
}

/* انیمیشن‌ها */
@keyframes slideUp {
  from {
    transform: translateY(20px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes bounceIn {
  from {
    transform: scale(0.8);
    opacity: 0;
  }
  to {
    transform: scale(1);
    opacity: 1;
  }
}


@keyframes fadeInSection {
  from { opacity: 0; transform: translateY(15px); }
  to { opacity: 1; transform: translateY(0); }
}

</style>
    
    
    
    
</head>
<body>
<!-- Header Section -->
<header class="header">
<div class="header-container">
<div class="logo">
<img loading="lazy" alt="Dota 2 Rush Logo" src="https://uploadkon.ir/uploads/eb6710_25photo19655862447.jpg"/>
<div class="logo-text">Dota 2 Rush</div>
</div>
<nav class="nav-links">
<a class="active neon-link" href="index.php">صفحه اصلی</a>
<a href="my-orders.php" class="neon-link">📋 سفارش‌های من</a>
<a href="panel.php" class="neon-link">پنل کاربری</a>
</nav>
</div>
</header>

<div class="container">
<h1 class="page-title">Dota 2 خدمات بوست</h1>
<div class="service-tabs">
<div class="service-tab active" data-tab="mmr-boost">MMR Boost</div>
<div class="service-tab" data-tab="behaviour-boost">Boost Behaviour Score</div>
<div class="service-tab" data-tab="lp-remove">رفع Low Priority</div>
</div>
<!-- MMR Boost Tab -->
<div class="tab-content active" id="mmr-boost">
<h2 class="page-title">MMR Boost در Dota 2</h2>
<div class="mmr-selection">
<div class="mmr-box">
<div class="label-box">🎯 MMR فعلی شما</div>
<div class="mmr-input-container">
<input class="mmr-input" id="current-mmr-input" max="5700" min="0" type="number" value="1000"/>
</div>
<div class="mmr-slider-container">
<input class="mmr-slider" id="current-mmr" max="5700" min="0" type="range" value="1000"/>
<div class="mmr-value" id="current-mmr-value">1000</div>
</div>
<div class="rank-display" id="current-rank-display">
<img loading="lazy" alt="Current Rank" class="rank-icon" src="images/seasonal-rank-herald-1.webp"/>
<div class="rank-name">Herald 1</div>
</div>
</div>
<div class="mmr-box">
<div class="label-box">🚀 MMR هدف</div>
<div class="mmr-input-container">
<input class="mmr-input" id="target-mmr-input" max="5700" min="0" type="number" value="2000"/>
</div>
<div class="mmr-slider-container">
<input class="mmr-slider" id="target-mmr" max="5700" min="0" type="range" value="2000"/>
<div class="mmr-value" id="target-mmr-value">2000</div>
</div>
<div class="rank-display" id="target-rank-display">
<img loading="lazy" alt="Target Rank" class="rank-icon" src="images/seasonal-rank-archon-1.webp"/>
<div class="rank-name">Archon 1</div>
</div>
</div>
</div>
<div class="boost-type">
<h3><i class="fas fa-bolt"></i> نوع بوست</h3>
<div class="boost-options">
<div class="boost-option selected" data-type="solo">
<i class="fas fa-user"></i>
<h4>بوست سولو</h4>
<p>پیشرفت انفرادی</p>
</div>
<div class="boost-option" data-type="party" title="بازی با یک بوستر واقعی همراه شما">
<i class="fas fa-users"></i>
<h4>بوست پارتی</h4>
<p>بازی با بوستر</p>
<div class="price-tag">+20% به قیمت</div>
</div>
</div>
</div>
<div class="role-selection">
<h3><i class="fas fa-chess"></i> نقش انتخابی</h3>
<div class="role-options">
<div class="role-option selected" data-role="any">
<i class="fas fa-random"></i>
<h4>هر نقش</h4>
</div>
<div class="role-option" data-role="core">
<i class="fas fa-sword"></i>
<h4>Core</h4>
</div>
<div class="role-option" data-role="support">
<i class="fas fa-hand-holding-heart"></i>
<h4>Support</h4>
<div class="price-tag">+30% به قیمت</div>
</div>
</div>
</div>
<div class="extra-options">
<h3><i class="fas fa-star"></i> گزینه‌های اضافی</h3>
<!-- Video Container -->
<div class="video-container-small">
<video autoplay="" loop="" muted="" playsinline="">
<source src="https://eloboss.net/static/video/dota.webm" type="video/webm"/>
</video>
</div>
<div class="option-item">
<div class="option-info">
<i class="fas fa-chart-line"></i>
<div class="option-text">
<h4>گزارش پیشرفت روزانه</h4>
<p>هر روز وضعیت پیشرفت را دریافت کنید</p>
</div>
</div>
<label class="switch">
<input checked="" type="checkbox"/>
<span class="slider"></span>
</label>
</div>
<div class="option-item">
<div class="option-info">
<i class="fas fa-shield-alt"></i>
<div class="option-text">
<h4>حالت Invisible در استیم</h4>
<p>فعالیت بوستر در استیم پنهان می‌شود</p>
</div>
</div>
<label class="switch">
<input type="checkbox"/>
<span class="slider"></span>
</label>
</div>
</div>
<div class="benefits-list">
<h3><i class="fas fa-check-circle"></i> مزایای MMR Boost با ما:</h3>
<ul>
<li>بوست توسط بازیکنان حرفه‌ای با رنک Immortal</li>
<li>پشتیبانی 24 ساعته در طول فرآیند بوست</li>
<li>تضمین بازگشت وجه در صورت عدم رسیدن به رنک مورد نظر</li>
<li>حفظ امنیت کامل اکانت شما</li>

  </ul>
</div>
</div>
<!-- Behaviour Boost Tab -->
<div class="tab-content" id="behaviour-boost">
<h2 class="page-title">بهبود Behaviour Score در Dota 2</h2>
<div class="behaviour-options">
<div class="behaviour-option">
<i class="fas fa-heart"></i>
<h3>افزایش Behaviour Score</h3>
<div class="mmr-box">
<h3 class="mmr-title">امتیاز Behaviour هدف</h3>
<div class="mmr-input-container">
<input class="mmr-input" id="behaviour-score-input" max="10000" min="0" step="100" type="number" value="5000"/>
</div>
<div class="mmr-slider-container">
<input class="mmr-slider" id="behaviour-score" max="10000" min="0" step="100" type="range" value="5000"/>
<div class="mmr-value" id="behaviour-score-value">5000</div>
</div>
</div>
<div class="option-item" style="border:none;padding:10px 0 0 0">
<div class="option-info">
<i class="fas fa-level-down-alt"></i>
<div class="option-text">
<h4>Behaviour زیر 4000</h4>
<p>امتیاز من زیر 4000 است</p>
</div>
</div>
<label class="switch">
<input id="low-behaviour-score" type="checkbox"/>
<span class="slider"></span>
</label>
</div>
</div>
</div>
<div class="extra-options">
<h3><i class="fas fa-star"></i> گزینه‌های اضافی</h3>
<div class="option-item">
<div class="option-info">
<i class="fas fa-user-secret"></i>
<div class="option-text">
<h4>حالت Invisible</h4>
<p>فعالیت بوستر در استیم پنهان می‌شود</p>
</div>
</div>
<label class="switch">
<input checked="" type="checkbox"/>
<span class="slider"></span>
</label>
</div>
</div>
<div class="benefits-list">
<h3><i class="fas fa-check-circle"></i> مزایای بهبود Behaviour Score با ما:</h3>
<ul>
<li>افزایش امتیاز رفتار به صورت طبیعی و بدون ریسک بن</li>
<li>حذف گزارش‌های منفی از اکانت شما</li>
<li>بازی در حالت Invisible برای جلوگیری از گزارش‌های بیشتر</li>
<li>مشاوره برای حفظ رفتار مثبت در آینده</li>
<li>پشتیبانی تا رسیدن به امتیاز مورد نظر</li>
</ul>
</div>
</div>
<!-- LP Remove Tab -->
<div class="tab-content" id="lp-remove">
<h2 class="page-title">رفع Low Priority در Dota 2</h2>
<div class="lp-option">
<i class="fas fa-ban"></i>
<h3>رفع Low Priority</h3>
<div class="mmr-box">
<h3 class="mmr-title">تعداد بازی‌های Low Priority</h3>
<div class="mmr-input-container">
<input class="mmr-input" id="lp-games-input" max="5" min="1" type="number" value="1"/>
</div>
<div class="mmr-slider-container">
<input class="mmr-slider" id="lp-games" max="5" min="1" type="range" value="1"/>
<div class="mmr-value" id="lp-games-value">1</div>
</div>
</div>
<div class="option-item" style="border:none;padding:10px 0 0 0">
<div class="option-info">
<i class="fas fa-crown"></i>
<div class="option-text">
<h4>رنک Legend یا بالاتر</h4>
<p>اکانت من رنک Legend یا بالاتر است</p>
</div>
</div>
<label class="switch">
<input id="high-rank-account" type="checkbox"/>
<span class="slider"></span>
</label>
</div>
</div>
<div class="extra-options">
<h3><i class="fas fa-star"></i> گزینه‌های اضافی</h3>
<div class="option-item">
<div class="option-info">
<i class="fas fa-user-secret"></i>
<div class="option-text">
<h4>حالت Invisible</h4>
<p>فعالیت بوستر در استیم پنهان می‌شود</p>
</div>
</div>
<label class="switch">
<input checked="" type="checkbox"/>
<span class="slider"></span>
</label>
</div>
</div>
<div class="benefits-list">
<h3><i class="fas fa-check-circle"></i> مزایای رفع Low Priority با ما:</h3>
<ul>
<li>رفع Low Priority در کمترین زمان ممکن</li>
<li>پشتیبانی 24 ساعته در طول فرآیند</li>
<li>حالت Invisible برای جلوگیری از گزارش‌های بیشتر</li>
<li>تضمین بازگشت وجه در صورت عدم موفقیت</li>
<li>مشاوره برای جلوگیری از Low Priority در آینده</li>
</ul>
</div>
</div>
<!-- Price Box -->
<div class="price-box">
<h3>هزینه کل</h3>
<div class="price-amount">1,200,000 تومان</div>
<p class="price-note">تضمین بازگشت وجه در صورت عدم نتیجه‌گیری</p>
<form action="payment.php" method="post" action="payment.php" id="buyForm" method="POST">
    <input type="hidden" name="currentMmr" id="currentMmr">
    <input type="hidden" name="desiredMmr" id="desiredMmr">
    <input type="hidden" name="boostType" value="بوست MMR">

<input type="hidden" name="service" value="boost">
<input type="hidden" id="form-mmr-from" name="mmr_from">
<input type="hidden" id="form-mmr-to" name="mmr_to">
<input type="hidden" id="form-price" name="price">


<input type="hidden" name="service" value="boost">
<input type="hidden" id="form-price" name="price">

<input type="hidden" id="form-mmr-from" name="mmr_from">
<input type="hidden" id="form-mmr-to" name="mmr_to">

<input name="boostType" type="hidden" value="بوست MMR"/>
<input id="form-current-mmr" name="currentMmr" type="hidden"/>
<input id="form-target-mmr" name="desiredMmr" type="hidden"/>
<input id="form-other-options" name="otherOptions" type="hidden"/>
<button class="buy-button" type="submit">
<i class="fas fa-shopping-cart"></i> خرید امن
  </button>
</form>
</div>
<div class="payment-badge">
<h4>درگاه امن پرداخت</h4>
<p>پرداخت آنلاین با تمامی کارت‌های بانکی</p>
</div>
<!-- FAQ Section -->
<div class="faq-section">
<h3><i class="fas fa-question-circle"></i> سوالات متداول</h3>
<div class="faq-item">
<div class="faq-question">
<span>آیا استفاده از خدمات بوست ایمن است؟</span>
<i class="fas fa-chevron-down"></i>
</div>
<div class="faq-answer">
<p>بله، ما از روش‌های کاملا ایمن استفاده می‌کنیم که هیچ خطری برای اکانت شما ندارد. تمامی بازی‌ها به صورت طبیعی انجام می‌شود.</p>
</div>
</div>
<div class="faq-item">
<div class="faq-question">
<span>مدت زمان انجام بوست چقدر است؟</span>
<i class="fas fa-chevron-down"></i>
</div>
<div class="faq-answer">
<p>زمان بستگی به مقدار MMR مورد نظر و شرایط فعلی اکانت دارد. معمولا برای هر 1000 MMR حدود 3-5 روز زمان نیاز است.</p>
</div>
</div>
<div class="faq-item">
<div class="faq-question">
<span>آیا امکان پرداخت در دو مرحله وجود دارد؟</span>
<i class="fas fa-chevron-down"></i>
</div>
<div class="faq-answer">
<p>بله، برای سفارش‌های بزرگ می‌توانید 50% مبلغ را ابتدا و 50% را پس از اتمام کار پرداخت نمایید.</p>
</div>
</div>
</div>
<!-- Footer -->
<div class="footer" id="footer">
<div class="footer-section">
<h3>ارتباط با ما</h3>
<ul>
<li><i class="fas fa-phone"></i> تلفن: 09925733340</li>
<li><i class="fab fa-telegram"></i> تلگرام: @Dota2rush_support</li>
<li><i class="fas fa-envelope"></i> ایمیل: dota2rushsup@gmail.com</li>
</ul>
</div>
<div class="footer-section">
<h3>لینک‌های مفید</h3>
<ul>
<li><a href="#"><i class="fas fa-question-circle"></i> راهنمای استفاده</a></li>
<li><a href="#"><i class="fas fa-shield-alt"></i> حریم خصوصی</a></li>
<li><a href="#"><i class="fas fa-file-alt"></i> شرایط و ضوابط</a></li>
</ul>
</div>
<div class="footer-section">
<h3>ساعات کاری</h3>
<ul>
<li><i class="fas fa-clock"></i> همه روزه: 8 صبح تا 12 شب</li>
<li><i class="fas fa-headset"></i> پشتیبانی 24/7 در تلگرام</li>
</ul>
</div>
</div>
</div>
<!-- Contact Bubble -->
<div class="contact-bubble" id="contactBubble">
<i class="fas fa-comment-dots"></i>
</div>
<div class="contact-modal" id="contactModal">
<h3>پیام به پشتیبانی</h3>
<textarea placeholder="پیام خود را اینجا بنویسید..."></textarea>
<button id="sendMessage">ارسال پیام</button>
<div style="margin-top:15px;">
<h4>سوالات سریع:</h4>
<ul style="list-style:none;padding-right:0;">
<li style="padding:5px 0;border-bottom:1px dashed #2A3A4A;cursor:pointer">وضعیت سفارش من؟</li>
<li style="padding:5px 0;border-bottom:1px dashed #2A3A4A;cursor:pointer">روش‌های پرداخت؟</li>
<li style="padding:5px 0;border-bottom:1px dashed #2A3A4A;cursor:pointer">تخفیف برای سفارش‌های حجمی؟</li>
<li style="padding:5px 0;cursor:pointer">مشکل در پرداخت دارم</li>
</ul>
</div>
</div>
<script>
        // Modular JavaScript Code
        (function() {
            

            // Rank data
            const rankData = [
                {name:"Herald 1",min:0,max:154,image:"images/seasonal-rank-herald-1.webp"},
                {name:"Herald 2",min:154,max:308,image:"images/seasonal-rank-herald-2.webp"},
                {name:"Herald 3",min:308,max:462,image:"images/seasonal-rank-herald-3.webp"},
                {name:"Herald 4",min:462,max:616,image:"images/seasonal-rank-herald-4.webp"},
                {name:"Herald 5",min:616,max:769,image:"images/seasonal-rank-herald-5.webp"},
                {name:"Guardian 1",min:770,max:924,image:"images/seasonal-rank-guardian-1.webp"},
                {name:"Guardian 2",min:924,max:1078,image:"images/seasonal-rank-guardian-2.webp"},
                {name:"Guardian 3",min:1078,max:1232,image:"images/seasonal-rank-guardian-3.webp"},
                {name:"Guardian 4",min:1232,max:1386,image:"images/seasonal-rank-guardian-4.webp"},
                {name:"Guardian 5",min:1386,max:1539,image:"images/seasonal-rank-guardian-5.webp"},
                {name:"Crusader 1",min:1540,max:1694,image:"images/seasonal-rank-crusader-1.webp"},
                {name:"Crusader 2",min:1694,max:1848,image:"images/seasonal-rank-crusader-2.webp"},
                {name:"Crusader 3",min:1848,max:2002,image:"images/seasonal-rank-crusader-3.webp"},
                {name:"Crusader 4",min:2002,max:2156,image:"images/seasonal-rank-crusader-4.webp"},
                {name:"Crusader 5",min:2156,max:2309,image:"images/seasonal-rank-crusader-5.webp"},
                {name:"Archon 1",min:2310,max:2464,image:"images/seasonal-rank-archon-1.webp"},
                {name:"Archon 2",min:2464,max:2618,image:"images/seasonal-rank-archon-2.webp"},
                {name:"Archon 3",min:2618,max:2772,image:"images/seasonal-rank-archon-3.webp"},
                {name:"Archon 4",min:2772,max:2926,image:"images/seasonal-rank-archon-4.webp"},
                {name:"Archon 5",min:2926,max:3079,image:"images/seasonal-rank-archon-5.webp"},
                {name:"Legend 1",min:3080,max:3234,image:"images/seasonal-rank-legend-1.webp"},
                {name:"Legend 2",min:3234,max:3388,image:"images/seasonal-rank-legend-2.webp"},
                {name:"Legend 3",min:3388,max:3542,image:"images/seasonal-rank-legend-3.webp"},
                {name:"Legend 4",min:3542,max:3696,image:"images/seasonal-rank-legend-4.webp"},
                {name:"Legend 5",min:3696,max:3849,image:"images/seasonal-rank-legend-5.webp"},
                {name:"Ancient 1",min:3850,max:4004,image:"images/seasonal-rank-ancient-1.webp"},
                {name:"Ancient 2",min:4004,max:4158,image:"images/seasonal-rank-ancient-2.webp"},
                {name:"Ancient 3",min:4158,max:4312,image:"images/seasonal-rank-ancient-3.webp"},
                {name:"Ancient 4",min:4312,max:4466,image:"images/seasonal-rank-ancient-4.webp"},
                {name:"Ancient 5",min:4466,max:4619,image:"images/seasonal-rank-ancient-5.webp"},
                {name:"Divine 1",min:4620,max:4820,image:"images/seasonal-rank-divine-1.webp"},
                {name:"Divine 2",min:4820,max:5020,image:"images/seasonal-rank-divine-2.webp"},
                {name:"Divine 3",min:5020,max:5220,image:"images/seasonal-rank-divine-3.webp"},
                {name:"Divine 4",min:5220,max:5420,image:"images/seasonal-rank-divine-4.webp"},
                {name:"Divine 5",min:5420,max:5620,image:"images/seasonal-rank-divine-5.webp"},
                {name:"Immortal",min:5620,max:5700,image:"images/seasonal-rank-immortal.webp"}
            ];

            // Find rank based on MMR
            function findRank(mmr) {
                for(const rank of rankData) {
                    if(mmr >= rank.min && mmr <= rank.max) return rank;
                }
                return rankData[rankData.length-1];
            }

            // Update rank display when slider or input changes
            function updateRankDisplay(sliderId, inputId, displayId) {
                const slider = document.getElementById(sliderId);
                const input = document.getElementById(inputId);
                const valueDisplay = document.getElementById(sliderId + "-value");
                
                // Sync slider and input values
                if (this && this.id === inputId) {
                    // Input changed
                    let value = parseInt(this.value);
                    if (isNaN(value)) value = 0;
                    if (value < 0) value = 0;
                    if (value > 5700) value = 5700;
                    
                    slider.value = value;
                    valueDisplay.textContent = value;
                } else {
                    // Slider changed
                    const value = parseInt(slider.value);
                    input.value = value;
                    valueDisplay.textContent = value;
                }
                
                const mmr = parseInt(slider.value);
                const rank = findRank(mmr);
                const display = document.getElementById(displayId);
                
                display.querySelector(".rank-icon").src = rank.image;
                display.querySelector(".rank-name").textContent = rank.name;
                
                updatePrice();
            }

            // Initialize event listeners for MMR inputs
            function initMMRInputs() {
                // Current MMR
                document.getElementById("current-mmr").addEventListener("input", function() {
                    updateRankDisplay("current-mmr", "current-mmr-input", "current-rank-display");
                });
                
                document.getElementById("current-mmr-input").addEventListener("input", function() {
                    updateRankDisplay("current-mmr", "current-mmr-input", "current-rank-display");
                });
                
                document.getElementById("current-mmr-input").addEventListener("blur", function() {
                    updateRankDisplay("current-mmr", "current-mmr-input", "current-rank-display");
                });
                
                // Target MMR
                document.getElementById("target-mmr").addEventListener("input", function() {
                    updateRankDisplay("target-mmr", "target-mmr-input", "target-rank-display");
                });
                
                document.getElementById("target-mmr-input").addEventListener("input", function() {
                    updateRankDisplay("target-mmr", "target-mmr-input", "target-rank-display");
                });
                
                document.getElementById("target-mmr-input").addEventListener("blur", function() {
                    updateRankDisplay("target-mmr", "target-mmr-input", "target-rank-display");
                });
                
                // Behaviour Score
                document.getElementById("behaviour-score").addEventListener("input", function() {
                    document.getElementById("behaviour-score-value").textContent = this.value;
                    document.getElementById("behaviour-score-input").value = this.value;
                    updatePrice();
                });
                
                document.getElementById("behaviour-score-input").addEventListener("input", function() {
                    let value = parseInt(this.value);
                    if (isNaN(value)) value = 0;
                    if (value < 0) value = 0;
                    if (value > 10000) value = 10000;
                    
                    document.getElementById("behaviour-score").value = value;
                    document.getElementById("behaviour-score-value").textContent = value;
                    updatePrice();
                });
                
                // LP Games
                document.getElementById("lp-games").addEventListener("input", function() {
                    document.getElementById("lp-games-value").textContent = this.value;
                    document.getElementById("lp-games-input").value = this.value;
                    updatePrice();
                });
                
                document.getElementById("lp-games-input").addEventListener("input", function() {
                    let value = parseInt(this.value);
                    if (isNaN(value)) value = 1;
                    if (value < 1) value = 1;
                    if (value > 5) value = 5;
                    
                    document.getElementById("lp-games").value = value;
                    document.getElementById("lp-games-value").textContent = value;
                    updatePrice();
                });
                
                // Low behaviour score checkbox
                document.getElementById("low-behaviour-score").addEventListener("change", updatePrice);
                
                // High rank account checkbox
                document.getElementById("high-rank-account").addEventListener("change", updatePrice);
            }

            // Update price based on selections
            function updatePrice() {
                const activeTab = document.querySelector('.service-tab.active').getAttribute('data-tab');
                let basePrice = 0;
                
                if(activeTab === 'mmr-boost') {
                    const currentMmr = parseInt(document.getElementById("current-mmr").value);
                    const targetMmr = parseInt(document.getElementById("target-mmr").value);
                    const boostType = document.querySelector('.boost-options .selected').getAttribute('data-type');
                    const roleType = document.querySelector('.role-options .selected').getAttribute('data-role');
                    const mmrDiff = Math.max(0, targetMmr - currentMmr);
                    
                    // Get current rank to apply medal-based pricing
                    const currentRank = findRank(currentMmr);
                    
                    // Base price (60% reduced from original)
                    const baseRate = 1000; // 60% reduced from original 2500
                    
                    // Calculate medal multiplier (10% per medal higher than Herald)
                    let medalMultiplier = 1;
                    if (currentRank.name.includes("Herald")) {
                        // Herald is base (no multiplier)
                    } else if (currentRank.name.includes("Guardian")) {
                        medalMultiplier = 1.1;
                    } else if (currentRank.name.includes("Crusader")) {
                        medalMultiplier = 1.2;
                    } else if (currentRank.name.includes("Archon")) {
                        medalMultiplier = 1.3;
                    } else if (currentRank.name.includes("Legend")) {
                        medalMultiplier = 1.4;
                    } else if (currentRank.name.includes("Ancient")) {
                        medalMultiplier = 1.5;
                    } else if (currentRank.name.includes("Divine")) {
                        medalMultiplier = 1.6;
                    } else if (currentRank.name.includes("Immortal")) {
                        medalMultiplier = 1.7;
                    }
                    
                    // Progressive pricing with medal multiplier
                    if (mmrDiff <= 300) {
                        basePrice = mmrDiff * baseRate * medalMultiplier;
                    } else if (mmrDiff <= 600) {
                        basePrice = (300 * baseRate + (mmrDiff - 300) * (baseRate * 0.9)) * medalMultiplier;
                    } else if (mmrDiff <= 1000) {
                        basePrice = (300 * baseRate + 300 * (baseRate * 0.9) + (mmrDiff - 600) * (baseRate * 0.8)) * medalMultiplier;
                    } else {
                        basePrice = (300 * baseRate + 300 * (baseRate * 0.9) + 400 * (baseRate * 0.8) + (mmrDiff - 1000) * (baseRate * 0.7)) * medalMultiplier;
                    }
                    
                    // Minimum price
                    if (basePrice < 300000) basePrice = 300000;
                    
                    // Apply boost type modifier
                    if(boostType === 'party') {
                        basePrice = Math.floor(basePrice * 1.2); // +20% for party
                    }
                    
                    // Apply role modifier
                    if(roleType === 'support') {
                        basePrice = Math.floor(basePrice * 1.3); // +30% for support
                    }
                    
                } else if(activeTab === 'behaviour-boost') {
                    const behaviourScore = parseInt(document.getElementById("behaviour-score").value);
                    const isLowBehaviour = document.getElementById("low-behaviour-score").checked;
                    
                    // Base price: 76,000 per 100 behaviour score as requested
                    basePrice = Math.floor(behaviourScore / 100) * 76000;
                    
                    // Additional 15% for low behaviour score
                    if(isLowBehaviour) {
                        basePrice = Math.floor(basePrice * 1.15);
                    }
                    
                    // Minimum price
                    if(basePrice < 400000) basePrice = 400000;
                    
                } else if(activeTab === 'lp-remove') {
                    const lpGames = parseInt(document.getElementById("lp-games").value);
                    const isHighRank = document.getElementById("high-rank-account").checked;
                    
                    // Base price: 100,000 per game as requested
                    basePrice = lpGames * 100000;
                    
                    // Additional 20% for high rank
                    if(isHighRank) {
                        basePrice = Math.floor(basePrice * 1.2);
                    }
                    
                    // Minimum price
                    if(basePrice < 100000) basePrice = 100000;
                }
                
                // Display price without modifiers
                
// رند کردن قیمت به نزدیک‌ترین 5000 یا 10000
function roundPrice(value) {
    const remainder = value % 10000;
    if (remainder < 5000) {
        return value - remainder; // پایان با 000
    } else {
        return value - remainder + 5000; // پایان با 500
    }
}
const finalPrice = roundPrice(Math.floor(basePrice));
document.querySelector('.price-amount').textContent = finalPrice.toLocaleString('fa-IR') + ' تومان';

            }

            // Initialize boost options
            function initBoostOptions() {
                const boostOptions = document.querySelectorAll('.boost-option');
                boostOptions.forEach(option => {
                    option.addEventListener('click', () => {
                        option.parentElement.querySelectorAll('.boost-option').forEach(item => item.classList.remove('selected'));
                        option.classList.add('selected');
                        updatePrice();
                    });
                });
                
                const roleOptions = document.querySelectorAll('.role-option');
                roleOptions.forEach(option => {
                    option.addEventListener('click', () => {
                        option.parentElement.querySelectorAll('.role-option').forEach(item => item.classList.remove('selected'));
                        option.classList.add('selected');
                        updatePrice();
                    });
                });
            }

            // Initialize service tabs
            function initServiceTabs() {
                const serviceTabs = document.querySelectorAll('.service-tab');
                serviceTabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        serviceTabs.forEach(t => t.classList.remove('active'));
                        tab.classList.add('active');
                        
                        const tabId = tab.getAttribute('data-tab');
                        document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
                        document.getElementById(tabId).classList.add('active');
                        
                        updatePrice();
                    });
                });
            }

            // Initialize FAQ functionality
            function initFAQ() {
                document.querySelectorAll('.faq-question').forEach(question => {
                    question.addEventListener('click', () => {
                        const answer = question.nextElementSibling;
                        answer.classList.toggle('show');
                        const icon = question.querySelector('i');
                        icon.classList.toggle('fa-chevron-down');
                        icon.classList.toggle('fa-chevron-up');
                    });
                });
            }

            // Initialize contact bubble
            function initContactBubble() {
                const contactBubble = document.getElementById('contactBubble');
                const contactModal = document.getElementById('contactModal');
                
                contactBubble.addEventListener('click', () => {
                    contactModal.style.display = contactModal.style.display === 'block' ? 'none' : 'block';
                });
                
                document.getElementById('sendMessage').addEventListener('click', () => {
                    alert('پیام شما با موفقیت ارسال شد!');
                    contactModal.style.display = 'none';
                });
                
                // Quick question click
                document.querySelectorAll('.contact-modal ul li').forEach(item => {
                    item.addEventListener('click', () => {
                        const text = item.textContent;
                        document.querySelector('.contact-modal textarea').value = text;
                    });
                });
            }

            // Initialize Live Chat
            function initLiveChat() {
                const chatToggle = document.getElementById('liveChatToggle');
                const chatModal = document.getElementById('chatModal');
                const closeChat = document.querySelector('.close-chat');
                const sendButton = document.getElementById('sendMessage');
                const chatInput = document.getElementById('chatInput');
                
                chatToggle.addEventListener('click', () => {
                    chatModal.style.display = chatModal.style.display === 'block' ? 'none' : 'block';
                });
                
                closeChat.addEventListener('click', () => {
                    chatModal.style.display = 'none';
                });
                
                sendButton.addEventListener('click', sendMessage);
                chatInput.addEventListener('keypress', (e) => {
                    if(e.key === 'Enter') sendMessage();
                });
                
                function sendMessage() {
                    const message = chatInput.value.trim();
                    if(!message) return;
                    
                    // Add user message
                    addMessage(message, 'user');
                    chatInput.value = '';
                    
                    // Auto response
                    setTimeout(() => {
                        const responses = [
                            'پیام شما دریافت شد. همکاران ما به زودی پاسخ خواهند داد.',
                            'لطفاً شماره سفارش خود را ذکر کنید تا بتوانیم بهتر کمک کنیم.',
                            'سوال بسیار خوبی پرسیدید! یکی از همکاران ما به زودی پاسخ خواهد داد.',
                            'متشکرم از پیام شما. چگونه می‌توانم کمک کنم؟',
                            'پشتیبانی آنلاین در خدمت شماست. لطفاً سوال خود را بپرسید.'
                        ];
                        const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                        addMessage(randomResponse, 'admin');
                    }, 1000);
                }
                
                function addMessage(text, sender) {
                    const messageElement = document.createElement('div');
                    messageElement.className = `${sender}-message`;
                    
                    const time = new Date().toLocaleTimeString('fa-IR', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    
                    messageElement.innerHTML = `
                        <p>${text}</p>
                        <span class="message-time">${time}</span>
                    `;
                    
                    document.getElementById('chatMessages').appendChild(messageElement);
                    scrollChatToBottom();
                }
                
                function scrollChatToBottom() {
                    const chatMessages = document.getElementById('chatMessages');
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            }

            // Initialize all components
            function init() {
                initMMRInputs();
                initBoostOptions();
                initServiceTabs();
                initFAQ();
                initContactBubble();
                initLiveChat();
                
                // Initial price update
                updatePrice();
            }

            // Run initialization when DOM is loaded
            document.addEventListener('DOMContentLoaded', init);
        })();
    
document.getElementById("buyForm").addEventListener("submit", function(e) {
    const currentMmr = document.getElementById("current-mmr").value;
    const targetMmr = document.getElementById("target-mmr").value;
    const extraOptions = [];

    document.querySelectorAll(".extra-options input[type='checkbox']").forEach((checkbox) => {
        if (checkbox.checked) {
            const label = checkbox.closest('.option-item').querySelector('h4');
            if (label) extraOptions.push(label.textContent.trim());
        }
    });

    document.getElementById("form-current-mmr").value = currentMmr;
    document.getElementById("form-target-mmr").value = targetMmr;
    document.getElementById("form-other-options").value = extraOptions.join(", ");
});


    // آپدیت نوار پیشرفت MMR
    function updateMMRProgress() {
      const current = parseInt(document.querySelector('[name="currentMMR"]').value) || 0;
      const target = parseInt(document.querySelector('[name="targetMMR"]').value) || 0;
      const bar = document.getElementById('mmrProgress');
      if (target > current) {
        const percent = Math.min(100, ((current / target) * 100));
        bar.style.width = percent + '%';
      } else {
        bar.style.width = '0%';
      }
    }

    document.querySelector('[name="currentMMR"]').addEventListener('change', updateMMRProgress);
    document.querySelector('[name="targetMMR"]').addEventListener('change', updateMMRProgress);
    updateMMRProgress();
    
</script>
<script>
function goToPayment(service, price) {
    const url = `payment.php?service=${encodeURIComponent(service)}&price=${encodeURIComponent(price)}`;
    window.location.href = url;
}

    // آپدیت نوار پیشرفت MMR
    function updateMMRProgress() {
      const current = parseInt(document.querySelector('[name="currentMMR"]').value) || 0;
      const target = parseInt(document.querySelector('[name="targetMMR"]').value) || 0;
      const bar = document.getElementById('mmrProgress');
      if (target > current) {
        const percent = Math.min(100, ((current / target) * 100));
        bar.style.width = percent + '%';
      } else {
        bar.style.width = '0%';
      }
    }

    document.querySelector('[name="currentMMR"]').addEventListener('change', updateMMRProgress);
    document.querySelector('[name="targetMMR"]').addEventListener('change', updateMMRProgress);
    updateMMRProgress();
    
</script>

<script>
document.getElementById("submit-order-btn").addEventListener("click", async function(e) {
  e.preventDefault();

  const data = {
    service_type: "boost",
    current_mmr: parseInt(document.getElementById("current-mmr").value),
    target_mmr: parseInt(document.getElementById("target-mmr").value),
    server: document.getElementById("server").value,
    price: parseInt(document.getElementById("final-price").textContent.replace(/\D/g, '')),
    phone: document.getElementById("phone").value,
    telegram: document.getElementById("telegram").value,
    note: document.getElementById("note").value
  };

  try {
    const response = await fetch("backend/submit-order.php", {
      method: "POST",
      headers: {"Content-Type": "application/json"},
      body: JSON.stringify(data)
    });

    const result = await response.json();
    if (result.success) {
      window.location.href = result.redirect;
    } else {
      alert("خطا در ثبت سفارش: " + result.error);
    }
  } catch (err) {
    console.error("Error:", err);
    alert("خطای شبکه هنگام ثبت سفارش");
  }
});

    // آپدیت نوار پیشرفت MMR
    function updateMMRProgress() {
      const current = parseInt(document.querySelector('[name="currentMMR"]').value) || 0;
      const target = parseInt(document.querySelector('[name="targetMMR"]').value) || 0;
      const bar = document.getElementById('mmrProgress');
      if (target > current) {
        const percent = Math.min(100, ((current / target) * 100));
        bar.style.width = percent + '%';
      } else {
        bar.style.width = '0%';
      }
    }

    document.querySelector('[name="currentMMR"]').addEventListener('change', updateMMRProgress);
    document.querySelector('[name="targetMMR"]').addEventListener('change', updateMMRProgress);
    updateMMRProgress();
    
</script>

<form id="buyForm" method="POST" action="payment.php">
  <input type="hidden" name="service_type" value="boost">
  <input type="hidden" name="current_mmr" id="current-mmr">
  <input type="hidden" name="target_mmr" id="target-mmr">
  <input type="hidden" name="boost_type" id="boost-type">
  <input type="hidden" name="selected_role" id="selected-role">
  <input type="hidden" name="price" id="final-price">
</form>
<script>
document.getElementById("buyForm").addEventListener("submit", function(e) {
  const order = {
    type: "boost",
    price: parseInt(document.querySelector('.price-amount').textContent.replace(/\D/g,'')),
    details: {
      currentMMR: parseInt(document.getElementById("current-mmr").value),
      targetMMR: parseInt(document.getElementById("target-mmr").value),
      boostType: document.querySelector('.boost-options .selected').getAttribute('data-type'),
      selectedRole: document.querySelector('.role-options .selected').getAttribute('data-role')
    }
  };
  localStorage.setItem("lastOrder", JSON.stringify(order));
});

    // آپدیت نوار پیشرفت MMR
    function updateMMRProgress() {
      const current = parseInt(document.querySelector('[name="currentMMR"]').value) || 0;
      const target = parseInt(document.querySelector('[name="targetMMR"]').value) || 0;
      const bar = document.getElementById('mmrProgress');
      if (target > current) {
        const percent = Math.min(100, ((current / target) * 100));
        bar.style.width = percent + '%';
      } else {
        bar.style.width = '0%';
      }
    }

    document.querySelector('[name="currentMMR"]').addEventListener('change', updateMMRProgress);
    document.querySelector('[name="targetMMR"]').addEventListener('change', updateMMRProgress);
    updateMMRProgress();
    
</script>


<script>
document.getElementById("buyForm").addEventListener("submit", function(e) {
    const priceText = document.querySelector(".price-amount").textContent.replace(/[^0-9]/g, "");
    document.getElementById("form-price").value = priceText;
    document.getElementById("form-mmr-from").value = document.getElementById("current-mmr").value;
    document.getElementById("form-mmr-to").value = document.getElementById("target-mmr").value;
});
</script>

<script>
document.getElementById("buyForm").addEventListener("submit", function(e) {
    document.getElementById("form-mmr-from").value = document.getElementById("current-mmr").value;
    document.getElementById("form-mmr-to").value = document.getElementById("target-mmr").value;
    const priceText = document.querySelector(".price-amount").textContent.replace(/[^0-9]/g, "");
    document.getElementById("form-price").value = priceText;
});
</script>
</body>

</html>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const mmrFromInput = document.querySelector("input[name='mmr_from']");
    const mmrToInput = document.querySelector("input[name='mmr_to']");
    const currentMmrHidden = document.getElementById("currentMmr");
    const desiredMmrHidden = document.getElementById("desiredMmr");

    if (mmrFromInput && mmrToInput && currentMmrHidden && desiredMmrHidden) {
        currentMmrHidden.value = mmrFromInput.value;
        desiredMmrHidden.value = mmrToInput.value;

        mmrFromInput.addEventListener("input", function () {
            currentMmrHidden.value = this.value;
        });

        mmrToInput.addEventListener("input", function () {
            desiredMmrHidden.value = this.value;
        });
    }
});
</script>
