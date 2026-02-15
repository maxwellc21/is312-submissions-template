# 📘 IS312 Capstone Project  
## Product Review Web Application  
### 14-Week Topic-Aligned Development & Submission Guide

**Unit:** IS312 – Web Application Development  
**Runtime Environment:** Replit (PHP Web Server)  
**Database:** SQLite (Free)  
**Submission Platform:** GitHub (Tags Required)

---

# 🔒 IMPORTANT RULES

1. All work must be committed to GitHub.
2. Official submission is done via Git tag.
3. Work without the correct tag is considered NOT submitted.
4. Replit is only for running/testing.
5. GitHub is the official assessment record.
6. Late tags = late submission.

---

# 🛍 PROJECT OVERVIEW

You are developing a **Product Review Web Application**.

The system must allow:

- User registration
- Secure login/logout
- Add new products
- View product list
- View product details
- Add reviews (rating + comment)
- Display average rating per product
- Secure session handling
- Basic input validation
- Mobile-responsive layout

---

# 🛠 TECHNOLOGY STACK (100% FREE)

- GitHub → Version control & submission
- Replit → Runtime environment
- SQLite → Database engine (no hosting required)

No XAMPP  
No Docker  
No Railway  

---

# 📁 PROJECT STRUCTURE (DO NOT MODIFY)



# 🚀 HOW TO RUN THE SYSTEM

## Step 1 – Import to Replit

1. Go to Replit
2. Create Repl → Select **PHP Web Server**
3. Import your GitHub repository

## Step 2 – Initialise Database


## Step 3 – Run

Click **Run** in Replit.

Test:
- Register
- Login
- Add product
- Add review
- View product list
- View average rating

---

# 📅 14-WEEK DEVELOPMENT PLAN (ALIGNED WITH TOPICS)

---

## ✅ Week 1 – Project Setup  
**Topic:** Introduction to Web Applications

- Read this guide.
- Set up GitHub repository.
- Import into Replit.
- Initialise SQLite database.
- Confirm system runs.

No submission this week.

---

## ✅ Week 2 – HTML Structure  
**Topic:** HTML

Build basic pages:

- index.php (Product list)
- register.php
- login.php
- add_product.php
- product.php (Product details)
- add_review.php

Use proper semantic HTML.

Commit progress.

---

## ✅ Week 3 – CSS Styling  
**Topic:** CSS

- Add external CSS file.
- Improve layout.
- Style product cards.
- Style forms.
- Improve readability.

### 🔔 LAB 01 SUBMISSION

Place lab files in:
labs/lab-01/submission/
then:
```bash
git tag lab-01
git push origin lab-01
```

---

## ✅ Week 4 – Database Design  
**Topic:** Database Concepts

Design:

- ERD
- Relational schema

Database tables should include:

- users
- products
- reviews

Ensure relationships:
- One user → many reviews
- One product → many reviews

No submission yet.

---

## ✅ Week 5 – JavaScript Validation  
**Topic:** JavaScript

Add client-side validation:

- Required fields
- Rating between 1–5
- Proper email format
- Prevent empty reviews

Commit progress.

---

## ✅ Week 6 – SQL Development  
**Topic:** SQL Implementation

Ensure:

- Foreign keys enforced
- No duplicate emails
- Reviews linked correctly
- Average rating calculated properly

### 🔔 LAB 02 SUBMISSION

---

## ✅ Week 4 – Database Design  
**Topic:** Database Concepts

Design:

- ERD
- Relational schema

Database tables should include:

- users
- products
- reviews

Ensure relationships:
- One user → many reviews
- One product → many reviews

No submission yet.

---

## ✅ Week 5 – JavaScript Validation  
**Topic:** JavaScript

Add client-side validation:

- Required fields
- Rating between 1–5
- Proper email format
- Prevent empty reviews

Commit progress.

---

## ✅ Week 6 – SQL Development  
**Topic:** SQL Implementation

Ensure:

- Foreign keys enforced
- No duplicate emails
- Reviews linked correctly
- Average rating calculated properly

