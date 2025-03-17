# Users

-   roles (ShopOwner, Customer, Super Admin)

# Shop

-   user_id, name, location (latitude, langitude), phone, working_hours (from-to, school days, weekend), upi/scan(img)

# Product

-   shop_id (foreign key), tank_size (e.g., 3kg, 5kg, 15kg), price, delivery_charge, stock_quantity, description (optional), is_active (boolean to mark availability).
-   belongs to one shop has many orders

# Order

-   product_id, user_id, total_amount, payment_status, delivery_status, location (latitude, langitude), order_time, delivery_time
    -   Relationships:
        -   belongsTo with shop
        -   belongsTo with user
        -   belongsTo with product (Order is associated with a specific product)

# Reviews

-   product_id, user_id, rating, comment
