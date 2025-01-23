-- First, drop the existing foreign key constraints
ALTER TABLE payments
DROP FOREIGN KEY payments_ibfk_6;

ALTER TABLE reviews
DROP FOREIGN KEY reviews_ibfk_7;

-- Now it's safe to drop the old mechanics table
DROP TABLE IF EXISTS mechanics;

-- Add the correct foreign key constraints to car_mechanics table
ALTER TABLE payments
ADD CONSTRAINT payments_ibfk_6
FOREIGN KEY (mechanic_id) REFERENCES car_mechanics(id);

ALTER TABLE reviews
ADD CONSTRAINT reviews_ibfk_7
FOREIGN KEY (mechanic_id) REFERENCES car_mechanics(id);

-- Update any existing records to handle potential orphaned references
UPDATE payments
SET mechanic_id = NULL
WHERE mechanic_id NOT IN (SELECT id FROM car_mechanics);

UPDATE reviews
SET mechanic_id = NULL
WHERE mechanic_id NOT IN (SELECT id FROM car_mechanics); 