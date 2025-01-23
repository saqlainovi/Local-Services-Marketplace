-- Drop the existing foreign key constraint
ALTER TABLE payments
DROP FOREIGN KEY payments_ibfk_6;

-- Add the correct foreign key constraint
ALTER TABLE payments
ADD CONSTRAINT payments_ibfk_6
FOREIGN KEY (mechanic_id) REFERENCES car_mechanics(id); 