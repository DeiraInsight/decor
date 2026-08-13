# ⚡ Decor Framework (Starter Kit)

*(🇬🇧 English | 🇹🇱 Tetun)*

## 1. About Decor / Kona-ba Decor

**[EN]** Decor is a Hybrid Native PHP Boilerplate/Starter Kit designed specifically for speed, security, and simplicity. Built entirely on Podman/Docker infrastructure, Decor combines the power of the best Open Source libraries without the bloatware of giant frameworks.

**[TET]** Decor mak Boilerplate / Starter Kit PHP Native Hybrid ne'ebé dezeña espesialmente ba velosidade, seguransa, no simplisidade. Harii tomak iha infrastruktura Podman/Docker nia leten, Decor kombina kbiit husi library Open Source di'ak liu hotu la hodi todan husi framework bo'ot sira.

---

## 2. Philosophy / Filosofia Decor

**[EN]**
- ⚡ **Lightweight:** Zero useless dependencies. Built for lightning-fast execution and low RAM usage.
- 🛡️ **Secure:** Smart XSS protection built into Latte Engine and Anti SQL-Injection from Medoo.
- 🚀 **Powerful:** Pure MVC structure combined with Bramus Router, ready for Enterprise scale.
- 🔓 **Open Source:** Code is completely yours. Free to use for personal and commercial applications.

**[TET]**
- ⚡ **Kmaan (Ringan):** Laiha dependénsia ne'ebé la presiza. Harii atu halai ho lailais no uza RAM uitoan.
- 🛡️ **Seguru (Aman):** Protesaun XSS ne'ebé matenek husi Latte Engine no kontra SQL-Injection husi Medoo.
- 🚀 **Kbiit (Powerful):** Estrutura MVC murni hamutuk ho Bramus Router, prontu ba eskala Emprezariál.
- 🔓 **Open Source:** Kódigu ne'e ita-nian rasik. Livre atu uza ba aplikasaun pesoál ka komersiál.

---

## 3. Technology Architecture / Arkitetura Teknolojia

**[EN]**
- **Infrastructure:** Podman / Docker (PHP 8.2 & PostgreSQL 15).
- **Router:** Bramus Router (Elegant routing syntax like Laravel).
- **ORM / Database:** Medoo Framework (Lightweight database access).
- **Template Engine:** Latte Engine (Clean separation of PHP logic and HTML design).
- **Email:** PHPMailer (Industry standard for SMTP).

**[TET]**
- **Infrastruktura:** Podman / Docker (PHP 8.2 no PostgreSQL 15).
- **Router:** Bramus Router (Sintaxe elegante hanesan Laravel).
- **ORM / Database:** Medoo Framework (Aksesu database ne'ebé kmaan).
- **Template Engine:** Latte Engine (Haketak lójika PHP no dezeñu HTML ho moos).
- **Email:** PHPMailer (Standar indústria ba SMTP).

---

## 4. Quick Start (Installation) / Oinsá Instala

**[EN]** Since Decor uses full containerization, you don't need to install PHP or a database on your local machine. Just ensure you have **Podman** (or Docker) and `podman-compose`.
**[TET]** Tanba Decor uza kontainerizasaun tomak, ita la presiza instala PHP ka database iha ita-nia komputadór. Presiza de'it garante katak ita iha **Podman** (ka Docker) no `podman-compose`.

### Step 1 / Pasu 1: Clone Repository
```bash
git clone [https://github.com/deirainsight/decor.git](https://github.com/deirainsight/decor.git) your-new-project
cd your-new-project