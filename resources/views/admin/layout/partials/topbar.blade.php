<div class="topbar">
    <div class="topbar-elements">
        <div class="topbar-element">
            <div class="topbar-element-burger">
                <button type="button" id="collapse-button" class="collapse-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
        <div class="topbar-element">
            <div class="topbar-element-title">
                @yield('topbar_title')
            </div>
        </div>
    </div>
</div>
<div class="overlay" id="overlay">
    @include('admin.components.menu')
</div>