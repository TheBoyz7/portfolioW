<?php
// Define 20 project idea templates
$templates = [
  [
    "title" => "TradeSphere",
    "description" => "A comprehensive trading dashboard for real‑time stock market analysis and portfolio management.",
    "language" => "JavaScript & PHP"
  ],
  [
    "title" => "CryptoCorner",
    "description" => "A crypto portfolio tracker with interactive charts and aggregated news for digital assets.",
    "language" => "JavaScript & PHP"
  ],
  [
    "title" => "DegenTrader Hub",
    "description" => "A social network and forum dedicated to sharing degen trading strategies and insights.",
    "language" => "JavaScript & PHP"
  ],
  [
    "title" => "MarketMaven",
    "description" => "A stock market simulator where users can practice trading with virtual funds.",
    "language" => "PHP"
  ],
  [
    "title" => "YieldGuru",
    "description" => "A DeFi yield aggregator that compares farming opportunities across platforms.",
    "language" => "JavaScript & PHP"
  ],
  [
    "title" => "NFT Nexus",
    "description" => "An NFT marketplace for buying, selling, and showcasing digital art collections.",
    "language" => "JavaScript & PHP"
  ],
  [
    "title" => "TradeTutor",
    "description" => "An educational portal offering courses, webinars, and tutorials on trading strategies.",
    "language" => "HTML/CSS, JavaScript"
  ],
  [
    "title" => "AlgoArena",
    "description" => "A platform for algorithmic trading challenges and coding competitions to sharpen your skills.",
    "language" => "JavaScript, Python"
  ],
  [
    "title" => "ForexFlow",
    "description" => "A website that simulates foreign exchange trading with real‑time analytics and insights.",
    "language" => "PHP"
  ],
  [
    "title" => "Emberz Blog",
    "description" => "A sleek personal blog for sharing tech insights, trading tips, and development stories.",
    "language" => "HTML/CSS, PHP"
  ],
  [
    "title" => "CodeCrafters",
    "description" => "A platform for showcasing coding projects and sharing your developer portfolio.",
    "language" => "HTML/CSS, JavaScript"
  ],
  [
    "title" => "StockSignal",
    "description" => "A site that aggregates expert stock signals and market analysis in real time.",
    "language" => "JavaScript & PHP"
  ],
  [
    "title" => "InvestInsight",
    "description" => "A financial news and analysis portal that offers interactive charts and market commentary.",
    "language" => "HTML/CSS, JavaScript, PHP"
  ],
  [
    "title" => "Trader's Toolkit",
    "description" => "A resource hub packed with trading calculators, market indicators, and portfolio tools.",
    "language" => "HTML/CSS, JavaScript"
  ],
  [
    "title" => "QuantQuest",
    "description" => "A quantitative finance research portal featuring data visualizations and analytics tools.",
    "language" => "JavaScript, Python"
  ],
  [
    "title" => "DeFi Dive",
    "description" => "A deep‑dive portal into decentralized finance projects, reviews, and trend analyses.",
    "language" => "JavaScript & PHP"
  ],
  [
    "title" => "MarketPulse",
    "description" => "A sentiment analysis website that tracks social media trends and stock market chatter.",
    "language" => "JavaScript & PHP"
  ],
  [
    "title" => "VirtualBroker",
    "description" => "A simulated online brokerage where users can test trading strategies in a risk‑free environment.",
    "language" => "PHP"
  ],
  [
    "title" => "CryptoChronicle",
    "description" => "A dedicated news aggregator for the latest happenings in cryptocurrency markets.",
    "language" => "HTML/CSS, JavaScript"
  ],
  [
    "title" => "EconoEdge",
    "description" => "A business and economics analysis website offering interactive models and market data.",
    "language" => "HTML/CSS, JavaScript, PHP"
  ]
];

// Generate 100 portfolio items by cycling through the templates
$portfolio_items = [];
for ($i = 1; $i <= 100; $i++) {
    $template = $templates[($i - 1) % count($templates)];
    $edition = floor(($i - 1) / count($templates)) + 1;
    $portfolio_items[] = [
         "id"          => $i,
         "title"       => $template["title"] . " - Edition " . $edition,
         "description" => $template["description"] . " (Project #" . $i . ")",
         "language"    => $template["language"]
    ];
}

// Extract unique language categories for filter buttons
$language_set = [];
foreach ($portfolio_items as $item) {
    $language_set[$item['language']] = true;
}
$unique_languages = array_keys($language_set);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emberz Technology Portfolio</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Animate.css for header animations -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body {
      background: #111;
      color: #eee;
      font-family: Arial, sans-serif;
    }
    header {
      padding: 20px;
      text-align: center;
    }
    .portfolio-item {
      background: #222;
      border: 1px solid #333;
      border-radius: 8px;
      padding: 20px;
      margin: 10px 0;
      transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .portfolio-item:hover {
      transform: scale(1.05);
    }
    .filter-btn {
      margin: 5px;
    }
    /* Animated entrance for larger screens */
    @media (min-width: 768px) {
      .portfolio-item {
         opacity: 0;
         transform: translateY(20px);
         animation: fadeInUp 0.6s forwards;
      }
      @keyframes fadeInUp {
         to {
            opacity: 1;
            transform: translateY(0);
         }
      }
    }
    /* Simplified display for mobile */
    @media (max-width: 767px) {
      .portfolio-item {
         opacity: 1;
         transform: none;
      }
    }
  </style>
</head>
<body>
  <!-- Header Section -->
  <header>
    <h1 class="animate__animated animate__fadeInDown">Emberz Technology Portfolio</h1>
    <p>A futuristic showcase of 100 innovative website projects built by a degen trader & software engineer.</p>
    <!-- Filter Buttons -->
    <div id="filter-buttons" class="d-flex justify-content-center flex-wrap">
      <button class="btn btn-primary filter-btn" data-filter="all">All</button>
      <?php foreach($unique_languages as $lang): ?>
         <button class="btn btn-secondary filter-btn" data-filter="<?= htmlspecialchars($lang) ?>"><?= htmlspecialchars($lang) ?></button>
      <?php endforeach; ?>
    </div>
  </header>

  <!-- Portfolio Grid -->
  <div class="container">
    <div class="row" id="portfolio-grid">
      <?php foreach($portfolio_items as $item): ?>
      <div class="col-md-4 portfolio-item" data-language="<?= htmlspecialchars($item['language']) ?>">
        <h3><?= htmlspecialchars($item['title']) ?></h3>
        <p><?= htmlspecialchars($item['description']) ?></p>
        <p><strong>Tech:</strong> <?= htmlspecialchars($item['language']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Filter functionality
    document.addEventListener("DOMContentLoaded", function(){
      const filterButtons = document.querySelectorAll(".filter-btn");
      const portfolioItems = document.querySelectorAll(".portfolio-item");
      
      filterButtons.forEach(btn => {
        btn.addEventListener("click", function(){
          const filter = this.getAttribute("data-filter");
          portfolioItems.forEach(item => {
            if(filter === "all" || item.getAttribute("data-language") === filter) {
              item.style.display = "block";
            } else {
              item.style.display = "none";
            }
          });
          // Update active button styling
          filterButtons.forEach(b => b.classList.remove("btn-primary"));
          this.classList.add("btn-primary");
        });
      });
    });
  </script>
</body>
</html>
