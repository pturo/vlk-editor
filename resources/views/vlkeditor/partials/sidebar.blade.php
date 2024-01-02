<div class="sidebar">
    <div class="logo-details">
        <span class="logo_name">VLK Editor</span>
        <i class='bx bx-menu'></i>
    </div>
    <ul class="nav-links">
        <li class="link active">
            <a href="{{ route('vlkadm_dashboard.index') }}">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Kokpit</span>
            </a>
        </li>
        <li class="link">
            <a href="{{ route('services.index') }}">
                <i class='bx bx-news'></i>
                <span class="link_name">Usługi</span>
            </a>
        </li>
        <li class="link">
            <a href="{{ route('testimonials.index') }}">
                <i class='bx bx-news'></i>
                <span class="link_name">Opinie klientów</span>
            </a>
        </li>
        <li class="link">
            <a href="{{ route('blog.index') }}">
                <i class='bx bx-news'></i>
                <span class="link_name">Blog</span>
            </a>
        </li>
        <li class="link">
            <a href="#">
                <i class='bx bx-cog'></i>
                <span class="link_name">Ustawienia</span>
            </a>
        </li>
    </ul>
    <div class="profile-details">
        <div class="profile-content">
            <img src="{{ URL::asset(Auth::user()->profile_avatar) }}" alt="profileImg">
        </div>
        <div class="name-job">
            <div class="profile_name">{{ Auth::user()->name }}</div>
            <div class="job">Edytor</div>
        </div>
        <a href="{{ url('/admin/logout') }}"><i class='bx bx-log-out'></i></a>
    </div>
    <hr>
    <p>&copy; 2023 Paweł "WilczeqVlk" Turoń. Wszelkie prawa zastrzeżone.</p>
</div>
<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>
