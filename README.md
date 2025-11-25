# Building a Web-Based Platform for Demonstrating Reflected and Stored XSS Attacks with Mitigations

This project demonstrates **Reflected and Stored Cross-Site Scripting (XSS)** vulnerabilities and their mitigation using **PHP and MySQL**.  
It is designed to help students understand how XSS works, how attackers exploit vulnerabilities, and how to protect web applications.

---

## 👥 Student Details

### **Team Leader**
- **Name:** Arjun  
- **Roll No.:** 2315000414  

### **Team Members**
- **Name:** Sourav Yadav  
  **Roll No.:** 2315002197  

- **Name:** Malkeet Singh  
  **Roll No.:** 2315001301  

- **Name:** Mithi Kumar  
  **Roll No.:** 2315001363  

---

## 📁 Project Structure

├── index.php
├── db.php
├── public/
│ └── styles.css
├── vuln/
│ ├── search.php (Reflected XSS)
│ └── guestbook.php (Stored XSS)
└── safe/
├── search.php (Mitigated Reflected XSS)
└── guestbook.php (Mitigated Stored XSS)




---

## ⚙ Technologies Used

- **PHP** – Server-side scripting  
- **MySQL** – Database backend  
- **HTML/CSS** – Frontend  
- **XAMPP** – Local environment for Apache & MySQL  

---

## 🚀 How to Run the Project

1. Install **XAMPP** and start **Apache** & **MySQL**.  
2. Copy the project folder into:  
   `C:/xampp/htdocs/`  
3. Create a new database named **xss_demo** in phpMyAdmin.  
4. Import the provided SQL file to create the `guestbook` table.  
5. Start the PHP development server:

php -S localhost:8000 -t C:/xampp/htdocs/xss-php-demo



6. Open the project in your browser:  
   👉 http://localhost:8000

---

## 🧪 Demonstration (XSS Testing)

### **Reflected XSS Test**
Enter the following into the vulnerable search page:

<script>alert('XSS')</script>

### **Stored XSS Test**
Submit the same payload into the guestbook form.  

### **Mitigated Pages**
The safe versions escape input and prevent script execution.

---

## 🧠 Key Learnings

- Difference between **Reflected** and **Stored** XSS  
- How attackers inject malicious scripts  
- How **sanitization** and **escaping** mitigate XSS  
- Understanding **PHP–MySQL** communication  
- Security best practices for input handling  

---

## 📚 References

- OWASP XSS Prevention Cheat Sheet  
- PHP Manual — `htmlspecialchars()` & `htmlentities()`  
- XAMPP Documentation  

---

