<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentAct = $_GET['act'] ?? '';
?>
<style>
    :root {
        --bg: #0f1115;
        --fg: #fff;
        --muted: #a7b0c0;
        --brand: #ff5a1f;
        /* cam đỏ */
        --card: #161a22;
        --border: rgba(255, 255, 255, .08);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }

    body {
        font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        background: #565657ff;
        color: var(--fg);
        padding-top: 72px;
    }

    .main-header {
        position: fixed;
        inset: 0 0 auto 0;
        z-index: 1000;
        background: linear-gradient(180deg, rgba(48, 39, 39, 0.95), rgba(46, 48, 51, 0.9));
        backdrop-filter: blur(10px);
        border-bottom: 1px solid var(--border);
    }

    .container {
        max-width: 1180px;
        width: 92%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 12px 0;
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo-tag {
        background: var(--brand);
        color: #fff;
        font-weight: 800;
        letter-spacing: .5px;
        padding: 10px 14px;
        border-radius: 12px;
        line-height: 1;
        font-size: 20px;
        box-shadow: 0 8px 20px rgba(255, 90, 31, .25);
    }

    .brand small {
        color: var(--muted);
        font-size: 12px;
        border: 1px solid var(--border);
        padding: 2px 8px;
        border-radius: 999px;
    }

    /* NAV */
    .nav-wrap {
        display: flex;
        align-items: center;
        gap: 18px
    }

    .main-nav {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 6px;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
    }

    .main-nav a {
        color: var(--fg);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 10px;
        transition: all .2s ease;
        opacity: .9;
    }

    .main-nav a:hover {
        background: #1e2430;
        opacity: 1
    }

    .main-nav a.active {
        background: #1f2533;
        color: #fff;
        outline: 1px solid var(--border)
    }

    .badge {
        margin-left: 6px;
        background: #4a586eff;
        color: #c9d3e5;
        padding: 2px 8px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
    }

    /* USER */
    .user-section {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 6px;
    }

    .user-section span {
        color: #d7deea;
        font-size: 13px;
        font-style: normal;
        padding: 6px 10px;
        background: #1a1f2a;
        border-radius: 10px;
    }

    .btn,
    .user-section a,
    .user-section button {
        background: #fff;
        color: #111;
        border: none;
        padding: 8px 14px;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        font-size: 14px;
        transition: transform .08s ease, background .2s ease, color .2s ease;
    }

    .btn:hover,
    .user-section a:hover,
    .user-section button:hover {
        background: var(--brand);
        color: #fff;
        cursor: pointer;
        transform: translateY(-1px);
    }

    .btn-ghost {
        background: transparent;
        color: #e7ecf5;
        border: 1px solid var(--border);
    }

    .btn-ghost:hover {
        background: #202635;
        color: #fff
    }

    /* MOBILE */
    .hamburger {
        display: none;
        appearance: none;
        background: var(--card);
        border: 1px solid var(--border);
        color: #e7ecf5;
        padding: 10px 12px;
        border-radius: 12px;
        font-weight: 800;
    }

    @media (max-width: 900px) {
        .main-nav {
            display: none
        }

        .hamburger {
            display: inline-flex
        }
    }

    /* Mobile menu panel */
    .mobile-panel {
        display: none;
        position: fixed;
        top: 64px;
        left: 0;
        right: 0;
        z-index: 999;
        background: var(--bg);
        border-top: 1px solid var(--border);
        padding: 12px 4%;
    }

    .mobile-panel.open {
        display: block
    }

    .mobile-panel .mnav,
    .mobile-panel .muser {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin: 10px 0;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 10px;
    }

    .mobile-panel a,
    .mobile-panel button {
        text-align: left;
        background: transparent;
        color: #e7ecf5;
        border: 1px solid transparent;
        padding: 10px 12px;
        border-radius: 10px;
        font-weight: 600;
    }

    .mobile-panel a:hover,
    .mobile-panel button:hover {
        background: #1f2533
    }

    .mobile-panel a.active {
        background: #1f2533
    }
</style>

<header class="main-header">
    <div class="container">
        <div class="brand">
            <div class="logo-tag">POLY </div>
            <small>store</small>
        </div>

        <button class="hamburger" id="hamburger" aria-label="Mở menu">☰</button>

        <div class="nav-wrap">
            <nav class="main-nav">
                <a href="?act=home" class="<?= $currentAct === 'home' ? 'active' : '' ?>">Trang Chủ</a>
                <a href="?act=products" class="<?= $currentAct === 'products' ? 'active' : '' ?>">Sản Phẩm</a>
                <a href="?act=contact" class="<?= $currentAct === 'contact' ? 'active' : '' ?>">Liên hệ</a>
                <a href="?act=about" class="<?= $currentAct === 'about' ? 'active' : '' ?>">Giới Thiệu</a>
            </nav>

            <div class="user-section">
                <?php if (!empty($_SESSION['user'])): ?>
                    <span>Chào <?= htmlspecialchars($_SESSION['user']['email'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>

                    <?php if (!empty($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                        <a class="btn-ghost" href="http://localhost/duanmau1/index.php?act=admin">Trang Admin</a>
                    <?php endif; ?>

                    <a href="?act=logout">Đăng xuất</a>
                <?php else: ?>
                    <a class="btn-ghost" href="?act=login">Đăng nhập</a>
                    <a href="?act=register">Đăng ký</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Mobile panel -->
    <div class="mobile-panel" id="mobilePanel">
        <div class="mnav">
            <a href="?act=home" class="<?= $currentAct === 'home' ? 'active' : '' ?>">Trang Chủ</a>
            <a href="?act=product" class="<?= $currentAct === 'product' ? 'active' : '' ?>">Sản Phẩm</a>
            <a href="?act=contact" class="<?= $currentAct === 'contact' ? 'active' : '' ?>">Liên hệ</a>
            <a href="?act=about" class="<?= $currentAct === 'about' ? 'active' : '' ?>">Giới Thiệu</a>
        </div>

        <div class="muser">
            <?php if (!empty($_SESSION['user'])): ?>
                <a>👋 <?= htmlspecialchars($_SESSION['user']['email'] ?? '', ENT_QUOTES, 'UTF-8') ?></a>
                <?php if (!empty($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                    <a href="http://localhost/duanmau1/index.php?act=admin">Trang Admin</a>
                <?php endif; ?>
                <a href="?act=logout">Đăng xuất</a>
            <?php else: ?>
                <a href="?act=login">Đăng nhập</a>
                <a href="?act=register">Đăng ký</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<script>
    // Toggle mobile menu
    const btn = document.getElementById('hamburger');
    const panel = document.getElementById('mobilePanel');
    btn?.addEventListener('click', () => panel.classList.toggle('open'));

    // Đóng khi click bên ngoài (nhẹ nhàng)
    document.addEventListener('click', (e) => {
        if (!panel.contains(e.target) && e.target !== btn && panel.classList.contains('open')) {
            panel.classList.remove('open');
        }
    }, true);
</script>