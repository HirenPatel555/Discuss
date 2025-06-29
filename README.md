# 🗨️ PHP Q&A Discussion Forum

A simple PHP & MySQL-based **Q&A forum web app**, built with clean HTML, PHP, and Bootstrap. Users can register, log in, post questions, view categories, and submit answers.

---

## 📁 Project Structure

/Discuss
├── client/
│ ├── ask.php
│ ├── category.php
│ ├── categorylist.php
│ ├── dashbord.php
│ ├── header.php
│ ├── login.php
│ ├── question_details.php
│ ├── questions.php
│ ├── signup.php
├── common/
│ └── db.php
├── public/
│ └── style.css
├── server/
│ └── requests.php
├── index.php
└── README.md


---

## 🚀 How the App Works (Step-by-Step)

### 1. **Database Connection**
- `common/db.php` handles DB connection using `mysqli`.
- Ensure your MySQL DB has tables: `users`, `questions`, `category`, and `answer`.

---

### 2. **Landing Page**
- `index.php`: The root entry point.
- It includes the navbar (`header.php`) and conditionally loads:
  - `signup.php`, `login.php`, `ask.php`, `question_details.php`, or the main `dashbord.php`.

---

### 3. **Navbar and Session Handling**
- `header.php` contains:
  - Login/Signup/Logout links
  - Ask a Question / My Questions (visible after login)
  - A search bar

> All navigation is driven by `?key=value` URL params (e.g., `?login=true`, `?q-id=3`, etc.)

---

### 4. **User Signup/Login**
- Handled in:
  - `signup.php`, `login.php`
  - On form submit, `server/requests.php` processes the POST data.
  - On success, users are stored in `$_SESSION['users']`.

---

### 5. **Asking a Question**
- `ask.php`: Shows a form with title, description, and category dropdown.
- `category.php`: Pulls categories from DB to populate `<select>`.
- Submits to `requests.php` with `name="ask"`.

---

### 6. **Dashboard View**
- `dashbord.php` includes:
  - `questions.php` (left): Questions list
  - `categorylist.php` (right): Category links

---

### 7. **Question List (`questions.php`)**
- Dynamically loads questions based on:
  - `c-id` (by category)
  - `u-id` (user's questions)
  - `search` term
  - Default: all questions
- Shows "Delete" if user is the author.

---

### 8. **Question Details + Answering**
- `question_details.php` shows:
  - Title & description
  - Existing answers via `answers.php`
  - Answer submission form (`POST` to `requests.php`)

---

### 9. **Answer Submission**
- Handled by `requests.php` when `$_POST['answer']` is set.
- Inserts into `answer` table and redirects back to the same question.

---

### 10. **Delete Question**
- Triggered via link: `requests.php?delete={id}`
- Only shown to the original user in `questions.php`.

---

## 🎨 Styling (CSS / Bootstrap)

- Uses **Bootstrap 5** for layout and form styling.
- Custom styles in `public/style.css`:
  - Global black text theme
  - Clean question & category styling with underline-on-hover
  - Smooth transitions and consistent typography using Google Fonts (`Orbitron`, `Ubuntu`)
  - Responsive and minimal design

---

## 📝 Important Notes

- ✅ **Session-based authentication**  
  - All user login/session logic is handled using PHP's `$_SESSION`.

- ✅ **Page routing with `$_GET` query params**  
  - Each view (login, signup, ask, question details) loads conditionally based on URL query params.

- ✅ **Secure database interaction with MySQLi**  
  - `mysqli` object is used for DB operations. Insertions use `prepare()` and `execute()`.

- ✅ **Clean and dynamic PHP templating**  
  - Header, dashboard, question lists, and category lists are separated into reusable includes.

- ✅ **Form submissions handled in one place**  
  - `server/requests.php` handles signup, login, logout, post question, answer, and delete logic.

- ✅ **Responsive design**  
  - Layout is mobile-friendly using Bootstrap’s grid system (`col-6 offset-sm-3`, `row g-4`, etc.)

- ✅ **Smart conditional rendering**  
  - Content is shown/hidden based on user login status (`isset($_SESSION['users'])`).

---

## 🔑 Key PHP Functions & Concepts Used

### 🔐 Sessions & Authentication
- `session_start()`: Initializes user session.
- `$_SESSION`: Stores user info like `username`, `user_id`.

### 🌐 Superglobals
- `$_GET`: Used for URL routing (`?login=true`, `?c-id=2`, etc.)
- `$_POST`: Handles form submissions for signup, login, answers.
- `$_SERVER['DOCUMENT_ROOT']`: Used for correct file includes.

### 💬 SQL & MySQLi
- `new mysqli(...)`: Creates DB connection.
- `$conn->prepare(...)`: Prepares safe SQL statements.
- `$query->execute()`: Executes INSERT/DELETE safely.
- `$result = $conn->query(...)`: Runs SELECT queries.
- `$result->fetch_assoc()`: Fetches result row as associative array.

### 🔄 Conditional Includes
```php
if (isset($_GET['ask'])) {
    include('./client/ask.php');
}