### 🔔 LAB 02 SUBMISSION
```bash
git tag lab-02
git push origin lab-02
```

---

## 📝 Week 7 – CAPSTONE PART A (Design Document)

Upload to:
capstone/docs/PartA_DesignDocument/

Required:

- DesignDocument.pdf
- ERD.png
- RelationalSchema.png
- NavigationDiagram.png
- Flowcharts.png

### Submission Tag

```bash
git tag partA-week7
git push origin partA-week7
```

---

## ✅ Week 8 – PHP Basics  
**Topic:** PHP Basics

Implement:

- Registration
- Login
- Password hashing
- Session handling

Commit regularly.

---

## ✅ Week 9 – PHP Advanced  
**Topic:** PHP Advanced

Improve:

- CSRF protection
- Input sanitisation
- Prevent SQL injection (prepared statements)
- Secure session handling

### 🔔 LAB 03 SUBMISSION
```bash
git tag lab-03
git push origin lab-03
```

---

## ✅ Week 10 – Integration  
**Topic:** PHP + Database Integration

Ensure:

- Product creation works
- Reviews are linked to products
- Reviews linked to users
- Average rating displayed dynamically

Commit changes.

---

## ✅ Week 11 – Mobile Web  
**Topic:** Responsive Design

- Make layout mobile-friendly.
- Improve product grid.
- Improve form spacing.

### 🔔 LAB 04 SUBMISSION
```bash
git tag lab-04
git push origin lab-04
```

---

## ✅ Week 12 – Web Architecture  
**Topic:** Architecture

Prepare:

- Application architecture diagram
- Layer explanation (presentation, logic, data)
- Data flow explanation

No submission yet.

---

## 🎤 Week 13 – CAPSTONE PART B (Presentation & Demo)

Upload to:

---

## ✅ Week 12 – Web Architecture  
**Topic:** Architecture

Prepare:

- Application architecture diagram
- Layer explanation (presentation, logic, data)
- Data flow explanation

No submission yet.

---

## 🎤 Week 13 – CAPSTONE PART B (Presentation & Demo)

Upload to:

---

## ✅ Week 12 – Web Architecture  
**Topic:** Architecture

Prepare:

- Application architecture diagram
- Layer explanation (presentation, logic, data)
- Data flow explanation

No submission yet.

---

## 🎤 Week 13 – CAPSTONE PART B (Presentation & Demo)

Upload to:
apstone/docs/PartB_Presentation/

Required:

- Slides.pdf or .pptx
- DemoNotes.md (optional)

### Submission Tag
```bash
git tag partB-week13
git push origin partB-week13
```

---

## 🏁 Week 14 – CAPSTONE PART C (Final Submission)

Ensure:

- System fully working
- Reviews saved correctly
- Ratings calculated properly
- Clean code structure
- Screenshots added to:
capstone/docs/PartC_FinalSubmission/

### Submission Tag
```bash
git tag partC-week14
git push origin partC-week14
```

---

# 📊 WHAT WILL BE MARKED

- Part A – Design Document
- Part B – Presentation & Demo
- Part C – Final Working System
- Labs 01–04
- Code quality
- Database design correctness
- Security implementation
- Average rating logic
- UI/UX quality

---

# ❗ COMMON MISTAKES

- Forgetting to push tag
- Reviews not linked correctly
- No foreign keys
- SQL injection vulnerability
- No prepared statements
- Average rating calculated incorrectly
- System not running in Replit
- Missing required documents

---

# ✅ FINAL SUBMISSION CHECKLIST

Before tagging:

- [ ] Code committed
- [ ] Required files uploaded
- [ ] Database initialises
- [ ] Reviews save correctly
- [ ] Average rating displays correctly
- [ ] Tag created
- [ ] Tag pushed

---

# 🔐 OFFICIAL SUBMISSION POLICY

If the required Git tag is missing,  
the submission is considered NOT received.

---

# 🧠 IMPORTANT

This project is cumulative.

Each week builds on the previous week.

Do not wait until Week 13.

Work consistently every week.

---

END OF DOCUMENT
