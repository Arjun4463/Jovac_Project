# JOVAC XSS Demo (PHP + MySQL)

This project demonstrates *Reflected and Stored Cross-Site Scripting (XSS)* attacks and their mitigation using PHP and MySQL.

---

## 📁 Project Structure


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


---

## ⚙ Technologies Used

- *PHP*: Backend scripting
- *MySQL*: Database storage
- *HTML/CSS*: Frontend
- *XAMPP*: Local server for Apache & MySQL

---

## 🚀 How to Run

1. Install *XAMPP* and start Apache & MySQL.
2. Copy project into:  
   C:/xampp/htdocs/
3. Create a database named *xss_demo* in phpMyAdmin.
4. Import the provided SQL file.
5. Run with:  
   
   php -S localhost:8000 -t C:/xampp/htdocs/xss-php-demo
   
6. Open *http://localhost:8000*.

---

## 🧪 Demonstration

### 🔹 Reflected XSS  
Try:
html
<script>alert('XSS')</script>


### 🔹 Stored XSS  
Submit the payload in guestbook.

### 🔹 Safe Versions  
Try same inputs — you’ll see escaping prevents script execution.

---

## 🧠 Key Learnings

- Difference between Reflected and Stored XSS  
- Importance of sanitization  
- PHP–MySQL security practices  

---

## 📚 References

- OWASP XSS Prevention Cheat Sheet  
- PHP htmlspecialchars() / htmlentities()  
- XAMPP Documentation
