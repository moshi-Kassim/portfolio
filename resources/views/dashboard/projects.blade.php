<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Moshi K. Maftaha</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            margin: 0;
            padding: 0;
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
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 60px;
            padding-bottom: 200px;
            min-height: 100vh;
        }
        .page-header {
            margin-bottom: 50px;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .page-title {
            font-size: 42px;
            font-weight: 600;
            margin: 0 0 10px 0;
            color: #ffffff;
        }
        .highlight-green {
            color: #00ff88;
        }
        .page-subtitle {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.6);
            margin: 0;
        }
        .dashboard-section {
            background-color: rgba(26, 26, 26, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 40px;
            margin-bottom: 40px;
        }
        .dashboard-section h3 {
            font-size: 24px;
            margin-bottom: 30px;
            color: #00ff88;
            font-weight: 600;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 255, 136, 0.2);
        }
        .form-group {
            margin-bottom: 24px;
        }
        .form-group label {
            display: block;
            color: #ffffff;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            color: #ffffff;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #00ff88;
            background-color: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
        }
        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }
        .form-group input[type="file"] {
            padding: 10px;
            cursor: pointer;
        }
        .form-group input[type="file"]::file-selector-button {
            padding: 8px 16px;
            background-color: #00ff88;
            color: #0a0a0a;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            margin-right: 12px;
            transition: all 0.3s ease;
        }
        .form-group input[type="file"]::file-selector-button:hover {
            background-color: #00cc6f;
        }
        .btn-primary {
            background-color: #00ff88;
            color: #0a0a0a;
            padding: 14px 32px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #00cc6f;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 255, 136, 0.3);
        }
        .success-message {
            background-color: rgba(0, 255, 136, 0.1);
            border: 1px solid #00ff88;
            color: #00ff88;
            padding: 14px 20px;
            border-radius: 6px;
            margin-bottom: 24px;
            font-weight: 500;
        }
        .error-message {
            color: #ff4444;
            font-size: 13px;
            margin-top: 6px;
        }
        .view-toolbar {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 18px;
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
            gap: 24px;
            margin-top: 24px;
        }
        .projects-grid.size-xsmall {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 16px;
        }
        .projects-grid.size-small {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 18px;
        }
        .projects-grid.size-medium {
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 24px;
        }
        .projects-grid.size-large {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 28px;
        }
        .project-card {
            background-color: rgba(26, 26, 26, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .project-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 255, 136, 0.2);
            border-color: rgba(0, 255, 136, 0.3);
        }
        .project-image {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
            background-color: rgba(255, 255, 255, 0.05);
            display: block;
        }
        .project-video {
            width: 100%;
            aspect-ratio: 16 / 9;
            background-color: #000;
            display: block;
        }
        .project-info {
            padding: 20px;
        }
        .project-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #ffffff;
        }
        .project-category {
            font-size: 12px;
            color: #00ff88;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
            font-weight: 500;
        }
        .project-date {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
        }
        .project-stats {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 6px;
        }
        .project-actions {
            margin-top: 14px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .btn-secondary {
            background-color: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            padding: 10px 14px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            border-color: rgba(0, 255, 136, 0.5);
            box-shadow: 0 6px 18px rgba(0, 255, 136, 0.18);
            transform: translateY(-1px);
        }
        .btn-danger {
            background-color: rgba(255, 68, 68, 0.12);
            color: #ff6666;
            padding: 10px 14px;
            border: 1px solid rgba(255, 68, 68, 0.3);
            border-radius: 6px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-danger:hover {
            background-color: rgba(255, 68, 68, 0.18);
            border-color: rgba(255, 68, 68, 0.5);
            transform: translateY(-1px);
        }
        .inline-input {
            width: 100%;
            margin-top: 10px;
            padding: 10px 12px;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            color: #ffffff;
            font-size: 14px;
        }
        .inline-input:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
        }
        .inline-file {
            margin-top: 10px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 16px;
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
        @media (max-width: 968px) {
            .fixed-header {
                padding: 15px 30px;
            }
            .container {
                padding: 30px 30px;
                padding-bottom: 180px;
            }
            .page-title {
                font-size: 32px;
            }
            .dashboard-section {
                padding: 24px;
            }
            .dashboard-section h3 {
                font-size: 20px;
            }
            .projects-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 16px;
            }
            .footer {
                flex-direction: column;
                gap: 15px;
                align-items: center;
                padding: 15px 30px;
            }
            .footer-item {
                padding: 8px 15px;
                font-size: 14px;
            }
            .footer-credit {
                font-size: 12px;
                padding: 10px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="fixed-header">
        <div class="header-links">
            <a href="/">HOME</a>
            <a href="/dashboard/projects">Dashboard</a>
            <a href="/dashboard/interests">Interests</a>
        </div>
        <span class="name">Moshi Kassim</span>
        <span class="name">CV</span>
    </div>

    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Projects <span class="highlight-green">Dashboard</span></h1>
            <p class="page-subtitle">Manage your creative portfolio</p>
        </div>

        @if (session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        <div class="dashboard-section">
            <h3>Add New Project</h3>
            <form method="POST" action="/dashboard/projects" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="images">Images (you can select more than one)</label>
                    <input id="images" name="images[]" type="file" accept="image/*" multiple required>
                    @error('images')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    @error('images.*')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="dashboard-section" style="padding: 20px; margin: 0 0 24px 0;">
                    <h3 style="margin: 0 0 14px 0; font-size: 18px; border: none; padding: 0; color: #ffffff;">
                        Title & Category for each image
                    </h3>
                    <div id="perImageFields" class="projects-grid" style="margin-top: 0;"></div>
                    @error('titles')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    @error('titles.*')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    @error('categories.*')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-primary">Save Project</button>
            </form>
        </div>

        <div class="dashboard-section">
            <h3>My Projects</h3>
            @if($projects->isEmpty())
                <div class="empty-state">
                    <p>No projects yet. Add your first project above!</p>
                </div>
            @else
                <div class="view-toolbar">
                    <div class="size-buttons">
                        <button class="size-button active" data-size="xsmall">XS</button>
                        <button class="size-button" data-size="small">Small</button>
                        <button class="size-button" data-size="medium">Medium</button>
                        <button class="size-button" data-size="large">Large</button>
                    </div>
                </div>

                <div class="projects-grid projects-grid-main size-xsmall">
                    @foreach($projects as $project)
                        <div class="project-card">
                            @if($project->video)
                                <video class="project-video" src="{{ asset('storage/'.$project->video) }}" controls muted></video>
                            @elseif($project->image)
                                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}" class="project-image">
                            @else
                                <div class="project-image"></div>
                            @endif
                            <div class="project-info">
                                <div class="project-title">{{ $project->title }}</div>
                                @if($project->category)
                                    <div class="project-category">{{ $project->category }}</div>
                                @endif
                                <div class="project-date">Created: {{ $project->created_at?->format('M d, Y') }}</div>
                                <div class="project-stats">
                                    Views: {{ $project->views ?? 0 }} ·
                                    Interested: {{ $project->interests_count ?? 0 }}
                                </div>

                                <!-- Edit (rename/category/replace image) -->
                                <form method="POST" action="/dashboard/projects/{{ $project->id }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <input class="inline-input" name="title" type="text" value="{{ $project->title }}" required>
                                    <input class="inline-input" name="category" type="text" value="{{ $project->category }}" placeholder="Category (optional)">
                                    <div class="inline-file">
                                        Replace image (optional):
                                        <input name="image" type="file" accept="image/*">
                                    </div>
                                    <div class="project-actions">
                                        <button type="submit" class="btn-secondary">Save changes</button>
                                    </div>
                                </form>

                                <!-- Delete -->
                                <form method="POST" action="/dashboard/projects/{{ $project->id }}" onsubmit="return confirm('Delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <div class="project-actions">
                                        <button type="submit" class="btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
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
        <a href="mailto:maftahassimng@gmail.com" class="footer-item">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/>
            </svg>
            <span>maftahassimng@gmail.com</span>
        </a>
    </div>
    <div class="footer-credit">Designed by me © {{ date('Y') }}</div>

    <script>
        function baseName(filename) {
            const withoutPath = filename.split(/[/\\\\]/).pop() || filename;
            const lastDot = withoutPath.lastIndexOf('.');
            return lastDot > 0 ? withoutPath.slice(0, lastDot) : withoutPath;
        }

        function renderPerImageFields(files) {
            const container = document.getElementById('perImageFields');
            if (!container) return;

            container.innerHTML = '';

            if (!files || files.length === 0) return;

            Array.from(files).forEach((file, index) => {
                const card = document.createElement('div');
                card.className = 'project-card';

                const info = document.createElement('div');
                info.className = 'project-info';

                const titleLabel = document.createElement('label');
                titleLabel.textContent = `Title for: ${file.name}`;
                titleLabel.style.display = 'block';
                titleLabel.style.fontSize = '13px';
                titleLabel.style.marginBottom = '8px';
                titleLabel.style.color = 'rgba(255,255,255,0.85)';

                const titleInput = document.createElement('input');
                titleInput.className = 'inline-input';
                titleInput.name = `titles[${index}]`;
                titleInput.type = 'text';
                titleInput.required = true;
                titleInput.value = baseName(file.name);

                const categoryLabel = document.createElement('label');
                categoryLabel.textContent = 'Category (optional)';
                categoryLabel.style.display = 'block';
                categoryLabel.style.fontSize = '13px';
                categoryLabel.style.margin = '12px 0 8px 0';
                categoryLabel.style.color = 'rgba(255,255,255,0.85)';

                const categoryInput = document.createElement('input');
                categoryInput.className = 'inline-input';
                categoryInput.name = `categories[${index}]`;
                categoryInput.type = 'text';
                categoryInput.placeholder = 'Logo, Branding, Poster...';

                info.appendChild(titleLabel);
                info.appendChild(titleInput);
                info.appendChild(categoryLabel);
                info.appendChild(categoryInput);

                card.appendChild(info);
                container.appendChild(card);
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const imagesInput = document.getElementById('images');
            if (!imagesInput) return;

            renderPerImageFields(imagesInput.files);
            imagesInput.addEventListener('change', function (e) {
                renderPerImageFields(e.target.files);
            });

            // Only control the main "My Projects" grid, not the small grids in the form
            const grid = document.querySelector('.projects-grid-main');
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
    </script>
</body>
</html>
