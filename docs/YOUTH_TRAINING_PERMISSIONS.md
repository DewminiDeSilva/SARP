# Youth Training Module – Permissions

After running the migrations for the Youth Training module, add these permissions so the sidebar link and routes work correctly.

## Option 1: Run SQL

Execute the following in your database (e.g. MySQL or phpMyAdmin). Adjust if your `permissions` table has different columns.

```sql
INSERT INTO permissions (module, action, created_at, updated_at) VALUES
('youth_training', 'view', NOW(), NOW()),
('youth_training', 'add', NOW(), NOW()),
('youth_training', 'edit', NOW(), NOW()),
('youth_training', 'delete', NOW(), NOW()),
('youth_training', 'upload_csv', NOW(), NOW()),
('youth_training_participants', 'view', NOW(), NOW()),
('youth_training_participants', 'add', NOW(), NOW()),
('youth_training_participants', 'delete', NOW(), NOW()),
('youth_training_participants', 'upload_csv', NOW(), NOW());
```

## Option 2: Assign to users/roles

After inserting the rows above, assign the new permissions to the right users via your `user_permission` table (or your role-permission setup), the same way you do for `nrm` and `nrm_participants`.

## Run migrations

If you have not run the Youth Training migrations yet:

```bash
php artisan migrate
```

This creates the `youth_training_program` and `youth_training_participants` tables.
