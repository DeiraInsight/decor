# ⚡ DECOR Framework

**Build faster, scale seamlessly, and code with absolute confidence.**

Welcome to **DECOR** — a meticulously curated Hybrid Native PHP Boilerplate engineered for speed, uncompromising security, and elegant simplicity. Built entirely on a robust Podman/Docker containerized infrastructure, DECOR harnesses the power of industry-leading open-source libraries while ruthlessly eliminating the bloatware typically found in giant monolithic frameworks.

---

## 🧭 Core Philosophy

| Principle | Description |
|-----------|-------------|
| ⚡ **Lightweight & Fast** | Zero unnecessary dependencies. Engineered for lightning-fast execution and optimal memory efficiency. |
| 🛡️ **Uncompromising Security** | Peace of mind out of the box — context-aware XSS protection via the Latte Engine and robust anti-SQL injection powered by Medoo. |
| 🚀 **Enterprise-Ready** | A pristine MVC architecture harmonized with Bramus Router, delivering enterprise-grade performance and scalability. |
| 🔓 **True Open Source** | Complete freedom and ownership. Free to use for both personal passion projects and commercial masterpieces. |

---

## 🧰 Technology Stack

- **Infrastructure** : Podman / Docker (PHP 8.2 & PostgreSQL 15)
- **Routing** : Bramus Router — elegant, object-oriented routing syntax
- **ORM / Database** : Medoo Framework — the lightest and most agile database access layer
- **Template Engine** : Latte Engine — ultra-secure, context-aware PHP templating
- **Mail System** : PHPMailer — the industry standard for reliable SMTP delivery

---

## 📁 Directory Structure
| Direktori | Fungsi |
|-----------|--------|
| `app/` | Application logic — core Controllers and Models |
| `config/` | Baseline system and environment configurations |
| `public/` | Document root (entry point: `index.php` & `.htaccess`) |
| `resources/views/` | Presentation layer — Latte Engine UI templates |
| `routes/` | Centralized URL routing definitions (`web.php`) |
| `storage/` | Secure cache, temporary data, and uploads (⚠️ ignored in Git) |
| `vendor/` | External Composer dependencies (⚠️ ignored in Git) |

---

## 💻 System Requirements

| Component | Specification |
|-----------|---------------|
| **OS** | Linux (Fedora, Ubuntu, CentOS), macOS, or Windows (via WSL2) |
| **RAM** | Minimum 4GB recommended for smooth container orchestration |
| **Prerequisites** | **Podman** + `podman-compose` **OR** **Docker** + `docker-compose` installed |

---

## ⚙️ Quick Start (Installation)

Thanks to DECOR's zero-config containerization, you do **not** need to install PHP or databases locally. Follow these steps to get your application up and running in minutes.


### Step 1: Clone & Environment Setup
Clone the repository, navigate into your project, and initialize the environment variables.

```bash
git clone https://github.com/deirainsight/decor.git your-new-project
cd your-new-project
cp .env.example .env
```



### Step 2: Initialize Infrastructure

Build and ignite the containerized web server and database.
```bash
podman-compose up -d --build
```

### Step 3: Install Core Dependencies

Pull the required PHP libraries securely inside the dynamic application container.
```bash
podman-compose exec app composer install
```

Step 4: Secure the Storage Layer

Transfer ownership to the web server and enforce production-ready security permissions.
```bash

podman-compose exec app chown -R www-data:www-data /var/www/html/storage
podman-compose exec app chmod -R 775 /var/www/html/storage
```

### Step 5: Access the Application

Open your favorite web browser and witness your new masterpiece at:
plaintext
```bash
http://localhost:5351
```

    Note: The port and database credentials can be customized entirely within your .env file.

### 🧹 Uninstall Guide

If you need to completely remove the project, you must handle the securely locked storage folder with advanced privileges.
Step 1: Stop and Clean Containers
```bash

podman-compose down -v
```
### Step 2: Delete Project Folder

Move out of the project directory and execute one of the following commands based on your system:

### Option A (Podman Native - Recommended):
```bash

cd ..
podman unshare rm -rf your-new-project
```
### Option B (Linux sudo / Root):
```bash

cd ..
sudo rm -rf your-new-project
```
## 🙏 Open Source Credits & Acknowledgements

The DECOR Framework is built upon the extraordinary work of the open-source community. We proudly acknowledge and thank the creators and maintainers of the following core libraries that power this starter kit.

---

### 📦 Core Dependencies & Licenses

| Library | Version | License | Description |
| :--- | :--- | :--- | :--- |
| **[bramus/router](https://github.com/bramus/router)** | `v1.6.1` | **MIT** | A lightweight, object-oriented PHP routing engine. Handles all HTTP requests and endpoint mapping with elegant, Laravel-like syntax ready for enterprise scale. |
| **[catfan/medoo](https://github.com/catfan/Medoo)** | `v2.5.0` | **MIT** | The lightest and most agile PHP database framework. Serves as the core ORM layer, delivering optimized database access with robust SQL-Injection protection out of the box. |
| **[latte/latte](https://github.com/nette/latte)** | `v3.1.6` | **BSD-3-Clause** | An exceptionally secure and intuitive template engine. Enforces clean separation of PHP logic and HTML design with context-aware, automated smart XSS protection. |
| **[phpmailer/phpmailer](https://github.com/PHPMailer/PHPMailer)** | `v6.12.0` | **LGPL-2.1** | The industry-standard email creation and transport class. Integrated to ensure reliable, secure, and authenticated SMTP email delivery for enterprise requirements. |

---

> [!NOTE]
> **Legal Disclaimer:** The DECOR Boilerplate itself is free to use for both personal and commercial projects. However, developers are responsible for complying with the terms, conditions, and copyright notices of the respective open-source licenses mentioned above when deploying applications into production.
---

