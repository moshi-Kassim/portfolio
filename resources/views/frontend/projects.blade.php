<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Designs - Moshi K. Maftaha</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
            padding-top: 80px;
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
        .projects-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px;
            padding-bottom: 120px;
        }
        .page-title {
            font-size: 48px;
            margin-bottom: 60px;
            text-align: center;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease-out forwards;
        }
        .page-title .highlight-green {
            color: #00ff88;
        }
        .view-toolbar {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 24px;
        }
        .size-buttons {
            display: inline-flex;
            gap: 8px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 999px;
            padding: 4px;
        }
        .size-button {
            border: none;
            background: transparent;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            padding: 6px 14px;
            border-radius: 999px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .size-button.active {
            background: #00ff88;
            color: #0a0a0a;
            font-weight: 600;
        }
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 30px;
            opacity: 0;
            animation: fadeIn 1s ease-out 0.3s forwards;
        }
        .project-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            aspect-ratio: 1;
            cursor: pointer;
            transform: scale(0.95);
            opacity: 0;
            animation: fadeInScale 0.6s ease-out forwards;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 8px 24px rgba(255, 255, 255, 0.15), 0 4px 12px rgba(255, 255, 255, 0.1);
        }
        .project-item:nth-child(1) { animation-delay: 0.1s; }
        .project-item:nth-child(2) { animation-delay: 0.2s; }
        .project-item:nth-child(3) { animation-delay: 0.3s; }
        .project-item:nth-child(4) { animation-delay: 0.4s; }
        .project-item:nth-child(5) { animation-delay: 0.5s; }
        .project-item:nth-child(n+6) { animation-delay: 0.6s; }
        .project-item:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 32px rgba(255, 255, 255, 0.25), 0 6px 16px rgba(255, 255, 255, 0.15), 0 10px 40px rgba(0, 255, 136, 0.3);
        }
        .project-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
            filter: drop-shadow(0 4px 8px rgba(255, 255, 255, 0.2));
        }
        .project-item:hover img {
            transform: scale(1.1);
        }
        .project-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-color: #000;
        }
        /* Icon size presets */
        .projects-grid.size-xsmall {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 14px;
        }
        .projects-grid.size-small {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 18px;
        }
        .projects-grid.size-small .project-item {
            aspect-ratio: 1;
        }
        .projects-grid.size-medium {
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 26px;
        }
        .projects-grid.size-large {
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 30px;
        }
        .projects-grid.size-large .project-item {
            aspect-ratio: 4 / 3;
        }
        .back-button {
            display: inline-block;
            margin-top: 40px;
            padding: 12px 30px;
            background-color: transparent;
            border: 2px solid #00ff88;
            color: #00ff88;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.8s forwards;
        }
        .back-button:hover {
            background-color: #00ff88;
            color: #0a0a0a;
            transform: translateY(-2px);
        }
        .footer {
            position: fixed;
            bottom: 40px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            padding: 20px 60px;
            border-top: 1px solid #2a2a2a;
            font-size: 16px;
            background-color: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            z-index: 999;
            flex-wrap: wrap;
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
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px;
            background-color: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            z-index: 998;
            border-top: 1px solid #2a2a2a;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        @media (max-width: 968px) {
            .fixed-header {
                padding: 15px 30px;
            }
            .projects-container {
                padding: 30px 20px;
            }
            .page-title {
                font-size: 32px;
                margin-bottom: 40px;
            }
            .projects-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 20px;
            }
            .footer {
                flex-direction: column;
                gap: 15px;
                align-items: center;
                padding: 15px 30px;
                bottom: 50px;
            }
            .footer-item {
                padding: 8px 15px;
                font-size: 14px;
            }
            .footer-credit {
                font-size: 12px;
                padding: 10px 30px;
            }
            .projects-container {
                padding-bottom: 180px;
            }
        }
        /* Fullscreen Modal Styles */
        .image-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            z-index: 2000;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .image-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
        }
        .image-modal img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 20px 60px rgba(255, 255, 255, 0.2);
            animation: zoomIn 0.2s ease-out;
        }
        .close-button {
            position: absolute;
            top: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            color: #ffffff;
            font-size: 28px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 2001;
        }
        .close-button:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: #00ff88;
            transform: rotate(90deg);
        }
        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            height: 60px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            color: #ffffff;
            font-size: 32px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 2001;
        }
        .nav-arrow:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: #00ff88;
            transform: translateY(-50%) scale(1.1);
        }
        .nav-arrow.prev {
            left: 30px;
        }
        .nav-arrow.next {
            right: 30px;
        }
        .nav-arrow.disabled {
            opacity: 0.3;
            cursor: not-allowed;
            pointer-events: none;
        }
        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        @media (max-width: 968px) {
            .image-modal img {
                max-width: 95%;
                max-height: 95%;
            }
            .close-button {
                top: 20px;
                right: 20px;
                width: 40px;
                height: 40px;
                font-size: 24px;
            }
            .nav-arrow {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }
            .nav-arrow.prev {
                left: 15px;
            }
            .nav-arrow.next {
                right: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="fixed-header">
        <div class="header-links">
            <a href="/">HOME</a>
        </div>
        <span class="name">Moshi Kassim</span>
    </div>

    <div class="projects-container">
        <h1 class="page-title">My <span class="highlight-green">Designs</span></h1>

        <div class="view-toolbar">
            <div class="size-buttons">
                <button class="size-button active" data-size="xsmall">XS</button>
                <button class="size-button" data-size="small">Small</button>
                <button class="size-button" data-size="medium">Medium</button>
                <button class="size-button" data-size="large">Large</button>
            </div>
        </div>

        <div class="projects-grid size-xsmall">
            @forelse($projects as $project)
                @php
                    $mediaPath = $project->image
                        ? asset('storage/' . $project->image)
                        : ($project->video ? asset('storage/' . $project->video) : '');
                    $mediaType = $project->video ? 'video' : 'image';
                    $mediaName = $project->title ?? 'Design';
                @endphp
                <div
                    class="project-item"
                    data-type="{{ $mediaType }}"
                    data-image-path="{{ $mediaType === 'image' ? $mediaPath : '' }}"
                    data-image-name="{{ $mediaName }}"
                    data-project-id="{{ $project->id }}"
                >
                    @if($project->video)
                        <video src="{{ $mediaPath }}" controls muted></video>
                    @elseif($project->image)
                        <img src="{{ $mediaPath }}" alt="{{ $mediaName }}" loading="lazy" decoding="async">
                    @endif
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: #706f6c;">No designs found.</p>
            @endforelse
        </div>

        <a href="/" class="back-button">← Back to Home</a>

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
        <div class="footer-credit">Designed by me © {{ date('Y') }}</div>
    </div>

    <!-- Fullscreen Image Modal -->
    <div class="image-modal" id="imageModal" onclick="closeImageModal()">
        <div class="close-button" onclick="event.stopPropagation(); closeImageModal()">×</div>
        <div class="nav-arrow prev" id="prevArrow" onclick="event.stopPropagation(); navigateImage(-1)">‹</div>
        <div class="nav-arrow next" id="nextArrow" onclick="event.stopPropagation(); navigateImage(1)">›</div>
        <img id="modalImage" src="" alt="" onclick="event.stopPropagation()">
    </div>

    <script>
        const csrfToken = '{{ csrf_token() }}';

        let allImages = [];
        let currentImageIndex = 0;

        function trackViewForPath(imagePath) {
            const projectItems = document.querySelectorAll('.project-item');
            const match = Array.from(projectItems).find(
                item => item.getAttribute('data-image-path') === imagePath
            );
            if (!match) return;

            const projectId = match.getAttribute('data-project-id');
            if (!projectId) return;

            fetch(`{{ url('/projects') }}/${projectId}/view`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            }).catch(() => {});
        }

        function openImageModal(imagePath, imageName) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            
            // Collect all images
            const projectItems = document.querySelectorAll('.project-item');
            allImages = [];
            projectItems.forEach(function(item) {
                allImages.push({
                    path: item.getAttribute('data-image-path'),
                    name: item.getAttribute('data-image-name')
                });
            });
            
            // Find current index
            currentImageIndex = allImages.findIndex(img => img.path === imagePath);
            if (currentImageIndex === -1) currentImageIndex = 0;
            
            // Set image immediately
            modalImage.src = imagePath;
            modalImage.alt = imageName;

            // Track view
            trackViewForPath(imagePath);
            
            // Show modal instantly
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            // Update arrow states
            updateArrowStates();
        }

        function navigateImage(direction) {
            if (allImages.length === 0) return;
            
            currentImageIndex += direction;
            
            // Loop around
            if (currentImageIndex < 0) {
                currentImageIndex = allImages.length - 1;
            } else if (currentImageIndex >= allImages.length) {
                currentImageIndex = 0;
            }
            
            const modalImage = document.getElementById('modalImage');
            const currentImage = allImages[currentImageIndex];
            
            modalImage.src = currentImage.path;
            modalImage.alt = currentImage.name;
            
            updateArrowStates();
        }

        function updateArrowStates() {
            const prevArrow = document.getElementById('prevArrow');
            const nextArrow = document.getElementById('nextArrow');
            
            // Only disable if there's only one image
            if (allImages.length <= 1) {
                prevArrow.classList.add('disabled');
                nextArrow.classList.add('disabled');
            } else {
                prevArrow.classList.remove('disabled');
                nextArrow.classList.remove('disabled');
            }
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Add click event listeners to all project items
        document.addEventListener('DOMContentLoaded', function() {
            const projectItems = document.querySelectorAll('.project-item');
            projectItems.forEach(function(item) {
                const type = item.getAttribute('data-type') || 'image';
                if (type === 'image') {
                    item.addEventListener('click', function() {
                        const imagePath = this.getAttribute('data-image-path');
                        const imageName = this.getAttribute('data-image-name');
                        if (imagePath) {
                            openImageModal(imagePath, imageName);
                        }
                    });
                }
            });

            const grid = document.querySelector('.projects-grid');
            const sizeButtons = document.querySelectorAll('.size-button');

            sizeButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    const size = this.getAttribute('data-size');

                    sizeButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    if (!grid) return;
                    grid.classList.remove('size-xsmall', 'size-small', 'size-medium', 'size-large');
                    if (size === 'xsmall') {
                        grid.classList.add('size-xsmall');
                    } else if (size === 'small') {
                        grid.classList.add('size-small');
                    } else if (size === 'medium') {
                        grid.classList.add('size-medium');
                    } else if (size === 'large') {
                        grid.classList.add('size-large');
                    }
                });
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(event) {
            const modal = document.getElementById('imageModal');
            if (!modal.classList.contains('active')) return;
            
            if (event.key === 'Escape') {
                closeImageModal();
            } else if (event.key === 'ArrowLeft') {
                navigateImage(-1);
            } else if (event.key === 'ArrowRight') {
                navigateImage(1);
            }
        });
    </script>
</body>
</html>