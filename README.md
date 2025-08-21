# SaaS Multi-Tenant Dashboard

A scalable SaaS multi-tenant dashboard built with CodeIgniter 4, MySQL, and Bootstrap 5. This project provides a foundation for managing user accounts, organizations, teams, billing (via Stripe), role-based access control (RBAC), usage analytics, and an admin panel.

## Overview

This application implements a shared-database multi-tenant architecture where each organization (tenant) is identified by an `org_id`. It includes user authentication, organization management, basic billing hooks for Stripe, and analytics tracking. The admin panel allows super admins to oversee all tenants, while org admins manage their own organizations.

## Features

- **User Accounts**: Registration, login, and profile management.
- **Organizations/Teams**: Create and manage organizations with basic team support.
- **Billing Hooks**: Integration with Stripe for subscription management (webhook support).
- **Role-Based Access Control (RBAC)**: Roles include super_admin, org_admin, and user with defined permissions.
- **Usage Analytics**: Track user actions and display analytics on the dashboard.
- **Admin Panel**: Super admin interface to manage all users and organizations.

## Technologies Used

- **Backend**: CodeIgniter 4 (PHP 8.1+)
- **Database**: MySQL
- **Frontend**: Bootstrap 5 (CDN-based)
- **Payment Processing**: Stripe PHP SDK
- **Development Tools**: Composer, PHP Spark CLI

## Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL Server
- Stripe Account (for billing features)
- Web server (e.g., Apache/Nginx) or use `php spark serve` for local development

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/saas-dashboard.git
   cd saas-dashboard
