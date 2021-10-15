# GE-Symfony

Gestionnaire d'entreprise avec Symfony - TP EPSI 2021

## 🛠️ Prérequis

- Composer
- Xampp *(ou équivalent)*
- PHP

## 🏗️ Installation

Modifiez dans le ``.env`` la ligne 31 en indiquant votre base de données, son port, etc.

Utilisez ces trois commandes après avoir cloné le repo pour installer le projet chez vous :

```bash
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migration:migrate
```
