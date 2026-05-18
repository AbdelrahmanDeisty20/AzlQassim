<style>
    /* Floating bubble: WhatsApp on bottom-left */
    .fl-wa-bubble {
        position: fixed;
        bottom: 24px;
        left: 20px;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: #10b981; /* Rich green */
        color: #ffffff !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        box-shadow: 0 8px 24px rgba(16, 185, 129, 0.4);
        z-index: 99999;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        animation: pulse-green-glow 2s infinite;
        text-decoration: none;
    }

    .fl-wa-bubble:hover {
        transform: scale(1.12) rotate(8deg);
        background: #059669;
        box-shadow: 0 12px 30px rgba(16, 185, 129, 0.55);
    }

    /* Floating bubble: Phone Call on bottom-right */
    .fl-ph-bubble {
        position: fixed;
        bottom: 24px;
        right: 20px;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: #1d3557; /* Deep rich blue */
        color: #ffffff !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        box-shadow: 0 8px 24px rgba(29, 53, 87, 0.4);
        z-index: 99999;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        animation: pulse-blue-glow 2s infinite;
        text-decoration: none;
    }

    .fl-ph-bubble:hover {
        transform: scale(1.12) rotate(-8deg);
        background: #1b3d72; /* Saturated hover blue */
        box-shadow: 0 12px 30px rgba(29, 53, 87, 0.55);
    }

    /* Glowing Pulsing Ripple Animations */
    @keyframes pulse-green-glow {
        0% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.6);
        }
        70% {
            box-shadow: 0 0 0 14px rgba(16, 185, 129, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
        }
    }

    @keyframes pulse-blue-glow {
        0% {
            box-shadow: 0 0 0 0 rgba(29, 53, 87, 0.6);
        }
        70% {
            box-shadow: 0 0 0 14px rgba(29, 53, 87, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(29, 53, 87, 0);
        }
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 480px) {
        .fl-wa-bubble {
            width: 50px;
            height: 50px;
            bottom: 18px;
            left: 16px;
            font-size: 26px;
        }
        .fl-ph-bubble {
            width: 50px;
            height: 50px;
            bottom: 18px;
            right: 16px;
            font-size: 19px;
        }
    }
</style>

<!-- Floating WhatsApp Button (Bottom Left) -->
<a class="fl-wa-bubble" id="flWa" href="https://wa.me/{{ $contact['wa'] ?? '966500000000' }}" target="_blank" onclick="tC('whatsapp','float')">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- Floating Phone Call Button (Bottom Right) -->
<a class="fl-ph-bubble" id="flPh" href="tel:{{ $contact['ph'] ?? '966500000000' }}" onclick="tC('phone','float')">
    <i class="fas fa-phone-alt"></i>
</a>
