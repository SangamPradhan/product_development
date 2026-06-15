# System Flow & Architecture Diagram

This guide illustrates the system flow, data paths, and user experiences from two perspectives: the **Front-End User (Visitor)** and the **Back-End Admin**. It includes flowcharts mapped with text and arrows to make it simple for you to design flowcharts or DFDs.

---

## PERSPECTIVE 1: Front-End User (Visitor)

The user side represents public-facing interactions: browsing services, examining projects, submitting feedback/reviews, booking seats for upcoming events, making direct inquiries, and using the future FAQ chatbot.

### A. Core Navigation Flow
```
[User Lands on Homepage] 
       │
       ├─► [About Page] ──► (Read Company History & Vision)
       ├─► [Services Page] ──► (Browse Enterprise Solutions & Automations)
       ├─► [Gallery Page] ──► (View Premium Separated Images & Videos with AJAX)
       ├─► [Blogs Page] ──► (Read Published Articles & Explore Relevant Projects)
       ├─► [Contact Page] ──► (Submit General Inquiries / Partner Forms)
       └─► [Projects & Case Studies] ──► (View Dynamic Details, Ratings & Feedbacks)
```

### B. Project Review Submission Flow (AJAX & Email)
```
[Select Project Detail]
       │
       ▼
[Fill Review Form] (Name, Email, Job Title, Rating 1-5, Comments)
       │
       ▼
[Click Submit] ──► (AJAX POST Request to Api/ReviewController)
       │
       ├─► [Database Storage] ──► (Save Review as 'pending')
       │
       ▼
[Send Thank-You Email] (Try-Catch Block)
       │
       ├─► (Success: SMTP Mail Sent) ───► [Display Success Toast]
       │
       └─► (Failure: SMTP/DNS Offline) ──► [Display Warning Toast: "Saved, but failed to send email"]
```

### C. Event Discovery & Booking Flow (Seat Selection & Email)
```
[Browse Events Page] ──► (Filtered by Category: Upcoming vs. Past Events)
       │
       ▼
[Select Event Detail] ──► (View Main Banner, Info Card, Gallery & Similar Events)
       │
       ▼
[Click "Book Your Seat Now"] ──► (Slides down premium Booking Form in-page)
       │
       ▼
[Fill Details] (Name, Email, Phone, Number of Seats, Message)
       │
       ▼
[Click Confirm] ──► (POST Request to FrontController)
       │
       ├─► [Database Storage] ──► (Save EventBooking linked to event_id)
       │
       ▼
[Send Registration Email] (Try-Catch Block)
       │
       ├─► (Success) ──► [SweetAlert Pop-Up: "Seat Booked successfully! Email sent."]
       │
       └─► (Fail) ────► [SweetAlert Pop-Up: "Booked, but failed to send email. Check address."]
```

### D. Contact Form Submission Flow
```
[Navigate to Contact Page] ──► (View headquarter coordinates & interactive form)
       │
       ▼
[Fill Inquiry Details] (First Name, Last Name, Email, Inquiry Type, Message)
       │
       ▼
[Click Submit Inquiry] ──► (POST Request to FrontController)
       │
       ├─► [Database Storage] ──► (Save Message to contact_messages table)
       │
       ▼
[Send Confirmation Email] (Try-Catch Block)
       │
       ├─► (Success) ──► [SweetAlert Pop-Up: "Inquiry received and confirmation email sent!"]
       │
       └─► (Fail) ────► [SweetAlert Pop-Up: "Inquiry saved. We could not send confirmation email."]
```

### E. Future Feature: Chatbot & FAQ Integration Flow (Tomorrow)
```
[User Clicks Float Chat Icon] ──► (Opens sleek, micro-animated floating Chat Widget)
       │
       ▼
[Enter Inquiry or Select Quick-FAQ Button]
       │
       ├─► (Selects Quick-FAQ: e.g., "Where is Zurich Headquarters?") 
       │         │
       │         └─► (Chatbot instantly pulls structured FAQ reply from JSON Config)
       │
       └─► (Enters Custom Question: e.g., "Do you build custom neural hubs?")
                 │
                 ▼
          [Chatbot Script] ──► (Searches key phrases in Database / Services / Events)
                 │
                 ├─► (Match Found: Displays matching services & offers link)
                 │
                 └─► (No Match: Asks user's email ──► Creates a background Support Ticket ──► Notifies Admin)
```

---

## PERSPECTIVE 2: Back-End Admin (Dashboard & Control)

The Admin side covers secure authentication, Bento-grid analytics, and full CRUD control over the content, reviews, and transaction metrics.

### A. Authentication & Access Flow
```
[Admin requests /admin/login]
       │
       ▼
[Enter Credentials]
       │
       ▼
[Auth Middleware]
       │
       ├─► (Fails: Invalid email/password) ──► [Redirect back with inline error alert]
       │
       └─► (Passes: Regenerates session) ───► [Enters Bento Dashboard /admin/dashboard]
```

### B. Content CRUD Hub (Blogs, Services, Events, Gallery, Projects)
All forms feature full responsive containers scaling gracefully on big monitors and laptop screen widths.
```
[Select Section in Sidebar] (e.g., Blogs)
       │
       ▼
[Browse Index Page] ──► (View data list, search bar, active status)
       │
       ├─► [Create Form] ──► (Uses Rich Text Quill Editor for formatting description headings, bold text, etc.)
       │                        │
       │                        └─► [Click Save] ──► (Stores in DB & redirects with timer-based Success Toast)
       │
       ├─► [Edit Form] ───► (Pre-populates data in Quill Rich Editor)
       │                        │
       │                        └─► [Click Update] ──► (Saves updates to DB & alerts Admin)
       │
       └─► [Delete Form] ──► (Triggers SweetAlert Delete Dialog: "Are you sure?")
                                │
                                ├─► (Cancel: Does nothing)
                                └─► (Confirm: Sends DELETE request ──► Deletes from DB ──► Success Alert)
```

### C. Feedback & Reviews Approvals Flow
```
[Click Feedbacks on Sidebar]
       │
       ▼
[Browse Review Submissions] (Lists Name, Email, Project Title, Rating, Comment)
       │
       ├─► [View Details] ──► (Opens detailed card of the reviewer feedback)
       │
       ├─► [Click Approve] ──► (Status changes to 'accepted' ──► Instantly shown on Front-End Project Details)
       │
       ├─► [Click Reject] ──► (Status changes to 'rejected' ──► Hidden from Front-End page)
       │
       └─► [Click Delete] ──► (SweetAlert confirm dialog ──► Permanently purges review record)
```

### D. Event Bookings Dashboard Flow
```
[Click Bookings on Sidebar]
       │
       ▼
[Browse Attendee Registry] ──► (Lists Attendee Name, Contact details, Seats booked, Target Event Title & Date)
       │
       └─► [Click Delete Record] ──► (SweetAlert confirm ──► Deletes attendee registration registry)
```

### E. Contact & Inquiry Management Flow
```
[Click Inquiries on Sidebar]
       │
       ▼
[Browse Inquiries Board] ──► (Lists Client Name, Contact email, Inquiry Type tag, and full Client Message)
       │
       └─► [Click Delete Inquiry] ──► (SweetAlert confirm ──► Purges client inquiry record from registry)
```
