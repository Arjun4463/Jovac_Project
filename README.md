 JOVAC  XSS Demo (PHP + MySQL)
This project demonstrates Reflected and Stored Cross-Site Scripting (XSS) attacks and their mitigation using PHP and MySQL. The goal is to understand how XSS works, how attackers exploit vulnerabilities, and how to secure web applications.
📁 Project Structure
├── index.php
├── db.php
├── public/
│   └── styles.css
├── vuln/
│   ├── search.php (Reflected XSS)
│   └── guestbook.php (Stored XSS)
└── safe/
    ├── search.php (Mitigated Reflected XSS)
    └── guestbook.php (Mitigated Stored XSS)

⚙️ Technologies Used
- PHP: Backend scripting for server-side processing.
- MySQL: Database for storing guestbook messages.
- HTML/CSS: Frontend interface for interacting with the web pages.
- XAMPP: Local server environment for running Apache and MySQL.

🚀 How to Run
1. Install XAMPP and start Apache & MySQL.
2. Copy the project folder into `C:/xampp/htdocs/`.
3. Create a database named `xss_demo` in phpMyAdmin.
4. Import the provided SQL file to create the guestbook table.
5. Run the project using the command:
   php -S localhost:8000 -t C:/xampp/htdocs/xss-php-demo
6. Open http://localhost:8000 in your browser.
🧪 Demonstration
1. **Vulnerable Search**: Try inputting `<script>alert('XSS')</script>` to see the reflected XSS alert.
2. **Vulnerable Guestbook**: Submit the same payload to test stored XSS.
3. **Safe Versions**: Repeat the steps above to see how HTML escaping prevents script execution.
🧠 Key Learnings
- Understand how Reflected and Stored XSS differ.
- Learn how sanitization and escaping user input mitigates XSS.
- Gain knowledge about PHP–MySQL integration and security best practices.
📚 References
- OWASP XSS Prevention Cheat Sheet
- PHP Manual for htmlspecialchars() and htmlentities()
- XAMPP Documentation
