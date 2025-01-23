-- Drop the existing foreign key constraint
ALTER TABLE payments
DROP FOREIGN KEY payments_ibfk_5;

-- Add the new foreign key constraint pointing to the correct table
ALTER TABLE payments
ADD CONSTRAINT payments_ibfk_5 FOREIGN KEY (tv_technician_id) REFERENCES tv_repair(id);

-- Drop the existing foreign key constraint in reviews table
ALTER TABLE reviews
DROP FOREIGN KEY reviews_ibfk_6;

-- Add the new foreign key constraint in reviews table
ALTER TABLE reviews
ADD CONSTRAINT reviews_ibfk_6 FOREIGN KEY (tv_technician_id) REFERENCES tv_repair(id); 