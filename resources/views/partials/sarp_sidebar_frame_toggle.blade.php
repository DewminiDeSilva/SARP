{{--
  Sidebar toggle: click hamburger to hide/show left menu.
  Persists in localStorage (sarp_mis_sidebar_collapsed) until toggled again.
  Expects: #sarpAppFrame (or first .frame), #sidebarToggle, .left-column, .right-column
  Include once per page. Add CSS for .frame.sidebar-collapsed on that page or in layout.
--}}
<script>
(function () {
    var STORAGE_KEY = 'sarp_mis_sidebar_collapsed';

    function getFrame() {
        return document.getElementById('sarpAppFrame') || document.querySelector('.frame');
    }

    function setCollapsed(collapsed) {
        var frame = getFrame();
        var sidebar = document.querySelector('.left-column');
        var btn = document.getElementById('sidebarToggle');
        if (!frame || !sidebar) return;

        if (collapsed) {
            frame.classList.add('sidebar-collapsed');
            sidebar.classList.add('hidden');
            sidebar.setAttribute('aria-hidden', 'true');
            if (btn) {
                btn.setAttribute('aria-expanded', 'false');
                btn.setAttribute('title', 'Show menu');
            }
        } else {
            frame.classList.remove('sidebar-collapsed');
            sidebar.classList.remove('hidden');
            sidebar.setAttribute('aria-hidden', 'false');
            if (btn) {
                btn.setAttribute('aria-expanded', 'true');
                btn.setAttribute('title', 'Hide menu');
            }
        }
        try {
            localStorage.setItem(STORAGE_KEY, collapsed ? '1' : '0');
        } catch (e) {}
    }

    document.addEventListener('DOMContentLoaded', function () {
        var frame = getFrame();
        var btn = document.getElementById('sidebarToggle');
        if (!frame) return;

        var stored = false;
        try {
            stored = localStorage.getItem(STORAGE_KEY) === '1';
        } catch (e) {}

        setCollapsed(stored);

        if (!btn) return;

        btn.addEventListener('click', function (e) {
            e.preventDefault();
            var f = getFrame();
            if (!f) return;
            var next = !f.classList.contains('sidebar-collapsed');
            setCollapsed(next);
        });
    });
})();
</script>
