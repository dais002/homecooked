## An e-commerce platform to allow home-chefs to sell their foods built with:

- Laravel(PHP)
- MySQL
- Stripe API for payment processing
- Algolia for dynamic search functionality
- Pusher for notifications

## Features Summary

Authentication:
-  all users are required to login and defaulted to guest role

Platform Authorization: 
- admin - full access
- manager - can perform CRUD operations on store items
- guest - customer who can only purchase

Store Owner Authorization:
- store owners can only modify items within their own store

Subscription Service:
- standard $50/month - 1 store, 3 items

Upgrades:
- standard tier users can upgrade to premium option
- customers will be asked to upgrade to store owners and have options to select service


