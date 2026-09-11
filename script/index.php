<?php
/**
 * TimetoWork - Mobiles Haupt-Dashboard
 * Dieses Skript stellt das grobe Layout fÃ¼r die Baustellen- und Zeiterfassung dar.
 * Optimiert fÃ¼r die Integration in ein bestehendes CMS.
 */

// Bindet unsere Pfade und Ordner-Logik ein
require_once __DIR__ . '/config.php';

// Beispiel-Daten (Werden in den nÃ¤chsten Sitzungen dynamisch aus /data/baustellen/)
$aktuelle_baustellen = [
    ['site_number' => 'B-2026-001', 'client' => 'Stadtwerke Musterstadt'],
    ['site_number' => 'B-2026-002', 'client' => 'Telekom Breitband GmbH']
];
?>

<!-- START: TimetoWork App-Container (Isoliert fÃ¼r CMS-Einbindung) -->
<div class="ttw-app-container">
    
    <!-- 1. Header-Bereich (Info-Bar) -->
    <div class="ttw-card ttw-header-bar">
        <h3 class="ttw-title">â±ï¸ TimetoWork Dashboard</h3>
        <p class="ttw-text"><strong>Status:</strong> Aktuell nicht eingestempelt</p>
        <p class="ttw-text"><strong>Capo:</strong> Max Mustermann</p>
    </div>

    <!-- 2. Haupt-Stempelbereich (Buttons) -->
    <div class="ttw-card">
        <h4 class="ttw-subtitle">ðŸ”„ Status stempeln</h4>
        
        <!-- Auswahl der Baustelle fÃ¼r den nÃ¤chsten Schritt -->
        <div class="ttw-form-group">
            <label for="ttw-site-select" class="ttw-label"><strong>Baustelle auswÃ¤hlen:</strong></label>
            <select id="ttw-site-select" class="ttw-select">
                <option value="">-- Keine Baustelle (z.B. Fahrtzeit zur Firma) --</option>
                <?php foreach ($aktuelle_baustellen as $site): ?>
                    <option value="<?php echo htmlspecialchars($site['site_number']); ?>">
                        <?php echo htmlspecialchars($site['site_number'] . ' - ' . $site['client']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- GroÃŸe, smartphone-freundliche Button-Matrix fÃ¼r Daumen-Bedienung -->
        <div class="ttw-button-grid">
            <button type="button" class="ttw-btn ttw-btn-green">ðŸŸ¢ Beginn Firma</button>
            <button type="button" class="ttw-btn ttw-btn-blue">ðŸšš Abfahrt Firma</button>
            <button type="button" class="ttw-btn ttw-btn-blue">ðŸ—ï¸ Ankunft Baustelle</button>
            <button type="button" class="ttw-btn ttw-btn-orange">â¸ï¸ Pause Start</button>
            <button type="button" class="ttw-btn ttw-btn-orange">â–¶ï¸ Pause Ende</button>
            <button type="button" class="ttw-btn ttw-btn-blue">ðŸšš Abfahrt Baustelle</button>
            <button type="button" class="ttw-btn ttw-btn-blue">ðŸ¢ Ankunft Ziel</button>
            <button type="button" class="ttw-btn ttw-btn-red">ðŸ”´ Feierabend</button>
        </div>
    </div>

    <!-- 3. Beschreibung / Tagesbericht -->
    <div class="ttw-card">
        <h4 class="ttw-subtitle">ðŸ“ Tagesbericht / Beschreibung</h4>
        <div class="ttw-form-group">
            <textarea class="ttw-textarea" placeholder="Was wurde heute gemacht? Besonderheiten, Kabelzug-Meter..."></textarea>
        </div>
        <button type="button" class="ttw-btn ttw-btn-gray">Bericht speichern</button>
    </div>

</div>
<!-- ENDE: TimetoWork App-Container -->

<!-- Gekapseltes CSS, damit das CMS-Design unberÃ¼hrt bleibt -->
<style>
.ttw-app-container {
    max-width: 600px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
    padding: 10px;
    box-sizing: border-box;
}
.ttw-app-container * {
    box-sizing: border-box;
}
.ttw-card {
    background: #ffffff;
    border: 1px solid #dddddd;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}
.ttw-header-bar {
    background: #f8f9fa;
    border-left: 5px solid #28a745;
}
.ttw-title { margin: 0 0 10px 0; font-size: 20px; color: #333; }
.ttw-subtitle { margin: 0 0 12px 0; font-size: 16px; color: #444; }
.ttw-text { margin: 5px 0; font-size: 14px; color: #555; }
.ttw-label { display: block; margin-bottom: 6px; font-size: 14px; }

.ttw-form-group {
    margin-bottom: 15px;
}
.ttw-select, .ttw-textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    font-size: 14px;
    background-color: #fff;
}
.ttw-textarea {
    height: 100px;
    resize: vertical;
}

/* GroÃŸe Touch-FlÃ¤chen fÃ¼r den harten Baustelleneinsatz */
.ttw-button-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-top: 10px;
}
.ttw-btn {
    padding: 18px 10px;
    font-size: 15px;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    color: #ffffff;
    text-align: center;
    transition: background 0.1s ease;
}
.ttw-btn-green { background-color: #28a745; }
.ttw-btn-blue { background-color: #007bff; }
.ttw-btn-orange { background-color: #fd7e14; }
.ttw-btn-red { background-color: #dc3545; }
.ttw-btn-gray { background-color: #6c757d; width: 100%; }

.ttw-btn:active {
    transform: scale(0.98);
    opacity: 0.9;
}
</style>
