<?php
/**
 * Global Header with Premium SEO
 */
require_once dirname(__DIR__) . '/config/config.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title><?php echo $page_title ?? 'MSTechPC - Komputery Gamingowe Częstochowa | Sklep i Serwis IT'; ?></title>
    <meta name="title" content="<?php echo $page_title ?? 'MSTechPC - Komputery Gamingowe Częstochowa'; ?>">
    <meta name="description" content="<?php echo $meta_description ?? 'MSTechPC - Profesjonalne komputery gamingowe, stacje robocze i serwis IT w Częstochowie. Składanie komputerów na zamówienie, serwis Kłobuck, doradztwo sprzętowe.'; ?>">
    <meta name="keywords" content="komputery Częstochowa, sklep komputerowy Częstochowa, komputery gamingowe Częstochowa, serwis komputerowy Częstochowa, składanie komputerów Częstochowa, MSTechPC, serwis komputerowy Kłobuck">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:title" content="<?php echo $page_title ?? 'MSTechPC - Komputery Gamingowe Częstochowa'; ?>">
    <meta property="og:description" content="Nowoczesny sklep i serwis komputerowy. Najlepsze zestawy gamingowe i stacje robocze w regionie Częstochowy.">
    <meta property="og:image" content="<?php echo ASSETS_PATH; ?>/img/og-image.jpg">

    <!-- Fonts & CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/components.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/animations.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo ASSETS_PATH; ?>/img/favicon.png">

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ComputerStore",
      "name": "MSTechPC",
      "description": "Najlepsze komputery gamingowe i serwis IT w Częstochowie.",
      "url": "<?php echo SITE_URL; ?>",
      "telephone": "<?php echo SITE_PHONE; ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "ul. Przykładowa 1",
        "addressLocality": "Częstochowa",
        "postalCode": "42-200",
        "addressCountry": "PL"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 50.8118,
        "longitude": 19.1203
      }
    }
    </script>
</head>
<body class="dark-theme">
    <?php include 'navbar.php'; ?>
