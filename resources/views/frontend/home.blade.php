<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moshi K. Maftaha - Graphic Designer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #0a0a0a;
            color: #ffffff;
            overflow: hidden; /* home page must fit on screen */
            padding-top: 80px; /* fixed header space */
        }
        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background-color: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .fixed-header a {
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            transition: color 0.3s;
        }
        .fixed-header a:hover {
            color: #00ff88;
        }
        .fixed-header .name {
            color: #ffffff;
            font-size: 18px;
            font-weight: 500;
        }
        .fixed-header .header-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: clamp(16px, 4vw, 40px) clamp(16px, 5vw, 60px);
            padding-bottom: 0;
            height: calc(100vh - 80px); /* viewport minus fixed header */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* keep content at top and button above footer */
        }
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: clamp(18px, 4vw, 80px);
            align-items: center;
            flex: 1;
            margin-bottom: clamp(12px, 2.5vh, 40px);
            min-height: 0;
        }
        .text-content {
            font-size: clamp(22px, 3.6vw, 48px);
            line-height: 1.25;
            font-weight: 400;
        }
        .highlight-green {
            color: #00ff88;
        }
        .illustration-container {
            position: relative;
            width: 100%;
            height: min(38vh, 420px);
        }
        .illustration {
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
            border-radius: 0;
            padding: 0;
        }
        .illustration img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            position: relative;
            z-index: 1;
        }
        .explore-button {
            text-align: center;
            margin: clamp(10px, 2vh, 26px) 0;
        }
        .explore-button a {
            display: inline-block;
            background-color: #00ff88;
            color: #0a0a0a;
            padding: 14px 38px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .explore-button a:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 255, 136, 0.3);
        }
        .footer {
            position: static; /* do not cover the button */
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 18px;
            padding: 14px 0;
            border-top: 1px solid #2a2a2a;
            font-size: 14px;
            background-color: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            z-index: 999;
            flex-wrap: wrap;
            margin-top: auto; /* push footer to bottom of container */
        }
        .footer-credit {
            color: #706f6c;
            font-size: 12px;
            text-align: center;
            padding: 8px 0 0 0;
        }
        .footer-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #00ff88;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .footer-item:hover {
            background-color: rgba(0, 255, 136, 0.1);
            color: #00ff88;
            transform: translateY(-2px);
        }
        .footer-item svg {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
        }
        .footer-item span {
            white-space: nowrap;
        }
        .footer-credit {
            color: #706f6c;
            font-size: 14px;
            text-align: center;
        }
        @media (max-width: 968px) {
            .fixed-header {
                padding: 15px 30px;
            }
            .main-content {
                grid-template-columns: 1fr;
                gap: 18px;
            }
            .text-content {
                font-size: clamp(20px, 5.2vw, 30px);
            }
            .footer {
                flex-direction: column;
                gap: 10px;
                align-items: center;
                padding: 12px 16px;
            }
            .footer-item {
                padding: 8px 15px;
                font-size: 13px;
            }
            .footer-credit {
                font-size: 12px;
                padding: 10px 30px;
            }
            .container {
                padding: 16px 16px;
                height: calc(100vh - 80px);
            }
            .illustration-container {
                height: min(30vh, 260px);
            }
        }
    </style>
</head>
<body>
    <div class="fixed-header">
        <a href="/">HOME</a>
        <span class="name">Moshi Kassim</span>
        
    </div>

    <div class="container">
        <div class="main-content">
            <div class="text-content">
                I'm <span class="highlight-green">Graphic designer</span> focused on logos, branding, posters and digital designs that make a lasting <span class="highlight-green">impression</span>.
            </div>

            <div class="illustration-container">
                <div class="illustration">
                    <img src="{{ asset('build/assets/home picture.svg') }}" alt="Graphic Designer Illustration">
                </div>
            </div>
        </div>

        <div class="explore-button">
            <a href="{{ route('projects') }}">Explore my Designs</a>
        </div>

        <div class="footer">
            <a href="https://wa.me/+255621011240" class="footer-item" target="_blank">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span>+255 621 011 240</span>
            </a>
            <a href="https://www.instagram.com/mk_maftaha?igsh=MmtpaWhnYW01a3o3" class="footer-item" target="_blank">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
                <span>mk_maftaha</span>
            </a>
            <a href="mailto:maftahakassim@gmail.com" class="footer-item">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/>
                </svg>
                <span>maftahakassim@gmail.com</span>
            </a>
        </div>
        <div class="footer-credit">Designed by moshi kassim © {{ date('Y') }}</div>
    </div>
</body>
</html>