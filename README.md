# 🗒️ Mein Laravel-Projekt – Notizen-App

Dies ist ein kleines Laravel-Projekt, das es ermöglicht, persönliche Notizen zu verwalten.  
Man kann Notizen erstellen, anzeigen, bearbeiten und löschen.  
Bevor Sie eine Notiz löschen, können Sie sie in den Papierkorb verschieben.  
Dort können Sie die Notiz wiederherstellen, bearbeiten oder endgültig löschen.

## ⚙️ Funktionen

- Neue Notiz erstellen
- Notizen anzeigen
- Notiz bearbeiten
- Notiz in den Papierkorb verschieben
- Notiz aus dem Papierkorb wiederherstellen
- Notiz endgültig löschen
- Jeder Benutzer kann nur seine eigenen Notizen sehen und bearbeiten

## 💻 Installation

1. Repository klonen:
   ```bash
   git clone https://github.com/AbdeslamAn/Notizen-App.git

2. In das Projektverzeichnis wechseln:
cd Notizen-App


3. Abhängigkeiten installieren:
composer install
npm install
npm run dev


4. Datenbank konfigurieren:
- `.env`-Datei erstellen (`cp .env.example .env`)
- Datenbankdaten eintragen

5. Migrationen ausführen:
php artisan migrate


6. Server starten:
php artisan serve


## 👤 Benutzer

Nur registrierte Benutzer können Notizen erstellen und verwalten.  
Laravel Breeze wurde für die Authentifizierung verwendet.

## 📝 Lizenz

Dieses Projekt ist unter der MIT-Lizenz veröffentlicht.



