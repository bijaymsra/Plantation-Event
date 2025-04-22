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

```bash
# Clone the repository
git clone https://github.com/your-username/tree-plantation-tracker.git
cd tree-plantation-tracker

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Configure .env for database

# Run migrations
php artisan migrate

# (Optional) Seed the database
php artisan db:seed

# Run the app
php artisan serve
