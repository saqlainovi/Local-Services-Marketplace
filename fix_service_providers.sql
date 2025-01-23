-- First, drop the existing foreign key constraints for Packers & Movers
ALTER TABLE payments
DROP FOREIGN KEY payments_ibfk_7;

ALTER TABLE reviews
DROP FOREIGN KEY reviews_ibfk_8;

-- Drop the existing foreign key constraints for Battery Services
ALTER TABLE payments
DROP FOREIGN KEY payments_ibfk_9;

ALTER TABLE reviews
DROP FOREIGN KEY reviews_ibfk_10;

-- Now it's safe to drop the old tables
DROP TABLE IF EXISTS packers_movers;
DROP TABLE IF EXISTS battery_services;

-- Create new tables with proper structure matching car_mechanics and plumbers
CREATE TABLE car_packers_movers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    availability BOOLEAN DEFAULT 1,
    work_experience INT NOT NULL,
    price_per_service DECIMAL(10,2) NOT NULL,
    specialization VARCHAR(255) NOT NULL,
    rating DECIMAL(3,2) DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE car_battery_services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    availability BOOLEAN DEFAULT 1,
    work_experience INT NOT NULL,
    price_per_service DECIMAL(10,2) NOT NULL,
    specialization VARCHAR(255) NOT NULL,
    rating DECIMAL(3,2) DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Add the correct foreign key constraints to payments table
ALTER TABLE payments
ADD CONSTRAINT payments_ibfk_7
FOREIGN KEY (packer_mover_id) REFERENCES car_packers_movers(id);

ALTER TABLE payments
ADD CONSTRAINT payments_ibfk_9
FOREIGN KEY (battery_service_id) REFERENCES car_battery_services(id);

-- Add the correct foreign key constraints to reviews table
ALTER TABLE reviews
ADD CONSTRAINT reviews_ibfk_8
FOREIGN KEY (packer_mover_id) REFERENCES car_packers_movers(id);

ALTER TABLE reviews
ADD CONSTRAINT reviews_ibfk_10
FOREIGN KEY (battery_service_id) REFERENCES car_battery_services(id);

-- Update any existing records to handle potential orphaned references
UPDATE payments
SET packer_mover_id = NULL
WHERE packer_mover_id NOT IN (SELECT id FROM car_packers_movers);

UPDATE payments
SET battery_service_id = NULL
WHERE battery_service_id NOT IN (SELECT id FROM car_battery_services);

UPDATE reviews
SET packer_mover_id = NULL
WHERE packer_mover_id NOT IN (SELECT id FROM car_packers_movers);

UPDATE reviews
SET battery_service_id = NULL
WHERE battery_service_id NOT IN (SELECT id FROM car_battery_services); 