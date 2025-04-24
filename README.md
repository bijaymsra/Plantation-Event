# 🌱 Tree Plantation and Greenery Tracker for Communities

A Laravel-powered web platform that connects community leaders, environmental organizations, and citizens to organize and participate in tree plantation events. This system empowers users to create, discover, and track eco-friendly initiatives in their localities.

---

## 🧾 Description

This platform enables **proposers** (community leaders or organizations) to propose plantation events, which are then **approved by admins** and made visible to **registered end-users** (citizens). Users can **filter events** based on location, type of trees, and dates. The goal is to build a community-driven ecosystem that promotes green living and environmental awareness.

---

## 🗂️ Project Structure

### 👥 User Roles
- **Admin** – Manages the entire system
- **Proposer** – Creates and manages tree plantation events
- **End User** – Participates in approved events

---

## 🧭 Key Features

### 1. 🔖 Landing Page
- Hero banner with mission statement
- CTA Buttons: `Join Us`, `View Events`
- Real-time counters (trees planted, users joined, upcoming events)
- Search bar to filter events
- Testimonials or success stories

### 1.1 📞 Contact & About Page
- Contact form
- Vision & mission section
- Social links

### 1.2 🌳 Event Details Page
- Event description, tree types, location map
- Date & time
- Organizer contact
- "Join Event" button (login required)

---

### 2. 🔐 User Authentication & Registration
- Role-based registration (Admin, Proposer, End User)
- Email/password authentication
- Role-based redirection to respective dashboards
- Email verification (optional OAuth support)

---

### 3. 🛠️ Admin Dashboard
- Manage users (approve/ban proposers)
- Approve/reject proposed events
- CRUD for tree types
- Activity stats (charts, reports)
- Edit static content (About, Contact)

---

### 4. ✍️ Proposer Dashboard
- **My Events**: View/edit/delete proposals, check approval status
- **Create Event**: Title, description, location, tree type, dates, participants
- **Event Reports**: Mark events completed, upload images, trees planted

---

### 5. 👤 End-User Dashboard
- **Browse Events**: Filter by location, tree type, and dates
- **My Events**: View joined/bookmarked events, give feedback
- **Profile**: Update info, view streaks/badges (future gamification)

---

## 🚀 Tech Stack

- **Framework**: Laravel 10+
- **Database**: MySQL
- **Frontend**: Blade (Laravel Views)
- **Styling**: Bootstrap / Custom CSS
- **Authentication**: Laravel Auth (optional OAuth)
- **Charts**: Laravel Charts / Chart.js (planned)

---

## 📦 Installation & Setup

🚀 Getting Started
Follow these steps to set up the project locally:

```bash
# Clone the repository
git clone https://github.com/your-username/tree-plantation-tracker.git
cd tree-plantation-tracker/clibend

# Install PHP and JavaScript dependencies
composer install
npm install

# Copy the example environment file and generate the application key
cp .env.example .env
php artisan key:generate

# Configure the .env file for MySQL database
# Open the .env file and update the following lines with your MySQL credentials:
# 
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=eco
# DB_USERNAME=your_mysql_username
# DB_PASSWORD=your_mysql_password
#
# Make sure the database `eco` is already created in MySQL:
# Run this in MySQL:
# CREATE DATABASE eco;

# Run database migrations to create necessary tables
php artisan migrate

# (Optional) Seed the database with sample data
php artisan db:seed

# Start the local development server
php artisan serve

```


---

## ✍️ Author

**Bijay M S R A**  
[GitHub Profile](https://github.com/bijaymsra)

---

## 📜 License

This project is licensed under the **MIT License**.

---

## 📸 Optional Additions

Want to improve this README further? Consider adding:

- 🧱 **Architecture Diagram** (PNG/SVG)
- 🖼️ **Screenshots** of the frontend & Grafana dashboard
- 🎥 **Project Demo Video** (YouTube/Loom)
- ☁️ **Deployment Steps** for GCP / AWS / Azure
- 🤝 **Contribution Guidelines**

## 💡 Need Help?

Let me know if you want help generating:

- 🧱 A diagram of your architecture  
- 📄 YAML templates for Prometheus/Grafana setup  
- ⚙️ GitHub Actions CI/CD for auto-deployments  

✨ Happy to help polish this project even more!
