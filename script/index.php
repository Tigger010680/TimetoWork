<?php
/**
 * TimetoWork - Mobiles Haupt-Dashboard
 * Dieses Skript stellt das grobe Layout für die Baustellen- und Zeiterfassung dar.
 */

// Bindet unsere Pfade und Ordner-Logik ein
require_once __DIR__ . '/config.php';

// Beispiel-Daten (später dynamisch aus der JSON)
$aktuelle_baustellen = [
    ['site_number' => 'B-2026-001', 'client' => 'Stadtwerke Musterstadt'],
    ['site_number' => 'B-2026-002', 'client' => 'Telekom Breitband GmbH']
];
?>

<!-- START: TimetoWork App-Container -->
<div class="ttw-app-container">
    
    <!-- 1. Header-Bereich (Info-Bar) -->
    <div class="ttw-card ttw-header-bar">
        <h3>⏱️ TimetoWork Dashboard</h3>
        <p><strong>Status:</strong> Aktuell nicht eingestempelt</p>
        <p><strong>Capo:</strong> Max Mustermann</p>
    </div>

    <!-- 2. Haupt-Stempelbereich (Buttons) -->
    <div class="ttw-card">
        <h4>🔄 Status stempeln</h4>
        
        <!-- Auswahl der Baustelle für den nächsten Schritt -->
        <div class="ttw-form-group">
            <label for="ttw-site-select"><strong>Baustelle auswählen:</strong></label>
            <select id="ttw-site-select" class="ttw-select">
                <option value="">-- Keine Baustelle (z.B. Fahrtzeit zur Firma) --</option>
                <?php foreach ($aktuelle_baustellen as $site): ?>
                    <option value="<?php echo htmlspecialchars($site['site_number']); ?>">
                        <?php echo htmlspecialchars($site['site_number'] . ' - ' . $site['client']); ?>
                    </option>
                <?php endphp; ?>
            </select>
        </div>

        <!-- Große, smartphone-freundliche Button-Matrix -->
        <div class="ttw-button-grid">
            <button class="ttw-btn ttw-btn-green">🟢 Beginn Firma</button>
            <button class="ttw-btn ttw-btn-blue">🚚 Abfahrt Firma</button>
            <button class="ttw-btn ttw-btn-blue">🏗️ Ankunft Baustelle</button>
            <button class="ttw-btn ttw-btn-orange">⏸️ Pause Start</button>
            <button class="ttw-btn ttw-btn-orange">▶️ Pause Ende</button>
            <button class="ttw-btn ttw-btn-blue">🚚 Abfahrt Baustelle</button>
            <button class="ttw-btn ttw-btn-blue">🏢 Ankunft Ziel</button>
            <button class="ttw-btn ttw-btn-red">🔴 Feierabend</button>
        </div>
    </div>

    <!-- 3. Beschreibung / Tagesbericht -->
    <div class="ttw-card">
        <h4>📝 Tagesbericht / Beschreibung</h4>
        <div class="ttw-form-group">
            <textarea class="ttw-textarea" placeholder="Was wurde heute gemacht? Besonderheiten, Kabelzug-Meter..."></textarea>
        </div>
        <button class="ttw-btn ttw-btn-gray">Bericht speichern</button>
    </div>

</div>
<!-- ENDE: TimetoWork App-Container -->

<!-- Ein einfaches, isoliertes CSS, das sich nicht mit dem CMS beißt -->
<style>
.ttw-app-container {
    max-width: 600px;
    margin: 0 auto;
    font-family: sans-serif;
    padding: 10px;
}
.ttw-card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}
.ttw-header-bar {
    background: #f8f9fa;
    border-left: 5px solid #239B56;
}
.ttw-header-bar h3 { margin: 0 0 10px 0; }
.ttw-header-bar p { margin: 5px 0; font-size: 14px; }

.ttw-form-group {
    margin-bottom: 15px;
}
.ttw-select, .ttw-textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.ttw-textarea {
    height: 100px;
    resize: vertical;
}

/* Die Button-Matrix für mobile Daumen-Bedienung */
.ttw-button-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-top: 10px;
}
.ttw-btn {
    padding: 15px 10px;
    font-size: 15px;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    color: white;
    text-align: center;
}
/* Farb-Klassen für die Übersicht */
.ttw-btn-green { background-color: #28a745; }
.ttw-btn-blue { background-color: #007bff; }
.ttw-btn-orange { background-color: #fd7e14; }
.ttw-btn-red { background-color: #dc3545; }
.ttw-btn-gray { background-color: #6c757d; width: 100%; }

.ttw-btn:active {
    opacity: 0.8;
}
</style>
