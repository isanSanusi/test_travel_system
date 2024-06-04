
CREATE DATABASE IF NOT EXISTS travel_db;

USE travel_db;

CREATE TABLE IF NOT EXISTS buses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bus_company VARCHAR(100) NOT NULL,
    departure_city VARCHAR(100) NOT NULL,
    destination_city VARCHAR(100) NOT NULL,
    travel_date DATE NOT NULL,
    departure_time TIME NOT NULL,
    arrival_time TIME NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    seats_available INT NOT NULL
);

INSERT INTO buses (bus_company, departure_city, destination_city, travel_date, departure_time, arrival_time, price, seats_available) VALUES
-- Bandung to other cities
('Primajasa', 'Bandung', 'Bogor', '2024-06-01', '06:00:00', '09:00:00', 75000.00, 22),
('Sinar Jaya', 'Bandung', 'Bekasi', '2024-06-01', '09:00:00', '12:00:00', 80000.00, 22),
('PO Haryanto', 'Bandung', 'Depok', '2024-06-01', '12:00:00', '15:00:00', 85000.00, 22),
('Kramat Djati', 'Bandung', 'Sukabumi', '2024-06-01', '15:00:00', '18:00:00', 70000.00, 25),
('Lorena', 'Bandung', 'Cirebon', '2024-06-01', '18:00:00', '21:00:00', 90000.00, 22),
('Budiman', 'Bandung', 'Tasikmalaya', '2024-06-01', '21:00:00', '00:00:00', 95000.00, 23),

-- Bogor to other cities
('Murni Jaya', 'Bogor', 'Bandung', '2024-06-02', '06:00:00', '09:00:00', 70000.00, 20),
('Handoyo', 'Bogor', 'Bekasi', '2024-06-02', '09:00:00', '10:30:00', 35000.00, 22),
('Rosalia Indah', 'Bogor', 'Depok', '2024-06-02', '12:00:00', '13:00:00', 30000.00, 22),
('Primajasa', 'Bogor', 'Sukabumi', '2024-06-02', '15:00:00', '17:00:00', 40000.00, 22),
('Sinar Jaya', 'Bogor', 'Cirebon', '2024-06-02', '18:00:00', '22:00:00', 120000.00, 22),
('PO Haryanto', 'Bogor', 'Tasikmalaya', '2024-06-02', '21:00:00', '01:00:00', 130000.00, 22),

-- Bekasi to other cities
('Kramat Djati', 'Bekasi', 'Bandung', '2024-06-03', '06:00:00', '09:00:00', 80000.00, 22),
('Lorena', 'Bekasi', 'Bogor', '2024-06-03', '09:00:00', '10:00:00', 35000.00, 20),
('Budiman', 'Bekasi', 'Depok', '2024-06-03', '12:00:00', '13:00:00', 30000.00, 23),
('Murni Jaya', 'Bekasi', 'Sukabumi', '2024-06-03', '15:00:00', '17:00:00', 60000.00, 22),
('Handoyo', 'Bekasi', 'Cirebon', '2024-06-03', '18:00:00', '22:00:00', 120000.00, 22),
('Rosalia Indah', 'Bekasi', 'Tasikmalaya', '2024-06-03', '21:00:00', '01:00:00', 125000.00, 24),

-- Depok to other cities
('Primajasa', 'Depok', 'Bandung', '2024-06-04', '06:00:00', '09:00:00', 85000.00, 22),
('Sinar Jaya', 'Depok', 'Bogor', '2024-06-04', '09:00:00', '10:00:00', 30000.00, 22),
('PO Haryanto', 'Depok', 'Bekasi', '2024-06-04', '12:00:00', '13:00:00', 30000.00, 22),
('Kramat Djati', 'Depok', 'Sukabumi', '2024-06-04', '15:00:00', '17:00:00', 55000.00, 22),
('Lorena', 'Depok', 'Cirebon', '2024-06-04', '18:00:00', '22:00:00', 125000.00, 22),
('Budiman', 'Depok', 'Tasikmalaya', '2024-06-04', '21:00:00', '01:00:00', 130000.00, 22),

-- More routes and dates can be added similarly
('Murni Jaya', 'Garut', 'Purwakarta', '2024-06-05', '06:00:00', '09:00:00', 115000.00, 20),
('Handoyo', 'Garut', 'Subang', '2024-06-05', '09:00:00', '12:00:00', 70000.00, 22),
('Rosalia Indah', 'Garut', 'Bandung', '2024-06-05', '12:00:00', '15:00:00', 50000.00, 22);


CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bus_id INT NOT NULL,
    bus_company VARCHAR(100) NOT NULL,
    passenger_name VARCHAR(100) NOT NULL,
    passenger_email VARCHAR(100) NOT NULL,
    passenger_phone VARCHAR(15) NOT NULL,
    booking_date DATE NOT NULL,
    seats INT NOT NULL,
    seat_numbers VARCHAR(255) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (bus_id) REFERENCES buses(id)
);

