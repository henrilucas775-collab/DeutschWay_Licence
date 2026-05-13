    <header>
      <nav style="padding: 0.5rem 5%;">
        <a href="index.php" class="logo text-primary">DEUTSCH<span
            class="text-white">WAY</span></a>

        <button class="mobile-menu-toggle show-mobile" onclick="toggleMobileMenu()" aria-label="Ouvrir le menu" aria-expanded="false">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </button>

        <ul class="nav-links">
          <li><a href="index.php" id="nav-home">ACCUEIL</a></li>
          <li class="dropdown">
            <a href="#" id="nav-parcours" onclick="return false;" aria-haspopup="true" aria-expanded="false">PARCOURS ▾</a>
            <div class="dropdown-content glass" role="menu">
              <a href="niveau-zero.php">NIVEAU ZÉRO </a>
              <a href="parcours-fondation.php">FONDATIONS (A1-B1)</a>
              <a href="immersion.php">IMMERSION (B2-C1)</a>
            </div>
          </li>
          <li><a href="communaute.php" id="nav-communaute">COMMUNAUTÉ</a></li>
          <li><a href="apropos.php" id="nav-apropos">À PROPOS</a></li>
        </ul>

        <div class="auth-buttons">
          <a href="login.php" class="btn" style="border: none;">CONNEXION</a>
          <a href="signup.php" class="btn btn-primary neon-box">S'INSCRIRE</a>
        </div>
      </nav>
    </header>

    <main id="main-content">
