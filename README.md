## Summary

An e-commerce platform to allow home-chefs to sell their foods built with -
- Laravel(PHP)
- MySQL
- Stripe for payment processing
- Algolia for search functionality
- Pusher for notifications

## Summary

Layout:
- homepage displays all stores
- individual stores displays all items (one to many)
- customer can select quantity for any item and add to shopping cart
- customers can make purchases

Authorization: 
- admin - full access
- manager - basically store owners - can perform CRUD operations on items in their store
- customer - can only make purchases

Subscription Service:
- standard $50/month - 1 store, 3 items
- premium $100/month - 1 store, 8 items, ability to select 1 item to display in featured section on main landing page

Upgrades:
Standard tier users can upgrade to premium option
Customers will be asked to upgrade to store owners and have options to select service


