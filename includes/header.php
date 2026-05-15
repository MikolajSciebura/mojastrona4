<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $meta_description ?? 'MSTechPC - Profesjonalne komputery gamingowe i serwis IT w Częstochowie. Składanie PC, serwis i doradztwo.'; ?>">
    <meta name="keywords" content="komputery Częstochowa, serwis komputerowy Częstochowa, składanie komputerów, MSTechPC, Kłobuck">
    <meta name="author" content="MSTechPC">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo $page_title ?? 'MSTechPC - Komputery Gamingowe Premium'; ?>">
    <meta property="og:description" content="Nowoczesny sklep i serwis komputerowy. Najlepsze zestawy gamingowe w Częstochowie.">
    <meta property="og:image" content="/assets/img/og-image.jpg">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:type" content="website">

    <title><?php echo $page_title ?? 'MSTechPC - Komputery Gamingowe Częstochowa'; ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/animations.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">

    <!-- Scripts -->
    <script defer src="/assets/js/app.js"></script>
    <script defer src="/assets/js/animations.js"></script>

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ComputerStore",
      "name": "MSTechPC",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "ul. Przykładowa 1",
        "addressLocality": "Częstochowa",
        "postalCode": "42-200",
        "addressCountry": "PL"
      },
      "url": "https://mstechpc.pl",
      "telephone": "+48000000000",
      "openingHours": "Mo-Fr 09:00-17:00"
    }
    </script>
</head>
<body>
    <?php include 'navbar.php'; ?>
